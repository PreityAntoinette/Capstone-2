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
                <div class="main-cards">
                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">APPROVED</p>
                            <svg class="svg-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            fill=green
                            class="bi bi-box-arrow-right" 
                            viewBox="0 0 20 20"
                            >
							<path d="M7.629,14.566c0.125,0.125,0.291,0.188,0.456,0.188c0.164,0,0.329-0.062,0.456-0.188l8.219-8.221c0.252-0.252,0.252-0.659,0-0.911c-0.252-0.252-0.659-0.252-0.911,0l-7.764,7.763L4.152,9.267c-0.252-0.251-0.66-0.251-0.911,0c-0.252,0.252-0.252,0.66,0,0.911L7.629,14.566z"></path>
						</svg>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $approvedCount ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">PENDING</p>
                            <svg class="svg-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            fill=yellow
                            class="bi bi-box-arrow-right" 
                            viewBox="0 0 20 20"
                            >
							<path d="M11.088,2.542c0.063-0.146,0.103-0.306,0.103-0.476c0-0.657-0.534-1.19-1.19-1.19c-0.657,0-1.19,0.533-1.19,1.19c0,0.17,0.038,0.33,0.102,0.476c-4.085,0.535-7.243,4.021-7.243,8.252c0,4.601,3.73,8.332,8.332,8.332c4.601,0,8.331-3.73,8.331-8.332C18.331,6.562,15.173,3.076,11.088,2.542z M10,1.669c0.219,0,0.396,0.177,0.396,0.396S10.219,2.462,10,2.462c-0.22,0-0.397-0.177-0.397-0.396S9.78,1.669,10,1.669z M10,18.332c-4.163,0-7.538-3.375-7.538-7.539c0-4.163,3.375-7.538,7.538-7.538c4.162,0,7.538,3.375,7.538,7.538C17.538,14.957,14.162,18.332,10,18.332z M10.386,9.26c0.002-0.018,0.011-0.034,0.011-0.053V5.24c0-0.219-0.177-0.396-0.396-0.396c-0.22,0-0.397,0.177-0.397,0.396v3.967c0,0.019,0.008,0.035,0.011,0.053c-0.689,0.173-1.201,0.792-1.201,1.534c0,0.324,0.098,0.625,0.264,0.875c-0.079,0.014-0.155,0.043-0.216,0.104l-2.244,2.244c-0.155,0.154-0.155,0.406,0,0.561s0.406,0.154,0.561,0l2.244-2.242c0.061-0.062,0.091-0.139,0.104-0.217c0.251,0.166,0.551,0.264,0.875,0.264c0.876,0,1.587-0.711,1.587-1.587C11.587,10.052,11.075,9.433,10.386,9.26z M10,11.586c-0.438,0-0.793-0.354-0.793-0.792c0-0.438,0.355-0.792,0.793-0.792c0.438,0,0.793,0.355,0.793,0.792C10.793,11.232,10.438,11.586,10,11.586z"></path>
						</svg>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $pendingCount ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">DONE</p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="40"
                                height="40"
                                fill=green
                                class="bi bi-box-arrow-right"
                                viewBox="0 0 20 20"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10.219,1.688c-4.471,0-8.094,3.623-8.094,8.094s3.623,8.094,8.094,8.094s8.094-3.623,8.094-8.094S14.689,1.688,10.219,1.688 M10.219,17.022c-3.994,0-7.242-3.247-7.242-7.241c0-3.994,3.248-7.242,7.242-7.242c3.994,0,7.241,3.248,7.241,7.242C17.46,13.775,14.213,17.022,10.219,17.022 M15.099,7.03c-0.167-0.167-0.438-0.167-0.604,0.002L9.062,12.48l-2.269-2.277c-0.166-0.167-0.437-0.167-0.603,0c-0.166,0.166-0.168,0.437-0.002,0.603l2.573,2.578c0.079,0.08,0.188,0.125,0.3,0.125s0.222-0.045,0.303-0.125l5.736-5.751C15.268,7.466,15.265,7.196,15.099,7.03">
                                />
                        </svg>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $doneCount ?></span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p class="text-primary">DENNIED</p>
                            <svg class="svg-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            width="40"
                            height="40"
                            fill=red
                            class="bi bi-box-arrow-right" 
                            viewBox="0 0 20 20"
                            >
							<path d="M13.864,6.136c-0.22-0.219-0.576-0.219-0.795,0L10,9.206l-3.07-3.07c-0.219-0.219-0.575-0.219-0.795,0
								c-0.219,0.22-0.219,0.576,0,0.795L9.205,10l-3.07,3.07c-0.219,0.219-0.219,0.574,0,0.794c0.22,0.22,0.576,0.22,0.795,0L10,10.795
								l3.069,3.069c0.219,0.22,0.575,0.22,0.795,0c0.219-0.22,0.219-0.575,0-0.794L10.794,10l3.07-3.07
								C14.083,6.711,14.083,6.355,13.864,6.136z M10,0.792c-5.086,0-9.208,4.123-9.208,9.208c0,5.085,4.123,9.208,9.208,9.208
								s9.208-4.122,9.208-9.208C19.208,4.915,15.086,0.792,10,0.792z M10,18.058c-4.451,0-8.057-3.607-8.057-8.057
								c0-4.451,3.606-8.057,8.057-8.057c4.449,0,8.058,3.606,8.058,8.057C18.058,14.45,14.449,18.058,10,18.058z"></path>
						</svg>
                        </div>
                        <span class="text-primary font-weight-bold"><?php echo $declinedCount ?></span>
                    </div>
                </div>
                <div class="main-cards">
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
                    <div class="card" style="border: none;">
                        <div class="card-inner"  style="display: block !important; text-decoration:none" >
                        <a href="profile.php" class="link-label"style="text-decoration:none; text-align:center">
                                <h3>End User</h3>
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
                            </a>
                            <div class="column-2" style="display: flex; justify-content:center; text-align:center;">
                                <div class="link-label-data borrowers-counter">
                                    <div class="">
                                    <?php 
                                        $sql = "SELECT COUNT(*) AS row_count FROM users where role ='USER'";
                                        $result = $connection->query($sql);
                                        
                                        if ($result->num_rows > 0) {
                                            // Fetch the result
                                            $row = $result->fetch_assoc();
                                            $trowCount = $row['row_count'];
                                        
                                            
                                        }
                                        ?>
                                        <p style="font-size: 48px !important;"><?php echo $trowCount ?></p>
                                        <h4>TOTAL REGISTERED <br>USERS</h4>
                                    </div>
                        </div>
                    </div>
                </div>
                <div class="third-section column-3">
                        
                                <div class="link-label-data">
                                    <canvas id="borrower-chart"><p>Error Loading Chart</p></canvas>
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

        const labels = ['Approved', 'Done'];
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
                    data: [pendingData, approvedData, doneData, declinedData],
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