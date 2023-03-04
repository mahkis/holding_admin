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
{{--                            {{ $certificate }}--}}
                            <br>
                            {{ $path }}
                            <img src="<?php echo asset($path)?>"></img>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
@endsection
