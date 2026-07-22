<?php

namespace App\Http\Controllers;

use App\Models\CampaignBenefit;
use App\Models\CampaignEnquiry;
use App\Models\CampaignFaq;
use App\Models\CampaignHero;
use App\Models\CampaignTrust;
use Illuminate\View\View;

class CampaignController extends Controller
{
    public function index(): View
    {
        $campaignHero = CampaignHero::query()
            ->where('is_active', true)
            ->first();

        $campaignBenefit = CampaignBenefit::query()
            ->where('is_active', true)
            ->first();

        $campaignTrust = CampaignTrust::query()
            ->where('is_active', true)
            ->first();
        $campaignEnquiry = CampaignEnquiry::query()
            ->where('is_active', true)
            ->first();
        $campaignFaq = CampaignFaq::query()
            ->where('is_active', true)
            ->first();
        return view('frontend.campaign.index', [
            'campaignHero' => $campaignHero,
            'campaignBenefit' => $campaignBenefit,
            'campaignTrust' => $campaignTrust,
            'campaignEnquiry' => $campaignEnquiry,
            'campaignFaq' => $campaignFaq,
        ]);
    }
}
