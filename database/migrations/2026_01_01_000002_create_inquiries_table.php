<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration { public function up(): void {
 Schema::create('inquiries',function(Blueprint $t){$t->id();$t->string('type',30)->index();$t->string('name',120);$t->string('email',190);$t->string('phone',25)->nullable();$t->string('subject',190)->nullable();$t->text('message')->nullable();$t->string('status',20)->default('new')->index();$t->timestamps();});
} public function down(): void {Schema::dropIfExists('inquiries');}};
