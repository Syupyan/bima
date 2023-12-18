            <footer>
                <div class="container">
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-start">
                            <p>
                                <script>
                                document.write(new Date().getFullYear());
                                </script> &copy; <?= $setting['title_footer'] ?>
                            </p>
                        </div>
                        <div class="float-end">
                            <!-- <p>Dibangun dengan penuh <span class="text-danger"><i class="bi bi-heart"></i></span> </a>
                            </p> -->
                        </div>
                    </div>
                </div>
            </footer>
            </div>
            </div>
            <script src="assets/js/pages/horizontal-layout.js"></script>

            <!-- file multiple mahasiswa  -->
            <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
            <script src="<?= base_url() ?>assets/js/app.js"></script>

            <!-- Need: Apexcharts -->
            <script src="<?= base_url() ?>assets/extensions/apexcharts/apexcharts.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/dashboard.js"></script>


            <!-- <script src="<?= base_url() ?>assets/extensions/jquery/jquery.min.js"></script> -->
            <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/datatables.js"></script>
            <script src="<?= base_url() ?>assets/extensions/parsleyjs/parsley.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/parsley.js"></script>
            <script src="assets/extensions/toastify-js/src/toastify.js"></script>
            <script src="assets/js/pages/toastify.js"></script>
            <script src="<?= base_url() ?>asset/vendor/AdminLTE-3.0.1/plugins/toastr/toastr.min.js"></script>
            <script src="<?= base_url() ?>assets/extensions/filepond/filepond.js"></script>
            <script src="<?= base_url() ?>assets/extensions/toastify-js/src/toastify.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/filepond.js"></script>
            <script src="<?= base_url() ?>assets/extensions/tinymce/tinymce.min.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/tinymce.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/jquery.backstretch.min.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/retina-1.1.0.min.js"></script>
            <script src="<?= base_url() ?>assets/wizard/assets/js/scripts.js"></script>
            <script src="<?= base_url() ?>assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
            <script src="<?= base_url() ?>assets/js/pages/form-element-select.js"></script>
            <script type="text/javascript">
$(document).ready(function() {
    $(".loadding-page").fadeOut(200);
});
            </script>
            <script>
$(function() {
    $("#table2").DataTable();
    $("#table3").DataTable();
    $("#table4").DataTable();
    $("#table5").DataTable();
    $("#table6").DataTable();
});
            </script>
            <!-- toast flashdata -->
            <?php if ($this->session->flashdata('success')): ?>
            <div class="success-message"><?= $this->session->flashdata('success') ?></div>
            <script type="text/javascript">
toastr.success($(".success-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('info')): ?>
            <div class="info-message"><?= $this->session->flashdata('info') ?></div>
            <script type="text/javascript">
toastr.info($(".info-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('warning')): ?>
            <div class="warning-message"><?= $this->session->flashdata('warning') ?></div>
            <script type="text/javascript">
toastr.warning($(".warning-message"))
            </script>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
            <div class="error-message"><?= $this->session->flashdata('error') ?></div>
            <script type="text/javascript">
toastr.error($(".error-message"))
            </script>
            <?php endif; ?>

            </body>

            </html>
            <script type="text/javascript">
$(window).on('load', function() {
    var delayMs = 0; // delay in milliseconds
    $('#MymodalPreventScript').modal({
        backdrop: 'static',
        keyboard: false
    });
    setTimeout(function() {
        $('#MymodalPreventScript').modal('show');
    }, delayMs);
});
            </script>
            <?php if($user_login_data['pengguna_status'] == 0){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Aktivasi akun</h4>
                        </div>
                        <div class="modal-body">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped active" role="progressbar"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <form method="POST" class="form" action="<?= base_url('user/User/aktivasi_user') ?>"
                                id="regiration_form" data-parsley-validate>
                                <fieldset>
                                    <h2>Peraturan aktivasi Akun</h2>
                                    <div class="form-group">
                                        <ol>
                                            <li> Data harus diisi secara lengkap agar bisa ke langkah selanjutnya,
                                                terutama bertanda <a style="color:red;">*</a>.</li>
                                            <li> Jika tidak memiliki <a style="color:red;">NIDN/NIDK</a>, Maka
                                                Diperbolehkan untuk dilewati saja atau tidak Diisi.</li>
                                            <li> Jika tidak memiliki <a style="color:red;">NIDN/NIDK</a>, Maka Fitur
                                                Penelitian dan Pengabdian tida tampil.</li>
                                            <li> Jika tidak memiliki <a style="color:red;">NIDN/NIDK</a>, Maka hanya
                                                bisa menjadi anggota Penelitian maupun Pengabdian yang didaftarkan oleh
                                                Ketua.</li>
                                            <li><a style="color:red;">NIP/NIK</a> Secara Default didaftarkan oleh admin
                                                sehingga tidak perlu diisi, apabila ada kesalahan dalam Data, Silahkan
                                                hubungi admin untuk perubahan.</li>
                                        </ol>
                                    </div>
                                    <input type="button" name="password" class="next btn btn-info"
                                        value="Selanjutnya" />
                                </fieldset>
                                <fieldset>
                                    <input type="hidden" class="form-control" readonly=""
                                        value="<?= $user_login_data['nip_nik'] ?>" name="id"></input>
                                    <input type="hidden" class="form-control" readonly=""
                                        value="<?= $user_login_data['nidn_nidk'] ?>" name="oldnidn"></input>
                                    <h2>Lengkapi Data Diri</h2>
                                    <div class="form-group">
                                        <label for="email">Nama<a style="color:red;">*</a></label>
                                        <input type="" class="form-control" value="<?= $user_login_data['nama'] ?>" name="nama"
                                            data-parsley-required="true"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="nip_nik">Jenis Kelamin<a style="color:red;">*</a></label>
                                        <select name="jk" class="form-select" data-parsley-required="true">
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <input type="button" name="password" class="next btn btn-info"
                                        value="Selanjutnya" />
                                </fieldset>
                                <fieldset>
                                    <h2>Lengkapi Data Diri</h2>
                                    <div class="form-group">
                                        <label for="email">NIP/NIK</label>
                                        <input readonly required="n" type="" class="form-control"
                                            value="<?= $user_login_data['nip_nik'] ?>"
                                            data-parsley-required="true"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">NIDN/NIDK<a style="color:red;">(optional)</a></label>
                                        <input type="number" class="form-control" name="newnidn"></input>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-danger"
                                        value="Kembali" />
                                    <input type="button" name="password" class="next btn btn-info"
                                        value="Selanjutnya" />
                                </fieldset>
                                <fieldset>
                                    <h2>Lengkapi Data Diri</h2>
                                    <div class="form-group">
                                        <label for="fName">Alamat<a style="color:red;">*</a></label>
                                        <textarea required="" type="text" class="form-control" name="alamat"
                                            data-parsley-required="true"></textarea>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-danger"
                                        value="Kembali" />
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </fieldset>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <?php } ?>
            <script type="text/javascript">
$(document).ready(function() {
    var current = 1,
        current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function() {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});
            </script>
            <style type="text/css">
#regiration_form fieldset:not(:first-of-type) {
    display: none;
}
            </style>
            <?php if ($user_login_data['role_id'] == 2) { ?>

            <?php
                                    		$nk_penelitian	= $this->db->select('*')
                                            ->from('tbl_penelitian')
                                            ->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_penelitian.nip_nik_ketua')
                                            ->where('tbl_penelitian.nip_nik_ketua', $user_login_data['nip_nik'])
                                            ->get()->result_array();
                                    ?>
            <?php foreach($nk_penelitian as $nk_penelitian){ ?>
            <?php if($nk_penelitian['status_pesan'] == 1){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Informasi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form" action="<?= base_url('user/User/status_pesan') ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                            <p>Selamat Penelitian Anda Telah Disahkan.</p>
                                            <input hidden type="text" name="nip_nik"
                                                value="<?= $user_login_data['nip_nik'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Baik</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif($nk_penelitian['status_pesan'] == 2){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Informasi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form" action="<?= base_url('user/User/status_pesan') ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <i class="fas fa-x fa-4x mb-3 animated rotateIn"></i>
                                            <p>Maaf Penelitian Anda Telah Ditolak.</p>
                                            <input hidden type="text" name="nip_nik"
                                                value="<?= $user_login_data['nip_nik'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Baik</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <?php } ?>
            <?php } ?>
            <?php
                                    		$nk_pengabdian	= $this->db->select('*')
                                            ->from('tbl_pengabdian')
                                            ->join('tbl_pengguna', 'tbl_pengguna.nip_nik = tbl_pengabdian.nip_nik_ketua')
                                            ->where('tbl_pengabdian.nip_nik_ketua', $user_login_data['nip_nik'])
                                            ->get()->result_array();
                                    ?>
            <?php foreach($nk_pengabdian as $nk_pengabdian){ ?>

            <?php if($nk_pengabdian['status_pesan'] == 1){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Informasi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form" action="<?= base_url('user/User/status_pesan') ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                            <p>Selamat Pengabdian Anda Telah Disahkan.</p>
                                            <input hidden type="text" name="nip_nik"
                                                value="<?= $user_login_data['nip_nik'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Baik</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }elseif($nk_pengabdian['status_pesan'] == 2){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Informasi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form" action="<?= base_url('user/User/status_pesan') ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <i class="fas fa-x fa-4x mb-3 animated rotateIn"></i>
                                            <p>Maaf Pengabdian Anda Telah Ditolak.</p>
                                            <input hidden type="text" name="nip_nik"
                                                value="<?= $user_login_data['nip_nik'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Baik</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <?php } ?>
            <?php } ?>
            <?php
                                    		$nk_anggota	= $this->db->select('*')
                                            ->from('tbl_anggota')
                                            ->where('tbl_anggota.nip_nik_anggota', $user_login_data['nip_nik'])
                                            ->get()->result_array();
                                    ?>
            <?php foreach($nk_anggota as $nk_anggota){ ?>

            <?php if($nk_anggota['status_pesan'] == 1){ ?>
            <div class="modal fade text-left" id="MymodalPreventScript" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel4" data-bs-backdrop="false" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel4">Informasi</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" class="form" action="<?= base_url('user/User/status_pesan_anggota') ?>">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="text-center">
                                            <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                                            <p>Selamat Penelitian Anda Telah Disahkan.</p>
                                            <input hidden type="text" name="nip_nik"
                                                value="<?= $user_login_data['nip_nik'] ?>">
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Baik</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }else{ ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>

            </body>

            </html>