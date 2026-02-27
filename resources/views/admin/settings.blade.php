<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Settings</title>
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
                        <li class="active"><a href="/admin/settings"><i class="fa fa-cog red_color"></i>
                                <span>Settings</span></a></li>
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
                                    <h2>System Settings</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Marathon Settings -->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Event Particulars</h2>
                                        </div>
                                    </div>
                                    <div class="full padding_infor_info">
                                        <form id="marathon-form">
                                            <div class="form-group">
                                                <label>Marathon Name</label>
                                                <input type="text" id="m-name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Event Date</label>
                                                <input type="date" id="m-date" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Location</label>
                                                <input type="text" id="m-location" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="m-description" class="form-control" rows="4"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update Event Info</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Admin Profile Settings -->
                            <div class="col-md-6">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Admin Profile</h2>
                                        </div>
                                    </div>
                                    <div class="full padding_infor_info">
                                        <form id="profile-form">
                                            <div class="form-group">
                                                <label>Display Name</label>
                                                <input type="text" id="p-name" class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address</label>
                                                <input type="email" id="p-email" class="form-control" required>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label>New Password (Leave blank to keep current)</label>
                                                <input type="password" id="p-password" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" id="p-password-confirm" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success">Update Profile</button>
                                        </form>
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
    <script src="/pluto/js/perfect-scrollbar.min.js"></script>
    <script>
        var ps = new PerfectScrollbar('#sidebar');
    </script>
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

        async function loadSettings() {
            const data = await safeFetch(`${apiBase}/settings`);

            if (data === 'unauthorized') {
                Swal.fire('Session expired', 'Please login again.', 'warning').then(() => {
                    window.location.href = '/login';
                });
                return;
            }

            if (data && typeof data === 'object' && !['timeout', 'error'].includes(data)) {
                if (data.marathon) {
                    document.getElementById('m-name').value = data.marathon.name;
                    document.getElementById('m-date').value = data.marathon.event_date;
                    document.getElementById('m-location').value = data.marathon.location;
                    document.getElementById('m-description').value = data.marathon.description || '';
                }

                if (data.admin_user) {
                    document.getElementById('p-name').value = data.admin_user.name;
                    document.getElementById('p-email').value = data.admin_user.email;
                }
            } else {
                console.error('Failed to load settings:', data);
            }
        }

        document.getElementById('marathon-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const data = {
                name: document.getElementById('m-name').value,
                event_date: document.getElementById('m-date').value,
                location: document.getElementById('m-location').value,
                description: document.getElementById('m-description').value,
            };

            try {
                Swal.fire({
                    title: 'Updating...',
                    didOpen: () => { Swal.showLoading(); },
                    allowOutsideClick: false
                });

                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const res = await fetch(`${apiBase}/settings/marathon`, {
                    method: 'POST',
                    headers: headers,
                    credentials: 'include',
                    body: JSON.stringify(data)
                });

                if (res.ok) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Marathon settings updated successfully!',
                        icon: 'success'
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Error updating marathon settings',
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.error('Update failed:', error);
                Swal.fire({
                    title: 'Failure',
                    text: 'Connection error or server failure',
                    icon: 'error'
                });
            }
        });

        document.getElementById('profile-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const password = document.getElementById('p-password').value;
            const confirm = document.getElementById('p-password-confirm').value;

            if (password && password !== confirm) {
                Swal.fire({
                    title: 'Mismatch',
                    text: 'Passwords do not match',
                    icon: 'warning'
                });
                return;
            }

            const data = {
                name: document.getElementById('p-name').value,
                email: document.getElementById('p-email').value,
                password: password,
                password_confirmation: confirm
            };

            try {
                Swal.fire({
                    title: 'Updating...',
                    didOpen: () => { Swal.showLoading(); },
                    allowOutsideClick: false
                });

                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const res = await fetch(`${apiBase}/settings/profile`, {
                    method: 'POST',
                    headers: headers,
                    credentials: 'include',
                    body: JSON.stringify(data)
                });

                if (res.ok) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Profile updated successfully!',
                        icon: 'success'
                    });
                    document.getElementById('p-password').value = '';
                    document.getElementById('p-password-confirm').value = '';
                } else {
                    const err = await res.json();
                    Swal.fire({
                        title: 'Error',
                        text: err.message || 'Error updating profile',
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.error('Update failed:', error);
                Swal.fire({
                    title: 'Failure',
                    text: 'Connection error or server failure',
                    icon: 'error'
                });
            }
        });

        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.addEventListener('DOMContentLoaded', loadSettings);
    </script>
</body>

</html>