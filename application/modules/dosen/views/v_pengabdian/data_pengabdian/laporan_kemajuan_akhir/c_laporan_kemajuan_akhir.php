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
                                                    ->where('nama_file_laporan_kemajuan !=', "Tidak Ada")
													->where('url_file_laporan_kemajuan !=', "Tidak Ada")
														->get()->row_array();
                   ?>
            <?php if(isset($cek_upload)){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger"
                        href="<?= base_url('dosen/data-laporan-kemajuan-akhir-pengabdian/').$pengabdian; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" class="form" enctype="multipart/form-data"
                        action="<?= base_url('dosen/Pengabdian/add_laporan_kemajuan_akhir') ?>" data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <input hidden name="id_pengabdian" tpe="text" class="form-control"
                                    value="<?= $pengabdian ?>" data-parsley-required="true">
                                <tr>
                                    <td width="190" class="text-bold">Luaran</td>
                                    <td>
                                        <div class="input-group">
                                         <?php
                                                $luaran_terpilih = $this->db->select('luaran_hasil_id')
                                                    ->from('tbl_laporan_kemajuan_akhir')
                                    		        ->join('tbl_luaran_hasil', 'tbl_laporan_kemajuan_akhir.luaran_hasil_id = tbl_luaran_hasil.id_luaran_hasil')
                                                    ->where('tbl_luaran_hasil.pengabdian_id',$pengabdian)
                                                    ->get()->result_array();
                                                $nilai = array();
                                                foreach($luaran_terpilih as $ter){
                                                   $nilai[] = $ter['luaran_hasil_id'];
                                               }
                                                ?>
                                            <select name="luaran_hasil_id" class="form-select" id="inputGroupSelect02"
                                                data-parsley-required="true">
                                                <option selected value="">--- Pilih Luaran ---</option>
                                                <optgroup label="Wajib">
                                                    <?php foreach ($luaran_usulan as $luaran) { ?>
                                                    <option value="<?php echo $luaran['id_luaran_hasil']; ?>"
                                                        <?php if (in_array($luaran['id_luaran_hasil'], $nilai)) echo 'hidden'; ?>>
                                                        <?php echo $luaran['nama_luaran_wajib']; ?>
                                                    </option>
                                                    <?php } ?>

                                                </optgroup>
                                                <optgroup label="Tambahan">
                                                    <?php foreach ($luaran_usulan_tambahan as $luaran) { ?>
                                                    <option value="<?php echo $luaran['id_luaran_hasil']; ?>"
                                                        <?php if (in_array($luaran['id_luaran_hasil'], $nilai)) echo 'hidden'; ?>>
                                                        <?php echo $luaran['nama_luaran_tambahan']; ?>
                                                    </option>
                                                    <?php } ?>
                                                </optgroup>
                                            </select>
                                            <label class="input-group-text" for="inputGroupSelect02">Pilihan</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tanggal_lahir">Dokumen</label><small class="text-muted">( *Pdf, Xlx, Xlsx, Doc, Docx )</small></td>
                                    <td>
                                        <div class='file_container'>
                                            <div class="input-group">
                                                <input type='file' name='files[]' class="form-control file-input"
                                                    multiple />
                                                <span class="input-group-btn">
                                                    <button type='button' class='delete_ btn btn-danger'
                                                        title='Delete file'>
                                                        <span class='glyphicon glyphicon-remove'></span> Delete file
                                                    </button>
                                                </span>
                                            </div>
                                            <br>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-success add" type="button" title='Add new file'>
                                                <span class='glyphicon glyphicon-plus'></span> Tambah input upload
                                            </button>
                                        </div>
                                    </td>
                                </tr>


                                <tr>
                                    <td><label for="tanggal_lahir">Url</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="url_dok" type="url" class="form-control" placeholder="Url"
                                                id="tanggal_lahir">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tanggal_lahir">Deskripsi</label></td>
                                    <td>
                                        <div class="position-relative">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="deskripsiku" data-parsley-required="true"></textarea>
                                        </div>
                                    </td>
                                </tr>

                        </div>
                        </table>

                        <br>
                        <?= get_csrf() ?>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>
<?php } ?>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#btn_submit').click(function() {
        var file_val = $('.file-input').val();
        if (file_val == "") {
            alert("Please select file(s).");
            return false;
        }
    });
    $(".add").click(function() {
        $(".file_container").append(`
            <div class="input-group file">
                <input type='file' name='files[]' class='form-control file-input' multiple />
                <span class="input-group-btn">
                    <button type='button' class='delete_ btn btn-danger' title='Delete file'>
                        <span class='glyphicon glyphicon-remove'></span> Delete file
                    </button>
                </span>
            </div>
            <br>
        `);
    });
    $('.file_container').on('click', '.delete_', function() {
        $(this).closest('.file').next('br').remove();
        $(this).closest('.file').remove();
    });
});
</script>