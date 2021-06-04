<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sz_manufacturers', function (Blueprint $table) {
            $table->id();
            $table->text('alias');
            $table->string('name');
            $table->string('quickbook_manufacturer_id');
            $table->enum('status', ['active', 'inactive', 'perged']);
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamp('updated_date');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sz_manufacturers');
    }
}
