<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Admin Dashboard</title>
    <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pluto/style.css" />
    <link rel="stylesheet" href="/pluto/css/responsive.css" />
    <link rel="stylesheet" href="/pluto/css/colors.css" />
    <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/pluto/css/custom.css" />
</head>

<body class="dashboard dashboard_1">
    <div class="full_container">
        <div class="inner_container">
            <!-- Sidebar -->
            <nav id="sidebar">
                <div class="sidebar_blog_1">
                    <div class="sidebar-header">
                        <div class="logo_section">
                            <a href="/admin/dashboard"><img class="logo_icon img-responsive"
                                    src="/img/logo/asa-logo.png" alt="SMRMS" style="max-height: 50px;" /></a>
                        </div>
                    </div>
                    <div class="sidebar_user_info">
                        <div class="icon_setting"></div>
                        <div class="user_profle_side">
                            <div class="user_img">
                                <div class="user_placeholder">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="user_info">
                                <h6>Admin</h6>
                                <p><span class="online_animation"></span> Online</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar_blog_2">
                    <h4>Admin Panel</h4>
                    <ul class="list-unstyled components">
                        <li class="active"><a href="/admin/dashboard"><i class="fa fa-dashboard yellow_color"></i>
                                <span>Dashboard</span></a></li>
                        <li><a href="/admin/registrations"><i class="fa fa-users orange_color"></i>
                                <span>Registrations</span></a></li>
                        <li><a href="/admin/runners"><i class="fa fa-male green_color"></i> <span>Runners</span></a>
                        </li>
                        <li><a href="/admin/categories"><i class="fa fa-list purple_color"></i>
                                <span>Categories</span></a></li>
                        <li><a href="/admin/reports"><i class="fa fa-bar-chart blue1_color"></i>
                                <span>Reports</span></a></li>
                        <li><a href="/admin/sms-logs"><i class="fa fa-envelope-o blue2_color"></i>
                                <span>SMS Logs</span></a></li>
                        <li><a href="/admin/group-bookings"><i class="fa fa-group purple_color"></i>
                                <span>Group Bookings</span></a></li>
                        <li><a href="/admin/settings"><i class="fa fa-cog red_color"></i> <span>Settings</span></a></li>
                        <li class="logout_link"><a href="#" onclick="logout()"><i class="fa fa-sign-out red_color"></i>
                                <span>Log Out</span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- end sidebar -->

            <!-- right content -->
            <div id="content">
                <!-- topbar -->
                <div class="topbar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="full">
                            <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i
                                    class="fa fa-bars"></i></button>
                            <div class="logo_section topbar_logo_section">
                                <a href="/admin/dashboard"><img class="img-responsive" src="/img/logo/asa-logo.png"
                                        alt="SMRMS" style="max-height: 40px;" /></a>
                            </div>
                            <div class="right_topbar">
                                <div class="icon_info">
                                    <ul class="user_profile_dd">
                                        <li>
                                            <a class="dropdown-toggle" data-toggle="dropdown"><span
                                                    class="name_user">Admin</span></a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="/profile">My Profile</a>
                                                <a class="dropdown-item" href="/admin/settings">Settings</a>
                                                <a class="dropdown-item" href="#" onclick="logout()"><span>Log
                                                        Out</span> <i class="fa fa-sign-out"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <!-- end topbar -->

                <!-- dashboard inner -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Dashboard Overview</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row column1">
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-users yellow_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="total-registrations">0</p>
                                            <p class="head_couter">Total Registrations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-clock-o orange_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="pending-payments">0</p>
                                            <p class="head_couter">Pending Payments</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-check green_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="paid-registrations">0</p>
                                            <p class="head_couter">Paid Registrations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-male blue1_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="total-runners">0</p>
                                            <p class="head_couter">Total Runners</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Revenue Cards -->
                        <div class="row column1">
                            <div class="col-md-6">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-money red_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="revenue-tzs">0</p>
                                            <p class="head_couter">Revenue (TZS)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-dollar purple_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="revenue-usd">0</p>
                                            <p class="head_couter">Revenue (USD)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Row -->
                        <div class="row">
                            <!-- Category Distribution -->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Registrations by Category</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <canvas id="category-chart" style="height: 300px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Status -->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Payment Status</h2>
                                        </div>
                                    </div>
                                    <div class="full graph_revenue">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="content">
                                                    <canvas id="payment-chart" style="height: 300px;"></canvas>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Category Capacity -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Category Capacity</h2>
                                        </div>
                                    </div>
                                    <div class="full progress_bar_inner">
                                        <div class="row" id="category-capacity">
                                            <div class="col-md-12 text-center">Loading...</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Registrations -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Recent Registrations</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Runner Name</th>
                                                        <th>Email</th>
                                                        <th>Category</th>
                                                        <th>Status</th>
                                                        <th>Bib #</th>
                                                        <th>Registered</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="recent-registrations">
                                                    <tr>
                                                        <td colspan="6" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Quick Actions</h2>
                                        </div>
                                    </div>
                                    <div class="full padding_infor_info">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="/admin/registrations" class="btn btn-warning btn-block btn-lg">
                                                    <i class="fa fa-check"></i> Verify Payments
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/admin/runners" class="btn btn-success btn-block btn-lg">
                                                    <i class="fa fa-users"></i> View All Runners
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/admin/categories" class="btn btn-primary btn-block btn-lg">
                                                    <i class="fa fa-plus"></i> Manage Categories
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                <a href="/admin/reports" class="btn btn-info btn-block btn-lg">
                                                    <i class="fa fa-download"></i> Export Reports
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright © 2026 SMRMS. All rights reserved.</p>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

    <script src="/pluto/js/jquery.min.js"></script>
    <script src="/pluto/js/popper.min.js"></script>
    <script src="/pluto/js/bootstrap.min.js"></script>
    <script src="/pluto/js/Chart.min.js"></script>
    <script src="/pluto/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="/pluto/js/custom.js"></script>

    <script>
        const apiBase = "/api/admin";

        // Helper to handle safe fetching with timeout
        async function safeFetch(url, timeout = 15000) {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), timeout);

            try {
                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const res = await fetch(url, {
                    headers: headers,
                    credentials: 'include',
                    signal: controller.signal
                });

                clearTimeout(timeoutId);

                if (!res.ok) {
                    if (res.status === 401) return 'unauthorized';
                    throw new Error(`HTTP error! status: ${res.status}`);
                }
                return await res.json();
            } catch (e) {
                clearTimeout(timeoutId);
                console.error(`Failed to fetch ${url}:`, e);
                if (e.name === 'AbortError') return 'timeout';
                return 'error';
            }
        }
        let categoryChart, paymentChart;

        // Load statistics
        async function loadStatistics() {
            const stats = await safeFetch(`${apiBase}/dashboard/statistics`);
            if (stats && typeof stats === 'object' && !['unauthorized', 'timeout', 'error'].includes(stats)) {
                document.getElementById('total-registrations').textContent = stats.total_registrations;
                document.getElementById('pending-payments').textContent = stats.pending_registrations;
                document.getElementById('paid-registrations').textContent = stats.paid_registrations;
                document.getElementById('total-runners').textContent = stats.total_runners;
                document.getElementById('revenue-tzs').textContent = stats.revenue_tzs;
                document.getElementById('revenue-usd').textContent = stats.revenue_usd;

                // Display category capacity
                displayCategoryCapacity(stats.categories);
            } else {
                console.error('Failed to load statistics:', stats);
                if (stats === 'unauthorized') window.location.href = '/login';
            }
        }

        // Display category capacity bars
        function displayCategoryCapacity(categories) {
            const container = document.getElementById('category-capacity');
            if (!container) return;
            container.innerHTML = categories.map(cat => `
                <div class="col-md-6 margin_bottom_30">
                    <div class="progress_bar">
                        <span class="skill">${cat.name} <span class="pull-right">${cat.registrations}/${cat.limit} (${cat.percentage}%)</span></span>
                        <div class="progress">
                            <div class="progress-bar ${cat.percentage > 80 ? 'bg-danger' : cat.percentage > 50 ? 'bg-warning' : 'bg-success'}" 
                                 role="progressbar" style="width: ${cat.percentage}%"></div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Load chart data
        async function loadCharts() {
            const data = await safeFetch(`${apiBase}/dashboard/charts`);
            if (data && typeof data === 'object' && !['unauthorized', 'timeout', 'error'].includes(data)) {
                // Category distribution chart
                const categoryCtx = document.getElementById('category-chart').getContext('2d');
                if (categoryChart) categoryChart.destroy();
                categoryChart = new Chart(categoryCtx, {
                    type: 'pie',
                    data: {
                        labels: data.category_distribution.map(c => c.category),
                        datasets: [{
                            data: data.category_distribution.map(c => c.count),
                            backgroundColor: ['#f4c63d', '#d17905', '#59c2e6', '#453d3f', '#ff5722']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });

                // Payment status chart
                const paymentCtx = document.getElementById('payment-chart').getContext('2d');
                if (paymentChart) paymentChart.destroy();
                paymentChart = new Chart(paymentCtx, {
                    type: 'doughnut',
                    data: {
                        labels: data.payment_status.map(p => p.status),
                        datasets: [{
                            data: data.payment_status.map(p => p.count),
                            backgroundColor: ['#28a745', '#ffc107']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            } else {
                console.error('Failed to load charts:', data);
            }
        }

        // Load recent registrations
        async function loadRecentRegistrations() {
            const registrations = await safeFetch(`${apiBase}/dashboard/recent`);
            const tbody = document.getElementById('recent-registrations');
            if (!tbody) return;

            if (registrations === 'unauthorized') {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Session expired.</td></tr>';
                return;
            }
            if (registrations === 'timeout') {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Timeout.</td></tr>';
                return;
            }
            if (registrations === 'error' || !Array.isArray(registrations)) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error loading data.</td></tr>';
                return;
            }

            if (registrations.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center">No registrations yet</td></tr>';
                return;
            }

            tbody.innerHTML = registrations.map(reg => `
                <tr>
                    <td>${reg.runner_name}</td>
                    <td>${reg.email}</td>
                    <td>${reg.category}</td>
                    <td><span class="badge badge-${reg.status === 'paid' ? 'success' : 'warning'}">${reg.status}</span></td>
                    <td>${reg.bib_number || '-'}</td>
                    <td>${reg.created_at}</td>
                </tr>
            `).join('');
        }

        // Logout
        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function () {
            loadStatistics();
            loadCharts();
            loadRecentRegistrations();

            // Refresh every 30 seconds
            setInterval(() => {
                loadStatistics();
                loadCharts();
                loadRecentRegistrations();
            }, 30000);
        });
    </script>
</body>

</html>