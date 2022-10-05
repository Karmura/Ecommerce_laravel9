@extends('layouts.admin')
@section('content')
    <div class="col-sm-12 col-xl-12">
        <form action="/admin/store" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="bg-secondary rounded h-100 p-4">
                <h1 class="mb-4 text-center py-4">Creating New Item</h1>

                <div class="form-floating mb-3">
                    <input type="text" name="title" class="form-control" id="floatingInput" placeholder="Title" />
                    <label for="floatingInput">Movie Title</label>
                </div>

                <div class="mb-3">
                    <label for="formFileSm" class="form-label">Cover Image</label>
                    <input type="file" name="cover" id="formFileSm"
                        class="form-control form-control-sm bg-dark py-2" />
                </div>

                <div class="form-floating">
                    <textarea name="body" class="form-control" placeholder="Leave a description here" id="floatingTextarea"
                        style="height: 250px;" rows="20"></textarea>
                    <label for="floatingTextarea">Description</label>
                </div>

                <div class="my-3">Movies</label>
                    <input type="file" name="movies[]" id="formFileMultiple" class="form-control bg-dark py-2" />
                </div>

                <button type="submit" class="btn btn-primary mt-3">Submit</button>

            </div>

        </form>
    </div>
@endsection
