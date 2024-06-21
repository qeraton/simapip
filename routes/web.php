<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController as Auth,
    DaftarPenugasanController as DaftarPenugasan,
    DashboardController as Dashboard,
    DataPegawaiController as DataPegawai,
    JenisPengawasanController as JenisPengawasan,
    StrataPendidikanController as StrataPendidikan,
    UnitKerjaController as UnitKerja,
    ObyekController as Obyek,
    jenjangJabatanController as jenJabatan,
    jabatanController as jabatan,
    pangkatController as pangkat,
    profileController as profile,
    UserController as Users,
    PKPTController as PKPT,
    RPKHController as RPKH,
    ReviuController as Reviu,
    KartuPenugasanController as KartuPenugasan,
};


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/getRoutes', function () {
    $routes = collect(Route::getRoutes())->map(function ($route) {
        return $route->getName();
    })->filter(function ($name) {
        return !is_null($name) && $name != 'getRoutes'; // Menghindari rute tanpa nama dan rute /getRoutes sendiri
    })->values();

    return response()->json($routes);
});

Route::get('/', [Auth::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [Auth::class, 'login'])->name('login.call');
Route::post('/logout', [Auth::class, 'logout'])->name('logout');

Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::group(['middleware' => ['authenticated']], function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/logout', [Auth::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/ubah-password', [Users::class, 'showChangePasswordForm'])->name('showChangePassword');
        Route::patch('/mengubah-password', [Users::class, 'changePassword'])->name('changePassword');
    })->name('user');

    Route::group(['prefix' => 'pegawai'], function () {
        Route::get('/', [DataPegawai::class, 'index'])->name('index');
        Route::get('/list', [DataPegawai::class, 'listPegawai'])->name('list');
        Route::get('/{id}/profile', [DataPegawai::class, 'profilePegawai'])->name('profile');
    })->name('pegawai');

    Route::group(['prefix' => 'jenis-pengawasan'], function () {
        Route::get('/', [JenisPengawasan::class, 'index'])->name('index');
        Route::get('/create', [JenisPengawasan::class, 'create'])->name('create');
        Route::get('/list', [JenisPengawasan::class, 'list'])->name('list');
        Route::post('/store', [JenisPengawasan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [JenisPengawasan::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [JenisPengawasan::class, 'update'])->name('update');
        Route::delete('delete/{id}', [JenisPengawasan::class, 'destroy'])->name('delete');
    })->name('jenis-pengawasan');

    Route::group(['prefix' => 'daftar-penugasan'], function () {
        Route::get('/', [DaftarPenugasan::class, 'index'])->name('index');
        Route::get('/create', [DaftarPenugasan::class, 'create'])->name('create');
        Route::post('/store', [DaftarPenugasan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [DaftarPenugasan::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [DaftarPenugasan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [DaftarPenugasan::class, 'destroy'])->name('delete');
    })->name('daftar-penugasan');

    Route::group(['prefix' => 'obyek'], function () {
        Route::get('/', [Obyek::class, 'index'])->name('index');
        Route::get('/list', [Obyek::class, 'listObyek'])->name('list');
        Route::get('/create', [Obyek::class, 'create'])->name('create');
        Route::post('/store', [Obyek::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Obyek::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [Obyek::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [Obyek::class, 'destroy'])->name('delete');
    })->name('obyek');

    Route::group(['prefix' => 'strata-pendidikan'], function () {
        Route::get('/', [StrataPendidikan::class, 'index'])->name('index');
        Route::get('/create', [StrataPendidikan::class, 'create'])->name('create');
        Route::post('/store', [StrataPendidikan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [StrataPendidikan::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [StrataPendidikan::class, 'update'])->name('update');
        Route::delete('delete/{id}', [StrataPendidikan::class, 'destroy'])->name('delete');
    })->name('strata-pendidikan');

    Route::group(['prefix' => 'unit-kerja'], function () {
        Route::get('/', [UnitKerja::class, 'index'])->name('index');
        Route::get('/create', [UnitKerja::class, 'create'])->name('create');
        Route::post('/store', [UnitKerja::class, 'store'])->name('store');
        Route::get('/edit/{id}', [UnitKerja::class, 'edit'])->name('edit');
        Route::patch('update/{id}', [UnitKerja::class, 'update'])->name('update');
        Route::delete('delete/{id}', [UnitKerja::class, 'destroy'])->name('delete');
    })->name('unit-kerja');

    Route::group(['prefix' => 'jenjangJabatan'], function () {
        Route::get('/', [jenJabatan::class, 'index'])->name('index');
        Route::get('/list', [jenJabatan::class, 'listjenjangJabatan'])->name('list');
        Route::get('/create', [jenJabatan::class, 'create'])->name('create');
        Route::post('/store', [jenJabatan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [jenJabatan::class, 'edit'])->name('edit');
        Route::get('/selectIDJabatan', [jenJabatan::class, 'selectIDJabatan'])->name('selectIDJabatan');
        Route::patch('/update/{id}', [jenJabatan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [jenJabatan::class, 'destroy'])->name('delete');
    })->name('jenjangJabatan');

    Route::group(['prefix' => 'jabatan'], function () {
        Route::get('/', [jabatan::class, 'index'])->name('index');
        Route::get('/list', [jabatan::class, 'listJabatan'])->name('list');
        Route::get('/create', [jabatan::class, 'create'])->name('create');
        Route::post('/store', [jabatan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [jabatan::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [jabatan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [jabatan::class, 'destroy'])->name('delete');
    })->name('jabatan');

    Route::group(['prefix' => 'pangkat'], function () {
        Route::get('/', [pangkat::class, 'index'])->name('index');
        Route::get('/list', [pangkat::class, 'listPangkat'])->name('list');
        Route::get('/create', [pangkat::class, 'create'])->name('create');
        Route::post('/store', [pangkat::class, 'store'])->name('store');
        Route::get('/edit/{id}', [pangkat::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [pangkat::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [pangkat::class, 'destroy'])->name('delete');
    })->name('pangkat');

    Route::group(['prefix' => 'kartu-penugasan'], function () {
        Route::get('/', [KartuPenugasan::class, 'index'])->name('index');
        Route::get('/kartu-penugasan/{id}', [KartuPenugasan::class, 'show'])->name('show');
        Route::get('/create', [KartuPenugasan::class, 'create'])->name('create');
        Route::post('/store', [KartuPenugasan::class, 'store'])->name('store');
        Route::get('/edit/{id}', [KartuPenugasan::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [KartuPenugasan::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [KartuPenugasan::class, 'destroy'])->name('delete');
    })->name('kartu-penugasan');

    Route::group(['prefix' => 'PKPT'], function () {
        Route::get('/', [PKPT::class, 'index'])->name('index');
        Route::get('/get-unit-kerja', [PKPT::class, 'getUnitKerja'])->name('getUnitKerja');
        Route::get('/create', [PKPT::class, 'create'])->name('create');
        Route::post('/store', [PKPT::class, 'store'])->name('store');
        Route::get('/edit/{id}/', [PKPT::class, 'edit'])->name('edit');
        Route::patch('/update/{id}/', [PKPT::class, 'update'])->name('update');
        Route::delete('/delete/{id}/', [PKPT::class, 'destroy'])->name('delete');
    })->name('PKPT');

    Route::group(['prefix' => 'RPKH'], function () {
        Route::get('/', [RPKH::class, 'index'])->name('index');
        Route::get('/RPKH/{id}', [RPKH::class, 'show'])->name('show');
        Route::get('/list', [RPKH::class, 'listRPKH'])->name('list');
        Route::get('/create', [RPKH::class, 'create'])->name('create');
        Route::post('/store', [RPKH::class, 'store'])->name('store');
        Route::get('/edit/{id}', [RPKH::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [RPKH::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [RPKH::class, 'destroy'])->name('delete');
    })->name('RPKH');

    Route::group(['prefix' => 'Reviu'], function () {
        Route::get('/', [Reviu::class, 'index'])->name('index');
        Route::get('/Reviu/{id}', [Reviu::class, 'show'])->name('show');
        Route::get('/create', [Reviu::class, 'create'])->name('create');
        Route::post('/store', [Reviu::class, 'store'])->name('store');
        Route::get('/edit/{id}', [Reviu::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [Reviu::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [Reviu::class, 'destroy'])->name('delete');
    })->name('Reviu');

    Route::group(['prefix' => 'my-profile'], function () {
        Route::get('/', [profile::class, 'index'])->name('index');
        Route::get('/list', [profile::class, 'listPangkat'])->name('list');
        Route::get('/create', [profile::class, 'create'])->name('create');
        Route::post('/store', [profile::class, 'store'])->name('store');
        Route::get('/edit/{id}', [profile::class, 'edit'])->name('edit');
        Route::patch('/update/{id}', [profile::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [profile::class, 'destroy'])->name('delete');
    })->name('my-profile');

    Route::group(['middleware' => ['isAdmin']], function () {
        Route::resource('permissions', App\Http\Controllers\PermissionController::class);
        Route::delete('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

        Route::resource('roles', App\Http\Controllers\RoleController::class);
        Route::delete('roles/{rolesId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
        // ->middleware('permission::Delete Role');
        Route::get('roles/{rolesId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
        Route::put('roles/{rolesId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

        Route::resource('users', App\Http\Controllers\UserController::class);
        Route::delete('users/{usersId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
    });
})->name("simapip");
