<?php
namespace App\Http\Controllers;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller {
 public function loginForm():View {return view('admin.login',['title'=>'Admin Sign In']);}
 public function login(Request $r):RedirectResponse {
  $credentials=$r->validate(['email'=>'required|email','password'=>'required|string']);
  if(Auth::attempt($credentials)){$r->session()->regenerate();return redirect()->intended(route('admin.dashboard'));}
  return back()->withErrors(['email'=>'Invalid credentials.'])->onlyInput('email');
 }
 public function logout(Request $r):RedirectResponse {Auth::logout();$r->session()->invalidate();$r->session()->regenerateToken();return redirect()->route('admin.login');}
 public function dashboard(Request $r):View {
  $allowedTypes=['contact','volunteer','partnership','donation'];
  $allowedStatuses=['new','contacted','closed'];
  $type=$r->query('type'); $status=$r->query('status');
  $query=Inquiry::query();
  if(in_array($type,$allowedTypes,true)) $query->where('type',$type);
  if(in_array($status,$allowedStatuses,true)) $query->where('status',$status);
  if($search=trim((string)$r->query('search',''))) {
   $query->where(function($q)use($search){$q->where('name','like','%'.$search.'%')->orWhere('email','like','%'.$search.'%')->orWhere('message','like','%'.$search.'%');});
  }
  return view('admin.dashboard',[
   'title'=>'Dashboard',
   'inquiries'=>$query->latest()->paginate(12)->withQueryString(),
   'total'=>Inquiry::count(),
   'newCount'=>Inquiry::where('status','new')->count(),
   'contactedCount'=>Inquiry::where('status','contacted')->count(),
   'closedCount'=>Inquiry::where('status','closed')->count(),
   'volunteerCount'=>Inquiry::where('type','volunteer')->count(),
   'partnerCount'=>Inquiry::where('type','partnership')->count(),
   'supportCount'=>Inquiry::where('type','donation')->count(),
  ]);
 }
 public function update(Request $r,Inquiry $inquiry):RedirectResponse {$data=$r->validate(['status'=>'required|in:new,contacted,closed']);$inquiry->update($data);return back()->with('success','Enquiry updated.');}
}
