<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('animals', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string('name');
            $table->foreignUuid('breed_id')->nullable()->constrained('breeds')->cascadeOnDelete();
            $table->date('bithdate');
            $table->string('image')->nullable();
            $table->foreignUuId('animalspecies_id')->nullable()->constrained('animal_species')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
