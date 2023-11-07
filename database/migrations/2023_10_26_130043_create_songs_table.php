<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


//Migrations are used to edit a database. They can also revert changes made with ease.
class CreateSongsTable extends Migration
{

     //Runs the migrations. Has similar structure to a database table
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('genre');
            $table->string('album');
            $table->date('release_date');
            $table->string('length');
            $table->string('song_image')->nullable();
            $table->timestamps(); //Shows the time it was created at
        });
    }


    //Reverses the migrations

    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};
