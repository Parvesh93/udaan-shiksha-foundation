<?php
namespace App\Http\Controllers;
use Illuminate\View\View;
class PageController extends Controller {
 public function home():View {return view('pages.home',['title'=>'Every Child Deserves to Soar','page'=>'home']);}
 public function about():View {return view('pages.about',['title'=>'Our Story','page'=>'about']);}
 public function programs():View {return view('pages.programs',['title'=>'Our Programs','page'=>'programs']);}
 public function impact():View {return view('pages.impact',['title'=>'Our Impact','page'=>'impact']);}
 public function getInvolved():View {return view('pages.get-involved',['title'=>'Get Involved','page'=>'get-involved']);}
 public function contact():View {return view('pages.contact',['title'=>'Contact Us','page'=>'contact']);}
}
