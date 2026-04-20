<?php
// scripts/test_chatbot.php
// Chạy: php scripts/test_chatbot.php

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// Bootstrap the kernel so facades/helpers work
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

/** @var \Illuminate\Foundation\Application $app */
$controller = $app->make(\App\Http\Controllers\ChatbotController::class);

$messages = [
    'lịch chiếu hôm nay',
    'giá vé',
    'Avengers',
    'còn ghế avengers',
];

$logPath = __DIR__ . '/../storage/logs/chatbot_test.log';

foreach ($messages as $msg) {
    // create a Request instance with 'message'
    $request = new Illuminate\Http\Request([], [], [], [], [], [], null);
    $request->merge(['message' => $msg]);

    try {
        $resp = $controller->respond($request);
        if (is_object($resp) && method_exists($resp, 'getContent')) {
            $out = $resp->getContent();
        } else {
            $out = json_encode($resp);
        }
    } catch (Throwable $e) {
        $out = "EXCEPTION: " . $e->getMessage() ."\n". $e->getTraceAsString();
    }

    $entry = "[".date('Y-m-d H:i:s')."] Message: {$msg} -- Response: {$out}\n\n";
    file_put_contents($logPath, $entry, FILE_APPEND | LOCK_EX);
    echo $entry;
}

echo "Wrote results to {$logPath}\n";
