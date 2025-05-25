<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/b1e4b09c02.js" crossorigin="anonymous"></script>
    <title>Signup</title>
</head>
 <meta name="csrf-token" content="{{ csrf_token() }}">

<header>
    <div id="navbar">
    <div class="a1">LemonAid Study</div>
    </div>
</header>

<body>
    <h1>Sign Up</h1>

    <form id="signupForm">
        <img src="{{ asset('images/Flower.png') }}" alt="Flower decoration" class="form-bg-image" />

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" required />
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required />
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required />

        </div>

        <div>
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required />
        </div>

        <a href="{{ route('login') }}" class="button-link">Submit</a>
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
    document.getElementById('signupForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const data = {
            name: document.getElementById('name').value.trim(),
            email: document.getElementById('email').value.trim(),
            password: document.getElementById('password').value,
            password_confirmation: document.getElementById('password_confirmation').value,
            _token: '{{ csrf_token() }}'
        };

        // Clear previous messages
        document.getElementById('responseMessage').textContent = '';
        document.getElementById('errorMessage').textContent = '';

        fetch('/api/signup', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': data._token
            },
            body: JSON.stringify(data)
        })
        .then(async (res) => {
            if (!res.ok) {
                // Try to parse validation errors
                const errData = await res.json();
                if (errData.errors) {
                    const errors = Object.values(errData.errors).flat();
                    throw new Error(errors.join(', '));
                } else if(errData.message) {
                    throw new Error(errData.message);
                } else {
                    throw new Error('Signup failed.');
                }
            }
            return res.json();
        })
        .then(response => {
            document.getElementById('responseMessage').textContent = response.message;
            // Optionally clear the form
            document.getElementById('signupForm').reset();
        })
        .catch(error => {
            document.getElementById('errorMessage').textContent = error.message;
        });
    });
    </script>
</body>
</html>