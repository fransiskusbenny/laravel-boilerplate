<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedInteger('permission_id')->nullable();
            $table->smallInteger('order')->nullable()->default(0);
            $table->string('name');
            $table->char('icon', 25)->nullable()->default(config('menu.default_icon'));
            $table->string('url')->nullable()->default('#');
            $table->boolean('is_active')->nullable()->default(true);
            $table->timestamps();

            $table->foreign('parent_id')
                ->references('id')
                ->on('menus')
                ->onDelete('set null');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
