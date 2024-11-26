@extends('layout')
@section('content')

<style>
  @media (max-width: 768px) {
    .body {
      margin-top: 5vw;
    }

    table.table {
      table-layout: fixed;
      width: 100%;
    }

    table.table td,
    table.table th {
      padding: 0.5rem;
      text-align: center;
    }


    table.table td:nth-child(1),
    table.table td:nth-child(2),
    table.table td:nth-child(5),
    table.table th:nth-child(1),
    table.table th:nth-child(2),
    table.table th:nth-child(5) {
      display: table-cell !important;
    }

    /* Ẩn các cột không cần thiết */
    table.table td:nth-child(3),
    table.table th:nth-child(3),
    table.table td:nth-child(4),
    table.table th:nth-child(4) {
      display: none;
    }

    .btn {
      height: 30px;
      font-size: 3vw;
    }
  }
</style>

<div class="body">
  <h1 class="h3 mb-3"><strong>Danh sách đơn hàng</strong></h1>

  <div class="">
    @if(session()->has('success'))
    <div class="alert alert-success mb-3">
      {{session('success')}}
    </div>
    @endif
  </div>

  <div class="card flex-fill">

    <!-- Bảng hiển thị đơn hàng -->
    <table class="table table-hover my-0">
      <thead>
        <tr>
          <th class="table-cell">ID</th>
          <th class="d-none d-md-table-cell">Tên đơn hàng</th>
          <th class="d-none d-md-table-cell">Số lượng</th>
          <th class="table-cell">Trạng thái</th>
          <th class="table-cell">Xem đơn hàng</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
        <tr>
          <td>{{$order->id_dathang}}</td>
          <td>
            @foreach($order->chiTietDonHang as $chiTiet)
            {{ $chiTiet->tensp }}<br>
            @endforeach
          </td>
          <td>
            @foreach($order->chiTietDonHang as $chiTiet)
            {{ $chiTiet->soluong }}<br>
            @endforeach
          </td>

          <td>
            @if($order->trangthai == 'đang xử lý')
            <span class="badge bg-primary text-white">{{$order->trangthai}}</span>
            @elseif ($order->trangthai == 'chờ lấy hàng')
            <span class="badge bg-warning text-white">{{$order->trangthai}}</span>
            @elseif ($order->trangthai == 'đang giao hàng')
            <span class="badge bg-success text-white">{{$order->trangthai}}</span>
            @elseif ($order->trangthai == 'giao thành công')
            <span class="badge bg-success text-white">{{$order->trangthai}}</span>
            @else
            <span class="badge bg-danger text-white">{{$order->trangthai}}</span>
            @endif
          </td>

          <!-- <td class="d-none d-md-table-cell">{{$order->diachigiaohang}}</td> -->

          <td>
            @if($order->trangthai=='giao thành công')
            <a href="{{ route('donhang.danhgia', ['id' => $order->id_dathang]) }}" class="btn btn-success">Đánh giá</a>
            @else
            <a href="{{ route('donhang.xemdonhang', ['id' => $order->id_dathang]) }}" class="btn btn-primary">Xem đơn hàng</a>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>

@endsection