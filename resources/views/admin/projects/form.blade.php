@extends('admin.layout')
@section('title',$project->exists?'Edit Project':'New Project')
@section('content')
<div class="section-header"><div><div class="eyebrow">PROJECTS &amp; PROGRAMS</div><h2>{{$project->exists?'Edit project':'Add a new project'}}</h2><p>Active projects are shown on the public donation page.</p></div><a class="reset-link" href="{{route('admin.projects.index')}}">← Back to projects</a></div>
@if($errors->any())<div class="notice form-error"><strong>Please review the fields below.</strong><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif
<form class="data-card admin-edit-form" method="post" action="{{$project->exists?route('admin.projects.update',$project):route('admin.projects.store')}}">@csrf @if($project->exists)@method('PUT')@endif
<div class="admin-field"><label for="title">Project title *</label><input id="title" name="title" maxlength="160" required value="{{old('title',$project->title)}}"></div>
<div class="admin-field"><label for="summary">Short summary *</label><textarea id="summary" name="summary" maxlength="450" rows="3" required>{{old('summary',$project->summary)}}</textarea></div>
<div class="admin-field"><label for="description">Detailed description</label><textarea id="description" name="description" maxlength="12000" rows="7">{{old('description',$project->description)}}</textarea></div>
<div class="admin-field"><label for="image_url">Image URL (HTTPS)</label><input id="image_url" name="image_url" type="url" placeholder="https://images.pexels.com/..." value="{{old('image_url',$project->image_url)}}"></div>
<div class="admin-two-col"><div class="admin-field"><label for="goal_amount">Fundraising goal (₹)</label><input id="goal_amount" name="goal_amount" type="number" min="0" max="9999999999.99" step=".01" value="{{old('goal_amount',$project->goal_amount)}}"></div><div class="admin-field"><label for="status">Visibility &amp; status *</label><select id="status" name="status">@foreach(['draft'=>'Draft','active'=>'Active','completed'=>'Completed'] as $key=>$label)<option value="{{$key}}" @selected(old('status',$project->status??'draft')===$key)>{{$label}}</option>@endforeach</select></div></div>
<label class="admin-check"><input type="checkbox" name="featured" value="1" @checked(old('featured',$project->featured))> Feature this project in the donation list</label>
<div class="form-actions"><button class="filter-btn" type="submit">{{$project->exists?'Save changes':'Create project'}}</button><a class="reset-link" href="{{route('admin.projects.index')}}">Cancel</a></div></form>
@endsection