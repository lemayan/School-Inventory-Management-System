# 📦 PHP Inventory Management System

A powerful, web-based inventory and resource management system built using **Core PHP**, **MySQL**, **jQuery**, and **Bootstrap**. Ideal for schools or small organizations to manage products, orders, users, stock levels, and reports.

---

## ⚙️ Tech Stack

### 🔙 Backend
- PHP (Core PHP)
- MySQL Database
- PHP Sessions for user authentication

### 🌐 Frontend
- HTML5, CSS3
- JavaScript (jQuery)
- Bootstrap 3
- Font Awesome
- jQuery UI
- FullCalendar
- DataTables
- Custom CSS

### 📄 PDF Generation
- mPDF (used for invoice export)

### 📁 File Uploads
- Bootstrap File Input (for CSV/Excel import)

---

## 🚀 Features

- 🔐 **User Authentication** with session management
- 🛡️ **Role-Based Access Control** (Admin/User)
- 📊 **Dashboard** with product/order/revenue stats
- 🏷️ **Brand & Category Management** (Add/Edit/Delete)
- 📦 **Product Management** with real-time stock tracking
- 🛒 **Order Management** with invoice generation (PDF)
- 📈 **Reports**: Sales, inventory, and user-wise sales
- 👥 **User Management** (Add/Edit/Delete by Admin)
- ⚙️ **Settings** for company info and logo
- 📉 **Low Stock Alerts** for quick reordering
- 🖥️ **Responsive Design** (desktop & mobile)
- 🔐 **Access Control** for protected routes

---

## 📁 Project Structure

├── php_action/ # PHP logic, queries, and DB connections'
├── includes/ # Header, footer, and reusable UI parts'
├── assets/ # CSS, JS, fonts, and libraries'
echo '├── custom/ # Custom styles and logic'
echo '├── index.php # Login screen'
echo '├── dashboard.php # Admin dashboard'
echo '└── ... # Other modules (product.php, order.php, etc.)'
echo '```'
echo ""
echo "---"
echo "## 🛠️ Setup Instructions"
echo ""
echo "Follow these steps to get the project up and running on your local machine."
echo ""
echo "### 1️⃣ Clone the repository"
echo ""
echo '```bash'
echo 'git clone [https://github.com/your-username/php-inventory-management-system.git](https://github.com/your-username/php-inventory-management-system.git)'
echo '```'
echo ""
echo "### 2️⃣ Import the MySQL Database"
echo ""
echo "1. Open **phpMyAdmin** or use a MySQL command-line interface."
echo "2. Create a new database named \`store\`."
echo "3. Import the provided \`store.sql\` file (located in the root of the cloned repository) into the newly created \`store\` database."
echo ""
echo "### 4️⃣ Set File Permissions"
echo ""
echo "Ensure your server environment has appropriate file permissions that allow for file uploads and PDF generation, as these features are part of the system."
echo ""
echo "---"
echo "## 🔑 Default Login Credentials"
echo ""
echo "After setup, you can log in with the following default credentials:"
echo ""
echo "* **Username:** \`admin\`"
echo "* **Password:** \`admin\`"
echo ""
echo "**⚠️ Please change these default credentials immediately after your first login for security reasons.**"
