<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\AdsRepository;
use App\Entities\Ads;
use App\Validators\AdsValidator;

/**
 * Class AdsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdsRepositoryEloquent extends BaseRepository implements AdsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Ads::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return AdsValidator::class;
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
        $ads = $this->model()::paginate($perPage);
        return $ads;
    }

    public function getAllActive()
    {
        $perpage=15;
        $ads = $this->model()::where('status','<>',0)->paginate($perpage);
        return $ads;
    }
    public function createAds($request)
    {
      
        $imageName = uploadFile($request);
        $ad = $this->model()::create([
            'user_id' => $request->user()->id,
            'name' => $request->name,
            'image_path' => $imageName,
            'url' => $request->url,
        ]);
 
        return $ad;

    }

    public function updateAds($request,$id)
    {
        $ad = $this->model()::findorfail($id);
        // dd($ad);
        if($request->file('image'))
        {
            
            $imageName = uploadFile($request);
            $removeImage = removeFile($ad->image_path);

            $ad->update([
                'name' => $request->name,
                'url' => $request->url,
                'image_path' => $imageName,
                'status' => $request->status
            ]);
        }
        else {
            $ad->update([
                'name' => $request->name,
                'url' => $request->url,
                'status' => $request->status
            ]);
        }
        return $ad;
    }


    public function deleteAds($id)
    {
        $ad = $this->model()::findorfail($id);
        $removeImage = removeFile($ad->image_path);
        $deleted = $ad->delete();

        return $deleted;  
    }

    public function HideorShow($id)
    {
        $ad = $this->model()::findorfail($id);
        if($ad->status == 1) 
        {
            $ad->update([
                'status' => 0,
            ]);
        }
        else
        {
            $ad->update([
                'status' => 1,
            ]);
        }
        return $ad;
    }
}
