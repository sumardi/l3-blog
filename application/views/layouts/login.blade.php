<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Blog</title>
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/style.css') }}
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}	
</head>

<body class="login">
	<div class="panel" id="wrap">
		@yield('content')
	</div>

	<div id="footer">
		<div class="panel">
			<p class="muted credit">Blog Application by <a href="http://about.me/sumardi">Sumardi Shukor</a>.</p>
		</div>
	</div>
</body>
</html>