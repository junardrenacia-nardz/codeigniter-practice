<h2><?= $title ?></h2>

<ul class="nav">
    <?php foreach ($categories as $category): ?>

        <a class="form-control mb-2" style="text-decoration: none;"
            href="<?php echo site_url('/categories/' . $category['name']) ?>">
            <li class=""><?php echo $category['name'] ?> </li>
        </a>
    <?php endforeach; ?>
</ul>