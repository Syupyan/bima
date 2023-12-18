


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
                    <div class="row align-items-center">
            <?php if ($user_login_data['email'] == 'default@email.com') { ?>
                <?php }else{ ?>
                 <?php if($num_penelitian > 0){ ?>
                <?php } else { ?>
                <?php if($num_pengabdian > 0){ ?>
                <?php } else { ?>
                <?php if($num_anggota > 0){ ?>
                <?php } else { ?>
                <?php foreach($tahun_anggaran as $tahun_anggaran){ ?>
                <?php if('Aktif' == $tahun_anggaran['status_aktif']){ ?>
                <?php if($date >= $tahun_anggaran['waktu_anggaran_mulai']){ ?>
                <?php if($date >= $tahun_anggaran['waktu_anggaran_berakhir']){ ?>
                <?php }else{ ?>
                    <div class="col">
                <a class="btn btn-primary" href="<?= base_url('dosen/tambah-pengabdian/1'); ?>"><i
                        class="fas fa-fw fa-plus"></i> Tambah Usulan Pengabdian</a>
                        </div>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <?php } ?>
                <div class="text-end">
                            <span data-bs-toggle="modal" data-bs-target="#inputModal1">
                                <i class="zmdi zmdi-help-outline"></i>
                            </span>
                        </div>
                    </div>
                </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tema Pengabdian</th>
                            <th>Tahun Usulan</th>
                            <th>Peran</th>
                            <th>Status Usulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $no=1; foreach ($pengabdian as $pengabdian): ?>
                        <tr>
                            <th><?= $no++ ?></th>
                            <td><?= $pengabdian['judul'] ?></td>
                            <td><?= $pengabdian['tema_pengabdian'] ?></td>
                            <td><?= $pengabdian['tahun_aktif'] ?></td>
                            <td><?php if ($pengabdian['nip_nik_ketua'] == $user_login_data['nip_nik']): ?>
                                      <center><span class="badge bg-secondary">Ketua</span>
                                      </center>
                                      <?php endif ?></td>
                            <td><?php if ($pengabdian['status_pengabdian'] == 0): ?>
                                      <center><span class="badge bg-warning">Menunggu Anggota Setuju</span>
                                      </center>
                                      <?php endif ?>
                                  </td>
                            <td>


                                <a target="_blank" title="Detail Pengabdian"
                                    href="<?= base_url('dosen/detail-pengabdian/').$pengabdian['id_pengabdian'] ?>"
                                    class="btn btn-warning"><i class="fas fa-fw fa-check"></i></a>
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
                <p class="explanation-text">Email harus diverifikasi terlebih dahulu !.</p>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

