<?php

use App\Livewire\Admin\PendingForms;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Http\Request;
use App\Livewire\ApplicantRegistration;
use App\Http\Controllers\Pdf\PdfController;

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
    Route::get('application-form', ApplicantRegistration::class)->name('application.form');
    Route::get('pending-forms', PendingForms::class)->name('admin.pending');
    Route::get('/applicant/acknowledgement/{id}', [PdfController::class, 'download'])
    ->name('applicant.acknowledgement')->middleware('auth');
});
require __DIR__ . '/auth.php';
