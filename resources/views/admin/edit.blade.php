@extends('layouts.admin')
@section('content')
    <div class="col-sm-12 col-xl-12">
        <form action="/admin/update/{{ $items->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-secondary rounded h-100 p-4">
                <h1 class="mb-4 text-center py-4">Edit Movie</h1>

                <div class="form-floating mb-3">
                    <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Title"
                        value="{{ $items->title }}" />
                    <label for="floatingInput">Movie Title</label>
                </div>

                <div class="mb-1">
                    <label for="formFileSm" class="form-label">Cover Image</label>
                    <input type="file" name="cover" id="formFileSm"
                        class="form-control form-control-sm bg-dark py-2" />

                    <img src="/movie/cover/{{ $items->cover }}" class="img-responsive img-thumbnail mt-2"
                        style="max-width:225px; max-height:225px; " alt="{{ $items->cover }}" />
                </div>
                {{-- <form action="/admin/deletecover/{{ $items->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary mb-3">Delete</button>
                </form> --}}
                <a href="/admin/deletecover/{{ $items->id }}" class="btn btn-primary mb-3">Delete</a>



                <div class="form-floating">
                    <textarea name="body" class="form-control" placeholder="Leave a description here" id="floatingTextarea"
                        style="height: 250px;" rows="20">{{ $items->body }}</textarea>
                    <label for="floatingTextarea">Description</label>
                </div>

                <div class="my-3">Movies</label>
                    <input type="file" name="movies[]" id="formFileMultiple" class="form-control bg-dark py-2"
                        multiple />

                    @foreach ($items->movies as $movie)
                        <img src="/movie/{{ $movie->movie }}" class="img-responsive img-thumbnail mt-2"
                            style="max-width:225px; max-height:225px; " alt="{{ $movie->movie }}" />

                        {{-- <form action="/admin/deletemovie/{{ $movie->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm mb-3 mt-1">Delete</button>
                        </form> --}}
                        <div>
                            <a href="/admin/deletemovie/{{ $movie->id }}"
                                class="btn btn-primary btn-sm mb-3 mt-1">Delete</a>
                        </div>
                    @endforeach

                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>

            </div>

        </form>
    </div>
@endsection
