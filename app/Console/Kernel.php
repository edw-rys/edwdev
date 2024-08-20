<?php
// php /var/www/vhosts/edw-dev.com/httpdocs/app/artisan refactor-cities
namespace App\Console;

use App\Console\Commands\RefactorsCitiesCommand;
use App\Models\NextTimeScheduleRun;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        RefactorsCitiesCommand::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('refactor-cities')->everySixHours();
        $commandName = 'check:consulado-schedules';
        $processCommand = NextTimeScheduleRun::where('command_name', $commandName)->first();
        if($processCommand == null){
            $processCommand = NextTimeScheduleRun::create([
                'command_name'  => $commandName,
                'next_execute'  => now()
            ]);
        }
        try {
            if ($processCommand->next_execute->format('Y-m-d H:i') >= Carbon::now()->format('Y-m-d H:i')) {
                $schedule->command($commandName)->everyMinute();
                Log::info('Proceso finalizado '. now());
                if($processCommand->next_execute->format('Y-m-d H:i') == NextTimeScheduleRun::where('command_name', $commandName)->first()->next_execute){
                    $processCommand->next_execute = Carbon::now()->addMinute(4);
                }
                $processCommand->last_execute = now();
                $processCommand->save();
            }
        } catch (\Throwable $th) {
            Log::info('Error en Kernel.php: '. $th->getMessage());
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
