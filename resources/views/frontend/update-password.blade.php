@extends('layout.main')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="bg-white shadow p-4">
                <div class="max-w-xl mx-auto">
                    <section>
                        <header style="">
                            <h4 class="text-lg fw-medium text-gray-900" style="font-family: sans-serif">
                                Update Password
                            </h4>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                Ensure your account is using a long, random password to stay secure.
                            </p>
                        </header>
                    
                        <form method="post" action="" class="mt-6">
                            @csrf                            
                    
                            <div class="mb-3">
                                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                                <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
                                @if ($errors->updatePassword->has('current_password'))
                                    <div class="text-danger">{{ $errors->updatePassword->first('current_password') }}</div>
                                @endif
                            </div>
                    
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('New Password') }}</label>
                                <input id="password" name="password" type="password" class="form-control" autocomplete="new-password" />
                                @if ($errors->updatePassword->has('password'))
                                    <div class="text-danger">{{ $errors->updatePassword->first('password') }}</div>
                                @endif
                            </div>
                    
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
                                @if ($errors->updatePassword->has('password_confirmation'))
                                    <div class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                                @endif
                            </div>
                    
                            <div class="d-flex gap-4 align-items-center">
                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                    
                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Saved.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection