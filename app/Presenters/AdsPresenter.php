<?php

namespace App\Presenters;

use App\Transformers\AdsTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class AdsPresenter.
 *
 * @package namespace App\Presenters;
 */
class AdsPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new AdsTransformer();
    }
}
