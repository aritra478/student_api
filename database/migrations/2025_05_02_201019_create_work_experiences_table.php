<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkExperiencesTable extends Migration
{
    public function up(): void
    {
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->constrained()->onDelete('cascade');
            $table->string('institution');
            $table->string('designation');
            $table->date('from_date');
            $table->date('to_date');
            $table->string('total_period')->nullable(); // auto-calculated
            $table->string('subjects_taught')->nullable();
            $table->enum('status', ['Current', 'Previous']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
}
