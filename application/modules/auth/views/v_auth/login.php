<div class="limiter">
  <div class="container-login100 bg">
    <div class="wrap-login100">
      <form class="login100-form validate-form" method="post" action="<?= base_url('login') ?>">
        <span class="login100-form-title f text-primary">
          <?= $setting['title_login'] ?>
        </span><br>
        <span class="login100-form-title p-b-48">
          <img src="<?= base_url() ?>asset/img/logo/logo.png" width="75" class="small-image">
        </span>

        <div class="wrap-input100 validate-input" data-validate="Email valid : a@b.c">
          <input class="input100 small-input" type="text" name="data" placeholder="User">
          <span class="focus-input100"></span>
          <span class="input-question-mark" data-toggle="modal" data-target="#inputModal1">
            <i class="zmdi zmdi-help-outline"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Masukan password">
          <span class="btn-show-pass">
            <i class="zmdi zmdi-eye"></i>
          </span>
          <input class="input100 small-input" type="password" name="password" placeholder="Password">
          <span class="focus-input100"></span>
          <?= form_error('password','<small class="text-danger">','</small>') ?>
        </div>
        <div class="login100-form-title p-b-48" data-validate="Email valid : a@b.c">
          <?php echo $widget;?>
          <?php echo $script;?>
          <?= form_error('g-recaptcha-response','<small class="text-danger">','</small>') ?>
        </div>
        <?= get_csrf(); ?>
        <div class="">
          <button class="btn btn-primary col-lg" type="submit">LOGIN</button>
        </div>

        <div class="text-center p-t-15">
          <br>
          <a class="txt2" href="<?= base_url('forgot-password') ?>">
            Lupa Password ?
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="inputModal1" tabindex="-1" role="dialog" aria-labelledby="inputModal1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inputModal1Label">Penjelasan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
        </div>
        <p class="explanation-text">Jika akun belum diaktivasi, Anda dapat menggunakan NIP atau NIK untuk melakukan login. Setelah akun diaktivasi, Anda dapat juga menggunakan NIDN atau email sebagai input untuk login.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>

<style>
  .explanation-image {
  width: 200px;
  margin-bottom: 20px;
}

.explanation-text {
  text-align: center;
  font-size: 16px;
  color: #333;
  margin-bottom: 0;
}
  .small-input {
    font-size: 14px;
    height: 40px;
  }

  .small-image {
    width: 75px;
  }

  .input-question-mark {
    position: absolute;
    right: 10px;
    top: 10px;
    cursor: pointer;
  }
</style>
