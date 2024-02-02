@extends('admin.layout.main')
@section('content')
<div class="container mt-4">
    <h3 class="font-bold">Add Category</h3>
    <form action="/update-category/{{$category->id}}" method="post">
        @csrf
        category <br>
        <input type="text" name="name " value="{{$category->name }}" class="form-control mt-4">
        <button type="submit" class="bg-blue-400 mt-4 px-3 py-2 rounded-">Submit</button>

    </form>
</div>
@endsection