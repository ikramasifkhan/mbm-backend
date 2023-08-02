@extends('admin.layout.master')

@section('title', 'Staffs')

@section('content')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Staff</h1>
            </div>

            <div class="page-action">
                <a href="{{route('admin.staffs.create')}}" class="btn btn-lg btn-primary">
                    Add Staff
                </a>
            </div>
        </div>

        <div class="page-content">
            <div class="row">
                <div class="col-12 table-bordered">
                    <table id="dataTable" class="table  table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#dataTable').dataTable({
                stateSave: true,
                responsive: true,
                serverSide: true,
                processing: true,
                ajax: '{{ route('admin.staffs.index') }}',
                columns: [{
                        data: "DT_RowIndex",
                        title: "SL",
                        name: "DT_RowIndex",
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: "name",
                        title: "Name",
                        searchable: true
                    },
                    {
                        data: "email",
                        title: "Email",
                        searchable: true,
                        defaultContent: 'N/A'
                    },
                    {
                        data: "mobile",
                        title: "Mobile",
                        searchable: true,
                        defaultContent: 'N/A'
                    },
                    {
                        data: "birth_date",
                        title: "Birth date",
                        searchable: true,
                        defaultContent: 'N/A'
                    },
                    {
                        data: "residensial_address",
                        title: "Address",
                        searchable: true,
                        defaultContent: 'N/A'
                    },

                    {
                        data: "action",
                        title: "Action",
                        searchable: false,
                        defaultContent: 'N/A'
                    },
                ],
            });
        })
    </script>
@endpush
