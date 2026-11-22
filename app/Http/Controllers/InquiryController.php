<?php
namespace App\Http\Controllers;
use App\Models\Inquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class InquiryController extends Controller {
 public function store(Request $request):RedirectResponse {
  $data=$request->validate([
   'type'=>'required|in:contact,volunteer,partnership,donation',
   'name'=>'required|string|min:2|max:120',
   'email'=>'required|email|max:190',
   'phone'=>'nullable|string|max:25',
   'subject'=>'nullable|string|max:190',
   'message'=>'nullable|string|max:3000',
   'website'=>'prohibited',
  ]);
  Inquiry::create($data);
  return back()->with('success','Thank you! Your demo enquiry has been saved successfully.');
 }
}
