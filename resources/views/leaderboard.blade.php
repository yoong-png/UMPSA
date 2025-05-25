<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaderboard.css') }}">
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
          <h1>Are you standing out?</h1>
          <p>Fight for glory. Earn your place.</p>

          <!-- Podium container for top 3 -->
          <div class="podium"></div>

          <div class="tabs">
              <button class="active">Group</button>
              <button>School</button>
              <button>Region</button>
          </div>

          <!-- Leaderboard container for ranks 4 and below -->
          <div class="leaderboard"></div>
      </section>
  </main>


    <img src="images/Hill.png" alt="Hill" class="form-bg-image" />



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
           <a href="{{ route('discuss') }}">
               <button>Discussion Forum</button>
           </a><br>
           <a href="{{ route('info') }}">
               <button>Information Forum</button>
           </a><br>
       </div>
       <div>
           <h4>Study with Friends</h4>
           <a href="{{ route('study.space') }}">
               <button>Your Friends</button>
           </a><br>
           <button>Public Space</button>
       </div>
       <div>
           <h4>Study materials</h4>
           <button>Textbooks</button><br>
           <a href="{{ route('note') }}">
               <button>Chapter Notes</button>
           </a><br>
           <a href="{{ route('quiz') }}">
               <button style="text-decoration: underline;">Quiz</button>
           </a><br>
       </div>
       </div>
    </div>
</footer>

<script>
  async function fetchLeaderboard() {
    try {
      const response = await fetch('/api/leaderboard');
      const users = await response.json();

      const podium = document.querySelector('.podium');
      const leaderboard = document.querySelector('.leaderboard');

      podium.innerHTML = '';
      leaderboard.innerHTML = '';

      if (!Array.isArray(users) || users.length === 0) {
        leaderboard.innerHTML = '<div class="rank">No leaderboard data found.</div>';
        return;
      }
      
      const positions = ['first', 'second', 'third'];
      users.sort((a, b) => b.points - a.points);
      users.forEach((user, index) => {
        user.rank = index + 1;
      });

      users.slice(0, 3).forEach((user, i) => {
        const entry = document.createElement('div');
        entry.classList.add('entry');
        if (positions[i]) entry.classList.add(positions[i]);
        entry.innerHTML = `
          <div class="position">${user.rank}</div>
          <div class="name">${user.name}</div>
          <div class="points">${user.points} pts</div>
        `;
        podium.appendChild(entry);
      });

      const currentUserEmail = "{{ Auth::check() ? Auth::user()->email : '' }}";

      users.slice(3).forEach((user) => {
        const div = document.createElement('div');
        div.className = 'rank';

        if (user.email === currentUserEmail) {
          div.classList.add('highlighted');
        }

        div.textContent = `${user.rank}. ${user.name} (${user.points} pts)`;
        leaderboard.appendChild(div);
      });

    } catch (error) {
      console.error('❌ Failed to fetch leaderboard:', error);
      const leaderboard = document.querySelector('.leaderboard');
      leaderboard.innerHTML = '<div class="rank">Error loading leaderboard.</div>';
    }
  }
  fetchLeaderboard();
</script>

</body>
</html>
