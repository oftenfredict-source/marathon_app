<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - SMS Logs</title>
    <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pluto/style.css" />
    <link rel="stylesheet" href="/pluto/css/responsive.css" />
    <link rel="stylesheet" href="/pluto/css/colors.css" />
    <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/pluto/css/custom.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .badge-sent {
            background-color: #28a745;
            color: white;
        }

        .badge-failed {
            background-color: #dc3545;
            color: white;
        }

        .badge-pending {
            background-color: #ffc107;
            color: black;
        }

        .msg-content {
            max-width: 300px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            cursor: pointer;
        }

        .msg-content:hover {
            white-space: normal;
            word-break: break-all;
        }
    </style>
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
                        <li class="active"><a href="/admin/sms-logs"><i class="fa fa-envelope-o blue2_color"></i>
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
                                    <h2>SMS Delivery Logs</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row column1">
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-envelope-o blue1_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-total">0</p>
                                            <p class="head_couter">Total Messages</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-check-circle-o green_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-sent">0</p>
                                            <p class="head_couter">Successfully Sent</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-times-circle-o red_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-failed">0</p>
                                            <p class="head_couter">Failed Delivery</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Logs Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>SMS Log Entries</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Runner Name</th>
                                                        <th>Phone</th>
                                                        <th>Message</th>
                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Date/Time</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="logs-table-body">
                                                    <tr>
                                                        <td colspan="7" class="text-center">Loading logs...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Pagination -->
                                        <div class="d-flex justify-content-center mt-3" id="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end dashboard inner -->
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/pluto/js/jquery.min.js"></script>
    <script src="/pluto/js/popper.min.js"></script>
    <script src="/pluto/js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="/pluto/js/animate.js"></script>
    <!-- select country -->
    <script src="/pluto/js/bootstrap-select.js"></script>
    <!-- owl carousel -->
    <script src="/pluto/js/owl.carousel.js"></script>
    <!-- chart js -->
    <script src="/pluto/js/Chart.min.js"></script>
    <script src="/pluto/js/Chart.bundle.min.js"></script>
    <script src="/pluto/js/utils.js"></script>
    <script src="/pluto/js/analyser.js"></script>
    <!-- nice scrollbar -->
    <script src="/pluto/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <!-- custom js -->
    <script src="/pluto/js/custom.js"></script>

    <script>
        const apiBase = "/api/admin";

        // Helper to handle safe fetching with timeout
        async function safeFetch(url, options = {}, timeout = 15000) {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), timeout);

            try {
                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    ...options.headers
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const res = await fetch(url, {
                    ...options,
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

        async function loadStats() {
            const stats = await safeFetch(`${apiBase}/sms-logs/stats`);
            if (stats && typeof stats === 'object' && !['unauthorized', 'timeout', 'error'].includes(stats)) {
                document.getElementById('stat-total').textContent = stats.total;
                document.getElementById('stat-sent').textContent = stats.sent;
                document.getElementById('stat-failed').textContent = stats.failed;
            } else {
                console.error('Stats error:', stats);
            }
        }

        async function loadLogs(page = 1) {
            const tbody = document.getElementById('logs-table-body');
            const data = await safeFetch(`${apiBase}/sms-logs?page=${page}`);

            if (data === 'unauthorized') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Session expired. Please <a href="/login">logout and login again</a>.</td></tr>';
                return;
            }
            if (data === 'timeout') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Request timed out. Please refresh.</td></tr>';
                return;
            }
            if (data === 'error' || !data || !data.data) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Failed to load SMS logs.</td></tr>';
                return;
            }

            const logs = data.data;
            if (logs.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center">No SMS records found</td></tr>';
                return;
            }

            tbody.innerHTML = logs.map(log => `
                <tr>
                    <td>${log.id}</td>
                    <td>${log.runner ? log.runner.first_name + ' ' + log.runner.last_name : '<span class="text-muted">N/A</span>'}</td>
                    <td>${log.phone_number}</td>
                    <td><div class="msg-content" title="${log.message}">${log.message}</div></td>
                    <td><span class="text-capitalize">${log.sms_type}</span></td>
                    <td><span class="badge badge-${log.status}">${log.status}</span></td>
                    <td>${new Date(log.created_at).toLocaleString()}</td>
                    <td>
                        ${log.status === 'failed' ? `
                            <button class="btn btn-sm btn-info" onclick="resendSms(${log.id})">
                                <i class="fa fa-refresh"></i> Resend
                            </button>
                        ` : '-'}
                    </td>
                </tr>
            `).join('');

            renderPagination(data);
        }

        function renderPagination(data) {
            const pagination = document.getElementById('pagination');
            if (data.last_page <= 1) {
                pagination.innerHTML = '';
                return;
            }

            let html = '<ul class="pagination">';
            for (let i = 1; i <= data.last_page; i++) {
                html += `<li class="page-item ${data.current_page === i ? 'active' : ''}">
                    <a class="page-link" href="#" onclick="loadLogs(${i})">${i}</a>
                </li>`;
            }
            html += '</ul>';
            pagination.innerHTML = html;
        }

        async function resendSms(id) {
            try {
                Swal.fire({
                    title: 'Resending SMS...',
                    allowOutsideClick: false,
                    didOpen: () => { Swal.showLoading(); }
                });

                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const response = await fetch(`${apiBase}/sms-logs/${id}/resend`, {
                    method: 'POST',
                    headers: headers,
                    credentials: 'include'
                });

                const result = await response.json();

                if (response.ok) {
                    Swal.fire('Success', 'SMS resent successfully!', 'success');
                    loadStats();
                    const currentPage = document.querySelector('.page-item.active .page-link')?.textContent || 1;
                    loadLogs(currentPage);
                } else {
                    Swal.fire('Error', result.message || 'Failed to resend SMS', 'error');
                }
            } catch (err) {
                console.error('Resend error:', err);
                Swal.fire('Error', 'An error occurred while resending', 'error');
            }
        }

        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.getElementById('sidebarCollapse').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('active');
        });

        document.addEventListener('DOMContentLoaded', () => {
            loadStats();
            loadLogs();
        });
    </script>
</body>

</html>