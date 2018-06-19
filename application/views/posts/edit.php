<h2><?= $title; ?> </h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
	<input type="hidden" name="id" value="<?php echo $post['id'];?>">
  <div class="form-group">
    <label>Гарчиг</label>
    <input type="text" class="form-control" name="title" placeholder="Зургийн нэр" value="<?php echo $post['title'];?>">
  </div>
  <div class="form-group">
    <label>Тайлбар</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Зургийн тайлбар"><?php echo $post['body'];?></textarea>
  </div>
  <div>
  <label>Зургийн төрөл</label>
  	<select name="category_id" class="form-control">
  		<?php foreach ($categories as $category): ?>
  			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
  	<?php endforeach ?>
  	</select>
  	<br>
  </div>
  <div class="form-group"> 
  	<label>Зураг оруулах</label>
  	<input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Хадгалах</button>
</form>