<?php
namespace App\Repositories\BaseRepository;

interface EloquentRepositoryInterface
{
    public function insert(array $data);
}