<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\PersonalGoals;
use App\Models\Services;
use App\Models\TypeExperience;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Data this project
     */
    private $data ;
    /**
     * Views
     */
    private $views ;

    /**
     * Front Controller
     */
    public function __construct() {
        /**
         * Routes
         */
        $this->routes = [];
        /**
         * Views
         */
        $this->views = (object) [
            'front' => 'front.pages.front.index'
        ];

        /**
         * Data front
         */
        $this->data = (object) [
            'socialMedia'           => config('app_project.social-media'),
            'habilities'            => config('app_project.habilities'),
            'about'                 => config('app_project.about'),
            'name'                  => config('app_project.name'),
            'more'                  => PersonalGoals::where('status', 'active')->get(),
            // 'more'                  => config('app_project.more'),
            'percentage_habilities' => config('app_project.percentage_habilities'),
            'services'              => Services::where('status', 'active')->get(),
            'types_experience'            => TypeExperience::where('status', 'active')->with('experiences')->get()
            // 'services'              => config('app_project.services'),
        ];
         
        // $this->routes = [];
    }
    /**
     * 
     */
    public function index()
    {
        // notify()->success('Laravel Notify is awesome!');
        return view($this->views->front)
            ->with('data', $this->data)
            ;
    }
}
