@extends('layout')

@section('title')
    Leave - Pipeline & IT
@stop

@section('top')
    @include('assets_css_1')
    @include('assets_css_2')
    @include('assets_css_3')
    @include('assets_css_4')
@stop

@section('navbar')
    @include('navbar_top')
    @include('navbar_left', [
        'c61' => 'active',
    ])
@stop

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Leave Approval</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table table-striped table-hover table-condensed table-bordered" width="100%" id="tablesIT">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Leave Date</th>
                        <th>NIK</th>
                        <th>Name</th>
                        <th>Leave Category</th>
                        <th>Department</th>
                        <th>Total Day</th>
                        <th>Approval</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" id="modal-content">
                <!--  -->
            </div>
        </div>
    </div>
@stop

@section('bottom')
    @include('assets_script_1')
    @include('assets_script_2')
    @include('assets_script_3')
    @include('assets_script_7')
@stop

@push('js')
    <script>
        $(document).ready(function() {

            // $('#tables').DataTable({
            //     processing: true,
            //     responsive: true,
            //     ajax: "{{ route('manager/pipeline-it/form-list/pipeline/data') }}",
            //     columns: [{
            //         data: 'DT_Row_Index',
            //         orderable: false,
            //         searchable: false
            //     }, {
            //         data: 'leave_date'
            //     }, {
            //         data: 'request_nik'
            //     }, {
            //         data: 'request_by'
            //     }, {
            //         data: 'leave_category_id'
            //     }, {
            //         data: 'request_dept_category_name'
            //     }, {
            //         data: 'total_day'
            //     }, {
            //         data: 'actions',
            //         orderable: false,
            //         searchable: false
            //     }]
            // });

            $('#tablesIT').DataTable({
                processing: true,
                responsive: true,
                ajax: "{{ route('manager/pipeline-it/form-list/it/data') }}",
                columns: [{
                    data: 'DT_Row_Index',
                    orderable: false,
                    searchable: false
                }, {
                    data: 'leave_date'
                }, {
                    data: 'request_nik'
                }, {
                    data: 'request_by'
                }, {
                    data: 'leave_category_id'
                }, {
                    data: 'request_dept_category_name'
                }, {
                    data: 'total_day'
                }, {
                    data: 'actions',
                    orderable: false,
                    searchable: false
                }]
            });

            $(document).on('click', '#tables tr td a[id="actions"]', function(e) {
                var id = $(this).attr('data-role');

                $.ajax({
                    url: id,
                    success: function(e) {
                        $("#modal-content").html(e);
                    }
                });
            });

            $(document).on('click', '#tablesIT tr td a[id="actions"]', function(e) {
                var id = $(this).attr('data-role');

                $.ajax({
                    url: id,
                    success: function(e) {
                        $("#modal-content").html(e);
                    }
                });
            });

        });
    </script>
@endpush
