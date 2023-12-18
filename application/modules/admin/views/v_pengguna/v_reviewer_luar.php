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
                    <a class="btn btn-primary" href="<?= base_url('admin/tambah-pengguna-luar'); ?>"><i
                            class="fas fa-fw fa-plus"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>Nama</th>
                                <th>NIP/NIK</th>
                                <th>NIDN</th>
                                <th>Role Akun</th>
                                <th>Status Aktivasi</th>
                                <th>Status Aktif</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($reviewer as $user): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><img src="<?= base_url('asset/img/profile/').$user['foto_profil'] ?>" width="40">
                                </td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['nip_nik'] ?></td>
                                <td><?= $user['nidn'] ?></td>
                                <td><?php if ($user['role_id'] == 1): ?>
                                      <center><span class="badge bg-success">Admin</span>
                                      </center>
                                      <?php elseif($user['role_id'] == 2): ?>
                                      <center><span class="badge bg-info">Dosen</span>
                                      </center>
                                      <?php elseif($user['role_id'] == 3): ?>
                                      <center><span class="badge bg-warning">Reviewer</span>
                                      </center>
                                      <?php elseif($user['role_id'] == 4): ?>
                                      <center><span class="badge bg-primary">Kepala P3M</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                                <td>
                                    <?php if ($user['pengguna_status']==1){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                    <div class="form-check form-switch fs-6">
                                        <input <?=  $status; ?> type="checkbox" value="<?= $user['pengguna_status'] ?>"
                                            class="form-check-input  me-0 btn-switch-user" id="<?= $user['nip_nik'] ?>">
                                        <label class="form-check-label" for="<?= $user['nip_nik'] ?>"></label>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($user['pengguna_aktif']==1){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                    <div class="form-check form-switch fs-6">
                                        <input <?=  $status; ?> type="checkbox" value="<?= $user['pengguna_aktif'] ?>"
                                            class="form-check-input  me-0 btn-switch-user-aktif" id="<?= $user['nip_nik'] ?>">
                                        <label class="form-check-label" for="<?= $user['nip_nik'] ?>"></label>
                                    </div>
                                </td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <a title="Edit Pengguna"
                                        href="<?= base_url('admin/edit-pengguna-luar/').$user['nip_nik'] ?>"
                                        class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    
                                    <a title="Hapus Pengguna"
                                        href="<?= base_url('admin/Master_Pengguna/delete_user_luar/').$user['nip_nik'] ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
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
        let nip_nik = $(this).attr("id")
        let pengguna_status = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Master_Pengguna/switch_access_user_luar/') ?>",
            type: "GET",
            data: {
                nip_nik: nip_nik,
                pengguna_status: pengguna_status
            },
            success: function() {
                document.location.href = "<?= base_url('admin/master-pengguna-luar') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

    $(".btn-switch-user-aktif").click(function() {
        let nip_nik = $(this).attr("id")
        let pengguna_aktif = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Master_Pengguna/switch_access_user_aktif_luar/') ?>",
            type: "GET",
            data: {
                nip_nik: nip_nik,
                pengguna_aktif: pengguna_aktif
            },
            success: function() {
                document.location.href = "<?= base_url('admin/master-pengguna-luar') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>
