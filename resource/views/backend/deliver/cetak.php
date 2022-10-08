	<html>

	<head>
		<title>Faktur Pembayaran</title>
		<style>
			#tabel {
				font-size: 15px;
				border-collapse: collapse;
			}

			#tabel td {
				padding-left: 5px;
				border: 1px solid black;
			}
		</style>
	</head>

	<body style='font-family:tahoma; font-size:8pt;'>
		<center>
			<table style='width:350px; font-size:16pt; font-family:calibri; border-collapse: collapse;' border='0'>
				<td width='70%' align='CENTER' vertical-align:top'><span style='color:black;'>
						<b>LAUNDRY STAR WASH</b></br>JL Ds.Kaligoro Dsn.Kaligro</span></br>


					<span style='font-size:12pt'>kode.<?= $data->kode ?> : ,<?= date("d-m-Y") ?> (user:<?= $data->nama_pemesan . ")," . date('h:i:s') ?>
					</span></br>
				</td>
			</table>
			<style>
				hr {
					display: block;
					margin-top: 0.5em;
					margin-bottom: 0.5em;
					margin-left: auto;
					margin-right: auto;
					border-style: inset;
					border-width: 1px;
				}
			</style>
			<table cellspacing='0' cellpadding='0' style='width:350px; font-size:12pt; font-family:calibri;  border-collapse: collapse;' border='0'>

				<tr align='center'>
					<td width='10%'>Item</td>
					<td width='13%'>Harga Layanan</td>
					<td width='4%'></td>
					<td width='7%'></td>
					<td width='13%'></td>
				<tr>
					<td colspan='5'>
						<hr>
					</td>
				</tr>
				</tr>
				<tr>
					<td style='vertical-align:top'><?= $data->nama ?></td>
					<td style='vertical-align:top; text-align:right; padding-right:10px'><?= "Rp." . number_format($data->harga) ?></td>
					<td style='vertical-align:top; text-align:right; padding-right:10px'></td>
					<td style='vertical-align:top; text-align:right; padding-right:10px'></td>
					<td style='text-align:right; vertical-align:top'></td>
				</tr>
				<tr>
					<td colspan='5'>
						<hr>
					</td>
				</tr>
				<tr>
					<td colspan='4'>
						<div style='text-align:right'>berat / jumlah : </div>
					</td>
					<td style='text-align:right; font-size:16pt;'><?= $data->jumlah_barang ?></td>
				</tr>
				<tr>
					<td colspan='4'>
						<div style='text-align:right; color:black'>Total yang harus di bayar : </div>
					</td>
					<td style='text-align:right; font-size:16pt; color:black'><?= "Rp." . number_format($data->total_harga) ?></td>
				</tr>
			</table>
			<table style='width:350; font-size:12pt;' cellspacing='2'>
				<tr></br>
					<td align='center'>****** TERIMAKASIH ******</br></td>
				</tr>
			</table>
		</center>

		<script>
			window.print()
		</script>
	</body>

	</html>