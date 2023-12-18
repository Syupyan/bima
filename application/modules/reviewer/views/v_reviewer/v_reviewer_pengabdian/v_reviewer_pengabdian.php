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
                                <td>
                                    <a target="_blank" title="Detail Pengabdian"
                                        href="<?= base_url('reviewer/detail-pengabdian/').$pengabdian['id_pengabdian'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-info-circle"></i></a>
                                        <a target="_blank" title="Penilaian Pengabdian"
                                        href="<?= base_url('reviewer/penilaian-pengabdian/').$pengabdian['id_pengabdian'] ?>"
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
        let id_pengabdian = $(this).attr("id")
        let status_pengabdian = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Pengabdian/switch_access/') ?>",
            type: "GET",
            data: {
                id_pengabdian: id_pengabdian,
                status_pengabdian: status_pengabdian
            },
            success: function() {
                document.location.href = "<?= base_url('admin/usulan-pengabdian') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>
