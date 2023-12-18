


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
            <a class="btn btn-danger" href="<?= base_url('admin/rekap-penelitian'); ?>"><i
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
                                    $query = $this->db->get('tbl_evaluasi_reviewer');
                                    $total_evaluasi = $query->row()->total_nilai;
                            
                            ?>
                            <td><?= $total_evaluasi ?></td>
                            <?php
                                    $this->db->select_sum('nilai', 'total_nilai');
                                    $this->db->where('penelitian_id', $penelitian['id_penelitian']);
                                    $query = $this->db->get('tbl_evaluasi_akhir_reviewer');
                                    $total_evaluasi_akhir = $query->row()->total_nilai;
                            ?>
                            <td><?= $total_evaluasi_akhir ?></td>
                            <td> <a target="_blank" class="btn btn-success" href="<?= base_url('admin/data-laporan-kemajuan-penelitian/').$penelitian['id_penelitian']; ?>"><i
                            class="fas fa-fw fa-window-maximize"></i></a></td>
                            <td> <a target="_blank" class="btn btn-success" href="<?= base_url('admin/data-laporan-kemajuan-akhir-penelitian/').$penelitian['id_penelitian']; ?>"><i
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
