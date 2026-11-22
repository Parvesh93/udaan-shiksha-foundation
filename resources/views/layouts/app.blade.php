<!doctype html>
<html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="theme-color" content="#123b46"><meta name="description" content="Udaan Shiksha Foundation — an education and child development NGO website concept by PP DESIGN AND TECH.">
<title>{{ $title ?? 'Education for Every Child' }} | Udaan Shiksha Foundation</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}?v=20261122-hero-pillars-1"></head>
<body><div class="demo-strip">PORTFOLIO CONCEPT <span>·</span> Fictional NGO &amp; illustrative content <span>·</span> No live donation collection</div>
<header class="site-header"><div class="container nav-shell">
<a class="brand" href="{{route('home')}}" aria-label="Udaan Shiksha Foundation home"><span class="brand-mark">u<span>.</span></span><span class="brand-words"><strong>udaan</strong><small>SHIKSHA FOUNDATION</small></span></a>
<button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="main-menu"><span></span><span></span><span></span></button>
<nav class="main-menu" id="main-menu" aria-label="Main navigation">
<a class="{{($page??'')==='home'?'active':''}}" href="{{route('home')}}">Home</a><a class="{{($page??'')==='about'?'active':''}}" href="{{route('about')}}">About</a><a class="{{($page??'')==='programs'?'active':''}}" href="{{route('programs')}}">Our Programs</a><a class="{{($page??'')==='impact'?'active':''}}" href="{{route('impact')}}">Our Approach</a><a class="{{($page??'')==='contact'?'active':''}}" href="{{route('contact')}}">Contact</a><a class="{{($page??'')==='donate'?'active':''}}" href="{{route('donate')}}">Donate</a><a class="btn btn-primary nav-action" href="{{route('volunteer.register')}}">Become a Volunteer <span>↗</span></a>
</nav></div></header>
<main>@yield('content')</main>
<footer class="footer"><div class="container"><div class="footer-grid">
<div class="footer-about"><a class="brand footer-brand" href="{{route('home')}}"><span class="brand-mark">u<span>.</span></span><span class="brand-words"><strong>udaan</strong><small>SHIKSHA FOUNDATION</small></span></a><p>Building a world where every child has the opportunity to learn, grow and reach their full potential.</p><span class="footer-concept">Fictional NGO showcase by PP DESIGN AND TECH</span></div>
<div><h4>Explore</h4><a href="{{route('about')}}">Who We Are</a><a href="{{route('programs')}}">Programs</a><a href="{{route('impact')}}">Our Approach</a></div>
<div><h4>Get Involved</h4><a href="{{route('volunteer.register')}}">Volunteer Registration</a><a href="{{route('donate')}}">Support a Cause</a><a href="{{route('contact')}}">Partner With Us</a></div>
<div><h4>Connect</h4><p>Interested in supporting education? Start a conversation with us.</p><a href="{{route('contact')}}" class="footer-contact">Send an Enquiry ↗</a></div>
</div><div class="footer-bottom"><span>© {{date('Y')}} Udaan Shiksha Foundation · Portfolio demonstration only</span><span>Crafted by PP DESIGN AND TECH <span class="footer-sep">·</span> <a href="{{route('admin.login')}}">Admin</a></span></div></div></footer>
<script defer src="{{asset('assets/js/main.js')}}?v=20261122-project-detail-1"></script></body></html>