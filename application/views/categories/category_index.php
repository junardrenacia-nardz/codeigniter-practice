<h2><?= $title ?></h2>

<ul class="nav">
    <?php foreach ($categories as $category): ?>

        <a class="form-control mb-2 <?= ($category['has_user_post']) ? "bg-primary" : ''; ?>"
            style="text-decoration: none; "
            href="<?php echo site_url('/categories/' . $category['category_id']  . '/' . $category['name'])  ?>">
            <li class="d-flex justify-content-between align-items-center"><?php echo $category['name'] ?>
                <form
                    action="<?= base_url('categories/delete/' . $category['category_id'] . '/' . $category['post_image']) ?>"
                    method="POST">
                    <?php if ($category['has_user_post']): ?>
                        <button type="submit" class="btn btn-sm btn-danger"><i
                                class="fa-solid fa-trash text-light py-1"></i></button>
                    <?php endif; ?>
                </form>

            </li>
        </a>
    <?php endforeach; ?>
</ul>