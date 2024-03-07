@extends('layout.main')
@section('content')
    <div class="container mt-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="card col-8">
                <div class="row">
                    <div class="col-6">
                        <img src="{{ asset('images/' . $photo->photo) }}" class="m-3 rounded img-fluid" alt=""
                            width="350px" />
                    </div>
                    <div class="col-6 ">
                        <div class="mt-3 d-flex justify-content-between">
                            <div class="judul">
                                <h4>{{ $photo->judul }}</h4>
                            </div>
                            <div class="down">
                                <!-- Default dropstart button -->
                                <div class="dropstart">
                                    <div class="" style="width: 30px;" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </div>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                        @if (Auth::id() == $photo->user->id)
                                            <li><a class="dropdown-item" href="/edit-photo/{{ $photo->id_photo }}">Edit</a>
                                            </li>
                                            <li>
                                                <button onclick="confirmDelete('{{ $photo->id_photo }}')"
                                                    class="dropdown-item">Delete</button>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <div class="row overflow-y-scroll" style="max-height: 300px;">
                            <div class="media row">
                                <div class="col-2 media-head">
                                    <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                        src="{{ asset('images/' . $photo->user->photo_profile) }}" width="55px"
                                        height="55px" />
                                </div>
                                <div class="media-body col-10 d-flex align-items-center">
                                    <h6>{{ $photo->user->name }}</h6>
                                </div>
                                <div>
                                    <div class="container mb-5 mt-3  comment-session">
                                        <div class="row">
                                            <div class="col-md-12 ove">
                                                <h5 class="mb-2">comment</h5>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="media row">
                                                            @foreach ($comments as $comment)
                                                                <div class="col-2 media-head">
                                                                    <img class="mr-3 rounded-circle"
                                                                        alt="Bootstrap Media Preview"
                                                                        src="{{ asset('images/' . $comment->user->photo_profile) }}"
                                                                        width="40px" height="40px" />
                                                                </div>
                                                                <div class="media-body col-10">
                                                                    <div class="">
                                                                        <div class="d-flex">
                                                                            <h6>{{ $comment->user->name }}</h6>
                                                                            <span> -
                                                                                {{ $comment->created_at->diffForHumans() }}</span>
                                                                        </div>
                                                                    </div>
                                                                    {{ $comment->comment }}
                                                                    <!-- Additional content for comments can be added here -->
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="jumlah-like">{{ $likeCount }} </div>
                            <div class="like d-flex justify-content-between">
                                <form action="{{ route('like.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id_photo" value="{{ $photo->id_photo }}">
                                    <button type="submit" class="btn btn-{{ $photo->isLikedBy(auth()->id()) ? 'primary' : 'danger' }}">
                                        <i class="fas fa-heart"></i>
                                        {{ $photo->isLikedBy(auth()->id()) ? 'Unlike' : 'Like' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('comment.store') }}" method="post" class="my-4">
                            @csrf
                            <div class="row">
                                <div class="col-2 media-head">
                                    @isset(Auth::user()->photo_profile)
                                        <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                            src="{{ asset('images/' . Auth::user()->photo_profile) }}" width="40px"
                                            height="40px" />
                                    @else
                                        <img src="/images/blank.jpeg" />
                                    @endisset
                                </div>
                                <div class="form-group col 8">
                                    <input type="hidden" class="form-control" value="{{ $photo->id_photo }}"
                                        name="id_photo">
                                    <input type="hidden" class="form-control" value="{{ Auth::user()->id }}"
                                        name="id">
                                    <input type="text" class="form-control" name="comment">
                                </div>
                                <div class="form-group col-2">
                                    <button type="submit" class="btn btn-primary"><i
                                            class="fas fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
