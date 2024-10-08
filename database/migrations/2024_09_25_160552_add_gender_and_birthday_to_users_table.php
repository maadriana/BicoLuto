<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenderAndBirthdayToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('gender', ['male', 'female', 'prefer_not_to_say'])->nullable()->after('contact_number');
            $table->date('birthday')->nullable()->after('gender'); // Add the birthday column here
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['gender', 'birthday']); // Drop both columns
        });
    }
}
