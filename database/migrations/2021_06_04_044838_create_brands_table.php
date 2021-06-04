<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('manufacturer_id')->nullable()->constrained('manufacturers');
            $table->text('alias');
            $table->text('brand_name');
            $table->longtext('narrative');
            $table->enum('status', ['active', 'inactive', 'perged']);
            $table->integer('quick_book_brand_id')->unsigned()->nullable();
            $table->foreignId('updated_by')->constrained('users');
            $table->timestamp('updated_date', $precision = 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brands');
    }
}
