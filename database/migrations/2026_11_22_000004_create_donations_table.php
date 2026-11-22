<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
 Schema::create('donations',function(Blueprint $t){
  $t->id();$t->foreignId('project_id')->nullable()->constrained('projects')->nullOnDelete();
  $t->string('donor_name',140);$t->string('donor_email',190);$t->string('donor_phone',25)->nullable();
  $t->decimal('amount',12,2);$t->text('message')->nullable();
  $t->string('status',20)->default('pledged')->index();
  $t->string('payment_reference',190)->nullable();$t->timestamp('received_at')->nullable();$t->timestamps();
 });}
 public function down():void {Schema::dropIfExists('donations');}
};