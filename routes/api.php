<?php

use Illuminate\Support\Facades\Route;

// In other to make the auth middleware to work on the api file, we need to keep the login
// route in the auth file which uses the web guard.
Route::middleware('auth.basic')->group(function () {
    //
});
