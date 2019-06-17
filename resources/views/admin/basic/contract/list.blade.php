@extends('admin.master')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <!-- START DEFAULT DATATABLE -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                <tr>
                                    <th width="5%">@lang('label.STT')</th>
                                    <th width="20%">@lang('label.Name')</th>
                                    <th width="20%">@lang('label.Email')</th>
                                    <th width="15%">@lang('label.Phone')</th>
                                    <th width="20%">@lang('label.Start date')</th>
                                    <th width="10%">@lang('label.Curriculum')</th>
                                    <th width="10%">@lang('label.Show')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->user->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->phone }}</td>
                                        <td>{{ $value->start }}</td>
                                        <td>{{ $value->curriculum->title }}</td>
                                        <td>
                                            @component('admin.component.show-link')
                                                @slot('link')
                                                    {{ route('contract.show', $value->id) }}
                                                @endslot
                                            @endcomponent
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SIMPLE DATATABLE -->

            </div>
        </div>

    </div>
    <!-- PAGE CONTENT WRAPPER -->
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('js/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {

            $('.datatable').DataTable( {
                "language": {
                    "lengthMenu": "@lang('label.Show  _MENU_ results per page')",
                    "zeroRecords": "@lang('label.Nothing found - sorry')",
                    "info": "@lang('label.Showing page _PAGE_ of _PAGES_')",
                    "infoEmpty": "@lang('label.No results available')",
                    "infoFiltered": "@lang('label.Filtered from _MAX_ total results')",
                    "search": "@lang('label.Search')",
                    "paginate": {
                        "next": "@lang('label.Next')",
                        "previous": "@lang('label.Previous')",
                    },
                }
            } );
        } );
    </script>
@endsection