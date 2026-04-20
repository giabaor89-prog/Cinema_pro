<h2>Cinema Pro 🎬</h2>

<p>Mã đặt vé: {{ $data['booking_code'] }}</p>
<p>Tên phim: {{ $data['movie_title'] }}</p>
<p>Số ghế: {{ $data['seats'] }}</p>
<p>Tổng tiền: {{ number_format($data['total']) }} VND</p>

<p><b>Dùng mã này quét tại rạp</b></p>

<img src="{{ $data['ticket_qr'] }}" width="250">