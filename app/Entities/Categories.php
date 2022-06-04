<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Categories.
 *
 * @package namespace App\Entities;
 */
class Categories extends Model implements Transformable
{
    use TransformableTrait;
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'description',
    ];
    


    public function Posts()
    {
        return $this->hasMany(Post::class,'category_id');
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
