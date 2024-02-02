<?php

namespace App\Http\Controllers;


use App\Blog;
use App\Event;
use App\Photo;
use App\Role;
use App\User;
use App\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Gate;
use Image;

class SuperAdminController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }
    public function dashboard(){

        return view('Backend.home');
    }
    //Methods for Role Manaegment starts form here
    public function addRolePage(){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }else{
            $roles=Role::all();
            return view('Backend.SuperAdmin.role.add-role',['roles'=>$roles]);
        }
    }
    public function CreateRole(Request $request){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $this->validate($request,[
            'role'=>'unique:roles|required',
        ]);
        $role=new Role();
        $role->role=$request->role;
        $role->status=1;
        $role->save();
        return back()->with('message','New Role Successfully Created!');
    }
    public function inactiveRoleInfo($id){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $roleById = Role::find($id);
        $roleById->status = 0;
        $roleById->save();
        return redirect('/view-add-role-page')->with('message', 'Role info Inactive successfully');
    }
    public function activeRoleInfo($id){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $roleById = Role::find($id);
        $roleById->status = 1;
        $roleById->save();
        return redirect('/view-add-role-page')->with('message', 'Role info Active successfully');
    }
    public function editRole($id) {
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }

        $editById = Role::find($id);
        return view('Backend.SuperAdmin.role.edit-role', ['editById'=>$editById]);
    }
    public function updateRoleInfo(Request $request){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $this->validate($request, [
            'role'=>'required|min:2|max:50|unique:roles',
            'status'=>'required',
        ]);
        $updateRoleById = Role::find($request->id);
        $updateRoleById->role=$request->role;
        $updateRoleById->status=$request->status;
        $updateRoleById->save();
        return redirect('/view-add-role-page')->with('message', 'Role info Updated successfully');
    }
    //Methods for Role management ends here

    //Methods for Employee management starts here
    public function viewEmployeePage(){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $users=User::where('role_id','!=',1)->get();
        $role=Role::where('id','!=',1)->get();

        return view('Backend.SuperAdmin.Employee.add-employee',['users'=>$users,'role'=>$role]);
    }
    protected function newEmployee(Request $request)
    {
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
        $users=new User();
        $users->name = $request['name'];
        $users->email = $request['email'];
        $users->password= Hash::make($request['password']);
        $users->role_id= $request['role'];
        $users->status = 0;
        $users->save();

        return redirect('/manager-registration-page')->with('message','New Manager Enrolled Successfully!');

    }
    public function editEmployee($id){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $userInfo=User::find($id);
        $role=Role::where('id','!=',1)->where('status',1)->get();
        return view('Backend.SuperAdmin.Employee.edit-employee',compact('userInfo','role'));
    }
    public function UpdateEmployee(Request $request){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required'],
        ]);
        $users=User::find($request->id);
        $users->name = $request['name'];
        $users->role_id= $request['role'];
        $users->save();

        return redirect('/manager-registration-page')->with('message','Manager Info Updated!');
    }
    public function inactiveEmployeeInfo($id){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $roleById = User::find($id);
        $roleById->status = 0;
        $roleById->save();
        return redirect('/manager-registration-page')->with('message', 'Manager Access Deactivated!');
    }
    public function activeEmployeeInfo($id){
        if(!Gate::allows('isSuper')){
            abort('404','you cannot access here');
        }
        $roleById = User::find($id);
        $roleById->status = 1;
        $roleById->save();
        return redirect('/manager-registration-page')->with('message', 'Manager Access Activated!');
    }
    //Methods for Employee management ends here

    public function uploadForm(){
        $photos=Photo::all();
        //dd($photos);
        return view('Backend.Photo.add-photo',['photos'=>$photos]);
    }
    public function newphoto(Request $request){
        $SlideImage = $request->file('photo_name');

        $imageName = $SlideImage->getClientOriginalName();
        $directory = 'websiteImages/';
        $temp = explode(".", $imageName);
        $newfilename= round(microtime(true)) . '.' . end($temp);
        $imgUrlSlide = $directory.$newfilename;
        Image::make($SlideImage)->resize(336, 326)->save($imgUrlSlide);

        $newPhoto=new Photo();
        $newPhoto->photo_name=$imgUrlSlide;
        $newPhoto->created_by=Auth::user()->id;
        $newPhoto->save();
        return back()->with('message','New Photo Added Successfully!');

    }
    public function deletePhoto($id){
        $delid=Photo::find($id);
        if (file_exists($delid->photo_name)) {

            @unlink($delid->photo_name);

        }
        $delid->delete();
        return back()->with('message','Photo Deleted Successfully!');
    }
    public function HomeVideo(){
        return view('Backend.Videos.home-video');
    }
    public function CreateHomeVideo(Request $request)
    {

        if ($request->file('cover_photo')){
            $SlideImage = $request->file('cover_photo');
        $imageName = $SlideImage->getClientOriginalName();
        $directory = 'websiteImages/';
        $temp = explode(".", $imageName);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $imgUrlSlide = $directory . $newfilename;
        Image::make($SlideImage)->resize(800,500)->save($imgUrlSlide);
         }
        $newVideo=new Video();
        $newVideo->video_link=$request->video_link;
        if ($request->file('cover_photo')) {
            $newVideo->cover_photo = $imgUrlSlide;
        }
        $newVideo->created_by=Auth::user()->id;
        $newVideo->save();
        return back()->with('message', 'Video uploaded sucessfuly');
    }
    public function blogPage(){
        $blogs=Blog::all();
        $name=new User();
        return view('Backend.Blog.blog-form',['blogs'=>$blogs,'name'=>$name]);
    }
    public function createBlog(Request $request){
        $this->validate($request,[
           'blog_title'=>'required',
           'blog_source'=>'required',
           'blog_description'=>'required|max:10000',
           'blog_photo'=>'',
           'publication_status'=>'required',
        ]);

        if ($request->file('blog_photo')){
            $SlideImage = $request->file('blog_photo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(800,500)->save($imgUrlSlide);
        }
        $newBlog=new Blog();
        $newBlog->blog_title=$request->blog_title;
        $newBlog->blog_source=$request->blog_source;
        $newBlog->blog_description=$request->blog_description;
        if ($request->file('blog_photo')) {
            $newBlog->blog_photo = $imgUrlSlide;
        }
        $newBlog->publication_status=$request->publication_status;
        $newBlog->created_by=Auth::user()->id;
        $newBlog->save();
        return back()->with('message','Blog Created Successfully!');
    }
    public function editBlog($slug){

        $editBlog=Blog::where('slug',$slug)->first();
        return view('Backend.Blog.edit-blog',['editBlog'=>$editBlog]);
    }
    public function updateBlog(Request $request){
        $this->validate($request,[
            'blog_title'=>'required',
            'blog_source'=>'required',
            'blog_description'=>'required|max:10000',
            'blog_photo'=>'',
            'publication_status'=>'required',
        ]);

        if ($request->file('blog_photo')){
            $SlideImage = $request->file('blog_photo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(800,500)->save($imgUrlSlide);
        }
        $newBlog=Blog::find($request->id);
        $newBlog->blog_title=$request->blog_title;
        $newBlog->blog_source=$request->blog_source;
        $newBlog->blog_description=$request->blog_description;
        if ($request->file('blog_photo')) {
            $newBlog->blog_photo = $imgUrlSlide;
        }
        $newBlog->publication_status=$request->publication_status;
        $newBlog->created_by=Auth::user()->id;
        $newBlog->save();

        return back()->with('message','Blog Updated Successfully!');
    }

    public function EventPage(){
        $events=Event::all();
        $name=new User();
        return view('Backend.Event.event-form',['events'=>$events,'name'=>$name]);
    }
    public function createEvent(Request $request){
        $this->validate($request,[
            'event_title'=>'required',
            'event_date'=>'required',
            'event_time'=>'',
            'event_description'=>'required|max:100000',
            'event_photo'=>'',
            'publication_status'=>'required',
        ]);

        if ($request->file('event_photo')){
            $SlideImage = $request->file('event_photo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(800,500)->save($imgUrlSlide);
        }
        $newBlog=new Event();
        $newBlog->event_title=$request->event_title;
        $newBlog->event_date=$request->event_date;
        $newBlog->event_time=$request->event_time;
        $newBlog->event_description=$request->event_description;
        if ($request->file('event_photo')) {
            $newBlog->event_photo = $imgUrlSlide;
        }
        $newBlog->publication_status=$request->publication_status;
        $newBlog->created_by=Auth::user()->id;
        $newBlog->save();
        return back()->with('message','Event Created Successfully!');
    }
    public function editEvent($slug){

        $editEvent=Event::where('slug',$slug)->first();
        return view('Backend.Event.edit-event',['editEvent'=>$editEvent]);
    }
    public function updateEvent(Request $request){
        $this->validate($request,[
            'event_title'=>'required',
            'event_date'=>'required',
            'event_time'=>'',
            'event_description'=>'required|max:100000',
            'event_photo'=>'',
            'publication_status'=>'required',
        ]);

        if ($request->file('event_photo')){
            $SlideImage = $request->file('event_photo');
            $imageName = $SlideImage->getClientOriginalName();
            $directory = 'websiteImages/';
            $temp = explode(".", $imageName);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $imgUrlSlide = $directory . $newfilename;
            Image::make($SlideImage)->resize(800,500)->save($imgUrlSlide);
        }
        $newBlog=Event::find($request->id);
        $newBlog->event_title=$request->event_title;
        $newBlog->event_date=$request->event_date;
        $newBlog->event_time=$request->event_time;
        $newBlog->event_description=$request->event_description;
        if ($request->file('event_photo')) {
            $newBlog->event_photo = $imgUrlSlide;
        }
        $newBlog->publication_status=$request->publication_status;
        $newBlog->created_by=Auth::user()->id;
        $newBlog->save();

        return back()->with('message','Event Updated Successfully!');
    }

}
