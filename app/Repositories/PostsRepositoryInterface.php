<?php


namespace App\Repositories;


interface PostsRepositoryInterface
{
    public function save($request);

    public function post($slug);

    public function update($request, $id);

    public function destroy($id);


}
