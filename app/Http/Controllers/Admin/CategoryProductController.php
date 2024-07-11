<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductCategory;

class CategoryProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ctPro = ProductCategory::with('category')->get();
        return view('admin.category_product.index', compact('ctPro'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('admin.category_product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                "name" => "required",
                "image" => "required",
                'description' => 'required',
                'category_id' => 'nullable',
            ]
        );


        $ctPro = new ProductCategory();
        $ctPro->name = $data['name'];
        $ctPro->description = $data['description'];
        $ctPro->category_id = $data['category_id'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads', $filename);
            $ctPro->image = $filename;
        }

        $ctPro->save();

        return redirect()->route('category-product.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::all();
        $ctPro = ProductCategory::find($id);

        return view('admin.category_product.edit', compact('category', 'ctPro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate(
            [
                "name" => "required",
                "image" => "nullable",
                'description' => 'required',
                'category_id' => 'nullable',
            ]
        );

        // return response()->json($ctPro);

        $ctPro = ProductCategory::find($id);

        $ctPro->name = $data['name'];
        $ctPro->description = $data['description'];
        $ctPro->category_id = $data['category_id'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads', $filename);
            $ctPro->image = $filename;

            unlink('uploads/' . $ctPro->image);
        }

        $ctPro->save();

        return redirect()->route('category-product.index');

        // return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }

    public function deleteCategoryProduct(Request $request)
    {
        if (ProductCategory::find($request->id)) {
            ProductCategory::find($request->id)->delete();
            return redirect()->route('category-product.index');
        }
    }
}
