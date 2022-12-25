<?php  
    // muc dich su ly route trang admin

    use App\Http\Controllers\admin\DashboardController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Admin\LoginController;

    Route::prefix('admin')
        ->as('admin.')
        ->group(function ()
        {
            Route::get('login',[LoginController::class,'index'])->name('login')->middleware('check.admin.isLogin');
            Route::post('handle-login',[LoginController::class,'handle'])->name('handle.login');
            Route::post('logout',[LoginController::class,'logout'])->name('logout');
        });
    Route::prefix('admin')
        ->as('admin.')
        // tất cả đều đi qua middleware 
        ->middleware('check.admin.login')
        ->group(function ()
        {
            Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
        });


