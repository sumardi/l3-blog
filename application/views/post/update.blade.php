@layout('layouts.admin')

@section('content')	
	{{ Form::open('post/save', 'POST', array('form' => 'form-horizontal')) }}
		<fieldset>
			<legend>Update Post</legend>
			<div class="control-group {{ isset($errors) && $errors->has('title') ? 'error' : '' }}">
				<label for="title">Title</label>
				<div class="controls">
					<input type="text" name="title" class="span12" value="{{ $post->title }}">
					<span class="help-block">{{ isset($errors) && $errors->has('title') ? $errors->first('title') : '' }}</span>
				</div>
			</div>
			
			<div class="control-group">
				<label for"body">Body</label>
				<div class="controls {{ isset($errors) && $errors->has('title') ? 'error' : '' }}">
					<textarea name="body" class="span12" rows="8">{{ $post->body }}</textarea>
					<span class="help-block">{{ isset($errors) && $errors->has('body') ? $errors->first('body') : '' }}</span>			
				</div>
			</div>
			{{ Form::hidden('post_id', $post_id) }}

			<button type="submit" class="btn btn-primary">Save Changes</button>
			{{ HTML::link('post/dashboard', 'Cancel', array('class' => 'btn')) }}
		</fieldset>
	{{ Form::close() }}
@endsection