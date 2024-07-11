@extends('admin.layout.main')
@section('title', 'Danh mục')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cập nhật danh mục</h4>
                        <form action="{{ route('category.update', $category->id) }}" class="forms-sample needs-validation"
                            method="post" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Điền vào trỗ trống ..." value="{{ old('name', $category->name) }}">
                                @error('name')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                            <a href="{{ route('category.index') }}" class="btn btn-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
