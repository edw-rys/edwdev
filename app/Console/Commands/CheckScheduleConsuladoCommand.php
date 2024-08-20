<?php

namespace App\Console\Commands;

use App\Mail\ConsuladoScheduleMail;
use App\Models\ConsuladoMailsNotificados;
use App\Models\ConsuladoRegisters;
use App\Models\NextTimeScheduleRun;
use App\Services\ApiRequestService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckScheduleConsuladoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:consulado-schedules';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    /**
     * 
     * @var object
     */
    protected $processCommand;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->processCommand = NextTimeScheduleRun::where('command_name', $this->signature)->first();
        if($this->processCommand == null){
            $this->processCommand = NextTimeScheduleRun::create([
                'command_name'  => $this->signature,
                'next_execute'  => now()
            ]);
        }
        $this->startProcess();
    }

    private function startProcess($attempt = 0) {
        try {
            $this->executeProcess();
        } catch (\Throwable $th) {
            if($attempt >= 6){
                Log::info('No hubo suerte en la búsqueda ('.$attempt.')');
                $this->info('No hubo suerte en la búsqueda ('.$attempt.')');
                $this->processCommand->detail_error = $th->getMessage();
                $this->processCommand->last_status = 'error';
                $this->processCommand->next_execute = Carbon::now()->addMinutes(5);
                $this->processCommand->save();
                return ;
            }
            $this->warn('Reprocesando por error ('.$attempt.'): '.$th->getMessage());
            Log::warning('Reprocesando por error ('.$attempt.'): '.$th->getMessage());
            return $this->startProcess($attempt+1);
        }
    }
    private function executeProcess() {
        $register = ConsuladoRegisters::whereDate('created_at', Carbon::now())
            ->where('status', 'active')
            ->first();
        if($register == null){
            $this->infoSys('Iniciando sesión');
            $register = $this->login();
            $this->infoSys('Sesión iniciada');
        }
        $response = $this->searchSchedules($register->cookie_full);
        if(isset($response->error)){
            $this->infoSys('Cookie eliminada porque expiró, volviendo a iniciar sesión '. $response->error);
            $register->update([
                'status' => 'finished'
            ]);
            $register->delete();
            $response = $this->login();
            $response = $this->searchSchedules($register->cookie_full);
        }
        $maxLimit = count($response) ;
        if($maxLimit >10){
            $maxLimit = 10;
        }
        $maxDateCheck = Carbon::createFromFormat('Y-m-d', config('app_project.ms.consulado.maxDate'));
        $this->infoSys('Fechas recuperadas de la api');
        $newDates = [];
        $sendMail = false;
        for ($i=0; $i < $maxLimit ; $i++) { 
            if($i == 0){
                Log::info("Fecha 1: ". $response[$i]->date);
            }
            $scheduleDate = Carbon::createFromFormat('Y-m-d', $response[$i]->date);
            if($scheduleDate < $maxDateCheck){
                $sendMail = true;
            }
            $newDates[] = $response[$i];
        }
        if($sendMail){
            $notifiedMail = ConsuladoMailsNotificados::create([
                'user'      => config('app_project.ms.consulado.username'),
                'emails'    => config('app_project.ms.consulado.emails'),
                'max_date'  => config('app_project.ms.consulado.maxDate'),
                'response'  => json_encode($newDates),
                'status'    => 'created',
            ]);
            try {
                Mail::to(
                    explode(';', config('app_project.ms.consulado.emails'))
                )->send(new ConsuladoScheduleMail(json_encode($newDates)));
            } catch (\Throwable $th) {
                $notifiedMail->status = 'error';
                $notifiedMail->save();
            }
            $notifiedMail->status = 'success';
            $notifiedMail->save();
            $this->infoSys('Mail enviado');
            $this->processCommand->last_status = 'success';
            $this->processCommand->next_execute = Carbon::now()->addMinutes(30);
            $this->processCommand->save();
        }
    }

    private function login() {
        $apiServiceLogin = new ApiRequestService(config('app_project.ms.consulado.login'));
        $loginCredentials = [
            'user[email]' => config('app_project.ms.consulado.username'),
            'user[password]' => decrypt(config('app_project.ms.consulado.password')),
            'policy_confirmed' => 1,
            'commit' => 'Iniciar sesión',
        ];
        $headers = [
            'Accept' => '*/*;q=0.5, text/javascript, application/javascript, application/ecmascript, application/x-ecmascript',
            'Accept-Language' => 'es-US,es;q=0.9,en-US;q=0.8,en;q=0.7,pt-BR;q=0.6,pt;q=0.5,es-419;q=0.4',
            'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
            'Cookie' => '_gid=GA1.2.572358975.1724154847; _yatri_session=EnTJWNS9ahgT4i5HQG%2FJuPtgF7g4%2FyAGylZxOQxFs5Hs7rcwqSdHk8hJoqJCVhzFZ1hXdmBNU6wVW6wzTDJdiw1I9wq%2BaG8Z%2BIl71QvpxPz25HlOtLF5vIiSA9WNK20jfSoCT47ggwyyfZxE1z4iIEdHAarKNDBO6fXIdhSF9bTWZwPDDBs2TedF%2BiWJHP5soll7AmCG9Z4%2B%2B0bqszyoty3fYx%2FtfnUuoDeqcOaNuzwUdbchVyw%2FIhqLUxTVq9nG3YjKhsFxOm9NXNHogAAc%2BBGlOrD7RNWN8PZmQnV4df44eI7uqxpfe2I%2FBxcQECVe54JQfDuaZqE10mCg6jO8lC0rrvsRIoCqgFSudWW%2BymhlXNEPP4mshnpJjzjEVX7CvBLo0elv8pqR0JZlw6JgzsgXKDFAm%2Bx0CLsYET4Jz2kDE5Dz%2FvhQSN2gU6ONBDqk8f3XVQwWJCfCoUYMYSDNvWPaNcSikeiaE72w8XsOMqge5SntlDLINCTHJ2U9fA%3D%3D--o4EjFIA4sJWvrt%2BZ--y0RlSnRdfP7A5dxCfK0H0Q%3D%3D; _ga_CSLL4ZEK4L=GS1.1.1724182803.7.0.1724182803.0.0.0; _ga=GA1.1.1666505655.1724154847; _ga_W1JNKHTW0Y=GS1.2.1724182803.7.0.1724182803.0.0.0',
            'Origin' => 'https://ais.usvisa-info.com',
            'Referer' => 'https://ais.usvisa-info.com/es-ec/niv/users/sign_in',
            'Sec-Fetch-Dest' => 'empty',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Site' => 'same-origin',
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
            'X-CSRF-Token' => '2tZKN0HYGRdvXBfsU4qLZWeItVN/da/Ez0w5yH7IMTAeFNUU54uzhD2D5gX4ovHDObs6sdnKQuXbFLHnMmItvA==',
            'X-Requested-With' => 'XMLHttpRequest',
            'numero' => '999199984',
            'sec-ch-ua' => '"Not)A;Brand";v="99", "Google Chrome";v="127", "Chromium";v="127"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"macOS"',
        ];
        $response = $apiServiceLogin->postRequest('', $loginCredentials, $headers);
        $cookies = $apiServiceLogin->getCookies()[0];
        $this->infoSys('Sesión iniciada con '.config('app_project.ms.consulado.username'));
        return ConsuladoRegisters::create([
            'cookie'    => $cookies['Name'],
            'cookie_full'    => $cookies['Value'],
        ]);
    }

    private function searchSchedules($cookieSession) {
        $apiService = new ApiRequestService(config('app_project.ms.consulado.consultaHorario'));
        $headers = [
            'Accept' => 'application/json, text/javascript, */*; q=0.01',
            'Accept-Language' => 'es-US,es;q=0.9,en-US;q=0.8,en;q=0.7,pt-BR;q=0.6,pt;q=0.5,es-419;q=0.4',
            'Connection' => 'keep-alive',
            'Cookie' => '_gid=GA1.2.572358975.1724154847; _ga_CSLL4ZEK4L=GS1.1.1724182803.7.1.1724183000.0.0.0; _ga=GA1.2.1666505655.1724154847; _gat=1; _yatri_session='.$cookieSession.'; _ga_W1JNKHTW0Y=GS1.2.1724182803.7.1.1724183026.0.0.0',
            'If-None-Match' => 'W/"95719114730f5df8c5bb65d7d13e7cfb"',
            'Referer' => 'https://ais.usvisa-info.com/es-ec/niv/schedule/61023130/appointment?confirmed_limit_message=1&commit=Continue',
            'Sec-Fetch-Dest' => 'empty',
            'Sec-Fetch-Mode' => 'cors',
            'Sec-Fetch-Site' => 'same-origin',
            'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/127.0.0.0 Safari/537.36',
            'X-CSRF-Token' => 'nnB60mCBrW6jofWfC5Grv/R32mJ1WuSyHRd0ydjeaMsK4vRrfHPFekHYQlmrLUO0AHFKpsFF8lE+4GA5aznXcg==',
            'X-Requested-With' => 'XMLHttpRequest',
            'numero' => '999199984',
            'sec-ch-ua' => '"Not)A;Brand";v="99", "Google Chrome";v="127", "Chromium";v="127"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"macOS"'
        ];
        $response = $apiService->getRequest('', $headers);
        return $response;
    }

    private function infoSys($message) {
        $this->info($message);
        Log::info($message);
    }
}
