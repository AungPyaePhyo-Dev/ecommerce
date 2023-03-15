<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryCreateRequest;
use App\Models\Category;
use App\Models\SubCat;
use Illuminate\Http\Request;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $cat = Category::find($id)->load(['subcats']);
        $subcats = SubCat::get();
        return view('subcat.index', compact('cat', 'subcats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('subcat.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request, $id)
    {

        if($request->hasFile('image')){
            $data['image'] = basename($request->file('image')->store('public/uploads'));
        }
        $data['name'] = $request->name;
        $data['category_id'] = $id;

        $subcat = SubCat::create($data);

        if($subcat) {
            return redirect()->route('cat.sub.index', $id);
        } else {
            return redirect()->back('error', 'Sub Category Insert Error');
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function show(SubCat $subCat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCat $subCat, $id)
    {
        $subcat = SubCat::find($id);
        return view('subcat.edit', compact('subcat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCat $subCat, $id)
    {
        $validate = $request->validate([
            'name' => 'required'
        ]);

        if($validate){
            $category = SubCat::find($id);
            $category->name = $request->name;

             
            if($request->hasFile('image')){
                $input['image'] = basename($request->file('image')->store('public/uploads'));
                $category->image = $input['image'];
            }

            if($category->update()){
                return redirect()->route('cat.sub.index', $category->category_id)->with('success', 'Category Updated Successfully');
            }else{
                return redirect()->back('error', 'Update Error');
            }
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCat  $subCat
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCat $subCat, $id)
    {
        $subcat = Subcat::find($id);
        $subcat->delete();
        return redirect()->route('cat.sub.index', $subcat->category_id)->with('success', 'Category Updated Successfully');
    }
}
