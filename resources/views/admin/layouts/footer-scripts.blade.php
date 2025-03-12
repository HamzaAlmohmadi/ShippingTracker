

<!-- General JS Scripts -->
<script src="{{ asset('backend/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('backend/assets/modules/popper.js') }}"></script>
<script src="{{ asset('backend/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('backend/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('backend/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('backend/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('backend/assets/js/stisla.js') }}"></script>


<script src="{{ asset('backend/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('backend/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script src="{{ asset('backend/assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('backend/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
<script src="{{ asset('backend/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('backend/assets/modules/select2/dist/js/select2.full.min.js') }}"></script> --}}




<!-- Template JS File -->
<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>

<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif
</script>

<!-- Dynamic Delete alart -->

<script>
    $(document).ready(function() {
        // إعدادات CSRF
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // عند الضغط على زر الحذف
        $('body').on('click', '.delete-item', function(event) {
            event.preventDefault();

            let deleteUrl = $(this).attr('href');

            // عرض رسالة التأكيد باستخدام SweetAlert
            Swal.fire({
                title: 'هل أنت متأكد؟',
                text: "لن تتمكن من استرجاع هذه البيانات بعد الحذف!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'نعم، احذفها!',
                cancelButtonText: 'إلغاء'
            }).then((result) => {
                if (result.isConfirmed) {
                    // تنفيذ طلب الحذف
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,

                        success: function(data) {
                            if (data.status === 'success') {
                                Swal.fire({
                                    title: 'تم الحذف!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 10000, // مدة العرض (2 ثانية)
                                    showConfirmButton: false // إخفاء زر التأكيد
                                });

                                // تحديث الصفحة بعد تأخير
                                setTimeout(function() {
                                    window.location.reload();
                                }, 2000);
                            } else if (data.status === 'error') {
                                Swal.fire(
                                    'خطأ في الحذف',
                                    data.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'حدث خطأ',
                                'لم يتم تنفيذ عملية الحذف.',
                                'error'
                            );
                            console.error(error);
                        }
                    });
                }
            });
        });
    });
</script>

@stack('scripts')


