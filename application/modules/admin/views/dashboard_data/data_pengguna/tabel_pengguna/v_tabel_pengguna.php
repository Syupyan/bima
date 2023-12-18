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
                <a class="btn btn-danger" href="<?= base_url('admin/data-pengguna'); ?>"><i class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Role Akun</th>
                                <th>Status Akun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; foreach ($pengguna as $user): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><img src="<?= base_url('asset/img/profile/').$user['foto_profil'] ?>" width="40">
                                </td>
                                <td><?= $user['nama'] ?></td>
                                <td><?= $user['nama_prodi'] ?></td>
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
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $user['nip_nik'] ?>"><i
                                            class="fas fa-fw fa-info-circle"></i>
                                    </button>
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
            url: "<?= base_url('admin/Master_Pengguna/switch_access_user/') ?>",
            type: "GET",
            data: {
                nip_nik: nip_nik,
                pengguna_status: pengguna_status
            },
            success: function() {
                document.location.href = "<?= base_url('admin/master-pengguna') ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>


<!--scrolling content Modal -->
<?php foreach($pengguna as $pengguna){ ?>
<div class="modal fade" id="exampleModalScrollable<?= $pengguna['nip_nik'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Detail Pengguna</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                <label>Nama: </label>
                    <input readonly type="text" value="<?= $pengguna['nama'] ?>" placeholder="Judul"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Email: </label>
                    <input readonly type="text" value="<?= $pengguna['email'] ?>" placeholder="TKT Awal"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Nip/Nik: </label>
                    <input readonly type="text" value="<?= $pengguna['nip_nik'] ?>" placeholder="TKT Akhir"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Nidn/Nidk: </label>
                    <input readonly type="text" value="<?= $pengguna['nidn_nidk'] ?>" placeholder="TKT Akhir"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Jenis Kelamin: </label>
                    <input readonly type="text" value="<?= $pengguna['jk'] ?>" placeholder="TKT Akhir"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Nama Prodi: </label>
                    <input readonly type="text" value="<?= $pengguna['nama_prodi'] ?>" placeholder="Nama Ketua"
                        class="form-control">
                </div>
                <div class="form-group">
                <label>Role Akun: </label>
               <?php if ($pengguna['role_id'] == 1): ?>
                <input readonly type="text" value="Admin" placeholder="Nama Ketua"
                        class="form-control">
                                      <?php elseif($pengguna['role_id'] == 2): ?>
                                        <input readonly type="text" value="Dosen" placeholder="Nama Ketua"
                        class="form-control">
                                      <?php elseif($pengguna['role_id'] == 3): ?>
                                        <input readonly type="text" value="Reviewer" placeholder="Nama Ketua"
                        class="form-control">
                                      <?php endif ?>
                </div>
                <label>Alamat: </label>
                <div class="form-group">
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3" name="tugas_ketua"
                        data-parsley-required="true"><?= $pengguna['alamat'] ?></textarea>
                </div>

            </div>
        </div>
        <div class="modal-footer">
        </div>
        </form>
    </div>
</div>
</div>
<?php } ?>
