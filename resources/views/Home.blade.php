<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional Developer Portfolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-color: #000000;
            --accent-blue: #00d2ff;
            --text-white: #ffffff;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.08);
            --blue-glow: rgba(0, 210, 255, 0.3);
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-white);
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            position: relative;
        }

        /* Star Background Canvas */
        #starCanvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
        }

        /* Navbar Styling */
        .navbar {
            background: rgba(0, 0, 0, 0.8) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--glass-border);
            padding: 15px 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--text-white) !important;
            letter-spacing: 1px;
        }

        .navbar-brand span {
            color: var(--accent-blue);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.7) !important;
            font-weight: 500;
            transition: all 0.3s ease;
            margin: 0 10px;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--accent-blue) !important;
            text-shadow: 0 0 10px var(--blue-glow);
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding-top: 100px;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
        }

        .hero-text h1 span {
            color: var(--accent-blue);
            text-shadow: 0 0 20px var(--blue-glow);
        }

        .typing-wrapper {
            font-size: 1.8rem;
            color: #b0b0b0;
            margin-bottom: 25px;
        }

        #typing {
            color: var(--text-white);
            border-right: 2px solid var(--accent-blue);
            animation: blink 0.7s infinite;
        }

        .hero-img img {
            width: 100%;
            max-width: 380px;
            border-radius: 50%;
            border: 4px solid rgba(0, 210, 255, 0.5);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            background: rgba(255, 255, 255, 0.05);
        }

        /* Premium Buttons */
        .btn-custom {
            background: transparent;
            border: 2px solid var(--accent-blue);
            color: var(--text-white);
            padding: 10px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.4s ease;
            box-shadow: 0 0 15px rgba(0, 210, 255, 0.1);
        }

        .btn-custom:hover {
            background: var(--accent-blue);
            color: #000;
            box-shadow: 0 0 25px var(--accent-blue);
            transform: translateY(-3px);
        }

        /* Glassmorphism Cards */
        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 16px;
            padding: 30px;
            backdrop-filter: blur(12px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .glass-card:hover {
            transform: translateY(-5px);
            border-color: rgba(0, 210, 255, 0.4);
            box-shadow: 0 10px 30px rgba(0, 210, 255, 0.1);
        }

        /* Section Header */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 50%;
            height: 3px;
            background: var(--accent-blue);
            bottom: -10px;
            left: 0;
            box-shadow: 0 0 10px var(--accent-blue);
        }

        /* Skills Progress Bars */
        .skill-name {
            display: flex;
            justify-content: space-between;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .progress {
            background-color: rgba(255, 255, 255, 0.1);
            height: 8px;
            border-radius: 10px;
            overflow: visible;
            margin-bottom: 25px;
        }

        .progress-bar {
            background: linear-gradient(90deg, #0072ff, var(--accent-blue));
            box-shadow: 0 0 10px var(--accent-blue);
            border-radius: 10px;
            position: relative;
        }

        /* Forms input styling */
        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: var(--text-white);
            padding: 12px;
            border-radius: 8px;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--accent-blue);
            color: var(--text-white);
            box-shadow: 0 0 10px rgba(0, 210, 255, 0.2);
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--glass-border);
            padding: 40px 0;
            background: #050505;
            text-align: center;
        }

        .social-icons a {
            color: rgba(255, 255, 255, 0.7);
            font-size: 1.5rem;
            margin: 0 15px;
            transition: all 0.3s;
        }

        .social-icons a:hover {
            color: var(--accent-blue);
            text-shadow: 0 0 10px var(--accent-blue);
        }

        @keyframes blink {
            50% { border-color: transparent; }
        }
    </style>
</head>
<body>

    <canvas id="starCanvas"></canvas>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">PORT<span>FOLIO</span></a>
            <button class="navbar-dark navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Skills</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 hero-text">
                    <h1 class="text-uppercase tracking-wide mb-3" style="color: var(--accent-blue)">Welcome to my portfolio </h1>
                    <h3>Hi, I am </h3><h1><span>Pakiza Javed</span></h1>
                    <div class="typing-wrapper">
                        I am a <span id="typing"></span>
                    </div>
                    <p class="text-muted mb-4"> I create modern, responsive, and professional websites using HTML, CSS, Bootstrap, JavaScript, jQuery, PHP, and Laravel..</p>
                    <a href="#projects" class="btn btn-custom">view project <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="col-md-5 text-center mt-5 mt-md-0">
                    <div class="hero-img mx-auto">
                        <img src="{{ asset('images/profile.jpg') }}" alt="Profile Image">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5 my-5">
        <div class="container">
            <h2 class="section-title">About Me</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="glass-card h-100">
                        <h3 class="mb-3" style="color: var(--accent-blue)">My Journey</h3>
                        <p>Main ek passionate Full Stack Developer hoon jo completely responsive aur scalable web designings par kaam karti hai. MERN stack aur PHP/Laravel framework par meri strong grip hai jo complex loges ko simple code main change karne main help karti hai.</p>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="glass-card h-100">
                        <h3 class="mb-3" style="color: var(--accent-blue)">What I Do</h3>
                        <ul class="list-unstyled">
                            <li class="mb-2"><i class="fas fa-check text-info me-2"></i> Frontend Development (HTML, CSS, JS, React)</li>
                            <li class="mb-2"><i class="fas fa-check text-info me-2"></i> Backend Architectures (Node.js, Express, PHP, Laravel)</li>
                            <li class="mb-2"><i class="fas fa-check text-info me-2"></i> Database Management (MongoDB, MySQL)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" class="py-5 my-5">
        <div class="container">
            <h2 class="section-title">Technical Skills</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="glass-card mb-4">
                        <div class="skill-name"><span>HTML5 / CSS3 / Tailwind</span><span>95%</span></div>
                        <div class="progress"><div class="progress-bar" style="width: 95%"></div></div>

                        <div class="skill-name"><span>JavaScript / jQuery</span><span>88%</span></div>
                        <div class="progress"><div class="progress-bar" style="width: 88%"></div></div>

                        <div class="skill-name"><span>React.js (MERN)</span><span>85%</span></div>
                        <div class="progress"><div class="progress-bar" style="width: 85%"></div></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="glass-card mb-4">
                        <div class="skill-name"><span>PHP / Laravel Framework</span><span>90%</span></div>
                        <div class="progress"><div class="progress-bar" style="width: 90%"></div></div>

                        <div class="skill-name"><span>Node.js & Express</span><span>80%</span></div>
                         
                        <div class="progress"><div class="progress-bar" style="width: 80%"></div></div>

                        <div class="skill-name"><span>MySQL / MongoDB</span><span>85%</span></div>
                        <div class="progress"><div class="progress-bar" style="width: 85%"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="projects" class="py-5 my-5">
        <div class="container">
            <h2 class="section-title">Featured Projects</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="glass-card">
                        <div class="mb-3 text-info fs-1"><i class="fab fa-react"></i></div>
                        <h4>E-Commerce Platform</h4>
                        <p class="text-muted">MERN Stack app with complete dashboard controls, payment gate integration, and live state handling.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="glass-card">
                        <div class="mb-3 text-info fs-1"><i class="fab fa-laravel"></i></div>
                        <h4>Advanced CRUD Portal</h4>
                        <p class="text-muted">A standard corporate layout management system developed with Laravel framework using secure auth routing.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="glass-card">
                        <div class="mb-3 text-info fs-1"><i class="fas fa-layer-group"></i></div>
                        <h4>Interactive UI Panel</h4>
                        <p class="text-muted">A dynamic front-end system compiled with high fidelity Tailwind configs and smooth jQuery interfaces.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-5 my-5">
        <div class="container">
            <h2 class="section-title">Get In Touch</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="glass-card">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Your Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Your Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-custom w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="social-icons mb-3">
                <a href="#"><i class="fab fa-github"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="#"><i class="fab fa-facebook"></i></a>
            </div>
            <p class="text-muted mb-0">&copy; 2026 Pakiza Javed | MERN & Laravel Developer Portfolio</p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // 1. Dynamic Typing Effect
        const words = ["Frontend Developer.", "Laravel Expert.", "UI/UX Designer."];
        let i = 0, timer;

        function typingEffect() {
            let word = words[i].split("");
            var loopTyping = function() {
                if (word.length > 0) {
                    document.getElementById('typing').innerHTML += word.shift();
                } else {
                    setTimeout(deletingEffect, 2000);
                    return false;
                }
                timer = setTimeout(loopTyping, 100);
            };
            loopTyping();
        }

        function deletingEffect() {
            let word = words[i].split("");
            var loopDeleting = function() {
                if (word.length > 0) {
                    word.pop();
                    document.getElementById('typing').innerHTML = word.join("");
                } else {
                    if (words.length > (i + 1)) { i++; } else { i = 0; }
                    setTimeout(typingEffect, 500);
                    return false;
                }
                timer = setTimeout(loopDeleting, 60);
            };
            loopDeleting();
        }
        typingEffect();

        // 2. Interactive Star Background
        const canvas = document.getElementById('starCanvas');
        const ctx = canvas.getContext('2d');
        let stars = [];

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            initStars();
        }

        function initStars() {
            stars = [];
            let count = Math.floor((canvas.width * canvas.height) / 600);
            for(let i=0; i<count; i++) {
                stars.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * canvas.height,
                    radius: Math.random() * 1.5,
                    vx: (Math.random() - 0.5) * 0.2,
                    vy: (Math.random() - 0.5) * 0.2
                });
            }
        }

        function drawStars() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = '#ffffff';
            stars.forEach(star => {
                ctx.beginPath();
                ctx.arc(star.x, star.y, star.radius, 0, Math.PI * 2);
                ctx.fill();
                
                star.x += star.vx;
                star.y += star.vy;

                if(star.x < 0 || star.x > canvas.width) star.vx = -star.vx;
                if(star.y < 0 || star.y > canvas.height) star.vy = -star.vy;
            });
            requestAnimationFrame(drawStars);
        }

        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();
        drawStars();

        // 3. Smooth Navigation Scroll
        $(document).ready(function() {
            $('.nav-link').on('click', function(event) {
                if (this.hash !== "") {
                    event.preventDefault();
                    var hash = this.hash;
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top - 80
                    }, 800);
                }
            });
        });
    </script>
</body>
</html>