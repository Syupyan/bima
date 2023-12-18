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
                                    <a class="btn btn-danger" href="<?= base_url('dosen/pengabdian'); ?>"><i
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
                    <form role="form" class="f1" data-parsley-validate>

                        <fieldset>
                            <?php foreach($pengabdianku as $pengabdianku){ ?>
                            <input hidden type="text" value="<?= $user_login_data['nip_nik'] ?>" name="inip_nik"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <input hidden type="text" value="<?= $pengabdianku['nip_nik_ketua'] ?>" name="nik_nip_ketua"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" readonly value="<?= $pengabdianku['judul'] ?>" name="judul"
                                    placeholder="Judul Pengabdian" class="f1-first-name form-control"
                                    id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>TKT Saat Ini</label>
                                <input type="text" readonly value="<?= $pengabdianku['tkt_awal'] ?>" name="tkt_awal"
                                    placeholder="TKT Saat Ini" class="f1-last-name form-control" id="f1-last-name">
                            </div>
                            <div class="form-group">
                                <label>Target Akhir TKT</label>
                                <input type="text" readonly value="<?= $pengabdianku['tkt_akhir'] ?>" name="tkt_akhir"
                                    placeholder="Target Akhir TKT" class="f1-last-name form-control" id="f1-last-name">
                            </div>
                            <div class="form-group">
                                <label>Tema Pengabdian</label>
                                <input type="text" readonly value="<?= $pengabdianku['tema_pengabdian'] ?>" name="tkt_akhir"
                                    placeholder="Target Akhir TKT" class="f1-last-name form-control" id="f1-last-name">
                            </div>
                            <hr>
                            <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama Luaran Wajib</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($luaran_usulan as $lu): ?>
                                        <tr>
                                            <td><?= $lu['nama_luaran_wajib'] ?></td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>Nama Luaran Tambahan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($luaran_usulan_tidak_wajib as $lu): ?>
                                        <tr>
                                            <td><?= $lu['nama_luaran_tambahan'] ?></td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            <div class="form-group">
                                <label>Nama Ketua</label>

                                <input readonly type="text" value="<?= $pengabdianku['nama'] ?>" placeholder=""
                                    class="f1-first-name form-control" id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>Uraian Tugas</label><br>

                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="tugas_ketua"
                                    data-parsley-required="true"><?= $pengabdianku['tugas_ketua'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <hr>
                                <label>Anggota Dosen</label>
                                <div class="card-header">
                                <?php if($cek_anggota_dosen == $anggota_pengabdian['maksimal_anggota_dosen_pengabdian']){ ?>
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
                                            <th>NIDN/NIPK</th>
                                            <th>Tugas</th>
                                            <th>Status Anggota</th>
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
                                            <td><?= $user['status_anggota'] ?></td>
                                            <td>
                                            <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>  
                <?php if($user['status_anggota'] != "Disetujui"){ ?>  
                                                <a title="Hapus Pengguna"
                                                    href="<?= base_url('dosen/Pengabdian/delete_anggota_dosen/').$user['nip_nik'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                                        <?php } ?>
                                                        <?php } ?>
                        <?php } ?>
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

                                        <?php $no=1; foreach ($anggota_mhs as $user): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $user['nama'] ?></td>
                                            <td><?= $user['nim'] ?></td>
                                            <td><?= $user['nama_prodi'] ?></td>
                                            <td><?= $user['tugas'] ?></td>
                                            <td>
                                            <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>  
                <?php if($user['status_anggota'] != "Disetujui"){ ?>  
                                                <a title="Hapus Pengguna"
                                                    href="<?= base_url('dosen/Pengabdian/delete_anggota_mhs/').$user['nim_anggota'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a>
                                                        <?php } ?>
                                                        <?php } ?>
                        <?php } ?>
                                            </td>
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label>File Subtansi Usulan</label>
                                <div class="position-relative">
                                                   <a target="_blank" href="<?= base_url('user/User/download_file/pdf_proyek/').$pengabdianku['subtansi_usulan'] ?>" class="btn btn-info">Download</a> 
                                                    </div>
                            </div>

                            <div class="f1-buttons">
                            <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>                              
<?php if($cek_anggota_dosen >= 1){ ?>
<?php if($cek_anggota_mahasiswa >= 1){ ?>
<?php if($pengabdianku['status_pengabdian'] == 1){ ?>
<?php }else{ ?>
                            <a title="Kirim Ke kepala p3m"
                                    href="<?= base_url('dosen/Pengabdian/kirim_admin_p3m/').$pengabdianku['id_pengabdian'] ?>"
                                    class="btn btn-warning" onclick="return confirm('Yakin ?')"><i
                        class="fas fa-fw fa-plus"></i> Kirim Ke Kepala P3M</a>
                        <?php } ?>   
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                            </div>
                        </fieldset>
                        <?php } ?>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>


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
            <form action="<?= base_url('dosen/Pengabdian/add_anggota_dosen_detail') ?>" method="post" data-parsley-validate>
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
                    <input hidden type="text" value="<?= $pengabdianku['id_pengabdian'] ?>" name="id_pengabdian"
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
            <form action="<?= base_url('dosen/Pengabdian/add_anggota_mhs_detail') ?>" method="post" data-parsley-validate>
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
                    <input hidden type="text" value="<?= $pengabdianku['id_pengabdian'] ?>" name="id_pengabdian"
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
    xhttp.open('POST', '<?php echo base_url('dosen/Pengabdian/getDataDosen') ?>', true);
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
    xhttp.open('POST', '<?php echo base_url('dosen/Pengabdian/getDataMhs') ?>', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhttp.send('option=' + option);
}
</script>
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
                <p class="explanation-text">Minimal ada 1 dosen menyetujui dan 1 mahasiswa di dalam penelitian !.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>