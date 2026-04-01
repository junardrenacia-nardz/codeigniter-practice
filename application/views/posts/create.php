<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('posts/create') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter your Title">
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea class="form-control" name="body" id="body"> </textarea>
    </div>
    <div class="form-group">
        <label for="" class="form-label">Category</label>
        <select name="category" id="" class="form-control">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['id'] ?>"> <?php echo $category['name'] ?> </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="">Upload Image</label>
        <input type="file" name="userfile" id="userfile" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>