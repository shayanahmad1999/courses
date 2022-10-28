<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseDetailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/backend', function () {
    return view('backend.welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

require __DIR__ . '/auth.php';


//:::::::::::::: Admin Login ::::::::::::::::::://
Route::get('/backend/admin/adminlogin', [AdminController::class, 'create'])->name('backend.admin.adminlogin');
Route::post('/backend/admin/adminlogincheck', [AdminController::class, 'loginstore'])->name('backend.admin.adminlogincheck');
Route::get('/backend/admin/logouts', [AdminController::class, 'adminlogout'])->name('backend.admin.logouts');

Route::group(['middleware' => ['AdminAuth']], function () {
    
    Route::get('/backend/home', [AdminController::class, 'homeview'])->name('backend.home');

    Route::get('/backend/admin/addAdmin', [AdminController::class, 'viewform'])->name('backend.admin.addAdmin');
    Route::post('/backend/admin/addAdmin', [AdminController::class, 'store'])->name('backend.admin.addAdmin');
    Route::get('/backend/admin/viewAdmin', [AdminController::class, 'view'])->name('backend.admin.viewAdmin');
    Route::get('/backend/admin/editAdmin/{id}', [AdminController::class, 'edit'])->name('backend.admin.editAdmin');
    Route::post('/backend/admin/updateAdmin/{id}', [AdminController::class, 'update'])->name('backend.admin.updateAdmin');
    Route::get('/backend/admin/ChangeStatus/{id}', [AdminController::class, 'Status'])->name('backend.admin.ChangeStatus');
    Route::get('/backend/admin/deleteAdmin/{id}', [AdminController::class, 'delete'])->name('backend.admin.deleteAdmin');
    Route::get('/backend/admin/trashAdmin', [AdminController::class, 'trash'])->name('backend.admin.trashAdmin');
    Route::get('/backend/admin/restoreAdmin/{id}', [AdminController::class, 'restore'])->name('backend.admin.restoreAdmin');
    Route::get('/backend/admin/forcedeleteAdmin/{id}', [AdminController::class, 'forcedelete'])->name('backend.admin.forcedeleteAdmin');

    Route::get('/backend/user/addUser', [UserController::class, 'userform'])->name('backend.user.addUser');
    Route::post('/backend/user/addUser', [UserController::class, 'userstore'])->name('backend.user.addUser');
    Route::get('/backend/user/viewUser', [UserController::class, 'userview'])->name('backend.user.viewUser');
    Route::get('/backend/user/editUser/{id}', [UserController::class, 'useredit'])->name('backend.user.editUser');
    Route::post('/backend/user/updateUser/{id}', [UserController::class, 'userupdate'])->name('backend.user.updateUser');
    Route::get('/backend/user/trashUser/{id}', [UserController::class, 'usertrash'])->name('backend.user.trashUser');
    Route::get('/backend/user/trashUser', [UserController::class, 'viewusertrash'])->name('backend.user.trashUser');
    Route::get('/backend/user/restoreUser/{id}', [UserController::class, 'userrestore'])->name('backend.user.restoreUser');
    Route::get('/backend/user/forceDeleteUser/{id}', [UserController::class, 'userforcedelete'])->name('backend.user.forceDeleteUser');

    Route::get('/backend/courses/addcourse',[CourseController::class,'courseform'])->name('backend.courses.addcourse');
    Route::post('/backend/courses/storecourse',[CourseController::class,'coursestore'])->name('backend.courses.storecourse');
    Route::get('/backend/courses/viewcourse',[CourseController::class,'coursview'])->name('backend.courses.viewcourse');
    Route::get('/backend/courses/deletecourse/{id}',[CourseController::class,'coursedelete'])->name('backend.courses.deletecourse');
    Route::get('/backend/courses/statuschange/{id}',[CourseController::class,'changestatus'])->name('backend.courses.statuschange');
    Route::get('/backend/courses/editcourse/{id}',[CourseController::class,'courseedit'])->name('backend.courses.editcourse');
    Route::post('/backend/courses/updatecourse/{id}',[CourseController::class,'courseupdate'])->name('backend.courses.updatecourse');

    Route::get('/backend/contact/viewcontact',[ContactController::class,'contactview'])->name('backend.contact.viewcontact');
    Route::get('/backend/contact/deletecontact/{id}',[ContactController::class,'contactdelete'])->name('backend.contact.deletecontact');
   
    Route::get('/backend/coursedetail/add/{id}',[CourseDetailController::class,'courseDetailView'])->name('backend.coursedetail.add');
    Route::post('/backend/coursedetail/addcoursedetail',[CourseDetailController::class,'courseDetailAdd'])->name('backend.coursedetail.addcoursedetail');
    Route::get('/backend/coursedetail/view',[CourseDetailController::class,'courseDetailShow'])->name('backend.coursedetail.view');
    Route::get('/backend/coursedetail/deletecoursedetail/{id}',[CourseDetailController::class,'courseDetailDelete'])->name('backend.coursedetail.deletecoursedetail');
    Route::get('/backend/coursedetail/editcoursedetail/{id}',[CourseDetailController::class,'courseDetailEdit'])->name('backend.coursedetail.editcoursedetail');
    Route::post('/backend/coursedetail/updatecoursedetail/{id}',[CourseDetailController::class,'courseDetailUpdate'])->name('backend.coursedetail.updatecoursedetail');
});

//::::::::::::::::::FrontEnd::::::::::::::::::::://

Route::get('/', function () {
    return view('/welcome');
});
Route::get('/fronted/about',[FrontEndController::class,'frontedabout'])->name('fronted.about');
Route::get('/fronted/contact',[FrontEndController::class,'frontedcontact'])->name('fronted.contact');
Route::post('/fronted/contactstore',[FrontEndController::class,'storecontact'])->name('fronted.contactstore');
Route::get('/fronted/course',[FrontEndController::class,'frontedcourse'])->name('fronted.course');
Route::get('/fronted/coursedetail/{id}',[FrontEndController::class,'frontedcoursedetail'])->name('fronted.coursedetail');
