<?php

use App\Http\Controllers\Appointment\AppointmentController;
use App\Http\Controllers\Clinic\ClinicAdminController;
use App\Http\Controllers\Clinic\ClinicController;
use App\Http\Controllers\Department\DepartmentAdminController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Schedule\ScheduleController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\Team\TeamMemberController;
use App\Models\DepartmentAdmin;
use Illuminate\Support\Facades\Route;

// In other to make the auth middleware to work on the api file, we need to keep the login
// route in the auth file which uses the web guard.
Route::middleware('auth')->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('index.appointments');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('store.appointment');
    Route::get('/appointment/{id}', [AppointmentController::class, 'show'])->name('show.appointment');
    Route::put('/appointment/{id}', [AppointmentController::class, 'update'])->name('update.appointment');

    // Clinic routes
    Route::get('/clinics', [ClinicController::class, 'index'])->name('index.clinic');
    Route::post('/clinic', [ClinicController::class, 'store'])->name('store.clinic');
    Route::get('/clinic/{id}', [ClinicController::class, 'show'])->name('show.clinic');
    Route::put('/clinic/{id}', [ClinicController::class, 'update'])->name('update.clinic');

    // Clinic Admin routes
    Route::get('/clinic-admins', [ClinicAdminController::class, 'index'])->name('index.clinic-admin');
    Route::post('/clinic-admin', [ClinicAdminController::class, 'store'])->name('create.clinic-admin');
    Route::get('/clinic-admin/{id}', [ClinicAdminController::class, 'show'])->name('show.clinic-admin');
    Route::put('/clinic-admin/{id}', [ClinicAdminController::class, 'update'])->name('update.clinic-admin');

    // Department routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('index.department');
    Route::post('/department', [DepartmentController::class, 'store'])->name('store.department');
    Route::get('/department/{id}', [DepartmentController::class, 'show'])->name('show.department');
    Route::put('/department/{id}', [DepartmentController::class, 'update'])->name('update.department');

    // Department Admin routes
    Route::get('/department-admins', [DepartmentAdminController::class, 'index'])->name('index.department-admin');
    Route::post('/department-admin', [DepartmentAdminController::class, 'store'])->name('create.department-admin');
    Route::get('/department-admin/{id}', [DepartmentAdminController::class, 'show'])->name('show.department-admin');
    Route::put('/department-admin/{id}', [DepartmentAdminController::class, 'update'])->name('update.department-admin');

    // Team Member routes
    Route::get('/team-member', [TeamMemberController::class, 'index'])->name('index.team-member');
    Route::post('/team-member', [TeamMemberController::class, 'store'])->name('create.team-member');
    Route::get('/team-member/{id}', [TeamMemberController::class, 'show'])->name('show.team-member');
    Route::put('/team-member/{id}', [TeamMemberController::class, 'update'])->name('update.team-member');

    // Schedule routes
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('index.schedule');
    Route::post('/schedule', [ScheduleController::class, 'store'])->name('store.schedule');
    Route::get('/schedule/{id}', [ScheduleController::class, 'show'])->name('show.schedule');
    Route::put('/schedule/{id}', [ScheduleController::class, 'update'])->name('update.schedule');

    // Patient routes
    Route::get('/patients', [PatientController::class, 'index'])->name('index.patient');
    Route::post('/patient', [PatientController::class, 'store'])->name('store.patient');
    Route::get('/patient/{id}', [PatientController::class, 'show'])->name('show.patient');
    Route::put('/patient/{id}', [PatientController::class, 'update'])->name('update.patient');

    // Appointment routes
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('index.appointment');
    Route::post('/appointment', [ClinicController::class, 'store'])->name('store.appointment');
    Route::get('/appointment/{id}', [ClinicController::class, 'show'])->name('show.appointment');
    Route::put('/appointment/{id}', [ClinicController::class, 'update'])->name('update.appointment');

    // Team routes
    Route::get('/teams', [TeamController::class, 'index'])->name('index.team');
    Route::post('/team', [TeamController::class, 'store'])->name('store.team');
    Route::get('/team/{id}', [TeamController::class, 'show'])->name('show.team');
    Route::put('/team/{id}', [TeamController::class, 'update'])->name('update.team');

});
