<?php

use App\Livewire\Admin\CountryComponent;
use App\Models\Book;
use App\Livewire\ToDoList;
use App\Livewire\PracticeLivewire;
use App\Livewire\ToDoListComponent;
use App\Livewire\Admin\JobComponent;
use App\Livewire\Admin\HomeComponent;
use App\Livewire\Admin\UserComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DropdownComponent;
use App\Livewire\Admin\Post\PostListComponent;
use App\Livewire\DatabaseBackUp;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    $book = Book::query()->orderBy('code', 'desc')->skip(1)->first();

    return view('welcome');
});

Route::get('admin/dashboard', HomeComponent::class)->name('admin.dashboard');
Route::get('admin/user', UserComponent::class)->name('admin.user');
Route::get('admin/post-list', PostListComponent::class)->name('admin.post');
Route::get('admin/dropdown', DropdownComponent::class)->name('admin.dropdown');
Route::get('admin/jobs', JobComponent::class)->name('admin.jobs');
Route::get('admin/country', CountryComponent::class)->name('admin.country');
Route::get('admin/database-backup', DatabaseBackUp::class)->name('admin.database.backup');


Route::get('/practice', PracticeLivewire::class);
Route::get('/to-do-list', ToDoListComponent::class);
// Route::get('/to-do-list', ToDoListComponent::class);
