<?php
namespace App\Http\Controllers;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
class PublicDonationController extends Controller {
 public function index(Request $r):View {
  $projects=Project::where('status','active')->orderByDesc('featured')->latest()->get();
  $selected=$r->query('project');
  if($selected && !$projects->contains('slug',$selected))$selected=null;
  return view('pages.donate',['title'=>'Support Education','page'=>'donate','projects'=>$projects,'selected'=>$selected]);
 }
 public function store(Request $r):RedirectResponse {
  $data=$r->validate([
   'project_id'=>['nullable',Rule::exists('projects','id')->where('status','active')],
   'donor_name'=>'required|string|min:2|max:140',
   'donor_email'=>'required|email|max:190','donor_phone'=>'nullable|string|max:25',
   'amount'=>'required|numeric|min:100|max:9999999999.99',
   'message'=>'nullable|string|max:2000',
   'website'=>'prohibited'
  ]);
  unset($data['website']);$data['status']='pledged';
  Donation::create($data);
  return redirect()->route('donate')->with('success','Your interest has been recorded. This demo has not charged or collected any payment.');
 }
}