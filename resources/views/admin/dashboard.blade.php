<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Dashboard | Udaan Shiksha Foundation</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/admin.css')}}?v=20261122-1">
</head>
<body class="ud-admin">
<input type="checkbox" id="sidebar-toggle" class="sidebar-check">
<label for="sidebar-toggle" class="mobile-backdrop" aria-label="Close menu"></label>
<aside class="sidebar">
 <a class="admin-brand" href="{{route('admin.dashboard')}}"><div class="brand-symbol">u<span>.</span></div><div><strong>udaan</strong><small>SHIKSHA FOUNDATION</small></div></a>
 <div class="org-card"><div class="org-avatar">U</div><div><strong>Udaan Shiksha Foundation</strong><small>Education &amp; child development</small></div></div>
 <div class="nav-label">OVERVIEW</div>
 <nav class="sidebar-nav" aria-label="Administration">
  <a class="nav-item {{ !request()->filled('type') && !request()->filled('status') ? 'active' : '' }}" href="{{route('admin.dashboard')}}"><span class="nav-icon">▦</span> Dashboard</a>
  <div class="nav-divider"></div><div class="nav-label in-nav">PROJECTS &amp; DONATIONS</div>
 <a class="nav-item {{ request()->routeIs('admin.projects.*')?'active':'' }}" href="{{route('admin.projects.index')}}"><span class="nav-icon">▣</span> Projects</a>
 <a class="nav-item {{ request()->routeIs('admin.donations.*')?'active':'' }}" href="{{route('admin.donations.index')}}"><span class="nav-icon">◎</span> Donations</a>
 <div class="nav-divider"></div><div class="nav-label in-nav">COMMUNICATION</div>
  <a class="nav-item {{ request('type')==='contact'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'contact'])}}"><span class="nav-icon">✉</span> Contact Enquiries</a>
  <a class="nav-item {{ request('type')==='volunteer'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'volunteer'])}}"><span class="nav-icon">♧</span> Volunteer Interest <span class="nav-count">{{$volunteerCount}}</span></a>
  <a class="nav-item {{ request('type')==='partnership'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'partnership'])}}"><span class="nav-icon">♧</span> Partnerships <span class="nav-count">{{$partnerCount}}</span></a>
  <a class="nav-item {{ request('type')==='donation'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'donation'])}}"><span class="nav-icon">♡</span> Support Interest <span class="nav-count">{{$supportCount}}</span></a>
  <div class="nav-divider"></div><div class="nav-label in-nav">MANAGE ENQUIRIES</div>
  <a class="nav-item {{ request('status')==='new'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'new'])}}"><span class="nav-icon">◷</span> New Requests <span class="nav-count">{{$newCount}}</span></a>
  <a class="nav-item {{ request('status')==='contacted'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'contacted'])}}"><span class="nav-icon">✓</span> Contacted</a>
  <a class="nav-item {{ request('status')==='closed'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'closed'])}}"><span class="nav-icon">☑</span> Closed</a>
  <div class="nav-divider"></div>
  <a class="nav-item" href="{{route('home')}}" target="_blank" rel="noopener"><span class="nav-icon">↗</span> View Website</a>
 </nav>
 <div class="sidebar-foot"><small>PORTFOLIO DEMONSTRATION</small><p>Designed by PP DESIGN AND TECH</p></div>
</aside>
<div class="admin-workspace">
 <header class="topbar"><div class="topbar-left"><label for="sidebar-toggle" class="mobile-menu" aria-label="Toggle navigation">☰</label><span>Education that opens doors.</span><span class="topbar-star">✦</span></div><div class="topbar-right"><span class="user-icon">♙</span><span>{{auth()->user()->name ?? 'Administrator'}}</span><span class="role-pill">ADMIN</span><form action="{{route('admin.logout')}}" method="post">@csrf<button class="logout-btn" type="submit" title="Log out" aria-label="Log out">⇥</button></form></div></header>
 <main class="main-content">
  <div class="page-head"><div><div class="eyebrow">ORGANIZATION OVERVIEW</div><h1>Welcome back, {{strtok(auth()->user()->name ?? 'Administrator', ' ')}}</h1><p>Here's what's happening at Udaan Shiksha Foundation.</p></div></div>
  <div class="welcome-banner"><div><div class="banner-overline">EVERY ENQUIRY IS AN OPPORTUNITY</div><h2>Keep the mission moving.</h2><p>Stay connected with supporters, volunteers and people interested in your programmes.</p></div><a href="{{route('home')}}" class="banner-action" target="_blank" rel="noopener">View website ↗</a></div>
  <div class="metrics-grid">
   <article class="metric-card"><div class="metric-top"><span>Total enquiries</span><span class="metric-icon">✉</span></div><strong>{{$total}}</strong><small>All recorded submissions</small></article>
   <article class="metric-card"><div class="metric-top"><span>New enquiries</span><span class="metric-icon">◷</span></div><strong>{{$newCount}}</strong><small>Awaiting follow-up</small></article>
   <article class="metric-card"><div class="metric-top"><span>Contacted</span><span class="metric-icon">✓</span></div><strong>{{$contactedCount}}</strong><small>Follow-up initiated</small></article>
   <article class="metric-card"><div class="metric-top"><span>Closed enquiries</span><span class="metric-icon">☑</span></div><strong>{{$closedCount}}</strong><small>Marked complete</small></article>
  </div>
  <div class="section-header"><div><div class="eyebrow">RELATIONSHIPS &amp; ENGAGEMENT</div><h2>Enquiry Management</h2><p>Review incoming requests and keep follow-ups organized in one place.</p></div></div>
  @if(session('success'))<div class="notice success" role="status">{{session('success')}}</div>@endif
  <section class="data-card">
   <div class="card-title-row"><h3>Enquiry directory</h3><span class="record-count">{{$inquiries->total()}} records</span></div>
   <form class="filters" method="get" action="{{route('admin.dashboard')}}">
    <div class="search-wrap"><span aria-hidden="true">⌕</span><input type="search" name="search" value="{{request('search')}}" placeholder="Search name, email or message" aria-label="Search enquiries"></div>
    <select name="type" aria-label="Filter by enquiry type"><option value="">All enquiry types</option>@foreach(['contact'=>'Contact','volunteer'=>'Volunteer','partnership'=>'Partnership','donation'=>'Support'] as $key=>$label)<option value="{{$key}}" @selected(request('type')===$key)>{{$label}}</option>@endforeach</select>
    <select name="status" aria-label="Filter by status"><option value="">All statuses</option>@foreach(['new'=>'New','contacted'=>'Contacted','closed'=>'Closed'] as $key=>$label)<option value="{{$key}}" @selected(request('status')===$key)>{{$label}}</option>@endforeach</select>
    <button type="submit" class="filter-btn">Apply</button><a class="reset-link" href="{{route('admin.dashboard')}}">Reset</a>
   </form>
   <div class="quick-tabs"><a class="{{!request('type')?'selected':''}}" href="{{route('admin.dashboard')}}">All enquiries</a><a class="{{request('type')==='volunteer'?'selected':''}}" href="{{route('admin.dashboard',['type'=>'volunteer'])}}">Volunteers</a><a class="{{request('type')==='partnership'?'selected':''}}" href="{{route('admin.dashboard',['type'=>'partnership'])}}">Partnerships</a><a class="{{request('type')==='donation'?'selected':''}}" href="{{route('admin.dashboard',['type'=>'donation'])}}">Support</a></div>
   <div class="table-scroller"><table class="enquiry-table"><thead><tr><th>PERSON</th><th>ENQUIRY</th><th>MESSAGE</th><th>RECEIVED</th><th>STATUS</th></tr></thead><tbody>
   @forelse($inquiries as $item)
    <tr><td><div class="person-cell"><span class="person-avatar">{{strtoupper(substr($item->name,0,1))}}</span><div><strong>{{$item->name}}</strong><a href="mailto:{{$item->email}}">{{$item->email}}</a>@if($item->phone)<small>{{$item->phone}}</small>@endif</div></div></td>
    <td><span class="type-tag type-{{$item->type}}">{{ucfirst($item->type==='donation'?'support':$item->type)}}</span></td>
    <td class="message-cell">@if($item->subject)<strong>{{$item->subject}}</strong>@endif<div>{{\Illuminate\Support\Str::limit($item->message ?: '—',150)}}</div></td>
    <td class="date-cell">{{$item->created_at->format('d M Y')}}<small>{{$item->created_at->format('h:i A')}}</small></td>
    <td><form method="post" action="{{route('admin.enquiries.update',$item)}}">@csrf @method('PATCH')<select name="status" class="status-select status-{{$item->status}}" aria-label="Status for {{$item->name}}" onchange="this.form.submit()">@foreach(['new'=>'New','contacted'=>'Contacted','closed'=>'Closed'] as $key=>$label)<option value="{{$key}}" @selected($item->status===$key)>{{$label}}</option>@endforeach</select><noscript><button type="submit">Save</button></noscript></form></td></tr>
   @empty<tr><td colspan="5"><div class="empty-state"><span>✉</span><h3>No enquiries found</h3><p>New submissions from your website will appear here.</p></div></td></tr>@endforelse
   </tbody></table></div><div class="pagination-wrap">{{$inquiries->onEachSide(1)->links()}}</div>
  </section>
  <p class="admin-disclaimer">Demo dashboard · Metrics reflect the submissions stored in this site's database. No external NGOOrbit data is connected.</p>
 </main>
</div>
</body></html>