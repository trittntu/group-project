# Welcome to Group Project

## How to setup project

### Prerequisites
- PHP >= 8.1
- Composer
- Node.js & npm (optional, for asset compilation)
- MySQL or SQLite database

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd group-project
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   - Edit `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=group_project
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Email configuration (Gmail SMTP)**
   - For email verification to work, configure Gmail SMTP in your `.env`:
   ```env
   MAIL_MAILER=smtp
   MAIL_HOST=smtp.gmail.com
   MAIL_PORT=587
   MAIL_USERNAME=your-email@gmail.com
   MAIL_PASSWORD=your_gmail_app_password
   MAIL_ENCRYPTION=tls
   MAIL_FROM_ADDRESS=your-email@gmail.com
   MAIL_FROM_NAME="Group Project"
   ```
   - **Important**: Use Gmail App Password, not your regular password
   - Generate App Password: Go to Google Account Settings → Security → 2-Step Verification → App passwords

5. **Run database migrations**
   ```bash
   php artisan migrate
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

7. **Access the application**
   - Open your browser and visit: `http://localhost:8000`

### Features
- User authentication (login, register, password reset)
- **Email verification required** - Users must verify their email before accessing the dashboard
- Dashboard with account management (protected by email verification)
- Profile settings and password change
- Responsive design with dark mode support
- Clean, modern UI following Notion design principles
- Gmail SMTP integration for email notifications


## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
