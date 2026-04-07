<h2><?= $post['title'] ?></h2>
<small class="p-auto">Posted On: <?= $post['created_at'] ?> in <b><?= $post['category_name'] ?></b></small><br>
<div class="row mb-2">
    <div class="col-md-4">
        <img class=" w-100" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'] ?>" alt="">
    </div>
    <div class="col-md-6">
        <p style="text-align: justify;"><?= $post['body'] ?></p>
    </div>
</div>

<hr>

<?php echo form_open('/posts/delete/' . $post['post_id'] . '/' . $post['post_image']); // form 
?>
<a class="btn btn-default pull-left" href="<?= base_url(); ?>posts/edit/<?= $post['slug'] ?>">Edit</a>
<input type="submit" value="Delete" class="btn btn-danger">
</form>

<hr>
<h3>Comments</h3>

<?php if ($comments): ?>
    <?php foreach ($comments as $comment): ?>
        <div class="m-2 p-3 bg-light rounded">
            <?= $comment['body'] ?> [by <strong><?= $comment['name'] ?></strong>]
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <div class="m-2 p-3 bg-light rounded">
        <h5>No Comments Found</h5>
    </div>
<?php endif; ?>

<h3 class="mt-3">Add Comments</h3>

<?php echo validation_errors() ?>

<form action="<?= base_url('comments/create/') . $post['post_id'] ?>" method="post">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Body</label>
        <textarea name="body" id="body" class="form-control"> </textarea>
    </div>
    <input type="hidden" name="slug" value="<?= $post['slug'] ?>">
    <button type="submit" class="btn btn-success form-control mt-3">Submit</button>
</form>