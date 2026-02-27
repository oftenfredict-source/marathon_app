<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMRMS - Group Bookings</title>
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
        .badge-pending {
            background-color: #ffc107;
            color: #000;
        }

        .badge-paid {
            background-color: #28a745;
            color: #fff;
        }

        .badge-cancelled {
            background-color: #dc3545;
            color: #fff;
        }

        .member-row td {
            background: #f8f9fa;
            font-size: 0.9em;
        }

        .toggle-members {
            cursor: pointer;
        }

        .discount-badge {
            background: #6f42c1;
            color: #fff;
            padding: 2px 8px;
            border-radius: 20px;
            font-size: 0.8em;
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
                                <div class="user_placeholder"><i class="fa fa-user"></i></div>
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
                        <li><a href="/admin/sms-logs"><i class="fa fa-envelope-o blue2_color"></i> <span>SMS
                                    Logs</span></a></li>
                        <li class="active"><a href="/admin/group-bookings"><i class="fa fa-group purple_color"></i>
                                <span>Group Bookings</span></a></li>
                        <li><a href="/admin/settings"><i class="fa fa-cog red_color"></i> <span>Settings</span></a></li>
                        <li class="logout_link"><a href="#" onclick="logout()"><i class="fa fa-sign-out red_color"></i>
                                <span>Log Out</span></a></li>
                    </ul>
                </div>
            </nav>

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

                <!-- main content -->
                <div class="midde_cont">
                    <div class="container-fluid">
                        <div class="row column_title">
                            <div class="col-md-12">
                                <div class="page_title">
                                    <h2>Group Bookings</h2>
                                </div>
                            </div>
                        </div>

                        <!-- Stats -->
                        <div class="row column1">
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-group purple_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-total">0</p>
                                            <p class="head_couter">Total Groups</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-clock-o orange_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-pending">0</p>
                                            <p class="head_couter">Pending Payment</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="full counter_section margin_bottom_30">
                                    <div class="couter_icon">
                                        <div><i class="fa fa-check-circle green_color"></i></div>
                                    </div>
                                    <div class="counter_no">
                                        <div>
                                            <p class="total_no" id="stat-paid">0</p>
                                            <p class="head_couter">Paid &amp; Verified</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Bar -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <select id="filter-status" class="form-control" onchange="loadGroups(1)">
                                    <option value="">All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" id="filter-search" class="form-control"
                                    placeholder="Search by leader name, group name or phone..."
                                    oninput="debounceSearch()">
                            </div>
                        </div>

                        <!-- Table -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_shd full margin_bottom_30">
                                    <div class="full graph_head">
                                        <div class="heading1 margin_0">
                                            <h2>Group Booking List</h2>
                                        </div>
                                    </div>
                                    <div class="table_section padding_infor_info">
                                        <div class="table-responsive-sm">
                                            <table class="table table-hover" id="groups-table">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Group Name</th>
                                                        <th>Leader</th>
                                                        <th>Type</th>
                                                        <th>Members</th>
                                                        <th>Discount</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Date</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="groups-tbody">
                                                    <tr>
                                                        <td colspan="10" class="text-center">Loading...</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-center mt-3" id="pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- footer -->
                    <div class="container-fluid">
                        <div class="footer">
                            <p>Copyright &copy; 2026 SMRMS. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Verify Payment Modal -->
    <div class="modal fade" id="verifyModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Verify Group Payment</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div id="verify-group-info" class="mb-3"></div>
                    <div class="form-group">
                        <label>Payment Reference / Transaction ID <span class="text-danger">*</span></label>
                        <input type="text" id="payment-ref-input" class="form-control" placeholder="e.g. TXN123456789">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" onclick="submitVerify()">
                        <i class="fa fa-check"></i> Confirm &amp; Assign Bibs
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Members Detail Modal -->
    <div class="modal fade" id="membersModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="members-modal-title">Group Members</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body" id="members-modal-body">Loading...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="/pluto/js/jquery.min.js"></script>
    <script src="/pluto/js/popper.min.js"></script>
    <script src="/pluto/js/bootstrap.min.js"></script>
    <script src="/pluto/js/perfect-scrollbar.min.js"></script>
    <script>var ps = new PerfectScrollbar('#sidebar');</script>
    <script src="/pluto/js/custom.js"></script>

    <script>
        const apiBase = "/api/admin";
        let currentVerifyId = null;
        let searchTimer = null;

        function getAuthHeaders() {
            const token = localStorage.getItem('auth_token');
            const h = { 'Accept': 'application/json', 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' };
            if (token) h['Authorization'] = `Bearer ${token}`;
            return h;
        }

        async function safeFetch(url, options = {}) {
            try {
                const res = await fetch(url, { ...options, headers: getAuthHeaders(), credentials: 'include' });
                if (res.status === 401) { window.location.href = '/login'; return null; }
                return await res.json();
            } catch (e) {
                console.error(e); return null;
            }
        }

        // ---- Stats ----
        async function loadStats() {
            const data = await safeFetch(`${apiBase}/group-bookings?per_page=1000`);
            if (!data || !data.data) return;
            const all = data.data;
            document.getElementById('stat-total').textContent = data.total ?? all.length;
            document.getElementById('stat-pending').textContent = all.filter(g => g.status === 'pending').length;
            document.getElementById('stat-paid').textContent = all.filter(g => g.status === 'paid').length;
        }

        // ---- Load groups table ----
        async function loadGroups(page = 1) {
            const status = document.getElementById('filter-status').value;
            const search = document.getElementById('filter-search').value;
            let url = `${apiBase}/group-bookings?page=${page}`;
            if (status) url += `&status=${status}`;
            if (search) url += `&search=${encodeURIComponent(search)}`;

            const tbody = document.getElementById('groups-tbody');
            tbody.innerHTML = '<tr><td colspan="10" class="text-center">Loading...</td></tr>';

            const data = await safeFetch(url);
            if (!data || !data.data) {
                tbody.innerHTML = '<tr><td colspan="10" class="text-center text-danger">Error loading data.</td></tr>';
                return;
            }

            const groups = data.data;
            if (groups.length === 0) {
                tbody.innerHTML = '<tr><td colspan="10" class="text-center">No group bookings found.</td></tr>';
                return;
            }

            tbody.innerHTML = groups.map(g => `
                <tr>
                    <td>#${g.id}</td>
                    <td>${g.group_name || '<span class="text-muted">—</span>'}</td>
                    <td>
                        <strong>${g.leader_name}</strong><br>
                        <small class="text-muted">${g.leader_phone}</small>
                    </td>
                    <td><span class="text-capitalize">${g.registration_type}</span></td>
                    <td><span class="badge badge-info">${g.registrations_count ?? g.member_count}</span></td>
                    <td><span class="discount-badge">${parseFloat(g.discount_percent)}%</span></td>
                    <td>
                        <strong>${Number(g.total_amount).toLocaleString()} ${g.currency}</strong>
                        <br><small class="text-muted">Sub: ${Number(g.subtotal_amount).toLocaleString()}</small>
                    </td>
                    <td><span class="badge badge-${g.status}">${g.status.toUpperCase()}</span></td>
                    <td><small>${new Date(g.created_at).toLocaleDateString()}</small></td>
                    <td>
                        <button class="btn btn-sm btn-primary mb-1" onclick="viewMembers(${g.id}, '${(g.group_name || 'Group #' + g.id).replace(/'/g, "\\'")}')">
                            <i class="fa fa-eye"></i> Members
                        </button>
                        ${g.status === 'pending' ? `
                        <button class="btn btn-sm btn-success mb-1" onclick="openVerify(${g.id}, '${(g.group_name || 'Group #' + g.id).replace(/'/g, "\\'")}', '${Number(g.total_amount).toLocaleString()} ${g.currency}')">
                            <i class="fa fa-check"></i> Verify
                        </button>` : ''}
                    </td>
                </tr>
            `).join('');

            renderPagination(data, page);
        }

        // ---- Pagination ----
        function renderPagination(data, current) {
            const el = document.getElementById('pagination');
            if (data.last_page <= 1) { el.innerHTML = ''; return; }
            let html = '<ul class="pagination">';
            for (let i = 1; i <= data.last_page; i++) {
                html += `<li class="page-item ${i === current ? 'active' : ''}"><a class="page-link" href="#" onclick="loadGroups(${i})">${i}</a></li>`;
            }
            el.innerHTML = html + '</ul>';
        }

        // ---- View Members ----
        async function viewMembers(id, name) {
            document.getElementById('members-modal-title').textContent = `Members — ${name}`;
            document.getElementById('members-modal-body').innerHTML = '<p class="text-center">Loading...</p>';
            $('#membersModal').modal('show');

            const data = await safeFetch(`${apiBase}/group-bookings/${id}`);
            if (!data || !data.registrations) {
                document.getElementById('members-modal-body').innerHTML = '<p class="text-danger">Failed to load members.</p>';
                return;
            }

            const rows = data.registrations.map((reg, i) => `
                <tr>
                    <td>${i + 1}</td>
                    <td>${reg.runner ? reg.runner.first_name + ' ' + reg.runner.last_name : '—'}</td>
                    <td>${reg.runner?.gender ?? '—'}</td>
                    <td>${reg.runner?.t_shirt_size ?? '—'}</td>
                    <td>${reg.category?.name ?? '—'}</td>
                    <td>${reg.bib_number ? `<strong class="text-success">#${reg.bib_number}</strong>` : '<span class="text-muted">Not assigned</span>'}</td>
                    <td><span class="badge badge-${reg.status}">${reg.status.toUpperCase()}</span></td>
                </tr>
            `).join('');

            document.getElementById('members-modal-body').innerHTML = `
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <thead class="thead-dark">
                            <tr><th>#</th><th>Name</th><th>Gender</th><th>T-Shirt</th><th>Category</th><th>Bib #</th><th>Status</th></tr>
                        </thead>
                        <tbody>${rows}</tbody>
                    </table>
                </div>
                <div class="mt-2 text-muted small">
                    Leader: <strong>${data.leader_name}</strong> &nbsp;|&nbsp;
                    Phone: <strong>${data.leader_phone}</strong> &nbsp;|&nbsp;
                    Payment Ref: <strong>${data.payment_reference || 'Pending'}</strong>
                </div>
            `;
        }

        // ---- Verify Payment ----
        function openVerify(id, name, total) {
            currentVerifyId = id;
            document.getElementById('verify-group-info').innerHTML = `
                <div class="alert alert-info mb-0">
                    <strong>Group:</strong> ${name}<br>
                    <strong>Total Amount:</strong> ${total}<br>
                    <small>Once verified, bib numbers will be auto-assigned to all members and SMS confirmations will be sent.</small>
                </div>`;
            document.getElementById('payment-ref-input').value = '';
            $('#verifyModal').modal('show');
        }

        async function submitVerify() {
            const ref = document.getElementById('payment-ref-input').value.trim();
            if (!ref) {
                Swal.fire('Required', 'Please enter the payment reference number.', 'warning');
                return;
            }

            Swal.fire({ title: 'Verifying...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });

            const token = localStorage.getItem('auth_token');
            const headers = { 'Accept': 'application/json', 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'X-Requested-With': 'XMLHttpRequest' };
            if (token) headers['Authorization'] = `Bearer ${token}`;

            try {
                const res = await fetch(`${apiBase}/group-bookings/${currentVerifyId}/verify-payment`, {
                    method: 'POST',
                    headers,
                    credentials: 'include',
                    body: JSON.stringify({ payment_reference: ref })
                });
                const result = await res.json();

                if (res.ok) {
                    $('#verifyModal').modal('hide');
                    Swal.fire({
                        icon: 'success',
                        title: 'Payment Verified!',
                        html: `<p>Bib numbers assigned to all members.</p><p class="text-muted small">SMS sent to group leader and individual members.</p>`,
                    });
                    loadGroups();
                    loadStats();
                } else {
                    Swal.fire('Error', result.message || 'Verification failed.', 'error');
                }
            } catch (e) {
                Swal.fire('Error', 'An unexpected error occurred.', 'error');
            }
        }

        function debounceSearch() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => loadGroups(1), 400);
        }

        function logout() {
            localStorage.removeItem('auth_token');
            window.location.href = '/login';
        }

        document.getElementById('sidebarCollapse').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('active');
        });

        document.addEventListener('DOMContentLoaded', () => {
            loadGroups();
            loadStats();
        });
    </script>
</body>

</html>