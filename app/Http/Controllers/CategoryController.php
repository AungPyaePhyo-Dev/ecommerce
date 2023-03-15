<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{


    protected $service;

    public function __construct(CategoryService $categoryService)
    {
        $this->service = $categoryService;
    }

    public function index()
    {
        $cats = Category::all();
        return view('category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|unique:categories',
            'image' => 'required'
        ]);

        $category = $this->service->createcategory($request);

        return redirect()->route('cats.index')->with('success', 'Category create successfully!');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $category = $category->find($id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $category = Category::find($id);
            $category->name = $request->name;

             
            if($request->hasFile('image')){
                $input['image'] = basename($request->file('image')->store('public/uploads'));
                $category->image = $input['image'];
            }

            if($category->update()){
                return redirect()->route('cats.index')->with('success', 'Category Updated Successfully');
            }else{
                return redirect()->back('error', 'Update Error');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = $category->find($id);
        $category->delete();
        return redirect()->route('cats.index')->with('success', 'Category Deleted Successfully');
    }
}
