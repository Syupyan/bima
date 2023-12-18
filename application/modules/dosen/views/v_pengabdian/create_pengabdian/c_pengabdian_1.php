<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<style>
.select2-container {
    width: 300px;
    /* Atur lebar sesuai kebutuhan Anda */
}
</style>
<?php if ($user_login_data['email'] != 'default@email.com') { ?>
<?php foreach($tahun_anggaran as $tahun_anggaran){ ?>
<?php if($date > $tahun_anggaran['waktu_anggaran_mulai']){ ?>
<?php if($date > $tahun_anggaran['waktu_anggaran_berakhir']){ ?>
<?php }else{ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <?php foreach($pengabdianku1 as $pengabdianku1){ ?>
        <?php if($pengabdianku1['status_aktif'] == 'Disetujui'){ ?>
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dosen/pengabdian'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Pengabdian/add_pengabdian_1') ?>" method="post"
                        class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step active">
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
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>

                        <fieldset>
                            <label for="">1.0 Registrasi Judul </label>
                            <input type="text" hidden name="nip_nik_ketua" value="<?= $user_login_data['nip_nik'] ?>"
                                placeholder="Judul Pengabdian" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" placeholder="Judul Pengabdian"
                                    class="f1-first-name form-control" id="f1-first-name">
                            </div>
                            <div class="f1-buttons">
                                <button type="submit" class="btn btn-submit">Simpan</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
        <?php }elseif(($pengabdianku1['status_aktif'] == 'Draft')){ ?>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dosen/pengabdian'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Pengabdian/add_pengabdian_1_1') ?>" method="post"
                        class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step active">
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
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>

                        <fieldset>
                            <input hidden type="text" value="<?= $pengabdianku1['id_pengabdian'] ?>"
                                name="id_pengabdian" placeholder="" class="f1-first-name form-control"
                                id="f1-first-name">
                            <input hidden type="text" value="<?= $pengabdianku1['nip_nik_ketua'] ?>"
                                name="nik_nip_ketua" placeholder="" class="f1-first-name form-control"
                                id="f1-first-name">
                            <label for="">1.1 Identitas Usukan Pengabdian </label>
                            <input type="text" hidden name="nip_nik_ketua" value="<?= $user_login_data['nip_nik'] ?>"
                                placeholder="Judul Pengabdian" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" value="<?= $pengabdianku1['judul'] ?>"
                                    placeholder="Judul Pengabdian" class="f1-first-name form-control"
                                    id="f1-first-name">
                            </div>
                            <div class="form-group">
                                <label>TKT Saat Ini</label>
                                <?php
// Ambil data tkt_awal dari tabel tbl_pengabdian
$this->db->select('tkt_awal');
$this->db->from('tbl_pengabdian');
$this->db->where('id_pengabdian', $pengabdianku1['id_pengabdian']);
$tkt_awal_data = $this->db->get()->row_array();

// Mendapatkan nilai tkt_awal
$tkt_awal = isset($tkt_awal_data['tkt_awal']) ? $tkt_awal_data['tkt_awal'] : '';

?>
                                <div class="input-group">
                                    <select name="tkt_awal" class="form-select" id="">
                                        <?php for ($i = 1; $i <= 10; $i++): ?>
                                        <option value="<?php echo $i; ?>"
                                            <?php echo ($i == $tkt_awal) ? 'selected' : ''; ?>><?php echo $i; ?>
                                        </option>
                                        <?php endfor; ?>
                                    </select>
                                    <div class="input-group-append">
                                        <span class="btn btn-link" data-bs-toggle="modal" data-bs-target="#inputModal1">
                                            <i class="zmdi zmdi-help-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Target Akhir TKT</label>
                                <?php
// Ambil data tkt_akhir dari tabel tbl_pengabdian
$this->db->select('tkt_akhir');
$this->db->from('tbl_pengabdian');
$this->db->where('id_pengabdian', $pengabdianku1['id_pengabdian']);
$tkt_akhir_data = $this->db->get()->row_array();

// Mendapatkan nilai tkt_akhir
$tkt_akhir = isset($tkt_akhir_data['tkt_akhir']) ? $tkt_akhir_data['tkt_akhir'] : '';

?>

                                <select name="tkt_akhir" class="form-select" id="">
                                    <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option value="<?php echo $i; ?>"
                                        <?php echo ($i == $tkt_akhir) ? 'selected' : ''; ?>><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>


                            </div>
                            <label for="">Luaran Wajib</label>
                            <div class="form-group">
                                <?php
$luaran_hasil = $this->db->select('*')
    ->from('tbl_luaran_hasil')
    ->where('luaran_wajib_id !=', 0)
    ->where('pengabdian_id', $pengabdianku1['id_pengabdian'])
    ->get()
    ->result_array();

$data_1 = array_column($luaran_hasil, 'luaran_wajib_id');
?>

                                <select name="luaran[]" class="select2" multiple="multiple" style="width: 200px;">
                                    <?php foreach ($luaran_usulan as $option): ?>
                                    <option value="<?php echo $option['id_luaran']; ?>"
                                        <?php echo in_array($option['id_luaran'], $data_1) ? 'selected' : ''; ?>>
                                        <?php echo $option['nama_luaran_wajib']; ?></option>
                                    <?php endforeach; ?>
                                </select>


                            </div>
                            <label for="">Luaran Tambahan</label>
                            <div class="form-group">
                                <?php
$luaran_hasil = $this->db->select('*')
    ->from('tbl_luaran_hasil')
    ->where('luaran_tambahan_id !=', 0)
    ->where('pengabdian_id', $pengabdianku1['id_pengabdian'])
    ->get()
    ->result_array();

$data = array_column($luaran_hasil, 'luaran_tambahan_id');
?>

                                <select name="luaran_tambahan[]" class="select2" multiple="multiple"
                                    style="width: 200px;">
                                    <?php foreach ($luaran_usulan_tidak_wajib as $option): ?>
                                    <option value="<?php echo $option['id_luaran']; ?>"
                                        <?php echo in_array($option['id_luaran'], $data) ? 'selected' : ''; ?>>
                                        <?php echo $option['nama_luaran_tambahan']; ?></option>
                                    <?php endforeach; ?>
                                </select>


                            </div>
                            <label for="">1.2 Pemilihan Program Pengabdian </label>
                            <div class="form-group">
                                <label>Tema Pengabdian</label>
                                <?php
// Ambil data tema_pengabdian dari tabel tbl_pengabdian
$this->db->select('tema_pengabdian');
$this->db->from('tbl_pengabdian');
$this->db->where('id_pengabdian', $pengabdianku1['id_pengabdian']);
$query = $this->db->get();
$tema_pengabdian_data = $query->row_array();

// Mendapatkan nilai tema_pengabdian
$tema_pengabdian_value = isset($tema_pengabdian_data['tema_pengabdian']) ? $tema_pengabdian_data['tema_pengabdian'] : '';

?>
                                <select name="tema_pengabdian" class="form-select" id="">
                                    <?php foreach($tema_pengabdian as $tp): ?>
                                    <option
                                        <?php echo ($tp['tema_pengabdian'] == $tema_pengabdian_value) ? 'selected' : ''; ?>>
                                        <?= $tp['tema_pengabdian'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>


                            </div>
                            <div class="f1-buttons">
                                <button type="submit" class="btn btn-submit">Selanjutnya</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
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
                        <p class="explanation-text">TKT awal dan TKT akhir tidak boleh sama dan tidak boleh lebih dari
                            TKT awal !.</p>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
        <?php if(empty($pengabdianku1)){ ?>
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dosen/pengabdian'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('dosen/Pengabdian/add_pengabdian_1') ?>" method="post"
                        class="f1" data-parsley-validate>
                        <div class="f1-steps">
                            <div class="f1-progress">
                                <div class="f1-progress-line" data-now-value="12.5" data-number-of-steps="4"
                                    style="width: 12.5%;"></div>
                            </div>
                            <div class="f1-step active">
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
                            <div class="f1-step">
                                <div class="f1-step-icon"><i class="fa fa-check"></i></div>
                                <p>Konfirmasi Usulan</p>
                            </div>
                        </div>

                        <fieldset>
                            <label for="">1.0 Registrasi Judul </label>
                            <input type="text" hidden name="nip_nik_ketua" value="<?= $user_login_data['nip_nik'] ?>"
                                placeholder="Judul Pengabdian" class="f1-first-name form-control" id="f1-first-name">
                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" name="judul" placeholder="Judul Pengabdian"
                                    class="f1-first-name form-control" id="f1-first-name">
                            </div>
                            <div class="f1-buttons">
                                <button type="submit" class="btn btn-submit">Simpan</button>
                            </div>
                        </fieldset>

                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
        <?php } ?>

    </div>

</div>

<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2();
});
</script>