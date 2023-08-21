<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DeliveryOrderControllers;
use App\Http\Controllers\DivisionControllers;
use App\Http\Controllers\LetterReturControllers;
use App\Http\Controllers\PdfWarehouseController;
use App\Http\Controllers\RmaControllers;
use App\Http\Controllers\WarehouseControllers;
use App\Http\Controllers\addsignaturecontroller;
use App\Http\Controllers\AdduserController;

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
    Route::get('/pdf-warehouse/{warehouse}', [WarehouseControllers::class, 'showPdf']);

    Route::get('/generate-pdf/{warehouse}', [PdfWarehouseController::class, 'generatePDF']);


    //rma
    Route::resource('rma', RmaControllers::class);
    Route::get('/datatables/rma', [RmaControllers::class, 'datatables']);
    Route::put('/rma-approved-sales/{uid}', [RmaControllers::class, 'approved']);
    Route::get('/datatables/rma-technician', [RmaControllers::class, 'datatablesTechnician']);
    Route::put('/rma-approved-technician/{uid}', [RmaControllers::class, 'approvedTechnician']);
    Route::get('/datatables/rma-qc', [RmaControllers::class, 'datatablesQc']);
    Route::put('/rma-approved-qc/{uid}', [RmaControllers::class, 'approvedQc']);
    Route::get('/pdf-rma/{uid}', [RmaControllers::class, 'showPdf']);


    //letter retur (surat retur)
    Route::resource('letter-retur', LetterReturControllers::class);
    Route::get('/datatables/letter-retur', [LetterReturControllers::class, 'datatables']);
    Route::put('/letter-retur-approved-sales/{uid}', [LetterReturControllers::class, 'approved']);
    Route::get('/datatables/letter-retur-warehouse', [LetterReturControllers::class, 'datatablesWarehouse']);
    Route::put('/letter-retur-approved-warehouse/{uid}', [LetterReturControllers::class, 'approvedWarehouse']);
    Route::get('/datatables/letter-retur-marketing', [LetterReturControllers::class, 'datatablesMarketing']);
    Route::put('/letter-retur-approved-marketing/{uid}', [LetterReturControllers::class, 'approvedMarketing']);
    Route::put('/letter-retur-approved-marketing-ppic/{uid}', [LetterReturControllers::class, 'approvedMarketingPPIC']);
    Route::get('/pdf-letter-retur/{uid}', [LetterReturControllers::class, 'showPdf']);

    //delivery order
    Route::resource('delivery-order', DeliveryOrderControllers::class);
    Route::get('/datatables/delivery-order', [DeliveryOrderControllers::class, 'datatables']);
    Route::put('/do-sales1-approved/{uid}', [DeliveryOrderControllers::class, 'approved']);
    Route::put('/do-sales2-approved/{uid}', [DeliveryOrderControllers::class, 'approvedSales']);
    Route::get('/datatables/delivery-order-qc', [DeliveryOrderControllers::class, 'datatablesQc']);
    Route::put('/do-qc-approved/{uid}', [DeliveryOrderControllers::class, 'approvedQc']);
    Route::get('/datatables/delivery-order-logistics', [DeliveryOrderControllers::class, 'datatablesLogistics']);
    Route::put('/do-logistics-approved/{uid}', [DeliveryOrderControllers::class, 'approvedLogistics']);
    Route::put('/do-logistics-security-approved/{uid}', [DeliveryOrderControllers::class, 'approvedSecurity']);
    Route::put('/do-logistics-customer-approved/{uid}', [DeliveryOrderControllers::class, 'approvedCustomer']);
    Route::get('/pdf-delivery-order/{uid}', [DeliveryOrderControllers::class, 'showPdf']);

    //account 
    Route::resource('signatureuser', addsignaturecontroller::class);  
    Route::get('signatureuser', [addsignaturecontroller::class, 'uploadPDF']);
    Route::post('signatureuser', [addsignaturecontroller::class, 'show']);

    //create account
    Route::resource('newuser', AdduserController::class);
    Route::get('/newuser', [AdduserController::class, 'datatables']);


});
