@extends('admin.layout.main')
@section('title', 'Sản phẩm')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Thêm sản phẩm</h4>
                        <form action="{{ route('product.store') }}" class="forms-sample needs-validation"
                            encType="multipart/form-data" method="post" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" required
                                    placeholder="Điền vào trỗ trống ...">
                                @error('name')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" class="form-control" value="{{ old('image') }}" name="image" required
                                    placeholder="Điền vào trỗ trống ...">
                                @error('image')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Hạn sử dụng</label>
                                        <input type="date" class="form-control" value="{{ old('expiry_date') }}" name="expiry_date" required
                                            placeholder="Điền vào trỗ trống ...">
                                        @error('expiry_date')
                                            <b class="text-danger">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Danh mục</label>

                                        <select name="category_id" id="" class="form-control">
                                            @foreach ($category as $item)
                                                <option {{ old('category_id') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Giá</label>
                                        <input type="number" value="{{ old('price') }}" class="form-control" name="price" required
                                            placeholder="Điền vào trỗ trống ...">
                                        @error('price')
                                            <b class="text-danger">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Số lượng</label>
                                        <input type="number" value="{{ old('quantity') }}" class="form-control" name="quantity" required
                                            placeholder="Điền vào trỗ trống ...">
                                        @error('quantity')
                                            <b class="text-danger">{{ $message }}</b>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea class="form-control"  name="description" id="" placeholder="Điền vào trỗ trống ..." cols="30"
                                    rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea class="form-control" name="short_description" placeholder="Điền vào trỗ trống ..." cols="30"
                                    rows="2">{{ old('short_description') }}</textarea>
                                    
                                @error('short_description')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Thêm</button>
                            <a href="{{ route('product.index') }}" class="btn btn-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
