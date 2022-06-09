<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\Interfaces\PostsRepository;
use Spatie\Analytics\Analytics;
use Spatie\Analytics\Period;
use Illuminate\Support\Carbon;

use App\Traits\AnalyticTrait;

class PageController extends Controller
{
    use AnalyticTrait;
    /**
     * @var PostsRepository
     */
    protected $post;

    /**
     * @var PostsValidator
     */
    protected $validator;

    /**
     * PostsController constructor.
     *
     * @param PostsRepository $repository
     * @param PostsValidator $validator
     */
    public function __construct(
        PostsRepository $post,
        Analytics $analytics
        )
    {
        $this->post = $post;
        $this->analytics = $analytics;
      
    }

    public function index()
    {
        $posts = $this->post->getAll();
        return view('pages.index',compact('posts'));
    }

    public function index_dashbroad()
    {
     
       
        // get data from this week
        $data = $this->getTotalVisistorAndPageViews(6);
        // get data from last week
        $oldWeekData = $this->getTotalVisitorsAndPageViewsInPeriod(
            Carbon::today()->subDays(12+1)->startOfDay(),
            Carbon::today()->subDays(5+1)->startOfDay()
        );
    
        // dd($oldWeekData);
        $maxVisitors = Findmax($data['visitors']->max(),$oldWeekData['visitors']->max());
        
        // $mostVisitedPage = $this->getMostVisitedPages(7);
        // dd($mostVisitedPage);
        $topReferrers = $this->getTopReferrers(29);
        // dd($topReferrers);
        // $test = $this->getTotalVisistorAndPageViews(1);
        // dd($test);
        
        return view('admin.index',compact('data','oldWeekData','maxVisitors','topReferrers'));
    }

}
