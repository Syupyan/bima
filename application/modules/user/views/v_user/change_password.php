		<div class="limiter">
		<div class="container-login100 bg">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth/Auth/changepassword') ?>">

					<span class="login100-form-title p-b-26 text-primary">
						Halaman Ubah Password <small><?= $this->session->userdata('reset_email'); ?></small>
					</span>
					<span class="login100-form-title p-b-48">
						<img src="<?= base_url() ?>asset/img/logo/logo.png" width="100">
					</span>

					<div class="wrap-input100 validate-input" >
					<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="password1" name="password1">
						<span class="focus-input100" data-placeholder="Ganti sandi"></span>
						<?= form_error('email','<small class="text-danger">','</small>') ?>
					</div>

					<div class="wrap-input100 validate-input" >
					<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" id="password2" name="password2">
						<span class="focus-input100" data-placeholder="Ulangi"></span>
						<?= form_error('email','<small class="text-danger">','</small>') ?>
					</div>
					<?= get_csrf(); ?>
					<div class="">
						<button class="btn btn-primary col-lg" type="submit">Ubah sandi</button>
					</div>

					<div class="text-center p-t-15">
						<a class="txt2" href="<?= base_url('login') ?>">
							Kembali Ke Halaman Login
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
