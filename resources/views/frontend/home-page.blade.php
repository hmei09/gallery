@extends('layout.main')
@section('content')
    <div class="container-fluid pt-2">
        <div class="row masonry justify-content-center align-items-center" data-masonry='{"percentPosition": true }'>
            @foreach ($photo as $data)
                <div class="imaged mx-auto col-6 col-xxl-2 col-xl-3 col-lg-3 col-md-4 col-sm-4">
                    <a href="/photo/{{$data->id_photo}}">
                        <img src="{{ asset('images/' . $data->photo) }}" class="rounded hover-zoom" alt="..."
                            width="236px" height="auto" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
