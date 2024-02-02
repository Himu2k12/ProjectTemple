<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Event;
use App\Photo;
use App\User;
use App\Video;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $photos=Photo::orderBy('id','desc')->limit(20)->get();
        $homeVideo=Video::latest()->first();
        $blogs=Blog::where('publication_status',1)->orderby('id','desc')->limit(9)->get();
        $name=new User();
        return view('FrontEnd.Home.home-page',['photos'=>$photos,'homeVideo'=>$homeVideo,'blogs'=>$blogs,'name'=>$name]);
    }
    public function contactus(){
        return view('FrontEnd.Contact.contact-form');
    }
    public function blogs(){
        $blogs=Blog::where('publication_status',1)->orderby('id','desc')->paginate(9);
        $name=new User();
        return view('FrontEnd.Blog.Blog-page',['blogs'=>$blogs,'name'=>$name]);
    }
    public function detailsBlog($slug){
        $blogDetails=Blog::where('slug',$slug)->first();
        $name=new User();
        return view('FrontEnd.Blog.blog-details',['blogDetails'=>$blogDetails,'name'=>$name]);
    }
    public function detailsEvent($slug){
        $EventDetails=Event::where('slug',$slug)->first();
        $name=new User();
        return view('FrontEnd.Event.event-details',['EventDetails'=>$EventDetails,'name'=>$name]);
    }
    public function events(){
        $events=Event::where('publication_status',1)->orderby('id','desc')->paginate(9);
        $name=new User();
        return view('FrontEnd.Event.event-page',['events'=>$events,'name'=>$name]);
    }
}
