<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $aboutPage = AboutPage::query()
            ->where('is_active', true)
            ->firstOrFail();

        return view('frontend.about', [
            'aboutPage' => $aboutPage,
        ]);
    }
}
