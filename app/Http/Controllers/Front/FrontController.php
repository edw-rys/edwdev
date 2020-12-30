<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
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
            'socialMedia'   => config('app_project.social-media'),
            'habilities'    => config('app_project.habilities'),
            'about'         => config('app_project.about'),
            'name'          => config('app_project.name'),
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
