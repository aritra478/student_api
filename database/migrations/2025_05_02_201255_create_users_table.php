<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->boolean('applied_before')->default(false);
            $table->string('post')->default('Teacher');
            $table->string('subject');
            $table->string('full_name');
            $table->enum('gender', ['Male', 'Female', 'Others']);
            $table->boolean('physically_handicapped')->default(false);
            $table->string('handicap_details')->nullable();
            $table->enum('category', ['General', 'ST', 'SC', 'OBC']);
            $table->date('dob');
            $table->enum('position', ['admin', 'common_user'])->default('common_user'); 
            $table->enum('enrollment_status', ['enrolled', 'initiate'])->default('initiate'); 
            $table->string('mobile')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('photo')->nullable();
            $table->string('signature')->nullable();
            $table->string('dob_proof')->nullable();
            $table->string('caste_certificate')->nullable();
            $table->string('photo_id_proof')->nullable();
            $table->string('marksheet_10')->nullable();
            $table->string('marksheet_12')->nullable();
            $table->string('graduation')->nullable();
            $table->string('post_graduation')->nullable();
            $table->string('bed_certificate')->nullable();
            $table->string('employment_1')->nullable();
            $table->string('employment_2')->nullable();

            $table->enum('form_status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->string('ack_no')->nullable(); // 10 digit acknowledgment number
            $table->string('registration_no')->nullable(); // CED/TENG/2024/XXXXXX
            $table->text('admin_remark')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

