<?php
require_once "db_module.php";
require_once "config.php";

// Tạo kết nối và lưu trong $link
taoKetNoi($link);

// Thêm mới một bản tin vào danh mục "Công nghệ"
$tieude = "Tiêu đề mới về công nghệ";
$hinhanh = "congnghe.jpg";
$noidung = "Nội dung bản tin công nghệ";
$tukhoa = "công nghệ, AI, tech";
$nguoitin = "VnExpress";
$so_luot_like = 0;
$rating = 0;

// Lấy id_danhmuc của "Công nghệ"
$sql = "SELECT id_danhmuc FROM tbl_danhmuc WHERE ten_danhmuc = 'Công nghệ'";
$result = mysqli_query($link, $sql); // sửa $conn thành $link

if ($row = mysqli_fetch_assoc($result)) {
    $id_danhmuc = $row['id_danhmuc'];

    // Chèn bản tin
    $sqlInsert = "
        INSERT INTO tbl_bantin (id_danhmuc, tieude, hinhanh, noidung, tukhoa, nguoitin, `so_luot_like`, rating)
        VALUES ($id_danhmuc, '$tieude', '$hinhanh', '$noidung', '$tukhoa', '$nguoitin', $so_luot_like, $rating)
    ";

    if (mysqli_query($link, $sqlInsert)) {
        echo "Thêm bản tin mới thành công.";
    } else {
        echo "Lỗi khi thêm bản tin: " . mysqli_error($link);
    }
} else {
    echo "Không tìm thấy danh mục 'Công nghệ'.";
}

// Giải phóng
giaiPhongBoNho($link, $result);
?>
