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
                            <th>Nama Ketua</th>
                            <th>Nilai Reviewer</th>
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
                                 
                            <td>
                                    <a target="_blank" title="Detail Penelitian"
                                        href="<?= base_url('p3m/detail-dinilai-penelitian/').$penelitian['id_penelitian'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                                        <a  title="Hasil Penelitian" target="_blank"
                                        href="<?= base_url('p3m/hasil-dinilai-penelitian/').$penelitian['id_penelitian'] ?>"
                                        class="btn btn-secondary"><i class="fas fa-fw fa-clipboard"></i></a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Menginisialisasi DataTable
    $('#table1').DataTable();

    // Mengurutkan berdasarkan kolom nilai reviewer secara descending
    var table = $('#table1').DataTable();
    table.order([5, 'desc']).draw();
});
</script>
