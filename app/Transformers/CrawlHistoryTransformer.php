<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\CrawlHistory;

/**
 * Class CrawlHistoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class CrawlHistoryTransformer extends TransformerAbstract
{
    /**
     * Transform the CrawlHistory entity.
     *
     * @param \App\Entities\CrawlHistory $model
     *
     * @return array
     */
    public function transform(CrawlHistory $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
