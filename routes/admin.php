<?php

Route::get('/home', function () {
	return redirect('/admin/dashboard');
})->name('home');

