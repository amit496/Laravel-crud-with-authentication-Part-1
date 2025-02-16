
    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\crud\CrudController;

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

    // Route::get('/', function () {
    //     return view('welcome');
    // });

    Route::get('/', [CrudController::class, 'index'])->name('form');
    Route::post('/submit_data', [CrudController::class, 'submit'])->name('submit.form');
    Route::get('/crud/data', [CrudController::class, 'showdata'])->name('view.data');
    Route::get('/updateform/{id}', [CrudController::class, 'updateview'])->name('updateview.data');
    Route::post('/updatesubmit/{id}', [CrudController::class, 'updatedate'])->name('updatesubmit.data');

    Route::get('/delete/{id}', [CrudController::class, 'deleterecord'])->name('delete.data');


// password
Route::get('/passwordform/{id}', [CrudController::class, 'passwordview'])->name('passwordview.data');
Route::post('/passwordupdatesubmit/{id}', [CrudController::class, 'updatepassword'])->name('passwordupdatesubmit.data');


