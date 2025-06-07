@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Transaction History</h4>

                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Name:</h6>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{me()->name ?? ''}}</h6>
                    </div>
                </div>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Email:</h6>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <h6 class="font-weight-bold mb-0">{{me()->email ?? ''}}</h6>
                    </div>
                </div>
                <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                        <h6 class="mb-1">Referral Link:</h6>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                        <a
                            href="{{ generateReferralLink(auth()->user()) }}">{{ generateReferralLink(auth()->user()) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-body">
                    <h4 class="card-title">Personal Info*</h4>
                    @if ($errors->updatePassword->any())
                    <div class="alert font-13 info-alert" role="alert" style="background-color: #b01763;"><i class="fa fa-warning m-r-5"></i>
                        <ul>
                            @foreach ($errors->updatePassword->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>

                    @endif
                    <form method="post" action="{{ route('profile.update') }}" class="forms-sample">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{me()->name}}" name="amount" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="{{me()->email}}" name="email" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Change Password*</h4>
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    <div class="form-group row">
                        <label for="exampleInputUsername1" class="col-sm-3 col-form-label">Current Pwd</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="current_password"
                                placeholder="Current Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputUsername1" class="col-sm-3 col-form-label">New Pwd</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" placeholder="New Password"
                                name="password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Confirm Pwd</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password"
                                placeholder="Confirm Password" name="password_confirmation">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection