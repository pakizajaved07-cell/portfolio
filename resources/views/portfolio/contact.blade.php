@extends('portfolio.layout')


@push('styles')
<style>
.contact-section{text-align:center;position:relative;z-index:1;}
.contact-card{background:var(--surface);border:1px solid var(--border);border-radius:20px;padding:3.5rem;margin-top:3rem;position:relative;overflow:hidden;max-width:700px;margin-left:auto;margin-right:auto;}
.contact-card::before{content:'';position:absolute;top:-80px;left:50%;transform:translateX(-50%);width:320px;height:320px;background:radial-gradient(circle,rgba(255,120,0,.08),transparent 70%);pointer-events:none;}
.contact-tagline{color:var(--muted);font-size:.95rem;line-height:1.9;margin-bottom:2rem;}
.form-group{margin-bottom:1.1rem;text-align:left;}
.form-group label{display:block;font-size:.72rem;font-weight:500;color:var(--muted);margin-bottom:.4rem;letter-spacing:.8px;text-transform:uppercase;}
.form-group input,.form-group textarea{width:100%;background:rgba(255,140,0,.04);border:1px solid var(--border);border-radius:8px;padding:.8rem 1rem;color:var(--text);font-family:'DM Sans',sans-serif;font-size:.875rem;outline:none;transition:border-color .2s;resize:none;}
.form-group input:focus,.form-group textarea:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(255,140,0,.08);}
.form-group textarea{height:110px;}
.contact-info{display:flex;justify-content:center;gap:2rem;flex-wrap:wrap;margin-bottom:2rem;}
.contact-info-item{display:flex;align-items:center;gap:.5rem;font-size:.85rem;color:var(--muted);}
.contact-info-item span{color:var(--accent);font-family:'Fira Code',monospace;font-size:.8rem;}
</style>
@endpush

@section('content')

<section id="contact" class="contact-section">
  <div class="section-wrap">
    <p class="sec-label reveal">// get in touch</p>
    <h2 class="sec-title reveal">Let's Work Together</h2>

    <div class="contact-card reveal">
      <p class="contact-tagline">Have a project in mind or want to collaborate? I'd love to hear from you.</p>

      {{-- Contact Info --}}
      <div class="contact-info">
        <div class="contact-info-item">
          <span>📧</span> pakizajaved@email.com
        </div>
        <div class="contact-info-item">
          <span>📍</span> Pakistan
        </div>
        <div class="contact-info-item">
          <span>💼</span> Available for Freelance
        </div>
      </div>

      {{-- Contact Form --}}
      <form action="{{ route('contact.send') }}" method="POST" id="contact-form">
        @csrf

        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="e.g. Ahmed Khan" required value="{{ old('name') }}" />
          @error('name')<p style="color:#ff6a00;font-size:.75rem;margin-top:.3rem;">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" placeholder="you@example.com" required value="{{ old('email') }}" />
          @error('email')<p style="color:#ff6a00;font-size:.75rem;margin-top:.3rem;">{{ $message }}</p>@enderror
        </div>

        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" placeholder="Project Inquiry / Collaboration" value="{{ old('subject') }}" />
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Tell me about your project..." required>{{ old('message') }}</textarea>
          @error('message')<p style="color:#ff6a00;font-size:.75rem;margin-top:.3rem;">{{ $message }}</p>@enderror
        </div>

        {{-- Success Message --}}
        @if(session('success'))
        <div style="background:rgba(255,140,0,.1);border:1px solid rgba(255,140,0,.3);border-radius:8px;padding:1rem;margin-bottom:1rem;color:var(--accent3);font-size:.875rem;text-align:center;">
          ✅ {{ session('success') }}
        </div>
        @endif

        <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center;" id="send-btn">
          Send Message →
        </button>
      </form>

    </div>
  </div>
</section>

@endsection

@push('scripts')
<script>
// jQuery form submit animation
$(()=>{
  $('#contact-form').on('submit', function(){
    $('#send-btn').text('Sending... 🔥').css('opacity','.75');
  });
});
</script>
@endpush
