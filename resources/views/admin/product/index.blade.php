@extends('admin.layout.main')
@section('title', 'Sản phẩm')

@section('admin')
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <h4 class="card-title">Sản phẩm</h4>
                        <a href="{{ route('product.create') }}" class="btn btn-success">Thêm mới</a>
                        <div class="aligner-wrapper">
                            <table class="table table-bordered table-striped table-hover mt-2">
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Tên</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Danh mục</th>
                                    <th>Giá</th>
                                    <th>Ngày hết hạn</th>
                                    <th>Số lượng</th>
                                    <th>Mô tả</th>
                                    <th>Mô tả ngắn</th>
                                    <th>Thao tác</th>
                                </tr>

                                @foreach ($products as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset("storage/images/".basename($item->image)) }}" alt="{{ $item->name }}">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ number_format($item->price) }}₫</td>
                                        <td>{{ $item->expiry_date }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->short_description }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
                                            <button data-token="{{ csrf_token() }}"
                                                data-router="{{ route('admin.product.delete') }}"
                                                class="btn btn-danger btn_delete_product"
                                                data-id="{{ $item->id }}"">Xóa</button>
                                        </td>
                                    </tr>
                                @endforeach


                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
