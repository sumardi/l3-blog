@layout('layouts.default')

@section('content')
	@foreach($posts->results as $post) 	
		<h3>
		{{ HTML::link('post/view/' . $post->id, $post->title) }}
		</h3>
		<ul class="inline">
			<li><small class="label label-info">Posted on {{ date('d-m-Y', strtotime($post->created_at)) }}</small></li>
			<li><small class="label label-info" class="label label-info">Comments ({{ $post->comments()->count() }})</small></li>
			<li><small class="label label-info">Author : {{ $post->user->full_name }}</small></li>
		</ul>
		<hr />		
		<p class="lead">
			{{ nl2br($post->body) }}
		</p>		
	@endforeach

	{{ $posts->links() }}
@endsection