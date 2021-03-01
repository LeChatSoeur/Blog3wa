<?php


namespace App\Repositories;
use PDO;

class PdoRepository implements PdoRepositoryInterface
{
    public function pdo()
    {
        $pdo = new PDO(
            'mysql:host=localhost;dbname=blog_n_trotters',
            'root',
            'root',
        );
        return $pdo;
    }
}
