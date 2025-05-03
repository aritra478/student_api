<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'experience_id',
        'document_type',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function experience()
    {
        return $this->belongsTo(WorkExperience::class);
    }
}

