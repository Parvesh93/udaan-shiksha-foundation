@extends('layouts.app')
@section('content')
<section class="interior-hero"><div class="container interior-hero-grid"><div><span class="eyebrow">SUPPORT EDUCATION</span><h1>Help more children find opportunity.</h1><p>Explore how a transparent, project-linked donation experience could work for an education nonprofit.</p></div><img src="{{ config('showcase_images.donate_hero') }}" alt="Indian children reading together in a classroom; illustrative stock photograph" fetchpriority="high"></div></section>
<section class="section"><div class="container"><div class="section-top"><div><span class="eyebrow">CHOOSE YOUR CAUSE</span><h2>Projects worth supporting</h2><p>These are illustrative programmes for this fictional NGO concept. No actual payments are accepted.</p></div></div>
<div class="donation-projects">
@forelse($projects as $project)<article class="donation-project">
@if($project->image_url)<img src="{{$project->image_url}}" alt="Illustrative image for {{$project->title}}" loading="lazy">@else<div class="donation-project-fallback">Education creates opportunity</div>@endif
<div class="donation-project-body"><span class="eyebrow">EDUCATION PROJECT</span><h3>{{$project->title}}</h3><p>{{$project->summary}}</p>
@if($project->goal_amount!==null)<div class="funding-meta">Verified recorded contributions: ₹{{number_format($project->raised_amount,2)}} <span>Illustrative goal: ₹{{number_format((float)$project->goal_amount,2)}}</span></div>@endif
<a class="btn btn-outline" href="{{route('donate',['project'=>$project->slug])}}#pledge-form">Support this project ↗</a></div></article>
@empty<div class="donation-project-empty"><h3>General Education Fund</h3><p>Projects will appear here after an administrator publishes them. You may still register general support interest using the form below.</p></div>@endforelse
</div></div></section>
<section class="section section-muted" id="pledge-form"><div class="container donate-form-grid"><div><span class="eyebrow">EXPRESS YOUR SUPPORT</span><h2>Every contribution begins with intent.</h2><p>This demonstration records donation pledges in the admin dashboard. It does not process payments, send tax receipts or collect credit-card details.</p><p>After submitting, your pledge will be saved as <strong>Pending / Pledged</strong>, not a received donation.</p></div><div class="form-card">
<h2>Register donation interest</h2>
@if(session('success'))<div class="alert success" role="status">{{session('success')}}</div>@endif
@if($errors->any())<div class="alert error"><strong>Please correct the following:</strong><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif
<form method="post" action="{{route('donate.store')}}" class="enquiry-form">@csrf
<div class="hidden-honeypot"><label for="website">Website<input id="website" name="website" tabindex="-1" autocomplete="off"></label></div>
<div class="form-field"><label for="project_id">Choose a project</label><select name="project_id" id="project_id"><option value="">General Education Fund</option>@foreach($projects as $project)<option value="{{$project->id}}" @selected((string)old('project_id',optional($projects->firstWhere('slug',$selected))->id)===(string)$project->id)>{{$project->title}}</option>@endforeach</select></div>
<div class="form-row"><div class="form-field"><label for="donor_name">Full name *</label><input id="donor_name" name="donor_name" value="{{old('donor_name')}}" maxlength="140" required></div><div class="form-field"><label for="donor_email">Email *</label><input id="donor_email" name="donor_email" type="email" value="{{old('donor_email')}}" maxlength="190" required></div></div>
<div class="form-row"><div class="form-field"><label for="donor_phone">Phone (optional)</label><input id="donor_phone" name="donor_phone" value="{{old('donor_phone')}}" maxlength="25"></div><div class="form-field"><label for="amount">Pledge amount (₹) *</label><input id="amount" name="amount" type="number" min="100" max="9999999999.99" step=".01" value="{{old('amount',500)}}" required></div></div>
<div class="form-field"><label for="message">Message (optional)</label><textarea id="message" name="message" rows="4" maxlength="2000">{{old('message')}}</textarea></div>
<button class="btn btn-primary btn-large" type="submit">Register my pledge ↗</button><p class="form-hint">Demo only. No transaction, payment link, receipt, or 80G tax certificate is generated.</p></form></div></div></section>
@endsection