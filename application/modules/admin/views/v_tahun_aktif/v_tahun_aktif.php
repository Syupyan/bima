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
                                <th>Tahun Aktif</th>
                                <th>Status Tahun</th>
                                <th>Waktu Jadwal Anggaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($tahun_aktif as $th): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $th['tahun_aktif'] ?></td>
                                <td><?php if ($th['status_aktif'] == "Aktif"): ?>
                                      <center><span class="badge bg-success">Aktif</span>
                                      </center>
                                      <?php elseif($th['status_aktif'] == "Tidak Aktif"): ?>
                                      <center><span class="badge bg-info">Tidak Aktif</span>
                                      </center>
                                      <?php endif ?></td>
                                <td> <?php if($th['status_aktif'] == 'Aktif'){ ?>
                                <?php if($th['tahun_aktif'] == date('Y')){ ?>
                                    <center><a class="btn btn-primary"
                                            href="<?= base_url('admin/anggaran-aktif/').$th['id_thn']; ?>"><i
                                                class="fas fa-fw fa-plus"></i> Aktifkan Usulan</a></center>
                                    <?php } ?>
                                    <?php } ?>
                                </td>
                                <?php if($jumlah_tahun_aktif == 1){ ?>
                                <td>
                                    <?php if ($th['status_aktif']== 'Aktif'){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                    <div class="form-check form-switch fs-6">
                                        <input <?=  $status; ?> type="checkbox" value="<?= $th['status_aktif'] ?>"
                                            class="form-check-input  me-0 
                                        btn-switch-user-1" id="<?= $th['id_thn'] ?>">
                                        <label class="form-check-label" for="<?= $th['id_thn'] ?>"></label>
                                    </div>
                                </td>
                                <?php }else{ ?>
                                <td>
                                    <?php if ($th['status_aktif']== 'Aktif'){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                    <div class="form-check form-switch fs-6">
                                        <input <?=  $status; ?> type="checkbox" value="<?= $th['status_aktif'] ?>"
                                            class="form-check-input  me-0 
                                        btn-switch-user" id="<?= $th['id_thn'] ?>">
                                        <label class="form-check-label" for="<?= $th['id_thn'] ?>"></label>
                                    </div>
                                </td>
                                <?php } ?>
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
        let id_thn = $(this).attr("id")
        let status_aktif = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Tahun_Aktif/switch_access/') ?>",
            type: "GET",
            data: {
                id_thn: id_thn,
                status_aktif: status_aktif
            },
            success: function() {
                document.location.href = "<?= base_url('admin/tahun-aktif') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>
<script type="text/javascript">
$(document).ready(function() {


    $(".btn-switch-user-1").click(function() {
        let id_thn = $(this).attr("id")
        let status_aktif = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Tahun_Aktif/switch_access_1/') ?>",
            type: "GET",
            data: {
                id_thn: id_thn,
                status_aktif: status_aktif
            },
            success: function() {
                document.location.href = "<?= base_url('admin/tahun-aktif') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>