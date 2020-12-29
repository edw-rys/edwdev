<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontController extends Controller
{
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
            'front' => 'front.index'
        ];

        // $this->routes = [];
    }
    /**
     * 
     */
    public function index()
    {
        return view($this->views->front);
    }
}
