@extends('layouts.app')
@section('content')
<section class="project-detail-hero">
 <div class="container">
  <nav class="project-breadcrumb" aria-label="Breadcrumb"><a href="{{route('home')}}">Home</a><span>/</span><a href="{{route('home')}}#our-projects">Projects</a><span>/</span><span aria-current="page">{{$project->title}}</span></nav>
  <div class="project-hero-grid"><div class="project-hero-copy"><span class="eyebrow">ACTIVE EDUCATION PROJECT</span><h1>{{$project->title}}</h1><p>{{$project->summary}}</p><div class="project-hero-actions"><a class="btn btn-primary btn-large" href="#project-donate">Support this project ↗</a><a class="btn btn-outline" href="#project-about">Explore the project ↓</a></div></div>
   <div class="project-hero-image">@if($project->image_url)<img src="{{$project->image_url}}" alt="Illustrative stock photograph for {{$project->title}}" fetchpriority="high" onerror="this.style.display='none';this.parentNode.classList.add('image-missing')">@else<div class="project-photo-fallback">Learning changes lives.</div>@endif</div>
  </div>
 </div>
</section>
<section class="section project-detail-main"><div class="container project-detail-grid">
 <div class="project-story">
  <div class="project-highlights"><div><span>Project status</span><strong>Ongoing</strong></div><div><span>Funding goal</span><strong>{{$goal>0?'₹'.number_format($goal,0):'Not specified'}}</strong></div><div><span>Verified contributions</span><strong>₹{{number_format($received,0)}}</strong></div></div>
  <article id="project-about" class="project-article"><span class="eyebrow">ABOUT THIS INITIATIVE</span><h2>Supporting learning. Creating opportunity.</h2>
  <div class="project-description">
  @if(filled($project->description))
    {!! nl2br(e($project->description)) !!}
  @else
    <p>{{$project->summary}}</p><p>This initiative reflects the foundation's vision of improving access to learning and development opportunities.</p>
  @endif
  </div>
  </article>
  <div class="project-outcome-panel"><span class="eyebrow">WHY SUPPORT MATTERS</span><h3>Every step towards better education matters.</h3><p>Support interest helps demonstrate how an NGO can connect a programme page with a clear, transparent giving journey. This website is a fictional portfolio example.</p></div>
 </div>
 <aside class="project-donation-sidebar" id="project-donate" aria-label="Support this project">
  <div class="project-donation-card">
   <div class="eyebrow">SUPPORT THIS PROJECT</div><h2>Make a difference through education.</h2>
   <div class="project-funding"><div class="project-funding-figures"><div><span>Verified received</span><strong>₹{{number_format($received,0)}}</strong></div><div><span>Goal</span><strong>{{$goal>0?'₹'.number_format($goal,0):'Not set'}}</strong></div></div><div class="project-progress-line"><span>Funding progress</span><strong>{{$goal>0?number_format($progress,0).'%':'Goal pending'}}</strong></div><div class="project-progress-track" role="progressbar" aria-label="Project funding progress" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{round($progress)}}"><div style="width:{{number_format($progress,2,'.','')}}%"></div></div></div>
   @if(session('success'))<div class="project-alert project-alert-success" role="status">{{session('success')}}</div>@endif
   @if($errors->any())<div class="project-alert project-alert-error" role="alert"><strong>Please correct the form:</strong><ul>@foreach($errors->all() as $error)<li>{{$error}}</li>@endforeach</ul></div>@endif
   <div class="project-pledge-notice"><strong>Portfolio demonstration</strong><p>This form records a pledge only. No actual payment is processed and no tax receipt is issued.</p></div>
   <form class="project-pledge-form" method="post" action="{{route('projects.pledge',$project)}}">@csrf
    <div class="hidden-honeypot" aria-hidden="true"><label for="website">Website</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div>
    <div class="project-form-field"><label for="amount">Pledge amount (₹) *</label><div class="project-amount-choices" role="group" aria-label="Suggested pledge amounts"><button type="button" data-pledge-value="500">₹500</button><button type="button" data-pledge-value="1000">₹1,000</button><button type="button" data-pledge-value="2500">₹2,500</button></div><input id="amount" name="amount" type="number" min="100" max="9999999999.99" step=".01" value="{{old('amount',1000)}}" required></div>
    <div class="project-form-field"><label for="donor_name">Your full name *</label><input id="donor_name" name="donor_name" maxlength="140" value="{{old('donor_name')}}" autocomplete="name" required></div>
    <div class="project-form-field"><label for="donor_email">Email address *</label><input id="donor_email" name="donor_email" type="email" maxlength="190" value="{{old('donor_email')}}" autocomplete="email" required></div>
    <div class="project-form-field"><label for="donor_phone">Phone number (optional)</label><input id="donor_phone" name="donor_phone" type="tel" maxlength="25" value="{{old('donor_phone')}}" autocomplete="tel"></div>
    <div class="project-form-field"><label for="message">Message (optional)</label><textarea id="message" name="message" rows="3" maxlength="2000">{{old('message')}}</textarea></div>
    <label class="project-consent"><input type="checkbox" name="consent" value="1" required @checked(old('consent'))><span>I understand that this is a fictional NGO demo and consent to my submitted details being stored for demonstration and administrative review.</span></label>
    <button class="btn btn-primary btn-large project-submit" type="submit">Register pledge ↗</button>
    <p class="project-form-footnote">Your submission will appear as <strong>Pledged</strong> in the admin donation dashboard. It is not a completed transaction.</p>
   </form>
  </div>
 </aside>
</div></section>
@if($related->isNotEmpty())
<section class="section section-muted"><div class="container"><div class="section-top"><div><span class="eyebrow">EXPLORE MORE</span><h2>Other education initiatives</h2></div><a class="text-link" href="{{route('donate')}}">View all projects ↗</a></div><div class="project-related-grid">@foreach($related as $other)<article class="project-related-card">@if($other->image_url)<a href="{{route('projects.show',$other)}}"><img src="{{$other->image_url}}" loading="lazy" alt="Illustrative image for {{$other->title}}"></a>@endif<div><h3>{{$other->title}}</h3><p>{{$other->summary}}</p><a href="{{route('projects.show',$other)}}" class="text-link">View project ↗</a></div></article>@endforeach</div></div></section>
@endif
@endsection