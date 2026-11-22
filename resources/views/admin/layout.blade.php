<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title','Admin') | Udaan Shiksha Foundation</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Libre+Baskerville:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/admin.css')}}?v=20261122-2">
</head>
<body class="ud-admin">
<input type="checkbox" id="sidebar-toggle" class="sidebar-check">
<label for="sidebar-toggle" class="mobile-backdrop" aria-label="Close menu"></label>
<aside class="sidebar">
 <a class="admin-brand" href="{{route('admin.dashboard')}}"><div class="brand-symbol">u<span>.</span></div><div><strong>udaan</strong><small>SHIKSHA FOUNDATION</small></div></a>
 <div class="org-card"><div class="org-avatar">U</div><div><strong>Udaan Shiksha Foundation</strong><small>Education &amp; child development</small></div></div>
 <div class="nav-label">OVERVIEW</div>
 <nav class="sidebar-nav" aria-label="Administration">
  <a class="nav-item {{ request()->routeIs('admin.dashboard') && !request()->filled('type') && !request()->filled('status') ? 'active' : '' }}" href="{{route('admin.dashboard')}}"><span class="nav-icon">▦</span> Dashboard</a>
  <div class="nav-divider"></div><div class="nav-label in-nav">PROJECTS &amp; DONATIONS</div>
 <a class="nav-item {{ request()->routeIs('admin.projects.*')?'active':'' }}" href="{{route('admin.projects.index')}}"><span class="nav-icon">▣</span> Projects</a>
 <a class="nav-item {{ request()->routeIs('admin.donations.*')?'active':'' }}" href="{{route('admin.donations.index')}}"><span class="nav-icon">◎</span> Donations</a>
 <div class="nav-divider"></div><div class="nav-label in-nav">COMMUNICATION</div>
  <a class="nav-item {{ request('type')==='contact'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'contact'])}}"><span class="nav-icon">✉</span> Contact Enquiries</a>
  <a class="nav-item {{ request('type')==='volunteer'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'volunteer'])}}"><span class="nav-icon">♧</span> Volunteer Interest </a>
  <a class="nav-item {{ request('type')==='partnership'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'partnership'])}}"><span class="nav-icon">♧</span> Partnerships </a>
  <a class="nav-item {{ request('type')==='donation'?'active':'' }}" href="{{route('admin.dashboard',['type'=>'donation'])}}"><span class="nav-icon">♡</span> Support Interest </a>
  <div class="nav-divider"></div><div class="nav-label in-nav">MANAGE ENQUIRIES</div>
  <a class="nav-item {{ request('status')==='new'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'new'])}}"><span class="nav-icon">◷</span> New Requests </a>
  <a class="nav-item {{ request('status')==='contacted'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'contacted'])}}"><span class="nav-icon">✓</span> Contacted</a>
  <a class="nav-item {{ request('status')==='closed'?'active':'' }}" href="{{route('admin.dashboard',['status'=>'closed'])}}"><span class="nav-icon">☑</span> Closed</a>
  <div class="nav-divider"></div>
  <a class="nav-item" href="{{route('home')}}" target="_blank" rel="noopener"><span class="nav-icon">↗</span> View Website</a>
 </nav>
 <div class="sidebar-foot"><small>PORTFOLIO DEMONSTRATION</small><p>Designed by PP DESIGN AND TECH</p></div>
</aside>
<div class="admin-workspace">
 <header class="topbar"><div class="topbar-left"><label for="sidebar-toggle" class="mobile-menu" aria-label="Toggle navigation">☰</label><span>Education that opens doors.</span><span class="topbar-star">✦</span></div><div class="topbar-right"><span class="user-icon">♙</span><span>{{auth()->user()->name ?? 'Administrator'}}</span><span class="role-pill">ADMIN</span><form action="{{route('admin.logout')}}" method="post">@csrf<button class="logout-btn" type="submit" title="Log out" aria-label="Log out">⇥</button></form></div></header>
 <main class="main-content">@yield("content")</main>
</div>
</body></html>