<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('home');
});
Route::get('/activated', function () {
    return view('auth.activated');
});
Route::post('/proses-aktifasi', 'Auth\LoginController@activated')->name('form_activated');
*/
Auth::routes();
//home start
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/kunci-nilai/{rombongan_belajar_id}/{status}', array('as' => 'kunci_nilai', 'uses' => 'HomeController@kunci_nilai'));
Route::get('/generate-nilai/{pembelajaran_id}/{kompetensi_id}', array('as' => 'generate_nilai', 'uses' => 'HomeController@generate_nilai'));
Route::get('/progres-perencanaan-dan-penilaian', array('as' => 'progres_perencanaan_dan_penilaian', 'uses' => 'HomeController@progres_perencanaan_dan_penilaian'));
Route::get('/detil-nilai/{pembelajaran_id}', array('as' => 'detil_nilai', 'uses' => 'HomeController@detil_nilai'));
//home end
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/list_user', 'UsersController@list_user')->name('list_user');
Route::get('/users/edit/{id}', ['as' => 'users.edit', 'uses' => 'UsersController@edit']);
Route::get('/users/delete/{id}', ['as' => 'users.delete', 'uses' => 'UsersController@delete']);
Route::put('/users/update/{id}', array('as' => 'user.update', 'uses' => 'UsersController@update'));
Route::get('/users/profile', array('as' => 'user.profile', 'uses' => 'UsersController@profile'));
Route::get('/users/reset-password/{id}', ['as' => 'user.reset_password', 'uses' => 'UsersController@reset_password']);
Route::post('/users/update-profile/{id}', array('as' => 'update_profile', 'uses' => 'UsersController@update_profile'));
Route::get('/users/generate', 'UsersController@generate')->name('generate');
Route::get('/role', 'RolesController@index')->name('role');
Route::get('/role/list_role', 'UsersController@list_role')->name('list_role');
Route::get('/role_index', array('as' => 'roles.index', 'uses' => 'RolesController@index'));
Route::post('/role_store', array('as' => 'roles.store', 'uses' => 'RolesController@store'));
Route::get('/role_create', array('as' => 'roles.create', 'uses' => 'RolesController@create'));
Route::get('/role_edit/{id}', ['as' => 'roles.edit', 'uses' => 'RolesController@edit']);
Route::put('/role_update/{id}', ['as' => 'roles.update', 'uses' => 'RolesController@update']);
Route::get('/role_show', array('as' => 'roles.show', 'uses' => 'RolesController@show'));
Route::get('/permission', array('as' => 'permission.index', 'uses' => 'PermissionController@index'));
Route::get('/permission_create', array('as' => 'permission.create', 'uses' => 'PermissionController@create'));
Route::post('/permission_store', array('as' => 'permission.store', 'uses' => 'PermissionController@store'));
Route::get('/permission_edit/{id}', ['as' => 'permission.edit', 'uses' => 'PermissionController@edit']);
Route::get('/permission_show/{id}', array('as' => 'permission.show', 'uses' => 'PermissionController@show'));
Route::put('/permission_update/{id}', array('as' => 'permission.update', 'uses' => 'PermissionController@update'));
Route::delete('/permission_delete/{id}', array('as' => 'permission.destroy', 'uses' => 'PermissionController@destroy'));
Route::get('/pengguna', array('as' => 'users.index', 'uses' => 'PenggunaController@index'));
Route::get('/tambah_pengguna', array('as' => 'users.create', 'uses' => 'PenggunaController@create'));
Route::get('/edit_pengguna/{id}', array('as' => 'users.edit', 'uses' => 'PenggunaController@edit'));
Route::get('/view_pengguna/{id}', array('as' => 'users.show', 'uses' => 'PenggunaController@show'));
Route::post('/simpan_pengguna', array('as' => 'users.store', 'uses' => 'PenggunaController@store'));
Route::put('/update_pengguna/{id}', array('as' => 'users.update', 'uses' => 'PenggunaController@update'));
Route::delete('/hapus_pengguna/{id}', array('as' => 'users.destroy', 'uses' => 'PenggunaController@destroy'));
//sinkronisasi start//
Route::get('/sinkronisasi/dapodik', 'SinkronisasiController@index')->name('ambil_dapodik');
Route::get('/sinkronisasi/erapor', 'SinkronisasiController@kirim_data')->name('kirim_data');
Route::get('/sinkronisasi/erapor4', 'SinkronisasiController@erapor_lama')->name('erapor_lama');
Route::get('/sinkronisasi/proses-erapor4/{tabel}', array('as' => 'sinkronisasi.proses_erapor_lama', 'uses' => 'SinkronisasiController@proses_erapor_lama'));
Route::get('/sinkronisasi/proses-kirim-nilai/{tingkat}/{sekolah_id}', 'SinkronisasiController@proses_kirim_nilai')->name('proses_kirim_nilai');
Route::get('/sinkronisasi/proses-ambil-data', 'SinkronisasiController@ambil_data')->name('ambil_data');
Route::get('/sinkronisasi/sekolah', 'SinkronisasiController@sekolah')->name('sekolah');
Route::get('/sinkronisasi/guru', 'SinkronisasiController@guru')->name('sinkronisasi_guru');;
Route::get('/sinkronisasi/rombongan-belajar', 'SinkronisasiController@rombongan_belajar')->name('sinkronisasi_rombel');
Route::get('/sinkronisasi/siswa-aktif', 'SinkronisasiController@siswa_aktif')->name('sinkronsasi_siswa_aktif');
Route::get('/sinkronisasi/siswa-keluar', 'SinkronisasiController@siswa_keluar')->name('sinkronsasi_siswa_keluar');
Route::get('/sinkronisasi/pembelajaran', 'SinkronisasiController@pembelajaran')->name('sinkronisasi_pembelajaran');
Route::get('/sinkronisasi/ekskul', 'SinkronisasiController@ekskul')->name('sinkronisasi_ekskul');
Route::get('/sinkronisasi/anggota-ekskul', 'SinkronisasiController@anggota_ekskul')->name('sinkronisasi_anggota_ekskul');
Route::get('/sinkronisasi/dudi', 'SinkronisasiController@dudi')->name('sinkronisasi_dudi');
Route::get('/sinkronisasi/jurusan', 'SinkronisasiController@jurusan')->name('sinkronisasi_jurusan');
Route::get('/sinkronisasi/kurikulum', 'SinkronisasiController@kurikulum')->name('sinkronisasi_kurikulum');
Route::get('/sinkronisasi/mata-pelajaran', 'SinkronisasiController@mata_pelajaran')->name('sinkronisasi_mata_pelajaran');
Route::get('/sinkronisasi/mapel-kur', 'SinkronisasiController@mapel_kur')->name('sinkronisasi_mapel_kur');
Route::get('/sinkronisasi/ref-kd', 'SinkronisasiController@ref_kd')->name('sinkronisasi_ref_kd');
Route::get('/sinkronisasi/proses-kd/{file}', array('as' => 'sinkronisasi.proses_kd', 'uses' => 'SinkronisasiController@proses_kd'));
Route::get('/sinkronisasi/jumlah_kd', 'SinkronisasiController@jumlah_kd');
Route::get('/sinkronisasi/proses-sync', 'SinkronisasiController@proses_sync')->name('proses_sync');
Route::get('/sinkronisasi/kirim-nilai', 'SinkronisasiController@kirim_nilai')->name('kirim_nilai');
Route::get('/sinkronisasi/anggota-by-rombel/{rombongan_belajar_id}', array('as' => 'sinkronisasi.anggota_by_rombel', 'uses' => 'SinkronisasiController@anggota_by_rombel'));
Route::get('/sinkronisasi/proses-artisan/{server}/{data}/{aksi}/{satuan}', array('as' => 'sinkronisasi.proses_artisan_sync', 'uses' => 'SinkronisasiController@proses_artisan_sync'));
Route::get('/sinkronisasi/hitung-data/{data}', array('as' => 'sinkronisasi.hitung_data', 'uses' => 'SinkronisasiController@hitung_data'));
Route::get('/sinkronisasi/debug', 'SinkronisasiController@debug')->name('debug');
//sinkronisasi end//
Route::get('/guru', 'GuruController@index')->name('list_guru');
Route::get('/tendik', 'GuruController@tendik')->name('tendik');
Route::get('/instruktur', 'GuruController@instruktur')->name('instruktur');
Route::get('/tambah-{data}', 'GuruController@tambah_data')->name('tambah_data');
Route::get('/downloads/template-{data}', 'GuruController@template')->name('template');
Route::get('/asesor', 'GuruController@asesor')->name('asesor');
Route::post('/import-{data}', array('as' => 'guru.simpan_data', 'uses' => 'GuruController@simpan_data'));
Route::get('/guru/list-guru/{query}', array('as' => 'guru.list_guru', 'uses' => 'GuruController@list_guru'));
Route::get('/guru/view/{guru_id}', array('as' => 'guru.view', 'uses' => 'GuruController@view'));
Route::post('/guru/update-data', array('as' => 'guru.update_data', 'uses' => 'GuruController@update_data'));
Route::get('/guru/hapus/{query}/{guru_id}', array('as' => 'guru.hapus', 'uses' => 'GuruController@hapus'));
Route::get('/rombel', 'RombelController@index')->name('rombel');
Route::get('/rombel/list-rombel', 'RombelController@list_rombel')->name('list_rombel');
Route::get('/rombel/anggota/{rombel_id}', array('as' => 'rombel.anggota', 'uses' => 'RombelController@anggota'));
Route::get('/rombel/pembelajaran/{rombel_id}', array('as' => 'rombel.pembelajaran', 'uses' => 'RombelController@pembelajaran'));
Route::get('/rombel/keluarkan/{id}', array('as' => 'rombel.keluarkan', 'uses' => 'RombelController@keluarkan'));
Route::get('/rombel/pengajar', 'RombelController@pengajar')->name('get_pengajar');
Route::get('/rombel/kelompok/{id}', array('as' => 'rombel.kelompok', 'uses' => 'RombelController@kelompok'));
Route::post('/rombel/tambah_alias', array('as' => 'rombel.tambah_alias', 'uses' => 'RombelController@tambah_alias'));
Route::post('/rombel/simpan_pembelajaran', array('as' => 'rombel.simpan_pembelajaran', 'uses' => 'RombelController@simpan_pembelajaran'));
Route::get('/pd-aktif', 'SiswaController@index')->name('pd_aktif');
Route::get('/pd-keluar', 'SiswaController@keluar')->name('pd_keluar');
Route::get('/pd/list/{status}', array('as' => 'rombel.pembelajaran', 'uses' => 'SiswaController@list_siswa'));
Route::get('/pd/view/{siswa_id}', array('as' => 'siswa.view', 'uses' => 'SiswaController@view'));
Route::post('/pd/update-data', array('as' => 'siswa.update_data', 'uses' => 'SiswaController@update_data'));
Route::get('/konfigurasi', 'ConfigController@index')->name('konfigurasi');
Route::get('/rekap-nilai', 'ConfigController@rekap_nilai')->name('download_rekap_nilai');
#Route::get('/rekap-nilai', 'ConfigController@download')->name('download_rekap_nilai');
Route::post('konfigurasi/simpan', 'ConfigController@simpan');
Route::get('/changelog', 'ChangelogController@index')->name('changelog');
Route::middleware('auth')->get('/check-update', function () {
    return view('update');
});
Route::get('/proses-update', 'UpdateController@proses_update')->name('proses_update');
Route::get('/ekstrak', 'UpdateController@extract_to')->name('extract_to');
Route::get('/update-versi', 'UpdateController@update_versi')->name('update_versi');
Route::get('/referensi/mata-pelajaran', 'ReferensiController@index')->name('mata_pelajaran');
Route::get('/referensi/list-mata-pelajaran', 'ReferensiController@list_mata_pelajaran')->name('list_mata_pelajaran');
Route::get('/referensi/ekskul', 'ReferensiController@ekskul')->name('ekskul');
Route::get('/referensi/list-ekskul', 'ReferensiController@list_ekskul')->name('list_ekskul');
Route::get('/referensi/metode', 'ReferensiController@metode')->name('metode');
Route::get('/referensi/list-metode', 'ReferensiController@list_metode')->name('list_metode');
Route::get('/referensi/tambah-metode', 'ReferensiController@tambah_metode')->name('tambah_metode');
Route::post('/referensi/simpan-metode', array('as' => 'referensi.simpan_metode', 'uses' => 'ReferensiController@simpan_metode'));
Route::get('/referensi/edit-metode/{id}', array('as' => 'referensi.edit_metode', 'uses' => 'ReferensiController@edit_metode'));
Route::get('/referensi/hapus-metode/{id}', array('as' => 'referensi.hapus_metode', 'uses' => 'ReferensiController@hapus_metode'));
Route::get('/referensi/sikap', 'ReferensiController@sikap')->name('sikap');
Route::get('/referensi/kd', 'ReferensiController@kd')->name('ref_kompetensi_dasar');
Route::get('/referensi/list-kd', 'ReferensiController@list_kd')->name('list_kd');
Route::get('/referensi/add-kd', 'ReferensiController@add_kd')->name('add_kd');
Route::get('/referensi/add-kd/{kompetensi_id}/{rombongan_belajar_id}/{mata_pelajaran_id}/{kelas}', 'ReferensiController@add_kd')->name('add_kd');
Route::post('/referensi/simpan-kd', array('as' => 'referensi.simpan_kd', 'uses' => 'ReferensiController@simpan_kd'));
Route::get('/referensi/toggle-aktif/{id}', 'ReferensiController@toggle_aktif')->name('toggle_aktif');
Route::get('/referensi/delete-kd/{id}', 'ReferensiController@delete_kd')->name('delete_kd');
Route::get('/referensi/edit-kd/{id}', 'ReferensiController@edit_kd')->name('edit_kd');
Route::post('/referensi/update-kd', array('as' => 'referensi.update_kd', 'uses' => 'ReferensiController@update_kd'));
Route::get('/referensi/ukk', 'ReferensiController@ukk')->name('ref_ukk');
Route::get('/referensi/list-ukk', 'ReferensiController@list_ukk')->name('list_ukk');
Route::get('/referensi/tambah-ukk', 'ReferensiController@add_ukk')->name('add_ukk');
Route::post('/referensi/simpan-ukk', array('as' => 'referensi.simpan_ukk', 'uses' => 'ReferensiController@simpan_ukk'));
Route::get('/referensi/tambah-unit-ukk/{paket_ukk_id}', array('as' => 'referensi.tambah_unit_ukk', 'uses' => 'ReferensiController@tambah_unit_ukk'));
Route::get('/referensi/status-ukk/{id}', 'ReferensiController@status_ukk')->name('status_ukk');
Route::get('/referensi/detil-unit-ukk/{id}', 'ReferensiController@detil_unit_ukk')->name('detil_unit_ukk');
Route::get('/referensi/edit-paket-ukk/{id}', 'ReferensiController@edit_paket_ukk')->name('edit_paket_ukk');
Route::post('/referensi/update-ukk', array('as' => 'referensi.update_ukk', 'uses' => 'ReferensiController@update_ukk'));
//Perencanaan Start//
Route::get('/perencanaan/rasio', 'PerencanaanController@index')->name('rasio');
Route::post('/perencanaan/simpan-rasio', array('as' => 'simpan_rasio', 'uses' => 'PerencanaanController@simpan_rasio'));
Route::get('/perencanaan/pengetahuan', 'PerencanaanController@pengetahuan')->name('perencanaan_pengetahuan');
Route::get('/perencanaan/tambah-pengetahuan', 'PerencanaanController@tambah_pengetahuan');
Route::get('/perencanaan/keterampilan', 'PerencanaanController@keterampilan')->name('perencanaan_keterampilan');
Route::get('/perencanaan/tambah-keterampilan', 'PerencanaanController@tambah_keterampilan');
Route::post('/perencanaan/simpan-perencanaan', array('as' => 'simpan_perencanaan', 'uses' => 'PerencanaanController@simpan_perencanaan'));
Route::get('/perencanaan/list-rencana/{kompetensi_id}', array('as' => 'perencanaan.list_rencana', 'uses' => 'PerencanaanController@list_rencana'));
Route::get('/perencanaan/edit/{kompetensi_id}/{rencana_id}', array('as' => 'perencanaan.edit_rencana', 'uses' => 'PerencanaanController@edit_rencana'));
Route::get('/perencanaan/delete/{kompetensi_id}/{rencana_id}', array('as' => 'perencanaan.delete', 'uses' => 'PerencanaanController@delete'));
Route::get('/perencanaan/bobot', 'PerencanaanController@bobot')->name('list_bobot');
Route::post('/perencanaan/simpan-bobot', array('as' => 'simpan_bobot', 'uses' => 'PerencanaanController@simpan_bobot'));
Route::get('/perencanaan/ukk', 'PerencanaanController@ukk')->name('perencanaan_ukk');
Route::get('/perencanaan/tambah-ukk', 'PerencanaanController@tambah_ukk');
Route::post('/perencanaan/simpan-ukk', array('as' => 'perencanaan.simpan_ukk', 'uses' => 'PerencanaanController@simpan_ukk'));
Route::get('/perencanaan/list-ukk', array('as' => 'perencanaan.list_ukk', 'uses' => 'PerencanaanController@list_ukk'));
Route::get('/perencanaan/view-ukk/{ukk_id}', array('as' => 'perencanaan.view_ukk', 'uses' => 'PerencanaanController@view_ukk'));
Route::get('/perencanaan/delete-ukk/{ukk_id}', array('as' => 'perencanaan.delete_ukk', 'uses' => 'PerencanaanController@delete_ukk'));
//Perencanaan End//
//Penilaian Start//
Route::get('/penilaian/list-sikap', array('as' => 'penilaian.list_sikap', 'uses' => 'PenilaianController@list_sikap'));
Route::get('/penilaian/get-list-sikap', array('as' => 'penilaian.get_list_sikap', 'uses' => 'PenilaianController@get_list_sikap'));
Route::get('/penilaian/edit-sikap/{id}', array('as' => 'penilaian.edit_sikap', 'uses' => 'PenilaianController@edit_sikap'));
Route::get('/penilaian/delete-sikap/{id}', array('as' => 'penilaian.delete_sikap', 'uses' => 'PenilaianController@delete_sikap'));
Route::post('/penilaian/update-sikap', 'PenilaianController@update_sikap')->name('penilaian.update_sikap');
Route::get('/penilaian/{kompetensi_id}', array('as' => 'penilaian.form_penilaian', 'uses' => 'PenilaianController@index'));
Route::post('/penilaian/simpan-nilai', 'PenilaianController@simpan_nilai')->name('penilaian.simpan_nilai');
Route::post('/penilaian/simpan-nilai-ukk', 'PenilaianController@simpan_nilai_ukk')->name('penilaian.simpan_nilai_ukk');
Route::post('/penilaian/simpan_nilai_ekskul', 'PenilaianController@simpan_nilai_ekskul')->name('penilaian.simpan_nilai_ekskul');
Route::post('/penilaian/import_excel', 'PenilaianController@import_excel');
Route::get('/penilaian/delete-remedial/{remedial_id}', array('as' => 'penilaian.delete_remedial', 'uses' => 'PenilaianController@delete_remedial'));
//Penilaian End//
//Query Ajax Start//
Route::post('/ajax/get-rombel-filter', array('as' => 'ajax.get_rombel_filter', 'uses' => 'AjaxController@get_rombel_filter'));
Route::post('/ajax/get-rombel', array('as' => 'ajax.get_rombel', 'uses' => 'AjaxController@get_rombel'));
Route::post('/ajax/get-mapel', array('as' => 'ajax.get_mapel', 'uses' => 'AjaxController@get_mapel'));
Route::post('/ajax/get-teknik', array('as' => 'ajax.get_teknik', 'uses' => 'AjaxController@get_teknik'));
Route::post('/ajax/get-kd', array('as' => 'ajax.get_kd', 'uses' => 'AjaxController@get_kd'));
Route::post('/ajax/get-siswa', array('as' => 'ajax.get_siswa', 'uses' => 'AjaxController@get_siswa'));
Route::post('/ajax/get-rencana', array('as' => 'ajax.get_rencana', 'uses' => 'AjaxController@get_rencana'));
Route::post('/ajax/get-kd-nilai', array('as' => 'ajax.get_kd_nilai', 'uses' => 'AjaxController@get_kd_nilai'));
Route::post('/ajax/get-rerata', array('as' => 'ajax.get_rerata', 'uses' => 'AjaxController@get_rerata'));
Route::post('/ajax/get-kompetensi', array('as' => 'ajax.get_kompetensi', 'uses' => 'AjaxController@get_kompetensi'));
Route::post('/ajax/get-remedial', array('as' => 'ajax.get_remedial', 'uses' => 'AjaxController@get_remedial'));
Route::post('/ajax/get-sikap', array('as' => 'ajax.get_sikap', 'uses' => 'AjaxController@get_sikap'));
Route::get('/ajax/get-bobot/{pembelajaran_id}/{metode_id}', array('as' => 'ajax.get_bobot', 'uses' => 'AjaxController@get_bobot'));
Route::post('/ajax/get-rekap-nilai', array('as' => 'ajax.get_rekap_nilai', 'uses' => 'AjaxController@get_rekap_nilai'));
Route::post('/ajax/get-analisis-nilai', array('as' => 'ajax.get_analisis_nilai', 'uses' => 'AjaxController@get_analisis_nilai'));
Route::post('/ajax/get-kurikulum', array('as' => 'ajax.get_kurikulum', 'uses' => 'AjaxController@get_kurikulum'));
Route::post('/ajax/get-paket-tersimpan', array('as' => 'ajax.get_paket_tersimpan', 'uses' => 'AjaxController@get_paket_tersimpan'));
Route::post('/ajax/get-analisis-remedial', array('as' => 'ajax.get_analisis_remedial', 'uses' => 'AjaxController@get_analisis_remedial'));
Route::post('/ajax/get-anggota-ekskul', array('as' => 'ajax.get_anggota_ekskul', 'uses' => 'AjaxController@get_anggota_ekskul'));
Route::post('/ajax/filter-rombel-ekskul', array('as' => 'ajax.filter_rombel_ekskul', 'uses' => 'AjaxController@filter_rombel_ekskul'));
Route::post('/ajax/get-ppk', array('as' => 'ajax.get_ppk', 'uses' => 'AjaxController@get_ppk'));
Route::post('/ajax/get-prestasi', array('as' => 'ajax.get_prestasi', 'uses' => 'AjaxController@get_prestasi'));
Route::post('/ajax/get-paket-by-jurusan', array('as' => 'ajax.get_paket_by_jurusan', 'uses' => 'AjaxController@get_paket_by_jurusan'));
Route::post('/ajax/get-jurusan', array('as' => 'ajax.get_jurusan', 'uses' => 'AjaxController@get_jurusan'));
Route::post('/ajax/get-siswa-ukk', array('as' => 'ajax.get_siswa_ukk', 'uses' => 'AjaxController@get_siswa_ukk'));
Route::post('/ajax/get-siswa-nilai-ukk', array('as' => 'ajax.get_siswa_nilai_ukk', 'uses' => 'AjaxController@get_siswa_nilai_ukk'));
Route::post('/ajax/get-catatan-akademik', array('as' => 'ajax.get_catatan_akademik', 'uses' => 'AjaxController@get_catatan_akademik'));
Route::post('/ajax/get-kehadiran', array('as' => 'ajax.get_kehadiran', 'uses' => 'AjaxController@get_kehadiran'));
Route::post('/ajax/get-nilai-ekskul', array('as' => 'ajax.get_nilai_ekskul', 'uses' => 'AjaxController@get_nilai_ekskul'));
Route::post('/ajax/get-pkl', array('as' => 'ajax.get_pkl', 'uses' => 'AjaxController@get_pkl'));
Route::post('/ajax/get-kenaikan', array('as' => 'ajax.get_kenaikan', 'uses' => 'AjaxController@get_kenaikan'));
Route::post('/ajax/get-rapor-pts', array('as' => 'ajax.get_rapor_pts', 'uses' => 'AjaxController@get_rapor_pts'));
Route::post('/ajax/get-rapor-semester', array('as' => 'ajax.get_rapor_semester', 'uses' => 'AjaxController@get_rapor_semester'));
Route::post('/ajax/get-kd-analisis', array('as' => 'ajax.get_kd_analisis', 'uses' => 'AjaxController@get_kd_analisis'));
Route::post('/ajax/get-capaian-kompetensi', array('as' => 'ajax.get_capaian_kompetensi', 'uses' => 'AjaxController@get_capaian_kompetensi'));
Route::post('/ajax/get-analisis-individu', array('as' => 'ajax.get_analisis_individu', 'uses' => 'AjaxController@get_analisis_individu'));
Route::post('/ajax/get-legger', array('as' => 'ajax.get_legger', 'uses' => 'AjaxController@get_legger'));
//Query Ajax End//
Route::get('/penilaian/exportToExcel/{rencana_penilaian_id}', 'PenilaianController@exportToExcel');
//Monitoring Start//
Route::get('/monitoring/rekap-nilai/', 'MonitoringController@index');
Route::get('/monitoring/unduh-nilai/{pembelajaran_id}', 'MonitoringController@unduh_nilai');
Route::get('/monitoring/analisis-nilai/', 'MonitoringController@analisis_nilai');
Route::get('/monitoring/analisis-remedial/', 'MonitoringController@analisis_remedial');
Route::get('/monitoring/capaian-kompetensi/', 'MonitoringController@capaian_kompetensi');
Route::get('/monitoring/prestasi-individu/', 'MonitoringController@prestasi_individu');
//Monitoring End//
Route::get('/foo', function () {
	Artisan::call('ref_kd:start');
	echo Artisan::output();
});
//Laporan Start//
Route::get('/laporan/catatan-akademik', 'LaporanController@index');
Route::post('/laporan/simpan-catatan-akademik', array('as' => 'laporan.simpan_catatan_akademik', 'uses' => 'LaporanController@simpan_catatan_akademik'));
Route::get('/laporan/nilai-karakter', 'LaporanController@nilai_karakter');
Route::get('/laporan/list-nilai-karakter', 'LaporanController@list_nilai_karakter');
Route::get('/laporan/tambah-nilai-karakter', 'LaporanController@tambah_nilai_karakter');
Route::post('/laporan/simpan-nilai-karakter', array('as' => 'laporan.simpan_nilai_karakter', 'uses' => 'LaporanController@simpan_nilai_karakter'));
Route::get('/laporan/get-ppk', 'LaporanController@get_ppk');
Route::get('/laporan/detil-nilai-karakter/{catatan_ppk_id}', 'LaporanController@detil_karakter');
Route::get('/laporan/hapus-nilai-karakter/{catatan_ppk_id}', 'LaporanController@delete_karakter');
Route::get('/laporan/kehadiran', 'LaporanController@kehadiran');
Route::post('/laporan/simpan-kehadiran', array('as' => 'laporan.simpan_kehadiran', 'uses' => 'LaporanController@simpan_kehadiran'));
Route::get('/laporan/unduh-kehadiran/{rombongan_belajar_id}', 'LaporanController@unduh_kehadiran');
Route::get('/laporan/nilai-ekskul', 'LaporanController@nilai_ekskul');
Route::post('/laporan/simpan-nilai_ekskul', array('as' => 'laporan.simpan_nilai_ekskul', 'uses' => 'LaporanController@simpan_nilai_ekskul'));
Route::get('/laporan/pkl', 'LaporanController@pkl');
Route::post('/laporan/simpan-pkl', array('as' => 'laporan.simpan_pkl', 'uses' => 'LaporanController@simpan_pkl'));
Route::get('/laporan/prestasi', 'LaporanController@prestasi');
Route::get('/laporan/list-prestasi', 'LaporanController@list_prestasi');
Route::get('/laporan/tambah-prestasi', 'LaporanController@tambah_prestasi');
Route::post('/laporan/simpan-prestasi', array('as' => 'laporan.simpan_prestasi', 'uses' => 'LaporanController@simpan_prestasi'));
Route::get('/laporan/edit-prestasi/{id}', 'LaporanController@edit_prestasi');
Route::post('/laporan/update-prestasi', array('as' => 'laporan.update_prestasi', 'uses' => 'LaporanController@update_prestasi'));
Route::get('/laporan/delete-prestasi/{id}', ['as' => 'laporan.delete_prestasi', 'uses' => 'LaporanController@delete_prestasi']);
Route::get('/laporan/kenaikan', 'LaporanController@kenaikan');
Route::post('/laporan/simpan-kenaikan', array('as' => 'laporan.simpan_kenaikan', 'uses' => 'LaporanController@simpan_kenaikan'));
Route::get('/laporan/rapor-pts', 'LaporanController@rapor_pts');
Route::post('/laporan/cetak-pts', array('as' => 'laporan.cetak_pts', 'uses' => 'LaporanController@cetak_pts'));
Route::get('/laporan/rapor-semester', 'LaporanController@rapor_semester');
Route::get('/laporan/review-nilai/{query}/{id}', 'LaporanController@review_nilai');
Route::get('/laporan/review-desc/{query}/{id}', 'LaporanController@review_desc');
Route::get('/laporan/leger', 'LaporanController@legger');
Route::get('/laporan/unduh-leger-kd/{id}', 'LaporanController@unduh_legger_kd');
Route::get('/laporan/unduh-leger-nilai-akhir/{id}', 'LaporanController@unduh_legger_nilai_akhir');
Route::get('/laporan/unduh-leger-nilai-rapor/{id}', 'LaporanController@unduh_legger_nilai_rapor');
//Laporan End//
//Cetak Start//
Route::get('/cetak/generate-pdf', 'CetakController@generate_pdf');
Route::get('/cetak/sertifikat/{anggota_rombel_id}/{rencana_ukk_id}', 'CetakController@sertifikat');
Route::get('/cetak/rapor-pts/{rombongan_belajar_id}', 'CetakController@rapor_pts');
Route::get('/cetak/rapor-top/{query}/{id}', 'CetakController@rapor_top');
Route::get('/cetak/rapor-nilai/{query}/{id}', 'CetakController@rapor_nilai');
Route::get('/cetak/rapor-pendukung/{query}/{id}', 'CetakController@rapor_pendukung');
//Route::post('/cetak/rapor-pts', array('as' => 'cetak.rapor_pts', 'uses' => 'CetakController@rapor_pts'));
//Cetang End//
Route::get('/excel-pembelajaran', 'ExcelController@pembelajaran');
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/test', 'TestController@index');