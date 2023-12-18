<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                <a class="btn btn-danger" href="<?= base_url('reviewer/tabel-pengabdian-disahkan/').$id['id_thn']; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" class="f1" data-parsley-validate>

                        <fieldset>
                            <?php foreach($pengabdian as $pengabdianku){ ?>
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
                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                                <hr>
                            </div>
                            <div class="form-group">
                                <label>Anggota Mahasiswa</label>
                                <div class="card-header">
                                </div>
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
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <?php } ?>
        </section>
        <!-- /.content -->
    </div>

</div>
