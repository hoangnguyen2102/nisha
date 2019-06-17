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
                                    <th width="8%">@lang('label.STT')</th>
                                    <th width="40%">@lang('label.Name')</th>
                                    <th width="28%">@lang('label.Create date')</th>
                                    <th width="12%">@lang('label.Edit')</th>
                                    <th width="12%">@lang('label.Delete')</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                @component('admin.component.edit-link')
                                                    @slot('link')
                                                        {{ route('tag.edit', $value->id) }}
                                                    @endslot
                                                @endcomponent
                                            </td>
                                            <td>
                                                @component('admin.component.delete-button')
                                                    @slot('link')
                                                        {{ route('tag.destroy', $value->id) }}
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