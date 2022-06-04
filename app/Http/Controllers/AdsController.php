<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\AdsCreateRequest;
use App\Http\Requests\AdsUpdateRequest;
use App\Repositories\Interfaces\AdsRepository;
use App\Validators\AdsValidator;

/**
 * Class AdsController.
 *
 * @package namespace App\Http\Controllers;
 */
class AdsController extends Controller
{
    /**
     * @var AdsRepository
     */
    protected $repository;

    /**
     * @var AdsValidator
     */
    protected $validator;

    /**
     * AdsController constructor.
     *
     * @param AdsRepository $repository
     * @param AdsValidator $validator
     */
    public function __construct(AdsRepository $repository, AdsValidator $validator)
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
        $ads = $this->repository->getAll();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ads,
            ]);
        }

        return view('admin.ads.all', compact('ads'));
    }


    public function create()
    {
        return view('admin.ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AdsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(AdsCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $ad = $this->repository->createAds($request);

            $response = [
                'message' => 'Ads created successfully !',
                'data'    => $ad->toArray(),
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
                'message' => 'Create Ads failed !',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            // dd($errors);
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
        $ad = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $ad,
            ]);
        }

        return view('ads.show', compact('ad'));
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
        $ad = $this->repository->find($id);

        return view('admin.ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AdsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(AdsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $ad = $this->repository->updateAds($request, $id);

            $response = [
                'message' => 'Ads updated successfully !',
                'data'    => $ad->toArray(),
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
                'message' => 'Update ads failed !',
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
        $deleted = $this->repository->deleteAds($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Ads deleted successfully !',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'Ads deleted successfully !');
    }

    public function handle($id)
    {
       
        $banner = $this->repository->HideorShow($id);
        $message = $banner->status == 1?'Show ad successfully':'Hide ad successfully';

        return redirect()->back()->with('success',$message);
        
    }
}
