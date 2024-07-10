<?php

namespace App\Http\Controllers;

use App\Models\Config;
use App\Models\Gallery;
use App\Models\Mail;
use App\Models\Service;
use App\Models\ServiceOption;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    public function index() {
        $configs = Config::latest()->first();
        $testimonials = Testimonial::all();
        return view('pages.index',[
            'page'  => 'Index',
            'testimonials' => $testimonials
        ], compact('configs'));
    }

    public function contact() {
        $configs = Config::latest()->first();
        return view('pages.contact',[
            'page' => 'Contact',
        ], compact('configs'));
    }

    public function about() {
        $configs = Config::latest()->first();
        $teams = Team::all();
        $galleries = Gallery::all();
        return view('pages.about',[
            'page' => 'About',
            'teams' => $teams,
            'galleries' => $galleries
        ], compact('configs'));
    }

    public function services() {
        $configs = Config::latest()->first();
        $services = Service::all();
        $details = ServiceOption::all();
        return view('pages.services',[
            'page' => 'Services',
            'services' => $services,
            'details' => $details
        ], compact('configs'));
    }

    public function login() {
        return view('auth.login',[
            'page' => 'Login',
        ]);
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard',[
            'page' => 'Dashboard',
        ]);
    }

    public function admin_gallery()
    {
        $galleries = Gallery::all();
        return view('admin.gallery',[
            'page' => 'Gallery',
            'galleries' => $galleries,

        ]);
    }

    public function admin_testimony()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimony',[
            'page' => 'Testimonials',
            'testimonials' => $testimonials,
        ]);
    }

    public function admin_team()
    {
        $teams = Team::all();
        return view('admin.team',[
            'page' => 'Team',
            'teams' => $teams,
        ]);
    }

    public function admin_inbox()
    {
        $mails = Mail::all();
        return view('admin.inbox',[
            'page' => 'Inbox',
            'mails' => $mails,
        ]);
    }

    public function admin_services()
    {
        $services = Service::all();
        $details = ServiceOption::all();
        return view('admin.services',[
            'page' => 'Services',
            'services' => $services,
            'details' => $details
        ]);
    }

    public function admin_config()
    {
        $configs = Config::latest()->first();
        return view('admin.config',[
            'page' => 'Configuration',
        ], compact('configs'));
    }

    public function store_mail(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'captcha' => 'required|captcha'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Mail::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil di kirim!');
    }
}
