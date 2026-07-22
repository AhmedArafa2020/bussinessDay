<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLeadRequest;
use App\Models\Lead;
use Illuminate\Http\JsonResponse;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $lead = Lead::create([
            'full_name' => $validated['full_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'interest' => $validated['interest'],
            'budget' => $validated['budget'] ?? null,
            'contact_method' => $validated['contact_method'],
            'message' => $validated['message'] ?? null,

            'source' => $validated['source'] ?? 'homepage',
            'status' => 'new',

            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your request has been received successfully.',
            'lead_id' => $lead->id,
        ], 201);
    }
}
