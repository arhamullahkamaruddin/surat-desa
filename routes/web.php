<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SuperAdmin\VillageProfileController;
use App\Http\Controllers\Admin\JenisSuratController;
use App\Http\Controllers\SuperAdmin\SuratFieldController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PengajuanSuratController as UserPengajuanSuratController;
use App\Http\Controllers\Admin\PengajuanSuratController as AdminPengajuanSuratController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\UserController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

/*
|--------------------------------------------------------------------------
| Halaman Utama User / Publik
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/*
|--------------------------------------------------------------------------
| Redirect Dashboard Berdasarkan Role
|--------------------------------------------------------------------------
| Breeze setelah login akan mengarah ke route bernama dashboard.
| Dari sini user diarahkan sesuai role masing-masing.
*/
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'superadmin') {
        return redirect()->route('superadmin.dashboard');
    }

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Route User
|--------------------------------------------------------------------------
| User adalah warga yang bisa mengajukan surat dan melihat riwayat suratnya.
| Untuk sementara route-nya masih placeholder.
*/
Route::middleware(['auth', 'verified', 'role:user', 'profile.completed'])
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get(
            '/pengajuan-surat',
            [UserPengajuanSuratController::class, 'index']
        )->name('pengajuan.index');

        Route::get(
            '/pengajuan-surat/{jenisSurat}',
            [UserPengajuanSuratController::class, 'create']
        )->name('pengajuan.create');

        Route::post(
            '/pengajuan-surat/{jenisSurat}',
            [UserPengajuanSuratController::class, 'store']
        )->name('pengajuan.store');

        Route::get(
            '/pengajuan-saya/{pengajuanSurat}',
            [UserPengajuanSuratController::class, 'show']
        )->name('pengajuan.show');
    });

/*
|--------------------------------------------------------------------------
| Route Admin
|--------------------------------------------------------------------------
| Admin dapat mengakses dashboard admin.
| Superadmin juga boleh masuk ke area admin.
*/

Route::middleware(['auth', 'verified', 'role:admin,superadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');

        Route::resource(
            'user',
            AdminUserController::class
        );

        Route::get(
            '/pengajuan-surat',
            [AdminPengajuanSuratController::class, 'index']
        )->name('pengajuan.index');

        Route::get(
            '/pengajuan-surat/status/{status}',
            [AdminPengajuanSuratController::class, 'byStatus']
        )->name('pengajuan.status.filter');

        Route::get(
            '/pengajuan-surat/{pengajuanSurat}/preview',
            [AdminPengajuanSuratController::class, 'preview']
        )->name('pengajuan.preview');

        Route::get(
            '/pengajuan-surat/{pengajuanSurat}/download',
            [AdminPengajuanSuratController::class, 'download']
        )->name('pengajuan.download');

        Route::get(
            '/pengajuan-surat/{pengajuanSurat}',
            [AdminPengajuanSuratController::class, 'show']
        )->name('pengajuan.show');

        Route::put(
            '/pengajuan-surat/{pengajuanSurat}/status',
            [AdminPengajuanSuratController::class, 'updateStatus']
        )->name('pengajuan.status');

        Route::put(
            '/pengajuan-surat/{pengajuanSurat}/detail',
            [AdminPengajuanSuratController::class, 'updateDetail']
        )->name('pengajuan.detail.update');

        Route::get(
            '/admin/{admin}',
            [AdminController::class, 'show']
        )->name('admin.show');
    });

/*
|--------------------------------------------------------------------------
| Route Superadmin
|--------------------------------------------------------------------------
| Superadmin memiliki akses tertinggi.
*/
Route::middleware(['auth', 'verified', 'role:superadmin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {
        Route::get(
            '/dashboard',
            [SuperAdminDashboardController::class, 'index']
        )->name('dashboard');

        Route::resource(
            'admin',
            AdminController::class
        );

        Route::resource(
            'user',
            UserController::class
        );

        Route::get('/pengaturan-desa', [VillageProfileController::class, 'edit'])
            ->name('village-profile.edit');

        Route::put('/pengaturan-desa', [VillageProfileController::class, 'update'])
            ->name('village-profile.update');

        Route::resource(
            'jenis-surat',
            JenisSuratController::class
        );

        Route::get(
            '/jenis-surat/{jenisSurat}/fields',
            [SuratFieldController::class, 'index']
        )->name('jenis-surat.fields.index');

        Route::get(
            '/jenis-surat/{jenisSurat}/fields/create',
            [SuratFieldController::class, 'create']
        )->name('jenis-surat.fields.create');

        Route::post(
            '/jenis-surat/{jenisSurat}/fields',
            [SuratFieldController::class, 'store']
        )->name('jenis-surat.fields.store');

        Route::get(
            '/jenis-surat/{jenisSurat}/fields/{field}/edit',
            [SuratFieldController::class, 'edit']
        )->name('jenis-surat.fields.edit');

        Route::put(
            '/jenis-surat/{jenisSurat}/fields/{field}',
            [SuratFieldController::class, 'update']
        )->name('jenis-surat.fields.update');

        Route::delete(
            '/jenis-surat/{jenisSurat}/fields/{field}',
            [SuratFieldController::class, 'destroy']
        )->name('jenis-surat.fields.destroy');

        Route::get(
            '/user/{user}',
            [UserController::class, 'show']
        )->name('user.show');
    });

/*
|--------------------------------------------------------------------------
| Profile Breeze
|--------------------------------------------------------------------------
| Profile bisa diakses semua role yang sudah login.
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::patch(
        '/profile/biodata',
        [ProfileController::class, 'updateBiodata']
    )->name('profile.biodata.update');
});

require __DIR__ . '/auth.php';
