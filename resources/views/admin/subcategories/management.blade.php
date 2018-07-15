@extends('layouts.admin')

@section('title')
    Sub-Category Management-Admin DashBoard
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
                        <h5>Create Sub-Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <select class="form-control" id="createCategorySelect">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="createSubCategory" id="createSubCategory" placeholder="Type a new sub-category here">
                                <div id="createSubCategoryError" style="color: red"></div>
                            </div>
                            <div class="form-group">
                                <a class="form-control btn btn-success" href="" id="createButton">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2"></div>

            <div class="col-sm-5">
                <div class="card">
                    <div class="card-header">
                        <h5>Update Sub-Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <select class="form-control" id="updateCategorySelect">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group updateSubCategory">
                                    <select class="form-control" id="updateSubCategory">
                                        <option value="">Select a sub-category</option>
                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary closeAndRefresh" type="button"><i class="material-icons">&#xe5d5;</i></button>
                                    </div>
                                </div>
                                <div id="updateSubCategoryError" style="color: red"></div>
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
                        <h5>Delete Sub-Category</h5>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <div class="form-group">
                                <select class="form-control" id="deleteCategorySelect">
                                    <option value="">Select a Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="deleteSubCategory">
                                    <option value="">Select a sub-category</option>
                                </select>
                                <div id="deleteSubCategoryError" style="color: red"></div>
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
    <script type="text/javascript" src="{{asset('js/SubcategoryManagement.js')}}"></script>
@endsection