<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Payment Verification</title>
    <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pluto/style.css" />
    <link rel="stylesheet" href="/pluto/css/responsive.css" />
    <link rel="stylesheet" href="/pluto/css/colors.css" />
    <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/pluto/css/custom.css" />
    <style>
        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }

        .badge-paid {
            background-color: #28a745;
            color: #fff;
        }

        .btn-verify {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #000;
            font-weight: 600;
        }

        .btn-verify:hover {
            background-color: #ff8c42;
            border-color: #ff8c42;
            color: #fff;
        }
    </style>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        <li class="active"><a href="/admin/registrations"><i class="fa fa-users orange_color"></i>
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
                                    <h2>Payment Verification</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Statistics Cards -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-clock-o yellow_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="pending-count">0</p>
                                            <p class="head_couter">Pending</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-check green_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="paid-count">0</p>
                                            <p class="head_couter">Paid</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-users blue1_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="total-count">0</p>
                                            <p class="head_couter">Total</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-money red_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="revenue-count">0</p>
                                            <p class="head_couter">Revenue (TZS)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tabs -->
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#pending" role="tab">Pending
                                            Payments</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#paid" role="tab">Paid
                                            Registrations</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Tab Content -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="tab-content">
                                        <!-- Pending Tab -->
                                        <div class="tab-pane active" id="pending" role="tabpanel">
                                            <div class="table_section padding_infor_info">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Runner Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Category</th>
                                                                <th>Amount</th>
                                                                <th>Registered</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="pending-table-body">
                                                            <tr>
                                                                <td colspan="8" class="text-center">Loading...</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Paid Tab -->
                                        <div class="tab-pane" id="paid" role="tabpanel">
                                            <div class="table_section padding_infor_info">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead class="thead-dark">
                                                            <tr>
                                                                <th>Bib #</th>
                                                                <th>Runner Name</th>
                                                                <th>Email</th>
                                                                <th>Phone</th>
                                                                <th>Category</th>
                                                                <th>Paid At</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="paid-table-body">
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

        <!-- Payment Verification Modal -->
        <div class="modal fade" id="verifyModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Verify Payment</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div id="modal-runner-info"></div>
                        <div class="form-group">
                            <label>Payment Reference Number</label>
                            <input type="text" class="form-control" id="payment-reference"
                                placeholder="Enter payment reference">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-verify" onclick="confirmPayment()">Confirm Payment</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/pluto/js/jquery.min.js"></script>
    <script src="/pluto/js/popper.min.js"></script>
    <script src="/pluto/js/bootstrap.min.js"></script>
    <script src="/pluto/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
    <script src="/pluto/js/custom.js"></script>

    <script>
        let currentRegistrationId = null;
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

        // Load statistics
        async function loadStatistics() {
            const data = await safeFetch(`${apiBase}/registrations/statistics`);
            if (data && typeof data === 'object' && !['unauthorized', 'timeout', 'error'].includes(data)) {
                document.getElementById('pending-count').textContent = data.pending_registrations;
                document.getElementById('paid-count').textContent = data.paid_registrations;
                document.getElementById('total-count').textContent = data.total_registrations;
                document.getElementById('revenue-count').textContent = data.total_revenue;
            } else {
                console.error('Failed to load statistics:', data);
            }
        }

        // Load pending registrations
        async function loadPendingRegistrations() {
            const tbody = document.getElementById('pending-table-body');
            const data = await safeFetch(`${apiBase}/registrations/pending`);

            if (data === 'unauthorized') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Session expired. Please <a href="/login">logout and login again</a>.</td></tr>';
                return;
            }
            if (data === 'timeout') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Request timed out. Please refresh.</td></tr>';
                return;
            }
            if (data === 'error' || !Array.isArray(data)) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Failed to load pending registrations.</td></tr>';
                return;
            }

            const registrations = data;
            if (registrations.length === 0) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center">No pending payments</td></tr>';
                return;
            }

            tbody.innerHTML = registrations.map((reg, index) => `
                <tr>
                    <td>${index + 1}</td>
                    <td>${reg.runner_name}</td>
                    <td>${reg.email}</td>
                    <td>${reg.phone}</td>
                    <td>${reg.category}</td>
                    <td>${reg.amount} ${reg.currency}</td>
                    <td>${new Date(reg.registered_at).toLocaleDateString()}</td>
                    <td>
                        <button class="btn btn-sm btn-verify" onclick="openVerifyModal(${reg.id}, '${reg.runner_name}', '${reg.category}', ${reg.amount}, '${reg.currency}')">
                            Verify Payment
                        </button>
                    </td>
                </tr>
            `).join('');
        }

        // Load paid registrations
        async function loadPaidRegistrations() {
            const tbody = document.getElementById('paid-table-body');
            const data = await safeFetch(`${apiBase}/registrations/paid`);

            if (data === 'unauthorized') {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Session expired. Please <a href="/login">logout and login again</a>.</td></tr>';
                return;
            }
            if (data === 'timeout') {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Request timed out. Please refresh.</td></tr>';
                return;
            }
            if (data === 'error' || !Array.isArray(data)) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Failed to load paid registrations.</td></tr>';
                return;
            }

            const registrations = data;
            if (registrations.length === 0) {
                tbody.innerHTML = '<tr><td colspan="6" class="text-center">No paid registrations yet</td></tr>';
                return;
            }

            tbody.innerHTML = registrations.map(reg => `
                <tr>
                    <td><strong>${reg.bib_number}</strong></td>
                    <td>${reg.runner_name}</td>
                    <td>${reg.email}</td>
                    <td>${reg.phone}</td>
                    <td>${reg.category}</td>
                    <td>${new Date(reg.paid_at).toLocaleDateString()}</td>
                </tr>
            `).join('');
        }

        // Open verification modal
        function openVerifyModal(id, name, category, amount, currency) {
            currentRegistrationId = id;
            document.getElementById('modal-runner-info').innerHTML = `
                <div class="alert alert-info">
                    <strong>Runner:</strong> ${name}<br>
                    <strong>Category:</strong> ${category}<br>
                    <strong>Amount:</strong> ${amount} ${currency}
                </div>
            `;
            document.getElementById('payment-reference').value = '';
            $('#verifyModal').modal('show');
        }

        // Confirm payment
        async function confirmPayment() {
            const reference = document.getElementById('payment-reference').value.trim();
            if (!reference) {
                Swal.fire('Error', 'Please enter a payment reference number', 'error');
                return;
            }

            // Show Loading
            Swal.fire({
                title: 'Verifying Payment...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            try {
                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const response = await fetch(`${apiBase}/verify-payment`, {
                    method: 'POST',
                    headers: headers,
                    credentials: 'include',
                    body: JSON.stringify({
                        registration_id: currentRegistrationId,
                        payment_reference: reference
                    })
                });

                const result = await response.json();

                if (response.ok) {
                    $('#verifyModal').modal('hide');

                    Swal.fire({
                        title: 'Success!',
                        text: `Payment verified! Bib number ${result.bib_number} assigned.`,
                        icon: 'success',
                        confirmButtonColor: '#28a745'
                    }).then(() => {
                        loadPendingRegistrations();
                        loadPaidRegistrations();
                        loadStatistics();
                    });
                } else {
                    Swal.fire('Error', 'Payment verification failed: ' + (result.message || 'Unknown error'), 'error');
                }
            } catch (error) {
                console.error('Payment verification error:', error);
                Swal.fire('Error', 'Failed to verify payment. Please try again.', 'error');
            }
        }

        // Logout
        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function () {
            loadStatistics();
            loadPendingRegistrations();
            loadPaidRegistrations();

            // Refresh every 30 seconds
            setInterval(() => {
                loadStatistics();
                loadPendingRegistrations();
                loadPaidRegistrations();
            }, 30000);
        });
    </script>
</body>

</html>