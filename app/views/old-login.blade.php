<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Slick Login</title>
<meta name="description" content="slick Login">
<meta name="author" content="Webdesigntuts+">
<link rel="stylesheet" type="text/css" href="login/style.css" />
<script type="text/javascript" src="bluewhale/js/jquery-1.6.4.min.js"></script>
<script src="login/modernizr-latest.js"></script>
<script type="text/javascript" src="login/placeholder.js"></script>
</head>
<body>
{{Form::open(array('url'=>'/admin/login', 'id'=>'slick-login'))}}
<label for="username">Username</label><input type="text" name="username" class="placeholder" placeholder="username">
<label for="password">Password</label><input type="password" name="password" class="placeholder" placeholder="password">
<input type="submit" value="Log In">
{{Form::close()}}
</body>
</html>