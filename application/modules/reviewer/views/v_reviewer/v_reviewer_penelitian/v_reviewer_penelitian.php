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
                                <td>
                                    <a target="_blank" title="Detail Penelitian"
                                        href="<?= base_url('reviewer/detail-penelitian/').$penelitian['id_penelitian'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                                        <a target="_blank" title="Penelitian Dinilai"
                                        href="<?= base_url('reviewer/penilaian-penelitian/').$penelitian['id_penelitian'] ?>"
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
<script type="text/javascript">
$(document).ready(function() {


    $(".btn-switch-user").click(function() {
        let id_penelitian = $(this).attr("id")
        let status_penelitian = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Penelitian/switch_access/') ?>",
            type: "GET",
            data: {
                id_penelitian: id_penelitian,
                status_penelitian: status_penelitian
            },
            success: function() {
                document.location.href = "<?= base_url('admin/usulan-penelitian') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>
