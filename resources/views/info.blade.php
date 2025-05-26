<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="LemonAid Study - Compete, learn, and win exciting rewards through academic challenges, workshops, and scholarships." />
    <meta name="keywords" content="student, competition, hackathon, workshop, scholarship, Malaysia, UMPSA, IMU, KLESF, MARA, JPA" />
    <meta name="author" content="LemonAid Study Team" />
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/info.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b1e4b09c02.js" crossorigin="anonymous"></script>
</head>
<body>

<header>
    <div id="navbar">
    <div class="a1"> 
        <a href="{{ route('dashboard') }}" class="button-link">LemonAid Study</a>
    </div>

    <div class="a2">
        <a href="{{ route('leaderboard') }}" class="button-link">Leaderboard |</a>
        <a href="{{ route('weekly.challenge') }}" class="button-link"> Weekly Challenge </a>
        <a href="{{ route('rewards') }}" class="button-link">| Rewards</a>
    </div>

    <div class="a3">
        <a href="{{ route('study.space') }}" class="button-link">LemonAid Study Space</a>
    </div>
    </div>
</header>

<section>
    <div id="Box1">
        <img src="{{ asset('images/Lemon.jpg') }}" alt="BG Image">
    </div>
    <div class="dim"></div>
    <div id="b1">
        <h1 class="line1">Do you have the juice?</h1>
        <h2 class="line2">Compete and create, GLHF!</h2>
    </div>
</section>

<div id="page-content">

<section class="competition">
    <div id="z1">
        <h1 class="line1">UMPSA Hackathon (2025)</h1>
        <h2 class="line2">
            Register now and stand a chance to win up<br>
            to RM1,500!<br>
            Deadline: 30th April 2025
        </h2>
        <div class="but1"><button>Register</button></div>
        <div class="but2"><button>More Information</button></div>
        <div id="UMPSA">
            <img src="{{ asset('images/Lemon.jpg') }}" alt="UMPSA">
        </div>
    </div>
    <div id="z2">
        <h1 class="line1">UM Technothon (2025)</h1>
        <h2 class="line2">
            Gain some experience while having the<br>
            chance to win up to RM2,000!<br>
            Deadline: 30th April 2025
        </h2>
        <div class="but1"><button>Register</button></div>
        <div class="but2"><button>More Information</button></div>
        <div id="UM">
            <img src="{{ asset('images/Lemon.jpg') }}" alt="UM">
        </div>
    </div>
    <div class="but3"><button>More Competition</button></div>
</section>

<section class="workshop">
    <div id="y1">
        <h1 class="line1">Student Exploratory<br>Workshop 2025 – IMU</h1>
        <h2 class="line2">
            Explore careers in medical and pharmaceutical<br>
            fields with hands-on sessions<br>
            Date: 30th April 2025
        </h2>
        <div class="but1"><button>More Information</button></div>
        <div id="IMU">
            <img src="{{ asset('images/Lemon.jpg') }}" alt="IMU">
        </div>
    </div>
    <div id="y2">
        <h1 class="line1">Kuala Lumpur Engineering<br>Science Fair (KLESF) 2025</h1>
        <h2 class="line2">
            Experience hands-on STEM activities!<br>
            Date: 5th May 2025
        </h2>
        <div class="but1"><button>More Information</button></div>
        <div id="KLESF">
            <img src="{{ asset('images/KLESF.jpg') }}" alt="KLESF">
        </div>
    </div>
    <div class="but3"><button>More Workshops & Educational Fairs</button></div>
</section>

<section class="scholarship">
    <div id="x1">
        <h1 class="line1">JPA Scholarship</h1>
        <h2 class="line2">
            Take your chance to obtain a full scholarship<br>
            to go overseas!<br>
            Deadline: 31st June 2025
        </h2>
        <div class="but1"><button>Apply</button></div>
        <div class="but2"><button>More Information</button></div>
        <div id="JPA">
            <img src="{{ asset('images/JPA.jpeg') }}" alt="JPA">
        </div>
    </div>
    <div id="x2">
        <h1 class="line1">MARA Scholarship</h1>
        <h2 class="line2">
            Don't miss your chance to get a full<br>
            scholarship for your pre-university and<br>
            Bachelors Degree!<br>
            Deadline: 31st June 2025
        </h2>
        <div class="but1"><button>Apply</button></div>
        <div class="but2"><button>More Information</button></div>
        <div id="MARA">
            <img src="{{ asset('images/MARA.png') }}" alt="MARA">
        </div>
    </div>
    <div class="but3"><button>More Scholarships</button></div>
</section>

</div>

<footer class="site-footer">
   <div class="footer-top">
      <div class="footer-brand">
       <h2>LemonAid Study</h2>
       <div class="social-icons">
           <a href="#"><i class="fa-brands fa-facebook"></i></a>
           <a href="#"><i class="fa-brands fa-linkedin"></i></a>
           <a href="#"><i class="fa-brands fa-youtube"></i></a>
           <a href="#"><i class="fa-brands fa-instagram"></i></a>
       </div>
       </div>
       <div class="footer-links">
          <div>
            <h4>Forum</h4>
            <a href="{{ route('discuss') }}" class="footer-button">Discussion Forum</a><br>
            <a href="{{ route('info') }}" class="footer-button">Information Forum</a><br>
          </div>
          <div>
            <h4>Study with Friends</h4>
            <a href="{{ route('study.space') }}" class="footer-button">Your Friends</a><br>
            <a href="#" class="footer-button">Public Space</a><br>
          </div>
          <div>
            <h4>Study Materials</h4>
            <a href="#" class="footer-button">Textbooks</a><br>
            <a href="{{ route('note') }}" class="footer-button">Chapter Notes</a><br>
            <a href="{{ route('quiz') }}" class="footer-button underline">Quiz</a><br>
          </div>
        </div>

       </div>
    </div>
</footer>

</body>
</html>
