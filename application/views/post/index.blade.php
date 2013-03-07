@layout('layouts.default')

@section('content')
	@foreach($posts->results as $post) 	
		<h3>
		{{ HTML::link('post/view/' . $post->id, $post->title) }}
		</h3>
		<ul class="inline">
			<li><small>Posted on {{ date('d-m-Y', strtotime($post->created_at)) }}</small></li>
			<li><small>Comments ({{ $post->comments()->count() }})</small></li>
			<li><small>Posted By : {{ $post->user->full_name }}</small></li>
		</ul>
		<hr />		
		<p>
			{{ nl2br($post->body) }}
		</p>		
	@endforeach

	{{ $posts->links() }}
@endsection