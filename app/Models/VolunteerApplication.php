<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class VolunteerApplication extends Model {
 protected $fillable=['name','email','phone','city','interest_area','availability','skills','motivation','status','admin_notes','consented_at'];
 protected $casts=['consented_at'=>'datetime'];
}