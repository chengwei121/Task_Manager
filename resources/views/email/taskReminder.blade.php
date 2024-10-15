<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Reminder</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f4f4f4;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Email Container -->
                <div class="card my-4">
                    
                    <!-- Header -->
                    <div class="card-header bg-primary text-white text-center">
                        <h1>Task Reminder</h1>
                    </div>
                    
                    <!-- Body Content -->
                    <div class="card-body">
                        <p class="lead">Hi,</p>
                        <p>{{ $messageContent }}</p>
                        
                        <!-- Call to Action Button -->
                        <div class="text-center my-4">
                            <a href="{{ $taskLink }}" class="btn btn-success btn-lg">View Task</a>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-center text-muted">
                        &copy; 2024 Task Manager. All rights reserved.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
