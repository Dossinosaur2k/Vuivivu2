<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Posts;

/**
 * Class PostsTransformer.
 *
 * @package namespace App\Transformers;
 */
class PostsTransformer extends TransformerAbstract
{
    /**
     * Transform the Posts entity.
     *
     * @param \App\Entities\Posts $model
     *
     * @return array
     */
    public function transform(Posts $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
