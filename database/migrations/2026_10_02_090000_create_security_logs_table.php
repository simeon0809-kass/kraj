<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('security_logs', function (Blueprint $table) {
            $table->id();

            // What happened: visit_created, visit_cancelled, contact_submitted, login, login_failed, logout
            $table->string('event', 50)->index();

            // Loose reference to the related record (kept even if the record is deleted, e.g. a cancelled visit)
            $table->string('subject_type', 50)->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->string('reference', 255)->nullable()->index(); // visit code, e-mail used to log in, etc.

            // Network
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('forwarded_for')->nullable();

            // Device
            $table->text('user_agent')->nullable();
            $table->string('device_type', 20)->nullable();   // desktop, mobile, tablet, bot
            $table->string('device_brand', 50)->nullable();
            $table->string('browser', 50)->nullable();
            $table->string('browser_version', 30)->nullable();
            $table->string('os', 50)->nullable();
            $table->string('os_version', 30)->nullable();

            // Request context
            $table->string('accept_language', 255)->nullable();
            $table->string('locale', 10)->nullable();
            $table->text('referer')->nullable();
            $table->string('url', 2048)->nullable();
            $table->string('method', 10)->nullable();
            $table->string('session_id', 255)->nullable();

            // Authenticated user (admin / security guard), if any
            $table->foreignId('user_id')->nullable()->index();

            $table->timestamp('created_at')->useCurrent()->index();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('security_logs');
    }
};
