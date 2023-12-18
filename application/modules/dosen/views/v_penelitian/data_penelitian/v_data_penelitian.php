<?php            
                            $cek_user = $this->db->select('*')
													->from('tbl_penelitian')
													->where('id_penelitian', $penelitian)
													->where('nip_nik_ketua', $user_login_data['nip_nik'])
													->get()->row_array();
                   ?>
            <?php if(isset($cek_user)){ ?>
<style>
            .card-lock-icon {
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 15px;
                color: blue;
            }
            </style>
<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <h5 class="card-title">Info !</h5>
                        <p class="card-text">Silahkan pilih untuk menuju halaman yang di inginkan.</p>
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
        <section class="row justify-content-center">
            <div class="col-6 col-lg-3 col-md-6">
                <a target="_blank" href="<?= base_url('dosen/data-laporan-kemajuan-penelitian/').$penelitian ?>"
                    class="card-link">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon blue mb-2">
                                        <i class="fa fa-window-maximize"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-wrap">
                                            <h6 class="text-muted font-semibold">Laporan Kemajuan</h6>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php            
                            $cek_upload = $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('penelitian_id', $penelitian)
                                                    ->where('nama_file_laporan_kemajuan !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan !=', "Tidak Ada")
														->get()->row_array();
                   ?>
            <?php if(isset($cek_upload)): ?>
            <div class="col-6 col-lg-3 col-md-6">
                <a target="_blank" href="<?= base_url('dosen/data-laporan-kemajuan-akhir-penelitian/').$penelitian ?>"
                    class="card-link">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon green mb-2">
                                        <i class="fa fa-window-restore"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-wrap">
                                            <h6 class="text-muted font-semibold">Laporan Kemajuan Akhir</h6>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php else: ?>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon green mb-2">
                                    <i class="fa fa-window-restore"></i>
                                </div>
                                <div class="card-lock-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-wrap">
                                        <h6 class="text-muted font-semibold">Laporan Kemajuan Akhir</h6>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endif; ?>

            <?php            
                            $cek_upload = $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('penelitian_id', $penelitian)
                                                    ->where('nama_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan_akhir !=', "Tidak Ada")
														->get()->row_array();
                   ?>
            <?php if(isset($cek_upload)): ?>
            <div class="col-6 col-lg-3 col-md-6">
                <a target="_blank" href="<?= base_url('dosen/data-laporan-keuangan-penelitian/').$penelitian ?>"
                    class="card-link">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon red mb-2">
                                        <i class="fa fa-usd"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-wrap">
                                            <h6 class="text-muted font-semibold">Laporan Keuangan</h6>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <?php else: ?>
         <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-4 py-4-5">
                        <div class="row">
                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                <div class="stats-icon red mb-2">
                                    <i class="fa fa-usd"></i>
                                </div>
                                <div class="card-lock-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-wrap">
                                    <h6 class="text-muted font-semibold">Laporan Keuangan</h6>
                                    </div>
                                    <div class="arrow-icon">
                                        <i class="fa fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-6 col-lg-3 col-md-6">
                <a target="_blank" href="<?= base_url('dosen/logbook-penelitian/').$penelitian ?>" class="card-link">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fa fa-street-view"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-wrap">
                                            <h6 class="text-muted font-semibold">Logbook</h6>
                                        </div>
                                        <div class="arrow-icon">
                                            <i class="fa fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

        </section>


    </div>
</div>

</div>

</div>
<?php } ?>