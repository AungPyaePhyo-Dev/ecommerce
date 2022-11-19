<?php
namespace App\Repositories\Category;

use App\Models\Category;
use App\Repositories\BaseRepository\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function connection(): Model{ 
        return new Category();
    }
}