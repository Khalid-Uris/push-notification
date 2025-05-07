<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Notification Bell Dropdown</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .dropdown-menu {
            width: 300px;
            border-radius: 10px;
            margin-top: 12px;
        }

        .dropdown-header {
            font-weight: bold;
            padding: 10px 15px;
        }

        .dropdown-menu li:hover {
            background-color: #f8f9fa;
            cursor: pointer;
        }

        .notification-bell {
            position: relative;
            font-size: 24px;
            cursor: pointer;
        }

        .notification-bell .badge {
            position: absolute;
            top: -5px;
            right: -10px;
        }

        body {
            padding: 50px;
            background-color: #f0f2f5;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-end">
        <div class="dropdown">
            <a class="nav-link dropdown-toggle notification-bell" href="#" id="notificationDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-bell"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                    17
                </span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notificationDropdown">
                <li class="dropdown-header d-flex justify-content-between align-items-center">
                    <span>Notifications</span>
                    <span class="badge bg-info text-white rounded-pill">17</span>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li class="px-3 py-2"><strong>Fauzan Khan</strong> shared your answer</li>
                <li class="px-3 py-2"><strong>Keanu Reeves</strong> promoted your question</li>
                <li class="px-3 py-2"><strong>Natalie Portman</strong> promoted your question</li>
                <li class="px-3 py-2"><strong>Keanu Reeves</strong> promoted your question</li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS + jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</body>

</html>
