- [ WisenShop - eCommerce Store ]

- git clone https://github.com/wisencode-infotech/albertoshop.git

- cd /path-to-your-project-folder

- cp .env.example .env

- php artisan key:generate

- php artisan serve

==============================
2 Ways to install the script
==============================

1. Web installer

   > your-domain.com/install, add your server and DB info and finish the installation.

2. CLI installer

   > php artisan wisenshop:fresh-install

     Note : Super admin username and password will be admin@wisenshop.com and wisenshop450#! respectively.

- Execute the other build commands:

   > npm run development or npm run production based on your platform

=================================
Backend URL
=================================

your-domain.com/backend

# WisenShop - eCommerce Store

## Installation Instructions

### 1. Clone the Repository

Clone the repository to your local machine using the following command:

```bash git clone https://github.com/wisencode-infotech/albertoshop.git

### 2. Navigate to Project Folder

Change to your project directory:

```bash cd /path-to-your-project-folder

### 3. Set Up Environment File

Copy the `.env.example` file to `.env`:

```bash cp .env.example .env

### 4. Generate Application Key

Generate the application key for your project:

```bash php artisan key:generate

### 5. Start the Development Server

You can run the Laravel development server using:

```bash php artisan serve

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

```bash php artisan wisenshop:fresh-install

**Note:**
- The super admin username will be `admin@wisenshop.com`.
- The super admin password will be `wisenshop450#!`.

---

## Build Frontend Assets

After installing, run the following commands to build your frontend assets.

- For development:

```bash npm run development

- For production:

```bash npm run production

Choose the command based on your platform and environment.

---

## Backend URL

Once the installation is complete, you can access the backend panel at:

your-domain.com/backend

---