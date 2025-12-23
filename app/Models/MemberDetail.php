<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'full_name',
        'phone_whatsapp',
        'business_company_name',
        'role_in_company',
        'role_other',
        'represent_ngo',
        'ngo_position',
        'ngo_name',
        'ngo_business_count',
        'ssm_status',
        'ssm_registration_number',
        'has_bank_account',
        'office_address',
        'office_state',
        'office_district',
        'business_problems',
        'business_problems_other',
        'support_required',
        'support_required_other',
        'suggestions_feedback',
        'social_media_accounts',
        'social_media_other',
        'social_media_link',
        'delivery_app_interest',
        'learned_from',
        'invited_by',
        'declaration_consent',
    ];

    protected $casts = [
        'role_in_company' => 'array',
        'business_problems' => 'array',
        'support_required' => 'array',
        'social_media_accounts' => 'array',
        'learned_from' => 'array',
        'declaration_consent' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}

