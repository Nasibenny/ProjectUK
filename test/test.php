<!DOCTYPE html>
<html lang="en">
<?php
include '../koneksi.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
// Assuming $koneksi is your database connection
$sql = "SELECT id_outlet, COUNT(*) AS total_transactions
        FROM tb_transaksi
        GROUP BY id_outlet
        ORDER BY total_transactions DESC";
$result = mysqli_query($koneksi, $sql);

$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = "Outlet " . $row['id_outlet'];
    $data[] = $row['total_transactions'];
}
?>
            
 <!-- Card 1 for Bar Chart -->
<div class="w-[50%] h-fit bg-white shadow-md rounded-lg mx-7 p-4">
    <h2 class="text-lg font-bold mb-2">Bar Chart</h2>
    <div class="relative">
        <canvas id="transactionChart1" width="500" height="130"></canvas>
    </div>
</div>


<script>
    const labels = <?php echo json_encode($labels); ?>;
    const data = <?php echo json_encode($data); ?>;

    // Configuration for the bar chart
    const config1 = {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Transaction Per Month',
                data: data,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Total Transactions'
                }
            }
        },
    };

   
    // Initialize the bar chart
    const myBarChart = new Chart(
        document.getElementById('transactionChart1'),
        config1
    );

   
</script>
</body>
</html>