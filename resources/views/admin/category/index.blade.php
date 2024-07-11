@extends('admin.layout.main')
@section('title', 'Danh mục')

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
                        <h4 class="card-title">Danh mục</h4>
                        <a href="{{ route('category.create') }}" class="btn btn-success">Thêm mới</a>
                        <div class="aligner-wrapper">
                            <table class="table table-bordered table-striped table-hover mt-2">
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Thao tác</th>
                                </tr>

                                @foreach ($category as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
                                            <button data-token="{{ csrf_token() }}" data-router="{{ route('admin.category.delete') }}" class="btn btn-danger btn_delete__category"
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

