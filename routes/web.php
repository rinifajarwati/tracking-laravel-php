<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RmaControllers;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\PdfRmaController;
use App\Http\Controllers\DivisionControllers;
use App\Http\Controllers\WarehouseControllers;
// use App\Http\Controllers\addsignaturecontroller;
use App\Http\Controllers\CreatenewuserController;
use App\Http\Controllers\LetterReturControllers;
use App\Http\Controllers\PdfWarehouseController;
use App\Http\Controllers\DeliveryOrderControllers;
use App\Http\Controllers\PdfLetterReturController;
use App\Http\Controllers\PdfDeliveryOrderController;
use App\Http\Controllers\PdfSohargaController;
use App\Http\Controllers\SohargaController;

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



Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthControllers::class, 'index'])->name('login');
    Route::post('/login', [AuthControllers::class, 'authenticate']);
});
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        $data = [
            "title" => "Dashboard | IMI Tracking",
        ];
        return view('dashboard.index', $data);
    });

    Route::post('/logout', [AuthControllers::class, 'logout']);

    // division
    Route::resource('divisions', DivisionControllers::class);
    Route::get('/datatables/divisions', [DivisionControllers::class, 'datatables']);

    // warehouse
    Route::resource('warehouse', WarehouseControllers::class);
    Route::get('/datatables/warehouse', [WarehouseControllers::class, 'datatables']);
    Route::put('/warehouse-approved/{uid}', [WarehouseControllers::class, 'approved']);
    Route::put('/warehouse-approved-sales-staff/{uid}', [WarehouseControllers::class, 'approvedSalesStaff']);
    Route::put('/warehouse-approved-sales-coor/{uid}', [WarehouseControllers::class, 'approvedSalesCoor']);
    Route::get('/datatables/warehouse-approved-warehouse', [WarehouseControllers::class, 'datatablesWarehouse']);
    Route::put('/warehouse-approved-warehouse/{uid}', [WarehouseControllers::class, 'approvedWarehouse']);
    Route::get('/datatables/warehouse-approved-logistics', [WarehouseControllers::class, 'datatablesLogistics']);
    Route::put('/warehouse-approved-logistics/{uid}', [WarehouseControllers::class, 'approvedLogistics']);
    Route::put('/warehouse-approved-ppic-finish/{uid}', [WarehouseControllers::class, 'approvedPpicClose']);
    Route::put('/warehouse-cancel/{uid}', [WarehouseControllers::class, 'cancel']);
    Route::get('/pdf-warehouse/{warehouse}', [WarehouseControllers::class, 'showPdf']);

    Route::get('/generate-pdf/{warehouse}', [PdfWarehouseController::class, 'generatePDF']);

     // route table selected sales
     Route::get('/datatables/warehouse-sales', [WarehouseControllers::class, 'datatablesSales']);
     Route::get('/datatables/warehouse-ppic', [WarehouseControllers::class, 'datatablesPpic']);
     Route::get('/datatables/warehouse-finish', [WarehouseControllers::class, 'datatablesFinish']);
     Route::get('/warehouse-finish', [WarehouseControllers::class, 'Finish']);
    // so harga
    Route::resource('soharga', SohargaController::class);
    Route::get('/datatables/soharga', [SohargaController::class, 'datatables']);
    Route::put('/soharga-approved-sales/{uid}', [SohargaController::class, 'approvedSalesPrice']);
    Route::get('/datatables/soharga-approved-sales', [SohargaController::class, 'datatablesSales']);
    Route::get('/datatables/soharga-approved-adminsales', [SohargaController::class, 'datatablesAdminsales']);
    Route::put('/soharga-approved-adminsales/{uid}', [SohargaController::class, 'approvedAdminsalesPrice']);
    Route::get('/pdf-soharga/{soharga}', [SohargaController::class, 'showPdf']);

    // Route::get('/generate-pdf/{soharga}', [PdfSohargaController::class, 'generatePDF']);  
    Route::get('/generate-pdf-soharga/{soharga}', [PdfSohargaController::class, 'generatePDF']);  


    //rma
    Route::resource('rma', RmaControllers::class);
    Route::get('/datatables/rma', [RmaControllers::class, 'datatables']);
    Route::put('/rma-approved-sales/{uid}', [RmaControllers::class, 'approved']);
    Route::get('/datatables/rma-technician', [RmaControllers::class, 'datatablesTechnician']);
    Route::put('/rma-approved-technician/{uid}', [RmaControllers::class, 'approvedTechnician']);
    Route::get('/datatables/rma-qc', [RmaControllers::class, 'datatablesQc']);
    Route::put('/rma-approved-qc/{uid}', [RmaControllers::class, 'approvedQc']);
    Route::get('/pdf-rma/{rma}', [RmaControllers::class, 'showPdf']);

    Route::get('/generate-pdf-rma/{rma}', [PdfRmaController::class, 'generatePDF']);

    //letter retur (surat retur)
    Route::resource('letter-retur', LetterReturControllers::class);
    Route::get('/datatables/letter-retur', [LetterReturControllers::class, 'datatables']);
    Route::put('/letter-retur-approved-sales/{uid}', [LetterReturControllers::class, 'approved']);
    Route::get('/datatables/letter-retur-warehouse', [LetterReturControllers::class, 'datatablesWarehouse']);
    Route::put('/letter-retur-approved-warehouse/{uid}', [LetterReturControllers::class, 'approvedWarehouse']);
    Route::get('/datatables/letter-retur-marketing', [LetterReturControllers::class, 'datatablesMarketing']);
    Route::put('/letter-retur-approved-marketing/{uid}', [LetterReturControllers::class, 'approvedMarketing']);
    Route::put('/letter-retur-approved-scm/{uid}', [LetterReturControllers::class, 'approvedSCM']);
    Route::get('/pdf-letter-retur/{letterRetur}', [LetterReturControllers::class, 'showPdf']);
    Route::get('/datatables/letter-retur-finish', [LetterReturControllers::class, 'datatablesFinish']);
    Route::get('/letter-retur-finish', [LetterReturControllers::class, 'Finish']);

    Route::get('/generate-pdf-letter-retur/{letterRetur}', [PdfLetterReturController::class, 'generatePDF']);

    //delivery order
    Route::resource('delivery-order', DeliveryOrderControllers::class);
    Route::get('/datatables/delivery-order', [DeliveryOrderControllers::class, 'datatables']);
    Route::put('/do-sales1-approved/{uid}', [DeliveryOrderControllers::class, 'approved']);
    Route::put('/do-sales2-approved/{uid}', [DeliveryOrderControllers::class, 'approvedSales']);
    Route::get('/datatables/delivery-order-qc', [DeliveryOrderControllers::class, 'datatablesQc']);
    Route::put('/do-qc-approved/{uid}', [DeliveryOrderControllers::class, 'approvedQc']);
    Route::get('/datatables/delivery-order-logistics', [DeliveryOrderControllers::class, 'datatablesLogistics']);
    Route::put('/do-logistics-approved/{uid}', [DeliveryOrderControllers::class, 'approvedLogistics']);
    Route::put('/do-logistics-customer-approved/{uid}', [DeliveryOrderControllers::class, 'approvedCustomer']);
    Route::get('/pdf-delivery-order/{deliveryOrder}', [DeliveryOrderControllers::class, 'showPdf']);

    Route::get('/generate-pdf-delivery-order/{deliveryOrder}', [PdfDeliveryOrderController::class, 'generatePDF']);

    // //account 
    // Route::resource('signatureuser', addsignaturecontroller::class);  
    // Route::get('signatureuser', [addsignaturecontroller::class, 'uploadPDF']);
    // Route::post('signatureuser', [addsignaturecontroller::class, 'show']);

    //create signatture
    Route::resource('account-user', AccountController::class);
    Route::get('/datatables/account-user', [AccountController::class, 'datatables']);

    //create account
    Route::resource('create-user', CreatenewuserController::class);
    Route::get('/datatables/create-user', [CreatenewuserController::class, 'datatables']);

});
