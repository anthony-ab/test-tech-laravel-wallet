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
        Schema::create('wallet_recurring_transfer', function (Blueprint $table) {
            $table->id();

            $table->foreignId('wallet_id')->constrained('wallets');
            $table->foreignId('transfer_id')->nullable()->constrained('wallet_transfers');

            $table->dateTime('start_at', precision: 0);
            $table->dateTime('end_at', precision: 0);
            $table->unsignedSmallInteger('frequency');
            $table->integer('amount')->unsigned();
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_recurring_transfer');
    }
};
