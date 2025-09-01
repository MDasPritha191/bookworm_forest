<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container py-5">
        <div class="card shadow p-4 text-center mx-auto" style="max-width: 500px;">
            <h2>Welcome, {{ session('member_name') }}</h2>
            <p>Your ID: {{ session('member_id') }}</p>
            <a href="/" class="btn btn-primary mt-3">Go to Home</a>
            <a href="{{ route('profile.edit') }}" class="btn btn-warning mt-3">Edit Profile</a>
            <a href="/logout" class="btn btn-danger mt-3">Logout</a>
            <a href="{{ route('book.create') }}" class="btn btn-info mt-3">Add Book</a>
        </div>

        <div class="card shadow p-4 mt-5">
            @if($books->count())
                <h3 class="text-center">Your Books</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Genre</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Quote</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>{{ $book->rating }}/5</td>
                                    <td>{{ $book->comment }}</td>
                                    <td>{{ $book->quote }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center mt-4">You have not added any books yet.</p>
            @endif
        </div>
    </div>

</body>
</html>