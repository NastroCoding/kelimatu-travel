<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\AllServiceDetail;
use App\Models\Config;
use App\Models\Gallery;
use App\Models\Mail;
use App\Models\Service;
use App\Models\ServiceDetail;
use App\Models\ServiceOption;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Item;
use App\Models\Slideshow;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RouteController extends Controller
{
    public function index()
    {
        $configs = Config::latest()->first();
        $testimonials = Testimonial::all();
        $items = Item::all();
        $slideshows = Slideshow::all();
        $activities = Activity::all();
        return view('pages.index', [
            'page'  => 'Index',
            'testimonials' => $testimonials,
            'items' => $items,
            'slideshows' => $slideshows,
            'activities' => $activities
        ], compact('configs'));
    }

    public function contact()
    {
        $configs = Config::latest()->first();
        return view('pages.contact', [
            'page' => 'Contact',
        ], compact('configs'));
    }

    public function about()
    {
        $configs = Config::latest()->first();
        $teams = Team::all();
        $galleries = Gallery::all();
        return view('pages.about', [
            'page' => 'About',
            'teams' => $teams,
            'galleries' => $galleries
        ], compact('configs'));
    }

    public function services()
    {
        $configs = Config::latest()->first();
        $details = ServiceOption::all();
        $services = Service::all();
        $service_details = ServiceDetail::all();
        $all_details = AllServiceDetail::all();
        return view('pages.services', [
            'page' => 'Services',
            'services' => $services,
            'details' => $details,
            'all_details' => $all_details,
            'service_details' => $service_details,
        ], compact('configs'));
    }

    public function activity()
    {
        $configs = Config::latest()->first();
        $galleries = Gallery::all();
        $testimonials = Testimonial::all();
        $activities = Activity::all();
        return view('pages.activity', [
            'page' => 'Activity',
            'galleries' => $galleries,
            'testimonials' => $testimonials,
            'activities' => $activities
        ], compact('configs'));
    }

    public function loadMoreGalleries(Request $request)
    {
        $start = $request->query('start', 0);
        $limit = 6; // Number of images to load each time

        $galleries = Gallery::orderBy('created_at', 'desc')->skip($start)->take($limit)->get();

        return response()->json([
            'galleries' => $galleries->map(function ($gallery) {
                return [
                    'media' => Storage::url($gallery->media),
                    'extension' => pathinfo($gallery->media, PATHINFO_EXTENSION),
                    'description' => $gallery->description,
                ];
            }),
            'hasMore' => $galleries->count() === $limit,
        ]);
    }


    public function read($slug)
    {
        $configs = Config::latest()->first();
        $galleries = Gallery::all();
        $testimonials = Testimonial::all();

        if (!$slug) {
            return redirect()->back();
        }

        $activities = Activity::where('slug', $slug)->first();

        $all_activities = Activity::all();

        if (!$activities) {
            return view('404', ['configs' => $configs]);
        }

        return view('pages.activity-read', [
            'page' => 'Read',
            'galleries' => $galleries,
            'testimonials' => $testimonials,
            'activities' => $activities,
            'all_activities' => $all_activities
        ], compact('configs'));
    }

    public function login()
    {
        return view('auth.login', [
            'page' => 'Login',
        ]);
    }

    public function admin_dashboard()
    {
        return view('admin.dashboard', [
            'page' => 'Dashboard',
        ]);
    }

    public function admin_gallery()
    {
        $galleries = Gallery::all();
        return view('admin.gallery', [
            'page' => 'Gallery',
            'galleries' => $galleries,

        ]);
    }

    public function admin_testimony()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimony', [
            'page' => 'Testimonials',
            'testimonials' => $testimonials,
        ]);
    }

    public function admin_team()
    {
        $teams = Team::all();
        return view('admin.team', [
            'page' => 'Team',
            'teams' => $teams,
        ]);
    }

    public function admin_inbox()
    {
        $mails = Mail::latest()->get();
        return view('admin.inbox', [
            'page' => 'Inbox',
            'mails' => $mails,
        ]);
    }

    public function admin_services()
    {
        $services = Service::all();
        $details = ServiceOption::all();
        $service_details = ServiceDetail::all();
        $all_details = AllServiceDetail::all();
        return view('admin.services', [
            'page' => 'Services',
            'services' => $services,
            'details' => $details,
            'service_details' => $service_details,
            'all_details' => $all_details
        ]);
    }

    public function admin_config()
    {
        $configs = Config::latest()->first();
        $items = Item::all();
        $galleries = Gallery::all();
        $slideshows = SlideShow::all();
        return view('admin.config', [
            'page' => 'Configuration',
            'items' => $items,
            'galleries' => $galleries,
            'slideshows'=> $slideshows,
        ], compact('configs'));
    }

    public function admin_activity()
    {
        $activity = Activity::all();
        return view('admin.activity', [
            'page' => 'Activity',
            'activities' => $activity,
        ]);
    }

    public function store_mail(Request $request)
    {
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
