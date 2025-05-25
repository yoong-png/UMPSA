<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LemonAid Study</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/landingpage.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b1e4b09c02.js" crossorigin="anonymous"></script>
</head>
<body>
  <main>
    <section class="hero">
      <img src="images/logo.png" alt="points" class="form-bg-image" />
      <p>To Aid your Ace.</p>
      <a href="{{ route('login') }}" class="button-link">Sign Up / Log In</a>
    </section>
    <section class="features">
      <div class="feature1">
        <h2>Free, Fun, Truly Effective</h2>
        <p>Explore a new way to learn that feels less like a chore and more like a game. With interactive content, weekly challenges, and team-based activities, stay engaged while gaining knowledge—all completely free.</p>
        <img src="images/Flower.png" alt="points" class="oneflower" />
      </div>
      <div class="feature2">
        <h2>Collaborate, Compete, Claim Rewards</h2>
        <p>Form teams to participate in weekly competitions. Earn points through quizzes, forum discussions, and challenges. With those points, redeem vouchers from affiliated outlets, or even your school canteen; as well as special courses and limited-edition items.</p>
        <img src="images/Flower.png" alt="points" class="twoflower" />
        <img src="images/Flower.png" alt="points" class="threeflower" />
      </div>
      <div class="feature3">
        <h2>Stay Motivated. Stay Sharp.</h2>
        <p>Learning is easier when you’re working toward something. With a new challenge every week, monthly rankings, and real rewards for both you and your friends, you’ll always come back to give it your best.</p>
        <img src="images/lemonaidstandwithdrinks.png" alt="points" class="standwithdrinks" />
      </div>
    </section>
    <section class="study-with">
      <h2>Study with...</h2>
      <div class="images">
        <div class="image-container">
          <img src="images/lofifriends.png" alt="friends" class="friends" />
          <p class="caption">Friends</p>
        </div>
        <div class="image-container">
          <img src="images/lofisolo.png" alt="solo" class="solo" />
          <p class="caption">Myself</p>
        </div>
      </div>
    </section>
    <section class="testimonials">
      <h2>Give your ambition an outlet.</h2>
      <div class="testimonial">
        <img src="images/testimonial.png" alt="testimonial" class="testimoniall" />
        <img src="images/1.png" alt="1" class="one" />
        <img src="images/2.png" alt="2" class="two" />
        <img src="images/3.png" alt="3" class="three" />
        <img src="images/4.png" alt="4" class="four" />
      </div>
    </section>
  </main>
</body>
</html>