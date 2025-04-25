<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <p><?= session()->getFlashdata('error') ?></p>
    <?php endif ?>
    <form method="post" action="/login/process">
        <label>Email</label><br>
        <input type="email" name="email"><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
</body>

</html>