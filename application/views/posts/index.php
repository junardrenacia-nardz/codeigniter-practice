<div class="posts">
    <h2 class="mb-4"><?= $title ?></h2>
    <?php foreach ($posts as $post): ?>
        <div class="mb-3">
            <h4><?= $post['title'] ?></h4>
            <div class="row">
                <div class="col-md-3">
                    <img class="post-thumb"
                        src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'] ?>" alt="">
                </div>
                <div class="col-md-9">
                    <div class="ms-2">
                        <small class=""><?= $post['created_at'] ?> in <b><?= $post['category_name'] ?></b></small> <br>
                        <p style="text-align: justify;"><?= word_limiter($post['body'], 60) ?> </p> <br><br>
                        <span><a href="<?= site_url('/posts/' . $post['slug']) ?>"> Read More</a></span>
                    </div>
                </div>
            </div>
        </div>

    <?php endforeach; ?>

    <div class="pagination-link">
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>