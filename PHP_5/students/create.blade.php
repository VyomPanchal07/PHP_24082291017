<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h2>Add Student</h2>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        Name:
        <input type="text" name="name"
            value="{{ old('name') }}" required>
        <br><br>

        Email:
        <input type="email" name="email"
            value="{{ old('email') }}" required>
        <br><br>

        Age:
        <input type="number" name="age"
            value="{{ old('age') }}" min="1" max="120" required>
        <br><br>

        <button type="submit">Save Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>
</html>