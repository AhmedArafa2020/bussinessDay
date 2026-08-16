<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): JsonResponse {
        $validated = $request->validated();

        if (! empty($validated['company_website'])) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you. Your enquiry has been received.',
            ]);
        }

        $lead = Lead::create([
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],

            'country' => $validated['country'],
            'enquiry_type' => $validated['enquiry_type'],

            'message' => $validated['message'] ?? null,

            'launch_list' => (bool) (
                $validated['launch_list'] ?? false
            ),

            'consent_at' => now(),

            'source' => $validated['source'] ?? 'homepage-new',

            'status' => 'new',

            'ip_address' => $request->ip(),

            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Thank you. Your enquiry has been received.',
            'lead_id' => $lead->id,
        ], 201);
    }

}
