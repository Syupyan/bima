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
                <a class="btn btn-danger" href="<?= base_url('admin/data-mahasiswa'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Prodi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($mahasiswa as $mhs): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['tanggal_lahir'] ?></td>
                                <td><?= $mhs['nama_prodi'] ?></td>
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
