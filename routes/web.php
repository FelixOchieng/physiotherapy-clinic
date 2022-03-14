<?php

use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\TherapyRoomController;


Route::get('/', [LoginController::class, 'showLoginForm'])->name('site-root');
Auth::routes();

Route::get('/admin/home', [HomeController::class, 'admin'])->name('admin.home');
Route::get('/user/home', [HomeController::class, 'user'])->name('user.home');

Route::resource('/role', RolesController::class)->except(['show']);
Route::resource('/permission', PermissionsController::class)->except(['show']);
Route::get('user/therapists', [UsersController::class, 'therapist'])->name('user.therapist');
Route::resource('/user', UsersController::class)->except(['create', 'store']);
Route::resource('/client', ClientController::class)->except(['show']);
Route::resource('/therapy-room', TherapyRoomController::class)->except(['show']);
Route::resource('/appointment', AppointmentController::class)->except(['show']);
Route::post('appointment/mark-ongoing/{appointment}', [AppointmentController::class, 'markAppointmentAsOngoing'])->name('appointment.mark-ongoing');
Route::post('appointment/mark-complete/{appointment}', [AppointmentController::class, 'markAppointmentAsComplete'])->name('appointment.mark-complete');
