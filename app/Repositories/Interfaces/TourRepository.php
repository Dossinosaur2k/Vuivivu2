<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface TourRepository.
 *
 * @package namespace App\Repositories;
 */
interface TourRepository extends RepositoryInterface
{
    public function getAll($params);
    public function getWebsite($parmas);
    public function pagination($request);
}
