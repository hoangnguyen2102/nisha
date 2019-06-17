@extends('client.master-3')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>@lang('label.List schedule')</strong></h3>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <h3 class="panel-title"><strong>@lang('label.List schedule old')</strong></h3>
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th width="10%">@lang('label.STT')</th>
                                        <th width="30%">@lang('label.Start date')</th>
                                        <th width="40%">@lang('label.Full name PT')</th>
                                        <th width="20%">@lang('label.Confirm')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($oldSchedules as $key => $oldSchedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $oldSchedule->start }}</td>
                                            <td>{{ $oldSchedule->admin->name }}</td>
                                            <td>
                                                @if($oldSchedule->user_confirm == 0)
                                                @component('client.components.confirm-button')
                                                    @slot('link')
                                                        {{ route('client.schedule.confirm') }}
                                                    @endslot
                                                    @slot('id')
                                                        {{ $oldSchedule->id }}
                                                    @endslot
                                                @endcomponent
                                                @else
                                                    @lang('label.Confirmed')
                                                @endif
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
                <div class="col-md-6">
                    <h3 class="panel-title"><strong>@lang('label.List schedule future')</strong></h3>
                    <!-- START DEFAULT DATATABLE -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead>
                                    <tr>
                                        <th width="10%">@lang('label.STT')</th>
                                        <th width="25%">@lang('label.Start date')</th>
                                        <th width="25%">@lang('label.End date')</th>
                                        <th width="30%">@lang('label.Full name PT')</th>
                                        <th width="10%">@lang('label.Function')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($futSchedules as $key => $futSchedule)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $futSchedule->start }}</td>
                                            <td>{{ $futSchedule->end }}</td>
                                            <td>{{ $futSchedule->admin->name }}</td>
                                            <td>
                                                @component('client.components.delete-button')
                                                    @slot('link')
                                                        {{ route('client.schedule.delete', $futSchedule->id) }}
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
    </div>
    @include('admin.component.status_create_update')
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