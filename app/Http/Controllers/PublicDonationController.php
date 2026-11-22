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
 public function showProject(Project $project):View {
  abort_unless($project->status==='active',404);
  $received=(float)$project->donations()->where('status','received')->sum('amount');
  $goal=(float)($project->goal_amount??0);
  $progress=$goal>0?min(100,max(0,($received/$goal)*100)):0;
  $related=Project::query()->where('status','active')->whereKeyNot($project->id)
    ->orderByDesc('featured')->latest()->limit(3)->get();
  return view('pages.project-detail',[
    'title'=>$project->title,'page'=>'project','project'=>$project,
    'received'=>$received,'goal'=>$goal,'progress'=>$progress,'related'=>$related
  ]);
 }
 public function storeProject(Request $r,Project $project):RedirectResponse {
  abort_unless($project->status==='active',404);
  $data=$r->validate([
   'donor_name'=>'required|string|min:2|max:140',
   'donor_email'=>'required|email|max:190',
   'donor_phone'=>'nullable|string|max:25',
   'amount'=>'required|numeric|min:100|max:9999999999.99',
   'message'=>'nullable|string|max:2000',
   'consent'=>'accepted',
   'website'=>'prohibited'
  ]);
  unset($data['website'],$data['consent']);
  $data['project_id']=$project->id;
  $data['status']='pledged';
  Donation::create($data);
  return redirect()->route('projects.show',$project)->with('success','Your pledge was recorded for '.$project->title.'. No payment has been collected.');
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