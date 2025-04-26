<?php
require_once("db_module.php");
$link = null;
taoKetNoi($link);
// Liệt kê tất cả bình luận của bản tin có tiêu đề "Thay đổi cách thức mua sắm trong thời kì thương mại điện tử"
$sql = "
    SELECT bl.tieude, bl.noidung, bl.thoigian, dg.hoten 
    FROM tbl_binhluan bl
    JOIN tbl_docgia dg ON bl.id_docgia = dg.id_docgia
    JOIN tbl_bantin bt ON bl.id_bantin = bt.id_bantin
    WHERE bt.tieude = 'Thay đổi cách thức mua sắm của khách hàng trong thời kì thương mại điện tử'
";
$result = chayTruyVanTraVeDL($link, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo "<p><strong>{$row['hoten']}</strong> bình luận: {$row['noidung']} lúc {$row['thoigian']}</p>";
}

giaiPhongBoNho($link, true);
?>