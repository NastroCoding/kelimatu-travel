<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;


class RouteController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('pages.index',[
            'page'  => 'Index',
            'testimonials' => $testimonials
        ]);
    }

    public function contact() {
        return view('pages.contact',[
            'page' => 'Contact',
        ]);
    }

    public function about() {
        $teams = Team::all();
        $galleries = Gallery::all();
        return view('pages.about',[
            'page' => 'About',
            'teams' => $teams,
            'galleries' => $galleries
        ]);
    }

    public function services() {
        return view('pages.services',[
            'page' => 'Services',
        ]);
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
        $teams = Team::all();
        return view('admin.inbox',[
            'page' => 'Inbox',
        ]);
    }
}
