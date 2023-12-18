<?php foreach($pengabdianku as $pengabdianku){ ?>
<?php if($pengabdianku['status_aktif'] == 'Draft'){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dosen/tambah-pengabdian/3/').$pengabdianku['id_pengabdian']; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Pengabdian/add_pengabdian_4') ?>" method="post"
                        class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon active"><i class="fa fa-user"></i></div>
                                <p>Identitas Usulan Pengabdian</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-user-group"></i></div>
                                <p>Identitas Ketua dan Anggota</p>
                            </div>
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-file"></i></div>
                                <p>Subtansi Usulan</p>
                            </div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>

                        <fieldset>
                            <input hidden type="text" value="<?= $pengabdianku['id_pengabdian'] ?>" name="id_pengabdian"
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
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Profil</th>
                                            <th>Nama</th>
                                            <th>NIP/NIK</th>
                                            <th>NIDN/NIPK</th>
                                            <th>Tugas</th>
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
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label>Anggota Mahasiswa</label>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nim</th>
                                            <th>Prodi</th>
                                            <th>Tugas</th>
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
                            <div class="form-group">
                                <p>Harap data penelitian sudah sesuai, karena data akan disimpan secara permanen !</p>
                                <h10 style="color:red;">Dengan Data yang ada pada draft, apakah anda menyetujui agar
                                    data tersebut diaktifkan secara permanen ?</h10>
                            </div>

                            <div class="f1-buttons">
                                <a title="Hapus Draft"
                                    href="<?= base_url('dosen/Pengabdian/delete_draft/').$pengabdianku['id_pengabdian'] ?>"
                                    class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')">Hapus Draft</a>
                                <button type="submit" class="btn btn-primary">Setuju</button>
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
<?php } ?>