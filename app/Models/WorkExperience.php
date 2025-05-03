<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'institution',
        'designation',
        'from_date',
        'to_date',
        'total_period',
        'subjects_taught',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
