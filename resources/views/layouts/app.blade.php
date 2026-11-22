<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="description" content="A colourful Laravel portfolio demo for an education and child development NGO, designed by PP DESIGN AND TECH.">
<meta name="theme-color" content="#fffaf0">
<title>{{ $title ?? 'Learning Changes Everything' }} | Udaan Shiksha Foundation</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head><body>
<div class="demo-strip"><span class="demo-dot"></span> Creative portfolio demo by <strong>PP DESIGN AND TECH</strong> — fictional NGO, sample content, no live donations</div>
<header class="site-header"><div class="container nav-shell">
<a class="brand" href="{{ route('home') }}" aria-label="Udaan Shiksha Foundation home"><span class="brand-symbol"><svg viewBox="0 0 48 48" fill="none" aria-hidden="true"><path d="M6 29c9-4 12-13 18-19 2 11 7 17 18 19-7 1-13 4-18 11C20 34 14 30 6 29Z" fill="#FFCE56"/><path d="M13 27c5-4 8-8 11-15 3 10 9 14 14 16" stroke="#1746B5" stroke-width="3" stroke-linecap="round"/></svg></span><span class="brand-words"><strong>udaan<span>.</span></strong><small>SHIKSHA FOUNDATION</small></span></a>
<button class="menu-toggle" type="button" aria-label="Open navigation" aria-expanded="false" aria-controls="main-menu"><span></span><span></span><span></span></button>
<nav class="main-menu" id="main-menu" aria-label="Main navigation"><a class="{{ ($page??'')==='home'?'active':'' }}" href="{{ route('home') }}">Home</a><a class="{{ ($page??'')==='about'?'active':'' }}" href="{{ route('about') }}">About Us</a><a class="{{ ($page??'')==='programs'?'active':'' }}" href="{{ route('programs') }}">Our Programs</a><a class="{{ ($page??'')==='impact'?'active':'' }}" href="{{ route('impact') }}">Our Impact</a><a class="{{ ($page??'')==='contact'?'active':'' }}" href="{{ route('contact') }}">Contact</a><a class="btn btn-blue nav-action" href="{{ route('get-involved') }}">Get Involved <span>↗</span></a></nav>
</div></header>
<main>@yield('content')</main>
<footer class="footer"><div class="container"><div class="footer-top"><div class="footer-intro"><a class="brand footer-brand" href="{{ route('home') }}"><span class="brand-symbol"><svg viewBox="0 0 48 48" fill="none"><path d="M6 29c9-4 12-13 18-19 2 11 7 17 18 19-7 1-13 4-18 11C20 34 14 30 6 29Z" fill="#FFCE56"/><path d="M13 27c5-4 8-8 11-15 3 10 9 14 14 16" stroke="#1746B5" stroke-width="3" stroke-linecap="round"/></svg></span><span class="brand-words"><strong>udaan<span>.</span></strong><small>SHIKSHA FOUNDATION</small></span></a><p>Because a brighter future begins with a child who believes they can fly.</p><div class="footer-pill">✦ Learning. Growing. Soaring.</div></div><div><h4>Explore</h4><a href="{{route('about')}}">Our Story</a><a href="{{route('programs')}}">Programs</a><a href="{{route('impact')}}">Our Impact</a></div><div><h4>Get Involved</h4><a href="{{route('get-involved')}}">Volunteer</a><a href="{{route('get-involved')}}#support">Support a Cause</a><a href="{{route('contact')}}">Partner With Us</a></div><div><h4>Say Hello</h4><p>Have an idea for a brighter tomorrow?</p><a class="footer-email" href="{{route('contact')}}">Let's talk ↗</a></div></div><div class="footer-bottom"><span>© {{ date('Y') }} Udaan Shiksha Foundation — Fictional showcase concept.</span><span>Designed by <strong>PP DESIGN AND TECH</strong> · <a href="{{route('admin.login')}}">Admin</a></span></div></div></footer>
<script src="{{ asset('assets/js/main.js') }}" defer></script>
</body></html>
