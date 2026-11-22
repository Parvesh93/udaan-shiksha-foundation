@extends('layouts.app')
@section('content')
<style>
/* Project details: critical CSS is local to this page so Hostinger's cached asset does not break the layout. */
.project-detail-hero{background:#f3f8f5!important;padding:30px 0 64px!important}
.project-detail-hero>.container,.project-detail-main>.container{max-width:1180px;width:calc(100% - 44px);margin:0 auto}
.project-breadcrumb{display:flex!important;flex-wrap:wrap!important;align-items:center!important;gap:12px!important;margin:8px 0 38px!important;color:#73877c!important;font-size:12px!important;line-height:1.5!important}
.project-breadcrumb a{color:#167b78!important;text-decoration:none!important}
.project-hero-grid{display:grid!important;grid-template-columns:minmax(0,1fr) minmax(0,1fr)!important;align-items:center!important;gap:55px!important}
.project-hero-copy{min-width:0!important}
.project-hero-copy h1{font-family:Manrope,Arial,sans-serif!important;font-size:clamp(2.5rem,3.9vw,4.1rem)!important;line-height:1.14!important;letter-spacing:-.045em!important;margin:10px 0 22px!important;max-width:620px!important;overflow-wrap:anywhere!important;color:#143a45!important}
.project-hero-copy>p{font-size:16px!important;line-height:1.85!important;max-width:570px!important;color:#647a6f!important}
.project-hero-actions{display:flex!important;flex-wrap:wrap!important;gap:12px!important;margin-top:28px!important}
.project-hero-image{display:block!important;position:relative!important;height:390px!important;min-height:300px!important;overflow:hidden!important;border-radius:15px!important;background:linear-gradient(140deg,rgba(14,56,42,.04),rgba(14,56,42,.02)),url('{{config('showcase_images.programs_learning')}}') center/cover no-repeat!important;box-shadow:0 16px 45px rgba(19,70,48,.14)!important}
.project-hero-image img{display:block;width:100%!important;height:100%!important;object-fit:cover!important}
.project-hero-image .project-photo-fallback{display:none!important}
.project-detail-main{padding:75px 0!important;background:#fff!important}
.project-detail-grid{display:grid!important;grid-template-columns:minmax(0,1.15fr) minmax(340px,.85fr)!important;align-items:start!important;gap:50px!important}
.project-story,.project-donation-sidebar{min-width:0!important}
.project-highlights{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;overflow:hidden!important;background:#f7faf8!important;border:1px solid #dfeae3!important;border-radius:12px!important;margin:0 0 45px!important}
.project-highlights>div{display:flex!important;flex-direction:column!important;gap:8px!important;min-width:0!important;padding:20px 16px!important;border-right:1px solid #dfeae3!important}
.project-highlights>div:last-child{border-right:0!important}
.project-highlights span{display:block!important;font-size:11px!important;color:#798d80!important}
.project-highlights strong{display:block!important;font-size:clamp(14px,1.4vw,18px)!important;line-height:1.4!important;color:#195c47!important;overflow-wrap:anywhere!important}
.project-article h2{font-size:clamp(1.9rem,2.6vw,2.75rem)!important;line-height:1.27!important;margin:12px 0 24px!important}
.project-description{font-size:15px!important;line-height:1.95!important;color:#65796d!important;overflow-wrap:anywhere!important}
.project-description p{line-height:1.9!important}
.project-outcome-panel{background:#edf5ef!important;border-left:3px solid #1c8062!important;padding:28px!important;margin-top:40px!important}
.project-outcome-panel h3{font-size:20px!important;margin:8px 0 12px!important}
.project-outcome-panel p{font-size:14px!important}
.project-donation-sidebar{position:sticky!important;top:105px!important;scroll-margin-top:110px!important}
.project-donation-card{background:#fff!important;border:1px solid #e1eae4!important;border-radius:15px!important;padding:30px!important;box-shadow:0 16px 45px rgba(23,70,52,.1)!important}
.project-donation-card h2{font-size:25px!important;line-height:1.38!important;margin:9px 0 20px!important}
.project-funding{padding:20px 0!important;border-top:1px solid #e1eae4!important;border-bottom:1px solid #e1eae4!important;margin-bottom:20px!important}
.project-funding-figures{display:flex!important;justify-content:space-between!important;gap:12px!important}
.project-funding-figures>div:last-child{text-align:right!important}
.project-funding-figures span{display:block!important;font-size:11px!important;color:#84968a!important}
.project-funding-figures strong{display:block!important;font-size:21px!important;line-height:1.4!important;color:#185f50!important;margin-top:5px!important}
.project-progress-line{display:flex!important;justify-content:space-between!important;gap:8px!important;margin:18px 0 9px!important;font-size:12px!important;color:#728a7b!important}
.project-progress-track{height:10px!important;overflow:hidden!important;background:#e5efe8!important;border-radius:99px!important}
.project-progress-track>div{height:100%!important;border-radius:99px!important;background:linear-gradient(90deg,#2a9974,#16705b)!important}
.project-pledge-notice{background:#f0f7f2!important;padding:14px 16px!important;border-radius:8px!important;margin:18px 0!important}
.project-pledge-notice p{margin:6px 0 0!important;font-size:12px!important}
.project-pledge-form{display:grid!important;grid-template-columns:minmax(0,1fr)!important;gap:17px!important}
.project-form-field{display:flex!important;flex-direction:column!important;gap:8px!important;min-width:0!important}
.project-form-field>label{display:block!important;font-size:12px!important;font-weight:700!important;color:#315142!important}
.project-form-field>input,.project-form-field>textarea{display:block!important;box-sizing:border-box!important;width:100%!important;min-width:0!important;padding:13px!important;background:#fff!important;border:1px solid #d6e3da!important;border-radius:7px!important;font:inherit!important}
.project-amount-choices{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;gap:8px!important}
.project-amount-choices button{min-width:0!important;padding:12px 5px!important;border:1px solid #d4e7da!important;border-radius:7px!important;background:#f4faf6!important;color:#176b50!important;font-weight:700!important;cursor:pointer!important}
.project-amount-choices button.is-selected{background:#d9eee1!important;border-color:#2d9774!important}
.project-consent{display:flex!important;align-items:flex-start!important;gap:10px!important;font-size:11px!important;line-height:1.7!important}
.project-consent input{width:17px!important;height:17px!important;flex:none!important;accent-color:#167b78!important}
.project-submit{display:flex!important;width:100%!important;align-items:center!important;justify-content:center!important}
.project-form-footnote{font-size:11px!important;line-height:1.7!important}
.project-related-grid{display:grid!important;grid-template-columns:repeat(3,minmax(0,1fr))!important;gap:22px!important}
@media(max-width:950px){.project-hero-grid{gap:28px!important}.project-detail-grid{grid-template-columns:minmax(0,1fr)!important;gap:40px!important}.project-donation-sidebar{position:static!important}}
@media(max-width:680px){.project-detail-hero{padding:20px 0 40px!important}.project-hero-grid{grid-template-columns:minmax(0,1fr)!important;gap:25px!important}.project-hero-image{height:260px!important;min-height:260px!important}.project-hero-copy h1{font-size:clamp(2.1rem,9vw,2.9rem)!important}.project-detail-main{padding:45px 0!important}.project-highlights{grid-template-columns:minmax(0,1fr)!important}.project-highlights>div{border-right:0!important;border-bottom:1px solid #dfeae3!important;padding:14px 18px!important}.project-highlights>div:last-child{border-bottom:0!important}.project-donation-card{padding:22px!important}.project-related-grid{grid-template-columns:minmax(0,1fr)!important}}
</style>

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