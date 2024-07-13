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
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['booking_id']); // Drop the existing foreign key constraint
            $table->foreign('booking_id')
                  ->references('id')
                  ->on('bookings')
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
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['booking_id']); // Drop the cascade delete foreign key
            $table->foreign('booking_id')
                  ->references('id')
                  ->on('bookings')
                  ->onDelete('restrict'); // Restore the original foreign key constraint (or whatever was originally used)
        });

    }
};