<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan ASMAMI</title>
    <style>
        p,
        span,
        table {
            font-size: 12px
        }

        table {
            width: 100%;
            border: 1px solid #dee2e6;
        }

        table#tb-item tr th,
        table#tb-item tr td {
            border: 1px solid #000;
        }
    </style>
</head>

<body>
    <div style="display: flex; gap: 2rem; width: 100%; margin: 0 auto; padding: 1rem 0;">
        <div style="text-align:center;">
            <h1 style="font-size:16px;font-weight: bold; line-height: 1.6rem;">ASOSIASI MAKANAN DAN MINUMAN <br> KOTA BONTANG</h1>
            <span style="padding: 0;">Jl. Di.panjaitan Gg. Piano 8 RT. 02 No. 09 </span>
            <br />
            <span style="padding: 0;">Telp: 08125808409</span>
        </div>
    </div>
    <hr />
    <h1 style="font-size:12px;text-align:center;font-weight: bold;padding: 1rem;">DATA ANGGOTA ASMAMI (ASOSIASI MAKANAN DAN MINUMAN)</h1>
    <p></p>
    <table id="tb-item" cellpadding="4">
        <tr style="background-color:#dddddd">
            <th width="6%" style="height: 20px; text-align:center"><strong>No</strong></th>
            <th width="20%" style="height: 20px;"><strong>Pemilik Usaha</strong></th>
            <th width="40%" style="height: 20px;"><strong>Alamat</strong></th>
            <th width="17%" style="height: 20px;"><strong>Nama Usaha</strong></th>
            <th width="17%" style="height: 20px;"><strong>Produk</strong></th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($laporan as $lap) : ?>
            <tr>
                <td style="height: 20px;text-align:center"><?= $no ?></td>
                <td style="height: 20px;"><?= ucwords($lap->pemilik_usaha); ?></td>
                <td style="height: 20px;"><?= ucwords($lap->alamat) ?>, <?= ucwords($lap->kelurahan) ?>, <?= ucwords($lap->kecamatan) ?>, Kota Bontang.</td>
                <td style="height: 20px;"><?= ucwords($lap->nama_usaha); ?></td>
                <td style="height: 20px;"><?= ucwords($lap->nama_produk); ?></td>
            </tr>
            <?php $no++; ?>
        <?php endforeach; ?>
    </table>
    <!-- <p>&nbsp;</p> -->
    <table cellpadding="4">
        <tr>
            <td width="65%" style="height: 20px;text-align:center">
                <p>&nbsp;</p>
            </td>
            <td style="height: 20px;text-align:left">
                <p>Bontang, <?= tanggal(); ?></p>
                <p>Ketua Organisasi ASMAMI,</p>
                <br>
                <br>
                <br>
                <br>
                <p style="text-decoration: underline;">Hairuddin Syah</p>
            </td>
        </tr>
    </table>
</body>

</html>
