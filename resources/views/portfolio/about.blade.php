
@extends('portfolio.layout')


@push('styles')
<style>
.hero-section{min-height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center;text-align:center;padding:0 5%;position:relative;z-index:1;}
.hero-chip{display:inline-flex;align-items:center;gap:.5rem;font-family:'Fira Code',monospace;font-size:.72rem;color:var(--accent3);background:rgba(255,140,0,0.1);border:1px solid rgba(255,140,0,.28);padding:.3rem 1rem;border-radius:999px;margin-bottom:2rem;animation:fadeDown .6s both;}
.chip-dot{width:6px;height:6px;background:var(--accent3);border-radius:50%;animation:blink 2s infinite;box-shadow:0 0 6px var(--accent3);}
.hero-name{font-family:'Playfair Display',serif;font-size:clamp(3rem,7vw,6rem);font-weight:800;line-height:1.05;letter-spacing:-2px;animation:fadeUp .7s .1s both;background:linear-gradient(135deg,#fff4e6 20%,var(--accent) 60%,var(--accent2));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.hero-role{font-family:'Fira Code',monospace;font-size:clamp(.9rem,2vw,1.05rem);color:var(--accent);letter-spacing:3px;text-transform:uppercase;margin:1rem 0 1.5rem;animation:fadeUp .7s .2s both;text-shadow:0 0 20px rgba(255,140,0,.4);}
.hero-tagline{font-size:1rem;color:var(--muted);max-width:480px;line-height:1.9;margin-bottom:2.5rem;animation:fadeUp .7s .3s both;}
.hero-btns{display:flex;gap:1rem;flex-wrap:wrap;justify-content:center;animation:fadeUp .7s .4s both;}
.scroll-hint{position:absolute;bottom:2.5rem;left:50%;transform:translateX(-50%);display:flex;flex-direction:column;align-items:center;gap:.4rem;animation:fadeUp .7s .8s both;}
.scroll-line{width:2px;height:60px;background:rgba(255,140,0,0.15);border-radius:99px;position:relative;overflow:hidden;}
.scroll-line::after{content:'';position:absolute;top:-12px;left:50%;transform:translateX(-50%);width:6px;height:12px;background:var(--accent);border-radius:99px;box-shadow:0 0 10px var(--accent),0 0 20px rgba(255,140,0,.6);display:block;animation:dotSlide 1.6s ease-in-out infinite;}
.scroll-label{font-size:.62rem;letter-spacing:2px;color:var(--muted);text-transform:uppercase;}
.marquee-wrap{overflow:hidden;padding:2.5rem 0;border-top:1px solid var(--border);border-bottom:1px solid var(--border);background:rgba(255,100,0,.03);position:relative;z-index:1;}
.marquee-track{display:flex;gap:1.5rem;width:max-content;animation:roll 22s linear infinite;}
.marquee-track:hover{animation-play-state:paused;}
.tech-pill{display:flex;align-items:center;gap:.6rem;padding:.55rem 1.1rem;background:var(--surface);border:1px solid var(--border);border-radius:999px;font-size:.82rem;font-weight:500;white-space:nowrap;transition:border-color .2s,transform .2s;}
.tech-pill:hover{border-color:var(--accent);transform:scale(1.05);}
.t-dot{width:7px;height:7px;border-radius:50%;flex-shrink:0;}
.about-grid{display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:start;margin-top:3rem;}
.avatar-ring{width:210px;height:210px;border-radius:50%;background:linear-gradient(135deg,var(--accent2),var(--accent3));padding:3px;box-shadow:0 0 40px rgba(255,120,0,.25);}
.avatar-inner{width:100%;height:100%;border-radius:50%;background:linear-gradient(135deg,#0f0700,#1a0a00);display:flex;align-items:center;justify-content:center;}
.avatar-initials{font-family:'Playfair Display',serif;font-size:3.5rem;font-weight:800;background:linear-gradient(135deg,var(--accent),var(--accent3));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.about-text p{color:var(--muted);line-height:1.9;margin-bottom:1.1rem;font-size:.95rem;}
.about-stats{display:grid;grid-template-columns:1fr 1fr;gap:.8rem;margin-top:1.5rem;}
.stat-card{background:var(--surface);border:1px solid var(--border);border-radius:12px;padding:1.2rem;text-align:center;transition:border-color .2s,transform .2s,box-shadow .2s;}
.stat-card:hover{border-color:var(--accent);transform:translateY(-4px);box-shadow:0 0 20px var(--glow);}
.stat-num{font-family:'Playfair Display',serif;font-size:2rem;font-weight:800;background:linear-gradient(135deg,var(--accent),var(--accent3));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.stat-lbl{font-size:.75rem;color:var(--muted);margin-top:.25rem;}
@media(max-width:768px){.about-grid{grid-template-columns:1fr;gap:2.5rem;}}
</style>
@endpush

@section('content')

{{-- HERO --}}
<section class="hero-section">
  <div class="hero-chip"><span class="chip-dot"></span>Open to Opportunities</div>
  <h1 class="hero-name">Pakiza Javed</h1>
  <p class="hero-role">Frontend Developer</p>
  <p class="hero-tagline">Crafting beautiful, interactive interfaces with clean code and pixel-perfect precision.</p>
  <div class="hero-btns">
    <a href="#projects" class="btn btn-primary">View My Work →</a>
    <a href="#contact" class="btn btn-ghost">Hire Me</a>
  </div>
  <div class="scroll-hint">
    <span class="scroll-label">Scroll</span>
    <div class="scroll-line"></div>
  </div>
</section>

{{-- TECH MARQUEE --}}
<div class="marquee-wrap">
  <div class="marquee-track" id="marquee-track"></div>
</div>

{{-- ABOUT --}}
<section id="about">
  <div class="section-wrap">
    <p class="sec-label reveal">// who i am</p>
    <h2 class="sec-title reveal">Passionate about<br>beautiful interfaces.</h2>

    <div class="about-grid">
      <div style="display:flex;justify-content:center;" class="reveal">
        <div class="avatar-ring">
          <div class="avatar-inner">
            <span class="avatar-initials">PJ</span>
          </div>
        </div>
      </div>

      <div>
        <div class="about-text reveal">
          <p>Hi! I'm <strong style="color:var(--text);">Pakiza Javed</strong>, a dedicated Frontend Developer who loves turning ideas into pixel-perfect, responsive web experiences.</p>
          <p>I specialise in HTML, CSS, Bootstrap, JavaScript, jQuery, and Laravel — building everything from landing pages to full web applications with clean, maintainable code.</p>
          <p>Detail-oriented, fast learner, and always excited about creating interfaces that delight users.</p>
        </div>
        <div class="about-stats reveal">
          <div class="stat-card"><div class="stat-num">6+</div><div class="stat-lbl">Technologies</div></div>
          <div class="stat-card"><div class="stat-num">3+</div><div class="stat-lbl">Projects Built</div></div>
          <div class="stat-card"><div class="stat-num">100%</div><div class="stat-lbl">Dedication</div></div>
          <div class="stat-card"><div class="stat-num">∞</div><div class="stat-lbl">Curiosity</div></div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
const techs=[{name:'HTML5',color:'#ff6a00'},{name:'CSS3',color:'#ffb347'},{name:'Bootstrap',color:'#ff8c00'},{name:'JavaScript',color:'#ffd700'},{name:'jQuery',color:'#ff7f00'},{name:'Laravel',color:'#ff4500'},{name:'PHP',color:'#ffaa55'},{name:'Responsive Design',color:'#ff9933'},{name:'Git',color:'#ff6600'},{name:'UI/UX',color:'#ffcc66'}];
const track=document.getElementById('marquee-track');
[...techs,...techs].forEach(t=>{track.innerHTML+=`<div class="tech-pill"><span class="t-dot" style="background:${t.color};box-shadow:0 0 5px ${t.color}55;"></span>${t.name}</div>`;});
</script>
@endpush
