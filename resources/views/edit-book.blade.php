<!DOCTYPE html>
<html>
<head>
    <title>📖 Edit Book | Bookworm Forest 🍂</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ede0d4; /* warm beige */
            color: #3b2f2f; /* rich dark brown */
            font-family: "Georgia", serif;
        }
        .card {
            background-color: #f5ebe0; /* slightly darker beige */
            border-radius: 20px;
            border: 2px solid #d4bfa3; /* warm brown border */
        }
        h2 {
            color: #3b2f2f;
            font-weight: bold;
        }
        label {
            color: #4a3a2a;
            font-weight: 500;
        }
        .form-control {
            border-radius: 12px;
            border: 1px solid #b89b72; /* soft warm brown */
            background-color: #fffdf9;
        }
        .form-control:focus {
            border-color: #8b6f47; 
            box-shadow: 0 0 5px rgba(139, 111, 71, 0.4);
        }
        .btn-primary {
            background-color: #8b6f47; /* warm coffee brown */
            border: none;
            border-radius: 12px;
        }
        .btn-primary:hover {
            background-color: #6d5435;
        }
        .btn-secondary {
            background-color: #a68a64; /* muted warm beige-brown */
            border: none;
            border-radius: 12px;
        }
        .btn-secondary:hover {
            background-color: #8b6f47;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 460px;">
        <h2 class="text-center mb-4">📖 Edit Book 🍂</h2>

        <form method="POST" action="{{ route('book.update', $book->id) }}">
            @csrf
            <div class="mb-3">
                <label>📚 Book Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $book->name) }}" required>
            </div>

            <div class="mb-3">
                <label>👤 Author Name</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label>🏷️ Genre</label>
                <select name="genre" class="form-control" required>
                    <option value="">-- Select Genre --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre }}" {{ old('genre', $book->genre) === $genre ? 'selected' : '' }}>
                            {{ $genre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>⭐ Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', $book->rating) }}" required>
            </div>

            <div class="mb-3">
                <label>💬 Comment</label>
                <textarea name="comment" class="form-control" rows="3">{{ old('comment', $book->comment) }}</textarea>
            </div>

            <div class="mb-3">
                <label>✨ Quote</label>
                <input type="text" name="quote" class="form-control" value="{{ old('quote', $book->quote) }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">📖 Update Book</button>
        </form>

        <a href="{{ route('profile') }}" class="btn btn-secondary w-100 mt-2">❌ Cancel</a>
    </div>

</body>
</html>
