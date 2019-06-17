@extends('client.master-3')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>@lang('label.My schedule')</strong></h3>
            </div>


            <!-- START CONTENT FRAME -->
            <div class="content-frame">
                <!-- START CONTENT FRAME TOP -->
                <div class="content-frame-top">
                    <div class="page-title">
                        <h2><span class="fa fa-calendar"></span> @lang('label.Calendar')</h2>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                    </div>
                </div>
                <!-- END CONTENT FRAME TOP -->

                <div class="content-frame-left">
                    <h4>@lang('label.Click for full information')</h4>
                    <div class="row">
                        <div class="panel-group accordion">
                            @foreach($schedules as $schedule)
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accOneColTwo{{$loop->index}}">
                                                @lang('label.Date'): {{ $schedule->start }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accOneColTwo{{$loop->index}}" style="display: none;">
                                        <p>@lang('label.Full name PT'): {{ $schedule->admin->name }}</p>
                                        <p>@lang('label.Date'): {{ getDateFromString($schedule->start) }}</p>
                                        <p>@lang('label.Time start'): {{ getTimeFromString($schedule->start) }}</p>
                                        <p>@lang('label.Time end'): {{ getTimeFromString($schedule->end) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <h4>@lang('label.Schedule in day')</h4>
                    <div class="row">
                        <div class="panel-group accordion">
                            @foreach($day_schedules as $day_schedule)
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#accCol{{$loop->index}}">
                                                @lang('label.Date'): {{ $day_schedule->start }}
                                            </a>
                                        </h4>
                                    </div>
                                    <div class="panel-body" id="accCol{{$loop->index}}" style="display: none;">
                                        <p>@lang('label.Full name PT'): {{ $day_schedule->admin->name }}</p>
                                        <p>@lang('label.Date'): {{ getDateFromString($day_schedule->start) }}</p>
                                        <p>@lang('label.Time start'): {{ getTimeFromString($day_schedule->start) }}</p>
                                        <p>@lang('label.Time end'): {{ getTimeFromString($day_schedule->end) }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- START CONTENT FRAME BODY -->
                <div class="content-frame-body padding-bottom-0" style="margin-left:400px">

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

            </div>
        </div>
    </div>
    <!-- PAGE CONTENT WRAPPER -->
@endsection

@section('after_script')
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-file-input.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/bootstrap/bootstrap-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/admin/plugins/fullcalendar/fullcalendar.min.js') }}"></script>
    <script>
        var fullCalendar = function(){
            var calendar = function(){
                var calendar = $('#calendar-pt').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    displayEventEnd: true,
                    eventSources: {
                        url: "{{ route('schedule.get.user', ['id' => auth()->user()->id]) }}"
                    },
                    dayClick: function(date, jsEvent, view) {
                    }
                });
            }

            return {
                init: function(){
                    calendar();
                }
            }
        }();
        fullCalendar.init();
    </script>
    <script>
        // $('#pt-select').change(function () {
        //     $('#calendar-pt').fullCalendar('destroy');
        //     var fullCalendar = function(){
        //         var calendar = function(){
        //             if($("#calendar-pt").length > 0){
        //                 var calendar = $('#calendar-pt').fullCalendar({
        //                     header: {
        //                         left: 'prev,next today',
        //                         center: 'title',
        //                         right: 'month,agendaWeek,agendaDay'
        //                     },
        //                     displayEventEnd: true,
        //                     eventSources: {url: "assets/ajax_fullcalendar.php"},
        //                     events: [
        //                         {
        //                             title: 'Event1',
        //                             start: '2019-05-29 08:15:00',
        //                             end: '2019-05-29 09:15:00'
        //                         },
        //                         {
        //                             title: 'Event2',
        //                             start: '2019-05-30 08:15:00',
        //                             end: '2019-05-30 09:15:00'
        //                         }
        //                     ],
        //                 });
        //             }
        //         }
        //
        //         return {
        //             init: function(){
        //                 calendar();
        //             }
        //         }
        //     }();
        //     fullCalendar.init();
        // })
    </script>
@endsection