

<?php echo validation_errors(); ?>
<?php echo form_open('users/register'); ?>
	<div class="row justify-content-center">
		<div class="col-md-4 ">
			<h1><?= $title; ?></h1>
			<div class="form-group">
				<label>Нэр</label>
				<input type="text" class="form-control" name="firstname" placeholder="Нэр">
			</div>
			<div class="form-group">
				<label>Овог</label>
				<input type="text" class="form-control" name="lastname" placeholder="Овог">
			</div>
			<div class="form-group">
				<label>Цахим шуудан</label>
				<input type="text" class="form-control" name="email" placeholder="Email">
			</div>
			<div class="form-group">
				<label>Хэрэглэгчийн нэр</label>
				<input type="text" class="form-control" name="username" placeholder="Хэрэглэгчийн нэр">
			</div>
			<div class="form-group">
				<label>Нууц үг</label>
				<input type="text" class="form-control" name="password" placeholder="Нууц үг">
			</div>
			<div class="form-group">
				<label>Нууц үг давтан хийх</label>
				<input type="text" class="form-control" name="password2" placeholder="Confirm password">
			</div>
			<button type="submit" class="btn btn-primary btn-block">Бүртгүүлэх</button>
		</div>
	</div>

<?php echo form_close(); ?>