@extends('Backend.master')

@section('title')
    Manage Photos
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Photos</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Blog</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">All BLogs</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Add Blog</h6>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/create-blog')}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Blog Title<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="blog_title" type="text" class="form-control" required="required" placeholder="Blog Title" value="{{old('blog_title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Source Name<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="blog_source" type="text" class="form-control" id="source" required="required" placeholder="Souce of Blog EX-> GITA" value="{{old('blog_source')}}">
{{--                                                            <span style="color: red;padding-left: 10px">{{ $errors->has('') ? $errors->all() : ' ' }}</span>--}}
                                                            @if ($errors->any())
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Blog Description<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group">
                                                            <textarea id="summernote" name="blog_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description">{{old('blog_description')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Blog Photo</label>
                                                        <div class="form-group col-sm-9">
                                                            <input  name="blog_photo" onchange="readURL3(this)" type="file" accept="image/*" class="form-control" >
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
                                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Create"/>
                                                    </div>
                                                </div>

                                            </div>

                                        </form>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <img class="offset-sm-3" id="slider" src="#" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Blogs</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>Blog ID</th>
                                                <th>Blog Title</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($blogs as $item)
                                                <tr class="odd gradeX">

                                                    <td>{{ $item->id }}</td>
                                                    <td> {{ $item->blog_title }}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>{{$name->name($item->created_by)->name}}</td>
                                                    <td style="text-align: center">
                                                        @if($item->publication_status ==1)
                                                            <span style="background-color: green;color: white; border-radius: 5px; padding: 5px"> Published </span>
                                                        @else
                                                            <span style="background-color: red;color: white; border-radius: 5px; padding: 5px"> Unpublished</span>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <a href="{{ url('/edit-blog/'.$item->slug) }}" class="btn btn-secondary btn-xl" title="Edit Blog">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ url('/delete-blog/'.$item->id) }}" onclick="return confirm('Are you sure to delete the photo?')" class="btn btn-danger btn-xl" title="Delete Photo">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="offset-4 col-sm-4">
                            <span style="color: red;padding-left: 10px">{{ $errors->has('slide_name') ? $errors->first('slide_name') : ' ' }}</span>
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
</script>

@endsection
