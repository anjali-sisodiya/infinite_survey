<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>registration</title>
</head>
<body>
	<form method="post" action="/register">
		@csrf
		name<input type="text" name="name"><br>
		email<input type="email" name="email"><br>
		age<input type="number" name="age"><br>
		Gender<br> male<input type="radio" name="gender" value="Male"><br>
		female<input type="radio" name="gender" value="Female"><br>
		password<input type="password" name="password"><br>
		password_confirmation<input type="password" name="password_confirmation"><br>
		<input type="submit">
	</form>
</body>
</html>