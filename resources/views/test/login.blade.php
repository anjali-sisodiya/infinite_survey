<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
</head>
<body>
	<form method="post" action="/login">
		@csrf
		email<input type="email" name="email"><br>
		password<input type="password" name="password"><br>
		<input type="submit">
	</form>

</body>
</html>