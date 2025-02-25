<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mabuhay - Sign Up</title>
    <style>
        :root {
            --primary-color: #151d3b;
            --button-color: #6ebf8b;
            --button-hover: #5da977;
            --bg-color: #d9d9d9;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: system-ui, -apple-system, sans-serif;
        }

        body {
            min-height: 100vh;
            background-color: #f0f0f0;
            background-image: url('img/cover.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;

        }

        .container {
            display: grid;
            min-height: 100vh;
            grid-template-columns: 1fr;
        }

        .left-side {
            display: none;
            background-image: url("cover2.png");
            background-size: cover;
            padding: 2rem;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .title {
            font-size: 4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #60a5fa, #c084fc, #f472b6);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);
        }

        .subtitle {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.8);
        }

        .form-side {
            background: var(--bg-color);
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-header {
            font-size: 2rem;
            font-weight: 900;
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 0 var(--button-color),
                -2px -2px 0 var(--button-color),
                2px -2px 0 var(--button-color),
                -2px 2px 0 var(--button-color);
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-row {
            display: grid;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-row-2 {
            grid-template-columns: 1fr 1fr;
        }

        .form-row-3 {
            grid-template-columns: 1fr 1fr 1fr;
        }

        .form-label {
            display: block;
            color: var(--primary-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            background: white;
            font-size: 1rem;
        }

        .form-input:focus,
        .form-select:focus {
            outline: 2px solid var(--button-color);
            outline-offset: -1px;
        }

        .signup-button {
            width: 100%;
            padding: 1rem;
            background: var(--button-color);
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            margin-bottom: 1rem;
            transition: background-color 0.2s;
        }

        .signup-button:hover {
            background: var(--button-hover);
        }

        .login-text {
            text-align: center;
            color: var(--primary-color);
        }

        @media (min-width: 768px) {
            .container {
                grid-template-columns: 1fr 1fr;
            }

            .left-side {
                display: flex;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side"></div>
        <div class="form-side">
            <h2 class="form-header">CREATE A NEW ACCOUNT</h2>
            <form method="post" action="register.php">
                <div class="form-row form-row-2">
                    <input type="text" name="fname" class="form-input" placeholder="First name" required>
                    <input type="text" name="lname" class="form-input" placeholder="Last name" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Birthday</label>
                    <div class="form-row form-row-3">
                        <select class="form-select" name="month" required>
                            <option value="">Month</option>
                            <?php for ($i = 1; $i <= 12; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select class="form-select" name="day" required>
                            <option value="">Day</option>
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <select class="form-select" name="year" required>
                            <option value="">Year</option>
                            <?php for ($i = 1900; $i <= date("Y"); $i++): ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>

                <div class="form-row form-row-2">
                    <select class="form-select" name="nationality" required>
                        <option value="">Nationality</option>
                        <option value="filipino">Filipino</option>
                        <option value="other">Other</option>
                    </select>
                    <select class="form-select" name="gender" required>
                        <option value="">Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-input" placeholder="New password" required>
                </div>

                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-input" placeholder="Confirm password"
                        required>
                </div>

                <button type="submit" name="signup" class="signup-button">Sign up</button>
            </form>
            <p class="login-text"> <a href="login.php">Already have an account?</a></p>
        </div>
    </div>
</body>

</html>
