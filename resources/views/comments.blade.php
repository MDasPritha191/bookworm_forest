<!DOCTYPE html>
<html>
<head>
    <title>Comments - {{ $book->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #fdfce8, #e9f7c6); /* soft yellow-green gradient */
            font-family: 'Georgia', serif;
            color: #344422; /* dark greenish text */
        }
        h2 {
            text-align: center;
            font-weight: bold;
            color: #556b2f; /* earthy olive green */
            margin-bottom: 2rem;
        }
        .alert-success {
            background-color: #e4f7d9; /* light green alert */
            color: #2f4f2f;
            border: none;
        }
        .card {
            background-color: #f6fbd9; /* pale yellow-green */
            border: 1px solid #c5da91; /* soft olive border */
            border-radius: 12px;
            margin-bottom: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.08);
            padding: 12px 16px;
            font-size: 1rem;
        }
        .card strong {
            color: #445522; /* deeper green */
        }
        .container {
            background: transparent;
        }
        textarea.form-control {
            border-radius: 8px;
            border: 1px solid #c5da91;
            background-color: #fbffe8; /* very light yellowish green */
            color: #344422;
            padding: 10px;
            font-size: 1rem;
        }
        textarea.form-control:focus {
            border-color: #9bbf65;
            box-shadow: 0 0 6px rgba(155,191,101,0.4);
        }
        .btn-post {
            background-color: #9bbf65; /* leafy yellow-green */
            color: #fdfdf6; /* light cream text */
            border: none;
            font-weight: 600;
            border-radius: 8px;
            padding: 10px 20px;
            transition: all 0.25s ease-in-out;
        }
        .btn-post:hover {
            background-color: #7ca84d;
            transform: translateY(-2px);
        }
        form {
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2>💬🌼 Comments for {{ $book->name }} 🌼💬</h2>

    @if(session('success'))
        <div class="alert alert-success">✨ {{ session('success') }} ✨</div>
    @endif

    @foreach($book->comments as $comment)
        <div class="card">
            <strong>🌱 {{ $comment->member->name ?? 'Unknown' }}:</strong> "{{ $comment->comment }}"
        </div>
    @endforeach

    <form action="{{ route('book.comments.store', $book->id) }}" method="POST">
        @csrf
        <textarea name="comment" class="form-control" rows="2" placeholder="🌸 Leave your cozy comments here..." required></textarea>
        <button type="submit" class="btn btn-post mt-2">🌿 Post Comment</button>
    </form>
</div>

</body>
</html>
