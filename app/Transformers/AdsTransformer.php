<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Ads;

/**
 * Class AdsTransformer.
 *
 * @package namespace App\Transformers;
 */
class AdsTransformer extends TransformerAbstract
{
    /**
     * Transform the Ads entity.
     *
     * @param \App\Entities\Ads $model
     *
     * @return array
     */
    public function transform(Ads $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
