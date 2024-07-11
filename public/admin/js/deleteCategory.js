$(document).ready(function () {
    $(document).on('click', '.btn_delete__category', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var router = $(this).data('router');
        var token = $(this).data('token');
        console.log(token);

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
                    url: router,
                    type: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function () {
                        elementAL.remove();

                        Swal.fire({
                            title: 'Thành công !',
                            text: 'Đã xóa danh mục thành công',
                            icon: 'success',
                            confirmButtonText: 'ok',

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