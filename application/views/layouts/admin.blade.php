<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Blog</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::script('js/bootbox.js') }}
</head>

<body>
	<div class="container">
		<div class="row-fluid">
			<span class="span9">
				<h1>My Blog</h1>

				@yield('content')
			</span>			 	

			<span class="span3">
				<h3>Menu</h3>
				<p>Welcome back, {{ Auth::user()->full_name }} </p>
				<ul class="nav nav-pills nav-stacked">
					<li>{{ HTML::link('/', 'View Blog') }}</li>
					<li>{{ HTML::link('post/dashboard', 'Dashboard') }}</li>
					<li>{{ HTML::link('post/create', 'New Post') }}</li>
					<li>{{ HTML::link('user/logout', 'Logout') }}</li>
				</ul>
			</span>			 	
		</div>

		<div id="footer">
			<div class="panel">
				<p class="muted credit">Blog Application by <a href="http://about.me/sumardi">Sumardi Shukor</a>.</p>
			</div>
		</div>
	</div>
</body>
</html>