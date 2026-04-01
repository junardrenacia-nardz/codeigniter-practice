<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('posts/update') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $post['post_id'] ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="<?php echo $post['title'] ?>" id="title"
            placeholder="Enter your Title">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="body"><?php echo $post['body'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="" class="form-label">Category</label>
        <select name="category" id="" class="form-control">
            <?php foreach ($categories as $category): ?>
            <option value="<?php echo $category['id'] ?>"
                <?= ($category['id'] == $post['category_id']) ? 'selected' : '' ?>> <?php echo $category['name'] ?>
            </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Upload Image</label>
        <input type="file" name="userfile" id="userfile" class="form-control">
        <div class="mt-3">
            <input type="hidden" name="currentImage" id="" value="<?php echo $post['post_image'] ?>"
                class="border-0 w-75" readonly>
            Current Image: <input type="text" name="imageOrig" id="" value="<?php echo $post['image_orig_name'] ?>"
                class="border-0 w-75" readonly>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>