<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CrawlHistoryRepository;
use App\Entities\CrawlHistory;
use App\Validators\CrawlHistoryValidator;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CrawlHistoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CrawlHistoryRepositoryEloquent extends BaseRepository implements CrawlHistoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CrawlHistory::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CrawlHistoryValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getAll()
    {
        $histories = $this->model()::orderBy('time','desc');
        return $histories;
    }

    public function pagination($request){
        $model = $this->getAll();
        $perPage = 15;
        $currentPage = $request->input('page', 1);
        $offset = $model ? ($currentPage - 1) * $perPage : 0;
       
        $total = $model->count();
        $result = $model->offset($offset)->limit($perPage)->get();

        $histories = new LengthAwarePaginator(
            $result,
            $total,
            $perPage,
            $currentPage,
            [
                'path' => Paginator::resolveCurrentPath(),
                'pageName' => 'page'
            ]
            );

        return $histories;
    }
}
