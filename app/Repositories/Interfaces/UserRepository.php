<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories;
 */
interface UserRepository extends RepositoryInterface
{
    public function getAll();
    public function updateUser($data,$id);
    public function createUser($data);
    public function pagination($request);
    public function BlockorUnlock($id);
    public function updatePassword($data,$id);
}
