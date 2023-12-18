<div class="content-wrapper container">

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('reviewer/pengabdian-disahkan'); ?>"><i
                            class="fas fa-fw fa-arrow-left"></i> Kembali</a>
                            <a target="_blank" href="<?= base_url('user/User/download_file/pdf_proyek/').$pengabdian['subtansi_usulan'] ?>" class="btn btn-info">Subtansi Usulan</a> 

                </div>
                <div class="card-body">
                    <form role="form" action="<?= base_url('p3m/Pengabdian/pengabdian_disahkan/') ?>"
                        method="post" data-parsley-validate>
                        <div class="row">
                            <div class="form-group">
                                <table class="table table-bordered" id="table3">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kriteria Penilaian</th>
                                            <th>Bobot</th>
                                            <th>Skor</th>
                                            <th>Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($hasil as $hasil){ ?>
                                        <tr>
                                            <th><?= $no++ ?></th>
                                            <?php
                // Mengambil alamat sesuai dengan indeks
                if( $hasil['bobot'] == 25) {
                    $kriteria = $kriteria1;
                } elseif( $hasil['bobot'] == 20) {
                    $kriteria  = $kriteria2;
                } elseif( $hasil['bobot'] == 25) {
                    $kriteria  = $kriteria3;
                } elseif( $hasil['bobot'] == 15) {
                    $kriteria  = $kriteria4;
                } elseif( $hasil['bobot'] == 15) {
                    $kriteria  = $kriteria5;
                }
            ?>
                                            <td><?= $kriteria['kriteria']; ?></td>
                                            <td><?= $hasil['bobot']; ?>
                                            <td><?= $hasil['skor']; ?>
                                            <td><?= $hasil['nilai']; ?>
                                            </td>
                                        </tr>
                                        <?php } ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>Total</td>
                                            <td></td>
                                            <td>100</td>
                                            <td></td>
                                            <td><?= $total_nilai ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <hr>
                                <p>Keterangan</p>
                                <p>Skor: 1, 2, 3, 5, 6, 7 (1 = buruk, 2 = sangat kurang, 3 = kurang, 5 = cukup, 6 =
                                    baik, 7 = sangat baik)</p>
                                <hr>
                                <div class="form-group">
                                    <label>Komentar Penilaian</label><br>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly
                                        name="komentar_pengabdian"
                                        data-parsley-required="true"><?= $pengabdian['komentar_pengabdian'] ?></textarea>
                                </div>
                            </div>
                            <br>
                            <?= get_csrf() ?>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                    </form>

                                </div>
                            </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

</div>