@extends('client.master-3')

@section('after_style')
    <link rel="stylesheet" href="{{ asset('js/admin/plugins/time-picki/css/timepicki.css') }}">
@endsection

@section('content')

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><span class="fa fa-calendar"></span> <strong>@lang('label.Register schedule')</strong></h3>
            </div>

            <!-- START CONTENT FRAME -->
            <div class="content-frame">
                <!-- START CONTENT FRAME BODY -->
                <div class="content-frame-body " style="margin-left: 0px;">

                    <div class="row">
                        <div class="col-md-12">
                            <div id="alert_holder"></div>
                            <div class="calendar">
                                <div id="calendar-pt"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- END CONTENT FRAME BODY -->
                @include('client.components.register-alert')
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <form action="{{ route('client.register-training-schedule') }}" method="POST">
            @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Đăng ký thời gian tập
                </div>
                <div class="modal-body">
                    <input type="hidden" name="admin_id" value="{{ $personal_trainer->id }}">
                    <input type="hidden" id="date_start" name="date_start" value="">
                    <label for="time">Thời gian bắt đầu</label>
                    <input type="text" class="form-control" id="timepicker" name="time_start">
                    <label for="time">Thời gian tập</label>
                    <select class="form-control" name="far">
                        <option value="90">90 phút</option>
                        <option value="120">120 phút</option>
                        <option value="150">150 phút</option>
                    </select>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('label.Close')</button>
                    <button type="submit" class="btn btn-primary">@lang('label.Save')</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/time-picki/js/timepicki.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $("#timepicker").timepicki({
                min_hour_value: 8,
                max_hour_value: 20,
                show_meridian:false,
                step_size_minutes: 15,
                start_time: ["08", "00"]
            });
        });
    </script>
    <script type="text/javascript">

        var fullCalendar = function(){
            var calendar = function(){
                if($("#calendar-pt").length > 0){
                    var calendar = $('#calendar-pt').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        displayEventEnd: true,
                        eventSources: {
                            url: "{{ route('schedule.get.pt', ['id' => $personal_trainer->id]) }}"
                        },
                        dayClick: function(date, jsEvent, view) {
                            $('#date_start').val(date.format("MM/DD/YYYY"));
                            $('#myModal').modal('show');
                        },
                    });
                }
            }

            return {
                init: function(){
                    calendar();
                }
            }
        }();
        fullCalendar.init();
    </script>
@endsection