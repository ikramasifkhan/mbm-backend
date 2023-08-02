@extends('admin.layout.master')

@section('title', 'Domain')

@section('content')
    <div class="content full-page dashboard">
        <div class="page-header">
            <div class="page-title">
                <h1>Domains</h1>
            </div>

            <div class="page-action">
                {{-- <a href="" class="btn btn-lg btn-primary">
                    Add Customer
                </a> --}}
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
                ajax: '{{ route('admin.domains.index') }}',
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
                        data: "url",
                        title: "URL",
                        searchable: true,
                    },

                    {
                        data: "status",
                        title: "Status",
                        searchable: true,
                    },
                ],
                "drawCallback": function(settings) {
                    $('.status-toggler').bootstrapToggle();
                },
            });
            $(document).on('change', '.status-toggler', function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('admin.domains.status-change')}}",
                    type: "PUT",
                    data: {
                        id:id
                    },
                    success: function(response) {
                        $(`#change_status_${response.id}`).attr("data-on","Active");
                        toastr.success(`Domain ${response.status} successfully`)
                    },
                    error: function(error) {
                        toastr.success(`Opps somthing problem`)
                    }
                });
            })
        })
    </script>
@endpush
