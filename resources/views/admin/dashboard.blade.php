@extends('admin_layout')
@section('admin_content')
<h1>Welcome</h1> 
<div class="market-updates">
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-2">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-eye"> </i>
            </div>
             <div class="col-md-8 market-update-left">
             <h4>Chương trình khuyến mãi</h4>
            <h3>2</h3>
            <p>đang chờ</p>
          </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-1">
            <div class="col-md-4 market-update-right">
                <i style="    font-size: 3em;
                color: #fff;
                text-align: left;" class="fa fa-dropbox" ></i>
            </div>
            <div class="col-md-8 market-update-left">
            <h4>Số lượng hàng</h4>
                <h3>{{ $sum_product }}</h3>
                <p></p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-3">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-usd"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Doanh thu</h4>
                <h3>1,500</h3>
                <p>Năm 2021</p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
    <div class="col-md-3 market-update-gd">
        <div class="market-update-block clr-block-4">
            <div class="col-md-4 market-update-right">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            </div>
            <div class="col-md-8 market-update-left">
                <h4>Đơn hàng</h4>
                <h3>1,500</h3>
                <p>Chưa xử lý</p>
            </div>
          <div class="clearfix"> </div>
        </div>
    </div>
   <div class="clearfix"> </div>
</div>
<div class="col-md-8 stats-info stats-last widget-shadow">
    @php
        $i=1;
    @endphp
    <div class="stats-last-agile">
        <table class="table stats-table ">
            <h2>Top sản phẩm bán chạy</h2>
            <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Sản phẩm</th>
                    <th style="color:black">Trạng thái</th>
                    {{-- <th>PROGRESS</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($sp_ban_chay as $b)
                <tr>
                    <th style="color: #808080" scope="row">{{ $i++ }}</th>
                    <td style="color: #808080">{{ $b->tensp}}</td>
                 @if($b->soluongsp>0)
                    <td><span class="label label-success">Còn hàng</span></td>
                    @else
                    <td><span class="label label-danger">Hết hàng</span></td>
                    @endif
                    {{-- <td><h5>85% <i class="fa fa-level-up"></i></h5></td> --}}
                </tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-8 stats-info stats-last widget-shadow">
    @php
        $i=1;
    @endphp
    <div class="stats-last-agile">
        <table class="table stats-table ">
            <h2>Top sản phẩm bán chạy</h2>
            <thead>
                <tr>
                    <th style="color:black">STT</th>
                    <th style="color:black">Sản phẩm</th>
                    <th style="color:black">Trạng thái</th>
                    {{-- <th>PROGRESS</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($sp_ban_chay as $b)
                <tr>
                    <th style="color: #808080" scope="row">{{ $i++ }}</th>
                    <td style="color: #808080">{{ $b->tensp}}</td>
                 @if($b->soluongsp>0)
                    <td><span class="label label-success">Còn hàng</span></td>
                    @else
                    <td><span class="label label-danger">Hết hàng</span></td>
                    @endif
                    {{-- <td><h5>85% <i class="fa fa-level-up"></i></h5></td> --}}
                </tr>
@endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

