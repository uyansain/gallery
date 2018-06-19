<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Post on: <?php echo $post['created_at']; ?></small><br>

<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];?>" width="50%" height="50%">
	<div class="post-body">
	<?php echo $post['body']; ?>
	</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<a class="btn btn-primary pull-left" role="button" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Засах</a>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
	<input type="submit" value="Устгах" class="btn btn-danger">
</form>
<?php endif; ?>

<hr>

<h3>Сэтгэгдэл</h3>
<?php if($comments) : ?>
	<?php foreach($comments as $comment) : ?>
	<div class="alert alert-dismissible alert-primary">
		<h6><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong>]</h6>
	</div>
	<?php endforeach; ?>
	<?php else : ?>
		<p>Үлдээсэн сэтгэгдэл байхгүй.</p>
	<?php endif; ?>


<h3>Сэтгэгдэл үлдээх</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
	<div class="form-group">
		<label>Нэр</label>
		<input type="text" name="name" class="form-control">
	</div>
	<div class="form-group">
		<label>Цахим шуудангийн хаяг</label>
		<input type="text" name="email" class="form-control">
	</div>
	<div class="form-group">
		<label>Сэтгэгдэл бичих</label>
		<textarea name="body" class="form-control"></textarea>
	</div>
	<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
	<button class="btn btn-primary" type="submit">Илгээх</button>
</form>
