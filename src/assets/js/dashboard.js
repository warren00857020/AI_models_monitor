let charts = {};

// 初始化圖表
function initCharts() {
    const ctx = document.getElementById('accuracyChart').getContext('2d');
    charts.accuracy = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [],
            datasets: [{
                label: 'Accuracy',
                data: [],
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });
    // 初始化其他圖表...
}

// 更新數據
function updateMetrics() {
    fetch('api/get_metrics.php')
        .then(response => response.json())
        .then(data => {
            // 更新卡片數值
            document.getElementById('accuracy').textContent = 
                (data.data.accuracy * 100).toFixed(2) + '%';
            
            // 更新圖表
            charts.accuracy.data.labels.push(data.timestamp);
            charts.accuracy.data.datasets[0].data.push(data.data.accuracy);
            
            // 保持最新的20筆數據
            if (charts.accuracy.data.labels.length > 20) {
                charts.accuracy.data.labels.shift();
                charts.accuracy.data.datasets[0].data.shift();
            }
            
            charts.accuracy.update();
        });
}

// 初始化
document.addEventListener('DOMContentLoaded', () => {
    initCharts();
    // 每秒更新一次
    setInterval(updateMetrics, 1000);
});