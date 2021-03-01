<?php


namespace App\Repositories;


interface PostsRepositoryInterface
{
    public function save($request);

    public function post($slug, $pdo);

    public function update($request, $id);

    public function destroy($id, $pdo);


}
