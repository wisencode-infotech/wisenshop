# WisenShop - eCommerce Store

## Installation Instructions

### 1. Clone the Repository

Clone the repository to your local machine using the following command:

```git clone https://github.com/wisencode-infotech/wisenshop.git```

### 2. Navigate to Project Folder

Change to your project directory:

```cd /path-to-your-project-folder```

### 3. Set Up Environment File

Copy the `.env.example` file to `.env`:

```cp .env.example .env```

### 4. Install composer packages

```composer install```

### 5. Generate Application Key

Generate the application key for your project:

```php artisan key:generate```

### 6. Start the Development Server

You can run the Laravel development server using:

```php artisan serve```

This will start your application at `http://127.0.0.1:8000` by default.

---

## Two Ways to Install the Script

### 1. Web Installer

To install the script through the web interface:

- Visit `your-domain.com/install` in your browser.
- Add your server and database information.
- Complete the installation process.

### 2. CLI Installer (Command Line Interface)

To install using the command line:

```php artisan wisenshop:fresh-install```

**Note:**
- The super admin username will be `admin@wisenshop.com`.
- The super admin password will be `wisenshop450#!`.

---

## Build Frontend Assets

After installing, run the following commands to build your frontend assets.

- For development:

```npm run development```

- For production:

```npm run production```

Choose the command based on your platform and environment.

---

## Backend URL

Once the installation is complete, you can access the backend panel at:

your-domain.com/backend

---
