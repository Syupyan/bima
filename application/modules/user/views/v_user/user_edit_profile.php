<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('user'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
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
                                <?php
                                    		$user	= $this->db->select('*')
                                            ->from('tbl_reviewer')
                                            ->join('tbl_role', 'tbl_reviewer.role_id = tbl_role.id_role')
                                            ->where('tbl_reviewer.nip_nik', $user_login_data['nip_nik'])
                                            ->get()->row();
                                            
                                    ?>
                                <?php if(isset($user->nip_nik)){ ?>
                                <div class="row">
                                    <table class='table table-bordered'>
                                        <form method="post" enctype="multipart/form-data"
                                            action="<?= base_url('user/User/edit_profile_luar') ?>">
                                            <input hidden class="form-control"
                                                value="<?= $user_login_data['nip_nik'] ?>" name="nip_nik_2"></input>
                                            <div class="form-group">
                                                <label for="">NIP/NIK</label>
                                                <small class="text-muted">( jika nip dan nik dirubah maka akan terlogout
                                                    otomatis )</small>
                                                <input class="form-control" value="<?= $user_login_data['nip_nik'] ?>"
                                                    name="nip_nik_1"></input>
                                            </div>

                                            <div class="form-group">
                                                <label for="">NIDN/NIDK</label>
                                                <input class="form-control" value="<?= $user_login_data['nidn'] ?>"
                                                    name="nidn_nidk"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input required="" type="" class="form-control"
                                                    value="<?= $user_login_data['nama'] ?>" name="nama"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto Profil</label>
                                                <input type="hidden" class="form-control"
                                                    value="<?= $user_login_data['foto_profil'] ?>"
                                                    name="old_img"></input>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file" class="form-control" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                                <small class="text-muted">masukan gambar jika akan merubah foto
                                                    profil</small>
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
                                <?php }elseif($user_login_data['role_id'] == 1){ ?>
                                <div class="row">
                                    <table class='table table-bordered'>
                                        <form method="post" enctype="multipart/form-data"
                                            action="<?= base_url('user/User/edit_profile') ?>">
                                            <input hidden class="form-control"
                                                value="<?= $user_login_data['nip_nik'] ?>" name="nip_nik_2"></input>
                                            <div class="form-group">
                                                <label for="">NIP/NIK</label>
                                                <small class="text-muted">( jika nip dan nik dirubah maka akan terlogout
                                                    otomatis )</small>
                                                <input class="form-control" value="<?= $user_login_data['nip_nik'] ?>"
                                                    name="nip_nik_1"></input>
                                            </div>

                                            <div class="form-group">
                                                <label for="">NIDN/NIDK</label>
                                                <input class="form-control" value="<?= $user_login_data['nidn_nidk'] ?>"
                                                    name="nidn_nidk"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Nama</label>
                                                <input required="" type="" class="form-control"
                                                    value="<?= $user_login_data['nama'] ?>" name="nama"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="nip_nik">Jenis Kelamin</label>
                                                <select value="<?= $user_login_data['jk'] ?>" name="jk"
                                                    class="form-control">
                                                    <option value="Laki-laki">Laki-laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Alamat</label>
                                                <textarea required="" type="text" class="form-control"
                                                    name="alamat"><?= $user_login_data['alamat'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Foto Profil</label>
                                                <input type="hidden" class="form-control"
                                                    value="<?= $user_login_data['foto_profil'] ?>"
                                                    name="old_img"></input>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="file" class="form-control" id="customFile">
                                                <label class="custom-file-label" for="customFile"></label>
                                                <small class="text-muted">masukan gambar jika akan merubah foto
                                                    profil</small>
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
                            <?php }else{ ?>
                            <div class="row">
                                <table class='table table-bordered'>
                                    <form method="post" enctype="multipart/form-data"
                                        action="<?= base_url('user/User/edit_profile') ?>">
                                        <input hidden class="form-control" value="<?= $user_login_data['nip_nik'] ?>"
                                            name="nip_nik_2"></input>
                                        <div class="form-group">
                                            <label for="">NIP/NIK</label>
                                            <small class="text-muted">( jika nip dan nik dirubah maka akan terlogout
                                                otomatis )</small>
                                            <input class="form-control" value="<?= $user_login_data['nip_nik'] ?>"
                                                name="nip_nik_1"></input>

                                        </div>
                                        <?php if($user_login_data['nidn_nidk'] == 0){ ?>
                                        <input hidden class="form-control" value="<?= $user_login_data['nidn_nidk'] ?>"
                                            name="nidn_nidk"></input>
                                        <?php }else{ ?>
                                        <div class="form-group">
                                            <label for="">NIDN/NIDK</label>
                                            <input class="form-control" value="<?= $user_login_data['nidn_nidk'] ?>"
                                                name="nidn_nidk"></input>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input required="" type="" class="form-control"
                                                value="<?= $user_login_data['nama'] ?>" name="nama"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip_nik">Jenis Kelamin</label>
                                            <select value="<?= $user_login_data['jk'] ?>" name="jk"
                                                class="form-control">
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea required="" type="text" class="form-control"
                                                name="alamat"><?= $user_login_data['alamat'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Foto Profil</label>
                                            <input type="hidden" class="form-control"
                                                value="<?= $user_login_data['foto_profil'] ?>" name="old_img"></input>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" name="file" class="form-control" id="customFile">
                                            <label class="custom-file-label" for="customFile"></label>
                                            <small class="text-muted">masukan gambar jika akan merubah foto
                                                profil</small>
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
                        <?php } ?>
                    </div><!-- /.container-fluid -->
        </section>
    </div>

</div>