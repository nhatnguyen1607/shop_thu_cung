
@if ($danhgias && !$danhgias->isEmpty())
    @foreach ($danhgias as $danhgia)
        <div class="review-item">
            <div class="review-header">
                <!-- Hình ảnh đại diện -->
                <img src="{{ asset('frontend/img/6-anh-dai-dien-trang-inkythuatso-03-15-26-36.jpg') }}" alt="Avatar"
                    style="height:30px; width:30px;">

                <!-- Tên khách hàng -->
                <strong>{{ $danhgia->hoten }}</strong>

                <!-- Mức đánh giá -->
                <div class="review-rating">
                    @if($danhgia->rating == 5)
                        <span class="badge rounded-pill bg-success" style="color: white;">Rất tốt</span>
                    @elseif($danhgia->rating == 4)
                        <span class="badge rounded-pill bg-success" style="color: white;">Tốt</span>
                    @elseif($danhgia->rating == 3)
                        <span class="badge rounded-pill bg-warning" style="color: white;">Trung bình</span>
                    @elseif($danhgia->rating == 2)
                        <span class="badge rounded-pill bg-danger" style="color: white;">Tệ</span>
                    @elseif($danhgia->rating == 1)
                        <span class="badge rounded-pill bg-danger" style="color: white;">Rất tệ</span>
                    @endif

                    <!-- Hiển thị các sao -->
                    @for ($i = 1; $i <= 5; $i++)
                        <span style="color: {{ $i <= $danhgia->rating ? 'gold' : '#ccc' }};">&#9733;</span>
                    @endfor
                </div>
            </div>

            <!-- Nội dung đánh giá -->
            <div class="review-content">
                <p>{{ $danhgia->noidung }}</p>
            </div>

            <hr>
        </div>
    @endforeach
@else
    <p style="margin-left: 2vw;">Chưa có đánh giá nào.</p>
@endif
