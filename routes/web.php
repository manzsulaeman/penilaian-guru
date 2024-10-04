<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('guru', GuruController::class);
Route::resource('dokumen', DokumenController::class);
Route::get('dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');
Route::resource('kriteria', KriteriaController::class);
Route::resource('penilaian', PenilaianController::class);
Route::resource('kehadiran', KehadiranController::class);
Route::resource('feedback', FeedbackController::class);
Route::get('laporan-kinerja', [LaporanKinerjaController::class, 'index'])->name('laporan.index');
Route::post('laporan-kinerja/show', [LaporanKinerjaController::class, 'show'])->name('laporan.show');
Route::get('laporan-kinerja/download/pdf', [LaporanKinerjaController::class, 'downloadPDF'])->name('laporan.download.pdf');
Route::get('laporan-kinerja/download/excel', [LaporanKinerjaController::class, 'downloadExcel'])->name('laporan.download.excel');
Route::resource('penilai', PenilaiController::class);

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('edit_profile');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('update_profile');

    Route::get('/manage-users', [AuthController::class, 'manageUsers'])->name('manage_users');
    Route::post('/manage-users/create', [AuthController::class, 'createUser'])->name('create_user');
    Route::delete('/manage-users/{user}', [AuthController::class, 'deleteUser'])->name('delete_user');
});
use App\Http\Controllers\SettingsController;

Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');
});
use App\Http\Controllers\HelpController;

Route::middleware(['auth'])->group(function () {
    Route::get('/help', [HelpController::class, 'index'])->name('help.index');
    Route::get('/help/contact', [HelpController::class, 'contact'])->name('help.contact');
    Route::post('/help/contact', [HelpController::class, 'submitContact'])->name('help.contact.submit');
});
use App\Http\Controllers\NotificationController;

Route::middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
