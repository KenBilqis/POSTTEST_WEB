<?php
session_start();

// Jika user sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    header('Location: dashboard.php');
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validasi sederhana (bisa diganti dengan database)
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Username atau password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - BookRating</title>
    <link rel="stylesheet" href="./CSS/style.css" />
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: var(--white);
        }
        .form-container {
            background: var(--white);
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            border: 1px solid var(--light-gray);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--primary-blue);
        }
        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--light-gray);
            border-radius: 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }
        .btn {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--accent-blue);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        .btn:hover {
            background-color: var(--secondary-blue);
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 1rem;
        }
        .form-footer {
            text-align: center;
            margin-top: 1.25rem;
            font-size: 0.95rem;
        }
        .form-footer a {
            color: var(--accent-blue);
        }
        .form-footer a:hover {
            color: var(--secondary-blue);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Login ke BookRating</h2>
        <?php if ($error): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required />
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="form-footer">
            Belum punya akun? <a href="./register.php">Daftar di sini</a>
        </div>
    </div>
</body>
</html>