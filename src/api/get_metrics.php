<?php
require_once 'config.php';
require_once 'MetricsCollector.php';

header('Content-Type: application/json');

$collector = new MetricsCollector($db);

// 模擬產生即時指標
$metrics = [
    'accuracy' => rand(85, 95) / 100,
    'latency' => rand(100, 150),
    'memory_usage' => rand(2000, 2500),
    'cpu_usage' => rand(40, 70)
];

// 記錄到資料庫
foreach ($metrics as $name => $value) {
    $collector->recordMetric(1, $name, $value);
}

// 回傳最新數據
echo json_encode([
    'status' => 'success',
    'data' => $metrics,
    'timestamp' => date('Y-m-d H:i:s')
]);