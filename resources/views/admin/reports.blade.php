<!DOCTYPE html>
<html>
<head>
    <title>Book Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <h2>Book Reports</h2>

    @if($reports->isEmpty())
        <p>No reports yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Reported By</th>
                    <th>Reason</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->book->name ?? 'Unknown' }}</td>
                        <td>{{ $report->member->name ?? 'Unknown' }}</td>
                        <td>{{ $report->reason }}</td>
                        <td>{{ $report->created_at->format('d M Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</body>
</html>
