@extends('main')
@section('title', 'Laravel Project | User List')
@section('headline', 'User List')
@section('title-delete', 'User successfully deleted!')

@section('container')
    <div class="table-user" id="userTable">
        <div class="text-center">
            <div class="spinner-border" role="status">
            </div>
        </div>
    </div>
    <div class="table" id="detailUserTable">

    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            getListUser();
            btnDetail();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
    <script>
        let user_id = null;

        function getListUser() {
            $.ajax({
                type: "GET",
                url: "{{ route('get-list') }}",
                method: 'POST',
                dataType: "json",
                beforeSend: function() {
                    // $('#image').show();
                },
                success: function(response) {
                    $("#userTable").html(response.profile_table);
                },
                error: function(error, ajaxOptions, thrownError) {
                    console.log(error, ajaxOptions, thrownError)
                }
            })
        };

        function getDetailUser() {
            $.ajax({
                type: "GET",
                url: "/profile-data/" + user_id,
                data: "",
                dataType: "json",
                success: function(response) {
                    console.log(response)
                    $("#detailUserTable").html(response.profile_details);
                    $("#userTable").toggle();
                    removeSpinnerInfo();
                },
                error: function(error, ajaxOptions, thrownError) {
                    console.log(error, ajaxOptions, thrownError)
                }
            })
        }

        function deleteUser() {
            $.ajax({
                type: "DELETE",
                url: "/profile-data/" + user_id,
                headers: {
                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id: user_id,
                    '_token': '{{ csrf_token() }}',
                },
                dataType: "json",
                success: function(response) {
                    if (response.data.isDeleted == true) {
                        $('.alert-danger').alert()
                        $('.alert-danger').removeClass('d-none');
                        setTimeout(() => {
                            $(".alert-danger").toggle(false);
                        }, 3000);
                        setTimeout(function() {
                            window.location.reload();
                        }, 3050);
                        removeSpinnerDelete();
                    } else {
                        alert("Gagal menghapus user, silahkan reload halaman");
                    }
                },
                error: function(error, ajaxOptions, thrownError) {
                    console.log(error, ajaxOptions, thrownError)
                }
            })
        }

        $('body').on('click', '.btn-danger', function(e) {
            e.preventDefault();
            user_id = $(this).data("id");
            deleteUser();
            $(this).html(
                '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>'
                )
        });

        function btnDetail() {
            $('body').on('click', '.btn-info', function(e) {
                user_id = $(this).data("id");
                getDetailUser();
                $(this).html(
                    '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>'
                    )
            });
        }

        function removeSpinnerInfo() {
            $("span").remove();
            $(".btn-info").html("<span> Info </span>")
        }

        function removeSpinnerDelete() {
            $("span").remove();
            $(".btn-danger").html("<span> Delete </span>")
        }
    </script>
@endsection
