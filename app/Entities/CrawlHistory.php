<?php

namespace App\Entities;

use Jenssegers\Mongodb\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class CrawlHistory.
 *
 * @package namespace App\Entities;
 */
class CrawlHistory extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $connection = 'mongodb';
    protected $table = 'CrawlHistories';
    
}
