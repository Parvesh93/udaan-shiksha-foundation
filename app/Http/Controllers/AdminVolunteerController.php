<?php
namespace App\Http\Controllers;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class AdminVolunteerController extends Controller {
 public function index(Request $request):View {
  $query=VolunteerApplication::query();
  if(in_array($request->query('status'),['pending','reviewed','approved','rejected'],true)) $query->where('status',$request->query('status'));
  $search=trim((string)$request->query('search',''));
  if($search!=='') $query->where(function($q)use($search){$q->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('city','like','%'.$search.'%');});
  return view('admin.volunteers.index',[
    'applications'=>$query->latest()->paginate(15)->withQueryString(),
    'total'=>VolunteerApplication::count(),
    'pending'=>VolunteerApplication::where('status','pending')->count(),
    'approved'=>VolunteerApplication::where('status','approved')->count(),
    'reviewed'=>VolunteerApplication::where('status','reviewed')->count()
  ]);
 }
 public function update(Request $request,VolunteerApplication $application):RedirectResponse {
  $data=$request->validate(['status'=>'required|in:pending,reviewed,approved,rejected','admin_notes'=>'nullable|string|max:3000']);
  $application->update($data);
  return back()->with('success','Volunteer application updated.');
 }
}