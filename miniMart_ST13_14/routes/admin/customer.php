<?php
Route::get('admin/customer', function () {
    $customer = \App\Models\Customer::selectRaw('tbluser.* , tblbook.bookID, tblstaff.staffID')
         ->leftJoin('tblbook', 'tbluser.bookID', '=', 'tblbook.bookID')
         ->leftJoin('tblstaff', 'tbluser.staffID', '=', 'tblstaff.staffID')
         ->get();

    return view('customer.customer', [
        'customer' => $customer, // Pass the customer data to the view
    ]);
})->name('customer');

// Route::get('admin/customer', function () {
//     $customer = \App\Models\Customer::selectRaw('tbluser.* , tblbook.bookID, tblstaff.staffID')
// ->leftJoin('tblbook', 'tbluser.bookID', '=', 'tblbook.bookID')
// ->leftJoin('tblstaff', 'tbluser.staffID', '=', 'tblstaff.staffID')
// ->get();


//     dd($customer); // Check the data
// })->name('customer');




Route::get('admin/index_add_customer', function () {
    return view('customer.add');
})->name('index_add_customer');

Route::post('admin/create_customer', [\App\Http\Controllers\UserController::class, 'createUser'])
    ->name('create_customer');

Route::get('admin/index_edit_customer', [\App\Http\Controllers\UserController::class, 'indexUpdateUser'])
    ->name('index_edit_customer');
Route::post('admin/update_customer', [\App\Http\Controllers\UserController::class, 'updateUser'])
    ->name('update_customer');

Route::post('admin/delete_customer', [\App\Http\Controllers\UserController::class, 'deleteUser'])
    ->name('delete_customer');
