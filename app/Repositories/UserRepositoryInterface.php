<?php


namespace App\Repositories;


interface UserRepositoryInterface
{
    public function dob($request);

    public function save($request, $dob);
}
