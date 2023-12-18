<div class="loadding-page">
    <div class="cssload-box-loading"></div>
</div>
<div id="app">
    <div id="main" class="layout-horizontal">
        <header class="mb-5">
            <div class="header-top">
                <div class="container">
                    <div class="logo">
                        <h4 href="index.html"><?= $setting['title_header'] ?></h4>

                    </div>

                    <div class="header-top-right">
                        <?php if ($user_login_data['email'] != 'default@email.com') { ?>
                        <?php if ($user_login_data['role_id'] == 2) { ?>
                        <div class="nav-item dropdown me-3">
                            <a class="nav-link active text-gray-600" data-bs-toggle="dropdown" data-bs-display="static"
                                aria-expanded="false">
                                <?php
                                $count_unread_pesan = $count_unread_pesan_penelitian + $count_unread_pesan_pengabdian;
                                $count_unread_pesan_disetujui = $count_unread_pesan_penelitian_disetujui + $count_unread_pesan_pengabdian_disetujui;
                                ?>

                                <?php if ($count_unread_pesan_disetujui == 1): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span class="badge bg-transparent">0</span>
                                </button>
                                <?php elseif ($count_unread_pesan): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope fa-beat'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php else: ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php endif ?>
                            </a>
                            <?php if ($count_unread_pesan_disetujui == 1): ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <hr>
                                <li>
                                </li>
                            </ul>
                            <?php else: ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_penelitian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-penelitian/').$unread_pesan['id_penelitian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_penelitian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_penelitian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_pengabdian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-pengabdian/').$unread_pesan['id_pengabdian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_pengabdian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_pengabdian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <hr>
                                <li>
                                    <a href="<?= base_url('dosen/persetujuan-anggota-seluruh') ?>"
                                        class="dropdown-item text-center">
                                        Lihat semua pesan <strong>(<?= $count_unread_pesan; ?>)</strong>
                                    </a>

                                </li>
                            </ul>
                            <?php endif ?>
                        </div>
                        <?php } ?>
                        <?php if ($user_login_data['role_id'] == 4) { ?>
                        <?php
                        $uri = $this->uri->segment(2);
                        $uri1 = $this->uri->segment(1);
                        ?>
                        <?php if ($uri == 'dosen') { ?>
                            <div class="nav-item dropdown me-3">
                            <a class="nav-link active text-gray-600" data-bs-toggle="dropdown" data-bs-display="static"
                                aria-expanded="false">
                                <?php
                                $count_unread_pesan = $count_unread_pesan_penelitian + $count_unread_pesan_pengabdian;
                                $count_unread_pesan_disetujui = $count_unread_pesan_penelitian_disetujui + $count_unread_pesan_pengabdian_disetujui;
                                ?>

                                <?php if ($count_unread_pesan_disetujui == 1): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span class="badge bg-transparent">0</span>
                                </button>
                                <?php elseif ($count_unread_pesan): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope fa-beat'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php else: ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php endif ?>
                            </a>
                            <?php if ($count_unread_pesan_disetujui == 1): ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <hr>
                                <li>
                                </li>
                            </ul>
                            <?php else: ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_penelitian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-penelitian/').$unread_pesan['id_penelitian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_penelitian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_penelitian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_pengabdian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-pengabdian/').$unread_pesan['id_pengabdian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_pengabdian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_pengabdian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <hr>
                                <li>
                                    <a href="<?= base_url('dosen/persetujuan-anggota-seluruh') ?>"
                                        class="dropdown-item text-center">
                                        Lihat semua pesan <strong>(<?= $count_unread_pesan; ?>)</strong>
                                    </a>

                                </li>
                            </ul>
                            <?php endif ?>
                        </div>
                        <?php }elseif($uri1 == 'dosen'){ ?>
                            <div class="nav-item dropdown me-3">
                            <a class="nav-link active text-gray-600" data-bs-toggle="dropdown" data-bs-display="static"
                                aria-expanded="false">
                                <?php
                                $count_unread_pesan = $count_unread_pesan_penelitian + $count_unread_pesan_pengabdian;
                                $count_unread_pesan_disetujui = $count_unread_pesan_penelitian_disetujui + $count_unread_pesan_pengabdian_disetujui;
                                ?>

                                <?php if ($count_unread_pesan_disetujui == 1): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span class="badge bg-transparent">0</span>
                                </button>
                                <?php elseif ($count_unread_pesan): ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope fa-beat'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php else: ?>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class='fas fa-envelope'></i><span
                                        class="badge bg-transparent"><?= $count_unread_pesan; ?></span>
                                </button>
                                <?php endif ?>
                            </a>
                            <?php if ($count_unread_pesan_disetujui == 1): ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <hr>
                                <li>
                                </li>
                            </ul>
                            <?php else: ?>
                            <ul class="dropdown-menu dropdown-menu-end notification-dropdown"
                                aria-labelledby="dropdownMenuButton">
                                <li class="dropdown-header">
                                    <h6>Notifikasi</h6>
                                </li>
                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_penelitian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-penelitian/').$unread_pesan['id_penelitian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_penelitian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_penelitian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <?php $counter = 0; ?>
                                <?php foreach ($all_unread_pesan_pengabdian as $unread_pesan): ?>
                                <?php if ($counter < 3): ?>
                                <li class="dropdown-item notification-item">
                                    <a class="d-flex align-items-center"
                                        href="<?= base_url('dosen/persetujuan-anggota-pengabdian/').$unread_pesan['id_pengabdian'] ?>">
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="avatar avatar-lg">
                                                <img
                                                    src="<?= base_url('asset/img/profile/').$ketua_pengabdian["foto_profil"] ?>">
                                            </div>
                                            <div class="name ms-4">
                                                <h6 class="mb-1"> <?= $ketua_pengabdian["nama"] ?></h6>
                                                <?php if (strlen($unread_pesan['judul']) > 25): ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0">
                                                    <?= substr($unread_pesan['judul'],0,25) ?>...</h8>
                                                <?php else: ?>
                                                <label for="">Judul:</label>
                                                <h8 class="text-muted mb-0"><?= $unread_pesan['judul'] ?></h8>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php $counter++; ?>
                                <?php else: ?>
                                <?php break; ?>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <hr>
                                <li>
                                    <a href="<?= base_url('dosen/persetujuan-anggota-seluruh') ?>"
                                        class="dropdown-item text-center">
                                        Lihat semua pesan <strong>(<?= $count_unread_pesan; ?>)</strong>
                                    </a>

                                </li>
                            </ul>
                            <?php endif ?>
                        </div>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20"
                                height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                                        opacity=".3"></path>
                                    <g transform="translate(-210 -1)">
                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                        <circle cx="220.5" cy="11.5" r="4"></circle>
                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                        </path>
                                    </g>
                                </g>
                            </svg>
                            <div class="form-check form-switch fs-6">
                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                <label class="form-check-label"></label>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20"
                                preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                </path>
                            </svg>
                        </div>
                        <div>

                        </div>
                        <div class="dropdown">
                            <a id="topbarUserDropdown"
                                class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="avatar avatar-md2">
                                    <img src="<?= base_url('asset/img/profile/').$user_login_data['foto_profil'] ?>"
                                        alt="Avatar">
                                </div>
                                <div class="text">
                                    <h6 class="user-dropdown-name"><?= $user_login_data['nama'] ?></h6>
                                    <?php
                                    		$user	= $this->db->select('*')
                                            ->from('tbl_pengguna')
                                            ->join('tbl_role', 'tbl_pengguna.role_id = tbl_role.id_role')
                                            ->where('tbl_pengguna.nip_nik', $user_login_data['nip_nik'])
                                            ->get()->row();
                                            
                                    ?>
                                    <?php if(isset($user->nip_nik)){ ?>
                                    <?php
                                    		$user2	= $this->db->select('*')
                                            ->from('tbl_pengguna')
                                            ->join('tbl_role', 'tbl_pengguna.role_id = tbl_role.id_role')
                                            ->where('tbl_pengguna.nip_nik', $user_login_data['nip_nik'])
                                            ->get()->row();
                                            
                                    ?>
                                    <?php }else{ ?>
                                    <?php
                                    		$user2	= $this->db->select('*')
                                            ->from('tbl_reviewer')
                                            ->join('tbl_role', 'tbl_reviewer.role_id = tbl_role.id_role')
                                            ->where('tbl_reviewer.nip_nik', $user_login_data['nip_nik'])
                                            ->get()->row();
                                            
                                    ?>
                                    <?php } ?>
                                    <p class="user-dropdown-status text-sm text-muted"><?= $user2->nama_role ?>
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('user') ?>">Profil</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('user/change-password') ?>">Ubah
                                        Password</a></li>
                                <?php if ($user_login_data['role_id'] == 4) { ?>

                                <li><a class="dropdown-item" href="<?= base_url('dashboard-p3m') ?>">Dashboard P3M</a>
                                </li>
                                <?php } ?>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('logout') ?>">Logout</a></li>
                            </ul>
                        </div>

                        <!-- Burger button responsive -->
                        <a class="burger-btn d-block d-xl-none">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>
            <nav class="main-navbar">
                <div class="container">
                    <ul>
                        <?php
                        $urid1 = $this->uri->segment(2);
                        $urid = $this->uri->segment(1);
                        $urip1 = $this->uri->segment(2);
                        $urip = $this->uri->segment(1);
                        $uri0 = $this->uri->segment(1);
                        ?>
                        <?php if ($urip1 == 'p3m') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard/p3m') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($urip == 'p3m') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard/p3m') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($urid1 == 'dosen') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard/dosen') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($urid == 'dosen') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard/dosen') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($uri0 == 'dashboard-p3m') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard-p3m') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($user_login_data['role_id'] != 4) { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php }elseif($uri0 == 'dashboard') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard-p3m') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <script>
                        window.location.href = "<?php echo base_url('dashboard-p3m'); ?>";
                        </script>
                        <?php } ?>
                        <?php if($user_login_data['role_id'] == 4){ ?>
                        <?php if ($urip == 'user') { ?>
                        <li class="menu-item  ">
                            <a href="<?= base_url('dashboard-p3m') ?>" class='menu-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php } ?>
                        <?php } ?>

                        <?php if ($user_login_data['role_id'] == 1) { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-cloud"></i>
                                <span>Data Admin</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/data-pengguna-tampil') ?>"
                                                class='submenu-link'>Master Pengguna</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/master-mahasiswa') ?>"
                                                class='submenu-link'>Master Mahasiswa</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/master-prodi') ?>" class='submenu-link'>Master
                                                Prodi</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/tahun-aktif') ?>" class='submenu-link'>Tahun
                                                Aktif</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/setting') ?>" class='submenu-link'>Setting</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/rekap-penelitian') ?>"
                                                class='submenu-link'>Rekap Penelitian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/data-setting-penelitian') ?>"
                                                class='submenu-link'>Setting Penelitian</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">
                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/rekap-pengabdian') ?>"
                                                class='submenu-link'>Rekap Pengabdian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('admin/data-setting-pengabdian') ?>"
                                                class='submenu-link'>Setting Pengabdian</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <?php } elseif ($user_login_data['role_id'] == 2) { ?>
                        <?php if ($user_login_data['nidn_nidk'] != 0) { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian') ?>" class='submenu-link'>Data
                                                Penelitian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian-aktif') ?>"
                                                class='submenu-link'>Penelitian Aktif</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian') ?>" class='submenu-link'>Data
                                                Pengabdian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian-aktif') ?>" class='submenu-link'>
                                                Pengabdian Aktif</a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php }elseif($user_login_data['role_id'] == 3){ ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('reviewer/usulan-penelitian') ?>"
                                                class='submenu-link'>Usulan Penelitian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('reviewer/penelitian-disahkan') ?>"
                                                class='submenu-link'>Penelitian Disahkan/Ditolak</a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('reviewer/usulan-pengabdian') ?>"
                                                class='submenu-link'>Usulan Pengabdian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('reviewer/pengabdian-disahkan') ?>"
                                                class='submenu-link'>Pengabdian Disahkan/Ditolak</a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php }elseif($user_login_data['role_id'] == 4){ ?>
                        <?php
                        $uri2 = $this->uri->segment(2);
                        $uri1 = $this->uri->segment(1);
                        ?>
                        <?php if ($uri1 == 'p3m') { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">


                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/usulan-penelitian') ?>"
                                                class='submenu-link'>Penelitian Usulan</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/dinilai-penelitian') ?>"
                                                class='submenu-link'>Penelitian Dinilai</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/penelitian-disahkan') ?>"
                                                class='submenu-link'>Penelitian Disahkan/Ditolak</a>
                                        </li>


                                    </ul>


                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">


                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/usulan-pengabdian') ?>"
                                                class='submenu-link'>Pengabdian Usulan</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/dinilai-pengabdian') ?>"
                                                class='submenu-link'>Pengabdian Dinilai</a>


                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/pengabdian-disahkan') ?>"
                                                class='submenu-link'>Pengabdian Disahkan/Ditolak</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php } elseif ($uri2 == 'p3m') { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">


                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/usulan-penelitian') ?>"
                                                class='submenu-link'>Penelitian Usulan</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/dinilai-penelitian') ?>"
                                                class='submenu-link'>Penelitian Dinilai</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/penelitian-disahkan') ?>"
                                                class='submenu-link'>Penelitian Disahkan/Ditolak</a>
                                        </li>


                                    </ul>


                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">


                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/usulan-pengabdian') ?>"
                                                class='submenu-link'>Pengabdian Usulan</a>


                                        </li>

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/dinilai-pengabdian') ?>"
                                                class='submenu-link'>Pengabdian Dinilai</a>


                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('p3m/pengabdian-disahkan') ?>"
                                                class='submenu-link'>Pengabdian Disahkan/Ditolak</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php
                        $uri2 = $this->uri->segment(2);
                        $uri1 = $this->uri->segment(1);
                        ?>
                        <?php if ($user_login_data['nidn_nidk'] != 0) { ?>
                        <?php if ($uri1 == 'dosen') { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian') ?>" class='submenu-link'>Data
                                                Penelitian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian-aktif') ?>"
                                                class='submenu-link'>Penelitian Aktif</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian') ?>" class='submenu-link'>Data
                                                Pengabdian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian-aktif') ?>" class='submenu-link'>
                                                Pengabdian Aktif</a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php } elseif ($uri2 == 'dosen') { ?>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-zoom-in"></i>
                                <span>Penelitian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">

                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian') ?>" class='submenu-link'>Data
                                                Penelitian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/penelitian-aktif') ?>"
                                                class='submenu-link'>Penelitian Aktif</a>
                                        </li>

                                    </ul>


                                </div>
                            </div>
                        </li>
                        <li class="menu-item  has-sub">
                            <a class='menu-link'>
                                <i class="bi bi-map"></i>
                                <span>Pengabdian</span>
                            </a>
                            <div class="submenu ">
                                <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
                                <div class="submenu-group-wrapper">


                                    <ul class="submenu-group">
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian') ?>" class='submenu-link'>Data
                                                Pengabdian</a>
                                        </li>
                                        <li class="submenu-item  ">
                                            <a href="<?= base_url('dosen/pengabdian-aktif') ?>" class='submenu-link'>
                                                Pengabdian Aktif</a>
                                        </li>
                                    </ul>


                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>