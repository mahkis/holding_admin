@extends('layouts.admin_master')

@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">New certificate</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group mt-4 mb-0">
                                <button class="btn btn-primary btn-block">Cancel</button>
                            </div>
                            <form method="DELETE" action="{{url('/delete-certificate') }}"
                                  enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mt-4 mb-0">
                                    <button class="btn btn-primary btn-block">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
    {{--    <script>--}}
    {{--        $(document).ready(function () {--}}
    {{--            $("#name").change(function () {--}}
    {{--                var c_name = $("#name").val();--}}
    {{--                console.log(c_name);--}}
    {{--                $.ajax({--}}
    {{--                    type: 'POST',--}}
    {{--                    url: "http://127.0.0.1:8000/api/get-customer",--}}
    {{--                    dataType: 'json',--}}
    {{--                    data: {--}}
    {{--                        "id": c_name--}}
    {{--                    },--}}
    {{--                    success: function (data) {--}}
    {{--                        console.log(data);--}}
    {{--                        $("#email").html('<label class="small mb-1" for="inputFirstName">Customer Email</label>');--}}
    {{--                        var x = '<input class="form-control py-4" name="date" value="' + data.customer.email + '" type="text"/>';--}}
    {{--                        $("#email").append(x);--}}

    {{--                        $("#company").html('<label class="small mb-1" for="inputFirstName">Customer company</label>');--}}
    {{--                        var x = '<input class="form-control py-4" name="company" value="' + data.customer.company + '" type="text"/>';--}}
    {{--                        $("#company").append(x);--}}

    {{--                        $("#phone").html('<label class="small mb-1" for="inputFirstName">Customer Phone</label>');--}}
    {{--                        var x = '<input class="form-control py-4" name="phone" value="' + data.customer.phone + '" type="text"/>';--}}
    {{--                        $("#phone").append(x);--}}

    {{--                        $("#address").html('<label class="small mb-1" for="inputFirstName">Customer Address</label>');--}}
    {{--                        var x = '<input class="form-control py-4" name="address" value="' + data.customer.address + '" type="text"/>';--}}
    {{--                        $("#address").append(x);--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endsection
