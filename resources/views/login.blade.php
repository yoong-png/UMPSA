<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://kit.fontawesome.com/b1e4b09c02.js" crossorigin="anonymous"></script>
    <title>Signup</title>
</head>

<header>
    <div id="navbar">
    <div class="a1">LemonAid Study</div>
    </div>
</header>

<body>
    <h1>Login</h1>

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <img src="images/Flower.png" alt="Flower decoration" class="form-bg-image" />
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required />
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required />
        </div>

        <button type="submit">Login</button>

        <div id="register">
            <h2>No account yet?</h2>
            <a href="{{ route('signup') }}" class="button-link">Sign Up</a>
        </div>
    </form>


    <div
        id="responseMessage"
        style="margin:20px auto 0; color:green; text-align:center; width:fit-content;"
    ></div>
    <div
        id="errorMessage"
        style="margin:20px auto 0; color:red; text-align:center; width:fit-content;"
    ></div>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();

    const data = {
        email: document.getElementById('email').value.trim(),
        password: document.getElementById('password').value,
        _token: '{{ csrf_token() }}'
    };

    document.getElementById('responseMessage').textContent = '';
    document.getElementById('errorMessage').textContent = '';

    fetch('/login', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': data._token
    },
    credentials: 'same-origin', 
    body: JSON.stringify(data),
    })

    .then(async (res) => {
        if (!res.ok) {
            const errData = await res.json();
            throw new Error(errData.message || 'Login failed');
        }
        return res.json();
    })
    .then(response => {
        document.getElementById('responseMessage').textContent = response.message;

        if (response.redirect_url) {
            window.location.href = response.redirect_url;
        }
    })

    .catch(error => {
        document.getElementById('errorMessage').textContent = error.message;
    });
});
    </script>
</body>
</html>
