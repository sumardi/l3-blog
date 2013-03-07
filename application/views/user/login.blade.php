@layout('layouts.login')

@section('content')	
	{{ Form::open('user/check', 'POST', array('class' => 'form-signin')) }}
		@if(Session::has('error'))
			<div class="alert alert-error alert-block">
				<button type="button" class="close" data-dismiss="alert">&times;</button>				
				{{ Session::get('error') }}
			</div>
		@endif
		<h2 class="form-signin-heading">User Login</h2>
		<input type="text" value="{{ Input::old('username') }}" name="username" class="input-block-level" placeholder="Username">
		<input type="password" name="password" class="input-block-level" placeholder="Password">	
		<button class="btn btn-large btn-primary" type="submit">Sign in</button>
	{{ Form::close() }}
@endsection