# WisenShop - eCommerce store script

### Installation instructions

### 1. Clone the repository

Clone the repository to your local machine using the following command:

```git clone https://github.com/wisencode-infotech/wisenshop.git```

### 2. Navigate to the project directory

Change to your project directory:

```cd /path-to-your-project-folder```

### 3. Setup the environment file

Copy the `.env.example` file to `.env`:

```cp .env.example .env```

### 4. Install composer packages

```composer install```

### 5. Generate application key

Generate the application key for your project:

```php artisan key:generate```

### 6. Start deploying server if needed

You can run the Laravel development server using:

```php artisan serve```

This will start your application at `http://127.0.0.1:8000` by default.

### 7. Installing the script

- Two Ways to Install the Script

    #### 1. Web Installer

    To install the script through the web interface:
    
    - Visit `your-domain.com/install` in your browser.
    - Add your server and database information.
    - Complete the installation process.

    #### 2. CLI Installer (Command Line Interface)
    
    To install using the command line:
    
    ```php artisan wisenshop:fresh-install```

    **Note:**
    - The super admin username will be `admin@wisenshop.com`.
    - The super admin password will be `wisenshop450#!`.

### 8. Build assets/resources using npm

```npm install```

After installing, run the following commands to build your frontend assets.

- For development:

```npm run development```

- For production:

```npm run production```

Choose the command based on your platform and environment.

###9. Projects assets accessibility settings

```php artisan storage:link```

---

### Additional Notes

**Backend URL**

    Once the installation is complete, you can access the backend panel at:

    your-domain.com/backend

**Email notifications**

    > Email notifications are being set as queue (background jobs) so please setup supervisor or cron to execute the jobs at specific interval.
    > For development, you can try php artisan queue:listen to execute the pending jobs
