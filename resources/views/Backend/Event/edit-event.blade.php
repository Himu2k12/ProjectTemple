@extends('Backend.master')

@section('title')
    Update Event
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
                <h5 style="text-align: center" class="m-0 font-weight-bold text-primary">Edit Event</h5>
                <h6 style="text-align: center" class="text-success">{{ Session::get('message') }}</h6>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-body">
                        <div class="card-body">
                            <form method="post" action="{{url('/update-event')}}" enctype="multipart/form-data" name="event">

                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Event Title<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input type="hidden" name="id" value="{{$editEvent->id}}">
                                                <input  name="event_title" type="text" class="form-control" required="required" placeholder="Event Title" value="{{$editEvent->event_title}}">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3">Event Date<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input  name="event_date" type="date" class="form-control" id="source" required="required"  value="{{$editEvent->event_date}}">
                                                <span style="color: red;padding-left: 10px">{{ $errors->has('event_date') ? $errors->first('event_date') : ' ' }}</span>
                                            </div>

                                        </div>
                                        <div class="row form-group">
                                            <label class="col-sm-3">Event Time<span style="color: green">*</span></label>
                                            <div class="col-sm-9 form-group" >
                                                <input  name="event_time" type="time" class="form-control" id="source" required="required"  value="{{$editEvent->event_time}}">
                                                <span style="color: red;padding-left: 10px">{{ $errors->has('event_time') ? $errors->first('event_time') : ' ' }}</span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row form-group">
                                            <label class="col-sm-3">Event Description<span style="color: red">*</span></label>
                                            <div class="col-sm-9 form-group">
                                                <textarea id="summernote" name="event_description" type="text" class="form-control" id="message" rows="5" required="required" placeholder="Idea Description">{{$editEvent->event_description}}</textarea>
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
                                        <input type="submit" name="btn" class="btn btn-success btn-block" value="Update"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-body row table-responsive">
                            <img class="offset-sm-1" id="slider" src="{{asset($editEvent->event_photo)}}" />
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

        document.forms['event'].elements['publication_status'].value = '{{$editEvent->publication_status }}';
    </script>

@endsection
