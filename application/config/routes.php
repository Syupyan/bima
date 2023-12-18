<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']            = 'home/Home/Halaman_v_home';
$route['404_override']                  = 'Page_Error/index';
$route['translate_uri_dashes']          = TRUE;

$route['page'] = 'Page_Error/search_page';


//modules Dosen - Penelitian
$route['dosen/penelitian']			             =	'dosen/Penelitian/halaman_v_penelitian';
$route['dosen/detail-penelitian/(:num)']			             =	'dosen/Penelitian/halaman_detail_penelitian/$1';
$route['dosen/tambah-penelitian/1']			        =	'dosen/Penelitian/halaman_c_penelitian_1';
$route['dosen/tambah-penelitian/2/(:num)']			        =	'dosen/Penelitian/halaman_c_penelitian_2/$1';
$route['dosen/tambah-penelitian/3/(:num)']			        =	'dosen/Penelitian/halaman_c_penelitian_3/$1';
$route['dosen/tambah-penelitian/4/(:num)']			        =	'dosen/Penelitian/halaman_c_penelitian_4/$1';
$route['dosen/tambah-anggota/(:num)']			   =	'dosen/Penelitian/halaman_c_anggota/$1';
$route['dosen/persetujuan-anggota/(:num)']			   =	'dosen/Penelitian/halaman_persetujuan_anggota/$1';
$route['dosen/penelitian-aktif']			             =	'dosen/Penelitian/halaman_v_penelitian_aktif';
$route['dosen/detail-penelitian-aktif/(:num)']			             =	'dosen/Penelitian/halaman_detail_penelitian_aktif/$1';
//modules Penelitian

//modules Dosen - Pengabdian
$route['dosen/pengabdian']			             =	'dosen/Pengabdian/halaman_v_pengabdian';
$route['dosen/detail-pengabdian/(:num)']			             =	'dosen/Pengabdian/halaman_detail_pengabdian/$1';
$route['dosen/tambah-pengabdian/1']			        =	'dosen/Pengabdian/halaman_c_pengabdian_1';
$route['dosen/tambah-pengabdian/2/(:num)']			        =	'dosen/Pengabdian/halaman_c_pengabdian_2/$1';
$route['dosen/tambah-pengabdian/3/(:num)']			        =	'dosen/Pengabdian/halaman_c_pengabdian_3/$1';
$route['dosen/tambah-pengabdian/4/(:num)']			        =	'dosen/Pengabdian/halaman_c_pengabdian_4/$1';
$route['dosen/tambah-anggota/(:num)']			   =	'dosen/Pengabdian/halaman_c_anggota/$1';
$route['dosen/persetujuan-anggota-penelitian/(:num)']			   =	'dosen/Penelitian/halaman_persetujuan_anggota/$1';
$route['dosen/persetujuan-anggota-pengabdian/(:num)']			   =	'dosen/Pengabdian/halaman_persetujuan_anggota/$1';
$route['dosen/persetujuan-anggota-seluruh']			   =	'dosen/Penelitian/halaman_persetujuan_anggota_seluruh';
$route['dosen/pengabdian-aktif']			             =	'dosen/Pengabdian/halaman_v_pengabdian_aktif';
$route['dosen/detail-pengabdian-aktif/(:num)']			             =	'dosen/Pengabdian/halaman_detail_pengabdian_aktif/$1';
//modules Pengabdian

// modules dosen - logbook penelitian
$route['dosen/data-penelitian-laporan/(:num)']			          =	'dosen/Penelitian/halaman_data_penelitian/$1';
$route['dosen/data-laporan-kemajuan-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_v_lp_kemajuan_penelitian/$1';
$route['dosen/data-laporan-keuangan-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_v_lp_keuangan_penelitian/$1';
$route['dosen/tambah-laporan-kemajuan-akhir-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_c_lp_kemajuan_akhir_penelitian/$1';
$route['dosen/data-laporan-kemajuan-akhir-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_v_lp_kemajuan_akhir_penelitian/$1';
$route['dosen/tambah-laporan-kemajuan-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_c_lp_kemajuan_penelitian/$1';
$route['dosen/logbook-penelitian/(:num)']			          =	'dosen/Penelitian/halaman_v_logbook/$1';
$route['dosen/tambah-logbook-penelitian/(:num)']			             =	'dosen/Penelitian/halaman_c_logbook/$1';
$route['dosen/dokumen-logbook-penelitian/(:num)']			             =	'dosen/Penelitian/halaman_v_logbook_dokumen/$1';
// modules dosen - logbook

// modules dosen - logbook pengabdian
$route['dosen/data-pengabdian-laporan/(:num)']			          =	'dosen/Pengabdian/halaman_data_pengabdian/$1';
$route['dosen/data-laporan-kemajuan-pengabdian/(:num)']			          =	'dosen/Pengabdian/halaman_v_lp_kemajuan_pengabdian/$1';
$route['dosen/data-laporan-keuangan-pengabdian/(:num)']			          =	'dosen/Pengabdian/halaman_v_lp_keuangan_pengabdian/$1';
$route['dosen/tambah-laporan-kemajuan-akhir-pengabdian/(:num)']			          =	'dosen/Pengabdian/halaman_c_lp_kemajuan_akhir_pengabdian/$1';
$route['dosen/data-laporan-kemajuan-akhir-pengabdian/(:num)']			          =	'dosen/Pengabdian/halaman_v_lp_kemajuan_akhir_pengabdian/$1';
$route['dosen/tambah-laporan-kemajuan-pengabdian/(:num)']			          =	'dosen/Pengabdian/halaman_c_lp_kemajuan_pengabdian/$1';
$route['dosen/logbook-pengabdian/(:num)']			             =	'dosen/Pengabdian/halaman_v_logbook/$1';
$route['dosen/tambah-logbook-pengabdian/(:num)']			             =	'dosen/Pengabdian/halaman_c_logbook/$1';
$route['dosen/dokumen-logbook-pengabdian/(:num)']			             =	'dosen/Pengabdian/halaman_v_logbook_dokumen/$1';
// modules dosen - logbook

//modules Home
$route['panduan']				            = 'home/Home/Halaman_v_panduan';
//

// modules dosen - data penelitian ketua
$route['dosen/data-penelitian-ketua']			             =	'dosen/Penelitian/halaman_v_data_penelitian_ketua';
$route['dosen/tabel-penelitian-ketua/(:num)']			      =	'dosen/Penelitian/halaman_v_tabel_penelitian_ketua/$1';
$route['dosen/detail-penelitian-ketua/(:num)']			      =	'dosen/Penelitian/halaman_d_tabel_penelitian_ketua/$1';
// modules dosen - 

// modules dosen - data penelitian anggota
$route['dosen/data-penelitian-anggota']			               =	'dosen/Penelitian/halaman_v_data_penelitian_anggota';
$route['dosen/tabel-penelitian-anggota/(:num)']			       =	'dosen/Penelitian/halaman_v_tabel_penelitian_anggota/$1';
$route['dosen/detail-penelitian-anggota/(:num)']			   =	'dosen/Penelitian/halaman_d_tabel_penelitian_anggota/$1';
// modules dosen - 

// modules dosen - data penelitian ketua
$route['dosen/data-pengabdian-ketua']			              =	'dosen/Pengabdian/halaman_v_data_pengabdian_ketua';
$route['dosen/tabel-pengabdian-ketua/(:num)']			      =	'dosen/Pengabdian/halaman_v_tabel_pengabdian_ketua/$1';
$route['dosen/detail-pengabdian-ketua/(:num)']			      =	'dosen/Pengabdian/halaman_d_tabel_pengabdian_ketua/$1';
// modules dosen - 

// modules dosen - data penelitian anggota
$route['dosen/data-pengabdian-anggota']			              =	'dosen/Pengabdian/halaman_v_data_pengabdian_anggota';
$route['dosen/tabel-pengabdian-anggota/(:num)']			      =	'dosen/Pengabdian/halaman_v_tabel_pengabdian_anggota/$1';
$route['dosen/detail-pengabdian-anggota/(:num)']			  =	'dosen/Pengabdian/halaman_d_tabel_pengabdian_anggota/$1';
// modules dosen - 


//modules auth Controller Auth
$route['login']				            = 'auth/Auth/index';
$route['forgot-password'] 	            = 'auth/Auth/lupapassword';
$route['reset-password'] 	            = 'auth/Auth/resetpassword';
$route['logout']			            = 'auth/Auth/logout';
//

// modules user controller User
$route['user'] 					        = 'user/User/halaman_v_profil';
$route['user/user-profile'] 	        = 'user/User/halaman_v_profil';
$route['user/edit-profile'] 	        = 'user/User/edit_profile';
$route['user/change-password'] 	        = 'user/User/change_password';
$route['dashboard/(:any)'] 	                 = 'user/User/halaman_v_dashboard/$1';
$route['dashboard'] 	                 = 'user/User/halaman_v_dashboard';
$route['dashboard-p3m'] 	                 = 'user/User/halaman_v_dashboard_p3m';
// $route['example/(:any)'] = 'controller/method/$1';

// Modules Admin - Pengguna
$route['admin/data-pengguna-tampil']         = 'admin/Master_Pengguna/halaman_data_pengguna';
$route['admin/master-pengguna']         = 'admin/Master_Pengguna/halaman_v_pengguna';
$route['admin/master-pengguna-luar']         = 'admin/Master_Pengguna/halaman_v_pengguna_luar';
$route['admin/tambah-pengguna']         = 'admin/Master_Pengguna/halaman_c_pengguna';
$route['admin/tambah-pengguna-luar']         = 'admin/Master_Pengguna/halaman_c_pengguna_luar';
$route['admin/edit-pengguna/(:num)']    = 'admin/Master_Pengguna/halaman_u_pengguna/$1';
$route['admin/edit-pengguna-luar/(:num)']    = 'admin/Master_Pengguna/halaman_u_pengguna_luar/$1';
$route['admin/aksi-tambah-pengguna']    = 'admin/Master_Pengguna/add_user';
$route['admin/aksi-update-pengguna']    = 'admin/Master_Pengguna/update_user';
// Modules Admin - Pengguna

// Modules Admin - Mahasiswa
$route['admin/master-mahasiswa']         = 'admin/Master_Mahasiswa/halaman_v_mahasiswa';
$route['admin/tambah-mahasiswa']         = 'admin/Master_Mahasiswa/halaman_c_mahasiswa';
$route['admin/edit-mahasiswa/(:num)']    = 'admin/Master_Mahasiswa/halaman_u_mahasiswa/$1';
$route['admin/aksi-tambah-pengguna']    = 'admin/Master_Mahasiswa/add_user';
$route['admin/aksi-update-pengguna']    = 'admin/Master_Mahasiswa/update_user';
// Modules Admin - Mahasiswa

// Modules Admin - Prodi
$route['admin/master-prodi']         = 'admin/Master_Prodi/halaman_v_prodi';
$route['admin/tambah-prodi']         = 'admin/Master_Prodi/halaman_c_prodi';
$route['admin/edit-prodi/(:num)']    = 'admin/Master_Prodi/halaman_u_prodi/$1';
$route['admin/aksi-tambah-prodi']    = 'admin/Master_Prodi/add_prodi';
$route['admin/aksi-update-prodi']    = 'admin/Master_Prodi/update_prodi';
// Modules Admin - Prodi


// modules admin - data mahasiswa
$route['admin/data-mahasiswa']			             =	'admin/Master_Mahasiswa/halaman_v_data_mahasiswa';
$route['admin/tabel-mahasiswa/(:num)']			      =	'admin/Master_Mahasiswa/halaman_v_tabel_mahasiswa/$1';
// modules admin - data mahasiswa

// modules admin - data pengguna
$route['admin/data-pengguna']			             =	'admin/Master_Pengguna/halaman_v_data_pengguna';
$route['admin/tabel-pengguna/(:num)']			      =	'admin/Master_Pengguna/halaman_v_tabel_pengguna/$1';
// modules admin - data pengguna

// modules admin - rekap penelitian
$route['admin/rekap-penelitian']			             =	'admin/Rekap_Penelitian/halaman_v_data_penelitian_rekap';
$route['admin/tabel-rekap-penelitian/(:num)']			             =	'admin/Rekap_Penelitian/halaman_v_tabel_penelitian_rekap/$1';
$route['admin/data-penelitian-laporan/(:num)']			             =	'admin/Rekap_Penelitian/halaman_data_penelitian/$1';
$route['admin/data-laporan-kemajuan-penelitian/(:num)']			             =	'admin/Rekap_Penelitian/halaman_v_lp_kemajuan_penelitian/$1';
$route['admin/data-laporan-kemajuan-akhir-penelitian/(:num)']			             =	'admin/Rekap_Penelitian/halaman_v_lp_kemajuan_akhir_penelitian/$1';
$route['admin/logbook-penelitian/(:num)']			          =	'admin/Rekap_Penelitian/halaman_v_logbook_penelitian/$1';
$route['admin/dokumen-logbook-penelitian/(:num)']			             =	'admin/Rekap_Penelitian/halaman_v_logbook_dokumen_penelitian/$1';
// modules admin - rekap penelitian


// modules admin - rekap pengabdian
$route['admin/rekap-pengabdian']			             =	'admin/Rekap_Pengabdian/halaman_v_data_pengabdian_rekap';
$route['admin/tabel-rekap-pengabdian/(:num)']			             =	'admin/Rekap_Pengabdian/halaman_v_tabel_pengabdian_rekap/$1';
$route['admin/data-pengabdian-laporan/(:num)']			             =	'admin/Rekap_Pengabdian/halaman_data_pengabdian/$1';
$route['admin/data-laporan-kemajuan-pengabdian/(:num)']			             =	'admin/Rekap_Pengabdian/halaman_v_lp_kemajuan_pengabdian/$1';
$route['admin/data-laporan-kemajuan-akhir-pengabdian/(:num)']			             =	'admin/Rekap_Pengabdian/halaman_v_lp_kemajuan_akhir_pengabdian/$1';
$route['admin/logbook-pengabdian/(:num)']			          =	'admin/Rekap_Pengabdian/halaman_v_logbook_pengabdian/$1';
$route['admin/dokumen-logbook-pengabdian/(:num)']			             =	'admin/Rekap_Pengabdian/halaman_v_logbook_dokumen_pengabdian/$1';
// modules admin - rekap pengabdian

// modules admin - tema
$route['admin/data-setting-penelitian']    =	'admin/Setting_Penelitian_Pengabdian/halaman_data_setting_penelitian';
$route['admin/luaran-penelitian']    =	'admin/Setting_Penelitian_Pengabdian/halaman_v_luaran_penelitian';
$route['admin/data-setting-pengabdian']    =	'admin/Setting_Penelitian_Pengabdian/halaman_data_setting_pengabdian';
$route['admin/tema-penelitian']			             =	'admin/Setting_Penelitian_Pengabdian/halaman_v_tema_penelitian';
$route['admin/luaran-pengabdian']    =	'admin/Setting_Penelitian_Pengabdian/halaman_v_luaran_pengabdian';
$route['admin/tema-pengabdian']			             =	'admin/Setting_Penelitian_Pengabdian/halaman_v_tema_pengabdian';
// modules admin - tema

// Modules P3M - Penelitian
$route['p3m/usulan-penelitian']         = 'p3m/Penelitian/halaman_v_penelitian';
$route['p3m/dinilai-penelitian']       = 'p3m/Penelitian/halaman_v_dinilai_penelitian';
$route['p3m/detail-dinilai-penelitian/(:num)']       = 'p3m/Penelitian/halaman_v_dinilai_penelitian_detail/$1';
$route['p3m/hasil-dinilai-penelitian/(:num)']       = 'p3m/Penelitian/halaman_v_dinilai_penelitian_hasil/$1';
$route['p3m/penelitian-disahkan']       = 'p3m/Penelitian/halaman_v_penelitian_disahkan';
$route['p3m/detail-penelitian-disahkan/(:num)']       = 'p3m/Penelitian/halaman_v_penelitian_disahkan_detail/$1';
$route['p3m/hasil-penelitian-disahkan/(:num)']       = 'p3m/Penelitian/halaman_v_penelitian_disahkan_hasil/$1';

// Modules P3M - Penelitian

// Modules P3M - Pengabdian
$route['p3m/usulan-pengabdian']         = 'p3m/Pengabdian/halaman_v_pengabdian';
$route['p3m/dinilai-pengabdian']       = 'p3m/Pengabdian/halaman_v_dinilai_pengabdian';
$route['p3m/detail-dinilai-pengabdian/(:num)']       = 'p3m/Pengabdian/halaman_v_dinilai_pengabdian_detail/$1';
$route['p3m/hasil-dinilai-pengabdian/(:num)']       = 'p3m/Pengabdian/halaman_v_dinilai_pengabdian_hasil/$1';
$route['p3m/pengabdian-disahkan']       = 'p3m/Pengabdian/halaman_v_pengabdian_disahkan';
$route['p3m/detail-pengabdian-disahkan/(:num)']       = 'p3m/Pengabdian/halaman_v_pengabdian_disahkan_detail/$1';
$route['p3m/hasil-pengabdian-disahkan/(:num)']       = 'p3m/Pengabdian/halaman_v_pengabdian_disahkan_hasil/$1';
// Modules P3M - Pengabdian

// modules P3m - data penelitian disahkan
$route['p3m/data-penelitian-disahkan']			              =	'p3m/Penelitian/halaman_v_data_penelitian_disahkan';
$route['p3m/tabel-penelitian-disahkan/(:num)']			      =	'p3m/Penelitian/halaman_v_tabel_penelitian_disahkan/$1';
$route['p3m/tabel-detail-penelitian-disahkan/(:num)']			  =	'p3m/Penelitian/halaman_v_tabel_penelitian_disahkan_detail/$1';
$route['p3m/tabel-hasil-penelitian-disahkan/(:num)']			  =	'p3m/Penelitian/halaman_v_tabel_penelitian_disahkan_hasil/$1';
// modules dosen -

// modules P3m - data pengabdiann disahkan
$route['p3m/data-pengabdian-disahkan']			              =	'p3m/Pengabdian/halaman_v_data_pengabdian_disahkan';
$route['p3m/tabel-pengabdian-disahkan/(:num)']			      =	'p3m/Pengabdian/halaman_v_tabel_pengabdian_disahkan/$1';
$route['p3m/tabel-detail-pengabdian-disahkan/(:num)']			  =	'p3m/Pengabdian/halaman_v_tabel_pengabdian_disahkan_detail/$1';
$route['p3m/tabel-hasil-pengabdian-disahkan/(:num)']			  =	'p3m/Pengabdian/halaman_v_tabel_pengabdian_disahkan_hasil/$1';
// modules dosen - 


// Modules Admin - Tahun Aktif
$route['admin/tahun-aktif']         = 'admin/Tahun_Aktif/halaman_v_tahun_aktif';
// Modules Admin - Tahun Aktif

// Modules Admin - Anggaran Aktif
$route['admin/anggaran-aktif/(:num)']         = 'admin/Anggaran_Aktif/halaman_v_anggaran_aktif/$1';
// Modules Admin - Anggaran Aktif

// Modules Admin - Tahun Aktif
$route['admin/setting']         = 'admin/Setting/halaman_v_setting';
// Modules Admin - Tahun Aktif

// Modules Reviewer - Penelitian
$route['reviewer/usulan-penelitian']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_penelitian';
$route['reviewer/detail-penelitian/(:num)']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_penelitian_detail/$1';
$route['reviewer/penilaian-penelitian/(:num)']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_penelitian_penilaian/$1';
$route['reviewer/penelitian-disahkan']       = 'reviewer/Data_Reviewer/halaman_v_penelitian_disahkan';
$route['reviewer/detail-penelitian-disahkan/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_penelitian_disahkan_detail/$1';
$route['reviewer/hasil-penelitian-disahkan/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_penelitian_disahkan_hasil/$1';
$route['reviewer/evaluasi-kemajuan-penelitian/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_evaluasi_kemajuan_penelitian/$1';
$route['reviewer/evaluasi-akhir-kemajuan-penelitian/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_evaluasi_kemajuan_penelitian_akhir/$1';
// Modules Reviewer - Penelitian

// Modules Reviewer - Pengabdian
$route['reviewer/usulan-pengabdian']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_pengabdian';
$route['reviewer/detail-pengabdian/(:num)']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_pengabdian_detail/$1';
$route['reviewer/penilaian-pengabdian/(:num)']         = 'reviewer/Data_Reviewer/halaman_v_reviewer_pengabdian_penilaian/$1';
$route['reviewer/pengabdian-disahkan']       = 'reviewer/Data_Reviewer/halaman_v_pengabdian_disahkan';
$route['reviewer/detail-pengabdian-disahkan/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_pengabdian_disahkan_detail/$1';
$route['reviewer/hasil-pengabdian-disahkan/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_pengabdian_disahkan_hasil/$1';
$route['reviewer/evaluasi-kemajuan-pengabdian/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_evaluasi_kemajuan_pengabdian/$1';
$route['reviewer/evaluasi-akhir-kemajuan-pengabdian/(:num)']       = 'reviewer/Data_Reviewer/halaman_v_evaluasi_kemajuan_pengabdian_akhir/$1';
// Modules Reviewer - Pengabdian

// modules reviewer - data penelitian disahkan
$route['reviewer/data-penelitian-disahkan']			              =	'reviewer/Data_Reviewer/halaman_v_data_penelitian_disahkan';
$route['reviewer/tabel-penelitian-disahkan/(:num)']			      =	'reviewer/Data_Reviewer/halaman_v_tabel_penelitian_disahkan/$1';
$route['reviewer/tabel-detail-penelitian-disahkan/(:num)']			  =	'reviewer/Data_Reviewer/halaman_v_tabel_penelitian_disahkan_detail/$1';
$route['reviewer/tabel-hasil-penelitian-disahkan/(:num)']			  =	'reviewer/Data_Reviewer/halaman_v_tabel_penelitian_disahkan_hasil/$1';
// modules dosen -

// modules reviewer - data pengabdiann disahkan
$route['reviewer/data-pengabdian-disahkan']			              =	'reviewer/Data_Reviewer/halaman_v_data_pengabdian_disahkan';
$route['reviewer/tabel-pengabdian-disahkan/(:num)']			      =	'reviewer/Data_Reviewer/halaman_v_tabel_pengabdian_disahkan/$1';
$route['reviewer/tabel-detail-pengabdian-disahkan/(:num)']			  =	'reviewer/Data_Reviewer/halaman_v_tabel_pengabdian_disahkan_detail/$1';
$route['reviewer/tabel-hasil-pengabdian-disahkan/(:num)']			  =	'reviewer/Data_Reviewer/halaman_v_tabel_pengabdian_disahkan_hasil/$1';
// modules reviewer -


// modules Reviewer
$route['reviewer/data-evaluasi-penelitian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_data_evaluasi_penelitian/$1';
$route['reviewer/data-penelitian-laporan/(:num)']			             =	'reviewer/Data_Reviewer/halaman_data_penelitian/$1';
$route['reviewer/data-laporan-kemajuan-penelitian/(:num)']			     =	'reviewer/Data_Reviewer/halaman_v_lp_kemajuan_penelitian/$1';
$route['reviewer/data-laporan-kemajuan-akhir-penelitian/(:num)']	     =	'reviewer/Data_Reviewer/halaman_v_lp_kemajuan_akhir_penelitian/$1';
$route['reviewer/data-laporan-keuangan-penelitian/(:num)']	             =	'reviewer/Data_Reviewer/halaman_v_lp_keuangan_penelitian/$1';
// modules Reviewer

// modules reviewer - logbook penelitian
$route['reviewer/logbook-penelitian/(:num)']			          =	'reviewer/Data_Reviewer/halaman_v_logbook_penelitian/$1';
$route['reviewer/tambah-logbook-penelitian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_c_logbook_penelitian/$1';
$route['reviewer/dokumen-logbook-penelitian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_v_logbook_dokumen_penelitian/$1';
// modules reviewer - logbook

// modules Reviewer
$route['reviewer/data-evaluasi-pengabdian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_data_evaluasi_pengabdian/$1';
$route['reviewer/data-pengabdian-laporan/(:num)']			             =	'reviewer/Data_Reviewer/halaman_data_pengabdian/$1';
$route['reviewer/data-laporan-kemajuan-pengabdian/(:num)']			     =	'reviewer/Data_Reviewer/halaman_v_lp_kemajuan_pengabdian/$1';
$route['reviewer/data-laporan-kemajuan-akhir-pengabdian/(:num)']	     =	'reviewer/Data_Reviewer/halaman_v_lp_kemajuan_akhir_pengabdian/$1';
$route['reviewer/data-laporan-keuangan-pengabdian/(:num)']	             =	'reviewer/Data_Reviewer/halaman_v_lp_keuangan_pengabdian/$1';

// modules reviewer - logbook pengabdian
$route['reviewer/logbook-pengabdian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_v_logbook_pengabdian/$1';
$route['reviewer/tambah-logbook-pengabdian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_c_logbook_pengabdian/$1';
$route['reviewer/dokumen-logbook-pengabdian/(:num)']			             =	'reviewer/Data_Reviewer/halaman_v_logbook_dokumen_pengabdian/$1';
// modules reviewer - logbook

