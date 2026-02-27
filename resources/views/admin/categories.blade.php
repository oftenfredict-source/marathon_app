<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Category Management</title>
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
                        <li class="active"><a href="/admin/categories"><i class="fa fa-list purple_color"></i>
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
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h2>Category Management</h2>
                                        </div>
                                        <div class="col-md-3 text-right">
                                            <button class="btn btn-success" onclick="showAddModal()"><i
                                                    class="fa fa-plus"></i> Add Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Categories Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Race Categories</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Category Name</th>
                                                        <th>Distance (km)</th>
                                                        <th>Price (Local)</th>
                                                        <th>Price (Intl)</th>
                                                        <th>Limit</th>
                                                        <th>Registered</th>
                                                        <th>Progress</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="categories-table-body">
                                                    <tr>
                                                        <td colspan="8" class="text-center">Loading...</td>
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

        <!-- Add/Edit Category Modal -->
        <div class="modal fade" id="categoryModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modal-title">Add Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="category-form">
                        <div class="modal-body">
                            <input type="hidden" id="category-id">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" id="cat-name" class="form-control" required
                                    placeholder="e.g. 21km Half Marathon">
                            </div>
                            <div class="form-group">
                                <label>Distance (km)</label>
                                <input type="number" step="0.01" id="cat-distance" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Price Local (TZS)</label>
                                <input type="number" id="cat-price-local" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Price International (USD)</label>
                                <input type="number" id="cat-price-intl" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Registration Limit</label>
                                <input type="number" id="cat-limit" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
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

        // Load categories
        async function loadCategories() {
            const tbody = document.getElementById('categories-table-body');
            const data = await safeFetch(`${apiBase}/categories`);

            if (data === 'unauthorized') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Session expired. Please <a href="/login">logout and login again</a>.</td></tr>';
                return;
            }
            if (data === 'timeout') {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Request timed out. Please refresh.</td></tr>';
                return;
            }
            if (data === 'error' || !Array.isArray(data)) {
                tbody.innerHTML = '<tr><td colspan="8" class="text-center text-danger">Failed to load categories.</td></tr>';
                return;
            }

            const categories = data;
            tbody.innerHTML = categories.map(cat => {
                const percentage = Math.round((cat.registrations_count / cat.registration_limit) * 100);
                return `
                    <tr>
                        <td>${cat.name}</td>
                        <td>${cat.distance} km</td>
                        <td>40,000 / 20,000 <small>(A/S)</small></td>
                        <td>$${parseFloat(cat.price_international).toLocaleString()}</td>
                        <td>${cat.registration_limit}</td>
                        <td>${cat.registrations_count}</td>
                        <td>
                            <div class="progress" style="height: 10px;">
                                <div class="progress-bar ${percentage > 90 ? 'bg-danger' : percentage > 70 ? 'bg-warning' : 'bg-success'}" 
                                     role="progressbar" style="width: ${percentage}%"></div>
                            </div>
                            <small>${percentage}% full</small>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="editCategory(${JSON.stringify(cat).replace(/"/g, '&quot;')})"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-danger" onclick="deleteCategory(${cat.id})"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `;
            }).join('');
        }

        // Modal helpers
        function showAddModal() {
            document.getElementById('modal-title').textContent = 'Add Category';
            document.getElementById('category-id').value = '';
            document.getElementById('category-form').reset();
            $('#categoryModal').modal('show');
        }

        function editCategory(cat) {
            document.getElementById('modal-title').textContent = 'Edit Category';
            document.getElementById('category-id').value = cat.id;
            document.getElementById('cat-name').value = cat.name;
            document.getElementById('cat-distance').value = cat.distance;
            document.getElementById('cat-price-local').value = cat.price_local;
            document.getElementById('cat-price-intl').value = cat.price_international;
            document.getElementById('cat-limit').value = cat.registration_limit;
            $('#categoryModal').modal('show');
        }

        // Form submission
        document.getElementById('category-form').addEventListener('submit', async function (e) {
            e.preventDefault();
            const id = document.getElementById('category-id').value;
            const data = {
                name: document.getElementById('cat-name').value,
                distance: document.getElementById('cat-distance').value,
                price_local: document.getElementById('cat-price-local').value,
                price_international: document.getElementById('cat-price-intl').value,
                registration_limit: document.getElementById('cat-limit').value,
            };

            const method = id ? 'PUT' : 'POST';
            const url = id ? `${apiBase}/categories/${id}` : `${apiBase}/categories`;

            try {
                Swal.fire({
                    title: 'Saving...',
                    didOpen: () => { Swal.showLoading(); },
                    allowOutsideClick: false
                });

                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const response = await fetch(url, {
                    method: method,
                    headers: headers,
                    credentials: 'include',
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    $('#categoryModal').modal('hide');
                    Swal.fire({
                        title: 'Success!',
                        text: 'Category saved successfully',
                        icon: 'success'
                    });
                    loadCategories();
                } else {
                    const err = await response.json();
                    Swal.fire({
                        title: 'Error',
                        text: err.message || 'Error saving category',
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.error('Failed to save category:', error);
                Swal.fire({
                    title: 'Failure',
                    text: 'Connection error or server failure',
                    icon: 'error'
                });
            }
        });

        async function deleteCategory(id) {
            const confirmResult = await Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            });

            if (!confirmResult.isConfirmed) return;

            try {
                const token = localStorage.getItem('auth_token');
                const headers = {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest'
                };
                if (token) headers['Authorization'] = `Bearer ${token}`;

                const response = await fetch(`${apiBase}/categories/${id}`, {
                    method: 'DELETE',
                    headers: headers,
                    credentials: 'include'
                });

                if (response.ok) {
                    Swal.fire(
                        'Deleted!',
                        'Category has been deleted.',
                        'success'
                    );
                    loadCategories();
                } else {
                    const err = await response.json();
                    Swal.fire({
                        title: 'Error',
                        text: err.message || 'Error deleting category',
                        icon: 'error'
                    });
                }
            } catch (error) {
                console.error('Failed to delete category:', error);
                Swal.fire({
                    title: 'Failure',
                    text: 'Connection error or server failure',
                    icon: 'error'
                });
            }
        }

        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.addEventListener('DOMContentLoaded', loadCategories);
    </script>
</body>

</html>