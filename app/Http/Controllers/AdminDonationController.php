<?php
namespace App\Http\Controllers;
use App\Models\Donation;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
class AdminDonationController extends Controller {
 public function index(Request $r):View {
  $q=Donation::with('project')->latest();
  if(in_array($r->query('status'),['pledged','received','cancelled'],true))$q->where('status',$r->query('status'));
  return view('admin.donations.index',[
   'donations'=>$q->paginate(15)->withQueryString(),
   'pledges'=>Donation::where('status','pledged')->count(),
   'receivedTotal'=>Donation::where('status','received')->sum('amount'),
   'receivedCount'=>Donation::where('status','received')->count(),
   'projects'=>Project::orderBy('title')->get(['id','title'])
  ]);
 }
 public function store(Request $r):RedirectResponse {
  $data=$r->validate([
   'project_id'=>['nullable',Rule::exists('projects','id')],
   'donor_name'=>'required|string|max:140','donor_email'=>'required|email|max:190',
   'donor_phone'=>'nullable|string|max:25','amount'=>'required|numeric|min:1|max:9999999999.99',
   'message'=>'nullable|string|max:2000','status'=>'required|in:pledged,received,cancelled',
   'payment_reference'=>'nullable|string|max:190'
  ]);
  if($data['status']==='received' && empty($data['payment_reference']))return back()->withErrors(['payment_reference'=>'A payment or receipt reference is required to record money received.'])->withInput();
  $data['received_at']=$data['status']==='received'?now():null;
  Donation::create($data);return back()->with('success','Donation record created.');
 }
 public function update(Request $r,Donation $donation):RedirectResponse {
  $data=$r->validate(['status'=>'required|in:pledged,received,cancelled','payment_reference'=>'nullable|string|max:190']);
  if($data['status']==='received' && empty($data['payment_reference']) && !$donation->payment_reference) return back()->withErrors(['payment_reference'=>'A verified transaction or receipt reference is required before marking received.']);
  $data['received_at']=$data['status']==='received'?($donation->received_at ?? now()):null;
  $donation->update($data);return back()->with('success','Donation status updated.');
 }
}