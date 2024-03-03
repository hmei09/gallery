@extends('layout.main')
@section('content')
    <form action="{{ route('photo.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control"> <!-- sesuaikan dengan name dan id -->
        </div>
        <div class="form-group">
            <label for="description">Desk</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea> <!-- sesuaikan dengan name dan id -->
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" id="photo" name="photo" class="form-control"> <!-- sesuaikan dengan name dan id -->
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
@endsection
