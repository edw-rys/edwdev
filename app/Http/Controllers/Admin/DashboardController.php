<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ViewsRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * $viewsRepository
     */
    protected $viewsRepository;
    /**
     * Views
     */
    private $views;
    /**
     * Construct of Dashboard
     */
    public function __construct(ViewsRepository $viewsRepository) {
        /**
         * Repositories
         */
        $this->viewsRepository = $viewsRepository;
        /**
         * Views
         */
        $this->views = (object) [
            'index'     => 'admin.pages.dashboard.index'
        ];
    }
    /**
     * Show a index view
     * @return Application|Factory|View
     */
    public function index()
    {
        viewExist($this->views->index);
        
        $year = Carbon::now()->year();

        $views = $this->viewsRepository
            ->count();

        $viewsMonth = [];
        foreach ([1,2,3,4,5,6,7,8,9,10,11,12] as $key => $value) {
            $viewsMonth[$key] = $this->viewsRepository
                ->whereMonth('created_at', $value)
                ->count();
        }

        

        return view($this->views->index)
            ->with('viewsMonth', $viewsMonth)
            ->with('views', $views);
    }
}
