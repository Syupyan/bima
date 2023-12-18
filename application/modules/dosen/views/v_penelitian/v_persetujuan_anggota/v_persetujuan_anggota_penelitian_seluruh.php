<div class="content-wrapper container">
    <div class="page-heading">
        <h3 class="mb-4"><?= $title ?></h3>
    </div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-danger" href="<?= base_url('dashboard'); ?>">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered" id="table5">
                        <thead>
                            <tr>
                                <th style="width: 30%;">Nama</th>
                                <th>Judul</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_unread_pesan_penelitian as $unread_pesan): ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('dosen/persetujuan-anggota-penelitian/').$unread_pesan['id_penelitian'] ?>">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-lg">
                                                <img src="<?= base_url('asset/img/profile/').$ketua_penelitian["foto_profil"] ?>"
                                                    alt="Foto Profil">
                                            </div>
                                            <div class="ms-4">
                                                <h6 class="mb-1"><?= $ketua_penelitian["nama"] ?></h6>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a style="color: black;" href="<?= base_url('dosen/persetujuan-anggota-penelitian/').$unread_pesan['id_penelitian'] ?>">
                                        <?= strlen($unread_pesan['judul']) > 100 ? substr($unread_pesan['judul'],0,100) . '...' : $unread_pesan['judul'] ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>

                            <?php foreach ($all_unread_pesan_pengabdian as $unread_pesan): ?>
                            <tr>
                                <td>
                                    <a href="<?= base_url('dosen/persetujuan-anggota-pengabdian/').$unread_pesan['id_pengabdian'] ?>">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-lg">
                                                <img src="<?= base_url('asset/img/profile/').$ketua_pengabdian["foto_profil"] ?>"
                                                    alt="Foto Profil">
                                            </div>
                                            <div class="ms-4">
                                                <h6 class="mb-1"><?= $ketua_pengabdian["nama"] ?></h6>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    <a style="color: black;" href="<?= base_url('dosen/persetujuan-anggota-pengabdian/').$unread_pesan['id_pengabdian'] ?>">
                                        <?= strlen($unread_pesan['judul']) > 100 ? substr($unread_pesan['judul'],0,100) . '...' : $unread_pesan['judul'] ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
