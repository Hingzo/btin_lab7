<?php
require_once 'config.php';
require_once("db_module.php");


// Kết nối CSDL
$conn = mysqli_connect(HOST, USER, PASSWORD, DB);


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


// ID của bình luận cần xóa (sử dụng ID vừa chèn từ insert.php)
$id_binhluan = 27;  // Chỉnh sửa ID ở đây, hoặc lấy từ URL hoặc biến session nếu cần.


// Câu lệnh DELETE
$sql_delete = "DELETE FROM tbl_binhluan WHERE id_binhluan = $id_binhluan";


// Thực thi câu lệnh DELETE
if (mysqli_query($conn, $sql_delete)) {
    echo "Dữ liệu đã được xóa thành công.<br>";
} else {
    echo "Lỗi khi xóa dữ liệu: " . mysqli_error($conn);
}


// Đóng kết nối
mysqli_close($conn);
?>