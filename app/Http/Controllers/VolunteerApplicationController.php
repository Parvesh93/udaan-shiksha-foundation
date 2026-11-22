<?php
namespace App\Http\Controllers;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class VolunteerApplicationController extends Controller {
 public function create():View {
  return view('pages.volunteer-register',['page'=>'volunteer','title'=>'Volunteer Registration']);
 }
 public function store(Request $request):RedirectResponse {
  $data=$request->validate([
   'name'=>'required|string|min:2|max:140',
   'email'=>'required|email|max:190',
   'phone'=>'required|string|min:7|max:25',
   'city'=>'required|string|max:120',
   'interest_area'=>'required|in:teaching,mentoring,events,creative,remote,other',
   'availability'=>'required|in:weekdays,weekends,flexible,occasional',
   'skills'=>'nullable|string|max:1200',
   'motivation'=>'nullable|string|max:2000',
   'consent'=>'accepted',
   'website'=>'prohibited'
  ]);
  unset($data['consent'],$data['website']);
  $data['status']='pending';
  $data['consented_at']=now();
  VolunteerApplication::create($data);
  return redirect()->route('volunteer.register')->with('success','Your volunteer application has been received for review. This is a portfolio demonstration; no volunteer placement is being offered.');
 }
}