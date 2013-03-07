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
	<div class="container">
		<div class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#">My Blog</a>
				<ul class="nav">
					<li>{{ HTML::link('/post', 'Home') }}</li>
				<li>{{ HTML::link('/user/login', 'Login') }}</li>					
				</ul>
			</div>
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