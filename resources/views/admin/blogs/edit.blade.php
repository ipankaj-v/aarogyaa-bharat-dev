@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Blog</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><small>Edit Blog</small></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="blogForm" method="POST" action="{{ route('admin.blogs.update', $blog->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="blogName">Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="blogName" placeholder="Enter Blog Name" value="{{ old('name', $blog->name) }}">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="blogImage">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="blogImage" onchange="previewBolgImage(event)">
                                            <label class="custom-file-label" for="blogImage">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    @if($blog->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $blog->images->first()->path) }}" alt="{{ $blog->title }}" id="currentImage" width="100" class="mt-2">
                                    @endif
                                    <img id="previewImage" src="#" alt="Image Preview" width="100" class="mt-2 d-none">
                                </div>
                                <div class="form-group">
                                    <label for="blogTitle">Title</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="blogTitle" placeholder="Enter Blog Title" value="{{ old('title', $blog->title) }}">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="blogDescription">Description</label>
                                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="blogDescription" placeholder="Enter Blog Description">{{ old('description', $blog->description) }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="blogContentHtml">Content HTML</label>
                                    <textarea name="content_html" class="form-control @error('content_html') is-invalid @enderror" id="blogContentHtml" placeholder="Enter Blog Content HTML">{{ old('content_html', $blog->content_html) }}</textarea>
                                    @error('content_html')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        CKEDITOR.replace('blogContentHtml');
    });
</script>
@endsection