<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CrawlHistoryRepository.
 *
 * @package namespace App\Repositories;
 */
interface CrawlHistoryRepository extends RepositoryInterface
{
    public function getAll();
    public function pagination($model);
}
