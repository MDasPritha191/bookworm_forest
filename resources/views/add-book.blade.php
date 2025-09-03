<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #fdf6ed; /* soft warm beige */
            font-family: "Georgia", serif;
            color: #3b2f2f; /* dark brown text */
        }

        .card {
            background-color: #f5e9df; /* warm beige card */
            border-radius: 18px;
            border: 2px solid #5c3a26; /* rich wood brown border */
            box-shadow: 0 6px 14px rgba(0,0,0,0.15);
        }

        h2 {
            color: #3b2f2f; /* dark brown heading */
            font-weight: bold;
        }

        label {
            color: #4a3a2a; /* warm earthy brown */
            font-weight: 500;
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #705039; /* warm brown border */
            background-color: #fffdf9;
            color: #3b2f2f;
        }

        .form-control:focus {
            border-color: #8b6f47; /* darker brown on focus */
            box-shadow: 0 0 6px rgba(139,111,71,0.3);
        }

        .btn-primary {
            background-color: #8b6f47; /* rich coffee brown */
            border: none;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #6d5435;
        }

        .btn-secondary {
            background-color: #a3b18a; /* muted soft green */
            border: none;
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #7c8f65;
        }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow p-4" style="width: 420px;">
        <h2 class="text-center mb-4">📖 Add Book 🌿</h2>

        <form method="POST" action="{{ route('book.store') }}">
            @csrf
            <div class="mb-3">
                <label>📚 Book Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>👤 Author Name</label>
                <input type="text" name="author" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>🏷️ Genre</label>
                <select name="genre" class="form-control" required>
                    <option value="">-- Select Genre --</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre }}">{{ $genre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>⭐ Rating (1-5)</label>
                <input type="number" name="rating" class="form-control" min="1" max="5" required>
            </div>
            <div class="mb-3">
                <label>💬 Comment</label>
                <textarea name="comment" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>✨ Quote</label>
                <input type="text" name="quote" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary w-100">✅ Done</button>
        </form>
        <a href="{{ route('profile') }}" class="btn btn-secondary w-100 mt-2">❌ Cancel</a>
    </div>

</body>
</html>
