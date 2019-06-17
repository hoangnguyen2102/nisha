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
                                    <th width="20%">@lang('label.Name')</th>
                                    <th width="20%">@lang('label.Email')</th>
                                    <th width="32%">@lang('label.Content')</th>
                                    <th width="20%">@lang('label.Create date')</th>
                                    <th width="20%">@lang('label.Function')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ compactString($value->message) }}</td>
                                        <td>{{ $value->created_at }}</td>
                                        <td>
                                            <button data-id="{{ $value->id }}" data-toggle="modal" data-target="#myModal" type="button" onclick="callFeedback(this)" class="btn btn-success">@lang('Label.Show')</button>
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

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('label.Feedback')</h4>
                </div>
                <div class="modal-body">
                    <p id="feedback-content"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('label.Close')</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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

        function callFeedback(event) {
            $.ajax({
                type: "POST",
                headers: {
                    'Authorization':'Bearer ' + "{{auth()->guard('admin')->user()->api_token }}",
                    'Accept': 'application/json',
                },
                dataType:'json',
                data: {
                    id: $(event).data('id'),
                },
                url: "{{ url('api/feedback') }}",

                success: function(data){
                    if (data.status === 200) {
                        $("#feedback-content").text('');
                        $("#feedback-content").text(data.data.message);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {

                }
            })
        };
    </script>
@endsection