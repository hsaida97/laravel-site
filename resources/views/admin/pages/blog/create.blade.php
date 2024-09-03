@extends('admin.app')
@section('_styles')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('_content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Starter Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{route('admin.blog.create')}}">Blog elave et</a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{session('success')}}
            </div>
        @endif
        @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
            </div>
            <form method="POST" action="{{route('admin.blog.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleSelectBorder">Category</label>
                        <select name="category_id" class="custom-select form-control-border" id="exampleSelectBorder">
                            <option disabled selected>Category Seç</option>
                           @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Blog Basliq</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1"
                               placeholder="Enter email" >
                        @error('title')
                        <span>{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="card-body">
                    <textarea id="summernote" name="content">
              </textarea>
                            @error('content')
                            <span>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('_js')
    <script src="{{ asset('assets/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function () {
            $('#summernote').summernote();
        });
    </script>
@endsection
