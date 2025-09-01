<!DOCTYPE html>
<html>
<head>
    <title>All Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">My Laravel App</a>
        <a class="btn btn-outline-light" href="/">Back</a>
    </div>
</nav>

<div class="container my-5">
    <h2 class="text-center mb-4">All Books</h2>

    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                        <p><strong>Genre:</strong> {{ $book->genre }}</p>
                        <p><strong>Rating:</strong> {{ $book->rating }}/5</p>
                        <p><em>"{{ $book->quote }}"</em></p>
                        <p class="text-secondary">{{ $book->comment }}</p>
                    </div>
                    <div class="card-footer text-muted">
                        Posted by {{ $book->member->name ?? 'Unknown' }}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
