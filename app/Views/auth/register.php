<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
</head>

<body>
    <h2>Register</h2>
    <?php if (session()->getFlashdata('errors')): ?>
        <ul>
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach ?>
        </ul>
    <?php endif; ?>
    <form method="post" action="/register/save">
        <label>Nama</label><br>
        <input type="text" name="name" value="<?= old('name') ?>"><br>
        <label>Email</label><br>
        <input type="email" name="email" value="<?= old('email') ?>"><br>
        <label>Password</label><br>
        <input type="password" name="password"><br><br>
        <label>Nomor Telepon</label><br>
        <input type="text" name="phone" value="<?= old('phone') ?>"><br>
        <label>Jurusan</label><br>
        <input type="text" name="major" value="<?= old('major') ?>"><br>
        <button type="submit">Register</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
</body>

</html>