<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/update'); ?>
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
                <?= ($category['id_category'] == $post['category_id']) ? 'selected' : '' ?>> <?php echo $category['name'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>
<button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>