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
            $table->string('uid')->unique();
            $table->string('no_so');
            $table->string('file');
            $table->text('description');
            $table->string('sales_name');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approved-By', 'Approval-PPIC', 'Approval-Warehouse', 'Approval-Logistics', 'Cancel', 'Finish'])->default('Created');
            $table->string('sales_coor_name')->nullable();
            $table->timestamp('sales_coor_date')->nullable();
            $table->string('ppic_name')->nullable();
            $table->timestamp('ppic_date')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->timestamp('warehouse_date')->nullable();
            $table->string('logistics_name')->nullable();
            $table->timestamp('logistics_date')->nullable();
            $table->string('ppic_finish_name')->nullable();
            $table->timestamp('ppic_finish_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('warehouse_sns', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->text('serial_number');
            $table->double('weight');
            $table->double('koli');
            $table->double('gdg');
            $table->double('kubikasi');
            $table->string('user_uid');
            $table->string('warehouse_uid');

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
            $table->foreign(['warehouse_uid'])->references(['uid'])->on('warehouses');
        });

        Schema::create('rmas', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_spk');
            $table->string('file');
            $table->string('description');
            $table->string('purchasing')->nullable();
            $table->enum('warranty', ['Garansi', 'Non-Garansi'])->nullable();
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
            $table->enum('status', ['Created', 'Approval-Warehouse', 'Approval-Marketing', 'Approval-SCM', 'Cancel'])->default('Created');
            $table->string('warehouse_name')->nullable();
            $table->timestamp('warehouse_date')->nullable();
            $table->string('marketing_name')->nullable();
            $table->timestamp('marketing_date')->nullable();
            $table->string('scm_name')->nullable();
            $table->timestamp('scm_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('delivery_orders', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_so');
            $table->string('no_sj');
            $table->string('file');
            $table->string('img')->nullable();
            $table->string('description');
            $table->string('user_uid');
            $table->timestamp('created_date');
            $table->enum('status', ['Created', 'Approval-Coor', 'Approval-Qc', 'Approval-Logistics', 'Approval-Customer'])->default('Created');
            $table->string('coor_logistics_name')->nullable();
            $table->timestamp('coor_logistics_date')->nullable();
            $table->string('qc_name')->nullable();
            $table->timestamp('qc_date')->nullable();
            $table->string('logistics_name')->nullable();
            $table->timestamp('logistics_date')->nullable();
            $table->string('logistics_customer_name')->nullable();
            $table->timestamp('logistics_customer_date')->nullable();

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('sohargas', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('so_number');
            $table->string('po_no');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->string('created_date');
            $table->string('sales_name')->nullable();
            $table->string('sales_date')->nullable();
            $table->string('adminsales_name')->nullable();
            $table->string('adminsales_date')->nullable();
            $table->enum('status', ['Created', 'Approval-Sales', 'Approval-Adminsales'])->default('Created');
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
        Schema::dropIfExists('warehouse_sns');
    }
};
