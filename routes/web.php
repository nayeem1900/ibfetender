<?php

use App\Model\Product;
use Illuminate\Support\Facades\Route;

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

Route::get('/test-grid', function () {
   return view('test-grid');
});

Route::get('/fetch-data', function () {
   $product = Product::select('id', 'name')->get();

   return response()->json($product);
});
Route::get('/', 'Website\PageController@index')->name('index');


/*Route::group(['prefix'=>'website'], function(){


    Route::get('pages.admission-info', 'Website\PageController@admissioninfo')->name('website.addmission-info');
    Route::get('pages.aboutus', 'Website\PageController@aboutus')->name('website.aboutus');
    Route::get('pages.comon', 'Website\PageController@messageprincipal')->name('website.comon');
    Route::get('pages.gallery', 'Website\PageController@gallery')->name('website.gallery');
    Route::get('pages.contact', 'Website\PageController@contact')->name('website.contact');
    Route::get('pages.notice', 'Website\PageController@notice')->name('website.notice');


});*/


//Supplier Login
Route::get('/supplier-login', 'Frontend\SupplierLoginController@supplierLogin')->name('supplier.login');
Route::get('/supplier-signup', 'Frontend\SupplierLoginController@supplierSignup')->name('supplier.signup');
Route::post('/supplier-store', 'Frontend\SupplierLoginController@supplierStore')->name('supplier.store');
Route::get('/email-verify', 'Frontend\SupplierLoginController@emailVerify')->name('email.verify');
Route::post('/verify-store', 'Frontend\SupplierLoginController@verifyStore')->name('verify.store');

Route::get('show-items-qty/{productid}','Frontend\TProductController@show_total_qty_by_pid');


Auth::routes();

//Customer Dashboard

Route::group(['middleware' => ['auth','supplier']], function() {
    Route::get('/view', 'Frontend\MainTender1Controller@view')->name('maintender1.view');
    Route::get('/tview', 'Frontend\MainTender1Controller@tview')->name('maintender1.tview');
    Route::get('/add', 'Frontend\MainTender1Controller@add')->name('maintender1.add');
    Route::post('/store', 'Frontend\MainTender1Controller@store')->name('maintender1.store');
    Route::get('/edit/{id}', 'Frontend\MainTender1Controller@edit')->name('maintender1.edit');
    Route::post('/update/{id}', 'Frontend\MainTender1Controller@update')->name('maintender1.update');
    Route::get('/delete/{id}', 'Frontend\MainTender1Controller@delete')->name('maintender1.delete');


  /* Route::get('/dashboard', 'Frontend\DashboardController@dashboard')->name('dashboard');
    Route::post('/store', 'Frontend\DashboardController@store')->name('dashboard.store');
    Route::get('/view', 'Frontend\DashboardController@view')->name('dashboard.view');
    Route::get('/edit/{id}', 'Frontend\DashboardController@edit')->name('dashboard.edit');
    Route::post('/edit/{id}', 'Frontend\DashboardController@update')->name('dashboard.update');*/

    Route::prefix ('stproducts')->group (function () {


        /*Route::get('/view', 'Frontend\StproductController@view')->name('stproducts.view');*/
        Route::get('/add', 'Frontend\StproductController@add')->name('stproducts.add');
        Route::post('/store', 'Frontend\StproductController@store')->name('stproducts.store');
        Route::get('/edit/{id}', 'Frontend\StproductController@edit')->name('stproducts.edit');
        Route::post('/update/{id}', 'Frontend\StproductController@update')->name('stproducts.update');

    });






});


Route::group(['middleware' => ['auth','admin']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::prefix ('users')->group (function () {
        //admin-dashboard


        Route::get('/view', 'Backend\UserController@view')->name('users.view');
        Route::get('/add', 'Backend\UserController@add')->name('users.add');
        Route::post('/store', 'Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
        Route::post('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix ('profiles')->group (function () {

        Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/store', 'Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');


    });


    Route::prefix ('suppliers')->group (function () {


        Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::get('/delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
    });

    Route::prefix ('customers')->group (function () {


        Route::get('/view', 'Backend\CustomersController@view')->name('customers.view');
        Route::get('/add', 'Backend\CustomersController@add')->name('customers.add');
        Route::post('/store', 'Backend\CustomersController@store')->name('customers.store');
        Route::get('/edit/{id}', 'Backend\CustomersController@edit')->name('customers.edit');
        Route::post('/update/{id}', 'Backend\CustomersController@update')->name('customers.update');
        Route::get('/delete/{id}', 'Backend\CustomersController@delete')->name('customers.delete');
    });



    Route::prefix ('datatable')->group (function () {


        Route::get('/view', 'Backend\DatatableController@view')->name('datatable.view');
        Route::get('/add', 'Backend\DatatableController@add')->name('datatable.add');
        Route::post('/store', 'Backend\DatatableController@store')->name('datatable.store');
        Route::get('/edit/{id}', 'Backend\DatatableController@edit')->name('datatable.edit');
        Route::post('/update/{id}', 'Backend\DatatableController@update')->name('datatable.update');
        Route::post('/delete/{id}', 'Backend\DatatableController@delete')->name('datatable.delete');
    });

    Route::prefix ('suppliers')->group (function () {


        Route::get('/view', 'Backend\SupplierController@view')->name('suppliers.view');
        Route::get('/add', 'Backend\SupplierController@add')->name('suppliers.add');
        Route::post('/store', 'Backend\SupplierController@store')->name('suppliers.store');
        Route::get('/edit/{id}', 'Backend\SupplierController@edit')->name('suppliers.edit');
        Route::post('/update/{id}', 'Backend\SupplierController@update')->name('suppliers.update');
        Route::get('/delete/{id}', 'Backend\SupplierController@delete')->name('suppliers.delete');
    });



    Route::prefix ('tproducts')->group (function () {


        Route::get('/view', 'Frontend\TProductController@view')->name('tproducts.view');
        Route::get('/add', 'Frontend\TProductController@add')->name('tproducts.add');
        Route::post('/store', 'Frontend\TProductController@store')->name('tproducts.store');
        Route::get('/edit/{id}', 'Frontend\TProductController@edit')->name('tproducts.edit');
        Route::post('/update/{id}', 'Frontend\TProductController@update')->name('tproducts.update');
        Route::post('/delete/{id}', 'Frontend\TProductController@delete')->name('tproducts.delete');


    });




    Route::prefix ('purchase')->group (function () {


        Route::get('/view', 'Backend\PurchaseController@view')->name('purchase.view');
        Route::get('/add', 'Backend\PurchaseController@add')->name('purchase.add');
        Route::post('/store', 'Backend\PurchaseController@store')->name('purchase.store');
        Route::get('/edit/{id}', 'Backend\PurchaseController@edit')->name('purchase.edit');
        Route::post('/update/{id}', 'Backend\PurchaseController@update')->name('purchase.update');
        Route::get('/delete/{id}', 'Backend\PurchaseController@delete')->name('purchase.delete');
    });



    Route::prefix ('tsuppliers')->group (function () {


        Route::get('/view', 'Backend\TsupplierController@view')->name('tsuppliers.view');
        Route::get('/draft/view', 'Backend\TsupplierController@draftView')->name('tsuppliers.draft.view');
        Route::get('/delete/{id}', 'Backend\TsupplierController@delete')->name('tsuppliers.delete');

        /* Route::post('/delete', 'Backend\TupplierController@delete')->name('tsuppliers.delete');*/
    });

   /* Route::group(['prefix'=>'reports','middleware' => 'auth'], function(){


        Route::get('/comparisonsheet/pdf/{user_id}', 'Backend\ReportController@csr')->name('reports.csr.pdf');



    });*/

    Route::prefix ('setups')->group (function () {

        //Year session

        Route::get('/year/view', 'Backend\Setup\YearController@view')->name('setups.year.view');
        Route::get('/year/add', 'Backend\Setup\YearController@add')->name('setups.year.add');
        Route::post('/year/store', 'Backend\Setup\YearController@store')->name('setups.year.store');
        Route::get('/year/edit/{id}', 'Backend\Setup\YearController@edit')->name('setups.year.edit');
        Route::post('/year/update/{id}', 'Backend\Setup\YearController@update')->name('setups.year.update');
        Route::post('/year/delete/{id}', 'Backend\Setup\YearController@delete')->name('setups.year.delete');

//tender name
        Route::get('/tendername/view', 'Backend\Setup\TenderinfoController@view')->name('setups.tendername.view');
        Route::get('/tendername/add', 'Backend\Setup\TenderinfoController@add')->name('setups.tendername.add');
        Route::post('/tendername/store', 'Backend\Setup\TenderinfoController@store')->name('setups.tendername.store');
        Route::get('/tendername/edit/{id}', 'Backend\Setup\TenderinfoController@edit')->name('setups.tendername.edit');
        Route::post('/tendername/update/{id}', 'Backend\Setup\TenderinfoController@update')->name('setups.tendername.update');
//unit
        Route::get('/unit/view', 'Backend\Setup\UnitController@view')->name('setups.unit.view');
        Route::get('/unit/add', 'Backend\Setup\UnitController@add')->name('setups.unit.add');
        Route::post('/unit/store', 'Backend\Setup\UnitController@store')->name('setups.unit.store');
        Route::get('/unit/edit/{id}', 'Backend\Setup\UnitController@edit')->name('setups.unit.edit');
        Route::post('/unit/update/{id}', 'Backend\Setup\UnitController@update')->name('setups.unit.update');
        Route::post('/unit/delete/{id}', 'Backend\Setup\UnitController@delete')->name('setups.unit.delete');

    //Branch name
        Route::get('/branch/view', 'Backend\Setup\BranchController@view')->name('setups.branch.view');
        Route::get('/branch/add', 'Backend\Setup\BranchController@add')->name('setups.branch.add');
        Route::post('/branch/store', 'Backend\Setup\BranchController@store')->name('setups.branch.store');
        Route::get('/branch/edit/{id}', 'Backend\Setup\BranchController@edit')->name('setups.branch.edit');
        Route::post('/branch/update/{id}', 'Backend\Setup\BranchController@update')->name('setups.branch.update');
        Route::post('/branch/delete/{id}', 'Backend\Setup\BranchController@delete')->name('setups.branch.delete');
//category

        Route::get('/category/view', 'Backend\Setup\CategoryController@view')->name('setups.category.view');
        Route::get('/category/add', 'Backend\Setup\CategoryController@add')->name('setups.category.add');
        Route::post('/category/store', 'Backend\Setup\CategoryController@store')->name('setups.category.store');
        Route::get('/category/edit/{id}', 'Backend\Setup\CategoryController@edit')->name('setups.category.edit');
        Route::post('/category/update/{id}', 'Backend\Setup\CategoryController@update')->name('setups.category.update');
        Route::post('/category/delete/{id}', 'Backend\Setup\CategoryController@delete')->name('setups.category.delete');
//product
        Route::get('/product/view', 'Backend\Setup\ProductController@view')->name('setups.product.view');
        Route::get('/product/add', 'Backend\Setup\ProductController@add')->name('setups.product.add');
        Route::post('/product/store', 'Backend\Setup\ProductController@store')->name('setups.product.store');
        Route::get('/product/edit/{id}', 'Backend\Setup\ProductController@edit')->name('setups.product.edit');
        Route::post('/product/update/{id}', 'Backend\Setup\ProductController@update')->name('setups.product.update');
        Route::post('/product/delete/{id}', 'Backend\Setup\ProductController@delete')->name('setups.product.delete');
//quantity
        Route::get('/demand/view', 'Backend\Setup\DemandController@view')->name('setups.demand.view');
        Route::get('/demand/add', 'Backend\Setup\DemandController@add')->name('setups.demand.add');
        Route::post('/demand/store', 'Backend\Setup\DemandController@store')->name('setups.demand.store');
        Route::get('/demand/edit/{id}', 'Backend\Setup\DemandController@edit')->name('setups.demand.edit');
        Route::post('/demand/update/{id}', 'Backend\Setup\DemandController@update')->name('setups.demand.update');
        Route::post('/demand/delete/{id}', 'Backend\Setup\DemandController@delete')->name('setups.demand.delete');
        Route::get('/demand/details/{category_id}', 'Backend\Setup\DemandController@details')->name('setups.demand.details');


        Route::get('/payorder/add', 'Backend\Setup\PayorderController@add')->name('setups.payorder.add');
        Route::post('/payorder/store', 'Backend\Setup\PayorderController@store')->name('setups.payorder.store');
        Route::get('/payorder/edit/{id}', 'Backend\Setup\TendernameController@edit')->name('setups.payorder.edit');
        Route::post('/payorder/update/{id}', 'Backend\Setup\TendernameController@update')->name('setups.payorder.update');


    });



});

Route::get('/get-category','Backend\DefaultController@getcategory')->name('get-category');
Route::get('/get-supplier', 'Backend\DefaultController@getsupplier')->name('get-supplier');
Route::get('/get-product', 'Backend\DefaultController@getProduct')->name('get-product');
Route::get('/get-unit', 'Backend\DefaultController@getUnit')->name('get-unit');
