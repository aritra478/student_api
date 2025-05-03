<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomVerifyEmail;
class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable;

    protected $fillable = [
        'applied_before',
        'post',
        'subject',
        'full_name',
        'gender',
        'physically_handicapped',
        'handicap_details',
        'category',
        'dob',
        'mobile',
        'email',
        'password',
        'photo',
        'signature',
        'dob_proof',
        'caste_certificate',
        'photo_id_proof',
        'marksheet_10',
        'marksheet_12',
        'graduation',
        'post_graduation',
        'bed_certificate',
        'employment_1',
        'employment_2',
        'form_status',
        'ack_no',
        'registration_no',
        'admin_remark',
        'position', 
        'enrollment_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'date',
        'applied_before' => 'boolean',
        'physically_handicapped' => 'boolean',
    ];
    public function sendEmailVerificationNotification()
{
    $this->notify(new CustomVerifyEmail);
}
public function initials(): string
    {
        // Handle empty or invalid names gracefully
        if (!$this->name) {
            return 'NA';
        }

        $names = preg_split('/\s+/', trim($this->name));
        $initials = '';

        foreach ($names as $name) {
            $initials .= strtoupper(mb_substr($name, 0, 1));
        }

        return $initials;
    }
    public function experiences()
{
    return $this->hasMany(WorkExperience::class, 'user_id');
}
    public function documentUploads()
{
    return $this->hasMany(DocumentUpload::class, 'user_id');
}
}
