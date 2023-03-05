@extends('main')
@section('title', 'Laravel Project | Add User ')
@section('headline', 'Add User ')
{{-- @section('title-delete', 'User successfully deleted!') --}}

@section('container')
    @include('layout.add-user.form-add-user')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#formAddUser').validate({
                rules: {
                    firstName: {
                        minlength: 2,
                        required: true
                    },
                },
                highlight: function(element) {
                    $(element).closest('.control-group').removeClass('success').addClass('error');
                },
                success: function(element) {
                    element.text('OK!').addClass('valid')
                        .closest('.control-group').removeClass('error').addClass('success');
                }
            });
        });
    </script>
    <script>
        // $('#formAddUser').validate({

        //     ...your validation rules come here,

        //     submitHandler: function(form) {
        //         $.ajax({
        //             url: form.action,
        //             type: form.method,
        //             data: $(form).serialize(),
        //             success: function(response) {
        //                 $('#answers').html(response);
        //             }
        //         });
        //     }
        // });
    </script>
@endsection
