@extends('Backend.master')

@section('title')
    Manage Events
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Events</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <nav class="divstyle border-bottom-success">
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Add Event</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-account" role="tab" aria-controls="nav-profile" aria-selected="false">All Events</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">Add Event</h6>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/create-event')}}" enctype="multipart/form-data">

                                            {{csrf_field()}}
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Event Title<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="event_title" type="text" class="form-control" required="required" placeholder="Event Title" value="{{old('event_title')}}">
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Event Date<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="event_date" type="date" class="form-control" id="source" required="required"  value="{{old('event_date')}}">
                                                            <span style="color: red;padding-left: 10px">{{ $errors->has('event_date') ? $errors->first('event_date') : ' ' }}</span>
                                                        </div>

                                                    </div>
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Event Time<span style="color: green">*</span></label>
                                                        <div class="col-sm-9 form-group" >
                                                            <input  name="event_time" type="time" class="form-control" id="source" required="required"  value="{{old('event_time')}}">
                                                            <span style="color: red;padding-left: 10px">{{ $errors->has('event_time') ? $errors->first('event_time') : ' ' }}</span>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Event Description<span style="color: red">*</span></label>
                                                        <div class="col-sm-9 form-group">
                                                            <textarea id="summernote" name="event_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description">{{old('blog_description')}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row form-group">
                                                        <label class="col-sm-3">Event Photo</label>
                                                        <div class="form-group col-sm-9">
                                                            <input  name="event_photo" onchange="readURL3(this)" type="file" accept="image/*" class="form-control" >
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


                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" name="btn" class="btn btn-success btn-block" value="Create"/>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <img class="offset-sm-1" id="slider" src="#" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-account" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-12">
                                    <div class="card-header py-12">
                                        <div>
                                            <h6 class="m-0 text-md-center font-weight-bold text-md-center text-primary">All Events</h6>
                                        </div>
                                    </div>
                                    <div class="card-body row table-responsive">
                                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                                            <thead>
                                            <tr>
                                                <th>Event ID</th>
                                                <th>Event Title</th>
                                                <th>Event Date</th>
                                                <th>Event Time</th>
                                                <th>Created At</th>
                                                <th>Created By</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @foreach($events as $item)
                                                <tr class="odd gradeX">

                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->event_title}}</td>
                                                    <td>{{ $item->event_date}}</td>
                                                    <td>{{ $item->event_time}}</td>
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

                                                        <a href="{{ url('/edit-event/'.$item->slug) }}" class="btn btn-secondary btn-xl" title="Edit Blog">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ url('/delete-event/'.$item->id) }}" onclick="return confirm('Are you sure to delete the photo?')" class="btn btn-danger btn-xl" title="Delete Photo">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

<script>
    $('#summernote').summernote({
        placeholder: 'Event Description',
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
