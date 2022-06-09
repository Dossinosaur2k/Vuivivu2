<?php
namespace App\Traits;

use Analytics;
use Spatie\Analytics\Period;

trait AnalyticTrait
{

   
    public function getTotalVisistorAndPageViews($period)
    {
        $data = [];
        $totalvisistorandpageview = Analytics::fetchTotalVisitorsAndPageViews(Period::days($period));

        $data['date'] = $totalvisistorandpageview->pluck('date');
        $data['visitors'] = $totalvisistorandpageview->pluck('visitors');
        $data['pageViews'] = $totalvisistorandpageview->pluck('pageViews');

        return $data;
    }

    public function getTotalVisitorsAndPageViewsInPeriod($startDay, $endDay)
    {
        $data = [];
        $totalvisistorandpageview = Analytics::fetchTotalVisitorsAndPageViews(Period::create($startDay, $endDay));
        $data['date'] = $totalvisistorandpageview->pluck('date');
        $data['visitors'] = $totalvisistorandpageview->pluck('visitors');
        $data['pageViews'] = $totalvisistorandpageview->pluck('pageViews');

        return $data;
    }

    public function getMostVisitedPages($period)
    {
        $mostvisitedpages = Analytics::fetchMostVisitedPages(Period::days($period));
        return $mostvisitedpages;
    }
    
    public function getTopReferrers($period)
    {
        $topReferrers = Analytics::fetchTopReferrers(Period::days($period));
        return $topReferrers;
    }
    
    public function getUserType($period)
    {
        $data = [];
        $userType = Analytics::fetchUserTypes(Period::days($period));
        $data['type']=$userType->pluck('type');
        $data['sessions'] = $userType->pluck('sessions');
        return $data;
    }

    public function getTopBrowsers($period,int $max)
    {
        $data = [];
        $topBrowser = Analytics::fetchTopBrowsers(Period::days($period), $max);
        $data['browser']=$topBrowser->pluck('browser');
        $data['sessions']=$topBrowser->pluck('sessions');
        return $data;
    }
}
