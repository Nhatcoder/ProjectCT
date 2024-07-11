@extends('admin.layout.main')
@section('title', 'Danh mục')

@section('admin')
    <div class="content-wrapper">
        <div class="row purchace-popup">
            <div class="col-12 stretch-card grid-margin">

                @if (session('success'))
                    <script>
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                            customClass: {
                                popup: 'toast-css'
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: "{{ session('success') }}"
                        });
                    </script>
                @endif

                <div class="card">
                    <div class="card-body">
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
                                            {{-- <form action="{{ route('category.destroy', $item->id) }}" method="post">
                                                @method('POST')
                                                <button class="btn btn-danger btn_delete__category"
                                                    data-id="{{ $item->id }}"">Xóa</button>
                                            </form> --}}

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
                            url: "{{ route('deleteCategory') }}",
                            type: 'POST',
                            data: {
                                id: id,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function() {
                                elementAL.remove();

                                Swal.fire({
                                    title: 'Thành công !',
                                    text: 'Đã xóa danh mục thành công',
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
