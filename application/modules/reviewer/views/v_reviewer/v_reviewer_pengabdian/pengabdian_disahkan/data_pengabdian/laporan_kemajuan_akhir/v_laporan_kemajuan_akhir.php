<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('reviewer/data-pengabdian-laporan/').$pengabdian; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
    </div>
    <div class="page-content">

        <!-- Main content -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                <label for=""><Strong>Upload Laporan Kemajuan Akhir</Strong></label><br><br>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama File</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; 
                        foreach ($lp_upload as $lp): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <td><?= $lp['nama_file_laporan_kemajuan_akhir'] ?></td>
                                <td><a href="<?= base_url('user/User/download_file/laporan_kemajuan_akhir/').$lp['url_file_laporan_kemajuan_akhir'] ?>"
                                                class="btn btn-info"><i class="fas fa-fw fa-download"></i> Download</a>
                                        </td>
                            </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
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
                                <th>Nama Luaran Wajib</th>
                                <th>Nama Luaran Tambahan</th>
                                <th>Dokumen</th>
                                <th>Deskripsi</th>
                                <th>Status LP</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no=1; 
                        foreach ($lp_kemajuan as $lp): ?>
                            <tr>
                                <th><?= $no++ ?></th>
                                <?php            
                            $luaran_tambahan = $this->db->select('*')
													->from('tbl_luaran_usulan')
													->where('id_luaran', $lp['luaran_tambahan_id'])
														->get()->row_array();
                             $luaran_wajib = $this->db->select('*')
													->from('tbl_luaran_usulan')
													->where('id_luaran', $lp['luaran_wajib_id'])
													->get()->row_array();
                            ?>
                                <?php if(isset($luaran_tambahan)){ ?>
                                <td>-</td>
                                <td><?= $luaran_tambahan['nama_luaran_tambahan'] ?></td>
                                <?php }elseif(isset($luaran_wajib)){ ?>
                                <td><?= $luaran_wajib['nama_luaran_wajib'] ?></td>
                                <td>-</td>
                                <?php }else{ ?>
                                <td></td>
                                <?php } ?>
                                <td>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#exampleModalScrollable<?= $lp['id_luaran_hasil'] ?>"><i
                                            class="fas fa-fw fa-info"></i> Info Dokumen
                                    </button>
                                </td>
                                <td><?= $lp['deskripsi'] ?></td>
                                <td>
                                    <?php if ($lp['status_lp_kemajuan_akhir']=='Sudah Sesuai'){
                        $status="checked=checked";
                      }else{
                        $status="";
                      }
                    ?>
                                    <div class="form-check form-switch fs-6">
                                        <input <?=  $status; ?> type="checkbox" value="<?= $lp['status_lp_kemajuan_akhir'] ?>"
                                            class="form-check-input  me-0 btn-lp-kemajuan" id="<?= $lp['id_lp_kemajuan'] ?>">
                                        <label class="form-check-label" for="<?=$lp['id_lp_kemajuan'] ?>"></label>
                                    </div>
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
 <!--scrolling content Modal -->
<?php $modalIndex = 3; ?>
<?php foreach ($lp_kemajuan as $lp): ?>
<div class="modal fade" id="exampleModalScrollable<?= $lp['id_luaran_hasil'] ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Info Dokumen</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" class="form" enctype="multipart/form-data"
                    action="<?= base_url('admin/Master_Mahasiswa/import_excel') ?>" data-parsley-validate>
                    <div class="form-group">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table<?= $modalIndex ?>">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Download File</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $lp_dokku = $this->db->select('*')
                                        ->from('tbl_dok_lp_kemajuan_akhir')
                                        ->where('tbl_dok_lp_kemajuan_akhir.luaran_hasil_id',$lp['id_luaran_hasil'])
                                        ->get()->result_array();
                                    
                                    foreach($lp_dokku as $kl){ ?>
                                    <tr>
                                        <td><?= $kl['nama_file'] ?></td>
                                        <td><a href="<?= base_url('user/User/download_file/laporan_kemajuan_akhir/').$kl['url_file'] ?>"
                                                class="btn btn-info"><i class="fas fa-fw fa-download"></i> Download</a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php if($lp['url_dok']  != ''): ?>
                        <div class="form-group">
                            <label>Url Dokumen</label>
                            <input readonly type="url" value="<?= $lp['url_dok'] ?>" name="file_excel"
                                class="form-control">
                        </div>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<?php $modalIndex++; ?>
<?php endforeach; ?>
</div>

<script type="text/javascript">
$(document).ready(function() {


    $(".btn-lp-kemajuan").click(function() {
        let id_lp_kemajuan = $(this).attr("id")
        let status_lp_kemajuan_akhir = $(this).val()
        $.ajax({
            url: "<?= base_url('reviewer/Data_Reviewer/status_lp_kemajuan_akhir/') ?>",
            type: "GET",
            data: {
                id_lp_kemajuan: id_lp_kemajuan,
                status_lp_kemajuan_akhir: status_lp_kemajuan_akhir
            },
            success: function() {
                document.location.href = "<?= base_url('reviewer/data-laporan-kemajuan-akhir-pengabdian/').$pengabdian ?>";
            },
            error: function() {
                alert('ubah akses gagal')
            },
        })
    });

});
</script>
