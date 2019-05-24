<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRUD Edit_Pelanggan</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>CRUD Edit_Pelanggan</h1>

	<div id="body">
		<table borders="1">
			<thead>
				<tr>
			<td>id_pelanggan</td>
			<td>nama</td>
			<td>username</td>
			<td>password</td>
			<td>email</td>
			<td>alamat</td>
			<td>no_telp</td>
			<td>jenis_kelamin</td></tr>
			</thead>
			<tbody>
					<?php
					$autonum=1;
					foreach ($data as $x):
					$id_pelanggan=$x['id_pelanggan'];
					$nama=$x['nama'];
					$username=$x['username'];
					$password=$x['password'];
					$email=$x['email'];
					$alamat=$x['alamat'];
					$no_telp=$x['no_telp'];
					$jenis_kelamin=$x['jenis_kelamin'];
			?>
			<tr>
				<td><?php echo $autonum;?></td>
				<td><?php echo $id_pelanggan;?></td>
				<td><?php echo $nama;?></td>
				<td><?php echo $username;?></td>
				<td><?php echo $password;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $alamat;?></td>
				<td><?php echo $no_telp;?></td>
				<td><?php echo $jenis_kelamin;?></td>
			</tr>
				<?php $autonum++; endforeach; ?>
			</tbody>
		</table>
		
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>