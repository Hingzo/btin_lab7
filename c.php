<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
//Liệt kê tất cả bản tin thuộc danh mục "Giáo dục" và "Đời sống"
$sql = "
    SELECT * FROM tbl_bantin b
    JOIN tbl_danhmuc dm ON b.id_danhmuc = dm.id_danhmuc
    WHERE dm.ten_danhmuc IN ('Giáo dục', 'Đời sống')
";
$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p>{$row['tieude']} - Danh mục: {$row['ten_danhmuc']}</p>";
}

giaiPhongBoNho($link, true);
?>