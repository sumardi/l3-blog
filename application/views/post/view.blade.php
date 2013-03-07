@layout('layouts.default')

@section('content')	
	<h3>{{ HTML::link('post/view/' . $post->id, $post->title) }}</h3>
	<ul class="inline">
		<li><small class="label label-info">Posted on {{ date('d-m-Y', strtotime($post->created_at)) }}</small></li>		
		<li><small class="label label-info">Author : {{ $post->user->full_name }}</small></li>
	</ul>
	<hr />
	<p class="lead">
		{{ nl2br($post->body) }}
	</p>

	<p>		
		{{ Form::open('comment/new', 'POST') }}
		<fieldset>
			<legend>Comments ({{ $post->comments()->count() }})</legend>

			@foreach($post->comments()->get() as $comment)				
				<blockquote>
					<p><strong>{{ $comment->subject }}</strong></p>
					<p>{{ $comment->message }}</p>
					<small>{{ HTML::link('mailto:' . $comment->email, $comment->name) }}</small>
				</blockquote>
			@endforeach

			<div class="control-group {{ isset($errors) && $errors->has('name') ? 'error' : '' }}">
				<label for="name">Name</label>
				<div class="controls">
					<input type="text" name="name" value="{{ Input::old('name') }}" placeholder="Your name" class="span6">
					<span class="help-block">{{ isset($errors) && $errors->has('name') ? $errors->first('name') : '' }}</span>
				</div>
			</div>

			<div class="control-group {{ isset($errors) && $errors->has('email') ? 'error' : '' }}">
				<label for="email">Email</label>
				<div class="controls">
					<input type="text" name="email" value="{{ Input::old('email') }}" placeholder="Your email address" class="span6">
					<span class="help-block">{{ isset($errors) && $errors->has('email') ? $errors->first('email') : '' }}</span>
				</div>
			</div>

			<div class="control-group {{ isset($errors) && $errors->has('subject') ? 'error' : '' }}">
				<label for="subject">Subject</label>
				<div class="controls">
					<input type="text" name="subject" value="{{ Input::old('subject') }}" placeholder="Type something" class="span8">
					<span class="help-block">{{ isset($errors) && $errors->has('subject') ? $errors->first('subject') : '' }}</span>
				</div>
			</div>

			<div class="control-group {{ isset($errors) && $errors->has('message') ? 'error' : '' }}">
				<label for="message">Message</label>
				<div class="controls">
					<textarea name="message" rows="4" class="span8">{{ Input::old('message') }}</textarea>
					<span class="help-block">{{ isset($errors) && $errors->has('message') ? $errors->first('message') : '' }}</span>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-info">Submit</button>
				</div>
			</div>
		</fieldset>

		{{ Form::hidden('post_id', $post_id) }}
		{{ Form::close() }}
	</p>
@endsection