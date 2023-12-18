<div class="content-wrapper container">
    <div class="page-heading">
        <h3><?= $title ?></h3>
        <a class="btn btn-danger" href="<?= base_url('admin/tahun-aktif'); ?>"><i class="fas fa-fw fa-arrow-left"></i>
            Kembali</a>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-15">
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="mb-0">Tambah Jadwal</h4>
                                    </div>
                                    <div class="col-auto">
                                        <span data-bs-toggle="modal" data-bs-target="#inputModal1">
                                            <i class="zmdi zmdi-help-outline"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <form method="POST" class="form"
                                    action="<?= base_url('admin/Anggaran_Aktif/add_waktu') ?>" data-parsley-validate>
                                    <table class='table table-bordered'>
                                        <input value="<?= $id; ?>" name="id" hidden class="form-control datetimepicker"
                                            placeholder="Title Header" data-parsley-required="true">
                                        <tr>
                                            <td><label>Waktu Mulai</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="waktu_mulai" type="time"
                                                        class="form-control datetimepicker" placeholder="Title Header"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Tanggal Mulai</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="tanggal_mulai" type="date" class="form-control"
                                                        placeholder="Title Footer" id="tanggal_lahir"
                                                        data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Waktu Berakhir</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="waktu_berakhir" type="time"
                                                        class="form-control datetimepicker" placeholder="Title Header"
                                                        id="tanggal_lahir" data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><label>Tanggal Berakhir</label></td>
                                            <td>
                                                <div class="position-relative">
                                                    <input name="tanggal_berakhir" type="date" class="form-control"
                                                        placeholder="Title Footer" id="tanggal_lahir"
                                                        data-parsley-required="true">
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <?php if($batas_anggaran >= 1){ ?>
                                            <?php }else{ ?>
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Data Jadwal</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Waktu dan Tanggal Mulai</th>
                                            <th>Waktu dan Tanggal Berakhir</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach ($tahun_anggaran as $pr): ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <td><?= $pr['waktu_anggaran_mulai'] ?></td>
                                            <td><?= $pr['waktu_anggaran_berakhir'] ?></td>
                                            <td><a title="Hapus Pengguna"
                                                    href="<?= base_url('admin/Anggaran_Aktif/delete_waktu/').$pr['id_anggaran'] ?>"
                                                    class="btn btn-danger btn-hapus"
                                                    onclick="return confirm('Yakin ?')"><i
                                                        class="fas fa-fw fa-trash"></i></a></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
$(document).ready(function() {
    $('.datetimepicker').datetimepicker({
        dateFormat: 'yy-mm-dd',
        timeFormat: 'HH:mm:ss'
    });
});
</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!--scrolling content Modal -->
<!-- Modal -->
<div class="modal fade" id="inputModal1" tabindex="-1" role="dialog" aria-labelledby="inputModal1Label"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="inputModal1Label">Penjelasan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                </div>
                <p class="explanation-text">Waktu dan tanggal mulai harus lebih dari tanggal dan waktu sekarang !.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>