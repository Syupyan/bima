<style>
.chart-card {
    width: 400px;
    height: 400px;
    border: 1px solid #ccc;
    margin: 20px;
}
</style>
<style>
.bg {
    background-color: rgba(255, 255, 255, 0.1);
    /* Ubah nilai alpha (0.5) sesuai kebutuhan transparansi */
}
</style>
<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <?php if ($user_login_data['role_id'] == 1) { ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h5 class="card-title">Selamat Datang !</h5>
                        <p class="card-text">Halo, Admin ! Anda memiliki peran khusus dalam BIMA POLITALA. Melalui akses
                            penuh yang Anda miliki, Anda dapat mengatur dan mengelola semua aspek dalam sistem ini. Kami
                            berharap Anda dapat menggunakan fitur-fitur yang tersedia dengan baik dan memberikan
                            kontribusi yang berarti dalam memastikan pengelolaan dana dan pengabdian berjalan lancar.
                        </p>
                    </div>
                    <div class="col-md-3">
                        <div class="animate__animated animate__fadeInRight text-center">
                            <img src="<?= base_url() ?>assets/images/h.png" class="img-fluid" alt="Introduction Image"
                                style="max-width: 40%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Data Pengguna</h6>
                                                <h6 class="font-extrabold mb-0"><?= $count_pengguna ?></h6>
                                            </div>
                                            <a href="<?= base_url('admin/data-pengguna') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-user-group"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Data Mahasiswa</h6>
                                                <h6 class="font-extrabold mb-0"><?= $count_mahasiswa ?></h6>
                                            </div>
                                            <a href="<?= base_url('admin/data-mahasiswa') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon bla mb-2">
                                            <i class="fa fa-university"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Data Prodi</h6>
                                                <h6 class="font-extrabold mb-0"><?= $count_prodi ?></h6>
                                            </div>
                                            <a href="<?= base_url('admin/master-prodi') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <label style="color: #000;" for=""><strong>Pengguna</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="penggunaChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <label style="color: #000;" for=""><strong>Mahasiswa</strong></label>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="mahasiswaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <?php }elseif ($user_login_data['role_id'] == 2) { ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h5 class="card-title">Selamat Datang !</h5>
                        <p class="card-text">Halo, Dosen ! Dalam BIMA POLITALA, peran Anda sangat penting. Anda dapat
                            mengajukan usulan penelitian dan pengabdian serta melaksanakan dokumentasi kegiatan melalui sistem ini.
                            Gunakan sistem ini dengan bijak untuk memfasilitasi kegiatan penelitian dan pengabdian Anda
                            serta berkontribusi dalam meningkatkan kualitas penelitian di institusi kita.</p>

                        <?php
                                $thn	= $this->db->select('*')
                                ->from('tbl_tahun_aktif')
                                ->join('tbl_usulan_anggaran_aktif', 'tbl_tahun_aktif.id_thn = tbl_usulan_anggaran_aktif.thn_aktif_id')
                                ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
                                ->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
                                ->get()->result_array();
                        ?>
                        <?php foreach($thn as $thn){ ?>
                        <strong>
                            <p class="card-text">Pembukaan Usulan Aktif: <?= $thn['waktu_anggaran_mulai'] ?> WITA Hingga
                                <?= $thn['waktu_anggaran_berakhir'] ?> WITA.</p>
                        </strong>
                        <?php } ?>
                    </div>
                    <div class="col-md-3">
                        <div class="animate__animated animate__fadeInRight text-center">
                            <img src="<?= base_url() ?>assets/images/h.png" class="img-fluid" alt="Introduction Image"
                                style="max-width: 40%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php if($user_login_data['nidn_nidk'] != 0){ ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-search-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Penelitian Ketua</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= $count_penelitian_ketua ?>
                                                </h6>
                                            </div>
                                            <a href="<?= base_url('dosen/data-penelitian-ketua') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon green mb-2">
                                            <i class="fa fa-search-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Penelitian Anggota</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= $count_penelitian_anggota ?>
                                                </h6>
                                            </div>
                                            <a href="<?= base_url('dosen/data-penelitian-anggota') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if($user_login_data['nidn_nidk'] != 0){ ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon blue mb-2">
                                            <i class="fa fa-map"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Pengabdian Ketua</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= $count_pengabdian_ketua ?>
                                                </h6>
                                            </div>
                                            <a href="<?= base_url('dosen/data-pengabdian-ketua') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon purple mb-2">
                                            <i class="fa fa-map"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h6 class="text-muted font-semibold">Pengabdian Anggota</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    <?= $count_pengabdian_anggota ?>
                                                </h6>
                                            </div>
                                            <a href="<?= base_url('dosen/data-pengabdian-anggota') ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                            <!-- Display chart using canvas element -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <?php if($user_login_data['nidn_nidk'] != 0){ ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian Ketua</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="penelitianChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian Ketua</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pengabdianChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian
                                            Anggota</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="penelitianAnggotaChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian
                                            Anggota</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pengabdianAnggotaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif ($user_login_data['role_id'] == 3) { ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="card-title">Selamat Datang !</h5>
                            <p class="card-text">Halo, Reviewer ! Peran Anda dalam BIMA POLITALA sangat berarti. Anda
                                memiliki tanggung jawab untuk mengevaluasi dan memberikan penilaian terhadap usulan
                                penelitian dan pengabdian yang diajukan. Kontribusi Anda yang objektif akan membantu
                                meningkatkan kualitas dan dampak dari kegiatan penelitian dan pengabdian. Terima kasih atas dedikasi
                                Anda dalam memastikan keberhasilan program ini.</p>
                        </div>
                        <div class="col-md-3">
                            <div class="animate__animated animate__fadeInRight text-center">
                                <img src="<?= base_url() ?>assets/images/h.png" class="img-fluid"
                                    alt="Introduction Image" style="max-width: 40%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Data Penelitian</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_penelitian_disahkan ?></h6>
                                                </div>
                                                <a href="<?= base_url('reviewer/data-penelitian-disahkan') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa fa-map"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Data Pengabdian</h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_pengabdian_disahkan ?></h6>
                                                </div>
                                                <a href="<?= base_url('reviewer/data-pengabdian-disahkan') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPenelitian"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartpengabdian"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif ($user_login_data['role_id'] == 4) { ?>
                <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'p3m') { ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="card-title">Selamat Datang !</h5>
                            <p class="card-text">Halo, Kepala P3M ! Peran dan tanggung jawab Anda sangat strategis dalam
                                BIMA POLITALA. Anda memiliki kekuasaan dalam pengambilan keputusan terkait pengelolaan
                                penelitian dan pengabdian. Sistem ini dirancang untuk membantu Anda dalam meningkatkan
                                efisiensi dan keberhasilan kegiatan penelitian dan pengabdian di institusi kita. Kami berharap Anda
                                dapat memanfaatkan sistem ini sebagai alat yang efektif dalam mencapai tujuan penelitian
                                yang optimal.</p>
                        </div>
                        <div class="col-md-3">
                            <div class="animate__animated animate__fadeInRight text-center">
                                <img src="<?= base_url() ?>assets/images/h.png" class="img-fluid"
                                    alt="Introduction Image" style="max-width: 40%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'dosen') { ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="card-title">Selamat Datang !</h5>
                            <p class="card-text">Halo, Dosen ! Dalam BIMA POLITALA, peran Anda sangat penting. Anda
                                dapat
                                mengajukan usulan penelitian dan pengabdian serta melaksanakan dokumentasi kegiatan melalui sistem
                                ini.
                                Gunakan sistem ini dengan bijak untuk memfasilitasi kegiatan penelitian dan pengabdian
                                Anda
                                serta berkontribusi dalam meningkatkan kualitas penelitian di institusi kita.</p>

                            <?php
                                $thn	= $this->db->select('*')
                                ->from('tbl_tahun_aktif')
                                ->join('tbl_usulan_anggaran_aktif', 'tbl_tahun_aktif.id_thn = tbl_usulan_anggaran_aktif.thn_aktif_id')
                                ->where('tbl_tahun_aktif.status_aktif', 'Aktif')
                                ->where('tbl_tahun_aktif.tahun_aktif', date('Y'))
                                ->get()->result_array();
                        ?>
                            <?php foreach($thn as $thn){ ?>
                            <strong>
                                <p class="card-text">Pembukaan Usulan Aktif: <?= $thn['waktu_anggaran_mulai'] ?> WITA
                                    Hingga
                                    <?= $thn['waktu_anggaran_berakhir'] ?> WITA.</p>
                            </strong>
                            <?php } ?>
                        </div>
                        <div class="col-md-3">
                            <div class="animate__animated animate__fadeInRight text-center">
                                <img src="<?= base_url() ?>assets/images/h.png" class="img-fluid"
                                    alt="Introduction Image" style="max-width: 40%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'dosen') { ?>
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Penelitian Ketua
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_penelitian_ketua ?></h6>
                                                </div>
                                                <a href="<?= base_url('dosen/data-penelitian-ketua') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon green mb-2">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Penelitian Anggota
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_penelitian_anggota ?></h6>
                                                </div>
                                                <a href="<?= base_url('dosen/data-penelitian-anggota') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa fa-map"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Pengabdian Ketua
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_pengabdian_ketua ?></h6>
                                                </div>
                                                <a href="<?= base_url('dosen/data-pengabdian-ketua') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon purple mb-2">
                                                <i class="fa fa-map"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Pengabdian Anggota
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_pengabdian_anggota ?></h6>
                                                </div>
                                                <a href="<?= base_url('dosen/data-pengabdian-anggota') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <?php } ?>
            <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'p3m') { ?>
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon red mb-2">
                                                <i class="fa fa-search-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Data Penelitian
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_penelitian_disahkan ?></h6>
                                                </div>
                                                <a href="<?= base_url('p3m/data-penelitian-disahkan') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div
                                            class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                            <div class="stats-icon blue mb-2">
                                                <i class="fa fa-map"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h6 class="text-muted font-semibold">Data Pengabdian
                                                    </h6>
                                                    <h6 class="font-extrabold mb-0">
                                                        <?= $count_pengabdian_disahkan ?></h6>
                                                </div>
                                                <a href="<?= base_url('p3m/data-pengabdian-disahkan') ?>"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </section>
            <?php } ?>
            <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'dosen') { ?>
            <?php if($user_login_data['nidn_nidk'] != 0){ ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian
                                            Ketua</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="penelitianChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian
                                            Ketua</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pengabdianChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian
                                            Anggota</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="penelitianAnggotaChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian
                                            Anggota</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="pengabdianAnggotaChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php
                        $uri = $this->uri->segment(2);
                        ?>
            <?php if ($uri == 'p3m') { ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Penelitian</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartPenelitian"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label style="color: #000;" for=""><strong>Pengabdian</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="chartpengabdian"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Script to initialize the chart -->
    <script>
    // Grafik Penelitian
    var penelitianChart = document.getElementById('penelitianChart').getContext('2d');
    var penelitianData = {
        labels: <?php echo json_encode($penelitian_labels); ?>,
        datasets: [{
                label: 'Disahkan',
                data: <?php echo json_encode($penelitian_approved_data); ?>,
                backgroundColor: '<?php echo $penelitian_colors[0]; ?>'
            },
            {
                label: 'Ditolak',
                data: <?php echo json_encode($penelitian_rejected_data); ?>,
                backgroundColor: '<?php echo $penelitian_colors[1]; ?>'
            }
        ]
    };
    var penelitianOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    };
    var penelitianChart = new Chart(penelitianChart, {
        type: 'bar',
        data: penelitianData,
        options: penelitianOptions
    });

    // Grafik Pengabdian
    var pengabdianChart = document.getElementById('pengabdianChart').getContext('2d');
    var pengabdianData = {
        labels: <?php echo json_encode($pengabdian_labels); ?>,
        datasets: [{
                label: 'Disahkan',
                data: <?php echo json_encode($pengabdian_approved_data); ?>,
                backgroundColor: '<?php echo $pengabdian_colors[0]; ?>'
            },
            {
                label: 'Ditolak',
                data: <?php echo json_encode($pengabdian_rejected_data); ?>,
                backgroundColor: '<?php echo $pengabdian_colors[1]; ?>'
            }
        ]
    };
    var pengabdianOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    };
    var pengabdianChart = new Chart(pengabdianChart, {
        type: 'bar',
        data: pengabdianData,
        options: pengabdianOptions
    });
    </script>
    <script>
    // Grafik Penelitian Anggota
    var penelitianAnggotaChart = document.getElementById('penelitianAnggotaChart').getContext('2d');
    var penelitianAnggotaData = {
        labels: <?php echo json_encode($penelitian_anggota_labels); ?>,
        datasets: [{
            label: 'Disahkan',
            data: <?php echo json_encode($penelitian_anggota_approved_data); ?>,
            backgroundColor: '<?php echo $penelitian_anggota_colors[0]; ?>'
        }, {
            label: 'Ditolak',
            data: <?php echo json_encode($penelitian_anggota_rejected_data); ?>,
            backgroundColor: '<?php echo $penelitian_anggota_colors[1]; ?>'
        }]
    };
    var penelitianAnggotaChart = new Chart(penelitianAnggotaChart, {
        type: 'bar',
        data: penelitianAnggotaData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    stacked: false
                },
                y: {
                    beginAtZero: true,
                    stacked: false
                }
            }
        }
    });

    // Grafik Pengabdian Anggota
    var pengabdianAnggotaChart = document.getElementById('pengabdianAnggotaChart').getContext('2d');
    var pengabdianAnggotaData = {
        labels: <?php echo json_encode($pengabdian_anggota_labels); ?>,
        datasets: [{
            label: 'Disahkan',
            data: <?php echo json_encode($pengabdian_anggota_approved_data); ?>,
            backgroundColor: '<?php echo $pengabdian_anggota_colors[0]; ?>'
        }, {
            label: 'Ditolak',
            data: <?php echo json_encode($pengabdian_anggota_rejected_data); ?>,
            backgroundColor: '<?php echo $pengabdian_anggota_colors[1]; ?>'
        }]
    };
    var pengabdianAnggotaChart = new Chart(pengabdianAnggotaChart, {
        type: 'bar',
        data: pengabdianAnggotaData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    beginAtZero: true,
                    stacked: false
                },
                y: {
                    beginAtZero: true,
                    stacked: false
                }
            }
        }
    });
    </script>

    <script>
    var penggunaChart = document.getElementById('penggunaChart').getContext('2d');
    var penggunaData = {
        labels: <?php echo json_encode($chartLabels); ?>,
        datasets: [{
            label: 'Total Pengguna',
            data: <?php echo json_encode($chartData); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.5)'
        }]
    };
    var penggunaChart = new Chart(penggunaChart, {
        type: 'bar',
        data: penggunaData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
    <script>
    // Data dari controller
    var chartLabels = <?php echo json_encode($mahasiswaChartLabels); ?>;
    var chartData = <?php echo json_encode($mahasiswaChartData); ?>;

    // Membuat diagram menggunakan Chart.js
    var ctx = document.getElementById('mahasiswaChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Mahasiswa',
                data: chartData,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
    </script>
    <script>
    // Data Penelitian Chart
    var penelitianChartLabels = <?= json_encode($penelitianChartLabels) ?>;
    var penelitianChartData = <?= json_encode($penelitianChartData) ?>;

    // Membuat Chart
    var penelitianChart = new Chart(document.getElementById('chartPenelitian'), {
        type: 'bar',
        data: {
            labels: penelitianChartLabels,
            datasets: [{
                label: 'Jumlah Penelitian',
                data: penelitianChartData,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    stepSize: 1
                }
            }
        }
    });
    </script>

    <script>
    // Mengambil data dari controller
    var pengabdianChartLabels = <?= json_encode($pengabdianChartLabels) ?>;
    var pengabdianChartData = <?= json_encode($pengabdianChartData) ?>;

    // Membuat chart
    var ctx = document.getElementById('chartpengabdian').getContext('2d');
    var pengabdianChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: pengabdianChartLabels,
            datasets: [{
                label: 'Jumlah Pengabdian',
                data: pengabdianChartData,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0,
                    stepSize: 1
                }
            }
        }
    });
    </script>