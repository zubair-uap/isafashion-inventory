<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CompanyNameController;
use App\Http\Controllers\CuttingSendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaporController;
use App\Http\Controllers\LekraBrandController;
use App\Http\Controllers\MakingDyeingReceived;
use App\Http\Controllers\MakingDyeingReceivedController;
use App\Http\Controllers\MakingDyeingSendController;
use App\Http\Controllers\MakingKnittingReceivedController;
use App\Http\Controllers\MakingKnittingSendController;
use App\Http\Controllers\SutaController;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('protected', ['middleware' => ['auth', 'status']], [HomeController::class, 'index'])->name('home');


Route::get('/home', [HomeController::class, 'index'])->name('home');
//profile
Route::get('/user/list', [HomeController::class, 'userList'])->name('user');
Route::get('/userDelete/{id}', [HomeController::class, 'userDelete'])->name('user.delete');
Route::get('/changeStatus', [HomeController::class, 'userChangeStatus']);
Route::get('/profile/change', [HomeController::class, 'profileChange'])->name('profile.change');
Route::post('/profile/name/update', [HomeController::class, 'nameChange']);
Route::post('/profile/password/update', [HomeController::class, 'passwordUpdate']);
Route::post('/profile/picture/update', [HomeController::class, 'picture_update']);

// MakingKnittingSend
Route::get('making-knitting-send', [MakingKnittingSendController::class, 'index'])->name('making_knitting_send');
Route::post('making-knitting-send-store', [MakingKnittingSendController::class, 'store'])->name('KnittingSendStore');
Route::get('making-knitting-send-show', [MakingKnittingSendController::class, 'show'])->name('KnittingSendShow');
Route::get('making-knitting-send-edit/{knitting_send_id}', [MakingKnittingSendController::class, 'edit'])->name('KnittingSendEdit');
Route::post('making-knitting-send-update', [MakingKnittingSendController::class, 'update'])->name('KnittingSendUpdate');
Route::get('/knittingSendDelete/{id}', [MakingKnittingSendController::class, 'destroy'])->name('knittingSendDelete');
// Route::get('making-knitting-send-view/{knitting_send_id}', [MakingKnittingSendController::class, 'view'])->name('KnittingSendView');
Route::get('making-knitting-send-generate-pdf/{knitting_send_id}', [MakingKnittingSendController::class, 'knittingSendgeneratePDF'])->name('KnittingSendPDFDownload');
Route::get('making-knitting-send-generate-pdf-view/{knitting_send_id}', [MakingKnittingSendController::class, 'knittingSendgeneratePDFview'])->name('KnittingSendInvoiceView');
Route::get('making-knitting-send-view/{knitting_send_id}', [MakingKnittingSendController::class, 'knittingSendView'])->name('KnittingSendView');
Route::get('making-knitting-send-suta-brand-edit/{suta_brand_id}', [MakingKnittingSendController::class, 'sutaBrandEdit'])->name('SutaBrandEdit');
Route::POST('making-knitting-send-suta-brand-update', [MakingKnittingSendController::class, 'sutaBrandUpdate'])->name('sutaBrandUpdate');
Route::get('/knittingSendSutaBrandDelete/{id}', [MakingKnittingSendController::class, 'sutaBrandDelete'])->name('SutaBrandDelete');
Route::get('making-knitting-send-lekra-brand-edit/{all_lekra_brand_id}', [MakingKnittingSendController::class, 'lekraBrandEdit'])->name('lekraBrandEdit');
Route::POST('making-knitting-send-lekra-brand-update', [MakingKnittingSendController::class, 'sendLekraBrandUpdate'])->name('sendlekraBrandUpdate');
Route::get('/knittingSendLekraBrandDelete/{id}', [MakingKnittingSendController::class, 'lekraBrandDelete'])->name('SutaBrandDelete');


// MakingKnittingReceived
Route::get('making-knitting-recived', [MakingKnittingReceivedController::class, 'index'])->name('making_knitting_recived');
Route::post('making-knitting-recived-store', [MakingKnittingReceivedController::class, 'store'])->name('KnittingRecivedStore');
Route::get('making-knitting-recived-show', [MakingKnittingReceivedController::class, 'show'])->name('KnittingReceivedShow');
Route::get('making-knitting-recived-edit/{knitting_received_id}', [MakingKnittingReceivedController::class, 'edit'])->name('KnittingReceivedEdit');
Route::post('making-knitting-recived-update', [MakingKnittingReceivedController::class, 'update'])->name('KnittingRecivedUpdate');
Route::get('/knittingReceivedDelete/{id}', [MakingKnittingReceivedController::class, 'destroy'])->name('knittingSendDelete');
Route::get('making-knitting-received-view/{knitting_received_id}', [MakingKnittingReceivedController::class, 'knittingReceivedView'])->name('KnittingReceivedView');
Route::get('making-knitting-recived-multiple-edit/{knitting_received_multiple_id}', [MakingKnittingReceivedController::class, 'knittingReceivedMultipleEdit'])->name('knittingReceivedMultipleEdit');
Route::get('/knittingRecivedMultipleDelete/{id}', [MakingKnittingReceivedController::class, 'knittingRecivedMultipleDelete'])->name('SutaBrandDelete');
Route::POST('making-knitting-multiple-received-update', [MakingKnittingReceivedController::class, 'knittingRecivedMultipleUpdate'])->name('knittingRecivedMultipleUpdate');
Route::get('making-knitting-recived-generate-pdf-view/{knitting_received_id}', [MakingKnittingReceivedController::class, 'knittingRecivedgeneratePDFview'])->name('KnittingRecivedView');
Route::get('making-knitting-recived-generate-pdf/{knitting_received_id}', [MakingKnittingReceivedController::class, 'knittingSendgeneratePDFDown'])->name('KnittingRecivedPDFDownload');




// deying send
Route::get('making-dyeing-send', [MakingDyeingSendController::class, 'index'])->name('dyeingSend');
Route::post('making-dyeing-send-store', [MakingDyeingSendController::class, 'store'])->name('KnittingDayingSendStore');
Route::post('/getColor', [MakingDyeingSendController::class, 'getColor']);
Route::get('making-dyeing-send-show', [MakingDyeingSendController::class, 'show'])->name('dyeingSendShow');
Route::get('making-dyeing-send-edit/{dyeing_id}', [MakingDyeingSendController::class, 'edit'])->name('dyeingSendEdit');
Route::post('making-dyeing-send-update', [MakingDyeingSendController::class, 'update'])->name('KnittingDyeingUpdate');
Route::get('/knittingDyeingDelete/{id}', [MakingDyeingSendController::class, 'destroy'])->name('dyeingSendDelete');
Route::get('making-dyeing-send-view/{dyeing_id}', [MakingDyeingSendController::class, 'dyeingSendView'])->name('dyeingSendView');
Route::get('making-dyeing-send-multiple-edit/{dyeing_multiple_id}', [MakingDyeingSendController::class, 'dyeingSendMultipleEdit'])->name('dyeingSendMultipleEdit');
Route::post('making-dyenig-send-multiple-update', [MakingDyeingSendController::class, 'dyeingSendMultipleUpdate'])->name('dyeingSendMultipleUpdate');
Route::get('making-dyeing-send-generate-pdf-view/{dyeing_multiple_id}', [MakingDyeingSendController::class, 'dyeingSendgeneratePDFview'])->name('dyeingSendPDFView');
Route::get('making-dyeing-send-generate-pdf/{dyeing_multiple_id}', [MakingDyeingSendController::class, 'dyeingSendgeneratePDFDown'])->name('dyeingSendPDFDownload');
Route::get('/knittingDyeingMultipleDelete/{id}', [MakingDyeingSendController::class, 'dyeingSendMultipleDelete'])->name('knittingDyeingMultipleDelete');


// dyeing Received
Route::get('making-dyeing-received', [MakingDyeingReceivedController::class, 'index'])->name('dyeingReceived');
Route::post('making-dyeing-received-store', [MakingDyeingReceivedController::class, 'store'])->name('dyeingRecivedStore');
Route::get('making-dyeing-received-show', [MakingDyeingReceivedController::class, 'show'])->name('dyeingReceivedShow');
Route::get('making-dyeing-received-edit/{dyeing_id}', [MakingDyeingReceivedController::class, 'edit'])->name('dyeingReceivedEdit');
Route::post('making-dyeing-received-update', [MakingDyeingReceivedController::class, 'update'])->name('deyingRecivedUpdate');
Route::get('/dyeingReceivedDelete/{id}', [MakingDyeingReceivedController::class, 'destroy'])->name('dyeingReceivedDelete');
Route::get('making-dyeing-received-view/{dyeing_id}', [MakingDyeingReceivedController::class, 'dyeingReceivedView'])->name('dyeingReceivedView');
Route::get('making-dyeing-received-multiple-edit/{dyeing_multiple_id}', [MakingDyeingReceivedController::class, 'dyeingReceivedMultipleEdit'])->name('dyeingReceivedMultipleEdit');
Route::post('making-dyenig-received-multiple-update', [MakingDyeingReceivedController::class, 'dyeingReceivedMultipleUpdate'])->name('dyeingReceivedMultipleUpdate');
Route::get('/makingDyeingRecevedMultipleDelete/{id}', [MakingDyeingReceivedController::class, 'dyeingReceivedMultipleDelete'])->name('knittingDyeingMultipleDelete');
Route::get('making-dyeing-received-generate-pdf-view/{dyeing_multiple_id}', [MakingDyeingReceivedController::class, 'dyeingReceivedgeneratePDFview'])->name('dyeingReceivedPDFView');



//cutting Send
Route::get('cutting-send', [CuttingSendController::class, 'index'])->name('cuttingSend');
Route::post('cutting-store-send', [CuttingSendController::class, 'store'])->name('cuttingSendStore');
Route::get('cutting-send-show', [CuttingSendController::class, 'show'])->name('cuttingSendShow');
Route::get('cutting-send-edit/{cutting_send_id}', [CuttingSendController::class, 'edit'])->name('cuttingSendEdit');
Route::post('cutting-send-update', [CuttingSendController::class, 'update'])->name('cuttingSendUpdate');
Route::get('/cuttingSendDelete/{id}', [CuttingSendController::class, 'destroy'])->name('cuttingSendDelete');
Route::get('cutting-send-view/{cutting_id}', [CuttingSendController::class, 'cuttingSendView'])->name('cuttingSendView');
Route::get('cutting-send-multiple-edit/{cutting_id}', [CuttingSendController::class, 'cuttingSendMultipleEdit'])->name('cuttingSendMultipleEdit');
Route::post('cutting-send-multiple-update', [CuttingSendController::class, 'cuttingSendMultipleUpdate'])->name('cuttingSendMultipleUpdate');
Route::get('/cutingSendMultipleDelete/{id}', [CuttingSendController::class, 'cutingSendMultipleDelete'])->name('cutingSendMultipleDelete');


// copmany name
Route::get('company-name', [CompanyNameController::class, 'index'])->name('companyName');
Route::post('company-name-store', [CompanyNameController::class, 'store'])->name('CompanyNameStore');
Route::get('company-name-edit/{id}', [CompanyNameController::class, 'edit'])->name('CompanyNameEdit');
Route::post('company-name-update', [CompanyNameController::class, 'update'])->name('companyUpdate');
Route::get('/companyDelete/{id}', [CompanyNameController::class, 'destroy'])->name('companyDelete');



//brand
Route::get('brand-name', [BrandController::class, 'index'])->name('brandName');
Route::post('brand-name-store', [BrandController::class, 'store'])->name('brandNameStore');
Route::post('brand-name-update', [BrandController::class, 'update'])->name('brandUpdate');
Route::get('/brandDelete/{id}', [BrandController::class, 'destroy'])->name('brandDelete');


// suta
Route::get('suta-name', [SutaController::class, 'index'])->name('sutaName');
Route::post('suta-name-store', [SutaController::class, 'store'])->name('sutaNameStore');
Route::post('suta-name-update', [SutaController::class, 'update'])->name('sutaUpdate');
Route::get('/sutaDelete/{id}', [SutaController::class, 'destroy'])->name('sutaDelete');

// kapor
Route::get('kapor-name', [KaporController::class, 'index'])->name('kaporName');
Route::post('kapor-name-store', [KaporController::class, 'store'])->name('kaporNameStore');
Route::post('kapor-name-update', [KaporController::class, 'update'])->name('kaporUpdate');
Route::get('/kaporDelete/{id}', [KaporController::class, 'destroy'])->name('kaporDelete');

//lekra Brand Name
Route::get('lekra-brand-name', [LekraBrandController::class, 'index'])->name('lekraBrandName');
Route::post('lekra-brand-name-store', [LekraBrandController::class, 'store'])->name('lekraBrandNameStore');
Route::post('lekra-brand-name-update', [LekraBrandController::class, 'update'])->name('lekraBrandUpdate');
Route::get('/lekraBrandDelete/{id}', [LekraBrandController::class, 'destroy'])->name('lekraBrandDelete');
