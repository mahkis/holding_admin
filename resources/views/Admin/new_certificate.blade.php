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
                            <form method="POST" action="{{url('/insert-new-certificate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <div class="form-group" id="date">
                                            <label class="small mb-1" for="inputState">Date</label>
                                            <input required class="form-control py-4" name="date" type="date"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="number">
                                            <label class="small mb-1" for="inputFirstName">Certificate number</label>
                                            <input required class="form-control py-4" name="number" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="name">
                                            <label class="small mb-1" for="inputLastName">Certificate name</label>
                                            <input required class="form-control py-4" name="name" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="whom">
                                            <label class="small mb-1" for="inputState">Person name</label>
                                            <input required class="form-control py-4" name="whom" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="file">
                                            <label class="small mb-1" for="inputState">File</label>
                                            <input required class="form-control py-4" name="file" type="file"/>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button class="btn btn-primary btn-block">Submit</button>
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
