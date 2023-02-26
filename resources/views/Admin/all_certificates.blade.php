@extends('layouts.admin_master')
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            <a class="btn btn-sm btn-info" href="{{ route('new.certificate')}}">
                <i class="fas fa-plus mr-1"></i> New Certificate
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Certificate number</th>
                        <th>Certificate name</th>
                        <th>Person name</th>
                        <th>Date</th>
                        <th>Download certificate</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($certificates as $key => $row)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->number}}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->whom }}</td>
                            <td>{{ $row->date }}</td>
                            <td>
                                @if($row->file_id)
                                    <a href="{{url('/download-certificate/'.$row->id)}}"
                                       class="btn btn-sm btn-info">
                                        <i class="fa fa-download"></i>
                                        Download certificate
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{--                                <a href="{{ 'delete-certificate/'.$row->id }}" class="btn btn-sm btn-danger">--}}
                                {{--                                    <i class="fa fa-trash"></i>--}}
                                {{--                                </a>--}}
                                <button class="btn btn-sm btn-danger"
                                        onclick="loadDeleteModal({{ $row->id }})">
                                    <i class="fa fa-trash"></i>
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
                        <h4 class="title" id="defaultModalLabel">Are you sure?</h4>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-danger btn-round waves-effect">Yes, delete</button>
                        <button type="button" class="btn btn-outline-secondary btn-round waves-effect"
                                data-dismiss="modal">Cancel
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
    {{--   --}}


    {{--   $('#dataTable').DataTable({--}}
    {{--    columnDefs: [--}}
    {{--    {bSortable: false, targets: [6]} --}}
    {{--  ],--}}
    {{--                dom: 'lBfrtip',--}}
    {{--           buttons: [--}}
    {{--               {--}}
    {{--                   extend: 'copyHtml5',--}}
    {{--                   exportOptions: {--}}
    {{--                    modifier: {--}}
    {{--                        page: 'current'--}}
    {{--                    },--}}
    {{--                       columns: [ 0, ':visible' ]--}}
    {{--                       --}}
    {{--                   }--}}
    {{--               },--}}
    {{--               {--}}
    {{--                   extend: 'excelHtml5',--}}
    {{--                   exportOptions: {--}}
    {{--                    modifier: {--}}
    {{--                        page: 'current'--}}
    {{--                    },--}}
    {{--                    columns: [ 0, ':visible' ]--}}
    {{--                   }--}}
    {{--               },--}}
    {{--               {--}}
    {{--                   extend: 'pdfHtml5',--}}
    {{--                   exportOptions: {--}}
    {{--                    modifier: {--}}
    {{--                        page: 'current'--}}
    {{--                    },--}}
    {{--                       columns: [ 0, 1, 2, 5 ]--}}
    {{--                   }--}}
    {{--               },--}}
    {{--               'colvis'--}}
    {{--           ]--}}
    {{--           });--}}
    {{--       </script>--}}
@endsection
