@extends('layouts.admin')

@section('title')
    Home-Admin DashBoard
@endsection

@section('navbar')
    @include('navbars.dashboard')
@endsection

@section('content')
    <div class="container"><br>
        <div class="col-sm-8">
            <h2>Category List</h2>
        </div>
        <div class="col-sm-10"><br>
            <table class="table table-striped table-light">
                <thead>
                <tr>
                    <th>#Id</th>
                    <th>Category Name</th>
                    <th>Created</th>
                    <th>Updated</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->created_at?$category->created_at->diffForHumans():'No Record Available'}}</td>
                        <td>{{$category->updated_at?$category->updated_at->diffForHumans():'No Record Available'}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="row">
            <div class="col-sm-8">
                {{$categories->links()}}
            </div>
        </div>
    </div>



@endsection