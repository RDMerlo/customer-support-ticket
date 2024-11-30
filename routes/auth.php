<?php

use Illuminate\Support\Facades\Route;

Route::auth(['register' => false, 'reset' => false, 'confirm' => false, 'verify' => false]);
