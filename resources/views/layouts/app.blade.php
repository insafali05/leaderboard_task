<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #000;
            color: #fff;
        }

        .card {
            background: #111;
            border-radius: 10px;
            border: 1px solid #444;
        }

        .table thead {
            background: #222;
            color: #fff;
        }

        .table-dark tbody tr {
            background: linear-gradient(to right, #111, #222);
            color: #fff;
        }

        .table-dark tbody tr:hover {
            background-color: #333;
        }

        .highlight-row {
            border: 2px solid #fff;
        }

        .form-control,
        .form-select {
            background: #222;
            color: #fff;
            border: 1px solid #555;
        }

        .form-control::placeholder {
            color: #aaa;
        }

        .btn-custom {
            background-color: #ccc;
            color: #000;
        }
    </style>
</head>
@stack('scripts')

<body>
    <div class="container py-5">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>