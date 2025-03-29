# The Intern Blog - Laravel

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://tecnovice.cm/wp-content/themes/tecnovice/tecnovice/images/tecnovice-header-logo.png" width="400" alt="Laravel Logo"></a></p>

## Contributors

<p align="center">
<a href="https://github.com/Kamta-Rawlings">Kamta Rawlings,</a>
<a href="https://github.com/miclemabasie">Miclem Abasie,</a>
<a href="https://github.com/achirihilary">Achiri Hilary,</a>
<a href="https://github.com/israel">Tendia Israel</a>
</p>

## About The Project

This is a complete blog website built using the Laravel PHP framework. It provides a robust platform for creating, managing, and publishing blog content with modern features and an intuitive user interface.

Key features include:
- User authentication and authorization
- CRUD operations for blog posts
- Categories and tags management
- Comments system
- Responsive design
- Admin dashboard
- Search functionality

## Built With

- [Laravel 9.x](https://laravel.com) - The PHP Framework For Web Artisans
- [Bootstrap 5](https://getbootstrap.com) - Popular CSS Framework
- [MySQL](https://www.mysql.com) - Database System
- [jQuery](https://jquery.com) - JavaScript Library
- [Font Awesome](https://fontawesome.com) - Icon Toolkit

## Getting Started

Follow these instructions to get a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL
- Node.js and npm

**Make sure XAMPP is running and MYSQL service is started**

### Installation

1. Clone the repository
   ```bash
   git clone https://github.com/Kamta-Rawlings/Intern_Blog.git
   ```
2. Install PHP dependencies
   ```bash
   composer install
   ```
3. Install JavaScript dependencies
   ```bash
   npm install
   ```
4. Create a copy of your .env file
   ```bash
   cp .env.example .env
   ```
5. Generate an app encryption key
   ```bash
   php artisan key:generate
   ```
6. Create an empty database and add the database information to your .env file
7. Run database migrations
   ```bash
   php artisan migrate
   ```
8. Seed the database (optional)
   ```bash
   php artisan db:seed
   ```
9. Compile frontend assets
   ```bash
   npm run dev
   ```
10. Start the development server
    ```bash
    php artisan serve
    ```

## Project Structure

```
blog-website/
├── app/                # Core application code
│   ├── Http/           # Controllers and middleware
│   ├── Models/         # Database models
│   └── ...            
├── config/             # Configuration files
├── database/           # Database migrations and seeds
├── public/             # Publicly accessible files
├── resources/          # Views, assets, and language files
│   ├── js/             # JavaScript files
│   ├── sass/          # Sass files
│   └── views/          # Blade templates
├── routes/             # Route definitions
├── storage/            # Storage for logs, cache, etc.
├── tests/              # Automated tests
└── vendor/             # Composer dependencies
```

## Features

### User Management
- Registration and login system
- Password reset functionality
- User roles (Admin, Author, User)
- Profile management

### Blog Features
- Create, read, update, and delete posts
- Image uploads

### Comments System
- Authenticated users can comment
- Users can delete their own comments
- Site admin can delete any comment

### Admin Dashboard
- User management
- Content moderation

## Environment Variables

The following environment variables need to be set in your `.env` file:

```
APP_NAME="Blog Website"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

## Deployment

To deploy this project to a production environment:

1. Set `APP_ENV=production` and `APP_DEBUG=false` in your `.env` file
2. Optimize the application:
   ```bash
   php artisan optimize
   ```
3. Compile assets for production:
   ```bash
   npm run prod
   ```
4. Configure your web server (Apache/Nginx) to point to the `public/` directory
5. Set up proper file permissions for the `storage/` and `bootstrap/cache/` directories

## Contributing
Read the [CONTRIBUTING](CONTRIBUTING.md) to understand the project

## License

Distributed under the MIT License. See `LICENSE` for more information.

## Contact

Project Link: [https://github.com/Kamta-Rawling/](https://github.com/Kamta-Rawling/)

## Acknowledgments

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [Font Awesome](https://fontawesome.com)