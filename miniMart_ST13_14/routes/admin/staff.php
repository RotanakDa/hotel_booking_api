<?php
Route::get('admin/staff', function () {
    $staff = \App\Models\Staff::selectRaw('tblstaff.*, tblroom.roomID AS RoomID')
        ->leftJoin('tblroom', 'tblstaff.roomID', '=', 'tblroom.roomID')
        ->get();

    return view('staff.staff', [
        'staff' => $staff,
    ]);
})->name('staff');


Route::get('admin/index_add_staff', function () {
    return view('staff.add');
})->name('index_add_staff');

Route::post('admin/create_staff', [\App\Http\Controllers\UserController::class, 'createUser'])
    ->name('create_staff');

Route::get('admin/index_edit_staff', [\App\Http\Controllers\UserController::class, 'indexUpdateUser'])
    ->name('index_edit_staff');
Route::post('admin/update_staff', [\App\Http\Controllers\UserController::class, 'updateUser'])
    ->name('update_staff');

Route::post('admin/delete_staff', [\App\Http\Controllers\UserController::class, 'deleteUser'])
    ->name('delete_staff');
