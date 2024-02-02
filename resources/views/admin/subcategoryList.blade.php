@extends('admin.layout.main')
@section('content')
@if(session('message'))
<div class="alert alert-primary" role="alert">
    <span>{{session('message')}}</span>
</div>
@endif
<div class="form-container">
    <form action="/add-subcategory" method="POST">
        @csrf
        <div class="mb-3">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="exampleFormControlInput1" class="form-label">SubCategory Name</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="subcategory name">
        </div>
        <div class="mb-3">
            <select class="form-select" name="category_id" aria-label="Multiple select example">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit" class="bg-blue-700 rounded text-white px-3 py-2 cursor-pointer">
    </form>
</div>
<div class="table-container mt-5">
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col"> Category Name </th>
                <th scope="col"> Sub-Category Name </th>
                <th scope="col"> Slug </th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subcategories as $subcategory)
            <tr>
                <th scope="row">{{$subcategory->id}}</th>
                <td>{{ $subcategory->category->name }}</td>
                <td>{{$subcategory->name}}</td>
                <td>{{$subcategory->slug}}</td>


                <td>
                    <a href="/edit-subcategory/{{$subcategory->id}}" class="btn btn-primary">Edit</a>
                    <a href="/delete-subcategory/{{$subcategory->id}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
          
            @endforeach
        </tbody>
    </table>
</div>
@endsection