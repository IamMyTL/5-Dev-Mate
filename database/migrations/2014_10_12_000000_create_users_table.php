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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('role');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('cv')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('Admin');
            $table->rememberToken();
            $table->timestamps();
        });

        $data = [
            ['name'=>'Admin','surname' =>'Admin','role'=>'Recruteur','email'=>'5devmate@gmail.com','password'=>'$2y$10$10PDL3GfyiLTGxKqr0x.P.yb.NR0STEt9QVbfyfh4cluIiBjhrV8i','Admin'=>'1'],
        ];
        DB::table('users')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
