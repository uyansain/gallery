<h2><?= $title?></h2>
<?php foreach ($posts as $post) : ?>
	<h3><?php echo $post['title']; ?></h3>
	<div class="row">
		<div class="col-md-4">
			<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image'];?>" width="100%" height="100%">
		</div>
		<div class="col-md-8">
			<small class="post-date">Post on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
			<?php echo word_limiter($post['body'], 60); ?><br><br>
			<p><a class="btn btn-primary" href="<?php echo site_url('/posts/'.$post['slug']); ?>">Дэлгэрэнгүй</a></p>
		</div>
	</div>

<?php endforeach; ?>
<div class="pagination-links">
<?php echo $this->pagination->create_links(); ?>
</div>