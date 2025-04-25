<!DOCTYPE html>
<html>

<head>
    <title>Data Users</title>
</head>

<body>
    <h2>Daftar Pengguna</h2>
    <a href="/users/export-excel">Export Excel</a> |
    <a href="/users/export-pdf">Export PDF</a><br><br>

    <table border="1" cellpadding="5">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Jurusan</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= esc($user['name']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['phone']) ?></td>
                <td><?= esc($user['major']) ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</body>

</html>