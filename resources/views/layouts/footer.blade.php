<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        /* Hover effect for links */
        .hover\:text-warning:hover {
            color: #ffc107; /* Change to your desired hover color */
            text-decoration: underline; /* Optional: underline on hover */
        }
    </style>
</head>
<body>
    <br>
    <footer class="bg-dark text-white text-center text-lg-start">
        <div class="container p-4">
            <div class="row">
                <!-- About Section -->
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Task Manager</h5>
                    <p>A simple and efficient task management system to help you stay organized and productive.</p>
                </div>

                <!-- Links Section -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
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

                <!-- Contact Section -->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <nav>
                        <ul class="list-unstyled mb-0">
                            <li><a href="mailto:support@taskmanager.com" class="text-light hover:text-warning">Email Us</a></li>
                            <li><a href="#" class="text-light hover:text-warning">FAQ</a></li>
                            <li><a href="#" class="text-light hover:text-warning">Support</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="text-center p-3 bg-dark text-white">
            © 2024 Task Manager. All rights reserved.
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
