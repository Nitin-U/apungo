<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignId('vendor_id')->after('id')->nullable()->constrained()->cascadeOnUpdate();
            $table->date('end_date')->after('location');
            $table->date('start_date')->after('location');
            $table->dropColumn('schedule_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign(['vendor_id']);
            $table->dropColumn('vendor_id');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->date('schedule_date')->nullable();
        });
    }
};
