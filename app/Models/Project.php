<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
class Project extends Model {
 protected $fillable=['title','slug','summary','description','image_url','goal_amount','status','featured'];
 protected $casts=['goal_amount'=>'decimal:2','featured'=>'boolean'];
 public function donations():HasMany {return $this->hasMany(Donation::class);}
 public function getRouteKeyName():string {return 'slug';}
 public function getRaisedAmountAttribute():float {return (float)$this->donations()->where('status','received')->sum('amount');}
 public static function uniqueSlug(string $title, ?int $exclude=null):string {
   $base=Str::slug($title) ?: 'project'; $slug=$base; $i=2;
   while(static::query()->where('slug',$slug)->when($exclude,fn($q)=>$q->where('id','!=',$exclude))->exists()) $slug=$base.'-'.$i++;
   return $slug;
 }
}