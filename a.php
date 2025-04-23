<?php
// Kết nối với database thông qua db_module.php
require_once 'db_module.php';

$link = null;
taoKetNoi($link);  // Kết nối database

// Truy vấn SQL để lấy top 10 bản tin có lượt like nhiều nhất
$query = "SELECT * FROM tbl_bantin ORDER BY so_luot_like DESC LIMIT 10";
$result = chayTruyVanTraVeDL($link, $query);

// Hiển thị kết quả
echo "<h1>Top 10 bản tin có lượt like nhiều nhất</h1>";
echo "<table class='table'>";
echo "<tr><th>Tiêu đề</th><th>Số lượt like</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row['tieude'] . "</td><td>" . $row['so_luot_like'] . "</td></tr>";
}
echo "</table>";

// Giải phóng bộ nhớ và đóng kết nối
giaiPhongBoNho($link, $result);
?>
