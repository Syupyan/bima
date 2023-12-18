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

                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tema Pengabdian</th>
                                <th>Tahun Usulan</th>
                                <th>Nama Ketua</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($pengabdian as $pengabdian): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $pengabdian['judul'] ?></td>
                                <td><?= $pengabdian['tema_pengabdian'] ?></td>
                                <td><?= $pengabdian['tahun_aktif'] ?></td>
                                <td><?= $pengabdian['nama'] ?></td>
                                <td>

                                    <button title="Detail Pengabdian" type="button" class="btn btn-info"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $pengabdian['id_pengabdian'] ?>"><i
                                            class="fas fa-fw fa-info-circle"></i>
                                    </button>
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
<!-- <script type="text/javascript">
$(document).ready(function() {


    $(".btn-switch-user").click(function() {
        let id_pengabdian = $(this).attr("id")
        let status_pengabdian = $(this).val()
        $.ajax({
            url: "<?= base_url('p3m/Pengabdian/switch_access/') ?>",
            type: "GET",
            data: {
                id_pengabdian: id_pengabdian,
                status_pengabdian: status_pengabdian
            },
            success: function() {
                document.location.href = "<?= base_url('p3m/usulan-pengabdian') ?>";
            },
        })
    });

});
</script> -->



<!--scrolling content Modal -->
<?php foreach($pengabdian1 as $pengabdian){ ?>
<div class="modal fade" id="exampleModalScrollable<?= $pengabdian['id_pengabdian'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pengabdian</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <label>Judul: </label>
                <div class="form-group">
                    <input readonly type="text" value="<?= $pengabdian['judul'] ?>" placeholder="Judul"
                        class="form-control">
                </div>
                <label>TKT Awal: </label>
                <div class="form-group">
                    <input readonly type="text" value="<?= $pengabdian['tkt_awal'] ?>" placeholder="TKT Awal"
                        class="form-control">
                </div>
                <label>TKT Akhir: </label>
                <div class="form-group">
                    <input readonly type="text" value="<?= $pengabdian['tkt_akhir'] ?>" placeholder="TKT Akhir"
                        class="form-control">
                </div>
                <label>Tema Pengabdian: </label>
                <div class="form-group">
                    <input readonly type="text" value="<?= $pengabdian['tema_pengabdian'] ?>" placeholder="TKT Akhir"
                        class="form-control">
                </div>
                <hr>
                <?php
		$luaran_usulan			=  $this->db->select('*')
        ->from('tbl_luaran_hasil')
        ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_wajib_id = tbl_luaran_usulan.id_luaran')
        ->where('tbl_luaran_hasil.pengabdian_id =',$pengabdian['id_pengabdian'])
        ->get()->result_array();
        $luaran_usulan_tidak_wajib	=  $this->db->select('*')
        ->from('tbl_luaran_hasil')
        ->join('tbl_luaran_usulan', 'tbl_luaran_hasil.luaran_tambahan_id = tbl_luaran_usulan.id_luaran')
        ->where('tbl_luaran_hasil.pengabdian_id =',$pengabdian['id_pengabdian'])
        ->get()->result_array();
                ?>
                <table class="table table-bordered" id="table3">
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
                <label>Nama Ketua: </label>
                <div class="form-group">
                    <input readonly type="text" value="<?= $pengabdian['nama'] ?>" placeholder="Nama Ketua"
                        class="form-control">
                </div>
                <label>Tugas Ketua: </label>
                <div class="form-group">
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3" name="tugas_ketua"
                        data-parsley-required="true"><?= $pengabdian['tugas_ketua'] ?></textarea>
                </div>
                <div class="form-group">
                    <hr>
                    <label>Anggota Dosen</label>
                    <table class="table table-bordered" id="table2">
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
                            <?php
		$anggota_dosen =  $this->db->select('*')
        ->from('tbl_anggota')
        ->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
        ->join('tbl_pengguna', 'tbl_anggota.nip_nik_anggota = tbl_pengguna.nip_nik')
        ->where('tbl_anggota.pengabdian_id',$pengabdian['id_pengabdian'])
        ->get()->result_array();
?>
                            <?php $no=1; foreach ($anggota_dosen as $user): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><img src="<?= base_url('asset/img/profile/').$user['foto_profil'] ?>" width="40">
                                </td>
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
                    <table class="table table-bordered" id="table3">
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
                            <?php
		$anggota_mhs =  $this->db->select('*')
        ->from('tbl_anggota')
        ->join('tbl_pengabdian', 'tbl_anggota.pengabdian_id = tbl_pengabdian.id_pengabdian')
        ->join('tbl_mahasiswa', 'tbl_anggota.nim_anggota = tbl_mahasiswa.nim')
        ->join('tbl_prodi', 'tbl_mahasiswa.prodi_id = tbl_prodi.id_prodi')
        ->join('tbl_tahun_aktif','tbl_tahun_aktif.id_thn = tbl_mahasiswa.tahun_id')
		// ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
        ->where('tbl_anggota.pengabdian_id',$pengabdian['id_pengabdian'])
        ->get()->result_array();
?>
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
                        <a href="<?= base_url('user/User/download_file/pdf_proyek/').$pengabdian['subtansi_usulan'] ?>"
                            class="btn btn-info">Download</a>
                    </div>
                </div>

                <div class="form-group">
                    <div class="position-relative text-end">
                        <a title="Kirim Ke admin dan kepala p3m"
                            href="<?= base_url('p3m/Pengabdian/kirim_ke_reviewer/').$pengabdian['id_pengabdian'] ?>"
                            class="btn btn-warning" onclick="return confirm('Yakin ?')"><i
                                class="fas fa-fw fa-plus"></i>
                            Kirim Ke Reviewer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
    </div>
    </form>
</div>
</div>
</div>
<?php } ?>
</div>
