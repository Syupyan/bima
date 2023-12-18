


<div class="content-wrapper container">

    <div class="page-heading">
    <h3><?= $title ?></h3>
    <a class="btn btn-danger" href="<?= base_url('reviewer/data-penelitian-laporan/1'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
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
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Tempat Kegiatan</th>
                            <th>Tahun Aktif</th>
                            <th>Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($logbook as $logbook): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $logbook['tanggal'] ?></td>
                            <td><?= $logbook['waktu'] ?></td>
                            <td><?= $logbook['tempat_kegiatan'] ?></td>
                            <td><?= $logbook['tahun_aktif'] ?></td>
                            <td>            <a class="btn btn-primary" href="<?= base_url('reviewer/dokumen-logbook-penelitian/').$logbook['id_logbook']; ?>"><i
                            class="fas fa-fw fa-eye"></i> Dokumen</a> </td>
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




