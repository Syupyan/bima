<?php foreach($penelitianku as $penelitianku){ ?>
<?php if($penelitianku['status_aktif'] == 'Draft'){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                    <a class="btn btn-danger" href="<?= base_url('dosen/tambah-penelitian/1'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                                    </div>
                                    <div class="col-auto">
                                        <span data-bs-toggle="modal" data-bs-target="#inputModal1">
                                            <i class="zmdi zmdi-help-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Penelitian/add_penelitian_2') ?>" method="post"
                        class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon active"><i class="fa fa-user"></i></div>
                                <p>Identitas Usulan Penelitian</p>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa fa-user-group"></i></div>
                                <p>Identitas Ketua dan Anggota</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Subtansi Usulan</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>

                        <fieldset>
                        <label for="">1.3 Identitas ketua dan Anggota </label>
                            <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>" name="id_penelitian"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Nama Ketua</label>

                                <input readonly type="text" value="<?= $penelitianku['nama'] ?>" placeholder=""
                                    class="f1-first-name form-control" id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>Uraian Tugas</label><br>
                                <h10 style="color:red;">*Diisi setelah menambahkan anggota</h10>
                                <?php if(empty($penelitianku['tugas_ketua'])){ ?>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="tugas_ketua" data-parsley-required="true"></textarea>
                                <?php }else{ ?>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="tugas_ketua"
                                    data-parsley-required="true"><?= $penelitianku['tugas_ketua'] ?></textarea>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <hr>
                                <label>Anggota Dosen</label>
                                <div class="card-header">
                                    <?php if($cek_anggota_dosen == $anggota_penelitian['maksimal_anggota_dosen_penelitian']){ ?>
                                    <?php }else{ ?>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm"><i class="fas fa-fw fa-plus"></i> Tambah Anggota
                                    </button>
                                    <?php } ?>
                                </div>
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                            <th>Nama</th>
                                            <th>NIP/NIK</th>
                                            <th>NIDN/NIDK</th>
                                            <th>Tugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($anggota_dosen as $user): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><img src="<?= base_url('asset/img/profile/').$user['foto_profil'] ?>"
                                                    width="40"></td>
                                            <td><?= $user['nama'] ?></td>
                                            <td><?= $user['nip_nik'] ?></td>
                                            <td><?= $user['nidn_nidk'] ?></td>
                                            <td><?= $user['tugas'] ?></td>
                                            <td>

                                                <a title="Hapus Pengguna"
                                                    href="<?= base_url('dosen/Penelitian/delete_anggota_dosen/').$user['nip_nik'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label>Anggota Mahasiswa</label>
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm1"><i class="fas fa-fw fa-plus"></i> Tambah Anggota
                                    </button>
                                </div>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Prodi</th>
                                            <th>Tugas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($anggota_mhs as $puser): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $puser['nama'] ?></td>
                                            <td><?= $puser['nim'] ?></td>
                                            <td><?= $puser['nama_prodi'] ?></td>
                                            <td><?= $puser['tugas'] ?></td>
                                            <td>

                                                <a title="Hapus Pengguna"
                                                    href="<?= base_url('dosen/Penelitian/delete_anggota_mhs/').$puser['nim_anggota'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="f1-buttons">
                            <?php if($cek_anggota_dosenku >= 1){ ?>
<?php if($cek_anggota_mahasiswa >= 1){ ?>
                                <button type="submit" class="btn btn-submit">Selanjutnya</button>
                                <?php } ?> 
                        <?php } ?> 
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>
<!--  -->

<?php } ?>
<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Dosen </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('dosen/Penelitian/add_anggota_dosen') ?>" method="post" data-parsley-validate>
                <div class="modal-body">
                    <label>Data: </label>
                    <div class="form-group">
                        <select class="choices form-select" id="data-select" onchange="getDataDosen()"
                            data-parsley-required="true">
                            <option selected></option>
                            <?php foreach($anggota_dosenku as $ad){ ?>
                            <option value="<?= $ad['nip_nik'] ?>"><?= $ad['nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>" name="id_penelitian"
                        class="form-control">
                    <label>Nama: </label>
                    <div class="form-group">
                        <input readonly type="text" id="data-nama" placeholder="Nama" class="form-control">
                    </div>
                    <label>NIP/NIK: </label>
                    <div class="form-group">
                        <input readonly type="text" id="data-nip-nik" placeholder="NIP/NIK" name="nip_nik"
                            class="form-control">
                    </div>
                    <label>NIDN/NIDK: </label>
                    <div class="form-group">
                        <input readonly type="text" id="data-nidn-nidk" placeholder="NIDN/NIDK" class="form-control">
                    </div>
                    <label>Tugas Anggota: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="tugas" rows="3" data-parsley-required="true"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  -->
<!--login form Modal -->
<div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Mahasiswa </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('dosen/Penelitian/add_anggota_mhs') ?>" method="post" data-parsley-validate>
                <div class="modal-body">
                    <label>Data: </label>
                    <div class="form-group">
                        <select class="choices form-select" id="data-select1" onchange="getDataMhs()"
                            data-parsley-required="true">
                            <option selected></option>
                            <?php foreach($anggota_mahasiswa as $ad){ ?>
                            <option value="<?= $ad['id_mhs'] ?>"><?= $ad['nama'] ?> (<?= $ad['nim'] ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <input hidden type="text" value="<?= $penelitianku['id_penelitian'] ?>" name="id_penelitian"
                        class="form-control">

                    <label>Nama: </label>
                    <div class="form-group">
                        <input readonly type="text" id="data-nama1" name="nama" placeholder="Nama" class="form-control">
                    </div>
                    <label>NIM: </label>
                    <div class="form-group">
                        <input readonly type="text" id="data-nim1" name="nim" placeholder="NIM" class="form-control">
                    </div>
                    <label>Tugas Anggota: </label>
                    <div class="form-group">
                        <textarea class="form-control" name="tugas" rows="3" data-parsley-required="true"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--  -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- script untuk mengambil data dari server menggunakan AJAX -->
<script>
function getDataDosen() {
    var option = document.getElementById('data-select').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('data-nama').value = data.nama;
            document.getElementById('data-nip-nik').value = data.nip_nik;
            document.getElementById('data-nidn-nidk').value = data.nidn_nidk;
        }
    };
    xhttp.open('POST', '<?php echo base_url('dosen/Penelitian/getDataDosen') ?>', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('option=' + option);
}

function getDataMhs() {
    var option = document.getElementById('data-select1').value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            document.getElementById('data-nama1').value = data.nama;
            document.getElementById('data-nim1').value = data.nim;
        }
    };
    xhttp.open('POST', '<?php echo base_url('dosen/Penelitian/getDataMhs') ?>', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('option=' + option);
}
</script>

<!-- Modal -->
<div class="modal fade" id="inputModal1" tabindex="-1" role="dialog" aria-labelledby="inputModal1Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModal1Label">Penjelasan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                </div>
                <p class="explanation-text">Dosen dan Mahasiswa minimal ada 1 !.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>