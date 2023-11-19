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
        // Laravel names the pivot table with the joint names of the two tables in the many-to-many relationship
        // Laravel does this in alabetical order which would be role_user
        // However, user_role makes more sense for the table name.
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            // these attributes must be the same datatype as the ids that defined
            // in the users and roles tables
            // which are unsigned bigInts
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->timestamps();

            // add foreign keys. IDs from rusers and roles table
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_role');
    }
};
