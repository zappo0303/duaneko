<h2>Kết quả tìm kiếm</h2>
<ul>
    <?php if (!empty($listsp)): ?>
        <?php foreach ($listsp as $sp): ?>
            <li>
                <a href="index.php?act=chitietsp&idsp=<?= $sp['id'] ?>">
                    <?= $sp['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm nào.</p>
    <?php endif; ?>
</ul>
