<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->timestamps();
        });

        // Insérer des skills par défaut
        $data = [
            ['name'=>'PHP'],
            ['name'=>'C++'],
            ['name'=>'C#'],
            ['name'=>'Java'],
            ['name'=>'Python'],
            ['name'=>'Laravel'],
            ['name'=>'Spring'],
            ['name'=>'UML'],
            ['name'=>'Merise'],
            ['name'=>'HTML'],
            ['name'=>'CSS'],
            ['name'=>'JavaScript'],
            ['name'=>'Drupal'],
            ['name'=>'Symfony'],
            ['name'=>'WordPress']
        ];
        DB::table('skills')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};
