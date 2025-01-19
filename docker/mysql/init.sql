CREATE TABLE model_metrics (
    id INT AUTO_INCREMENT PRIMARY KEY,
    model_id INT NOT NULL,
    metric_name VARCHAR(50) NOT NULL,
    value DECIMAL(10,4) NOT NULL,
    timestamp DATETIME NOT NULL,
    INDEX idx_model_metric (model_id, metric_name),
    INDEX idx_timestamp (timestamp)
) ENGINE=InnoDB;