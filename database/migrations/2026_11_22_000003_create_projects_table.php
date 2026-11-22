<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up():void {
 Schema::create('projects',function(Blueprint $t){
  $t->id();$t->string('title',160);$t->string('slug',190)->unique();$t->string('summary',450);$t->text('description')->nullable();
  $t->string('image_url',1000)->nullable();$t->decimal('goal_amount',12,2)->nullable();
  $t->string('status',20)->default('draft')->index();$t->boolean('featured')->default(false);$t->timestamps();
 });}
 public function down():void {Schema::dropIfExists('projects');}
};