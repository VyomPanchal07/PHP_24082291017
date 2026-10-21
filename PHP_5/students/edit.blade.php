<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p style="color:red">{{ $error }}</p>
        @endforeach
    @endif

    <form action="{{ route('students.update', $student) }}"
        method="POST">
        @csrf
        @method('PUT')

        Name:
        <input type="text" name="name"
            value="{{ old('name', $student->name) }}" required>
        <br><br>

        Email:
        <input type="email" name="email"
            value="{{ old('email', $student->email) }}" required>
        <br><br>

        Age:
        <input type="number" name="age"
            value="{{ old('age', $student->age) }}"
            min="1" max="120" required>
        <br><br>

        <button type="submit">Update Student</button>
    </form>

    <a href="{{ route('students.index') }}">Back</a>
</body>
</html>