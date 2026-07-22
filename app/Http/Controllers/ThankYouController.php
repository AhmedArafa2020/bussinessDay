<?php

namespace App\Http\Controllers;

use App\Models\ThankYouContent;
use Illuminate\View\View;

class ThankYouController extends Controller
{
    public function index(): View
    {
        $thankYouContent = ThankYouContent::query()
            ->where('is_active', true)
            ->first();

        return view('frontend.thank-you', [
            'thankYouContent' => $thankYouContent,
        ]);
    }
}
