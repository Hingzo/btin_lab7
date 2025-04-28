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
    <h2 class="text-primary mb-4">Giao diện quản lý Bản tin</h2>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-a">Câu a</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-b">Câu b</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-c">Câu c</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-d">Câu d</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-e">Câu e</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-f">Câu f</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-g">Câu g</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-h">Câu h</button></li>
        <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-i">Câu i</button></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content border p-3 bg-white">
        <!-- Tab A -->
        <div class="tab-pane fade show active" id="tab-a">
            <button class="btn btn-info mb-3" id="loadTop10">Liệt kê các bản tin có số lượt like nhiều nhất (top 10)
            </button>
            <div id="result-a"></div>
        </div>

        <div class="tab-pane fade" id="tab-e">
            <button class="btn btn-info mb-3" id="loadDocGiaBinhLuan">Xem độc giả bình luận về bài Apple</button>
            <div id="result-e"></div>
        </div>
     
        <!-- Tab B -->
        <div class="tab-pane fade" id="tab-b">
        <button class="btn btn-info mb-3" id="loadCongNghe">Liệt kê các bản tin có chữ từ khóa "công nghệ" trong tiêu đề bản tin</button>
        <div id="result-b"></div>
        </div>
        <!-- Tab C -->
        <div class="tab-pane fade" id="tab-c">
            <button class="btn btn-info mb-3" id="loadDanhmuc">Liệt kê tất cả bản tin thuộc danh mục "Giáo dục" và danh mục "Đời sống"</button>
            <div id="result-c"></div>
        </div>

        <!-- Tab D -->
        <div class="tab-pane fade" id="tab-d">
            <button class="btn btn-info mb-3" id="loadBinhluan">Liệt kê tất cả bình luận của bản tin có tiêu đề "Thay đổi cách thức mua sắm trong thời kì thương mại điện tử"
            </button>
            <div id="result-d"></div>
        </div>
       <!-- Câu E -->
       <div class="tab-pane fade" id="tab-e">
            <button class="btn btn-info mb-3" id="loadDocGiaBinhLuan">Liệt kê các độc giả đã bình luận bản tin “ Thoái trào tất yếu của Apple trước cạnh trạnh trên thị trường smartphone" và chứa từ khóa "ngốc nghếch"
            </button>
            <div id="result-e"></div>
        </div>
        
        <!-- Câu F -->

        <div class="tab-pane fade" id="tab-f">
            <button class="btn btn-info mb-3" id="loadLuotLike">Đếm số lượt like của từng bài viết</button>
            <div id="result-f"></div>
        </div>
       
    </div>

        <!-- Tab G -->
        <div class="tab-pane fade" id="tab-g">
            <button class="btn btn-info mb-3" id="insertBantin">Thêm mới một bản tin vào danh mục "Công nghệ"</button>
            <div id="result-g"></div>
        </div>
            <!-- Tab H -->
        <div class="tab-pane fade" id="tab-h">
            <button class="btn btn-info mb-3" id="themBinhLuan">Thêm bình luận về bản tin Samsung</button>
            <div id="result-h"></div>
        </div>
        <!-- Tab I -->
        <div class="tab-pane fade" id="tab-i">
            <button class="btn btn-info mb-3" id="capNhatBanTin">Cập nhật nội dung bản tin ID 10</button>
            <div id="result-i"></div>
        </div>
</div>

<script>
    // Câu a - Load top 10 bản tin nhiều lượt like
    $('#loadTop10').click(function () {
        $.get('a.php', function (data) {
            $('#result-a').html(data);
        });
    });
    
    // Câu b - Load bài viết chứa "công nghệ"
    $('#loadCongNghe').click(function () {
        $.get('b.php', function (data) {
            $('#result-b').html(data);
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
    // Câu c - Liệt kê bản tin thuộc danh mục Giáo dục và Đời sống
     $('#loadDanhmuc').click(function () {
        $.get('c.php', function (data) {
            $('#result-c').html(data);
        });
    });

    // Câu d - Liệt kê bình luận bản tin thương mại điện tử
    $('#loadBinhluan').click(function () {
        $.get('d.php', function (data) {
            $('#result-d').html(data);
        });
    });

    // Câu g - Thêm bản tin mới về Công nghệ
    $('#insertBantin').click(function () {
        $.get('g.php', function (data) {
            $('#result-g').html(data);
        });
    });

    // Câu h - Thêm bình luận vào bản tin Samsung
    $('#themBinhLuan').click(function () {
        $.get('h.php', function (data) {
            $('#result-h').html(data);
        });
    });
    
    // Câu i - Cập nhật nội dung bản tin ID 10
    $('#capNhatBanTin').click(function () {
        $.get('i.php', function (data) {
            $('#result-i').html(data);
        });
    });
</script>

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>