<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\MemberDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberDetailController extends Controller
{
    public function showForm()
    {
        $member = Member::where('user_id', Auth::id())->first();
        
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        // Check if member has already submitted the form
        if ($member->form_submitted) {
            return redirect()->route('dashboard')->with('info', 'You have already submitted the member details form.');
        }

        // Check if there's existing data (in case of partial submission)
        $existingData = MemberDetail::where('member_id', $member->id)->first();

        return view('member-details.form', compact('member', 'existingData'));
    }

    public function store(Request $request)
    {
        $member = Member::where('user_id', Auth::id())->first();
        
        if (!$member) {
            return response()->json(['success' => false, 'message' => 'Member not found.'], 404);
        }

        // Validate the request
        $validated = $request->validate([
            // Section A: Basic Information
            'full_name' => 'required|string|max:255',
            'phone_whatsapp' => 'required|string|max:255',
            'business_company_name' => 'required|string|max:255',
            'role_in_company' => 'required|array|min:1',
            'role_other' => 'nullable|string|max:255',
            
            // Section: NGO Representation Information
            'represent_ngo' => 'required|in:Yes,No',
            'ngo_position' => 'nullable|string|max:255',
            'ngo_name' => 'nullable|string|max:255',
            'ngo_business_count' => 'nullable|string|max:255',
            
            // Section B: Business Registration
            'ssm_status' => 'required|string',
            'ssm_registration_number' => 'required|string|max:255',
            'has_bank_account' => 'required|in:Yes,No',
            
            // Section D: Location & Proof
            'office_address' => 'required|string',
            'office_state' => 'required|string|max:255',
            'office_district' => 'required|string|max:255',
            
            // Section: Current Business Issues
            'business_problems' => 'required|array|min:1',
            'business_problems_other' => 'nullable|string|max:255',
            'support_required' => 'required|array|min:1',
            'support_required_other' => 'nullable|string|max:255',
            'suggestions_feedback' => 'required|string',
            
            // Section: Social Media Presence
            'social_media_accounts' => 'nullable|array',
            'social_media_other' => 'nullable|string|max:255',
            'social_media_link' => 'nullable|string|max:500',
            
            // Section G: Business Listing in Food Delivery App
            'delivery_app_interest' => 'required|in:Yes,No',
            
            // Section H: Referral / Source
            'learned_from' => 'required|array|min:1',
            'invited_by' => 'required|string|max:255',
            
            // Final Declaration
            'declaration_consent' => 'required|accepted',
        ]);

        try {
            DB::beginTransaction();

            // Create or update member details
            MemberDetail::updateOrCreate(
                ['member_id' => $member->id],
                $validated
            );

            // Update member's form_submitted status
            $member->form_submitted = true;
            $member->save();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Member details submitted successfully!',
                'redirect' => route('dashboard')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while submitting the form. Please try again.'
            ], 500);
        }
    }

    public function edit()
    {
        $member = Member::where('user_id', Auth::id())->first();
        
        if (!$member) {
            return redirect()->back()->with('error', 'Member not found.');
        }

        // Check if member has submitted details
        if (!$member->form_submitted) {
            return redirect()->route('member-details.form')->with('info', 'Please complete the member details form first.');
        }

        // Get existing data
        $existingData = MemberDetail::where('member_id', $member->id)->first();

        if (!$existingData) {
            return redirect()->route('member-details.form')->with('error', 'No member details found.');
        }

        return view('member-details.edit', compact('member', 'existingData'));
    }

    public function update(Request $request)
    {
        $member = Member::where('user_id', Auth::id())->first();
        
        if (!$member) {
            return response()->json(['success' => false, 'message' => 'Member not found.'], 404);
        }

        // Validate the request
        $validated = $request->validate([
            // Section A: Basic Information
            'full_name' => 'required|string|max:255',
            'phone_whatsapp' => 'required|string|max:255',
            'business_company_name' => 'required|string|max:255',
            'role_in_company' => 'required|array|min:1',
            'role_other' => 'nullable|string|max:255',
            
            // Section: NGO Representation Information
            'represent_ngo' => 'required|in:Yes,No',
            'ngo_position' => 'nullable|string|max:255',
            'ngo_name' => 'nullable|string|max:255',
            'ngo_business_count' => 'nullable|string|max:255',
            
            // Section B: Business Registration
            'ssm_status' => 'required|string',
            'ssm_registration_number' => 'required|string|max:255',
            'has_bank_account' => 'required|in:Yes,No',
            
            // Section D: Location & Proof
            'office_address' => 'required|string',
            'office_state' => 'required|string|max:255',
            'office_district' => 'required|string|max:255',
            
            // Section: Current Business Issues
            'business_problems' => 'required|array|min:1',
            'business_problems_other' => 'nullable|string|max:255',
            'support_required' => 'required|array|min:1',
            'support_required_other' => 'nullable|string|max:255',
            'suggestions_feedback' => 'required|string',
            
            // Section: Social Media Presence
            'social_media_accounts' => 'nullable|array',
            'social_media_other' => 'nullable|string|max:255',
            'social_media_link' => 'nullable|string|max:500',
            
            // Section G: Business Listing in Food Delivery App
            'delivery_app_interest' => 'required|in:Yes,No',
            
            // Section H: Referral / Source
            'learned_from' => 'required|array|min:1',
            'invited_by' => 'required|string|max:255',
            
            // Final Declaration
            'declaration_consent' => 'required|accepted',
        ]);

        try {
            DB::beginTransaction();

            // Update member details
            $memberDetail = MemberDetail::where('member_id', $member->id)->first();
            
            if (!$memberDetail) {
                return response()->json([
                    'success' => false,
                    'message' => 'Member details not found.'
                ], 404);
            }

            $memberDetail->update($validated);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Member details updated successfully!',
                'redirect' => route('dashboard')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the form. Please try again.'
            ], 500);
        }
    }
}

