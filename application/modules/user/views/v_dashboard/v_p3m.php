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
    background-color: #1b217d;
    /* Ganti dengan kode warna yang Anda inginkan */
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
                        <h5 class="card-title">Selamat Datang</h5>
                        <p class="card-text">Silahkan pilih hak akses yang di inginkan.</p>
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
        <a href="<?= base_url('dashboard/p3m') ?>" class="card-link">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="fa fa-user-tie"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-wrap">
                                    <h6 class="text-muted font-semibold">Kepala P3M</h6>
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

    <div class="col-6 col-lg-3 col-md-6">
        <a href="<?= base_url('dashboard/dosen') ?>" class="card-link">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="fa fa-user-graduate"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="text-wrap">
                                    <h6 class="text-muted font-semibold">Dosen</h6>
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