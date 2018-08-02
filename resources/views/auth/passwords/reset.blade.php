@extends('web.app')
@section('title', 'زاول | اعادة تعيين كلمة المرور')
@section('style', '
    padding-top: 90px;
')
@section('content')
    <!-- Content-->

<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<h2 class="page-title"><i class="fa fa-refresh" aria-hidden="true"></i> إعادة تعيين كلمة المرور</h2>
		</div>
	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
	
	<!-- Submit Page -->
	<div class="sixteen columns">
		<div class="my-account" style="margin-top:30px !important;">
		   <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

                <span class="notification-item notification notice closeable">{{ Session::get('alert-' . $msg) }} </span>
                </p>
            @endif
        @endforeach
    </div>
			<form class="login"role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">


<p class="form-row form-row-wide">
					<label for="password1">البريد الالكتروني:
					  <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
					</label>
				</p>
				<p class="form-row form-row-wide">
					<label for="password1">كلمة المرور الجديدة:
					   <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
					</label>
				</p>

				<p class="form-row form-row-wide">
					<label for="password2">تكرار كلمة المرور:
					  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
					</label>
				</p>
				
				<p class="form-row">
					<input type="submit" style="height:54px;" class="button border fw margin-top-10" name="login" value="تحديث" />
				</p>
				
			</form>

		</div>
	</div>

</div>

@endsection

