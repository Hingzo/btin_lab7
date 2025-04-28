<?php
require_once "db_module.php";


$link = null;
taoKetNoi($link);


$query = "SELECT id_bantin, tieude, so_luot_like 
          FROM tbl_bantin 
          ORDER BY so_luot_like DESC";


$result = chayTruyVanTraVeDL($link, $query);
$data = layDuLieu($result);
?>

<div class="list-group">
    <div class="list-group-item active bg-success text-white">
        <h5 class="mb-0">Thống kê số lượt like của các bài viết</h5>
    </div>
    
    <?php if (count($data) > 0): ?>
        <?php foreach ($data as $row): ?>
            <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div>
                    <strong><?= $row['tieude'] ?></strong>
                    <br>
                    <small class="text-muted">ID: <?= $row['id_bantin'] ?></small>
                </div>
                <span class="badge bg-primary rounded-pill"><?= $row['so_luot_like'] ?></span>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="list-group-item">
            <div class="alert alert-warning mb-0">Không có bài viết nào trong cơ sở dữ liệu.</div>
        </div>
    <?php endif; ?>
</div>

<?php
giaiPhongBoNho($link, $result);
?>