{{-- <!DOCTYPE html>
<html>
<head>
    <title>Book Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #d7bc96; /* soft warm beige */
            font-family: "Georgia", serif;
            color: #4b3621; /* dark brown for text */
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            color: #5c3a26; /* warm yellowish-brown */
            margin-bottom: 2rem;
        }

        table {
            background-color: #daa774; /* very light beige for table */
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-collapse: separate;
            border-spacing: 0;
            overflow: hidden;
        }

        th {
            background-color: #be9d5f; /* soft yellowish-brown header */
            color: #3b2f2f;
            text-align: center;
            font-weight: 600;
            padding: 12px;
        }

        td {
            padding: 10px;
            color: #4b3621;
            vertical-align: middle;
        }

        tr:nth-child(even) {
            background-color: #c78a58; /* subtle alternate row color */
        }

        tr:hover {
            background-color: #dbaf71; /* gentle hover effect */
        }

        p {
            text-align: center;
            font-style: italic;
            color: #895e38;
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Book Reports</h2>

    @if($reports->isEmpty())
        <p>Nothing to see here yet 🙂</p>
    @else
        <table class="table">
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
</html> --}}



<!DOCTYPE html>
<html>
<head>
    <title>Book Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #76afac; /* soft minty green background */
            font-family: "Georgia", serif;
            color: #1b3d3d; /* deep sea green text */
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
        }

        h2 {
            text-align: center;
            font-weight: bold;
            color: #20665d; /* stronger sea green headings */
            margin-bottom: 2rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        th {
            background-color: #66cdaa; /* seagreen header */
            color: #103333;
            font-weight: bold;
            padding: 12px;
            text-align: center;
        }

        td {
            background-color: #f0fdfc; /* very light mint row */
            color: #1b3d3d;
            padding: 12px;
            text-align: center;
        }

        tr:nth-child(even) td {
            background-color: #d9f5f3; /* alternate soft aqua row */
        }

        tr:hover td {
            background-color: #c0ebe6; /* gentle hover seafoam */
        }

        p {
            text-align: center;
            font-style: italic;
            color: #167272; /* darker seagreen */
            margin-top: 2rem;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Book Reports</h2>

    @if($reports->isEmpty())
        <p>Nothing to see here yet 🙂</p>
    @else
        <table>
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
