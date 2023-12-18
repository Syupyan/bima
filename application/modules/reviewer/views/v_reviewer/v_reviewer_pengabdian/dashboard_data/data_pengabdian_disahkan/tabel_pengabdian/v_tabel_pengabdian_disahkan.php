


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
            <a class="btn btn-danger" href="<?= base_url('reviewer/data-pengabdian-disahkan'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
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
                            <td>
                            <a href="<?= base_url('reviewer/tabel-detail-pengabdian-disahkan/').$pengabdian['id_pengabdian'] ?>"
                                    class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                            <a href="<?= base_url('reviewer/tabel-hasil-pengabdian-disahkan/').$pengabdian['id_pengabdian'] ?>"
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
