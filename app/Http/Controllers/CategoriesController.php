<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoriesCreateRequest;
use App\Http\Requests\CategoriesUpdateRequest;
use App\Repositories\Interfaces\CategoriesRepository;
use App\Validators\CategoriesValidator;

/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriesController extends Controller
{
    /**
     * @var CategoriesRepository
     */
    protected $repository;

    /**
     * @var CategoriesValidator
     */
    protected $validator;

    /**
     * CategoriesController constructor.
     *
     * @param CategoriesRepository $repository
     * @param CategoriesValidator $validator
     */
    public function __construct(CategoriesRepository $repository, CategoriesValidator $validator)
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
        $categories = $this->repository->getAll();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categories,
            ]);
        }
        // dd($categories);
        return view('admin.categories.all')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoriesCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */


    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(CategoriesCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $category = $this->repository->createCategory($request->all());

            $response = [
                'message' => 'Category created successfully !',
                'data'    => $category->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }
            // dd($response);
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Creat category failed',
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
        $category = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $category,
            ]);
        }

        return view('categories.show', compact('category'));
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
        $category = $this->repository->find($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriesUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CategoriesUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $category = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Category updated successfully !',
                'data'    => $category->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            $errors = [
                'message' => 'Update category failed',
                'errorBag' => $e->getMessageBag()->getMessages()
            ];
            
  
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
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Category deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'Category deleted.');
    }
}
