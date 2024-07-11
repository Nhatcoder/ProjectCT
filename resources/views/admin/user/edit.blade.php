@extends('admin.layout.main')
@section('title', 'Người dùng')
@section('admin')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Cập nhật người dùng: {{ $user->first_name }} {{ $user->last_name }}</h4>
                        <form action="{{ route('admin.user.update', $user->id) }}" class="forms-sample needs-validation"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Ảnh</label>

                                <input type="file" class="form-control" name="avatar" id="avatar"
                                    placeholder="Điền vào trỗ trống ..." value="{{ old('name', $user->avatar) }}">
                                @error('avatar')
                                    <b class="text-danger">{{ $message }}</b>
                                @enderror
                                <img width="150px" src="{{ $user->avatar }}" alt="avatar">
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Cập nhật</button>
                            <a href="{{ route('admin.user.list') }}" class="btn btn-light">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
