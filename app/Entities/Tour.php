<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class Tour.
 *
 * @package namespace App\Entities;
 */
class Tour extends Model 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Tour';
    protected $connection = 'mongodb';
}
