
<?php            
                            $cek_user = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian', $idku['pengabdian_id'])
													->where('nip_nik_ketua', $user_login_data['nip_nik'])
													->get()->row_array();
                   ?>
            <?php if(isset($cek_user)){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('dosen/logbook-pengabdian/').$idku['pengabdian_id']; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Upload Dokumen</h4>
                            </div>
                            <div class="card-body">
                            <form method="POST" class="form"
                            action="<?= base_url('dosen/Pengabdian/add_foto_dokumen') ?>" enctype="multipart/form-data" data-parsley-validate>
                                    <table class='table table-bordered'>
                                    <input hidden type="text" name="id" value="<?= $pengabdian; ?>">
                                    <label style="color:red;">Harus berupa png|jpg</label>
                                        <tr>
                                            <td><label>Upload Foto</label></td>
                                            <td>
                                                    <div class="position-relative">
                                                        <input  name="dokumen_foto" type="file" class="form-control datetimepicker"
                                                            placeholder="Title Header" id="tanggal_lahir"
                                                            data-parsley-required="true">
                                                    </div>
                                            </td>
                                        </tr>


                                    </table>

                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" class="form"
                                    action="<?= base_url('dosen/Pengabdian/add_file_dokumen') ?>" enctype="multipart/form-data" data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <input hidden type="text" name="id" value="<?= $pengabdian; ?>">
                                        <label style="color:red;">Harus berupa xls|xlsx|doc|docx|pdf</label>
                                        <tr>
                                            <td><label>Upload File</label></td>
                                            <td>
                                                    <div class="position-relative">
                                                        <input  name="dokumen_file" type="file" class="form-control datetimepicker"
                                                            placeholder="Title Header" id="tanggal_lahir"
                                                            data-parsley-required="true">
                                                    </div>
                                            </td>
                                        </tr>


                                    </table>

                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Upload</button>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" class="form"
                                    action="<?= base_url('dosen/Pengabdian/add_url_dokumen') ?>"
                                    enctype="multipart/form-data" data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <input hidden type="text" name="id" value="<?= $pengabdian; ?>">
                                        <label style="color:red;">Harus berupa url</label>
                                        <tr>
                                            <td><label>Link share</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="dokumen_url" type="url"
                                                        class="form-control datetimepicker" placeholder="url"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>


                                    </table>

                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Dokumen</h4>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dokumen Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_foto as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><img src="<?= base_url('asset/file/logbook/foto/').$lf['dokumen_foto'] ?>" width="200"></td>
                                            <td><a title="Hapus Pengguna"
                                                    href="<?= base_url('dosen/Pengabdian/delete_logbook_dok_foto/').$lf['id_dok'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a></td>

                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                                <br>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>Dokumen File</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_file as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $lf['nama_file'] ?></td>
                                            <td> <a href="<?= base_url('user/User/download_file/logbook/file/').$lf['dokumen_file'] ?>"
                                        class="btn btn-danger"><i
                            class="fas fa-fw fa-download"></i> Download</a></td>
                                            <td><a title="Hapus dokumen"
                                                    href="<?= base_url('dosen/Pengabdian/delete_logbook_dok_file/').$lf['id_dok'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a></td>

                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                                <br>
                                <table class="table table-bordered" id="table3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Url</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_url as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $lf['dokumen_url'] ?></td>
                                            <td><a title="Hapus Dokumen"
                                                    href="<?= base_url('dosen/Pengabdian/delete_logbook_dok_url/').$lf['id_dok'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a></td>

                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
<?php } ?>