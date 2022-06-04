<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\TourCreateRequest;
use App\Http\Requests\TourUpdateRequest;
use App\Repositories\Interfaces\TourRepository;
use App\Repositories\Interfaces\BannersRepository;
use App\Repositories\Interfaces\AdsRepository;
use App\Repositories\Interfaces\PostsRepository;
use App\Validators\TourValidator;


use Illuminate\Support\Facades\Storage;
/**
 * Class ToursController.
 *
 * @package namespace App\Http\Controllers;
 */
class ToursController extends Controller
{
    /**
     * @var TourRepository
     */
    protected $tour;

    /**
     * @var TourValidator
     */
    protected $validator;

    /**
     * ToursController constructor.
     *
     * @param TourRepository $repository
     * @param TourValidator $validator
     */
    public function __construct(
        TourRepository $repository, 
        TourValidator $validator,
        BannersRepository $banner,
        AdsRepository $ads,
        PostsRepository $post
        )
    {
        $this->tour = $repository;
        $this->validator  = $validator;
        $this->banner = $banner;
        $this->ads = $ads;
        $this->post = $post;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        // $tours = $this->repository->getAll();

        // $website = $this->repository->getWebsite($request);
        // dd($website);
        $banners = $this->banner->getAllActive();
        $ads = $this->ads->getAllActive();
        $posts = $this->post->getBy(6);
        // dd(Storage::disk('s3')->url($banners['0']->image_path));
        return view('pages.tour-index', compact('banners','ads','posts'));
    }

    public function search(Request $request)
    {
        // try
        // {
        // $data = $request->validate([
        // 'key' => 'required|string|max:255',
        // // 'price' => 'numeric',
        // ]);
        // }
        // catch (\Exception $e)
        // {
        //     return redirect()->back();
        // }
        // dd($params);
        $tours = $this->tour->pagination($request);
        $website = $this->tour->getWebsite($request);
        $total = $tours->total();
        // dd($tours);
        $data = [
            'tours' => $tours,
            'website' => $website,
            'total' => $total,
        ];
        // dd($data);
        return view('pages.tours')->with('data', $data);
    }
}
