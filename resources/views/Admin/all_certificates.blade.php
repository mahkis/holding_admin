@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-sm btn-info" href="{{ route('new.certificate')}}">
                <i class="fas fa-plus mr-1"></i> Добавить сертификат
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Предприятия</th>
                        <th>Область применения. <br>в разрезе отраслей</th>
                        <th>Номер сертификата</th>
                        <th width="160">Дата</th>
                        <th width="100"></th>
                        <th width="50"></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($certificates as $key => $row)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>
                                {{ $row->whom}} <br>
                                <span class=" text-secondary">
                                    {{ $row->region}} <br>
                                    {{ $row->address}} <br>
                                    {{ $row->inn}}  <br>
                                </span>
                            </td>
                            <td>
                                {{ $row->application_area }} <br>
                                <span class=" text-secondary">
                                    {{ $row->by_industry }}
                                </span>
                            </td>
                            <td>
                                {{ $row->name }} <br>
                                {{ $row->number }}
                            </td>
                            <td>
                                {{ $row->date }} <br>
                                {{ $row->expired_date }}
                            </td>

                            <td width="100">
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('https://admin.holding.uz/check-certificate/'.$row->uuid)) !!} ">
                            </td>
                            <td>
                                @if($row->file_id)
                                    <a href="{{url('/download-certificate/'.$row->id)}}"
                                       class="btn btn-sm btn-info mb-1">
                                        <i class="fa fa-download"></i>
                                    </a>
                                @endif
                                <a class="btn btn-sm btn-outline-info mb-1"
                                   href="{{ route('edit.certificate', $row->id)}}">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger mb-1"
                                        onclick="loadDeleteModal({{ $row->id }})">
                                    <i class="fa fa-trash-alt "></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="post" id="deleteFormClient">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header justify-content-center">
                        <h4 class="title" id="defaultModalLabel">Вы уверены?</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-danger btn-round waves-effect">Да, удалить</button>
                        <button type="button" class="btn btn-outline-secondary btn-round waves-effect"
                                data-dismiss="modal">Отмена
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('script')
    --}}
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
            crossorigin="anonymous"></script>

    <script>
        function loadDeleteModal(id) {
            var route = '{{ route("delete.certificate", ":certificate") }}';
            route = route.replace(':certificate', id);
            console.log(route);
            $('#deleteFormClient').attr('action', route);
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
