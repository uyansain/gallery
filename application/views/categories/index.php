<h2><?= $title?></h2>
<table class="table table-active">
  <thead>
    <tr>
      <th scope="col"><h4 class="text-center">Төрөл</h4></th>
      <th scope="col"><h4 class="text-center">Устгах</h4></th>
      </tr>
  </thead>
  <tbody>
  	<?php foreach($categories as $category) : ?>
 <tr class="table-primary">
 	<th scope="row">
		
		<a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>
		
	</th>
	<td>
		
			<?php if($this->session->userdata('user_id') == $category['user_id']): ?>
				<form class="cat-delete" action="categories/delete/<?php echo $category['id']; ?>" method="POST">
					<input type="submit" class="btn-link text-danger" value="[устгах]">
				</form>
			<?php endif; ?>	
		
	</td>

<?php endforeach ?>

  