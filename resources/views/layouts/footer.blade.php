<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Task Manager</title>
    <style>
        /* Body and HTML to allow for full height */
        html, body {
            height: 100%;
            margin: 0;
        }

        /* Use Flexbox for the layout */
        body {
            display: flex;
            flex-direction: column;
        }

        /* Main content area */
        .content {
            flex: 1; /* This allows the content to grow and take up available space */
        }

        /* Footer styles */
        .footer {
            background-color: #343a40; /* Dark background */
            color: white;
        }

        .footer .social-icons a {
            color: white; /* White icons */
            margin-right: 15px;
            font-size: 24px; /* Icon size */
        }

        .footer h5 {
            color: #ffc107; /* Yellow headings */
        }

        .footer .card {
            background-color: #343a40; /* Match footer background */
            border: none; /* No border */
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Main content goes here -->
    </div>

    <footer class="footer text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <!-- About Section -->
                <div class="col-lg-4 col-md-12 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase">About Task Manager</h5>
                            <p>A simple and efficient task management system to help you stay organized and productive.</p>
                        </div>
                    </div>
                </div>

                <!-- Quick Links Section -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase">Quick Links</h5>
                            <nav>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#" class="text-light hover:text-warning">Home</a></li>
                                    <li><a href="#" class="text-light hover:text-warning">Features</a></li>
                                    <li><a href="#" class="text-light hover:text-warning">Pricing</a></li>
                                    <li><a href="#" class="text-light hover:text-warning">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-uppercase">Contact Us</h5>
                            <nav>
                                <ul class="list-unstyled mb-0">
                                    <li><a href="mailto:support@taskmanager.com" class="text-light hover:text-warning">Email Us</a></li>
                                    <li><a href="#" class="text-light hover:text-warning">FAQ</a></li>
                                    <li><a href="#" class="text-light hover:text-warning">Support</a></li>
                                </ul>
                            </nav>
                            <div class="social-icons mt-3">
                                <a href="#" class="bi bi-facebook"></a>
                                <a href="#" class="bi bi-twitter"></a>
                                <a href="#" class="bi bi-instagram"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="text-center p-3 bg-dark">
            © 2024 Task Manager. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> <!-- Bootstrap Icons -->
</body>
</html>
