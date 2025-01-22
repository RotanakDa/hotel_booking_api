<?php
Route::get('admin/roomtype', function () {
    // Fetch room types with their related service data
    $roomtype = \App\Models\RoomType::selectRaw('tblroomtype.*, tblservice.serviceID AS serviceID')
        ->leftJoin('tblservice', 'tblroomtype.serviceID', '=', 'tblservice.serviceID')
        ->get();

    return view('roomtype.roomtype', [
        'roomtype' => $roomtype, // Pass the correct variable to the view
    ]);
})->name('roomtype');


Route::get('admin/index_add_roomtype', function () {
    return view('roomtype.add', [
        'category' => \App\Models\Category::all(),
    ]);
})->name('index_add_roomtype');

Route::post('admin/create_roomtype', [\App\Http\Controllers\ProductController::class, 'createProduct'])
    ->name('create_roomtype');

Route::get('admin/index_edit_roomtype', [\App\Http\Controllers\ProductController::class, 'indexUpdateProduct'])
    ->name('index_edit_roomtype');

Route::post('admin/update_roomtype', [\App\Http\Controllers\ProductController::class, 'updateProduct'])
    ->name('update_roomtype');

Route::get('admin/delete_roomtype', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->name('delete_roomtype');
