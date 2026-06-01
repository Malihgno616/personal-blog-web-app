<ul class="posts">
    <?php foreach ($data["posts"] as $post): ?>
    <li class="post-item">
        <a class="post-link" href="<?= url("article/" . $post["id"]) ?>">
            <span class="post-title"><?= htmlspecialchars($post["title"]) ?></span>
            <span class="post-date"><?= $post["published_at"] ?></span>
        </a>
    </li>
    <?php endforeach; ?>
</ul>      
<nav class="pagination">
    <ul class="pagination-list">

        <?php if ($page > 1): ?>
            <li class="pagination-item">
                <a href="<?= url('articles/' . ($page - 1)) ?>"
                class="pagination-link">
                    Anterior
                </a>
            </li>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $data['pages']; $i++): ?>
            <li class="pagination-item">
                <a href="<?= url('articles/' . $i) ?>"
                class="pagination-link">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>

        <?php if ($page < $data['pages']): ?>
            <li class="pagination-item">
                <a href="<?= url('articles/' . ($page + 1)) ?>"
                class="pagination-link">
                    Próximo
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>