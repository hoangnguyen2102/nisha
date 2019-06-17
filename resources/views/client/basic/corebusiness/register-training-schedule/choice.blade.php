@extends('client.master-3')

@section('content')
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><strong>@lang('label.Register schedule')</strong></h3>
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

                <form class="form-horizontal" method="POST" action="{{ $route }}" enctype="multipart/form-data">
                @csrf
                <!-- START CONTENT FRAME LEFT -->
                    <div class="content-frame-left">
                        <h4>@lang('label.Please choice one personal trainer')</h4>
                        <div class="form-group">
                            <label class="col-md-3 control-label">@lang('label.Search')</label>
                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                            <div class="col-md-9">
                                <select class="form-control select" data-live-search="true" name="personal_trainer" id="pt-select">
                                    <option value="0">@lang('label.Choice')</option>
                                    @if (!is_null($pts))
                                        @foreach ($pts as $pt)
                                            <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('client.components.button-submit-schedule')
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT FRAME LEFT -->
                </form>

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
                if($("#calendar-pt").length > 0){
                    var calendar = $('#calendar-pt').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        eventSources: {url: "assets/ajax_fullcalendar.php"},
                        events: [
                            {
                                title: 'Event1',
                                start: '2019-05-29'
                            },
                            {
                                title: 'Event2',
                                start: '2011-05-05'
                            }
                        ],
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