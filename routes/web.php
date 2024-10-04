<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\KehadiranController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LaporanKinerjaController;
use App\Http\Controllers\PenilaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\NotificationController;

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Resource Routes
Route::resource('guru', GuruController::class);
Route::resource('dokumen', DokumenController::class);
Route::resource('kriteria', KriteriaController::class);
Route::resource('penilaian', PenilaianController::class);
Route::resource('kehadiran', KehadiranController::class);
Route::resource('feedback', FeedbackController::class);
Route::resource('penilai', PenilaiController::class);

// Custom Dokumen Download Route
Route::get('dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');

// Laporan Kinerja Routes
Route::get('laporan-kinerja', [LaporanKinerjaController::class, 'index'])->name('laporan.index');
Route::post('laporan-kinerja/show', [LaporanKinerjaController::class, 'show'])->name('laporan.show');
Route::get('laporan-kinerja/download/pdf', [LaporanKinerjaController::class, 'downloadPDF'])->name('laporan.download.pdf');
Route::get('laporan-kinerja/download/excel', [LaporanKinerjaController::class, 'downloadExcel'])->name('laporan.download.excel');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Profile Management
    Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('edit_profile');
    Route::put('/profile/update', [AuthController::class, 'updateProfile'])->name('update_profile');

    // User Management for Admins
    Route::get('/manage-users', [AuthController::class, 'manageUsers'])->name('manage_users');
    Route::post('/manage-users/create', [AuthController::class, 'createUser'])->name('create_user');
    Route::delete('/manage-users/{user}', [AuthController::class, 'deleteUser'])->name('delete_user');

    // Settings Routes
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/update', [SettingsController::class, 'update'])->name('settings.update');

    // Help and Documentation Routes
    Route::get('/help', [HelpController::class, 'index'])->name('help.index');
    Route::get('/help/contact', [HelpController::class, 'contact'])->name('help.contact');
    Route::post('/help/contact', [HelpController::class, 'submitContact'])->name('help.contact.submit');

    // Notification Routes
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
});
