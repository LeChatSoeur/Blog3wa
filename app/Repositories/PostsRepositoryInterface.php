<?php


namespace App\Repositories;


interface PostsRepositoryInterface
{
    public function save($request);

    public function update($request, $id);

    public function upload($request);

    public function destroy($id);


}
