<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoriesRepository.
 *
 * @package namespace App\Repositories;
 */
interface CategoriesRepository extends RepositoryInterface
{
    public function getAll();
    public function createCategory($param);
}
