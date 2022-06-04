<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AdsRepository.
 *
 * @package namespace App\Repositories;
 */
interface AdsRepository extends RepositoryInterface
{
    public function getAll();
    public function getAllActive();
    public function createAds($param);
    public function deleteAds($param);
    public function updateAds($param,$id);
    public function HideorShow($param);
}
