<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\CategoriesRepository;
use App\Entities\Categories;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Validators\CategoriesValidator;

/**
 * Class CategoriesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoriesRepositoryEloquent extends BaseRepository implements CategoriesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categories::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategoriesValidator::class;
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
        $perPage = 15;
        $categories = $this->model()::paginate($perPage);
        return $categories;
    }
    
    public function createCategory($param)
    {
        $slug = SlugService::createSlug($this->model(), 'slug', $param['name']);
        $category = $this->model()::create([
            'name' => $param['name'],
            'slug' => $slug,
            'description' => $param['description'],
        ]);
        return $category;
    }

}
