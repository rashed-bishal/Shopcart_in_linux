@extends('layouts.admin')

@section('title')
    Home-Admin DashBoard
@endsection

@section('navbar')
    @include('navbars.dashboard')
@endsection

@section('content')

    <div class="container"><br>
        <div class="text-center"><h5>Upload a new product</h5></div>
    </div>

    <div class="container">
        <div class="row">
            <table class="table table-striped table-light">
                <thdead>
                    <tr>
                        <td>
                            <select class="form-control" name="" id="categorySelect">
                                <option value="">Select a category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="form-control" name="" id="subcategorySelect">
                                <option value="">Select a subcategory</option>
                            </select>
                        </td>
                    </tr>
                </thdead>
            </table>
        </div>
    </div>

    <div class="container"><br>
        <div class="text-center distinct">

        </div>
    </div>

    <div class="container"><br>
        <div class="text-center form-title">

        </div>
    </div>

    <div class="container form-body"><br>
        <form action="{{route('mobile.store')}}" method="post" class="col-sm-10 offset-sm-1">

        </form>
    </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="{{asset('js/ProductManagement.js')}}"></script>
@endsection