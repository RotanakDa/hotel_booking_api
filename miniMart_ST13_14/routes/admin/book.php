<?php
Route::get('admin/book', function () {
    $book = \App\Models\Book::selectRaw('tblbook.*')
         ->get();

    return view('book.book', [
        'book' => $book, // Pass the customer data to the view
    ]);
})->name('book');

Route::get('admin/index_add_book', function () {
    return view('book.add', [
        'category' => \App\Models\Category::all(),
    ]);
})->name('index_add_book');

Route::post('admin/create_book', [\App\Http\Controllers\ProductController::class, 'createProduct'])
    ->name('create_book');

Route::get('admin/index_edit_book', [\App\Http\Controllers\ProductController::class, 'indexUpdateProduct'])
    ->name('index_edit_book');

Route::post('admin/update_book', [\App\Http\Controllers\ProductController::class, 'updateProduct'])
    ->name('update_book');

Route::get('admin/delete_book', [\App\Http\Controllers\ProductController::class, 'deleteProduct'])
    ->name('delete_book');
