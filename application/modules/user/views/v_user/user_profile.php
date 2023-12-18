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
                                <br>
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
                    <?php
                                    		$user	= $this->db->select('*')
                                            ->from('tbl_reviewer')
                                            ->join('tbl_role', 'tbl_reviewer.role_id = tbl_role.id_role')
                                            ->where('tbl_reviewer.nip_nik', $user_login_data['nip_nik'])
                                            ->get()->row();
                                            
                                    ?>
                                <?php if(isset($user->nip_nik)){ ?>
                                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label for="Nidn">NIP/NIK</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input value="<?= $user_login_data['nip_nik'] ?>" readonly
                                                            type="text" class="form-control">
                                                        <div class="form-control-icon">
                                                            <i class="fa fa-id-card"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="Nidn">NIDN</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input readonly value="<?= $user_login_data['nidn'] ?>"
                                                            type="text" class="form-control">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="Nidn">Email</label></td>
                                            <td>
                                                <div class="form-group">
                                                    <?php if ($user_login_data['email'] == 'default@email.com') { ?>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="Belum Aktif"
                                                            name="email" disabled>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalScrollable">
                                                                <i class="fas fa-fw fa-check"></i> <span
                                                                    style="margin-left: 5px;">Aktivasi</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="input-group">
                                                        <input value="<?= $user_login_data['email'] ?>" readonly
                                                            type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalScrollable1">
                                                                <i class="fas fa-fw fa-envelope"></i> <span
                                                                    style="margin-left: 5px;">Ubah Email</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>

                                </div>
                                </table>

                                <br>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a class="btn btn-primary" href="<?= base_url('user/edit-profile') ?>"><i
                                                class="fas fa-fw fa-edit"></i> Edit Akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
                                    <?php }else{ ?>
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <table class='table table-bordered'>
                                        <tr>
                                            <td><label for="Nidn">NIP/NIK</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input value="<?= $user_login_data['nip_nik'] ?>" readonly
                                                            type="text" class="form-control">
                                                        <div class="form-control-icon">
                                                            <i class="fa fa-id-card"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php if($user_login_data['nidn_nidk'] != 0){ ?>
                                        <tr>
                                            <td><label for="Nidn">NIDN/NIDK</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input readonly value="<?= $user_login_data['nidn_nidk'] ?>"
                                                            type="text" class="form-control">
                                                        <div class="form-control-icon">
                                                            <i class="bi bi-person"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <tr>
                                            <td><label for="Nidn">Email</label></td>
                                            <td>
                                                <div class="form-group">
                                                    <?php if ($user_login_data['email'] == 'default@email.com') { ?>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="Belum Aktif"
                                                            name="email" disabled>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-warning"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalScrollable">
                                                                <i class="fas fa-fw fa-check"></i> <span
                                                                    style="margin-left: 5px;">Aktivasi</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="input-group">
                                                        <input value="<?= $user_login_data['email'] ?>" readonly
                                                            type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModalScrollable1">
                                                                <i class="fas fa-fw fa-envelope"></i> <span
                                                                    style="margin-left: 5px;">Ubah Email</span>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="Password">Jenis Kelamin</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <input value="<?= $user_login_data['jk'] ?>" readonly
                                                            type="text" class="form-control">
                                                        <div class="form-control-icon">
                                                            <i class=" fas fa-male"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label for="Password">Alamat</label></td>
                                            <td>
                                                <div class="form-group has-icon-left">
                                                    <div class="position-relative">
                                                        <textarea class="form-control"
                                                            readonly><?= $user_login_data['alamat'] ?></textarea>
                                                        <div class="form-control-icon">
                                                            <i class=" fas fa-address-book"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                </div>
                                </table>

                                <br>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a class="btn btn-primary" href="<?= base_url('user/edit-profile') ?>"><i
                                                class="fas fa-fw fa-edit"></i> Edit Akun</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.container-fluid -->
                    <?php } ?>
        </section>
    </div>

</div>

<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Aktivasi Email</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" action="<?= base_url('user/User/aktivasi_email') ?>"
                    data-parsley-validate>
                    <small class="text-muted">*Aktivasi wajib jika ingin melakukan pengajuan penelitian dan
                        pengabdian.</small>

                    <div class="form-group">
                        <label>Masukkan Email</label>
                        <input hidden type="text" name="nip_nik" value="<?= $user_login_data['nip_nik'] ?>"
                            class="form-control">
                        <input type="text" name="email" class="form-control">
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable1" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle1">Ubah Email</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" action="<?= base_url('user/User/ubah_email') ?>"
                    data-parsley-validate>
                    <div class="form-group">
                        <label>Masukkan Email</label>
                        <input type="text" hidden name="nip_nik" value="<?= $user_login_data['nip_nik'] ?>"
                            class="form-control">
                        <input type="text" name="email" class="form-control">
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>