<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\View\View;
use App\Models\CoinWallet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CompanyWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */


    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

  

    public function kycProcess(Request $request)
    {
        $request->validate([
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'id_type' => 'required|string',
            'id_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'id_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'passport_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $user = Auth::user();
    
        if ($user->kyc) {
            return back()->with('error', 'You have already submitted your KYC.');
        }
    
    
      $imageFront = $request->file('id_front');
      $imageBack = $request->file('id_back');
      $imagePassport = $request->file('passport_photo');
        
      $front = date('YmdHi') . $imageFront->getClientOriginalName();
      $imagesPath = $this->publicHtmlPath() . '/kyc';
      $imageFront->move($imagesPath, $front);
      $data['id_front'] = $front;
    
      $back = date('YmdHi') . $imageBack->getClientOriginalName();
      $imageBack->move($imagesPath, $back);
      $data['id_back'] = $back;
    
      $passport = date('YmdHi') . $imagePassport->getClientOriginalName();
      $imagePassport->move($imagesPath, $passport);
      $data['passport_photo'] = $passport;
    
        Kyc::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'id_type' => $request->id_type,
            'id_front' => $front,
            'id_back' => $back,
            'passport_photo' => $passport,
        ]);
    
        return back()->with('success', 'KYC submitted successfully and is now under review.');
    }


    // public function kycProcess(Request $request)
    // {
    //     $request->validate([
    //         'dob' => 'required|date',
    //         'address' => 'required|string|max:255',
    //         'city' => 'required|string|max:100',
    //         'state' => 'required|string|max:100',
    //         'zip' => 'required|string|max:20',
    //         'id_type' => 'required|string',
    //         'id_front' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'id_back' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'passport_photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //     ]);
    
    //     $user = Auth::user();
    
    //     $folder = 'kyc_uploads/' . $user->id;

    //     // Save to default disk (local => storage/app/public)
    //     $idFrontPath = $request->file('id_front')->store($folder, 'public');
    //     $idBackPath = $request->file('id_back')->store($folder, 'public');
    //     $passportPath = $request->file('passport_photo')->store($folder, 'public');
    
    //     if ($user->kyc) {
    //         return back()->with('error', 'You have already submitted your KYC.');
    //     }


        
    //     // Prevent duplicate KYC submission
    //     if ($user->kyc) {
    //         return back()->with('error', 'You have already submitted your KYC.');
    //     }
    
    //     Kyc::create([
    //         'user_id' => $user->id,
    //         'dob' => $request->dob,
    //         'address' => $request->address,
    //         'city' => $request->city,
    //         'state' => $request->state,
    //         'zip' => $request->zip,
    //         'id_type' => $request->id_type,
         
    //         'id_front' => $folder . '/' . basename($idFrontPath),
    //         'id_back' => $folder . '/' . basename($idBackPath),
    //         'passport_photo' => $folder . '/' . basename($passportPath),
    //      // 'id_front' => Storage::url($idFrontPath),
    //         // 'id_back' => Storage::url($idBackPath),
    //         // 'passport_photo' => Storage::url($passportPath),
    //     ]);
    
    //     return back()->with('success', 'KYC submitted successfully and is now under review.');

    // }
    
    public function adminViewKycIndex()
    {
        $kycs = Kyc::with('user')->latest()->get();
        return view('admin.view-kyc-index', compact('kycs'));
    }
    
}
