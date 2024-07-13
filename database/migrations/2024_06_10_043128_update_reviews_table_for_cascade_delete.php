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
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['room_id']); // Drop the existing foreign key constraint
            $table->foreign('room_id')
                  ->references('id')
                  ->on('rooms')
                  ->onDelete('cascade'); // Add the new foreign key constraint with cascade delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['room_id']); // Drop the cascade delete foreign key
            $table->foreign('room_id')
                  ->references('id')
                  ->on('rooms')
                  ->onDelete('restrict'); // Restore the original foreign key constraint (or whatever was originally used)
        });
    }
};
