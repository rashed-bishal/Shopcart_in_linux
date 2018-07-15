@extends('layouts.admin')

@section('title')
    Home-Admin DashBoard
@endsection

@section('navbar')
    @include('navbars.dashboard')
@endsection

@section('content')
    <div class="container"><br><br>
        <div class="row">

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <input class="form-control" type="text" style="border-color: rgba(126, 239, 104, 0.8);
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(126, 239, 104, 0.6);
  outline: 0 none;" name="createCategory" id="createCategory" autocomplete="off" placeholder="Type a new category here">
                                <div id="createCategoryError" style="color: red"></div>
                            </div>
                            <div class="form-group">
                                <a class="form-control btn btn-success" type="submit" href="" id="createButton">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <div class="input-group updateDyn">
                                    <select class="form-control" id="updateCategory">
                                        <option value="">Select a category</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                        @endforeach
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary closeAndRefresh" type="button"><i class="material-icons">&#xe5d5;</i></button>
                                    </div>
                                </div>
                                <div id="updateCategoryError" style="color: red"></div>
                            </div>
                            <div class="form-group">
                                <a class="form-control btn btn-warning" id="updateButton">Update</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <br><br><br>
        <div class="row">

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Delete Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <select class="form-control" id="deleteCategory">
                                    <option value="">Select a category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                                <div id="deleteCategoryError" style="color: red"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <a class="form-control btn btn-danger" style="color: white;" id="deleteButton">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title" id="Crap">
                            Create Category00
                        </h5>
                        <div class="card-text">
                            A quick brown fox jumps over the lazy dog
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@include('notifications.modals')

@section('scripts')
    <script type="text/javascript" src="{{asset('js/CategoryManagement.js')}}"></script>
@endsection