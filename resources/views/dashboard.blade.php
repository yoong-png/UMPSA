<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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

    <main>
        <section class="hero">
          <h1>Ready, set, go!</h1>
          <p>Join a study group, tackle learning challenges, and compete with your peers.</p>
          <p>Be part of an engaging community that prioritizes fun and learning.</p>

          <div class="points-container">
            <img src="images/lemonaidpointcounter.png" alt="points" class="form-bg-image" />
            <div class="points-text">{{ $user->points }}</div>

          </div>
        </section>

        <section class="resources">
            <div class="grid">
                <div class="card">Textbook</div>
                  <a href="{{ route('note') }}">
                    <div class="card">Chapter Notes</div>
                    </a>
                <div class="card">Past Year Paper</div>
                <div class="card">Video Explanation</div>
                <div class="card">Flashcard</div>
                  <a href="{{ route('quiz') }}">
                    <div class="card">Quiz</div>
                    </a>
            </div>
        </section>
        
        <section class="section-center">
          <img src="images/Flower.png" alt="Flower decoration" class="flower" />
          <img src="images/lemonaidstand.png" alt="stand" class="stand" />
          <h2>{{ $user->name }}</h2>
          <p>Group: {{ $user->group_id }}</p>
          <p>Group Points: {{ $groupPoints }}</p>


        </section>

        <section class="social">
          <img src="images/friendslemonaid.png" alt="friends" class="friends" />
        </section>
    </main>

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

        <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" class="logoutbtn">Log Out</button>
      </form>
       </div>
    </div>
</footer>
</body>
</html>
