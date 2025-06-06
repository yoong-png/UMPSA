<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LemonAid Study</title>
        <link rel="stylesheet" href="{{ asset('css/main.css') }}">
        <link rel="stylesheet" href="{{ asset('css/rewards.css') }}">
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
        <div class="head-wrapper">
            <img src="images/rewardshead.png" alt="head" class="head" />
            <a href="#popup" class="buy-btn">BUY FOR 330 POINTS</a>
        </div>
        <img src="images/rewardsbody.png" alt="body" class="body" />
    </section>

    <!-- Popup HTML -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Exchange Successful!</p>
            <a href="#" class="close-btn">OK</a>
        </div>
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