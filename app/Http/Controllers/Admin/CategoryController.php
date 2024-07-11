<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
            ]
        );

        $category = new Category();
        $category->name = $data['name'];
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Thêm thành công');
    }

    public function storeCategory(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
            ]
        );

        $category = new Category();
        $category->name = $data['name'];
        $category->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Thêm thành công');
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
        if (Category::find($id) == null) {
            return redirect()->route('category.index')->with('error', 'Danh mục không tồn tại');
        }

        // Nếu id khong ton tai thì chuyển về trang index
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'name.required' => 'Tên danh mục không được để trống',
            ]
        );

        $category = Category::find($id);
        // $category->name = $data['name'];
        $category->name = $request->name; // Sử dụng request để nhận đc data được gửi lên
        $category->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $category->save();
        return redirect()->route('category.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // echo $id;
        // if (Category::destroy($id)) {
        //     return redirect()->route('category.index');
        // }
    }

    public function deleteCategory(Request $request)
    {
        if (Category::find($request->id)) {
            Category::find($request->id)->delete();
            return redirect()->route('category.index');
        }

        // If là khi có id thì find và kiểm tra xem có dữ liệu thì thực hiên xoá
    }
}
