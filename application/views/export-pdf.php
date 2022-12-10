<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title;?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td, #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even){background-color: #f2f2f2;}

        #table tr:hover {background-color: #ddd;}

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #000000;
            color: white;
        }
    </style>
</head>
<body>
    <div style="text-align:center">
        <h3> Laporan Data Mahasiswa </h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th>Nama Kampus</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach ($mahasiswa as $mahasiswa) : ?>
                <tr>
                    <td><?=$no++;?></td>
                    <td><?=ucfirst($mahasiswa->nim)?></td>
                    <td><?=ucfirst($mahasiswa->nama)?></td>
                    <td><?=ucfirst($mahasiswa->email)?></td>
                    <td><?=ucfirst($mahasiswa->nama_kampus)?></td>
                    <td><?=ucfirst($mahasiswa->jurusan)?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>