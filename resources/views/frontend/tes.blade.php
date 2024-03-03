@extends('layout.main')
@section('content')
<div class="container mt-5">
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-8">
            <div class="row gutters">
                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 pb-4 d-flex align-items-center justify-content-center">
                                    <img src="/images/blank.jpeg" id="hop" class="rounded" alt=""
                                        width="295px">
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <label for="foto" class="btn btn-primary">
                                        <i class="fas fa-solid fa-upload"></i> Upload File Here
                                    </label>
                                    <input type="file" onchange="readURL(this);"
                                        class="form-control-file visually-hidden" name="foto" id="foto"
                                        accept=".png,.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Description</h6>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <!-- <input type="name" class="form-control" id="Street" placeholder="Enter Street"> -->
                                        <textarea name="deskripsi" class="form-control" id="" placeholder="Enter Your Description Here" cols="10"
                                            rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters mt-3">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit" class="btn btn-secondary">
                                            Cancel
                                        </button>
                                        <button type="button" id="submit" name="submit" class="btn btn-primary">
                                            <i class="fas fa-solid fa-upload"></i> Post
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
