<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Repositories\Interfaces\PostsRepository;

class PageController extends Controller
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
        PostsRepository $post
        )
    {
        $this->post = $post;
      
    }

    public function index()
    {
        $posts = $this->post->getAll();
        return view('pages.index',compact('posts'));
    }

}
