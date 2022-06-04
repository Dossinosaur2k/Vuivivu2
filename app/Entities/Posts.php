<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;
/**
 * Class Posts.
 *
 * @package namespace App\Entities;
 */
class Posts extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_id',
        'category_id',
        'name',
        'slug',
        'title',
        'content',
        'image_path',
    ];



    public function Category()
    {
        return $this->belongsTo(Categories::class,'category_id');
    }

    public function Sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ]
        ];
    }
}
