@extends('admin_layout')
@section('admin_content')
<div class="container-fluid p-0">
  <h1 class="h3 mb-3"><strong>Thống kê</strong></h1>

  <div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
      <div class="w-100">
        <div class="row mb-4">
          <div class="col-sm-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Đơn hàng</h5>
                  </div>
                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="shopping-cart"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$totalsOrders}}</h1>
                <div class="mb-0">
                  <span class="text-danger">
                    <i class="mdi mdi-arrow-bottom-right"></i> -2.25%
                  </span>
                  <span class="text-muted">Since last week</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Thành viên</h5>
                  </div>
                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="users"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$totalsCustomer}}</h1>
                <div class="mb-0">
                  <span class="text-success">
                    <i class="mdi mdi-arrow-bottom-right"></i> 5.25%
                  </span>
                  <span class="text-muted">Since last week</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Khuyến mãi</h5>
                  </div>
                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="truck"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$totalsSaleProducts}}</h1>
                <div class="mb-0">
                  <span class="text-danger">
                    <i class="mdi mdi-arrow-bottom-right"></i> -3.65%
                  </span>
                  <span class="text-muted">Since last week</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-3 mb-4">
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col mt-0">
                    <h5 class="card-title">Tổng thu nhập</h5>
                  </div>
                  <div class="col-auto">
                    <div class="stat text-primary">
                      <i class="align-middle" data-feather="dollar-sign"></i>
                    </div>
                  </div>
                </div>
                <h1 class="mt-1 mb-3">{{$totalsMoney}}</h1>
                <div class="mb-0">
                  <span class="text-success">
                    <i class="mdi mdi-arrow-bottom-right"></i> 6.65%
                  </span>
                  <span class="text-muted">Since last week</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-12 col-lg-8 col-xxl-9 d-flex">
      <div class="card flex-fill shadow-sm">
        <div class="card-header">
          <h5 class="card-title mb-0">Đơn hàng</h5>
        </div>
        <table class="table table-hover my-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Phương thức thanh toán</th>
              <th>Ngày đặt</th>
              <th>Ngày giao</th>
              <th>Trạng thái</th>
              <th>Địa chỉ giao hàng</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($getOrderView as $order)
            <tr>
              <td>{{$order->id_dathang}}</td>
              <td class="d-none d-xl-table-cell">
                <div class="badge 
                      @if ($order->phuongthucthanhtoan == 'COD') bg-secondary 
                      @elseif ($order->phuongthucthanhtoan == 'VNPAY') bg-primary 
                      @else '' @endif">
                  {{$order->phuongthucthanhtoan}}
                </div>
              </td>
              <td class="d-none d-xl-table-cell">{{$order->ngaydathang}}</td>
              <td class="d-none d-xl-table-cell">
                @if ($order->ngaygiaohang)
                {{ date('d/m/Y', strtotime($order->ngaygiaohang)) }}
                @endif
              </td>
              <td>
                <span class="badge 
                      @if($order->trangthai == 'đang xử lý') bg-primary 
                      @elseif ($order->trangthai == 'chờ lấy hàng') bg-warning 
                      @elseif ($order->trangthai == 'đang giao hàng' || $order->trangthai == 'giao thành công') bg-success 
                      @else bg-danger @endif">
                  {{$order->trangthai}}
                </span>
              </td>
              <td class="d-none d-md-table-cell">{{$order->diachigiaohang}}</td>
              <td class="d-none d-md-table-cell text-center">
                <a href="{{ route('orders.edit', ['orders' => $order->id_dathang]) }}" class="btn btn-primary btn-sm">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-12 col-lg-4 col-xxl-3 d-flex">
      <div class="card flex-fill shadow-sm">
        <div class="card-header">
          <h5 class="card-title mb-0">Calendar</h5>
        </div>
        <div class="card-body d-flex">
          <div class="align-self-center w-100">
            <div class="chart">
              <div id="datetimepicker-dashboard"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection