<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('reviewer/logbook-pengabdian/').$idku['pengabdian_id']; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12 col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Dokumen</h4>
                            </div>
                            <div class="card-body">
                            <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Dokumen Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_foto as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><img src="<?= base_url('asset/file/logbook/foto/').$lf['dokumen_foto'] ?>" width="200"></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr>
                                <br>
                                <table class="table table-bordered" id="table2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>Dokumen File</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_file as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $lf['nama_file'] ?></td>
                                            <td> <a href="<?= base_url('user/User/download_file/logbook/file/').$lf['dokumen_file'] ?>"
                                        class="btn btn-danger"><i class="fas fa-fw fa-download"></i> Download</a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <hr>
                                <br>
                                <table class="table table-bordered" id="table3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Url</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $no=1; foreach ($logbook_url as $lf): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $lf['dokumen_url'] ?></td>

                                        </tr>

                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

</div>
