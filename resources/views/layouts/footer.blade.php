<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <title>Task Manager</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        footer {
            background-color: #f8f9fa;
            padding: 2rem 0;
            margin-top: 2rem;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links a {
            color: #6c757d;
            text-decoration: none;
        }

        .social-links a {
            color: #6c757d;
            margin-right: 1rem;
            font-size: 1.2rem;
        }

        .footer-bottom {
            border-top: 1px solid #dee2e6;
            margin-top: 2rem;
            padding-top: 1rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <!-- Main content goes here -->
    </div>

    <footer>
        <div class="container">
            <div class="row g-4">
                <!-- App Info -->
                <div class="col-md-4">
                    <h4>TaskFlow</h4>
                    <p>Empower your productivity with our intuitive task management platform.</p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-2">
                    <h5>Product</h5>
                    <ul class="footer-links">
                        <li><a href="#">Features</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Updates</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="col-md-2">
                    <h5>Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-md-4">
                    <h5>Stay Connected</h5>
                    <div class="social-links mb-3">
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">&copy; {{ date('Y') }} TaskFlow. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="me-3">Terms</a>
                        <a href="#" class="me-3">Privacy</a>
                        <a href="#">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
