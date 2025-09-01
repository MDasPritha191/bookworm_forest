<div class="container my-5">
    <h2>Comments for {{ $book->name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($book->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <strong>{{ $comment->member->name ?? 'Unknown' }}:</strong> {{ $comment->comment }}
            </div>
        </div>
    @endforeach

    <form action="{{ route('book.comments.store', $book->id) }}" method="POST" class="mt-3">
        @csrf
        <textarea name="comment" class="form-control" rows="3" placeholder="Add a comment" required></textarea>
        <button type="submit" class="btn btn-primary mt-2">Post Comment</button>
    </form>
</div>
