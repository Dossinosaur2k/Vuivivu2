<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Traits\AnalyticTrait;
use App\Exports\ExportTotalVisitorPageViewFile;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class AnalyticsController extends Controller
{
    use AnalyticTrait;
    public function index()
    {
        // $data = [];
        // $totalVisistorsAndPageViews = $this->analytics->fetchTotalVisitorsAndPageViews(Period::days(7));
        // $data['date'] = $totalVisistorsAndPageViews->pluck('date');
        // dd($data);
        // return $data;
    }

    public function analyticVisistor(Request $request)
    {
        if ($request->date_range) {
            $dateRange = explode('-', $request->date_range);

            $startDay = Carbon::createFromFormat('d/m/Y', trim($dateRange[0]))->startOfDay();
            $endDay = Carbon::createFromFormat('d/m/Y', trim($dateRange[1]))
                ->startOfDay()
                ->diff(Carbon::today())
                ->days > 1
                ? Carbon::createFromFormat('d/m/Y', trim($dateRange[1]))->startOfDay() : Carbon::today();

            $data = $this->getTotalVisitorsAndPageViewsInPeriod(
                $startDay,
                $endDay
            );
            $maxVisitors = $data['visitors']->max();
            // dd($startDay);
            return view('admin.charts.chartVisistor', compact('data', 'maxVisitors', 'startDay', 'endDay'));
        } else {

            $data = $this->getTotalVisistorAndPageViews(6);
            $maxVisitors = $data['visitors']->max();
            // get data from last week
            // $oldWeekData = $this->getTotalVisitorsAndPageViewsInPeriod(
            //     Carbon::today()->subDays(14+1)->startOfDay(),
            //     Carbon::today()->subDays(7+1)->startOfDay()
            // );

            // dd($oldWeekData);
            // $maxVisitors = Findmax($data['visitors']->max(),$oldWeekData['visitors']->max());

            // $mostVisitedPage = $this->getMostVisitedPages(7);
            // dd($mostVisitedPage);
            // $topReferrers = $this->getTopReferrers(29);
            // dd($topReferrers);
            // dd($data);
            return view('admin.charts.chartVisistor',compact('data','maxVisitors'));
        }
        //  dd($data);

    }

    public function analyticUserType()
    {
        $userType = $this->getUserType(365);
        $topBrowsers = $this->getTopBrowsers(365,6);
        // dd(json_encode($topBrowsers['browser']));
        // dd($userType);
        return view('admin.charts.chartUserType', compact('userType','topBrowsers'));
    }

    public function export($dateRange)
    {
        $date_range=$dateRange;
        if ($dateRange) {
            $dateRange = explode('.', $dateRange);

            $startDay = Carbon::createFromFormat('d-m-Y', trim($dateRange[0]))->startOfDay();
            $endDay = Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))
                ->startOfDay()
                ->diff(Carbon::today())
                ->days < 1
                ? Carbon::createFromFormat('d-m-Y', trim($dateRange[1]))->startOfDay() : Carbon::today();

            $data = $this->getTotalVisitorsAndPageViewsInPeriod(
                $startDay,
                $endDay
            );
        }
        else
        {
            return redirect()->back();
        }
        
        // $point = [
        //     [1, 2, 3],
        //     [2, 5, 9]
        // ];
        // $data = (object) array(
        //         'points' => $point,
        //     );
        
        $date = $data['date']->map(function ($d){return $d->format('d/m/Y');})->toArray();
        $visitors = $data['visitors']->toArray();
        $pageviews = $data['pageViews']->toArray();
        
        $dataout = [];
        foreach ($date as $key => $value) 
        {
            array_push($dataout,array($key+1,$date[$key],$visitors[$key],$pageviews[$key]));
        }
        // $dataout = (object) array(
        //             'dataout' => $dataout,
        //         );
        // dd($dataout);
        $export = new ExportTotalVisitorPageViewFile($dataout);
        return Excel::download($export, time().'-visitor&pageview-'.str_replace('.','to',$date_range).'.xlsx');
    }
}
