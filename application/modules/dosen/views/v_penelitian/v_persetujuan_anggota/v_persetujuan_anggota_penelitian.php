<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dashboard'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" class="f1" data-parsley-validate>

                        <fieldset>
                            <?php foreach($penelitianku as $penelitianku){ ?>
                            <input hidden type="text" value="<?= $user_login_data['nip_nik'] ?>" name="inip_nik"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <input hidden type="text" value="<?= $penelitianku['nip_nik_ketua'] ?>" name="nik_nip_ketua"
                                placeholder="" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" readonly value="<?= $penelitianku['judul'] ?>" name="judul"
                                    placeholder="Judul Penelitian" class="f1-first-name form-control"
                                    id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>TKT Saat Ini</label>
                                <input type="text" readonly value="<?= $penelitianku['tkt_awal'] ?>" name="tkt_awal"
                                    placeholder="TKT Saat Ini" class="f1-last-name form-control" id="f1-last-name">
                            </div>
                            <div class="form-group">
                                <label>Target Akhir TKT</label>
                                <input type="text" readonly value="<?= $penelitianku['tkt_akhir'] ?>" name="tkt_akhir"
                                    placeholder="Target Akhir TKT" class="f1-last-name form-control" id="f1-last-name">
                            </div>
                            <div class="form-group">
                                <label>Tema Penelitian</label>
                                <input type="text" readonly value="<?= $penelitianku['tema_penelitian'] ?>"
                                    name="tkt_akhir" placeholder="Target Akhir TKT" class="f1-last-name form-control"
                                    id="f1-last-name">
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

                                <input readonly type="text" value="<?= $penelitianku['nama'] ?>" placeholder=""
                                    class="f1-first-name form-control" id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>Uraian Tugas</label><br>

                                <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="tugas_ketua"
                                    data-parsley-required="true"><?= $penelitianku['tugas_ketua'] ?></textarea>
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
                                            <th>NIDN/NIDK</th>
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
                                    <a target="_blank" href="<?= base_url('user/User/download_file/pdf_proyek/').$penelitianku['subtansi_usulan'] ?>"
                                        class="btn btn-info">Download</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <h10 style="color:red;">Dengan Data yang ada, apakah anda menyetujui agar
                                  menjadi anggota dalam usulan ?</h10>
                            </div>
<?php 		$user			=  $this->db->select('*')
											->from('tbl_anggota')
											->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
											->where('tbl_anggota.nip_nik_anggota',$user_login_data['nip_nik'])
											->get()->row_array(); ?>
                            <div class="f1-buttons">
                                <a href="<?= base_url('dosen/Penelitian/persetujuan_penelitian_anggota/').$user['id_anggota'] ?>"
                                    class="btn btn-primary btn-hapus">Setuju</a>
                                <a title="Hapus Draft"
                                    href="<?= base_url('dosen/Penelitian/persetujuan_penelitian_anggota_tolak/').$user['id_anggota'] ?>"
                                    class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')">Tolak</a>
                            
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