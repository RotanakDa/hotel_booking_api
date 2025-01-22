<?php
Route::get('admin/room', function () {
    $room = \App\Models\Room::join('tblroomtype', 'tblroom.roomTypeID', '=', 'tblroomtype.roomTypeID')
        ->select('tblroom.*', 'tblroomtype.roomName as room_name')
        ->get();

    return view('room.room', [
        'room'=>$room,
    ]);
})->name('room');

Route::get('admin/index_add_room', function () {
    return view('room.add', [
        'category' => \App\Models\Category::all(),
    ]);
})->name('index_add_room');

Route::post('admin/create_room', [\App\Http\Controllers\ProductController::class, 'createProduct'])
    ->name('create_room');

Route::get('admin/index_edit_room', [\App\Http\Controllers\ProductController::class, 'indexUpdateProduct'])
    ->name('index_edit_room');

Route::post('admin/update_room', [\App\Http\Controllers\ProductController::class, 'updateProduct'])
    ->name('update_room');

Route::get('admin/delete_room', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->name('delete_room');
