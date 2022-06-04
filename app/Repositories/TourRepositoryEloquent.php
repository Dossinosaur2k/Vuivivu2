<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\TourRepository;
use App\Entities\Tour;
use App\Validators\TourValidator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class TourRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TourRepositoryEloquent extends BaseRepository implements TourRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tour::class;
    }

    /**
     * Specify Validator class name
     *
     * @return mixed
     */
    public function validator()
    {

        return TourValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAll($params)
    {
        $perPage = 15;
        switch ($params->filter) {
            case 'desc':
                $tours = $this->model()::orderBy('Tour_price', $params->filter)
                    ->paginate($perPage);
                break;
            case 'asc':
                $tours = $this->model()::orderBy('Tour_price')
                    ->paginate($perPage);
                break;
            default:
                $tours = $this->model()::paginate($perPage);
        }

        return $tours;
    }



    public function getTour($params)
    {
        $key = convert_no_vietnamese($params->key);
        $price = intval($params->price);
        $filter = $params->filter;
        $website = $params->website;
        $perPage = 15;
        $currentPage = $params->input('page', 1);

        $path = $this->getPath($params);







        if ($key) {
            $tours = $this->model::where('Tour_name_no_vietnamese', 'like', '%' . $key . '%');
            // $path = $path.'key='.$key;
            if ($price) {
                $tours = $tours->where('Tour_price', '<', $price)
                        ->where('Tour_price', '<>', 0);
                // $path = $path.'&price='.$price;

            }
            if ($website) {
                $tours = $tours->where('Web_name', 'like', '%' . $website . '%');
                // $path = $path.'&website='.$website;
            }
        }
        else
        {
            $tours = $this->model()::where('Tour_name','like','%%');
        }



        if ($filter == 'desc') {
            $tours = $tours->orderBy('Tour_price', $filter)
                        ->where('Tour_price', '<>', 0);;
            // $path = $path.'&filter='.$filter;
        } else if ($filter == 'asc') {
            $tours = $tours->where('Tour_price', '<>', 0)
                            ->orderBy('Tour_price');
            // $path = $path.'&filter='.$filter;
        }


        // $tmp_tours = $tours;

        // $offset = $tours?($currentPage - 1) * $perPage : 0;

        // $total = $tours->count();
        // $results = $tours->offset($offset)
        //             ->limit($perPage)
        //             ->get();

        // $tours = new LengthAwarePaginator($results,$total,$perPage,$currentPage,[
        //     'path' => Paginator::resolveCurrentPath().$path,
        //     'pageName' => 'page'],
        // );

        // $dbtour2 = deepFlatten($tmp_tours->limit($total)->get()->toarray());

        // $websites = deepFlatten($tmp_tours->distinct('Web_logo')->get()->toArray());

        // $data_website = [];



        // foreach ($websites as $key => $website)
        //     {
        //         foreach ($dbtour2 as $key => $tour)
        //         {
        //         if($tour === $website)
        //         {
        //             if (!isset($data_website[$tour]))
        //                 $data_website[$tour]=1;
        //             else
        //                 $data_website[$tour]+=1;
        //         }
        //      }
        //     }
        // $data = [
        //     'website' => $data_website,
        //     'tours' => $tours,
        //     'total' => $total,
        //     'path' => $path,
        // ];
        return $tours;
    }

    public function getWebsite($request)
    {
        $tours = deepFlatten($this->getTour($request)->get()->toarray());
        $websites = deepFlatten($this->getTour($request)->distinct('Web_name')
            ->get()->toArray());
        $data_website = [];

        foreach ($websites as $key => $website) {
            foreach ($tours as $key => $tour) {
                if ($tour === $website) {
                    if (!isset($data_website[$tour]))
                        $data_website[$tour] = 1;
                    else
                        $data_website[$tour] += 1;
                }
            }
        }
        return ($data_website);
    }


    public function pagination($request)
    {

        $model = $this->getTour($request);
        $path = $this->getPath($request);

        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = $model ? ($currentPage - 1) * $perPage : 0;

        $total = $model->count();
        $results = $model->offset($offset)
            ->limit($perPage)
            ->get();

        $tours = new LengthAwarePaginator(
            $results,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath() . $path,
                'pageName' => 'page'
            ],
        );
        return  $tours;
    }

    public function getPath($request)
    {
        $key = $request->key;
        $price = intval($request->price);
        $filter = $request->filter;
        $website = $request->website;

        $path = '?';
        $requests = $request->request->all();
        if ($key) {

            $path = $path . 'key=' . $key;
            if ($price) {

                $path = $path . '&price=' . $price;
            }
            if ($website) {
                $path = $path . '&website=' . $website;
            }
        }

        if ($filter == 'desc') {

            $path = $path . '&filter=' . $filter;
        } else if ($filter == 'asc') {

            $path = $path . '&filter=' . $filter;
        }
        return $path;
    }
}
