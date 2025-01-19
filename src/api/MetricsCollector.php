<?php
class MetricsCollector {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function recordMetric($modelId, $metricName, $value) {
        $timestamp = date('Y-m-d H:i:s');
        $stmt = $this->db->prepare("
            INSERT INTO model_metrics 
            (model_id, metric_name, value, timestamp) 
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$modelId, $metricName, $value, $timestamp]);
    }
    
    public function getLatestMetrics($modelId, $limit = 20) {
        $stmt = $this->db->prepare("
            SELECT metric_name, value, timestamp 
            FROM model_metrics 
            WHERE model_id = ? 
            ORDER BY timestamp DESC 
            LIMIT ?
        ");
        $stmt->execute([$modelId, $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}