<?php
namespace App\Repositories\BaseRepository;

use App\Repositories\BaseRepository\EloquentRepositoryInterfaceEloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements EloquentRepositoryInterface
{
    public function insert(array $data){
        return $this->connection()->query()->create($data);
    }
    abstract public function connection(): Model;
}
