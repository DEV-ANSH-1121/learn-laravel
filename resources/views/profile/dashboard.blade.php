<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">My Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
            </ul>
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mt-5">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item active">Dashboard</li>
                <li class="list-group-item">Users</li>
                <li class="list-group-item">Reports</li>
                <li class="list-group-item">Settings</li>
            </ul>
        </div>

        <!-- Main Dashboard Content -->
        <div class="col-md-9">
            <h1>Welcome to Your Dashboard</h1>
            <p>This is your main dashboard where you can manage various aspects of your application.</p>
            
            <!-- Statistics Cards -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Total Users</div>
                        <div class="card-body">
                            <h5 class="card-title">150</h5>
                            <p class="card-text">Users currently registered on the platform.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Active Sessions</div>
                        <div class="card-body">
                            <h5 class="card-title">75</h5>
                            <p class="card-text">Active users in the last 24 hours.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">Reports</div>
                        <div class="card-body">
                            <h5 class="card-title">10</h5>
                            <p class="card-text">Pending reports that require attention.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <h2 class="mt-4">Recent Activities</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User</th>
                        <th scope="col">Action</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>John Doe</td>
                        <td>Logged in</td>
                        <td>2024-09-07 12:45</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jane Smith</td>
                        <td>Updated Profile</td>
                        <td>2024-09-07 11:30</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Michael Brown</td>
                        <td>Uploaded a file</td>
                        <td>2024-09-07 10:15</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
