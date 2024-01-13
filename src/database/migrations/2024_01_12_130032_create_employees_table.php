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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->string('first_name',128);
            $table->string('last_name',128);
            $table->string('email',128)->unique();
            $table->string('phone',36);

            $table->timestamps();

            //IDX
            $table->index('company_id',name:'employee_company_idx');
            //FK
            $table->foreign('company_id',name:'employee_company_fk')->on('companies')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
