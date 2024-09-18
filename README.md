# Frontend Review Plugin

**Description:** A simple and powerful plugin that allows users to submit reviews from the front end using a custom review form. This plugin includes Ajax submission, custom post type for reviews, and custom fields like name, date of birth, and company name.

---

## Table of Contents

1. [Installation](#installation)
2. [Features](#features)
3. [Usage Instructions](#usage-instructions)

---

## Installation

### From WordPress Admin Dashboard

1. Download the plugin ZIP file from the repository.
2. Go to your WordPress admin panel.
3. Navigate to **Plugins > Add New**.
4. Click **Upload Plugin** and select the downloaded `.zip` file.
5. Click **Install Now** and then **Activate** the plugin.

### Manual Installation

1. Download the plugin ZIP file.
2. Unzip the file.
3. Upload the unzipped folder to `/wp-content/plugins/` directory via FTP.
4. Activate the plugin from **Plugins > Installed Plugins**.

---

## Features

- Custom post type for reviews.
- Custom fields: name, date of birth, company name.
- Front-end review submission form.
- Ajax-powered form submission.
- Validation with sanitization and escaping to ensure secure form inputs.
- Admin interface to manage reviews from the WordPress dashboard.

---

## Usage Instructions

### Adding the Review Form to the Frontend

To display the review submission form on a page or post, use the following shortcode:

```php
[review_form]

