<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Product\ValidateAddProduct;
use App\Http\Requests\Product\ValidateUpdateProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::select('name', 'id', 'created_at')->orderBy('id', 'desc')->get();
        return view('admin.product.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateAddProduct $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->sku = Str::upper(Str::random(8));
        $product->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = "product_img_" . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = $path;
        }

        $product->expiry_date = $request->expiry_date;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        return redirect()->route('product.index');
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
        $category = Category::select('name', 'id', )->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('category', 'product'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidateUpdateProduct $request, string $id)
    {
        $product = Product::find($id);

        if (!isset($product)) {
            return redirect()->route('product.index');
        }

        $product->name = $request->name;
        $product->sku = Str::upper(Str::random(8));
        $product->slug = Str::slug($request->name, '-');

        if ($request->hasFile('image')) {
            if ($product->image && Storage::exists($product->image)) {
                Storage::delete($product->image);
            }
            $image = $request->file('image');
            $imageName = "product_img_" . time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/images', $imageName);
            $product->image = $path;
        }

        $product->expiry_date = $request->expiry_date;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function deleteProduct(Request $request)
    {
        $product = Product::find($request->id);
        if (!isset($product)) {
            return redirect()->route('product.index');
        }

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('product.index');
    }
}
