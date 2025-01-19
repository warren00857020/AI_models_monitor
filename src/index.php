<?php include 'includes/header.php'; ?>

<div class="container">
    <h1>AI Model Performance Dashboard</h1>
    
    <div class="row metrics-cards">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5>Accuracy</h5>
                    <h2 id="accuracy">-</h2>
                </div>
            </div>
        </div>
        <!-- 其他指標卡片 -->
    </div>
    
    <div class="row charts">
        <div class="col-md-6">
            <canvas id="accuracyChart"></canvas>
        </div>
        <!-- 其他圖表 -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="assets/js/dashboard.js"></script>

<?php include 'includes/footer.php'; ?>