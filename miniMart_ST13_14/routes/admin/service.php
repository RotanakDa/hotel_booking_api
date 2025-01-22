<?php
Route::get('admin/service', function () {
    // Fetch room types with their related service data
    $service = \App\Models\Service::selectRaw('tblservice.*')
        ->get();

    return view('servicepage.service', [
        'service' => $service, // Pass the correct variable to the view
    ]);
})->name('service');

Route::get('admin/index_add_service', function () {
    return view('service.add', [
        'category' => \App\Models\Category::all(),
    ]);
})->name('index_add_service');

Route::post('admin/create_service', [\App\Http\Controllers\ProductController::class, 'createProduct'])
    ->name('create_service');

Route::get('admin/index_edit_service', [\App\Http\Controllers\ProductController::class, 'indexUpdateProduct'])
    ->name('index_edit_service');

Route::post('admin/update_service', [\App\Http\Controllers\ProductController::class, 'updateProduct'])
    ->name('update_service');

Route::get('admin/delete_service', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->name('delete_service');
