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
      

        Schema::create('divisions', function(Blueprint $table){
            $table->id();
            $table->string('uid')->unique();
            $table->string('name');
        });

        Schema::create('positions', function(Blueprint $table){
            $table->id();
            $table->string('uid')->unique();
            $table->string('name');
        });

        Schema::create('permissions', function(Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('name')->unique();
            $table->string('img')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('position_uid');
            $table->string('division_uid');
            $table->foreign(['position_uid'])->references(['uid'])->on('positions');
            $table->foreign(['division_uid'])->references(['uid'])->on('divisions');
        });

        Schema::create('user_permissions', function(Blueprint $table){
            $table->id();
            $table->string('user_uid');
            $table->unsignedBigInteger('permission_id');
        });

        Schema::table('user_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'])->references(['id'])->on('permissions');
            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('warehouses', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_so');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approved-By', 'Approval-PPIC', 'Approval-Warehouse', 'Approval-Logistics', 'Cancel', 'Reject'])->default('Created');
            $table->string('sales_coor_name')->nullable();
            $table->timestamp('sales_coor_date')->nullable();
            $table->string('ppic_name')->nullable();
            $table->timestamp('ppic_date')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->timestamp('warehouse_date')->nullable();
            $table->string('logistics_name')->nullable();
            $table->timestamp('logistics_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('rmas', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_spk');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approval-Technician', 'Approval-Qc', 'Cancel', 'Reject'])->default('Created');
            $table->string('technician_name')->nullable();
            $table->timestamp('technician_date')->nullable();
            $table->string('qc_name')->nullable();
            $table->timestamp('qc_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('letter_returs', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_sj');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approval-Warehouse', 'Approval-Marketing', 'Approval-PPIC-Marketing', 'Cancel', 'Reject'])->default('Created');
            $table->string('warehouse_name')->nullable();
            $table->timestamp('warehouse_date')->nullable();
            $table->string('marketing_name')->nullable();
            $table->timestamp('marketing_date')->nullable();
            $table->string('ppic_marketing_name')->nullable();
            $table->timestamp('ppic_marketing_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('delivery_orders', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_so');
            $table->string('no_sj');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approval-Coor', 'Approval-Qc', 'Approval-Logistics', 'Approval-Security', 'Approval-Customer'])->default('Created');
            $table->string('sales2_name')->nullable();
            $table->timestamp('sales2_date')->nullable();
            $table->string('qc_name')->nullable();
            $table->timestamp('qc_date')->nullable();
            $table->string('logistics_name')->nullable();
            $table->timestamp('logistics_date')->nullable();
            $table->string('logistics_security_name')->nullable();
            $table->timestamp('logistics_security_date')->nullable();
            $table->string('logistics_customer_name')->nullable();
            $table->timestamp('logistics_customer_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('user_permissions');
        Schema::dropIfExists('warehouses');
        Schema::dropIfExists('rmas');
        Schema::dropIfExists('letter_returs');
    }
};
