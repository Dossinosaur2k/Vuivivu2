<?php

namespace App\Http\Controllers;

use App\Entities\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests\PostsUpdateRequest;
use App\Repositories\Interfaces\PostsRepository;
use App\Repositories\Interfaces\CategoriesRepository;
use App\Validators\PostsValidator;

/**
 * Class PostsController.
 *
 * @package namespace App\Http\Controllers;
 */
class PostsController extends Controller
{
    /**
     * @var PostsRepository
     */
    protected $post;

    /**
     * @var PostsValidator
     */
    protected $validator;

    /**
     * PostsController constructor.
     *
     * @param PostsRepository $repository
     * @param PostsValidator $validator
     */
    public function __construct(
        PostsRepository $post,
        PostsValidator $validator,
        CategoriesRepository $categories)
    {
        $this->post = $post;
        $this->validator  = $validator;
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->post->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->post->getAll();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('admin.post.all', compact('posts'));
    }

    public function indexPage()
    {
        $this->post->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $posts = $this->post->getAll();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $posts,
            ]);
        }

        return view('pages.blog', compact('posts'));
    }

    public function create()
    { 
        $categories = $this->categories->getAll();
        return view('admin.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PostsCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PostsCreateRequest $request)
    {
        // dd($request->all());
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $post = $this->post->createPost($request);

            $response = [
                'message' => 'Post created successfully',
                'data'    => $post->toArray(),
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
                'message' => 'Create post failed',
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
    public function show($slug)
    {
        $post = $this->post->findbySlug($slug);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $post,
            ]);
        }
        
        return view('pages.blog-single', compact('post'));
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
        $categories = $this->categories->getAll();
        $post = $this->post->find($id);

        return view('admin.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PostsUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PostsUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $post = $this->post->updatePost($request, $id);

            $response = [
                'message' => 'Post updated successfully !',
                'data'    => $post->toArray(),
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
                'message' => 'Update post failed !',
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
        $deleted = $this->post->deletePost($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Post deleted successfully !',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('success', 'Post deleted successfully !');
    }
}
