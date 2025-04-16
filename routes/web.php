<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

if (config('app.app_sync')) {
    Route::get('/', 'LandingController@index')->name('/');
}
Route::get('/income-expense-chart-data', 'Admin\Academics\SmClassRoutineNewController@getIncomeExpenseData');

if (moduleStatusCheck('Saas')) {
    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}.' . config('app.short_url')], function ($routes) {
        require('tenant.php');
    });

    Route::group(['middleware' => ['subdomain'], 'domain' => '{subdomain}'], function ($routes) {
        require('tenant.php');
    });
}

Route::group(['middleware' => ['subdomain']], function ($routes) {
    require('tenant.php');
});

Route::get('migrate', function () {
    if(Auth::check() && Auth::id() == 1){
        \Artisan::call('migrate', ['--force' => true]);
        \Brian2694\Toastr\Facades\Toastr::success('Migration run successfully');
        return redirect()->to(url('/admin-dashboard'));
    }
    abort(404);
});


Route::post('editor/upload-file', 'UploadFileController@upload_image');
