# TaskFlow - Modern Task Management System

## Overview
TaskFlow is a modern, user-friendly task management system built with Laravel that helps users organize, track, and manage their tasks efficiently. With its intuitive interface and powerful features, TaskFlow makes task management seamless and productive.

![TaskFlow Dashboard](public/images/task_management.png)

## Features

### 🔐 User Authentication & Security
- Secure login and registration system
- Password reset functionality with email notifications
- Protected routes and user-specific task management
- CSRF protection and data validation

### 📋 Task Management
- Create, Read, Update, and Delete (CRUD) tasks
- Task prioritization (High, Medium, Low)
- Due date tracking and reminders
- Task status tracking (Completed, In Progress, Due Soon)
- Task categorization and filtering

### 📊 Dashboard Overview
- At-a-glance task statistics
- Total tasks counter
- Completed tasks tracker
- In-progress task monitoring
- Due soon notifications

### 🔍 Search & Filter
- Real-time task search functionality
- Priority-based filtering
- Status-based filtering
- Category-based organization
- Advanced filter combinations

### 📱 Modern UI/UX
- Clean and intuitive interface
- Responsive design for all devices
- Interactive task cards
- Visual priority indicators
- Status badges and progress tracking

### 📧 Notification System
- Due date reminders
- Task status updates
- Email notifications
- Custom notification preferences

## Technical Stack

- **Frontend**: HTML5, CSS3, JavaScript, Bootstrap 5
- **Backend**: Laravel PHP Framework
- **Database**: MySQL
- **Authentication**: Laravel Breeze/Sanctum
- **Email**: Laravel Mail with SMTP
- **CSS Preprocessor**: SASS
- **Version Control**: Git

## Installation

1. Clone the repository:
```bash
git clone https://github.com/yourusername/TaskFlow.git
```

2. Install dependencies:
```bash
composer install
npm install
```

3. Copy .env.example to .env and configure your environment:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations:
```bash
php artisan migrate
```

6. Start the development server:
```bash
php artisan serve
npm run dev
```

## Usage

1. Register a new account or login
2. Create new tasks using the "New Task" button
3. Set task priority, due date, and description
4. Track task progress through the dashboard
5. Use filters to organize and find tasks
6. Mark tasks as complete when finished

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Contact

For any queries or support, please contact [your-email@example.com]

## Acknowledgments

- Laravel Framework
- Bootstrap Team
- All contributors and supporters
