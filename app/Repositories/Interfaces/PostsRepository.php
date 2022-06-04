<?php

namespace App\Repositories\Interfaces;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostsRepository.
 *
 * @package namespace App\Repositories;
 */
interface PostsRepository extends RepositoryInterface
{
    public function getAll();
    public function getBy($number);
    public function createPost($param);
    public function deletePost($param);
    public function updatePost($request, $id);

    public function findbySlug($slug);
}
