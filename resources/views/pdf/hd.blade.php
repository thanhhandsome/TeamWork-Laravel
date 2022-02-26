<!DOCTYPE html>
<html>
	<head lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>A simple, clean, and responsive HTML invoice template</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: "Dejavu Sans";
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 2px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #555;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family:"Dejavu Sans" ;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
    <div>
    </div>
	<div class="invoice-box">
		<div class="col-xs-12">
			<h1 style="color: red"><center>Hóa đơn điện tử</center></h1>
		</div>
      
      @foreach ($dh2 as $d )

			<table cellpadding="0" cellspacing="0">
				<tr  class="top" style="" >
					<td colspan="2">
						<table>
							<tr>
								

								<td>
									<h2 style="color:orangered">Công ty TNHH:E-PIE</h2><h3> Mã hóa đơn: {{ $d->madh }}</h3><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td style=" font-size: 20px">
									Họ và tên : {{ $d->tenkh }}<br />
									Địa chỉ : {{ $d->diachi }}<br />
									Số điện thoại : {{ $d->sodienthoai }}
								</td>

								<td>
								<br />
									<br />
								
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Phương thức thanh toán</td>

					<td></td>
          <td></td>
				</tr>

				<tr class="details">
					<td>Trả tiền mặt</td>

					{{-- <td>1000</td> --}}
				</tr>

				<tr class="heading">
					<td>Sản phẩm</td>
          <td >SL</td>
					<td>Giá</td>
				</tr>

				<tr class="item">
					<td >{{ $d->tensp }}</td>
          <td >{{ $d->soluong }}</td>
					<td>{{ $d->gia }}</td>
				</tr>


				<tr class="total">
					<td></td>
      
				
					<td >Tổng cộng:{{$d->tongtien }}</td>
				</tr>
			</table>
      @endforeach
		</div>
	</body>
</html>