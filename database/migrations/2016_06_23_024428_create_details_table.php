<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('user_id')->nullable();
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('contact_home')->nullable();
            $table->string('contact_work')->nullable();
            $table->string('contact_page')->nullable();
            $table->string('contact_fax')->nullable();
            $table->string('contact_other')->nullable();
            $table->string('email_personal')->nullable();
            $table->string('email_work')->nullable();
            $table->string('email_other')->nullable();
            $table->string('address_permanent')->nullable();
            $table->string('city_permanent')->nullable();
            $table->string('state_permanent')->nullable();
            $table->string('country_permanent')->nullable();
            $table->string('pincode_permanent')->nullable();
            $table->string('address_current')->nullable();
            $table->string('city_current')->nullable();
            $table->string('state_current')->nullable();
            $table->string('country_current')->nullable();
            $table->string('pincode_current')->nullable();
            $table->string('address_alternate')->nullable();
            $table->string('city_alternate')->nullable();
            $table->string('state_alternate')->nullable();
            $table->string('country_alternate')->nullable();
            $table->string('pincode_alternate')->nullable();
            $table->date('retirement')->nullable();
            $table->string('biography')->nullable();
            $table->string('description')->nullable();
            $table->string('goals')->nullable();
            $table->string('interests')->nullable();
            $table->string('expertise_in')->nullable();
            $table->string('fb')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('skype')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv')->nullable();
            $table->string('website')->nullable();
            $table->string('members')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('details');
    }
}
