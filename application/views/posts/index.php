<div class="posts">
    <h2><?= $title ?></h2>
    <?php foreach ($posts as $post): ?>
        <div class="d-flex align-items-center">
            <h4><?= $post['title'] ?></h4>
            <div class="ms-2">
                <small class="p-auto"><?= $post['created_at'] ?></small>
            </div>
        </div>

        <p style="text-align: justify;"><?= $post['body'] ?></p>
        <p><a href="<?= site_url('/posts/' . $post['slug']) ?>">Read More</a></p>
    <?php endforeach; ?>
</div>