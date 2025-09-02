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

        <form method="GET" action="{{ route('home') }}" class="mb-4 d-flex justify-content-center">
            <select name="genre" class="form-select w-25 me-2">
                <option value="">-- All Genres --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre }}" {{ request('genre') == $genre ? 'selected' : '' }}>
                        {{ $genre }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <div class="row">
            @if($books->isEmpty())
                <p class="text-center text-muted">No books found for this genre.</p>
            @else
                @foreach($books as $book)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <div class="card-body">
                                <h5 class="card-title">{{ $book->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">By {{ $book->author }}</h6>
                                <p><strong>Genre:</strong> {{ $book->genre }}</p>
                                <p><strong>Rating:</strong> {{ $book->rating }}/5</p>
                            </div>
                            <div class="card-footer text-muted">
                                Posted by {{ $book->member->name ?? 'Unknown' }} <br>
                                <a href="{{ route('book.comments', $book->id) }}" class="btn btn-sm btn-outline-primary mt-2">Comments</a>
                                <a href="{{ route('book.quotes', $book->id) }}" class="btn btn-sm btn-outline-secondary mt-2">Quotes</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

</body>
</html>