<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface BannersRepository.
 *
 * @package namespace App\Repositories;
 */
interface BannersRepository extends RepositoryInterface
{
    public function getAll();
    public function createBanner($param);
    public function deleteBanner($param);
    public function HideorShow($id);

    public function updateBanner($request, $id);

}
