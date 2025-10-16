<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Show page</title>
</head>
<body>
    <form method="get" action="">
       
        @foreach($data as $item)
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ $item->name }}"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ $item->email }}"><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="{{ $item->age }}"><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" id="gender-male" {{ $item->gender === 'Male' ? 'checked' : '' }}>
        <label for="gender-male">Male</label>
        <input type="radio" name="gender" value="Female" id="gender-female" {{ $item->gender === 'Female' ? 'checked' : '' }}>
        <label for="gender-female">Female</label><br>
        @endforeach
        <input type="submit" value="update">
    </form>

    <a href="{{ route('logout') }}">Logout</a>

    @if(session('name'))
        <p>Welcome, {{ session('name') }}</p>
    @endif
</body>
</html>
