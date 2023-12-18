<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('admin/master-pengguna'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form method="POST" class="form" action="<?= base_url('admin/Master_Pengguna/update_user') ?>"
                        data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <input hidden value="<?= $pengguna['nip_nik'] ?>" name="id"
                                    class="form-control"></input>
                                <input hidden value="<?= $pengguna['password'] ?>" name="oldpassword"
                                    class="form-control"></input>
                                <tr>
                                    <td><label for="Nidn">NIP/NIK</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input value="<?= $pengguna['nip_nik']; ?>" name="nip_nik" type="number"
                                                class="form-control" placeholder="NIP/NIK" id="Nidn"
                                                data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Nidn">NIDN/NIDK</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input value="<?= $pengguna['nidn_nidk']; ?>" name="nidn_nidk" type="number"
                                                class="form-control" placeholder="NIDN/NIDK" id="Nidn"
                                                data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Nama</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input value="<?= $pengguna['nama']; ?>" name="nama" type="text"
                                                class="form-control" placeholder="Nama" id="nama"
                                                data-parsley-required="true">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="Password">Password</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="newpassword" type="password" class="form-control"
                                                placeholder="Password" id="Password">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width=190 class="text-bold">Role Akun</td>
                                    <td>
                                        <div class="input-group">
                                            <select name="role_id" class="form-select" id="inputGroupSelect02"
                                                data-parsley-required="true">
                                                <?php foreach ($get_role as $role): ?>
                                                <option value="<?= $role['id_role'] ?>" <?php echo $role['id_role'] == $pengguna['role_id'] ? 'selected' : ''; ?>><?= $role['nama_role'] ?>
                                                </option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width=190 class="text-bold">Prodi</td>
                                    <td>
                                        <div class="input-group">
                                            <select name="prodi_id" class="form-select" id="inputGroupSelect02"
                                                data-parsley-required="true">
                                                <?php foreach ($prodi as $pr): ?>
                                                <option value="<?= $pr['id_prodi'] ?>" <?php echo $pr['id_prodi'] == $pengguna['prodi_id'] ? 'selected' : ''; ?>><?= $pr['nama_prodi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                        </div>
                                    </td>
                                </tr>
                        </div>
                        </table>

                        <br>
                        <?= get_csrf() ?>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
        <!-- /.content -->
    </div>

</div>