  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="<?php echo base_url(); ?>" class="logo">
                          <h4><?= $setting['title_header'] ?></h4>
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li class="scroll-to-section"><a href="<?php echo base_url(); ?>">Home</a></li>
                          <li class="scroll-to-section"><a href="<?= base_url('panduan'); ?>" class="active">Panduan</a>
                          </li>

                          <li class="scroll-to-section">
                              <div class="main-red-button"><a href="<?= base_url('login'); ?>">Login</a></div>
                          </li>

                      </ul>
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div id="contact" class="contact-us section">
      <div class="container">
          <div class="row">
              <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
                  <div class="section-heading">
                      <h2>Panduan</h2>
                      <h2>BIMA POLITALA</h2>
                      <p><?= htmlspecialchars_decode($setting['panduan_bima']) ?></p>
                  </div>
              </div>
              <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
    <form id="contact">
        <div class="row">
            <div class="col-lg-6">
                <fieldset>
                    <p>Silahkan download file panduan dalam menggunakan aplikasi BIMA POLITALA</p><br>
                </fieldset>
            </div>
            <div class="col-lg-6 text-center">
                <fieldset>
                    <a href="<?= base_url('asset/file/template/').$setting['file_panduan'] ?>"
                        class="btn btn-primary btn-lg active download-button" style="margin-top: 20px;">Download</a>
                </fieldset>
            </div>
        </div>
    </form>
</div>


          </div>
      </div>
  </div>
  <style>
.buttonkurawa {
    text-decoration: none;
    position: fixed;
    z-index: 100;
    bottom: 20px;
    right: 20px;
    color: #fff;
    background-color: #26a69a;
    text-align: center;
    letter-spacing: .5px;
    transition: .2s ease-out;
    cursor: pointer;
    width: 250px;
    padding: 5px 3px;
    box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 1px 5px 0 rgba(0, 0, 0, 0.12), 0 3px 1px -2px rgba(0, 0, 0, 0.2);
}

.buttonkurawa a {
    color: #fff;
}
  </style>

  <div class="buttonkurawa">
      <a target="_blank"
          href="https://api.whatsapp.com/send?phone=<?= $setting['nomor_whatsapp'] ?>&text=Halo%2C%20saya%20ingin%20bertanya ?">
          Live Chat via Whatsapp <i class="fa fa-whatsapp"></i></a>
  </div>