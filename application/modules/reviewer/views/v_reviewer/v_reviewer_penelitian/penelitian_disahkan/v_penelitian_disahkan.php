


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
                            <th>Tema Penelitian</th>
                            <th>Tahun Usulan</th>
                            <th>Status Penelitian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($penelitian as $penelitian): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $penelitian['judul'] ?></td>
                            <td><?= $penelitian['tema_penelitian'] ?></td>
                            <td><?= $penelitian['tahun_aktif'] ?></td> 
                            <td><?php if ($penelitian['status_penelitian'] == 0): ?>
                                      <center><span class="badge bg-warning">Menunggu Anggota Setuju</span>
                                      </center>
                                      <?php elseif($penelitian['status_penelitian'] == 1): ?>
                                      <center><span class="badge bg-warning">Diperiksa Kepala P3M</span>
                                      </center>
                                      <?php elseif($penelitian['status_penelitian'] == 2): ?>
                                      <center><span class="badge bg-warning">Sedang dinilai oleh Reviewer</span>
                                      </center>
                                      <?php elseif($penelitian['status_penelitian'] == 3): ?>
                                      <center><span class="badge bg-warning">Tahap Penetapan</span>
                                      </center>
                                      <?php elseif($penelitian['status_penelitian'] == 4): ?>
                                      <center><span class="badge bg-success">Disahkan</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                  <td>
                            <a target="_blank" title="detail penelitian" href="<?= base_url('reviewer/detail-penelitian-disahkan/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                                    <?php if($penelitian['status_penelitian'] == 4): ?>
                                        <a target="_blank" title="hasil penelitian" href="<?= base_url('reviewer/hasil-penelitian-disahkan/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-secondary"><i class="fas fa-fw fa-clipboard"></i></a>
                                    <a target="_blank" title="laporan penelitian"
                                    href="<?= base_url('reviewer/data-penelitian-laporan/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-success"><i class="fas fa-fw fa-book"></i></a>
                                    <a target="_blank" title="data evaluasi"
                                    href="<?= base_url('reviewer/data-evaluasi-penelitian/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-warning"><i class="fas fa-fw fa-book-open"></i></a>
                                    <?php endif; ?>
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
