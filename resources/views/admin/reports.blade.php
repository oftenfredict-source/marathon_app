<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Reports & Analytics</title>
    <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pluto/style.css" />
    <link rel="stylesheet" href="/pluto/css/responsive.css" />
    <link rel="stylesheet" href="/pluto/css/colors.css" />
    <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/pluto/css/custom.css" />
</head>

<body class="inner_page tables_page">
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
                        <li><a href="/admin/dashboard"><i class="fa fa-dashboard yellow_color"></i>
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
                                </div>
                            </div>
                        </div>

                        <!-- Summary Cards -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Status Summary</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Status</th>
                                                        <th>Total</th>
                                                        <th>Individual</th>
                                                        <th>Group</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="reports-summary">
                                                    <tr>
                                                        <td colspan="4" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Charts Section -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Gender Distribution</h2>
                                        </div>
                                    </div>
                                    <div class="padding_infor_info text-center">
                                        <canvas id="genderChart" style="max-height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Nationality Breakdown</h2>
                                        </div>
                                    </div>
                                    <div class="padding_infor_info text-center">
                                        <canvas id="nationalityChart" style="max-height: 300px;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Revenue and T-Shirt Tables -->
                        <div class="row">
                            <div class="col-md-7">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Revenue by Category</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Category</th>
                                                        <th>Total Paid</th>
                                                        <th>Revenue (TZS)</th>
                                                        <th>Revenue (USD)</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="revenue-body">
                                                    <tr>
                                                        <td colspan="4" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>T-Shirt Size Requests</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Size</th>
                                                    <th>Count</th>
                                                </tr>
                                            </thead>
                                            <tbody id="sizes-body">
                                                <tr>
                                                    <td colspan="2" class="text-center">Loading...</td>
                                                </tr>
                                            </tbody>
                                        </table>
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
        const token = localStorage.getItem('auth_token');

        async function loadReports() {
            // Helper to handle safe fetching with timeout
            async function safeFetch(url, timeout = 15000) {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), timeout);

                try {
                    const headers = {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    };
                    if (token) {
                        headers['Authorization'] = `Bearer ${token}`;
                    }

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

            // Fetch all data in parallel
            const [stats, revenue, demo] = await Promise.all([
                safeFetch(`${apiBase}/reports/registrations`),
                safeFetch(`${apiBase}/reports/revenue`),
                safeFetch(`${apiBase}/reports/demographics`)
            ]);

            // Process Registrations Summary
            const summaryTable = document.getElementById('reports-summary');
            if (Array.isArray(stats)) {
                summaryTable.innerHTML = stats.map(s => `
                        <tr>
                            <td class="text-capitalize">${s.status}</td>
                            <td>${s.total}</td>
                            <td>${s.individual} (Adult)</td>
                            <td>${s.group_reg} (Student)</td>
                        </tr>
                    `).join('');
            } else {
                const msg = stats === 'timeout' ? 'Request timed out' : (stats === 'unauthorized' ? 'Session expired. <a href="/login">Login again</a>' : 'Failed to load');
                summaryTable.innerHTML = `<tr><td colspan="4" class="text-center text-danger">${msg}</td></tr>`;
            }

            // Process Revenue
            const revenueTable = document.getElementById('revenue-body');
            if (revenue && typeof revenue === 'object' && !['timeout', 'error', 'unauthorized'].includes(revenue)) {
                revenueTable.innerHTML = Object.entries(revenue).map(([name, data]) => `
                        <tr>
                            <td>${name}</td>
                            <td>${data.total}</td>
                            <td>${data.tzs.toLocaleString()}</td>
                            <td>$${data.usd.toLocaleString()}</td>
                        </tr>
                    `).join('');
            } else {
                const msg = revenue === 'timeout' ? 'Request timed out' : (revenue === 'unauthorized' ? 'Session expired' : 'Failed to load');
                revenueTable.innerHTML = `<tr><td colspan="4" class="text-center text-danger">${msg}</td></tr>`;
            }

            // Process Demographics
            if (demo && demo !== 'timeout' && demo !== 'error' && demo !== 'unauthorized') {
                // Gender Chart
                new Chart(document.getElementById('genderChart').getContext('2d'), {
                    type: 'pie',
                    data: {
                        labels: demo.gender.map(g => g.gender),
                        datasets: [{
                            data: demo.gender.map(g => g.count),
                            backgroundColor: ['#59c2e6', '#ff5722']
                        }]
                    }
                });

                // Nationality Chart
                new Chart(document.getElementById('nationalityChart').getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: demo.nationality.map(n => n.nationality),
                        datasets: [{
                            data: demo.nationality.map(n => n.count),
                            backgroundColor: ['#f4c63d', '#453d3f']
                        }]
                    }
                });

                // T-Shirt Sizes table
                document.getElementById('sizes-body').innerHTML = demo.tshirt_sizes.map(s => `
                        <tr>
                            <td>${s.t_shirt_size || 'Not specified'}</td>
                            <td>${s.count}</td>
                        </tr>
                    `).join('');
            } else {
                const msg = demo === 'timeout' ? 'Request timed out' : (demo === 'unauthorized' ? 'Session expired' : 'Failed to load data');
                document.getElementById('sizes-body').innerHTML = `<tr><td colspan="2" class="text-center text-danger">${msg}</td></tr>`;
            }
        }

        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.addEventListener('DOMContentLoaded', loadReports);
    </script>
</body>

</html>