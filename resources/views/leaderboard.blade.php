<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
        <a href="{{ route('weekly.challenge') }}" class="button-link">Weekly Challenge</a>
        <a href="{{ route('rewards') }}" class="button-link">| Rewards</a>
      </div>
      <div class="a3">
        <a href="{{ route('study.space') }}" class="button-link">LemonAid Study Space</a>
      </div>
    </div>
  </header>

  <main>
    @if (session('success') || session('error'))
      <div class="alert-popup {{ session('success') ? 'success' : 'error' }}">
          {{ session('success') ?? session('error') }}
      </div>
    @endif

    <section class="hero">
      <h1>Are you standing out?</h1>
      <p>Fight for glory. Earn your place.</p>

      @if(Auth::check() && Auth::user()->group_id === null)
        <section class="group-banner">
          <p>You’re not in a group yet. Team up with two friends and start competing!</p>
          <button onclick="document.getElementById('createGroupModal').style.display='block'" class="group-btn">
            ➕ Create a Group
          </button>

          <div id="createGroupModal" class="group-modal">
            <div class="group-modal-content">
              <span onclick="document.getElementById('createGroupModal').style.display='none'" class="group-close">&times;</span>
              <form method="POST" action="{{ route('groups.create') }}">
                @csrf
                <h3>Create Your Group</h3>
                <p>Invite two friends by their login email addresses</p>

                <label for="friend1_email">Friend 1 Email:</label><br>
                <input type="email" name="friend1_email" required><br><br>

                <label for="friend2_email">Friend 2 Email:</label><br>
                <input type="email" name="friend2_email" required><br><br>

                <button type="submit">Submit</button>
              </form>
            </div>
          </div>
        </section>
      @endif


      <div class="tabs">
        <button class="active" onclick="switchLeaderboard(this, 'individual')">All Users</button>
        <button onclick="switchLeaderboard(this, 'group')">Groups</button>
        <button> Schools</button>
      </div>


      <div class="podium"></div>
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

  <script>
    const currentUserEmail = "{{ Auth::check() ? Auth::user()->email : '' }}";
    const currentUserGroup = "{{ Auth::check() ? Auth::user()->group_id : '' }}";


    function switchLeaderboard(button, mode) {
      document.querySelectorAll('.tabs button').forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');

      if (mode === 'individual') {
        fetchUserLeaderboard();
      } else if (mode === 'group') {
        fetchGroupLeaderboard();
      }
    }

    async function fetchUserLeaderboard() {
      try {
        const response = await fetch('/api/leaderboard');
        const users = await response.json();
        renderLeaderboard(users, true);
      } catch (error) {
        showError();
      }
    }

    async function fetchGroupLeaderboard() {
      try {
        const response = await fetch('/api/leaderboard-groups');
        const groups = await response.json();
        renderLeaderboard(groups, false);
      } catch (error) {
        showError();
      }
    }

    function renderLeaderboard(data, isIndividual) {
      const podium = document.querySelector('.podium');
      const leaderboard = document.querySelector('.leaderboard');
      podium.innerHTML = '';
      leaderboard.innerHTML = '';

      if (!Array.isArray(data) || data.length === 0) {
        leaderboard.innerHTML = '<div class="rank">No leaderboard data found.</div>';
        return;
      }

      const positions = ['first', 'second', 'third'];

      data.forEach((item, index) => {
        item.rank = index + 1;
      });

      data.slice(0, 3).forEach((entry, i) => {
        const div = document.createElement('div');
        div.className = 'entry ' + positions[i];
        div.innerHTML = `
          <div class="position">${entry.rank}</div>
          <div class="name">${isIndividual ? entry.name : 'Group ' + entry.group_id}</div>
          <div class="points">${entry.points} pts</div>
        `;
        podium.appendChild(div);
      });

      data.slice(3).forEach(entry => {
        const div = document.createElement('div');
        div.className = 'rank';

        if (
          (isIndividual && entry.email === currentUserEmail) ||
          (!isIndividual && entry.group_id == currentUserGroup)
        ) {
          div.classList.add('highlighted');
        }

        div.textContent = isIndividual
          ? `${entry.rank}. ${entry.name} (${entry.points} pts)`
          : `${entry.rank}. Group ${entry.group_id} (${entry.points} pts)`;

        leaderboard.appendChild(div);
      });

    }

    function showError() {
      const leaderboard = document.querySelector('.leaderboard');
      leaderboard.innerHTML = '<div class="rank">Error loading leaderboard.</div>';
    }
    fetchUserLeaderboard();
  </script>

</body>
</html>
