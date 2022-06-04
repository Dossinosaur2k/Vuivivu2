<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\BannersCreateRequest;
use App\Http\Requests\BannersUpdateRequest;
use App\Repositories\Interfaces\BannersRepository;
use App\Validators\BannersValidator;




/**
 * Class BannersController.
 *
 * @package namespace App\Http\Controllers;
 */
class BannersController extends Controller
{
    /**
     * @var BannersRepository
     */
    protected $repository;

    /**
     * @var BannersValidator
     */
    protected $validator;

    /**
     * BannersController constructor.
     *
     * @param BannersRepository $repository
     * @param BannersValidator $validator
     */
    public function __construct(BannersRepository $repository, BannersValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $banners = $this->repository->getAll();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $banners,
            ]);
        }

        return view('admin.banners.all', compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BannersCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */

    public function create()
    {
        return view('admin.banners.create');
    }
    public function store(BannersCreateRequest $request)
    {
        
        // dd($request->user()->id);
        // dd(Storage::disk('s3')->url($image));
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $banner = $this->repository->createBanner($request);

            $response = [
                'message' => 'Banners created successfully !',
                'data'    => $banner->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('success', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Create banner failed',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            
             return redirect()->back()->with('errors', $errors);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banner = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $banner,
            ]);
        }

        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner = $this->repository->findorfail($id);
      
        // dd($banner);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BannersUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(BannersUpdateRequest $request, $id)
    {

        // dd($request->all());
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $banner = $this->repository->updateBanner($request, $id);

            $response = [
                'message' => 'Banner updated successfully !',
                'data'    => $banner->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('success', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Update banner failed !',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            // dd($errors);
             return redirect()->back()->with('errors', $errors);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $deleted = $this->repository->deleteBanner($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Banners deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'Banners deleted.');
    }

    public function handle($id)
    {
       
        $banner = $this->repository->HideorShow($id);
        $message = $banner->status == 1?'Show banner successfully':'Hide banner successfully';

        return redirect()->back()->with('success',$message);
        
    }
}
