@extends('layouts.admin_master')

@section('content')

    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="card shadow-lg border-0 rounded-lg mt-2">
                        <div class="card-header"><h3 class="text-center font-weight-light">Новый сертификат</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{url('/insert-new-certificate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col-md-6">
                                        <div class="form-group" id="whom">
                                            <label class="small mb-1" for="inputState">Наименование предприятия</label>
                                            <input required class="form-control py-4" name="whom" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="inn">
                                            <label class="small mb-1" for="inputState">ИНН</label>
                                            <input required class="form-control py-4" name="inn" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="region">
                                            <label class="small mb-1" for="inputState">Регион</label>
                                            <input required class="form-control py-4" name="region" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="address">
                                            <label class="small mb-1" for="inputState">Адрес</label>
                                            <input required class="form-control py-4" name="address" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="application_area">
                                            <label class="small mb-1" for="inputState">Область применения</label>
                                            <input required class="form-control py-4" name="application_area" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="by_industry">
                                            <label class="small mb-1" for="inputState">в разрезе отраслей</label>
                                            <input required class="form-control py-4" name="by_industry" type="text"/>
                                        </div>
                                    </div>  <div class="col-md-6">
                                        <div class="form-group" id="name">
                                            <label class="small mb-1" for="inputState">Наименование стандарта ISO</label>
                                            <input required class="form-control py-4" name="name" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="number">
                                            <label class="small mb-1" for="inputFirstName">Номер сертификата</label>
                                            <input required class="form-control py-4" name="number" type="text"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="date">
                                            <label class="small mb-1" for="inputState">Дата регистрации</label>
                                            <input required class="form-control py-4" name="date" type="date"/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" id="expired_date">
                                            <label class="small mb-1" for="inputState">Срок действия</label>
                                            <input required class="form-control py-4" name="expired_date" type="date"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" id="comment">
                                            <label class="small mb-1" for="inputState">Примечание</label>
                                            <textarea class="form-control py-4" name="comment" type="text">
                                            </textarea>
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group mt-4 mb-0">
                                    <button class="btn btn-primary btn-block">Сохранить</button>
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
@endsection
