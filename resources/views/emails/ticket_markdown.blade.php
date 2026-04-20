@component('mail::message')

<!-- Header with BHN logo -->
<p style="text-align:center;margin-bottom:12px;">
    <img src="{{ isset($message) ? $message->embed(public_path('images/BHN.png')) : url('/images/BHN.png') }}" alt="BHN - Cinema Pro" style="width:160px;max-width:45%;height:auto;border-radius:6px;">
</p>


# Vé của bạn — Cinema Pro

Xin chúc mừng! Vé của bạn đã được đặt thành công. Dưới đây là thông tin chi tiết:

- **Mã đặt vé:** {{ $data['booking_code'] }}
- **Phim:** {{ $data['movie_title'] }}
- **Số ghế:** {{ $data['seats'] }}
- **Tổng tiền:** {{ number_format($data['total']) }} VND

@component('mail::panel')
<p style="text-align:center;margin:0;padding:0;">
    <img src="{{ $data['ticket_qr'] }}" alt="QR Code" style="width:250px;border-radius:8px;">
</p>
@endcomponent

@component('mail::button', ['url' => url('/ticket/check/'.$data['booking_code'])])
Xem chi tiết vé
@endcomponent

Nếu bạn có bất kỳ câu hỏi nào hãy truy cập trang hỗ trợ của chúng tôi.

Trân trọng,

Đội ngũ BHN Cinema Pro

@endcomponent
