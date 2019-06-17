@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@lang('label.Verify Your Email Address')</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                @lang('label.A fresh verification link has been sent to your email address.')
                            </div>
                        @endif

                        @lang('label.Before proceeding, please check your email for a verification link.')
                        @lang('label.If you did not receive the email'), <a href="{{ route('admin.verification.resend') }}">@lang('label.click here to request another')</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
