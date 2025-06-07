<?php

use App\Mail\WelcomeMail;
use App\Mail\AdminToUserMail;
use App\Mail\newReferralMail;
use App\Mail\WithdrawalRequestMail;
use App\Mail\WithdrawalApproaveMail;
use App\Models\Plan;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvestmentActivatedMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureHasAccount;
use App\Mail\InvestorPaymentCompletedMail;
use App\Mail\PartnersPaymentCompletedMail;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\ProfileController;


use App\Http\Controllers\GuestPagesController;
use App\Http\Middleware\EnsureAccountIsEnabled;
use App\Http\Middleware\EnsureDepositCompleted;
use App\Mail\NewInvestmentNotificationMail;
use App\Http\Middleware\EnsureEligibleToInvest;
use App\Http\Middleware\EnsureWithdrawalIsMade;

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
      // Fetch all plans from the database
      $plans = Plan::all(); 

      // Pass the plans data to the 'plan' view
    return view('welcome', compact('plans'));
});

Route::view('/import', 'import.index');
Route::post('/map-column', [ImportController::class, 'mapColumn'])->name('fetch.columns');
Route::post('/import', [ImportController::class, 'import'])->name('process.import');

Route::view('/about', 'about');

Route::view('/market-information', 'investment-information');

Route::view('/monthly-data', 'monthly-data');

Route::view('/user/disabled', 'user.dashboard.investment.account_disabled');
Route::get('/contact-us', [ContactController::class, 'create']);
Route::post('/contact-us', [ContactController::class, 'save']);

Route::view('/news', 'news');
Route::middleware('auth')->group(function () {

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::middleware([EnsureHasAccount::class, EnsureAccountIsEnabled::class])->group(function () {
        Route::prefix('/dashboard')->name('dashboard')->group(function () {
            Route::get('', [\App\Http\Controllers\DashboardController::class, 'overview'])->name('overview');
        });

        Route::get('/deposits/create', [\App\Http\Controllers\UserController::class, 'deposit'])->name('deposits')->middleware(EnsureDepositCompleted::class);
        Route::get('/deposits', [\App\Http\Controllers\UserController::class, 'depositHistory'])->name('deposits.history');
        Route::get('/deposit/reference', [\App\Http\Controllers\UserController::class, 'addDepositReference'])->name('deposit.reference');
        Route::post('/deposits', [\App\Http\Controllers\UserController::class, 'createDeposit'])->name('depsits');
        Route::post('/deposits/{id}/reference', [\App\Http\Controllers\UserController::class, 'submitDepositReference'])->name('deposit.reference');
        Route::get('/deposits/{id}/cancel', [\App\Http\Controllers\UserController::class, 'cancelDepost'])->name('deposit.cancel');


        Route::get('/investments', [\App\Http\Controllers\InvestmentController::class, 'index'])->name('investments');
        Route::get('/investment/cancel', [\App\Http\Controllers\InvestmentController::class, 'cancelPendingInvestment'])->name('investment.cancel');

        Route::get('/refuse-investment', [\App\Http\Controllers\InvestmentController::class, 'refuseInvestment']);
        Route::get('/invest', [\App\Http\Controllers\InvestmentController::class, 'investmentForm'])->name('form')->middleware(EnsureEligibleToInvest::class);
        Route::post('/invest', [\App\Http\Controllers\InvestmentController::class, 'invest'])->name('invest');
        Route::get('/investment/obtain-wallet-address', [\App\Http\Controllers\InvestmentController::class, 'obtainAssociatedWalletAddress'])->name('wallet-address');
        Route::post('/investment/{id}/reference', [\App\Http\Controllers\InvestmentController::class, 'saveReference'])->name('reference');

        Route::get('/withdrawals', [\App\Http\Controllers\WithdrawalController::class, 'index'])->name('withdrawals');
        Route::get('/withdraw', [\App\Http\Controllers\WithdrawalController::class, 'withdrawalForm'])->name('form');
        Route::post('/withdraw', [\App\Http\Controllers\WithdrawalController::class, 'withdraw'])->name('withdraw');

        Route::get('users/{id}/earnings', [\App\Http\Controllers\UserController::class, 'earningHistory'])->name('earnings');
        Route::get('users/{id}/referrals', [\App\Http\Controllers\UserController::class, 'referrals'])->name('referrals');
        Route::get('users/{id}/commission', [\App\Http\Controllers\UserController::class, 'referralCommissions'])->name('commissions');
        Route::get('/my-referrals', [\App\Http\Controllers\UserController::class, 'referrals']);

        Route::get('accounts/{id}/edit', [\App\Http\Controllers\UserController::class, 'editAccount'])->name('edit-account');
        Route::get('accounts/{id}/update', [\App\Http\Controllers\UserController::class, 'updateAccount'])->name('update-account');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });


    Route::get('/account/setup', [UserController::class, 'setupAccount'])->name('account.setup');
    Route::post('/account', [UserController::class, 'store'])->name('account.store');
});

Route::get('/pay-investors', function () {
    Artisan::call('pay:investor'); // Replace 'my:command' with the actual command name
    Artisan::call('optimize:clear');

    return response()->json(['message' => 'Command executed successfully']);
});


// About Us

Route::get('/about-us', [GuestPagesController::class, 'aboutIndex'])
->name('about-us');

// Services
Route::get('/services', [GuestPagesController::class, 'servicesIndex'])
->name('services');

// pricing
Route::get('/plan', [GuestPagesController::class, 'planIndex'])
->name('plan');

// contact
Route::get('/contact', [GuestPagesController::class, 'contactIndex'])
->name('contact');
//contact mail message
Route::post('/contact-submit', [GuestPagesController::class, 'contactFormSubmit'])->name('contact.submit');

require __DIR__ . '/auth.php';
