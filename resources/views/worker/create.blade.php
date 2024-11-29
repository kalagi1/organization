<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
</head>
<body>

    <div class="container">
        <h2>Çalışan Ekle</h2>
        <form action="" method="post" id="create_worker_form">
            <div class="form-group">
                <label for="">Çalışan Adı</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="">Çalışan Departmanı</label>
                <select onchange="checkParent()" class="form-control" name="department_id" id="department"></select>
            </div>
            <div class="form-group mt-3">
                <label for="">Çalışan Ünvanı</label>
                <select onchange="checkParent()" class="form-control" name="title_id" id="worker_title"></select>
            </div>
            <div>
                <label for="">Üst Kişi</label>
                <select class="form-control" name="upper_worker_id" disabled id="upper_workers"></select>
                <div class="alert alert-info mt-2" id="upper-worker-info">Bu alan departman ve ünvan seçiminize göre şekillenecektir</div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-success">Ekle</button>
            </div>
        </form>
    </div>

    <div class="modal">
        <div class="modal-bg"></div>
        <div class="modal-content">
            <div class="alert alert-info">
                Yönetim kurulu başkanı bulunamadı. Lütfen Aşağıdaki formdan yönetim kurulu başkanını ekleyiniz
            </div>

            <form action="" method="post" id="create_chairmen_of_the_board">
                <div class="form-group my-3">
                    <label for="">Yönetim Kurulu Başkanı Adı</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Ekle</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="{{asset('js/create.js')}}"></script>
</body>
</html>