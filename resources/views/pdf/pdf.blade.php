<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 2</title>
  <style>
@font-face {
  font-family: Dejavu Sans;
  src: url(SourceSansPro-Regular.ttf);
}

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #0087C3;
  text-decoration: none;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: Dejavu Sans;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
}

#logo {
  float: left;
  margin-top: 8px;
}

#logo img {
  height: 70px;
}

#company {
  float: right;
  text-align: right;
}


#details {
  margin-bottom: 50px;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #5555554d;
  float: left;
}

#client .to {
  color: #777777;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

#invoice {
  float: right;
  text-align: right;
}

#invoice h1 {
  color: #555555f2;
  font-size: 2.4em;
  line-height: 1em;
  font-weight: normal;
  margin: 0  0 10px 0;
}

#invoice .date {
  font-size: 1.1em;
  color: #777777;
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table th,
table td {
  padding: 20px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table th {
  white-space: nowrap;        
  font-weight: normal;
}

table td {
  text-align: right;
}

table td h3{
  color: #57B223;
  font-size: 1.2em;
  font-weight: normal;
  margin: 0 0 0.2em 0;
}

table .no {
  color: #FFFFFF;
  font-size: 1.6em;
  background: orange;
}

table .desc {
  text-align: left;
}

table .unit {
  background: #DDDDDD;
}

table .qty {
}

table .total {
  background:orange;
  color: #FFFFFF;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table tbody tr:last-child td {
  border: none;
}

table tfoot td {
  padding: 10px 20px;
  background: #FFFFFF;
  border-bottom: none;
  font-size: 1.2em;
  white-space: nowrap; 
  border-top: 1px solid #AAAAAA; 
}

table tfoot tr:first-child td {
  border-top: none; 
}

table tfoot tr:last-child td {
  color:black;
  font-size: 1.4em;
  border-top: 1px solid black; 

}

table tfoot tr td:first-child {
  border: none;
}

#thanks{
  font-size: 21px;
  margin-bottom: 1px;
}

#notices{
  padding-left: 6px;
  border-left: 6px solid #5555554d;  
}

#notices .notice {
  font-size: 1.2em;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #AAAAAA;
  padding: 8px 0;
  text-align: center;
}


      </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">

      </div>
      <div id="company">
        <h2 class="name" style="color: orange;">C??ng ty TNHH E-PIE</h2>
        <div>180 Cao L??? STU </div>
        <div>0787445876</div>
        <div><a href="mailto:company@example.com">thanhloi486@gmail.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          @foreach ($dh2 as $a )
            @if($loop->first)
          <div class="to">Giao ?????n:</div>
          <h2 class="name">H??? v?? t??n:{{ $a->tenkh }}</h2>
          <div class="address">{{ $a->diachi }}</div>
          <div class="email"><a href="mailto:john@example.com">{{ $a->email }}</a></div>
   
        
        </div>
        <div id="invoice">
          <h1>H??A ????N B??n H??ng #{{ $a->madh }}</h1>
          <div class="date">Ng??y l???p: 01/06/2014</div>
          <div class="date">Tr???ng th??i: ???? thanh to??n</div>
        </div>
      </div>
      @endif
      @endforeach
     
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">T??N S???N PH???M</th>
            <th class="unit">Gi?? ti???n</th>
            <th class="qty">S??? l?????ng</th>
            <th class="total">T???ng c???ng</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($dh2 as $d )
          <tr>
           
            <td class="no"></td>
            <td class="desc">{{ $d->tensp }}({{ $d->mausac }})</td>
            <td class="unit">{{number_format($d->gia) }}</td>
            <td class="qty">{{ $d->soluong }}</td>
            <td class="total">{{ number_format($d->soluong*$d->gia) }}</td>
          
          </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">T???ng c???ng</td>
            <td>{{$d->tongtien}}</td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td colspan="2">Thanh to??n</td>
            <td>{{$d->tongtien}}</td>
          </tr>
        </tfoot>
      </table>

      <div id="thanks" style="">C???m ??n b???n ???? ???ng h???!</div>
      <div id="notices">
        <div>Ch?? ??:</div>
        <div class="notice">Qu?? kh??ch c?? th??? ?????i h??ng trong v??ng 3 tu???n sau khi mua s???n ph???m</div>
      </div>
    </main>
    <footer>
     H???n g???p l???i kh??ch h??ng!
    </footer>
  </body>
</html>