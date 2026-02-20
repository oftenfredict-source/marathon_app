<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Runners Management</title>
    <link rel="icon" href="/pluto/images/fevicon.png" type="image/png" />
    <link rel="stylesheet" href="/pluto/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/pluto/style.css" />
    <link rel="stylesheet" href="/pluto/css/responsive.css" />
    <link rel="stylesheet" href="/pluto/css/colors.css" />
    <link rel="stylesheet" href="/pluto/css/bootstrap-select.css" />
    <link rel="stylesheet" href="/pluto/css/perfect-scrollbar.css" />
    <link rel="stylesheet" href="/pluto/css/custom.css" />
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
                        <li><a href="/admin/registrations"><i class="fa fa-users orange_color"></i>
                                <span>Registrations</span></a></li>
                        <li class="active"><a href="/admin/runners"><i class="fa fa-male green_color"></i>
                                <span>Runners</span></a></li>
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
                                    <h2>Runners Management</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Search and Filter -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Search & Filter</h2>
                                        </div>
                                    </div>
                                    <div class="full padding_infor_info">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="text" id="search-input" class="form-control"
                                                    placeholder="Search by name, email, phone...">
                                            </div>
                                            <div class="col-md-3">
                                                <select id="nationality-filter" class="form-control">
                                                    <option value="">All Nationalities</option>
                                                    <option value="Local">Local</option>
                                                    <option value="International">International</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-block" onclick="searchRunners()"><i
                                                        class="fa fa-search"></i> Search</button>
                                            </div>
                                            <div class="col-md-3">
                                                <button class="btn btn-success btn-block" onclick="exportRunners()"><i
                                                        class="fa fa-download"></i> Export to CSV</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Runners Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>All Runners</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Nationality</th>
                                                        <th>Category</th>
                                                        <th>Bib #</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="runners-table-body">
                                                    <tr>
                                                        <td colspan="9" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

        <!-- Runner Detail Modal -->
        <div class="modal fade" id="runnerModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Runner Details</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="runner-details">
                        Loading...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

        // Load all runners
        async function loadRunners(search = '', nationality = '') {
            try {
                const tbody = document.getElementById('runners-table-body');

                let url = `${apiBase}/runners?`;
                if (search) url += `search=${encodeURIComponent(search)}&`;
                if (nationality) url += `nationality=${nationality}&`;
                url = url.replace(/[?&]$/, '');

                const data = await safeFetch(url);

                if (data === 'unauthorized') {
                    tbody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Session expired. Please <a href="/login">logout and login again</a>.</td></tr>';
                    return;
                }

                if (data === 'timeout') {
                    tbody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Request timed out. Please refresh the page.</td></tr>';
                    return;
                }

                if (data === 'error' || !data) {
                    tbody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Failed to load runners data.</td></tr>';
                    return;
                }

                const runners = data;

                if (runners.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="9" class="text-center">No runners found matching your criteria</td></tr>';
                    return;
                }

                tbody.innerHTML = runners.map((runner, index) => `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${runner.full_name}</td>
                        <td>${runner.email}</td>
                        <td>${runner.phone}</td>
                        <td>${runner.nationality}</td>
                        <td>${runner.category}</td>
                        <td>${runner.bib_number || '-'}</td>
                        <td><span class="badge badge-${runner.status === 'paid' ? 'success' : 'warning'}">${runner.status}</span></td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="viewRunner(${runner.id})"><i class="fa fa-eye"></i></button>
                            ${runner.status === 'paid' && !runner.checked_in ?
                        `<button class="btn btn-sm btn-success" onclick="checkInRunner(${runner.id})"><i class="fa fa-check"></i></button>` :
                        runner.checked_in ? '<span class="badge badge-success">Checked In</span>' : ''}
                        </td>
                    </tr>
                `).join('');
            } catch (error) {
                console.error('Failed to load runners:', error);
            }
        }

        // Search runners
        function searchRunners() {
            const search = document.getElementById('search-input').value;
            const nationality = document.getElementById('nationality-filter').value;
            loadRunners(search, nationality);
        }

        // View runner details
        async function viewRunner(id) {
            try {
                const token = localStorage.getItem('auth_token');
                const response = await fetch(`${apiBase}/runners/${id}`, {
                    method: 'GET',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    credentials: 'include'
                });
                const runner = await response.json();

                document.getElementById('runner-details').innerHTML = `
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Personal Information</h5>
                            <p><strong>Name:</strong> ${runner.first_name} ${runner.last_name}</p>
                            <p><strong>Email:</strong> ${runner.email}</p>
                            <p><strong>Phone:</strong> ${runner.phone}</p>
                            <p><strong>Gender:</strong> ${runner.gender}</p>

                            <p><strong>T-Shirt Size:</strong> ${runner.t_shirt_size}</p>
                        </div>
                        <div class="col-md-6">
                            <h5>Location</h5>
                            <p><strong>Nationality:</strong> ${runner.nationality}</p>
                            <p><strong>Country:</strong> ${runner.country}</p>
                            <p><strong>Region:</strong> ${runner.region || 'N/A'}</p>
                            
                            <h5 class="mt-3">Registrations</h5>
                            ${runner.registrations.map(reg => `
                                <div class="alert alert-info">
                                    <strong>Category:</strong> ${reg.category}<br>
                                    <strong>Bib Number:</strong> ${reg.bib_number || 'Not assigned'}<br>
                                    <strong>Status:</strong> ${reg.status}<br>
                                    <strong>Type:</strong> ${reg.type}<br>
                                    <strong>Registered:</strong> ${reg.registered_at}
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;

                $('#runnerModal').modal('show');
            } catch (error) {
                console.error('Failed to load runner details:', error);
            }
        }

        // Check in runner
        async function checkInRunner(id) {
            const confirmResult = await Swal.fire({
                title: 'Check in this runner?',
                text: "This will mark the runner as present and arrived.",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#28a745',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, check in!'
            });

            if (!confirmResult.isConfirmed) return;

            try {
                Swal.fire({
                    title: 'Processing...',
                    didOpen: () => { Swal.showLoading(); },
                    allowOutsideClick: false
                });

                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const response = await fetch(`${apiBase}/runners/${id}/checkin`, {
                    method: 'POST',
                    headers: headers,
                    credentials: 'include'
                });

                const result = await response.json();
                if (response.ok) {
                    Swal.fire({
                        title: 'Success!',
                        text: `Runner checked in! Bib #${result.bib_number}`,
                        icon: 'success'
                    });
                    loadRunners();
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to check in: ' + (result.message || 'Unknown error'),
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.error('Failed to check in runner:', error);
                Swal.fire({
                    title: 'Failure',
                    text: 'Connection error or server failure',
                    icon: 'error'
                });
            }
        }

        // Export runners
        async function exportRunners() {
            try {
                const token = localStorage.getItem('auth_token');
                window.location.href = `${apiBase}/runners/export?token=${token}`;
            } catch (error) {
                console.error('Failed to export runners:', error);
            }
        }

        // Logout
        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', function () {
            loadRunners();

            // Search on enter key
            document.getElementById('search-input').addEventListener('keypress', function (e) {
                if (e.key === 'Enter') searchRunners();
            });
        });
    </script>
</body>

</html>