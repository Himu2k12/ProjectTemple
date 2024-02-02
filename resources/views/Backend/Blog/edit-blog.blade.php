@extends('Backend.master')

@section('title')
    Manage Blogs
@endsection

@section('style')
    <link href="{{asset('/Assets/')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Blog</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="card-body">
                            <form method="post" action="{{url('/update-blog')}}"  enctype="multipart/form-data" name="editBlog">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Blog Title<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input type="hidden" value="{{$editBlog->id}}" name="id"/>
                                                <input  name="blog_title" type="text" class="form-control" required="required" placeholder="Blog Title" value="{{$editBlog->blog_title}}">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3">Source Name<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input  name="blog_source" type="text" class="form-control" id="source" required="required" placeholder="Souce of Blog EX-> GITA" value="{{$editBlog->blog_source}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Blog Description<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group">
                                                <textarea id="summernote" name="blog_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description">{!! $editBlog->blog_description !!}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Blog Photo</label>
                                            <div class="form-group col-sm-9">
                                                <input  name="blog_photo" onchange="readURL3(this)" type="file" accept="image/*" class="form-control" placeholder="Blog Title" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Publication Status<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group">
                                                <select name="publication_status" class="form-control">
                                                    <option>---Select Publication Status---</option>
                                                    <option value="1">Published</option>
                                                    <option value="0">Unpublished</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Update"/>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="card-body row table-responsive">
                            <img class="offset-sm-3" id="slider" src="{{$editBlog->blog_photo}}" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <script>
        $('#summernote').summernote({
            placeholder: 'Blog Description',
            tabsize: 4,
            height: 150,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });

        document.forms['editBlog'].elements['publication_status'].value = '{{$editBlog->publication_status }}';
    </script>

@endsection
