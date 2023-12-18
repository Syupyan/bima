


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
            <a class="btn btn-danger" href="<?= base_url('p3m/data-penelitian-disahkan'); ?>"><i
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
                            <th>Nama Ketua</th>
                            <th>Nilai Reviewer</th>
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
                            <td><?= $penelitian['nama'] ?></td>
                            <?php
                                    $this->db->select_sum('nilai', 'total_nilai');
                                    $this->db->where('penelitian_id', $penelitian['id_penelitian']);
                                    $query = $this->db->get('tbl_penilaian_reviewer');
                                    $total = $query->row()->total_nilai;
                            
                            ?>
                            <td><?= $total ?></td>
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
                                      <?php elseif($penelitian['status_penelitian'] == 5): ?>
                                      <center><span class="badge bg-danger">Ditolak</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                            <td>
                            <a href="<?= base_url('p3m/tabel-detail-penelitian-disahkan/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                                    <?php if ($penelitian['status_penelitian'] != 5): ?>
                            <a href="<?= base_url('p3m/tabel-hasil-penelitian-disahkan/').$penelitian['id_penelitian'] ?>"
                                    class="btn btn-secondary"><i class="fas fa-fw fa-clipboard"></i></a>
                                    <?php endif ?>
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
