<h2><?= $post['title'] ?></h2>
<small class="p-auto">Posted On: <?= $post['created_at'] ?> in <b><?= $post['category_name'] ?></b></small><br>
<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'] ?>" alt="">
<p style="text-align: justify;"><?= $post['body'] ?></p>

<hr>

<?php echo form_open('/posts/delete/' . $post['post_id']); // form 
?>
<a class="btn btn-default pull-left" href="<?= base_url(); ?>posts/edit/<?= $post['slug'] ?>">Edit</a>
<input type="submit" value="Delete" class="btn btn-danger">
</form>