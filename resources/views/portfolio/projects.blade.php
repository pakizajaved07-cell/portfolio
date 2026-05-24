@extends('portfolio.layout')

@push('styles')
<style>
.projects-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:1.5rem;margin-top:3rem;}
.proj-card{background:var(--surface);border:1px solid var(--border);border-radius:16px;padding:2rem;cursor:none;transition:border-color .3s,transform .3s,box-shadow .3s;position:relative;overflow:hidden;opacity:1 !important;transform:none !important;}
.proj-card::after{content:'';position:absolute;inset:0;background:radial-gradient(500px circle at var(--mx,50%) var(--my,50%),rgba(255,120,0,.07),transparent 65%);opacity:0;transition:opacity .4s;pointer-events:none;}
.proj-card:hover::after{opacity:1;}
.proj-card:hover{border-color:var(--accent);transform:translateY(-6px) !important;box-shadow:0 8px 40px rgba(255,100,0,.15);}
.proj-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:1.25rem;}
.proj-emoji{width:48px;height:48px;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;}
.proj-links{display:flex;gap:.75rem;}
.proj-links a{font-size:.75rem;color:var(--muted);text-decoration:none;font-family:'Fira Code',monospace;transition:color .2s;}
.proj-links a:hover{color:var(--accent);}
.proj-title{font-size:1.05rem;font-weight:600;margin-bottom:.5rem;color:var(--text);}
.proj-desc{font-size:.85rem;color:var(--muted);line-height:1.75;margin-bottom:1.25rem;}
.proj-tags{display:flex;gap:.4rem;flex-wrap:wrap;}
.view-detail{display:inline-flex;align-items:center;gap:.4rem;font-family:'Fira Code',monospace;font-size:.7rem;color:var(--muted);margin-top:1rem;transition:color .2s;}
.proj-card:hover .view-detail{color:var(--accent);}

/* MODAL */
.modal-overlay{position:fixed;inset:0;z-index:1000;background:rgba(0,0,0,0.85);backdrop-filter:blur(8px);display:flex;align-items:center;justify-content:center;padding:1.5rem;opacity:0;pointer-events:none;transition:opacity .3s ease;}
.modal-overlay.open{opacity:1;pointer-events:all;}
.modal-box{background:#0f0700;border:1px solid var(--border);border-radius:20px;max-width:620px;width:100%;max-height:90vh;overflow-y:auto;padding:2.5rem;position:relative;transform:translateY(30px) scale(.97);transition:transform .35s cubic-bezier(.16,1,.3,1);box-shadow:0 0 60px rgba(255,100,0,.15);}
.modal-overlay.open .modal-box{transform:translateY(0) scale(1);}
.modal-close{position:absolute;top:1.25rem;right:1.25rem;width:34px;height:34px;background:rgba(255,140,0,.1);border:1px solid var(--border);border-radius:50%;color:var(--muted);font-size:1.1rem;display:flex;align-items:center;justify-content:center;cursor:none;transition:background .2s,color .2s,border-color .2s;}
.modal-close:hover{background:rgba(255,140,0,.2);color:var(--accent);border-color:var(--accent);}
.modal-emoji{width:64px;height:64px;border-radius:16px;display:flex;align-items:center;justify-content:center;font-size:2rem;margin-bottom:1.5rem;}
.modal-title{font-family:'Playfair Display',serif;font-size:1.6rem;font-weight:700;margin-bottom:.5rem;background:linear-gradient(135deg,var(--accent),var(--accent3));-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.modal-subtitle{font-family:'Fira Code',monospace;font-size:.72rem;color:var(--accent);letter-spacing:2px;text-transform:uppercase;margin-bottom:1.5rem;}
.modal-divider{height:1px;background:var(--border);margin:1.5rem 0;}
.modal-section-label{font-family:'Fira Code',monospace;font-size:.68rem;color:var(--muted);letter-spacing:2px;text-transform:uppercase;margin-bottom:.75rem;}
.modal-desc{font-size:.9rem;color:#a07850;line-height:1.85;margin-bottom:1.5rem;}
.modal-features{list-style:none;margin-bottom:1.5rem;}
.modal-features li{font-size:.875rem;color:#a07850;padding:.45rem 0;border-bottom:1px solid rgba(255,140,0,.07);display:flex;align-items:center;gap:.75rem;}
.modal-features li::before{content:'';width:6px;height:6px;background:var(--accent);border-radius:50%;flex-shrink:0;box-shadow:0 0 6px var(--accent);}
.modal-tags{display:flex;gap:.4rem;flex-wrap:wrap;margin-bottom:2rem;}
.modal-btns{display:flex;gap:.75rem;}
.modal-btns a{flex:1;text-align:center;padding:.75rem 1rem;border-radius:8px;font-size:.85rem;font-weight:600;text-decoration:none;cursor:none;transition:transform .2s,box-shadow .2s;}
.modal-btns a:hover{transform:translateY(-2px);}
.modal-btn-primary{background:linear-gradient(135deg,var(--accent2),var(--accent3));color:#080400;box-shadow:0 0 20px rgba(255,120,0,.25);}
.modal-btn-primary:hover{box-shadow:0 0 32px rgba(255,120,0,.45);}
.modal-btn-ghost{background:transparent;color:var(--text);border:1px solid var(--border);}
.modal-btn-ghost:hover{border-color:var(--accent);color:var(--accent);}
</style>
@endpush

@section('content')

<section id="projects">
  <div class="section-wrap">
    <p class="sec-label">// my work</p>
    <h2 class="sec-title">Featured Projects</h2>
    <div class="projects-grid" id="proj-grid"></div>
  </div>
</section>

<div class="modal-overlay" id="modal-overlay">
  <div class="modal-box">
    <button class="modal-close" id="modal-close">✕</button>
    <div id="modal-content"></div>
  </div>
</div>

@endsection

@push('scripts')
<script>
const projects=[
  {
    emoji:'🦷',bg:'rgba(255,140,0,.12)',
    title:'Dentist Website',subtitle:'Healthcare Web Design',
    desc:'A professional dental clinic website with appointment booking, services showcase, doctor profiles, and a clean responsive layout.',
    longDesc:'This full dental clinic website provides patients a seamless online experience. It includes a hero section, services page, doctor profile cards, an appointment booking form with validation, and a contact page with an embedded map. Fully responsive and mobile-friendly.',
    features:['Online appointment booking form with JS validation','Services section with hover-animated cards','Doctor profiles with photo placeholders','Responsive navbar with mobile hamburger menu','Contact form with Google Maps integration','Smooth scroll animations throughout'],
    tags:[['HTML5','tag-orange'],['CSS3','tag-amber'],['Bootstrap','tag-red'],['jQuery','tag-orange']]
  },
  {
    emoji:'✅',bg:'rgba(255,100,0,.1)',
    title:'To-Do List App',subtitle:'Productivity Application',
    desc:'Feature-rich task manager with add, edit, delete, and filter functionality. Tasks persist with localStorage and smooth animations.',
    longDesc:'A fully functional To-Do List app for daily productivity. Users can add, edit, complete, and delete tasks, filter by All/Active/Completed, and assign priority levels. All tasks saved in localStorage so data persists on refresh.',
    features:['Add, edit, delete tasks with instant UI update','Mark tasks complete with strikethrough animation','Filter by All / Active / Completed','localStorage persistence — data saved on refresh','Priority labels (High / Medium / Low)','Clear all completed tasks with one click'],
    tags:[['JavaScript','tag-amber'],['jQuery','tag-orange'],['CSS3','tag-red']]
  },
  {
    emoji:'🧠',bg:'rgba(255,60,0,.1)',
    title:'Quiz App',subtitle:'Interactive Learning Tool',
    desc:'Interactive quiz application with timed questions, score tracking, result breakdown, and dynamic question loading with an engaging UI.',
    longDesc:'An engaging Quiz App that tests knowledge across categories. Each session loads questions dynamically, displays a countdown timer, and tracks scores in real time. A detailed result screen shows correct vs incorrect answers. Fully animated and responsive.',
    features:['Dynamic question loading from JS data array','Per-question countdown timer with visual bar','Real-time score counter during the quiz','Result screen with correct/incorrect breakdown','Animated correct/wrong answer feedback','Restart quiz without page reload'],
    tags:[['JavaScript','tag-red'],['HTML5','tag-orange'],['Bootstrap','tag-amber']]
  }
];

// Cards banao
const grid = document.getElementById('proj-grid');
projects.forEach((p, i) => {
  const card = document.createElement('div');
  card.className = 'proj-card';
  card.dataset.index = i;
  card.innerHTML = `
    <div class="proj-header">
      <div class="proj-emoji" style="background:${p.bg}">${p.emoji}</div>
      <div class="proj-links">
        <a href="#" onclick="return false;">GitHub ↗</a>
        <a href="#" onclick="return false;">Live ↗</a>
      </div>
    </div>
    <div class="proj-title">${p.title}</div>
    <div class="proj-desc">${p.desc}</div>
    <div class="proj-tags">${p.tags.map(([t,c]) => `<span class="tag ${c}">${t}</span>`).join('')}</div>
    <div class="view-detail">Click to view details →</div>
  `;
  grid.appendChild(card);
});

// Mouse glow
document.querySelectorAll('.proj-card').forEach(card => {
  card.addEventListener('mousemove', e => {
    const r = card.getBoundingClientRect();
    card.style.setProperty('--mx', (e.clientX - r.left) + 'px');
    card.style.setProperty('--my', (e.clientY - r.top) + 'px');
  });
});

// Modal
const overlay = document.getElementById('modal-overlay');
const modalContent = document.getElementById('modal-content');

function openModal(i) {
  const p = projects[i];
  modalContent.innerHTML = `
    <div class="modal-emoji" style="background:${p.bg}">${p.emoji}</div>
    <div class="modal-title">${p.title}</div>
    <div class="modal-subtitle">${p.subtitle}</div>
    <div class="modal-desc">${p.longDesc}</div>
    <div class="modal-divider"></div>
    <div class="modal-section-label">Key Features</div>
    <ul class="modal-features">${p.features.map(f => `<li>${f}</li>`).join('')}</ul>
    <div class="modal-divider"></div>
    <div class="modal-section-label">Tech Stack</div>
    <div class="modal-tags">${p.tags.map(([t,c]) => `<span class="tag ${c}">${t}</span>`).join('')}</div>
    <div class="modal-btns">
      <a href="#" class="modal-btn-ghost">GitHub ↗</a>
      <a href="#" class="modal-btn-primary">Live Demo →</a>
    </div>`;
  overlay.classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  overlay.classList.remove('open');
  document.body.style.overflow = '';
}

document.getElementById('modal-close').addEventListener('click', closeModal);
overlay.addEventListener('click', e => { if (e.target === overlay) closeModal(); });
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });
document.addEventListener('click', e => {
  const card = e.target.closest('.proj-card');
  if (card) openModal(parseInt(card.dataset.index));
});
</script>
@endpush