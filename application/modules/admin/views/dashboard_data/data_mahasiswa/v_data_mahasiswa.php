<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <?php foreach($tahun_aktif as $tahun_aktif){ ?>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-4 py-4-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                        <div class="stats-icon red mb-2">
                                            <i class="fa fa-book"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <a
                                                    href="<?= base_url('admin/tabel-mahasiswa/') . $tahun_aktif['id_thn'] ?>">
                                                    <h6 class="text-muted font-semibold">Mahasiswa
                                                        <?= $tahun_aktif['tahun_aktif'] ?></h6>
                                                </a>
                                                <?php
            $tahun = $this->db->select('*')
                ->from('tbl_mahasiswa')
                ->where('tahun_id', $tahun_aktif['id_thn'])
                ->get()->num_rows();
            ?>
                                                <h6 class="font-extrabold mb-0"><?= $tahun ?></h6>
                                            </div>
                                            <a href="<?= base_url('admin/tabel-mahasiswa/') . $tahun_aktif['id_thn'] ?>"
                                                class="btn btn-sm btn-primary">Detail</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            </div>
        </section>

    </div>

</div>