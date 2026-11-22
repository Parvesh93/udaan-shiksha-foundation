document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('.menu-toggle');
  const menu = document.querySelector('.main-menu');
  if (button && menu) {
    const closeMenu = () => {
      menu.classList.remove('open');
      button.setAttribute('aria-expanded', 'false');
      button.setAttribute('aria-label', 'Open navigation');
    };
    button.addEventListener('click', () => {
      const open = menu.classList.toggle('open');
      button.setAttribute('aria-expanded', String(open));
      button.setAttribute('aria-label', open ? 'Close navigation' : 'Open navigation');
    });
    menu.querySelectorAll('a').forEach(link => link.addEventListener('click', closeMenu));
    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') closeMenu();
    });
  }

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
  const sections = Array.from(document.querySelectorAll('main section.section, main section.interior-hero, main section.cta-section'));
  if (!reduceMotion.matches && 'IntersectionObserver' in window) {
    const targets = sections.flatMap(section => [
      ...section.querySelectorAll('h1, h2, .eyebrow, .section-top, .program-card, .feature-media, .feature-copy, .values-grid > article, .journey-step, .gallery-grid img, .donation-project, .form-card')
    ]).filter((element, i, elements) => elements.indexOf(element) === i);
    const visible = new IntersectionObserver((entries, observer) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.07, rootMargin: '0px 0px 48px 0px' });
    targets.forEach((element, index) => {
      element.classList.add('will-reveal');
      element.style.setProperty('--reveal-delay', `${Math.min(index % 4, 3) * 65}ms`);
      visible.observe(element);
    });
  }

  const header = document.querySelector('.site-header');
  if (header) {
    let scheduled = false;
    const updateHeader = () => {
      header.classList.toggle('is-scrolled', window.scrollY > 20);
      scheduled = false;
    };
    window.addEventListener('scroll', () => {
      if (!scheduled) {
        scheduled = true;
        requestAnimationFrame(updateHeader);
      }
    }, { passive: true });
    updateHeader();
  }
});

/* Project carousel controls: native scroll snapping with keyboard and touch support. */
document.addEventListener('DOMContentLoaded', () => {
  const rail=document.querySelector('[data-project-carousel]');
  if(!rail) return;
  const prev=document.querySelector('[data-project-prev]');
  const next=document.querySelector('[data-project-next]');
  const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
  const step=()=>{
    const card=rail.querySelector('.home-project-card');
    if(!card)return rail.clientWidth;
    const gap=parseFloat(getComputedStyle(rail).columnGap)||0;
    return card.getBoundingClientRect().width+gap;
  };
  const update=()=>{
    if(prev)prev.disabled=rail.scrollLeft<4;
    if(next)next.disabled=rail.scrollLeft+rail.clientWidth>=rail.scrollWidth-4;
  };
  const move=dir=>{
    rail.scrollBy({left:step()*dir,behavior:reduced.matches?'auto':'smooth'});
  };
  if(prev)prev.addEventListener('click',()=>move(-1));
  if(next)next.addEventListener('click',()=>move(1));
  rail.addEventListener('scroll',update,{passive:true});
  rail.addEventListener('keydown',e=>{
    if(e.key==='ArrowLeft'||e.key==='ArrowRight'){
      e.preventDefault();
      move(e.key==='ArrowRight'?1:-1);
    }
  });
  window.addEventListener('resize',update,{passive:true});
  update();
});

/* Suggested amounts for project pledge forms. */
document.addEventListener('DOMContentLoaded',()=>{
 const amount=document.querySelector('.project-pledge-form #amount');
 const choices=[...document.querySelectorAll('.project-amount-choices [data-pledge-value]')];
 if(!amount||!choices.length)return;
 const sync=()=>choices.forEach(b=>b.classList.toggle('is-selected',Number(b.dataset.pledgeValue)===Number(amount.value)));
 choices.forEach(b=>b.addEventListener('click',()=>{amount.value=b.dataset.pledgeValue;sync();amount.focus();}));
 amount.addEventListener('input',sync);
 sync();
});
