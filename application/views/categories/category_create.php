<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<form action="<?= base_url('categories/create') ?>" method="post">
    <div class="mb-3">
        <label for="category" class="form-label">Title</label>
        <input type="text" class="form-control" name="category" id="category" placeholder="Enter a Category">
    </div>
    <button type="submit" class="btn btn-primary mt-4">Submit</button>

</form>