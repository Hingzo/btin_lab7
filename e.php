<?php
require_once "db_module.php";


$link = null;
taoKetNoi($link);

// Truy vấn lấy danh sách độc giả đã bình luận vào bản tin với tiêu đề cụ thể và chứa từ khóa
$query = "SELECT DISTINCT dg.id_docgia, dg.hoten, dg.email, bl.noidung, bl.thoigian
          FROM tbl_docgia dg
          JOIN tbl_binhluan bl ON dg.id_docgia = bl.id_docgia
          JOIN tbl_bantin bt ON bl.id_bantin = bt.id_bantin
          WHERE bt.tieude LIKE '%Thoái trào tất yếu của Apple trước cạnh tranh trên thị trường smartphone%'
          AND bl.noidung LIKE '%ngốc nghếch%'
          ORDER BY dg.hoten";


$result = chayTruyVanTraVeDL($link, $query);
$data = layDuLieu($result);
?>

<div class="list-group">
    <div class="list-group-item active bg-info text-white">
        <h5 class="mb-0">Danh sách độc giả bình luận bản tin về Apple có chứa từ khóa "ngốc nghếch"</h5>
    </div>
    
    <?php if (count($data) > 0): ?>
        <?php foreach ($data as $row): ?>
            <div class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $row['hoten'] ?> </h5>
                    <small><?= $row['thoigian'] ?></small>
                </div>
                <p class="mb-1"><?= $row['noidung'] ?></p>
                <small class="text-muted">Email: <?= $row['email'] ?> | ID: <?= $row['id_docgia'] ?></small>
            </div>

        <?php endforeach; ?>

    <?php else: ?>
        <div class="list-group-item">
            <div class="alert alert-warning mb-0">Không tìm thấy độc giả.</div>
        </div>
    <?php endif; ?>
</div>
<?php

giaiPhongBoNho($link, $result);
?>