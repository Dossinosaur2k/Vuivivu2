<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\PostsRepository;
use App\Entities\Posts;
use App\Validators\PostsValidator;
use Cviebrock\EloquentSluggable\Services\SlugService;


/**
 * Class PostsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PostsRepositoryEloquent extends BaseRepository implements PostsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Posts::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return PostsValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
    public function getAll($number)
    {
        $perPage = $number;
        $posts = $this->model()::orderBy('created_at','desc')->paginate($perPage);
        return $posts;
    }

    public function getBy($number)
    {
        $perPage = $number;
        $posts = $this->model()::orderBy('created_at','desc')->take($number)->get();
        return $posts;
    }

    public function createPost($request)
    {
        $imageName = uploadFile($request);
        $slug = SlugService::createSlug($this->model(), 'slug', $request->name);
        $post = $this->model()::create([
            'User_id' => $request->user()->id,
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => $slug,
            'title' => $request->title,
            'content' => $request->content,
            'image_path' => $imageName,
        ]);
        return $post;
    }

    public function updatePost($request,$id)

    {
        $post = $this->model()::findorfail($id);
        // dd($post);
        $slug = SlugService::createSlug($this->model(), 'slug', $request->name);
        if($request->file('image'))
        {
            
            $imageName = uploadFile($request);
            $removeImage = removeFile($post->image_path);
            
            $post->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'slug' => $slug,
                'title' => $request->title,
                'content' => $request->content,
                'image_path' => $imageName,
           ]);
        }
        else {
            $post->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'slug' => $slug,
                'title' => $request->title,
                'content' => $request->content,
            ]);
        }
        return $post;

    }

    public function deletePost($id)

    {
        $banner = $this->model()::findorfail($id);
        $removeImage = removeFile($banner->image_path);
        $deleted = $banner->delete();

        return $deleted;

    }

    public function findbySlug($slug)
    {
        $post = $this->model()::where('slug','like',$slug)->first();
        return $post;
    }
}
