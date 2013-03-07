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
					<li>{{ HTML::link('/', 'Home') }}</li>					
				</ul>
				<ul class="nav pull-right">
					@if(Auth::guest())
						<li>{{ HTML::link('/login', 'Login') }}</li>
					@else
						<li class="dropdown">
							{{ HTML::link('#', 'Welcome back, ' . Auth::user()->username, array('class' => 'dropdpwn-toggle', 'data-toggle' => 'dropdown', 'role' => 'button')) }}
							<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
								<li>{{ HTML::link('post/dashboard', 'Admin Area') }}</li>
								<li class="divider">&nbsp;</li>
								<li>{{ HTML::link('logout', 'Logout') }}</li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>

		<div class="row-fluid">
			<span class="span12">
				@yield('content')
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