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
  $q=Inquiry::query();if(in_array($r->query('type'),['contact','volunteer','partnership','donation']))$q->where('type',$r->query('type'));
  return view('admin.dashboard',['title'=>'Enquiries','inquiries'=>$q->latest()->paginate(15)->withQueryString(),'total'=>Inquiry::count(),'newCount'=>Inquiry::where('status','new')->count()]);
 }
 public function update(Request $r,Inquiry $inquiry):RedirectResponse {$data=$r->validate(['status'=>'required|in:new,contacted,closed']);$inquiry->update($data);return back()->with('success','Enquiry updated.');}
}
