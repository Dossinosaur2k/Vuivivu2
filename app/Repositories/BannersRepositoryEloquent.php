<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\BannersRepository;
use App\Entities\Banners;
use App\Validators\BannersValidator;

/**
 * Class BannersRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BannersRepositoryEloquent extends BaseRepository implements BannersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Banners::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return BannersValidator::class;
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
        $perpage=15;
        $banners = $this->model()::paginate($perpage);
        return $banners;
    }

    public function getAllActive()
    {
        $perpage=15;
        $banners = $this->model()::where('status','<>',0)->paginate($perpage);
        return $banners;
    }
    public function createBanner($request)
    {
      
           
        $imageName = uploadFile($request);
        $banner = $this->model()::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'description' => $request->description,
            'image_path' => $imageName,
            'url' => $request->url,
        ]);
 
        return $banner;

    }

    public function updateBanner($request,$id)
    {
        $banner = $this->model()::findorfail($id);
        // dd($banner);
        if($request->file('image'))
        {
            
            $imageName = uploadFile($request);
            $removeImage = removeFile($banner->image_path);

            $banner->update([
                'name' => $request->name,
                'description' => $request->description,
                'url' => $request->url,
                'image_path' => $imageName,
                'status' => $request->status
            ]);
        }
        else {
            $banner->update([
                'name' => $request->name,
                'description' => $request->description,
                'url' => $request->url,
                'status' => $request->status
            ]);
        }
        return $banner;
    }

    public function HideorShow($id)
    {
        $banner = $this->model()::findorfail($id);
        if($banner->status == 1) 
        {
            $banner->update([
                'status' => 0,
            ]);
        }
        else
        {
            $banner->update([
                'status' => 1,
            ]);
        }
        return $banner;
    }


    public function deleteBanner($id)
    {
        $banner = $this->model()::findorfail($id);
        $removeImage = removeFile($banner->image_path);
        $deleted = $banner->delete();

        return $deleted;
    }
}
