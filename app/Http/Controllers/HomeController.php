<?php

namespace App\Http\Controllers;

use App\Models\HomeArchitecture;
use App\Models\HomeConcept;
use App\Models\HomeEnquiry;
use App\Models\HomeGallery;
use App\Models\HomeHero;
use App\Models\HomeInterlude;
use App\Models\HomeInvestment;
use App\Models\HomeLifestyle;
use App\Models\HomeLocation;
use App\Models\HomeResidence;
use App\Models\HomeStory;
use App\Models\Post;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $homeHero = HomeHero::query()
            ->where('is_active', true)
            ->first();

        $homeStory = HomeStory::query()
            ->where('is_active', true)
            ->first();

        $homeConcept = HomeConcept::query()
            ->where('is_active', true)
            ->first();
        $homeInterlude = HomeInterlude::query()
            ->where('is_active', true)
            ->first();
        $homeLocation = HomeLocation::query()
            ->where('is_active', true)
            ->first();
        $homeArchitecture = HomeArchitecture::query()
            ->where('is_active', true)
            ->first();
        $homeLifestyle = HomeLifestyle::query()
            ->where('is_active', true)
            ->first();
        $homeResidence = HomeResidence::query()
            ->where('is_active', true)
            ->first();
        $homeInvestment = HomeInvestment::query()
            ->where('is_active', true)
            ->first();
        $homeGallery = HomeGallery::query()
            ->where('is_active', true)
            ->first();
        $homeEnquiry = HomeEnquiry::query()
            ->where('is_active', true)
            ->first();
        $latestPosts = Post::query()
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

//        return view('frontend.home.index', [
//            'homeHero' => $homeHero,
//            'homeStory' => $homeStory,
//            'homeConcept' => $homeConcept,
//            'homeInterlude' => $homeInterlude,
//            'homeLocation' => $homeLocation,
//            'homeArchitecture' => $homeArchitecture,
//            'homeLifestyle' => $homeLifestyle,
//            'homeResidence' => $homeResidence,
//            'homeInvestment' => $homeInvestment,
//            'homeGallery' => $homeGallery,
//            'homeEnquiry' => $homeEnquiry,
//            'latestPosts' => $latestPosts,
//        ]);
        return view('frontend.home.new-index');
    }}
