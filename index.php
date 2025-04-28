<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Bản tin - Giao diện chính</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-primary mb-4"> Giao diện quản lý Bản tin</h2>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-a">Câu a</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-e">Câu e</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-f">Câu f</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-g">Câu g</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-h">Câu h</button></li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content border p-3 bg-white">
        <!-- Câu a -->
        <div class="tab-pane fade show active" id="tab-a">
            <button class="btn btn-primary mb-3" id="loadTop10">Xem Top 10 bản tin nhiều like</button>
            <div id="result-a"></div>
        </div>

        <div class="tab-pane fade" id="tab-e">
            <button class="btn btn-info mb-3" id="loadDocGiaBinhLuan">Xem độc giả bình luận về bài Apple</button>
            <div id="result-e"></div>
        </div>
        
    
        <div class="tab-pane fade" id="tab-f">
            <button class="btn btn-success mb-3" id="loadLuotLike">Xem số lượt like của các bài viết</button>
            <div id="result-f"></div>
        </div>
       
    </div>
</div>

<script>
    // Câu a - Load top 10 bài viết
    $('#loadTop10').click(function () {
        $.get('a.php', function (data) {
            $('#result-a').html(data);
        });
    });
    
    // Câu e - Load danh sách độc giả bình luận bản tin
    $('#loadDocGiaBinhLuan').click(function () {
        $.get('e.php', function (data) {
            $('#result-e').html(data);
        });
    });
    
    // Câu f - Load số lượt like của từng bài viết
    $('#loadLuotLike').click(function () {
        $.get('f.php', function (data) {
            $('#result-f').html(data);
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>