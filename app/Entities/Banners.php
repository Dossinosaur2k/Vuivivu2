<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;


/**
 * Class Banners.
 *
 * @package namespace App\Entities;
 */
class Banners extends Model implements Transformable
{
    use TransformableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'url',
        'image_path',
        'status',
    ];


}
