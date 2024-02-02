@extends('admin.layout.main')
@section('content')
<div class="container mt-4">
    <h3 class="font-bold">Add Category</h3>
    <form action="/add-category" method="post">
        @csrf
        category <br>
        <input type="text" name="name" class="form-control mt-4">
        <button type="submit" class="bg-blue-400 mt-4 px-3 py-2 rounded-3">Submit</button>

    </form>
</div>
<div class="table mt-4">
    <table class="table display">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->name }}</td>
                <td>{{$category->slug }}</td>

                <td>
                    <a href="/edit-category/{{$category->id}}" class="btn btn-primary">Edit</a>
                    <a href="/delete-category/{{$category->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection