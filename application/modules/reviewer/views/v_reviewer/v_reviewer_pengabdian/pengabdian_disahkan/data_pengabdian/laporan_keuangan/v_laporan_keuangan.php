<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('reviewer/data-pengabdian-laporan/').$pengabdian; ?>"><i
                class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">

        <!-- Main content -->
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <label for=""><Strong>Upload Laporan Keuangan</Strong></label><br><br>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; 
                        foreach ($lp_upload as $lp): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $lp['nama_file_laporan_keuangan'] ?></td>
                                <td><a href="<?= base_url('user/User/download_file/laporan_keuangan/').$lp['url_file_laporan_keuangan'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-download"></i> Download</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
        <!-- Basic Tables start -->
        
        <!-- Basic Tables end -->
        <!-- /.content -->
    </div>
</div>