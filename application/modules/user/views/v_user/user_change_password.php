

<div class="content-wrapper container">

<div class="page-heading">
    <h3><?= $title ?></h3>
</div>
<div class="page-content">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?= base_url('asset/img/profile/').$user_login_data['foto_profil'] ?>"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-nama text-center"><?= $user_login_data['nama'] ?></h3>

                            <!-- <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b> <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b> <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b> <a class="float-right">13,287</a>
              </li>
            </ul> -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <table class='table table-bordered'>
                                <form method="post" action="<?= base_url('user/User/change_password') ?>">
                <div class="form-group">
                  <input type="hidden" class="form-control" readonly="" value="<?= $user_login_data['nip_nik'] ?>" name="nip_nik">
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" readonly="" value="<?= $user_login_data['email'] ?>" name="email">
                </div>
                <div class="form-group">
                  <input required="" type="hidden" class="form-control" value="<?= $user_login_data['password'] ?>" name="old_password">
                </div>
                <div class="form-group">
                  <input required="" type="" class="form-control" placeholder="Password anda" value="" name="your_password">
                </div>
                <div class="form-group">
                  <input required="" type="" class="form-control" placeholder="Password baru" value="" name="new_password">
                  <?= form_error('new_password','<small class="text-danger">','</small>') ?>
                </div>
                <?= get_csrf(); ?>
                            </table>

                            <br>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">KONFIRMASI</button>
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- /.container-fluid -->
    </section>
</div>

</div>