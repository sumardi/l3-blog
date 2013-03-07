@layout('layouts.default')

@section('content')	
	<h3>{{ HTML::link('post/view/' . $post->id, $post->title) }}</h3>
	<ul class="inline">
		<li><small>Posted on {{ date('d-m-Y', strtotime($post->created_at)) }}</small></li>		
		<li><small>Posted By : {{ $post->user->username }}</small></li>
	</ul>
	<hr />
	<p>
		{{ nl2br($post->body) }}
	</p>

	<p>		
		{{ Form::open('comment/new', 'POST') }}
		<fieldset>
			<legend>Comments ({{ $post->comments()->count() }})</legend>

			@foreach($post->comments()->get() as $comment)				
				<blockquote>
					<small>{{ $comment->subject }}</small>
					{{ $comment->message }}
				</blockquote>
			@endforeach

			<div class="control-group {{ isset($errors) && $errors->has('subject') ? 'error' : '' }}">
				<label for="subject">Subject</label>
				<div class="controls">
					<input type="text" name="subject" placeholder="Type something…" class="span6">
					<span class="help-block">{{ isset($errors) && $errors->has('subject') ? $errors->first('subject') : '' }}</span>
				</div>
			</div>

			<div class="control-group {{ isset($errors) && $errors->has('message') ? 'error' : '' }}">
				<label for="message">Message</label>
				<div class="controls">
					<textarea name="message" rows="4" class="span12"></textarea>
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