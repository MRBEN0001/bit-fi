<?php

namespace App\Http\Controllers;

use App\Models\Kyc;
use Illuminate\View\View;
use App\Models\CoinWallet;
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
    
        // $folder = 'kyc_uploads/' . $user->id;
        // if (!file_exists(public_path($folder))) {
        //     mkdir(public_path($folder), 0755, true);
        // }
    
        // $idFrontPath = $request->file('id_front')->move(public_path($folder), 'id_front.' . $request->file('id_front')->getClientOriginalExtension());
        // $idBackPath = $request->file('id_back')->move(public_path($folder), 'id_back.' . $request->file('id_back')->getClientOriginalExtension());
        // $passportPath = $request->file('passport_photo')->move(public_path($folder), 'passport.' . $request->file('passport_photo')->getClientOriginalExtension());
    
        $folder = 'kyc_uploads/' . $user->id;

        // Save to default disk (local => storage/app/public)
        $idFrontPath = $request->file('id_front')->store($folder, 'public');
        $idBackPath = $request->file('id_back')->store($folder, 'public');
        $passportPath = $request->file('passport_photo')->store($folder, 'public');
    
        if ($user->kyc) {
            return back()->with('error', 'You have already submitted your KYC.');
        }


        
        // Prevent duplicate KYC submission
        if ($user->kyc) {
            return back()->with('error', 'You have already submitted your KYC.');
        }
    
        Kyc::create([
            'user_id' => $user->id,
            'dob' => $request->dob,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'id_type' => $request->id_type,
            'id_front' => $folder . '/' . basename($idFrontPath),
            'id_back' => $folder . '/' . basename($idBackPath),
            'passport_photo' => $folder . '/' . basename($passportPath),
        ]);
    
        return back()->with('success', 'KYC submitted successfully and is now under review.');

    }
    
}
