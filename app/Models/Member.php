<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'user_id',
        'first_name',
        'last_name',
        'password',
        'membership_part',
        'email',
        'phone',
        'gender',
        'dob',
        'image',
        'emergency_contact_information',
        'address',
        'note',
        'parent_id',
        'form_submitted',
    ];

    protected $casts = [
        'form_submitted' => 'boolean',
    ];

      public function membershipLates()
    {
        return $this->hasOne(Membership::class, 'member_id', 'id')->latestOfMany();
    }

    public function details()
    {
        return $this->hasOne(MemberDetail::class);
    }


}
