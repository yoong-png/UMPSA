<!DOCTYPE html>

<header>
    <div id="navbar">
    <div class="a1"> 
      <a href="{{ route('dashboard') }}" class="button-link">LemonAid Study</a>

    <div class="a2">
        <a href="{{ route('leaderboard') }}">
          <button><span style="text-decoration: underline;">Leaderboard</span> |</button>
          </a>  
        <a href="{{ route('weekly.challenge') }}">
          <button>Weekly Challenge</button>
          </a>
        <a href="{{ route('rewards') }}">
          <button>Rewards</button>
          </a>

    </div>
    <div class="a3">
        <a href="{{ route('study.space') }}">
            <button>LemonAid Study Space</button>
            </a>
    </div>
    </div>
</header>


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