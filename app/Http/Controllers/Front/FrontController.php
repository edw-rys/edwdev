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
use App\Repositories\ViewsRepository;
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
     * $viewsRepository
     */
    protected $viewsRepository;
    /**
     * Front Controller
     */
    public function __construct(ViewsRepository $viewsRepository) {
        /**
         * Repositories
         */
        $this->viewsRepository = $viewsRepository;
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
            'popularity'    => 'front.pages.front.popularity',
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
        // $pageVisited = $request->cookie('is_visited');
        $visit_id = visitPage();
        // 
        return view($this->views->front)
            ->with('data', $this->data)
            ->with('visit_id', $visit_id)
            ;
    }

    public function visitors()
    {
        $visit_id = visitPage();

        $data = getDataShow()->map(function($item){return [$item->country_name , $item->total];});
        $data->prepend(['Country', 'Popularity']);
        // dd($data);
        // 
        return view($this->views->popularity)
            ->with('data', $this->data)
            ->with('visit_id', $visit_id)
            ->with('data', $data)
            ;
    }
    /**
     * @param $id
     */
    public function setVisitPage($id)
    {
        setVisitPage($id);
        return response()->json([]);
    }

    /**
     * List a items
     */
    public function getWorksView($page, $take)
    {
        if (request('get-prev-cards') != 'shows') {
            return redirect()->route('front.index');
        }
        $visit_id = visitPage();

        $works = Works::where('status', 'active')
            ->orderBy('id','desc')
            ->with('type')
            ->paginate($take, ['*'], 'page', $page);

        // dd($works);
        return view($this->views->works_list)
            ->with('works', $works)
            ->with('visit_id', $visit_id)
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
    /**
     * Show a item
     * @param $system_name
     */
    public function showWork($system_name)
    {

        $work = Works::where('system_name', $system_name)
            ->with([
                'childs','childs.items'
            ])
            ->first();
        if ($work == null) {
            abort(404);
        }
        return view('front.pages.front.works.show')
            ->with('item', $work);
    }
    
}
