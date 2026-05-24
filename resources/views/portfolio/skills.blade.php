@extends('portfolio.layout')


@push('styles')
<style>
.skills-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(270px,1fr));gap:1.25rem;margin-top:3rem;}
.skill-box{background:var(--surface);border:1px solid var(--border);border-radius:14px;padding:1.75rem;transition:border-color .2s,transform .2s,box-shadow .2s;}
.skill-box:hover{border-color:var(--accent);transform:translateY(-4px);box-shadow:0 0 24px var(--glow);}
.skill-box-title{font-family:'Fira Code',monospace;font-size:.7rem;color:var(--accent);letter-spacing:2px;text-transform:uppercase;margin-bottom:1.25rem;display:flex;align-items:center;gap:.5rem;}
.skill-box-title::after{content:'';flex:1;height:1px;background:var(--border);}
.skill-item{margin-bottom:.9rem;}
.skill-item:last-child{margin-bottom:0;}
.skill-meta{display:flex;justify-content:space-between;font-size:.85rem;margin-bottom:.4rem;}
.skill-name{font-weight:500;color:var(--text);}
.skill-pct{font-family:'Fira Code',monospace;font-size:.72rem;color:var(--muted);}
.bar-bg{height:3px;background:rgba(255,140,0,.1);border-radius:99px;overflow:hidden;}
.bar{height:100%;border-radius:99px;background:linear-gradient(90deg,var(--accent2),var(--accent3));width:0;transition:width 1.3s cubic-bezier(.16,1,.3,1);}
</style>
@endpush

@section('content')

<section id="skills">
  <div class="section-wrap">
    <p class="sec-label reveal">// what i know</p>
    <h2 class="sec-title reveal">Skills & Technologies</h2>

    <div class="skills-grid">

      {{-- Frontend Core --}}
      <div class="skill-box reveal">
        <div class="skill-box-title">Frontend Core</div>
        @foreach([['HTML5',95],['CSS3',92],['Bootstrap',90]] as $skill)
        <div class="skill-item">
          <div class="skill-meta">
            <span class="skill-name">{{ $skill[0] }}</span>
            <span class="skill-pct">{{ $skill[1] }}%</span>
          </div>
          <div class="bar-bg"><div class="bar" data-w="{{ $skill[1] }}"></div></div>
        </div>
        @endforeach
      </div>

      {{-- JavaScript --}}
      <div class="skill-box reveal">
        <div class="skill-box-title">JavaScript</div>
        @foreach([['JavaScript ES6+',85],['jQuery',88],['DOM Manipulation',87]] as $skill)
        <div class="skill-item">
          <div class="skill-meta">
            <span class="skill-name">{{ $skill[0] }}</span>
            <span class="skill-pct">{{ $skill[1] }}%</span>
          </div>
          <div class="bar-bg"><div class="bar" data-w="{{ $skill[1] }}"></div></div>
        </div>
        @endforeach
      </div>

      {{-- Framework & Tools --}}
      <div class="skill-box reveal">
        <div class="skill-box-title">Framework & Tools</div>
        @foreach([['Laravel',80],['Responsive Design',93],['Git & GitHub',78]] as $skill)
        <div class="skill-item">
          <div class="skill-meta">
            <span class="skill-name">{{ $skill[0] }}</span>
            <span class="skill-pct">{{ $skill[1] }}%</span>
          </div>
          <div class="bar-bg"><div class="bar" data-w="{{ $skill[1] }}"></div></div>
        </div>
        @endforeach
      </div>

    </div>
  </div>
</section>

@endsection
