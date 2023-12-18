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
                <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
                    <a class="btn btn-primary" href="<?= base_url('admin/tambah-pengguna'); ?>"><i
                            class="fas fa-fw fa-plus"></i> Tambah Data</a>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable"><i
                                            class="fas fa-fw fa-file-excel"></i> Import Excel
                                    </button>
                <?php } ?>
                <?php } ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profil</th>
                                <th>Nama</th>
                                <th>NIP/NIK</th>
                                <th>NIDN/NIDK</th>
                                <th>Prodi</th>
                                <th>Role Akun</th>
                                <th>Status Aktivasi</th>
                                <th>Status Aktif</th>
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
                                <td><?= $user['nip_nik'] ?></td>
                                <td><?= $user['nidn_nidk'] ?></td>
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
                                <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $user['nip_nik'] ?>"><i
                                            class="fas fa-fw fa-info-circle"></i>
                                    </button>
                                    <a title="Edit Pengguna"
                                        href="<?= base_url('admin/edit-pengguna/').$user['nip_nik'] ?>"
                                        class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                                    <?php
                                    $cek_dosen = $this->db->select('*')
                                    ->from('tbl_anggota')
                                    ->where('tbl_anggota.status_anggota','Disetujui')
                                    ->where('tbl_anggota.nip_nik_anggota',$user['nip_nik'])
                                    ->get()->num_rows();

                                    $cek_dosen_ketua = $this->db->select('*')
                                    ->from('tbl_penelitian')
                                    ->where('nip_nik_ketua',$user['nip_nik'])
                                    ->get()->num_rows();
                                    
                                    ?>
                                    
                                    
                                                    <?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
                                    <?php if($user['role_id'] != 1){ ?>
                                    <?php if($cek_dosen < 1){ ?>
                                    <?php if($cek_dosen_ketua < 1){ ?>
                                    <a title="Hapus Pengguna"
                                        href="<?= base_url('admin/Master_Pengguna/delete_user/').$user['nip_nik'] ?>"
                                        class="btn btn-danger btn-hapus" onclick="return confirm('Yakin ?')"><i
                                            class="fas fa-fw fa-trash"></i></a>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php } ?>
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

    $(".btn-switch-user-aktif").click(function() {
        let nip_nik = $(this).attr("id")
        let pengguna_aktif = $(this).val()
        $.ajax({
            url: "<?= base_url('admin/Master_Pengguna/switch_access_user_aktif/') ?>",
            type: "GET",
            data: {
                nip_nik: nip_nik,
                pengguna_aktif: pengguna_aktif
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

<?php foreach($tahun_aktif as $th){ ?>
                <?php if($th['tahun_aktif']== date('Y')){ ?>
<!--scrolling content Modal -->
<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Import Excel</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Master_Pengguna/import_excel') ?>" data-parsley-validate>
                    <div class="form-group">
                    <p style="color:red;">
                           *Data prodi dan Role di excel bersifat case sensitive, sehingga harus sesuai penulisan seperti tabel berikut.
                        </p>
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Prodi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($prodi as $prodi): ?>
                            <tr>
                                <td><?= $prodi['nama_prodi'] ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                    <table class="table table-bordered" id="table1">
                        <thead>
                            <tr>
                                <th>Nama Role</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($role as $role): ?>
                            <tr>
                                <td><?= $role['nama_role'] ?></td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                        <p>
                            Silahkan download template xlsx, jika ingin melakukan import data mahasiswa melalui excel.
                        </p>
                        <a href="<?= base_url('asset/file/template/').$setting['template_import_pengguna'] ?>"
                                        class="btn btn-info"><i
                            class="fas fa-fw fa-download"></i> Download</a>
                        <hr>
                    </div>
                    <div class="form-group">
                        <label>Masukkan File Excel</label>
                        <p style="color:red;">
                            ektensi yang di dukung xlx|xlsx.
                        </p>
                        <input type="file" name="file_excel" class="form-control">
                    </div>
                    <?= get_csrf() ?>
                    <div class="modal-footer">
        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
        </div>
        </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php } ?>
<?php } ?>
