<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pakiza Javed | Frontend Developer</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700;800&family=DM+Sans:wght@300;400;500;600&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<style>
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box;}
:root{--bg:#080400;--surface:rgba(255,140,0,0.05);--border:rgba(255,140,0,0.12);--accent:#ff8c00;--accent2:#ff6a00;--accent3:#ffb347;--glow:rgba(255,120,0,0.25);--text:#fff4e6;--muted:#7a5c3a;}
html{scroll-behavior:smooth;}
body{font-family:'DM Sans',sans-serif;background:var(--bg);color:var(--text);min-height:100vh;overflow-x:hidden;cursor:none;}
#stars-canvas{position:fixed;inset:0;z-index:0;pointer-events:none;}
#cur{position:fixed;width:9px;height:9px;background:var(--accent);border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%);box-shadow:0 0 10px var(--accent);transition:width .25s,height .25s;}
#cur-ring{position:fixed;width:36px;height:36px;border:1px solid rgba(255,140,0,.4);border-radius:50%;pointer-events:none;z-index:9998;transform:translate(-50%,-50%);}
nav{position:fixed;top:0;width:100%;z-index:100;display:flex;justify-content:space-between;align-items:center;padding:1.2rem 6%;backdrop-filter:blur(18px);background:rgba(8,4,0,0.7);border-bottom:1px solid var(--border);transition:background .3s;}
.logo{font-family:'Fira Code',monospace;font-size:1rem;color:var(--accent);}
.logo em{color:var(--accent3);font-style:normal;}
nav ul{list-style:none;display:flex;gap:2rem;}
nav a{text-decoration:none;color:var(--muted);font-size:.8rem;font-weight:500;letter-spacing:1px;text-transform:uppercase;transition:color .2s;}
nav a:hover{color:var(--accent);}
.section-wrap{position:relative;z-index:1;padding:7rem 6%;max-width:1100px;margin:0 auto;}
.sec-label{font-family:'Fira Code',monospace;font-size:.7rem;letter-spacing:3px;text-transform:uppercase;color:var(--accent);margin-bottom:.8rem;}
.sec-title{font-family:'Playfair Display',serif;font-size:clamp(1.8rem,3.5vw,2.8rem);font-weight:700;letter-spacing:-1px;line-height:1.15;margin-bottom:1rem;}
.tag{font-family:'Fira Code',monospace;font-size:.67rem;padding:.22rem .6rem;border-radius:4px;}
.tag-orange{background:rgba(255,140,0,.1);color:var(--accent);border:1px solid rgba(255,140,0,.25);}
.tag-amber{background:rgba(255,179,71,.1);color:var(--accent3);border:1px solid rgba(255,179,71,.25);}
.tag-red{background:rgba(255,80,0,.1);color:#ff6a00;border:1px solid rgba(255,80,0,.2);}
.btn{display:inline-flex;align-items:center;gap:.5rem;padding:.8rem 1.8rem;border-radius:8px;font-size:.875rem;font-weight:600;text-decoration:none;cursor:none;border:none;transition:transform .2s,box-shadow .2s;}
.btn:hover{transform:translateY(-3px);}
.btn-primary{background:linear-gradient(135deg,var(--accent2),var(--accent3));color:#080400;box-shadow:0 0 24px rgba(255,120,0,.3);}
.btn-primary:hover{box-shadow:0 0 40px rgba(255,120,0,.55);}
.btn-ghost{background:transparent;color:var(--text);border:1px solid var(--border);}
.btn-ghost:hover{border-color:var(--accent);color:var(--accent);}
@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
@keyframes fadeDown{from{opacity:0;transform:translateY(-12px)}to{opacity:1;transform:translateY(0)}}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.25}}
@keyframes dotSlide{0%{top:-12px;opacity:0}15%{opacity:1}85%{opacity:1}100%{top:100%;opacity:0}}
@keyframes roll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
@keyframes bgDotFall{0%{transform:translateY(-60px);opacity:0}10%{opacity:1}90%{opacity:1}100%{transform:translateY(110vh);opacity:0}}
.reveal{opacity:0;transform:translateY(28px);transition:opacity .7s ease,transform .7s ease;}
.reveal.in{opacity:1;transform:translateY(0);}
.bg-dot{position:fixed;border-radius:50%;pointer-events:none;z-index:0;animation:bgDotFall linear infinite;}
footer{text-align:center;padding:2rem;border-top:1px solid var(--border);color:var(--muted);font-size:.78rem;position:relative;z-index:1;}
footer span{color:var(--accent);}
@media(max-width:768px){nav ul{display:none;}}
</style>
@stack('styles')
</head>
<body>

<canvas id="stars-canvas"></canvas>
<div id="cur"></div>
<div id="cur-ring"></div>

<nav id="navbar">
  <div class="logo"><em>&lt;</em>PakizaJaved<em>/&gt;</em></div>
  <ul>
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('/skills') }}">Skills</a></li>
    <li><a href="{{ url('/projects') }}">Projects</a></li>
    <li><a href="{{ url('/contact') }}">Contact</a></li>
  </ul>
</nav>

@yield('content')

<footer>
  <p>Designed & Built with &#9825; by <span>Pakiza Javed</span> &mdash; &copy; {{ date('Y') }}. All rights reserved.</p>
</footer>

<script>
const canvas=document.getElementById('stars-canvas'),ctx=canvas.getContext('2d');
let W,H,stars=[],shoots=[];
function resize(){W=canvas.width=innerWidth;H=canvas.height=innerHeight;}
function mkStars(){stars=Array.from({length:280},()=>({x:Math.random()*W,y:Math.random()*H,r:Math.random()*1.5+.2,tw:Math.random()*Math.PI*2,sp:Math.random()*.005+.001,warm:Math.random()}));}
function addShoot(){shoots.push({x:Math.random()*W*.6,y:Math.random()*H*.35,len:Math.random()*140+80,spd:Math.random()*10+5,angle:Math.PI/4+(Math.random()-.5)*.4,op:1});}
function draw(){
  ctx.clearRect(0,0,W,H);
  [[W*.1,H*.15,W*.5,'rgba(255,100,0,.09)'],[W*.85,H*.6,W*.45,'rgba(255,60,0,.06)'],[W*.5,H*.9,W*.4,'rgba(255,140,0,.05)'],[W*.3,H*.45,W*.35,'rgba(200,60,0,.04)']].forEach(([gx,gy,gr,c])=>{const g=ctx.createRadialGradient(gx,gy,0,gx,gy,gr);g.addColorStop(0,c);g.addColorStop(1,'transparent');ctx.fillStyle=g;ctx.fillRect(0,0,W,H);});
  stars.forEach(s=>{s.tw+=s.sp;const a=.3+.7*Math.abs(Math.sin(s.tw));let r,g,b;if(s.warm>.7){r=255;g=Math.floor(80+s.warm*60);b=0;}else if(s.warm>.4){r=255;g=Math.floor(160+s.warm*40);b=50;}else{r=255;g=230;b=200;}ctx.beginPath();ctx.arc(s.x,s.y,s.r,0,Math.PI*2);ctx.fillStyle=`rgba(${r},${g},${b},${a})`;ctx.fill();if(s.r>1.1){ctx.beginPath();ctx.arc(s.x,s.y,s.r*2.5,0,Math.PI*2);ctx.fillStyle=`rgba(${r},${g},${b},${a*.12})`;ctx.fill();}});
  shoots=shoots.filter(s=>s.op>0);
  shoots.forEach(s=>{const tx=s.x-Math.cos(s.angle)*s.len,ty=s.y-Math.sin(s.angle)*s.len;const g=ctx.createLinearGradient(tx,ty,s.x,s.y);g.addColorStop(0,'rgba(255,100,0,0)');g.addColorStop(.7,`rgba(255,160,50,${s.op*.6})`);g.addColorStop(1,`rgba(255,220,150,${s.op})`);ctx.beginPath();ctx.moveTo(tx,ty);ctx.lineTo(s.x,s.y);ctx.strokeStyle=g;ctx.lineWidth=1.8;ctx.stroke();s.x+=Math.cos(s.angle)*s.spd;s.y+=Math.sin(s.angle)*s.spd;s.op-=.016;});
  requestAnimationFrame(draw);
}
resize();mkStars();draw();
addEventListener('resize',()=>{resize();mkStars();});
setInterval(addShoot,3000);
const cur=document.getElementById('cur'),ring=document.getElementById('cur-ring');
let mx=0,my=0,rx=0,ry=0;
addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;});
(function loop(){cur.style.left=mx+'px';cur.style.top=my+'px';rx+=(mx-rx)*.13;ry+=(my-ry)*.13;ring.style.left=rx+'px';ring.style.top=ry+'px';requestAnimationFrame(loop);})();
document.querySelectorAll('a,button,.proj-card,.stat-card').forEach(el=>{el.addEventListener('mouseenter',()=>{cur.style.width='14px';cur.style.height='14px';});el.addEventListener('mouseleave',()=>{cur.style.width='9px';cur.style.height='9px';});});
(function(){const colors=['rgba(255,140,0,','rgba(255,100,0,','rgba(255,180,50,','rgba(255,60,0,'];function makeDot(){const dot=document.createElement('div');dot.className='bg-dot';const size=Math.random()*7+3,col=colors[Math.floor(Math.random()*colors.length)],alpha=(Math.random()*0.5+0.3).toFixed(2),left=Math.random()*100,dur=Math.random()*8+5,delay=Math.random()*8,glow=size*2.5;dot.style.cssText=`width:${size}px;height:${size}px;left:${left}vw;top:0;background:${col}${alpha});box-shadow:0 0 ${glow}px ${glow/2}px ${col}0.35),0 0 ${glow*2}px ${col}0.15);animation-duration:${dur}s;animation-delay:${delay}s;`;document.body.appendChild(dot);setTimeout(()=>{dot.remove();makeDot();},(dur+delay)*1000+200);}for(let i=0;i<28;i++)makeDot();})();
const obs=new IntersectionObserver(entries=>{entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');e.target.querySelectorAll('.bar').forEach(b=>{b.style.width=b.dataset.w+'%';});}});},{threshold:.12});
document.querySelectorAll('.reveal').forEach(el=>obs.observe(el));
$(()=>{$(window).on('scroll',function(){$('#navbar').css('background',$(this).scrollTop()>60?'rgba(8,4,0,.95)':'rgba(8,4,0,.7)');});});
</script>
@stack('scripts')
</body>
</html>