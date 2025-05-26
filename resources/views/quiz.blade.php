<!DOCTYPE html>

<html>
<head>
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/quiz.css') }}">
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

  <div class="quiz">
    <img src="images/Flower.png" alt="Flower decoration" class="form-bg-image" />
    <h1>LemonAid Quiz</h1>
    <p>Mathematics Form 3 Chapter 9</p>
    <h2>Which of the following is the formula of a straight line?</h2>

    <form action="{{ route('quiz.submit') }}" method="POST" id="quiz-form">
        @csrf
        <input type="hidden" name="question_id" value="1">
        <button type="submit" class="answer-button" name="answer" value="y = ax^2 + bx + c">y = ax² + bx + c</button>
        <button type="submit" class="answer-button" name="answer" value="y = mx + c">y = mx + c</button>
        <button type="submit" class="answer-button" name="answer" value="m = y-intercept / x-intercept">m = y-intercept / x-intercept</button>
        <button type="submit" class="answer-button" name="answer" value="m = x-intercept / y-intercept">m = x-intercept / y-intercept</button>
        <button type="submit" class="answer-button" name="answer" value="m = (y2 - y1)/(x2 - x1)">m = (y₂ - y₁)/(x₂ - x₁)</button>
    </form>

    @if(session('message'))
        <div class="alert">
            {{ session('message') }}
        </div>
    @endif

    <p id="feedback"></p>
  </div>

  <script>
    const correctAnswer = "y = mx + c";
    const buttons = document.querySelectorAll('.answer-button');
    const feedback = document.getElementById('feedback');

    buttons.forEach(button => {
    button.addEventListener('click', (e) => {
        e.preventDefault();
        buttons.forEach(btn => btn.disabled = true);

        const selected = button.value;

        if (selected === correctAnswer) {
        button.classList.add('correct');
        feedback.textContent = '✅ Correct!';
        feedback.style.color = 'green';
        } else {
        button.classList.add('incorrect');
        feedback.textContent = `❌ Incorrect. The correct answer is: ${correctAnswer}`;
        feedback.style.color = 'red';
        }

        fetch("{{ route('quiz.submit') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            question_id: 1,
            answer: selected
        })
        })
        .then(response => response.json())
        .then(data => {
        console.log(data);
        if (data.current_points !== undefined) {
            feedback.textContent += ` 🎉 Points: ${data.current_points}`;
        }
        })
        .catch(error => {
        console.error('Error:', error);
        });
    });
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
