<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class AdminProjectController extends Controller {
 public function index():View {return view('admin.projects.index',['projects'=>Project::latest()->paginate(12),'total'=>Project::count(),'active'=>Project::where('status','active')->count(),'drafts'=>Project::where('status','draft')->count()]);}
 public function create():View {return view('admin.projects.form',['project'=>new Project]);}
 public function store(Request $r):RedirectResponse {
  $data=$this->validated($r);$data['slug']=Project::uniqueSlug($data['title']);$data['featured']=$r->boolean('featured');
  Project::create($data);return redirect()->route('admin.projects.index')->with('success','Project created.');
 }
 public function edit(Project $project):View {return view('admin.projects.form',compact('project'));}
 public function update(Request $r,Project $project):RedirectResponse {
  $data=$this->validated($r);$data['slug']=Project::uniqueSlug($data['title'],$project->id);$data['featured']=$r->boolean('featured');
  $project->update($data);return redirect()->route('admin.projects.index')->with('success','Project updated.');
 }
 public function destroy(Project $project):RedirectResponse {$project->delete();return back()->with('success','Project removed. Existing donation records have been retained without a project association.');}
 private function validated(Request $r):array {return $r->validate([
  'title'=>'required|string|max:160','summary'=>'required|string|max:450','description'=>'nullable|string|max:12000',
  'image_url'=>'nullable|url|starts_with:https://|max:1000','goal_amount'=>'nullable|numeric|min:0|max:9999999999.99',
  'status'=>'required|in:draft,active,completed'
 ]);}
}