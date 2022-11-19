<?php
namespace App\Services;

use App\Models\Category;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Category\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryService
{
    protected $categoryRepositoryInterface;
    
    public function __construct(CategoryRepositoryInterface $categoryRepositoryInterface)
    {
        $this->categoryRepositoryInterface = $categoryRepositoryInterface;
    }


    public function getInput(Request $request){
        $input = array_filter($request->only([
            'name', 'image'
        ]), function($value){
            return $value != null;
        });

        if($request->hasFile('image')){
            $input['image'] = basename($request->file('image')->store('public/uploads'));
        }

        if(empty($input['name'])){
            $input['name'] = null;
        }
        return $input;
    }

    public function createcategory($request){

        $input = $this->getInput($request);

        $category = $this->categoryRepositoryInterface->insert($input);



        // $file = $request->file('image');
        // $imageName = $file->getClientOriginalName();
        // $file->move(public_path() .'/uploads/', $imageName);

        // $cat = new Category();
        // $cat->name = $request->input('name');
        // $cat->image = $imageName;

        // $cat->save();
    }
}