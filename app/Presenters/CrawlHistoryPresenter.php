<?php

namespace App\Presenters;

use App\Transformers\CrawlHistoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CrawlHistoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class CrawlHistoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CrawlHistoryTransformer();
    }
}
