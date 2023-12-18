


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
                            <th>Tema Pengabdian</th>
                            <th>Tahun Usulan</th>
                            <th>Nama Ketua</th>
                            <th>Nilai Reviewer</th>
                            <th>Status Pengabdian</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($pengabdian as $pengabdian): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $pengabdian['judul'] ?></td>
                            <td><?= $pengabdian['tema_pengabdian'] ?></td>
                            <td><?= $pengabdian['tahun_aktif'] ?></td>
                            <td><?= $pengabdian['nama'] ?></td>
                            <?php
                                    $this->db->select_sum('nilai', 'total_nilai');
                                    $this->db->where('pengabdian_id', $pengabdian['id_pengabdian']);
                                    $query = $this->db->get('tbl_penilaian_reviewer');
                                    $total = $query->row()->total_nilai;
                            
                            ?>
                            <td><?= $total ?></td>
                            <td><?php if ($pengabdian['status_pengabdian'] == 0): ?>
                                      <center><span class="badge bg-warning">Menunggu Anggota Setuju</span>
                                      </center>
                                      <?php elseif($pengabdian['status_pengabdian'] == 1): ?>
                                      <center><span class="badge bg-warning">Diperiksa Admin dan Kepala P3M</span>
                                      </center>
                                      <?php elseif($pengabdian['status_pengabdian'] == 2): ?>
                                      <center><span class="badge bg-warning">Sedang dinilai oleh Reviewer</span>
                                      </center>
                                      <?php elseif($pengabdian['status_pengabdian'] == 3): ?>
                                      <center><span class="badge bg-warning">Tahap Penetapan</span>
                                      </center>
                                      <?php elseif($pengabdian['status_pengabdian'] == 4): ?>
                                      <center><span class="badge bg-success">Disahkan</span>
                                      </center>
                                      <?php elseif($pengabdian['status_pengabdian'] == 5): ?>
                                      <center><span class="badge bg-danger">Ditolak</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                            <td>
                            <a title="Detail Pengabdian" target="_blank" href="<?= base_url('p3m/detail-pengabdian-disahkan/').$pengabdian['id_pengabdian'] ?>"
                                    class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                            <a title="Hasil Pengabdian" target="_blank" href="<?= base_url('p3m/hasil-pengabdian-disahkan/').$pengabdian['id_pengabdian'] ?>"
                                    class="btn btn-secondary"><i class="fas fa-fw fa-clipboard"></i></a>
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
