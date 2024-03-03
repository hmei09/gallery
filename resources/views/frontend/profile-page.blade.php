@extends('layout.main')
@section('content')
    <div class="container mt-5">
        <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row gutters">
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="account-settings">
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        @isset($user->photo_profile)
                                            <img src="{{ asset('images/' . $user->photo_profile) }}" style="object-fit: cover;" id="hop"/>
                                        @else
                                            <img src="/images/blank.jpeg" id="hop"/>
                                        @endisset
                                    </div>
                                    <h5 class="user-name">{{ old('name', $user->name) }}</h5>
                                    <h6 class="user-email">{{ old('email', $user->email) }}</h6>
                                </div>
                                <div class="about">
                                    <h5>About</h5>
                                    <p style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
                                        {{ old('deskrispi', $user->deskripsi) }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Full Name</label>
                                        <input type="text" name="name" class="form-control" id="fullName"
                                            value="{{ old('name', $user->name) }}" />
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="email" class="form-control" id="eMail"
                                            value="{{ old('email', $user->email) }}" />
                                    </div>
                                </div>
                                {{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" id="phone"
                                        placeholder="Enter phone number" />
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">Website URL</label>
                                    <input type="url" class="form-control" id="website" placeholder="Website url" />
                                </div>
                            </div> --}}
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">About Me</h6>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="Street">Description</label>
                                        <!-- <input type="name" class="form-control" id="Street" placeholder="Enter Street"> -->
                                        <textarea name="deskripsi" class="form-control" id="" placeholder="Enter Your Description Here" cols="10"
                                            rows="5">{{ old('deskrispi', $user->deskripsi) }}</textarea>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Photo Profile</h6>
                                </div>
                                <div class="col-12">                                    
                                    <div class="form-group">                                        
                                        <label for="photo" class="btn btn-light">
                                            <i class="fas fa-solid fa-upload"></i> Upload File Here
                                        </label>
                                        <input type="file" onchange="readURL(this);"
                                            class="form-control-file visually-hidden" name="photo_profile" id="photo"
                                            accept=".png,.jpg,.jpeg,.gif">
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters mt-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        {{-- <button type="button" id="submit" name="submit" class="btn btn-secondary">
                                            Cancel
                                        </button> --}}
                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
