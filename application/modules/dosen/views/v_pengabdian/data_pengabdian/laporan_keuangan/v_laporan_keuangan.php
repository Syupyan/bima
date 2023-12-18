<?php            
                            $cek_user = $this->db->select('*')
													->from('tbl_pengabdian')
													->where('id_pengabdian', $pengabdian)
													->where('nip_nik_ketua', $user_login_data['nip_nik'])
													->get()->row_array();
                   ?>
            <?php if(isset($cek_user)){ ?>
<?php            
                            $cek_upload = $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('pengabdian_id', $pengabdian)
                                                    ->where('nama_file_laporan_kemajuan_akhir !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan_akhir !=', "Tidak Ada")
														->get()->row_array();
                   ?>
            <?php if(isset($cek_upload)){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('dosen/data-pengabdian-laporan/').$pengabdian; ?>"><i
                class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">

        <!-- Main content -->
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <label for=""><Strong>Upload Laporan Keuangan</Strong><small>(xls, xlsx, Doc, Docx)</small></label><br><br>

                    <?php            
                            $cek_upload = $this->db->select('*')
													->from('tbl_upload_laporan')
													->where('pengabdian_id', $pengabdian)
                                                    ->where('nama_file_laporan_keuangan !=', "Tidak Ada")
													->where('url_file_laporan_keuangan !=', "Tidak Ada")
													->get()->row_array();
                   ?>
                    <?php if(!isset($cek_upload)): ?>
                    <form method="POST" class="form" enctype="multipart/form-data"
                        action="<?= base_url('dosen/Pengabdian/upload_laporan_keuangan') ?>"
                        data-parsley-validate>
                        <div class="col-md-4">
                            <div class="input-group">
                                <input type="text" name="pengabdian" value="<?= $pengabdian ?>" hidden>
                                <input type="file" class="form-control" name="url" placeholder="Input laporan">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Download</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; 
                        foreach ($lp_upload as $lp): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $lp['nama_file_laporan_keuangan'] ?></td>
                                <td><a href="<?= base_url('user/User/download_file/keuangan/').$lp['url_file_laporan_keuangan'] ?>"
                                        class="btn btn-info"><i class="fas fa-fw fa-download"></i> Download</a>
                                </td>
                                <td>
                                    <a title="Hapus lp upload"
                                        href="<?= base_url('dosen/Pengabdian/delete_up_lp_keuangan/').$lp['id_up_laporan'] ?>"
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
        <!-- Basic Tables start -->
        
        <!-- Basic Tables end -->
        <!-- /.content -->
    </div>
</div>
<?php } ?>
<?php } ?>