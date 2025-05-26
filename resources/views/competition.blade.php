<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/competition.css') }}">
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

    <section class="question">
      <img src="images/comphead.png" alt="comphead" class="comphead" />
      <img src="images/compbody.png" alt="compbody" class="compbody" />

      <form id="challengeForm">
          @csrf
          <input type="hidden" name="challenge_id" value="1" />
          <input type="text" name="answer" placeholder="Your answer" required />
          <button type="submit">Submit Answer</button>
      </form>
    </section>

    <a href="{{ route('previous.answers') }}" class="prev-answers-btn">Previous Answers</a>

    <div id="feedback" style="margin-top: 0px; color: green;"></div>

    <script>
      const form = document.getElementById('challengeForm');
      const feedback = document.getElementById('feedback');

      form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const answer = form.answer.value.trim();
        const challengeId = form.challenge_id.value;

        feedback.textContent = '';
        feedback.style.color = 'green';

        try {
          const response = await fetch('{{ route("challenge.complete") }}', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
              challenge_id: challengeId,
              answer: answer
            })
          });

          const data = await response.json();

          if (response.ok) {
            feedback.textContent = data.message;
            feedback.style.color = data.message.includes('Correct') ? 'green' : 'red';
            if (data.message.includes('Correct')) {
              form.answer.value = '';
            }
          } else {
            feedback.textContent = data.error || 'An error occurred.';
            feedback.style.color = 'red';
          }
        } catch (error) {
          feedback.textContent = 'Failed to submit answer. Please try again.';
          feedback.style.color = 'red';
          console.error(error);
        }
      });
    </script>

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

