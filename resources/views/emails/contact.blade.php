<!-- Plain HTML email (avoid mail:: components to prevent missing hint path error) -->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Liên hệ Cinema Pro</title>
</head>
<body style="font-family:Arial,Helvetica,sans-serif;color:#222;background:#fafafa;padding:20px;">
    <div style="max-width:680px;margin:0 auto;background:white;padding:22px;border-radius:8px;border:1px solid #eee;">
    

        <h2 style="color:#b91c1c;margin:8px 0 18px 0;">Liên hệ mới từ Cinema Pro</h2>

        <p><strong>Tên:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Thời gian gửi:</strong> {{ $sent_at }}</p>

        <div style="background:#f7f7f7;border-radius:6px;padding:12px;margin:16px 0;white-space:pre-line;">{{ $body }}</div>

        <p style="font-size:13px;color:#666;margin-top:18px;">Nếu bạn muốn trả lời trực tiếp, hãy sử dụng chức năng Reply trong Gmail.</p>

        <p style="margin-top:24px;color:#333;">Trân trọng,<br>Đội ngũ BHN Cinema Pro</p>
    </div>
</body>
</html>
