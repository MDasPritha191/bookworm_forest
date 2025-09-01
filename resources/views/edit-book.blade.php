<!DOCTYPE html>
<html>
<head>
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="card shadow p-4" style="width: 450px;">
        <h2 class="text-center mb-4">Edit Book</h2>

        <form method="POST" action="{{ route('book.update', $book->id) }}">
            @csrf
            {{-- If you used PUT route:
            @method('PUT')
            --}}

            <div class="mb-3">
                <label>Book Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $book->name) }}" required>
            </div>

            <div class="mb-3">
                <label>Author Name</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $book->author) }}" required>
            </div>

            <div class="mb-3">
                <label>Genre</label>
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
                <label>Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', $book->rating) }}" required>
            </div>

            <div class="mb-3">
                <label>Comment</label>
                <textarea name="comment" class="form-control" rows="3">{{ old('comment', $book->comment) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Quote</label>
                <input type="text" name="quote" class="form-control" value="{{ old('quote', $book->quote) }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>

        <a href="{{ route('profile') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
    </div>
</body>
</html>
