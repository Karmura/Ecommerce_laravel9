@extends('layouts.admin')
@section('content')
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Salse</h6>
            <a href="{{ url('admin/create') }}" class="btn btn-info btn-sm py-2">Add New</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-white">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Cover Photo</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->body }}</td>
                            <td>
                                <img src="/movie/cover/{{ $item->cover }}" class="img-responsive"
                                    style="max-width:100px; max-height:100px;" alt="{{ $item->cover }}" />
                                {{-- <img src="/movie/cover/{{ $item->cover }}" alt=""> --}}
                            </td>
                            <td>
                                <a href="edit/{{ $item->id }}" class="btn btn-sm btn-success">Update</a>
                            </td>
                            {{-- <td>
                                <a href="delete/{{ $item->id }}" class="btn btn-sm btn-primary">Delete</a>
                            </td> --}}

                            <td>
                                <form action="delete/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary"
                                        onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
