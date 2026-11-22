@extends('layouts.app')
@section('content')


<section class="hero"><div class="hero-photo" style="background-image:linear-gradient(90deg,rgba(10,34,43,.91) 0%,rgba(10,34,43,.74) 43%,rgba(10,34,43,.18) 100%),url('{{ config('showcase_images.home_hero') }}')"></div><div class="container hero-inner"><div class="hero-content"><div class="eyebrow light">EDUCATION CHANGES LIVES</div><h1>Every child deserves the chance to <em>thrive.</em></h1><p>Creating pathways to learning, confidence and opportunity for children who need them most.</p><div class="hero-buttons"><a href="{{route('donate')}}" class="btn btn-accent btn-large">Support Our Vision <span>↗</span></a><a href="{{route('programs')}}" class="btn btn-ghost btn-large">Explore Our Work <span>↗</span></a></div></div></div></section>
<style>
/* Self-contained marquee styling prevents stale external CSS from stacking both copies. */
.udaan-ticker{display:block!important;position:relative!important;width:100%!important;overflow:hidden!important;box-sizing:border-box!important;background:#e9f2ee!important;border-top:1px solid #d6e8df;border-bottom:1px solid #d6e8df;padding:18px 0!important;color:#245d50}
.udaan-ticker__track{display:flex!important;flex-flow:row nowrap!important;align-items:center!important;gap:0!important;white-space:nowrap!important;width:max-content!important;min-width:max-content!important;animation:udaan-ticker-scroll 46s linear infinite!important;will-change:transform}
.udaan-ticker__set{display:flex!important;flex:0 0 auto!important;flex-flow:row nowrap!important;align-items:center!important;gap:32px!important;padding-right:32px!important;min-width:max-content!important;white-space:nowrap!important}
.udaan-ticker__set span{display:inline-block!important;flex:0 0 auto!important;font:800 12px/1.4 'Manrope',Arial,sans-serif!important;letter-spacing:.11em!important;color:#245d50!important;white-space:nowrap!important}
.udaan-ticker__set i{display:inline-block!important;flex:0 0 auto!important;font-style:normal!important;font-size:14px!important;color:#d1a258!important}
.udaan-ticker:hover .udaan-ticker__track{animation-play-state:paused!important}
@keyframes udaan-ticker-scroll{from{transform:translate3d(0,0,0)}to{transform:translate3d(-50%,0,0)}}
@media(max-width:700px){.udaan-ticker{padding:14px 0!important}.udaan-ticker__track{animation-duration:58s!important}.udaan-ticker__set{gap:22px!important;padding-right:22px!important}.udaan-ticker__set span{font-size:10px!important;letter-spacing:.07em!important}}
@media(prefers-reduced-motion:reduce){.udaan-ticker__track{animation:none!important;will-change:auto!important}.udaan-ticker__set:nth-child(2){display:none!important}}
</style>
<div class="udaan-ticker" role="region" aria-label="Our focus: education for all, empowering young minds, building stronger communities and every child matters">
  <div class="udaan-ticker__track" aria-hidden="true">
    <div class="udaan-ticker__set"><span>EDUCATION FOR ALL</span><i aria-hidden="true">✦</i><span>EMPOWERING YOUNG MINDS</span><i aria-hidden="true">✦</i><span>BUILDING STRONGER COMMUNITIES</span><i aria-hidden="true">✦</i><span>EVERY CHILD MATTERS</span><i aria-hidden="true">✦</i></div>
    <div class="udaan-ticker__set"><span>EDUCATION FOR ALL</span><i aria-hidden="true">✦</i><span>EMPOWERING YOUNG MINDS</span><i aria-hidden="true">✦</i><span>BUILDING STRONGER COMMUNITIES</span><i aria-hidden="true">✦</i><span>EVERY CHILD MATTERS</span><i aria-hidden="true">✦</i></div>
  </div>
</div>
<section class="section section-intro"><div class="container intro-grid"><div class="intro-heading"><span class="eyebrow">WHO WE ARE</span><h2>Helping children build stronger <em>futures.</em></h2></div><div class="intro-copy"><p>Education opens the door to a lifetime of opportunities. Udaan Shiksha Foundation is an illustrative nonprofit concept focused on educational inclusion, holistic child development and stronger community support systems.</p><p>Our vision places children at the centre of every decision — creating environments where learning is accessible, engaging and meaningful.</p><a class="text-link" href="{{route('about')}}">Discover our mission <span>↗</span></a></div></div></section>
<section class="section section-muted"><div class="container"><div class="section-top"><div><span class="eyebrow">OUR FOCUS AREAS</span><h2>Supporting every stage <br>of a child's journey.</h2></div><a class="text-link" href="{{route('programs')}}">View all programs <span>↗</span></a></div><div class="program-grid">
<article class="program-card"><a href="{{route('programs')}}#learning"><img src="{{ config('showcase_images.home_program_learning') }}" alt="Schoolchildren learning together in a classroom" loading="lazy"></a><div class="program-content"><span class="program-number">01 / EDUCATION</span><h3>Foundational Learning</h3><p>Building essential literacy, numeracy and learning confidence through supportive educational opportunities.</p><a class="card-link" href="{{route('programs')}}#learning">Explore program <span>↗</span></a></div></article>
<article class="program-card"><a href="{{route('programs')}}#creativity"><img src="{{ config('showcase_images.home_program_creativity') }}" alt="Indian children participating in classroom learning" loading="lazy"></a><div class="program-content"><span class="program-number">02 / DEVELOPMENT</span><h3>Creative Development</h3><p>Encouraging curiosity, self-expression and problem-solving through activity-based learning.</p><a class="card-link" href="{{route('programs')}}#creativity">Explore program <span>↗</span></a></div></article>
<article class="program-card"><a href="{{route('programs')}}#life-skills"><img src="{{ config('showcase_images.home_program_skills') }}" alt="Children engaged in a classroom education activity" loading="lazy"></a><div class="program-content"><span class="program-number">03 / LIFE SKILLS</span><h3>Skills for Tomorrow</h3><p>Nurturing communication, confidence, teamwork and resilience for life beyond the classroom.</p><a class="card-link" href="{{route('programs')}}#life-skills">Explore program <span>↗</span></a></div></article>
</div></div></section>

<section class="section home-projects-section" id="our-projects" aria-labelledby="home-projects-title">
 <div class="container">
  <div class="home-projects-heading">
   <div><span class="eyebrow">OUR PROJECTS</span><h2 id="home-projects-title">Creating opportunities, <em>one project at a time.</em></h2><p>Explore our education-focused initiatives and discover how to support a cause.</p></div>
   @if($projects->count()>1)<div class="home-projects-controls" aria-label="Project carousel controls"><button type="button" class="project-arrow" data-project-prev aria-label="Previous projects">←</button><button type="button" class="project-arrow" data-project-next aria-label="Next projects">→</button></div>@endif
  </div>
  @if($projects->isNotEmpty())
   <div class="home-projects-carousel" data-project-carousel role="region" aria-roledescription="carousel" aria-label="Active projects" tabindex="0">
    @foreach($projects as $project)
     @php
      $received = max(0,(float)($project->received_amount ?? 0));
      $goal = (float)($project->goal_amount ?? 0);
      $progress = $goal > 0 ? min(100, max(0, ($received / $goal) * 100)) : 0;
      $progressLabel = $goal > 0 ? number_format($progress, 0).'%' : 'Goal pending';
     @endphp
     <article class="home-project-card" aria-label="{{$project->title}}">
      <div class="home-project-photo">
       @if($project->image_url)<img src="{{$project->image_url}}" alt="Illustrative photograph for {{$project->title}}" loading="lazy" decoding="async" onerror="this.style.display='none';this.parentElement.classList.add('image-missing')">
       @else<div class="home-project-photo-placeholder">Education opens doors</div>@endif
       <span class="home-project-status">ONGOING PROJECT</span>
      </div>
      <div class="home-project-body">
       <h3>{{$project->title}}</h3>
       <p class="home-project-summary">{{$project->summary}}</p>
       <div class="home-project-funding">
        <div class="home-project-amounts"><span>Verified received<strong>₹{{number_format($received,0)}}</strong></span><span class="goal-amount">Goal<strong>{{$goal>0?'₹'.number_format($goal,0):'Not set'}}</strong></span></div>
        <div class="home-project-progress-head"><span>Funding progress</span><strong>{{$progressLabel}}</strong></div>
        <div class="home-project-progress" role="progressbar" aria-label="Funding progress for {{$project->title}}" aria-valuemin="0" aria-valuemax="100" aria-valuenow="{{round($progress)}}"><span style="width: {{number_format($progress,2,'.','')}}%"></span></div>
       </div>
       <a class="home-project-link" href="{{route('projects.show',$project)}}">View project &amp; support <span aria-hidden="true">↗</span></a>
      </div>
     </article>
    @endforeach
   </div>
   <div class="home-projects-foot"><p>Funding totals show only donations manually marked as received; pledges are not included. This is a fictional demonstration.</p><a href="{{route('donate')}}" class="text-link">Explore all active projects ↗</a></div>
  @else
   <div class="home-projects-empty"><div><span class="eyebrow">COMING SOON</span><h3>Education projects will appear here.</h3><p>Publish a project as Active from the admin dashboard to feature it on the homepage.</p></div><a class="btn btn-outline" href="{{route('donate')}}">Explore ways to support ↗</a></div>
  @endif
 </div>
</section>
<section class="section"><div class="container feature-grid"><div class="feature-media"><img src="{{ config('showcase_images.home_feature') }}" alt="Children learning in an Indian classroom" loading="lazy"><div class="image-caption">Stock photography · illustrative of the programme vision</div></div><div class="feature-copy"><span class="eyebrow">WHY OUR APPROACH MATTERS</span><h2>Learning is more than a classroom.</h2><p>A child's ability to flourish depends on their environment, confidence and the people who stand beside them. A meaningful education programme should address all three.</p><div class="feature-points"><div><span class="point-icon">01</span><div><h3>Child-centred learning</h3><p>Responding to individual needs and different learning abilities.</p></div></div><div><span class="point-icon">02</span><div><h3>Beyond academics</h3><p>Encouraging creativity, wellbeing and essential life skills.</p></div></div><div><span class="point-icon">03</span><div><h3>Communities as partners</h3><p>Bringing families, volunteers and educators into the journey.</p></div></div></div><a href="{{route('impact')}}" class="btn btn-outline">Our Approach <span>↗</span></a></div></div></section>
<section class="section gallery-section"><div class="container"><div class="section-top"><div><span class="eyebrow">FIELD MOMENTS</span><h2>Every learning moment matters.</h2><p>Sample stock images show the type of education-focused storytelling this demo website can support.</p></div></div><div class="gallery-grid"><img src="{{ config('showcase_images.home_gallery_one') }}" alt="Schoolchildren during a class" loading="lazy"><img src="{{ config('showcase_images.home_gallery_two') }}" alt="Students attending school" loading="lazy"><img src="{{ config('showcase_images.home_gallery_three') }}" alt="Schoolchildren engaged in classroom learning" loading="lazy"></div><p class="gallery-credit">Images: selected Indian education stock photographs / Pexels; not photographs of activities organised by Udaan Shiksha Foundation. These images are stock photos and do not depict activities of Udaan Shiksha Foundation.</p></div></section>
<section class="section transparency-section"><div class="container transparency-grid"><div><span class="eyebrow">ACCOUNTABILITY MATTERS</span><h2>Building trust through transparency.</h2><p>Clear programme goals, responsible stewardship and honest reporting help supporters understand how an NGO makes a difference.</p></div><div class="transparency-list"><div><strong>01</strong><span>Clear programme objectives and outcomes</span></div><div><strong>02</strong><span>Ethical documentation and child safeguarding</span></div><div><strong>03</strong><span>Responsible reporting and community feedback</span></div><p>This is a design demonstration. No audited results, legal registrations or partner endorsements are claimed.</p></div></div></section>
@include('pages.partials-cta')
@endsection