
-----

# 🌱 FarmConnect

**Bridging the gap between Farmers, Consumers, and Workers.**

FarmConnect is a web application designed to tackle the issue of rising food prices in Nigeria by eliminating middlemen from the supply chain. By connecting farmers directly to consumers, we ensure fresh produce at lower costs. Additionally, the platform combats unemployment by providing a dedicated space for agricultural job opportunities.

## 🚀 The Problem & Solution

  * **The Problem:** High food inflation driven by intermediaries and a lack of accessible platforms for farm-related employment.
  * **The Solution:** A unified platform where:
      * **Farmers** can sell directly to households and hire labor.
      * **Consumers** can buy fresh produce at fair prices.
      * **Workers** can find gainful employment in the agricultural sector.

## 📸 Screenshots
![Platform preview](screenshots/farmconnect1.png)
![Job page](screenshots/farmconnect2.png)
![Job details page](screenshots/farmconnect3.png)
![Product page](screenshots/farmconnect4.png)
![Product details page](screenshots/farmconnect5.png)
![Farmers page](screenshots/farmconnect6.png)

## ✨ Key Features

### 👨‍🌾 For Farmers

  * **Product Management:** Post, edit, and delete farm products with ease.
  * **Job Creation:** Post job openings for specific needs (e.g., *Farming Machinery*, *Farming Tools* operations).
  * **Recruitment:** View applicant profiles and cover letters. Accept or reject job applications.

### 🛒 For Consumers

  * **Direct Purchasing:** Browse products by category (Fruits, Vegetables, Meat, Fish, Grains, Legumes, Eggs, Dairy, etc.).
  * **Shopping Cart:** Select specific quantities and add items to a cart for checkout.

### 👷 For Workers

  * **Job Search:** Browse available farm jobs.
  * **Easy Application:** Apply directly with a cover letter.
  * **Application Tracking:** Monitor the status of applications (Pending, Accepted, Rejected) and withdraw applications if necessary.

## 🛠️ Tech Stack

  * **Frontend:** HTML5, CSS3, Bootstrap (Responsive Design), JavaScript.
  * **Backend:** PHP (Native).
  * **Database:** MySQL (Managed via phpMyAdmin).

## 💻 Installation & Setup

To run this project locally, you will need a local server environment like **XAMPP**, **WAMP**, or **MAMP**.

1.  **Clone the Repository**
    Navigate to your local server's root directory (e.g., `htdocs` for XAMPP or `www` for WAMP).

    ```bash
    cd htdocs
    git clone https://github.com/Otormin/FarmConnect.git
    ```

2.  **Database Setup**

      * Open **phpMyAdmin** in your browser (usually `http://localhost/phpmyadmin`).
      * Create a new database named `farmconnect` (or check the SQL file for the specific name).
      * Import the SQL file found in the root of the project folder (often named `farmconnect.sql` or `database.sql`).

3.  **Configure Database Connection**

      * Locate the database connection file (e.g., `connect.php`, `config.php`, or `db.php`).
      * Ensure the credentials match your local setup:
        ```php
        $servername = "localhost";
        $username = "root";
        $password = ""; // Default XAMPP password is empty
        $dbname = "farmconnect";
        ```

4.  **Run the Application**

      * Open your browser and visit: `http://localhost/FarmConnect`

-----