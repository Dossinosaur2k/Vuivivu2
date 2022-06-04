<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Tour extends Model
{
   protected $connection = 'mongodb';
   protected $collection = 'Tour';
}
