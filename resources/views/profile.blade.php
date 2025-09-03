 <!DOCTYPE html>
<html>
<head>
    <title>Profile - Bookworm Forest 📚🌿</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e7d3b1; /* soft warm beige */
            font-family: 'Georgia', serif;
            color: #2b1d14; /* dark brown text */
        }
        .card {
            background-color: #f6e7d3; /* light brown card */
            border: 2px solid #d4b88a;
            border-radius: 12px;
            color: #2b1d14;
        }
        h2, h3 {
            color: #2b1d14; /* dark brown headings */
        }
        .btn-primary {
            background-color: #b48863; /* warm brown */
            color: #2b1d14;
            border: none;
            font-weight: 600;
        }
        .btn-primary:hover { background-color: #a06f4e; }
        .btn-warning { background-color: #d4b88a; color: #2b1d14; border: none; }
        .btn-warning:hover { background-color: #c79a7c; }
        .btn-danger { background-color: #a06f4e; color: #f6f1e8; border: none; }
        .btn-danger:hover { background-color: #8b5e3c; }
        .btn-info { background-color: #c79a7c; color: #2b1d14; border: none; }
        .btn-info:hover { background-color: #b48863; }

        table {
            background-color: #d9bfa3; /* slightly darker warm brown table background */
            border-radius: 10px;
            color: #2b1d14;
        }
        th, td {
            background-color: #e6cfa3; /* uniform light brown for all cells */
            color: #2b1d14;
            border: 1px solid #d4b88a;
        }
        th {
            font-weight: bold;
        }
        .alert-success {
            background-color: #cce5c7;
            color: #2b4d2b; /* dark greenish-brown for success text */
            border: none;
        }
        .text-center h2::after { content: " 📚✨"; }
        .text-center h3::after { content: " 🌿"; }
    </style>
</head>
<body>

    <div class="container py-5">

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow p-4 text-center mx-auto mb-5" style="max-width: 500px;">
            <h2>Welcome, {{ session('member_name') }}</h2>
            <p>Your ID: {{ session('member_id') }}</p>
            <div class="d-flex flex-wrap justify-content-center gap-2 mt-3">
                <a href="{{ route('home') }}" class="btn btn-primary">🏠 Go to Home</a>
                <a href="{{ route('profile.edit') }}" class="btn btn-warning">✏️ Edit Profile</a>
                <a href="/logout" class="btn btn-danger">🚪 Logout</a>
                <a href="{{ route('book.create') }}" class="btn btn-info">📖 Add Book</a>
            </div>
        </div>

        <div class="card shadow p-4">
            @if($books->count())
                <h3 class="text-center mb-4">Your Books</h3>
                <div class="table-responsive">
                    <table class="table table-bordered mt-2">
                        <thead>
                            <tr>
                                <th>📖 Name</th>
                                <th>👤 Author</th>
                                <th>🏷 Genre</th>
                                <th>⭐ Rating</th>
                                <th>💬 Comment</th>
                                <th>📝 Quote</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($books as $book)
                                <tr>
                                    <td>{{ $book->name }}</td>
                                    <td>{{ $book->author }}</td>
                                    <td>{{ $book->genre }}</td>
                                    <td>{{ $book->rating }}/5</td>
                                    <td>{{ $book->comment }}</td>
                                    <td>{{ $book->quote }}</td>
                                    <td style="white-space:nowrap;">
                                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-warning">✏️ Edit</a>
                                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this book?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">🗑 Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center mt-4">You have not added any books yet. 📚</p>
            @endif
        </div>
    </div>

</body>
</html>

