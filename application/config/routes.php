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
$route['default_controller'] = 'welcome';

//login
$route['login'] = 'back/authentication/auth';
$route['signin'] = 'back/authentication/auth/login';
$route['logout'] = 'back/authentication/auth/logout';

//Admin-site
$route['admin'] = 'back/admin/dashboard';
$route['input_siswa'] = 'back/admin/dashboard/input_siswa';
$route['master_siswa'] = 'back/admin/master_siswa';
$route['tambah_guru'] = 'back/admin/tambah_guru';
$route['input_guru'] = 'back/admin/tambah_guru/input_guru';
$route['master_guru'] = 'back/admin/master_guru';
$route['mapel'] = 'back/admin/mapel';
$route['input_mapel'] = 'back/admin/mapel/input_mapel';
$route['absensi'] = 'back/admin/absensi';
$route['input_absensi'] = 'back/admin/absensi/input_absensi';
$route['kkm'] = 'back/admin/kkm';
$route['input_kkm'] = 'back/admin/kkm/input_kkm';
$route['kelas'] = 'back/admin/tambah_kelas';
$route['kelas_detail'] = 'back/admin/kelas_detail';
$route['master_kelas'] = 'back/admin/master_kelas';
$route['input_kelas'] = 'back/admin/tambah_kelas/input_kelas';
$route['pengembangan'] = 'back/admin/pengembangan_diri';
$route['sikap'] = 'back/admin/sikap';
$route['input_sikap'] = 'back/admin/sikap/input_sikap';
$route['rapor'] = 'back/admin/rapor';
$route['laporan_nilai'] = 'back/admin/data_siswa';
$route['data_nilai_siswa/(:any)'] = 'back/admin/laporan/index/$1';

//Murid
$route['murid'] = 'back/murid/mr_dashboard';
$route['upload_poto'] = 'back/murid/mr_dashboard/update_foto'; 

//Guru
$route['guru']  = 'back/guru/g_dashboard';
$route['data_siswa']  = 'back/guru/g_data_siswa';
$route['input_nilai/(:any)']  = 'back/guru/g_input_nilai/index/$1';
$route['inputNilai_proses/(:any)']  = 'back/guru/g_input_nilai/input_nilai/index/$2';
$route['laporan/(:any)']  = 'back/guru/g_laporan/index/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
