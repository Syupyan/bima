<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Main content -->
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
                    <a class="btn btn-primary" href="<?= base_url('admin/tambah-mahasiswa'); ?>"><i
                            class="fas fa-fw fa-plus"></i> Tambah Data</a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable"><i
                                            class="fas fa-fw fa-file-excel"></i> Import Excel
                                    </button>
                                    <?php } ?>
<?php } ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Prodi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($mahasiswa as $mhs): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['tanggal_lahir'] ?></td>
                                <td><?= $mhs['nama_prodi'] ?></td>
                                <td>

                                    <a title="Edit Mahasiswa"
                                        href="<?= base_url('admin/edit-mahasiswa/').$mhs['id_mhs'] ?>"
                                        class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    <?php
                                    $cek_mahasiswa = $this->db->select('*')
                                    ->from('tbl_anggota')
                                    ->where('tbl_anggota.nim_anggota',$mhs['nim'])
                                    ->get()->num_rows();
                                    ?>
                                                    <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
                                    <?php if($cek_mahasiswa < 1){ ?>

                                    <a title="Hapus Mahasiswa"
                                        href="<?= base_url('admin/Master_Mahasiswa/delete_mhs/').$mhs['id_mhs'] ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>

                                </td>
                            </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
        <!-- /.content -->
    </div>

</div>

<?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Import Excel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Master_Mahasiswa/import_excel') ?>" data-parsley-validate>
                    <div class="form-group">
                    <p style="color:red;">
                           *Data prodi di excel bersifat case sensitive, sehingga harus sesuai penulisan seperti tabel berikut.
                        </p>
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($prodi as $prodi): ?>
                            <tr>
                                <td><?= $prodi['nama_prodi'] ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                        <p>
                            Silahkan download template xlsx, jika ingin melakukan import data mahasiswa melalui excel.
                        </p>
                        <a href="<?= base_url('asset/file/template/').$setting['template_import_mahasiswa'] ?>"
                                        class="btn btn-info"><i
                            class="fas fa-fw fa-download"></i> Download</a>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Masukkan File Excel</label>
                        <p style="color:red;">
                            ektensi yang di dukung xlx|xlsx.
                        </p>
                        <input type="file" name="file_excel" class="form-control">
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
<?php } ?>
                                    <?php } ?>