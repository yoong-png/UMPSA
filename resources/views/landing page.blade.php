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
      <img src="images/landingpg.png" alt="bg" class="bg" />
    </section>
  </main>
</body>
</html>