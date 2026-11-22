<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Project;
class PageController extends Controller {
 public function home():View {
  $projects = Project::query()->where('status','active')->withSum(['donations as received_amount' => fn($query) => $query->where('status','received')], 'amount')->orderByDesc('featured')->latest()->take(12)->get();
  return view('pages.home',['title'=>'Every Child Deserves to Soar','page'=>'home','projects'=>$projects]);
 }
 public function about():View {return view('pages.about',['title'=>'Our Story','page'=>'about']);}
 public function programs():View {return view('pages.programs',['title'=>'Our Programs','page'=>'programs']);}
 public function impact():View {return view('pages.impact',['title'=>'Our Impact','page'=>'impact']);}
 public function getInvolved():View {return view('pages.get-involved',['title'=>'Get Involved','page'=>'get-involved']);}
 public function contact():View {return view('pages.contact',['title'=>'Contact Us','page'=>'contact']);}
}
