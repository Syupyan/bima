


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
            <a class="btn btn-danger" href="<?= base_url('dosen/data-penelitian-ketua'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a> 
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tema Penelitian</th>
                            <th>Tahun Usulan</th>
                            <th>Peran</th>
                            <th>Status Usulan</th>
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
                            <td><?php if ($penelitian['nip_nik_ketua'] == $user_login_data['nip_nik']): ?>
                                      <center><span class="badge bg-secondary">Ketua</span>
                                      </center>
                                      <?php endif ?></td>
                            <td><?php if ($penelitian['status_penelitian'] == 0): ?>
                                      <center><span class="badge bg-warning">Menunggu Anggota Setuju</span>
                                      </center>
                                      <?php elseif($penelitian['status_penelitian'] == 1): ?>
                                      <center><span class="badge bg-warning">Diperiksa Admin dan Kepala P3M</span>
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
                                      <?php elseif($penelitian['status_penelitian'] == 5): ?>
                                      <center><span class="badge bg-danger">Ditolak</span>
                                      </center>
                                      <?php endif ?>
                                  </td>

                                <td>
                                <a title="Detail"
                                    href="<?= base_url('dosen/detail-penelitian-ketua/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
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




