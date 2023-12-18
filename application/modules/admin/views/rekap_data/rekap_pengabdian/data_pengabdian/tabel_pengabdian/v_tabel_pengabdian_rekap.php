


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
            <a class="btn btn-danger" href="<?= base_url('admin/rekap-pengabdian'); ?>"><i
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
                            <th>Nilai Evaluasi Laporan Kemajuan</th>
                            <th>Nilai Evaluasi Laporan Kemajuan Akhir</th>
                            <th>Dokumen Laporan Kemajuan</th>
                            <th>Dokumen Laporan Kemajuan Akhir</th>
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
                                    $query = $this->db->get('tbl_evaluasi_reviewer');
                                    $total_evaluasi = $query->row()->total_nilai;
                            
                            ?>
                            <td><?= $total_evaluasi ?></td>
                            <?php
                                    $this->db->select_sum('nilai', 'total_nilai');
                                    $this->db->where('pengabdian_id', $pengabdian['id_pengabdian']);
                                    $query = $this->db->get('tbl_evaluasi_akhir_reviewer');
                                    $total_evaluasi_akhir = $query->row()->total_nilai;
                            ?>
                            <td><?= $total_evaluasi_akhir ?></td>
                            <td> <a target="_blank" class="btn btn-success" href="<?= base_url('admin/data-laporan-kemajuan-pengabdian/').$pengabdian['id_pengabdian']; ?>"><i
                            class="fas fa-fw fa-window-maximize"></i></a></td>
                            <td> <a target="_blank" class="btn btn-success" href="<?= base_url('admin/data-laporan-kemajuan-akhir-pengabdian/').$pengabdian['id_pengabdian']; ?>"><i
                            class="fas fa-fw fa-window-restore"></i></a></td>
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
