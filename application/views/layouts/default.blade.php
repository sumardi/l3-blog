<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Blog</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</head>

<body>
	<div class="container-narrow">
		<div class="row-fluid">
			<span class="span12">
				<ul class="nav nav-pills pull-right">
					<li>{{ HTML::link('/', 'Home') }}</li>
					<li>{{ HTML::link('/user/login', 'Login') }}</li					
				</ul>
				<h3 class="muted">My Blog</h3>
			</span>			 	
		</div>

		<div class="row-fluid">
			<span class="span9">
				@yield('content')
			</span>			 	

			<span class="span3">

			</span>			 	
		</div>
	</div>
</body>
</html>