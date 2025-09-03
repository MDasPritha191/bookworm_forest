<div class="container my-5">
    <h2>Report Book: {{ $book->name }}</h2>

    <form action="{{ route('reports.store', $book->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="reason" class="form-label">Reason for reporting</label>
            <textarea name="reason" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Send Report</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
