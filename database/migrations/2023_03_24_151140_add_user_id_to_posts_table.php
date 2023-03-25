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
        //    add Foreign Key Constraints
        Schema::table('posts', function (Blueprint $table) {
        //add field
        $table->unsignedBigInteger('user_id')->nullable();
        //add constraint 
        $table->foreign('user_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::table('posts', function (Blueprint $table) {
    //         //
    //     });
    // }
};
