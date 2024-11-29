<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/jquery.orgchart.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>

    <div class="container">
        <div class="mb-3">
            <button class="btn btn-primary show-chart">Chart Görünümü</button>
            <button class="btn btn-primary show-list">Liste Görünümü</button>
        </div>
        <div id="chart-container"></div>

        <div class="d-none" id="table-container">
            <table id="list-table">
                <thead>
                    <tr>
                        <th>Departman</th>
                        <th>Unvan</th>
                        <th>Kişi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{asset('js/jquery.orgchart.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>