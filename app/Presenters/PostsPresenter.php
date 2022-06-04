<?php

namespace App\Presenters;

use App\Transformers\PostsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class PostsPresenter.
 *
 * @package namespace App\Presenters;
 */
class PostsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new PostsTransformer();
    }
}
