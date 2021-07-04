<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\PersonalGoals;
use App\Models\Services;
use App\Models\TypeExperience;
use App\Models\TypeWorks;
use App\Models\Works;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'front'         => 'front.pages.front.index',
            'works_list'    => 'front.pages.front.sections.works_list',
        ];

        $this->take = 4;
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
            'types_experience'      => TypeExperience::where('status', 'active')->with('experiences')->get(),
            'type_works'            => TypeWorks::where('status', 'active')->get(),
            'works'                 => Works::with('type')->where('status', 'active')->orderBy('id', 'desc')->take($this->take)->paginate($this->take),
            'works_count'                 => Works::where('status', 'active')->orderBy('id', 'desc')->take($this->take)->count()
            // 'services'              => config('app_project.services'),
        ];
         
        // $this->routes = [];
    }
    /**
     * 
     */
    public function index(Request $request)
    {
        
        dd($request->getClientIps(), $request->getClientIp(), $request->server());

        return view($this->views->front)
            ->with('data', $this->data)
            ;
    }
    /**
     * List a items
     */
    public function getWorksView($page, $take)
    {
        $works = Works::where('status', 'active')
            ->orderBy('id','desc')
            ->with('type')
            ->paginate($take, ['*'], 'page', $page);

        // dd($works);
        return view($this->views->works_list)
            ->with('works', $works)
            // ->render()
            ;
    }
    /**
     * Submit mail
     * @param Request $request
     */
    public function sendEmail(ContactRequest $request)
    {
        Mail::to(config('app_project.emails.send'))->queue( new ContactMail($request->input('message'), $request->input('subject'), $request->input('name'), $request->input('email')));

        return response()->json([
            'type'      => 'success',
            'message'   => 'Correo enviado',
            'token'     => csrf_token()
        ]);
    }
    
}
