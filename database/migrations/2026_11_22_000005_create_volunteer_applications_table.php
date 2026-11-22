<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
  Schema::create('volunteer_applications',function(Blueprint $t) {
   $t->id();$t->string('name',140);$t->string('email',190);$t->string('phone',25);$t->string('city',120);
   $t->string('interest_area',60);$t->string('availability',60);
   $t->text('skills')->nullable();$t->text('motivation')->nullable();
   $t->string('status',25)->default('pending')->index();$t->text('admin_notes')->nullable();
   $t->timestamp('consented_at');$t->timestamps();
  });
 }
 public function down():void { Schema::dropIfExists('volunteer_applications'); }
};