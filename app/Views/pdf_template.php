<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <h2>Data Pengguna</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= esc($user['nama']) ?></td>
                    <td><?= esc($user['telepon']) ?></td>
                    <td><?= esc($user['jurusan']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>