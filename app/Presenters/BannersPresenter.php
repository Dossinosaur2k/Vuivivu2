<?php

namespace App\Presenters;

use App\Transformers\BannersTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class BannersPresenter.
 *
 * @package namespace App\Presenters;
 */
class BannersPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BannersTransformer();
    }
}
