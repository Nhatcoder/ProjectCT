@extends('admin.layout.main')
@section('title', 'Người dùng')

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
                        <h4 class="card-title mb-5">Người dùng</h4>
                        <div class="aligner-wrapper">
                            <table class="table table-bordered table-striped table-hover mt-2">
                                <tr>
                                    <th>STT</th>
                                    <th>Ảnh</th>
                                    <th>Họ tên</th>
                                    <th>Tên</th>
                                    <th>Sinh nhật</th>
                                    <th>SĐT</th>
                                    <th>Email</th>
                                    <th>Thao tác</th>
                                </tr>

                                @foreach ($listUser as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            @php
                                                $is_valid_url = filter_var($item->avatar, FILTER_VALIDATE_URL);
                                            @endphp
                                            @if ($is_valid_url)
                                                <img width="50px" src="{{ $item->avatar }}" alt="">
                                            @else
                                                <img width="50px" src="{{ asset('storage/avatars/' . basename($item->avatar)) }}"
                                                    alt="User Avatar">
                                            @endif
                                        </td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->birthdate }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('admin.user.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
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
