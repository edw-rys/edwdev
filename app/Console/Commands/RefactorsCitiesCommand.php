<?php

namespace App\Console\Commands;

use App\Models\Invoice;
use App\Models\Item_Planilla;
use App\Models\Lineitem;
use App\Repositories\ViewsRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RefactorsCitiesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refactor-cities';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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



        /*(new ViewsRepository)
            ->whereNull('country_code')
            ->chunk(200, function($listIpsAssigments ){
                foreach ($listIpsAssigments as $key => $item) {
                    (new ViewsRepository)->where('ip_address', $item->ip_address)->whereNull('country_code')->update([
                        'city'  => $item->city, 
                        'region_code'   => $item->region_code, 
                        'region'    => $item->region,
                        'region_name'   => $item->region_name, 
                        'country_code'  => $item->country_code, 
                        'country_name'  => $item->country_name, 
                        'continent_code'    => $item->continent_code, 
                        'continent_name'    => $item->continent_name, 
                        'latitude'  => $item->latitude, 
                        'longitude' => $item->longitude, 
                        'timezone'  => $item->timezone, 
                        'location_accuracy_radius'  => $item->location_accuracy_radius 
                    ]);
                }
            })
        ;*/
        $viewsRepository = (new ViewsRepository )
            ->getModel()
            ->whereNull('country_code')
            ->chunk(100, function($items){

                foreach ($items as $key => $item) {
                    # code...
                    // dd("http://www.geoplugin.net/json.gp?ip=".$item->ip_address,$item->ip_address,$item);
                    if($item->ip_address == '127.0.0.1' || $item->country_code || $item->ip_address=='165.231.98.180' ){
                        continue;
                    }
                    $arrContextOptions=array(
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );
                    try {
                        $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$item->ip_address);
                    } catch (\Throwable $th) {
                        continue;
                    }
                        // $informacionSolicitud = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$item->ip_address, false, stream_context_create($arrContextOptions));

                        // Convertir el texto JSON en un array
                    $dataSolicitud = json_decode($informacionSolicitud);
                    if($dataSolicitud->geoplugin_status >= 200 && $dataSolicitud->geoplugin_status< 300){

                        // dd($item->toArray(), $dataSolicitud->geoplugin_status);   

                        (new ViewsRepository )->where('ip_address', $item->ip_address)
                            ->update([
                                'city'  => $dataSolicitud->geoplugin_city ?? null,
                                'region_code'   => $dataSolicitud->geoplugin_regionCode?? null,
                                'region'    => $dataSolicitud->geoplugin_region?? null,
                                'region_name'   => $dataSolicitud->geoplugin_regionName?? null,
                                'country_code'  => $dataSolicitud->geoplugin_countryCode?? null,
                                'country_name'  => $dataSolicitud->geoplugin_countryName?? null,
                                'continent_code'    => $dataSolicitud->geoplugin_continentCode?? null,
                                'continent_name'    => $dataSolicitud->geoplugin_continentName?? null,
                                'latitude'  => $dataSolicitud->geoplugin_latitude?? null,
                                'longitude' => $dataSolicitud->geoplugin_longitude?? null,
                                'timezone'  => $dataSolicitud->geoplugin_timezone?? null,
                                'location_accuracy_radius'  => $dataSolicitud->geoplugin_locationAccuracyRadius?? null,
                            ]);
                        // dd($item->toArray());
                        // $item->city = $dataSolicitud->geoplugin_city;
                        // $item->region_code = $dataSolicitud->geoplugin_regionCode;
                        // $item->region = $dataSolicitud->geoplugin_region;
                        // $item->region_name = $dataSolicitud->geoplugin_regionName;
                        // $item->country_code = $dataSolicitud->geoplugin_countryCode;
                        // $item->country_name = $dataSolicitud->geoplugin_countryName;
                        // $item->continent_code = $dataSolicitud->geoplugin_continentCode;
                        // $item->continent_name = $dataSolicitud->geoplugin_continentName;
                        // $item->latitude = $dataSolicitud->geoplugin_latitude;
                        // $item->longitude = $dataSolicitud->geoplugin_longitude;
                        // $item->timezone = $dataSolicitud->geoplugin_timezone;
                        // $item->location_accuracy_radius = $dataSolicitud->geoplugin_locationAccuracyRadius;
                        // $item->save();
                        // dd($item);
                        $this->info('Visita desde '. $dataSolicitud->geoplugin_countryName);
                    }
                }
            });
        // dd($viewsRepository);

    }
}
