@extends('layouts.admin_master')

@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">
                                {{ $certificate->whom }}
                                <br>
                                {{ $certificate->name }}
                                <br>
                                {{ $certificate->number }}
                            </h3>
                        </div>
                        <div class="card-body text-center">
                            <br>
{{--                            {{ $certificate }}--}}
                            <img
                                src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(400)->generate('https://127.0.0.1:8000//check-certificate/'.$certificate->uuid)) !!} ">


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxy/1.6.1/scripts/jquery.ajaxy.js"></script>
@endsection
