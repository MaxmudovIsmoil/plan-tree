<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cable_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cable_id');
            $table->unsignedBigInteger('user_id');
            $table->string('old_name')->nullable();
            $table->string('new_name')->nullable();
            $table->string('old_remain_stock')->nullable();
            $table->string('new_remain_stock')->nullable();
            $table->string('old_purpose')->nullable();
            $table->string('new_purpose')->nullable();
            $table->string('old_expected_delivery')->nullable();
            $table->string('new_expected_delivery')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->softDeletes();
            $table->foreign('cable_id')->references('id')->on('cables')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cable_changes');
    }
};
