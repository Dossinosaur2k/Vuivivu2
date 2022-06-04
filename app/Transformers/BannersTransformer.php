<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Banners;

/**
 * Class BannersTransformer.
 *
 * @package namespace App\Transformers;
 */
class BannersTransformer extends TransformerAbstract
{
    /**
     * Transform the Banners entity.
     *
     * @param \App\Entities\Banners $model
     *
     * @return array
     */
    public function transform(Banners $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
