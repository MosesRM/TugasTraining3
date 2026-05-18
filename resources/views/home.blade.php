<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- div bagian awal (2 master table) --}}
    <div>
        <table>
            <thead>
                <th>ID_siswa</th>
                <th>Nama_siswa</th>
            </thead>
        </table>
        <table>
            <thead>
                <th>ID_matkul</th>
                <th>Nama_matkul</th>
            </thead>
        </table>
    </div>

    {{-- div bagian kedua (intersection table) --}}
    <div>
        <table>
            <thead>
                <th>ID</th>
                <th>ID_siswa</th>
                <th>ID_matkul</th>
                <th>Semester</th>
            </thead>
        </table>
    </div>
</body>
</html>