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
        
        Schema::table('users', function (Blueprint $table) {
            $table->text('address')->change();
            $table->text('gender')->change();
            // $table->text('email')->change();
            // $table->text('firstname')->change();
            // $table->text('lastname')->change();
            $table->string('gender')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->date('birthdate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
