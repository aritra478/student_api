<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentUploadsTable extends Migration
{
    public function up(): void
    {
        Schema::create('document_uploads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('experience_id')->nullable()->constrained('work_experiences')->onDelete('set null');
            $table->string('document_type'); // e.g., photo, signature, dob_proof, caste_certificate, etc.
            $table->string('file_path');     // storage/app/... or public path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_uploads');
    }
}

