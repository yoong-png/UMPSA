<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>LemonAid Study Space</title>
  <link rel="stylesheet" href="/css/studyspace.css">
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/b1e4b09c02.js" crossorigin="anonymous"></script>
</head>

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

<body>

<div class="vc-container">

  <div class="vc-top">
    <div class="lemonade-stand">
      <div class="vc-box">QY</div>
    </div>
    <div class="lemonade-stand">
      <div class="vc-box">JADE</div>
    </div>
    <div class="lemonade-stand">
      <div class="vc-box">User 3</div>
    </div>
    <div class="lemonade-stand">
      <div class="vc-box">User 4</div>
    </div>
  </div>

  <div class="vc-center">
  </div>

  <div class="vc-bottom">
    <div class="vc-box user-box">You </div>
    <div class="drink-overlay"></div>
  </div>

  <div class="vc-controls">

    <form method="POST" action="/vc-room/leave" style="display:inline;">
      <a href="/dashboard" class="leavebutton">Leave VC</a>
    </form>

    <form method="POST" action="/studyspace" style="display:inline; margin-left: 10px;">
      <input type="email" name="email" placeholder="Invite email" required />
      <button type="submit">Invite</button>
    </form>

  </div>
  <div class="alert success" style="display:none;">Success message</div>
  <div class="alert error" style="display:none;">Error message</div>

</div>

</body>
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
</html>
