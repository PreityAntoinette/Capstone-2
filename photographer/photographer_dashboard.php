<?php include('session.php');





//counter
$sql = "SELECT
SUM(CASE WHEN apt_status = 'PENDING' THEN 1 ELSE 0 END) AS pending_count,
SUM(CASE WHEN apt_status = 'APPROVED' THEN 1 ELSE 0 END) AS approved_count,
SUM(CASE WHEN apt_status = 'DECLINED' THEN 1 ELSE 0 END) AS declined_count,
SUM(CASE WHEN apt_status = 'DONE' THEN 1 ELSE 0 END) AS done_count
FROM appointment ";


$result1 = $connection->query($sql);


if ($result1->num_rows > 0) {
$row1 = $result1->fetch_assoc();
$pendingCount = $row1["pending_count"];
$approvedCount = $row1["approved_count"];
$declinedCount = $row1["declined_count"];
$doneCount = $row1["done_count"];

}

else {
// If no rows are returned, initialize the counts to 0
$pendingCount = 0;
$approvedCount = 0;
$declinedCount = 0;
$doneCount = 0;

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <title>Admin | Dashboard</title>
        <link href="../assets/images/logo.png" rel="icon" />
        <!-- Material Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet" />
        <!-- Custom CSS -->
        <link rel="stylesheet" href="../assets/admin/css/dashboardcontainer.css" />
        <link rel="stylesheet" href="../assets/admin/css/dashboard.css" />
        <link rel="stylesheet" href="../assets/global/css/design.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js">

    </head>
    <body>
        <div class="grid-container">
            <!-- Header -->
            <?php require "header/header.php"?>
            <!-- End Header -->
            <?php require "navigation/sidebar.php"?>
            <!-- Main -->
            <main class="main-container">
                <div class="main-title">
                    <p class="font-weight-bold">DASHBOARD</p>
                </div>
              
                <div class="main-cards justify-content-center">
                    <div class="card" style="border: none;" >
                        <div class="card-inner" style="display: block !important; text-decoration:none" >
                        <a href="report.php" class="link-label" style="text-decoration:none; text-align:center">
                                <h3>Schedule Log</h3>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="12"
                                    width="25"
                                    fill="#fff"
                                    class="right-arrow"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M3.4 81.7c-7.9 15.8-1.5 35 14.3 42.9L280.5 256 17.7 387.4C1.9 395.3-4.5 414.5 3.4 430.3s27.1 22.2 42.9 14.3l320-160c10.8-5.4 17.7-16.5 17.7-28.6s-6.8-23.2-17.7-28.6l-320-160c-15.8-7.9-35-1.5-42.9 14.3z"/>
                                </svg>
                            </a><br>
                            <div class="">
                                <div class="link-label-data">
                                    <canvas id="event-log-chart"><p>Error Loading Chart</p></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                        <div class="card" style="border: none;" >
                        <div class="card-inner" style="display: block !important; text-decoration:none" >
                        <a href="report.php" class="link-label" style="text-decoration:none; text-align:center">
                                <h3>Done Services</h3>
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    height="12"
                                    width="25"
                                    fill="#fff"
                                    class="right-arrow"
                                    viewBox="0 0 384 512">
                                    <path
                                        d="M3.4 81.7c-7.9 15.8-1.5 35 14.3 42.9L280.5 256 17.7 387.4C1.9 395.3-4.5 414.5 3.4 430.3s27.1 22.2 42.9 14.3l320-160c10.8-5.4 17.7-16.5 17.7-28.6s-6.8-23.2-17.7-28.6l-320-160c-15.8-7.9-35-1.5-42.9 14.3z"/>
                                </svg>
                            </a><br>
                            <div class="">
                                <div class="link-label-data">
                                    <canvas id="event-log-chart1"><p>Error Loading Chart</p></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
            </main>
            <!-- End Main -->
        </div>
        <!-- Scripts -->
        <!-- ApexCharts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
        <!-- Custom JS -->
        <script src="../assets/admin/js/sidebar_toggle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    </body>
</html>
<script>
    fetch('fetch_chart_event_log.php')  // Replace 'fetch_event_log.php' with your actual endpoint
    .then(response => response.json())
    .then(data => {
        if (data.length === 0) {
            // If there is no data, create a default dataset with zero values
            data = [{ event_name: 'No Data', event_status: 'No Data' }];
        }

        const labels = [ 'Approved Schedule', 'Done'];
        const statuses = data.map(entry => entry.event_status.toUpperCase()); // Capitalize the event status values

        const approvedData = statuses.filter(event_status => event_status === 'APPROVED').length;
        const doneData = statuses.filter(event_status => event_status === 'DONE').length;
        const event_log_chart = document.getElementById('event-log-chart');

        new Chart(event_log_chart, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    label: '',
                    data: [approvedData, doneData],
                    borderWidth: 1,
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'right'
                    },
                },
            }
        });
    })
    .catch(error => {
        console.error('Fetch Error:', error);
    });

   // Fetch data from PHP
   fetch('fetch_chart_done_services.php')
            .then(response => response.json())
            .then(data => {
                // Prepare data for Chart.js
                const labels = data.map(item => item.service_name);
                const counts = data.map(item => item.count);

                // Create Bar Chart
                var ctx = document.getElementById('event-log-chart1').getContext('2d');
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Appointment Counts',
                            data: counts,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Error fetching data:', error));

</script>