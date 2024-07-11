@extends('admin.layout.main')
@section('title', 'Danh mục sản phẩm')

@section('admin')
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12 stretch-card grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Danh mục sản phẩm</h4>
                        <a href="{{ route('category-product.create') }}" class="btn btn-success">Thêm mới</a>
                        <div class="aligner-wrapper">
                            <table class="table table-bordered table-striped table-hover mt-2">
                                <tr>
                                    <th>STT</th>
                                    <th>Image</th>
                                    <th>Danh mục</th>
                                    <th>Danh mục sản phẩm</th>
                                    <th>Description</th>
                                    <th>Thao tác</th>
                                </tr>

                                <style>
                                    .table th img,
                                    .table td img {
                                        width: 150px;
                                        height: 150px;
                                        border-radius: 100%;
                                    }
                                </style>

                                @foreach ($ctPro as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img width="150px" src="{{ asset('uploads') }}/{{ $item->image }}"
                                                alt="">
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->description }}</td>

                                        <td>
                                            <a href="{{ route('category-product.edit', $item->id) }}"
                                                class="btn btn-success">Sửa</a>
                                            {{-- <a href="{{ route('category-product.destroy', $item->id) }}"
                                                class="btn btn-danger">Xóa</a> --}}

                                            <button class="btn btn-danger btn_delete__category"
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

@section('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn_delete__category', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                var elementAL = $(this).closest('tr');

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Bạn có muốn xóa không ?",
                    text: "Điều này không thể hoàn nguyện !",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Vâng, chắc chắn!",
                    cancelButtonText: "Không, hủy!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "{{ route('deleteCategoryProduct') }}",
                            type: 'POST',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                elementAL.remove();

                                Swal.fire({
                                    title: 'Thành công !',
                                    text: 'Đã xóa danh mục sản phẩm thành công',
                                    icon: 'success',
                                    confirmButtonText: 'Cool'
                                })
                            }
                        })
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Hủy thành công",
                            text: "Bạn đã hủy thành công :)",
                            icon: "error"
                        });
                    }
                });


            })
        })
    </script>
@endsection
