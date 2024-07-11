<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategory;
use App\Http\Requests\UpdateCategory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::select('name', 'id', 'created_at')->orderBy('id', 'desc')->get();
        return view('admin.category.index', compact('category'));
    }


    public function create()
    {
        return view('admin.category.add');
    }


    public function storeCategory(CreateCategory $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Thêm thành công');
    }


    public function show(string $id)
    {

    }


    public function edit(string $id)
    {
        $category = Category::find($id);

        if (!isset($category)) {
            return redirect()->route('category.index')->with('error', 'Danh mục không tồn tại');
        }

        return view('admin.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategory $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        return redirect()->route('category.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->id);
        if (!isset($category)) {
            return redirect()->route('category.index')->with('error', 'Danh mục không tồn tại');
        } else {
            $category->delete();
        }

        return response()->json(['success' => 'Xóa thành công']);


    }
}
