<?php            
                            $cek_user = $this->db->select('*')
													->from('tbl_penelitian')
													->where('id_penelitian', $penelitian)
													->where('nip_nik_ketua', $user_login_data['nip_nik'])
													->get()->row_array();
                   ?>
            <?php if(isset($cek_user)){ ?>
<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dosen/logbook-penelitian/').$penelitian; ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>

                </div>
                <div class="card-body">
                    <form method="POST" class="form" action="<?= base_url('dosen/Penelitian/add_logbook') ?>"
                        data-parsley-validate>
                        <div class="row">
                            <table class='table table-bordered'>
                                <tr>
                                    <input hidden name="id_penelitian" tpe="text" class="form-control"
                                        value="<?= $penelitian ?>" data-parsley-required="true">
                                    <td><label for="Nidn_Nidk">Tanggal</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="tanggal" type="date" class="form-control" placeholder="Tanggal"
                                                id="tanggal" data-parsley-required="true">

                                            <script>
                                            var inputTanggal = document.getElementById('tanggal');
                                            var tanggalSekarang = new Date().toISOString().split('T')[0];
                                            inputTanggal.value = tanggalSekarang;
                                            </script>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="nama">Waktu</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <?php
                                                date_default_timezone_set('Asia/Makassar');
                                                    $waktuSekarang = date('H:i');
                                                ?>
                                            <input name="waktu" type="time" class="form-control" placeholder="Waktu"
                                                id="waktu" data-parsley-required="true"
                                                value="<?php echo $waktuSekarang; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label for="tanggal_lahir">Tempat Kegiatan</label></td>
                                    <td>
                                        <div class="position-relative">
                                            <input name="tempat_kegiatan" type="text" class="form-control"
                                                placeholder="Tempat Kegiatan" id="tanggal_lahir"
                                                data-parsley-required="true">
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