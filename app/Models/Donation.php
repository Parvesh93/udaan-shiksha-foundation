<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Donation extends Model {
 protected $fillable=['project_id','donor_name','donor_email','donor_phone','amount','message','status','payment_reference','received_at'];
 protected $casts=['amount'=>'decimal:2','received_at'=>'datetime'];
 public function project():BelongsTo {return $this->belongsTo(Project::class);}
}