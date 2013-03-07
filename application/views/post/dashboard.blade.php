@layout('layouts.admin')

@section('content')
	@if(Session::has('status'))
		<div class="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			{{ Session::get('status') }}
		</div>
	@endif

	<h3>Posts</h3>
	<table class="table table-hover">
		<thead>
			<tr>
				<th width="10%">ID</th>
				<th>Title</th>
				<th width="25%">Date Created</th>
				<th width="15%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts->results as $post)
			<tr>
				<td>{{ HTML::link('post/view/' . $post->id, $post->id) }}</td>
				<td>{{ $post->title }}</td>
				<td>{{ date('d-m-Y h:i a', strtotime($post->created_at)) }}</td>
				<td>
					<a href="{{ URL::to('post/update/' . $post->id) }}" class="btn btn-info"><i class="icon-edit">&nbsp;</i></a>&nbsp;
					<a href="{{ URL::to('post/remove/' . $post->id) }}" class="btn btn-danger"><i class="icon-trash">&nbsp;</i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{{ $posts->links() }}

	<!-- Modal -->
	<script type="text/javascript">
		 $(".btn-danger").click(function(e) {
		 	var btn = $(this);
		 	e.preventDefault();
            bootbox.confirm("Are you sure want to remove?", function(result) {
                if(result) {
                	window.location.href = btn.attr("href");                	
                }
            });
        });
	</script>
@endsection