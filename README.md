# 📦 Full-Stack School Inventory Management System

A comprehensive, web-based inventory management solution specifically designed for educational institutions and small organizations. Built with **Core PHP**, **MySQL**, **jQuery**, and **Bootstrap**, this system provides complete control over inventory, orders, user management, and financial reporting - fully localized for **Kenya** with KSh currency and VAT integration.

## 🌟 **Why This System?**

This isn't just another inventory system - it's a complete business solution that has been carefully crafted and localized for the Kenyan market. Whether you're managing a school store, small business, or organization, this system provides everything you need to track inventory, process orders, manage users, and generate comprehensive reports.

**✨ Kenya-Ready Features:**
- 💰 **Kenyan Shilling (KSh)** currency integration throughout
- 🏛️ **16% VAT calculation** compliant with Kenya tax regulations  
- 🇰🇪 **Kenya-specific payment locations** (Within Kenya/Outside Kenya)
- 📋 **VAT PIN support** for tax compliance
- 🧾 **Professional invoices** with Kenya banking details

---

## 🚀 **Core Features**

### 🔐 **User Management & Security**
- **Secure Authentication** with PHP sessions
- **Role-Based Access Control** (Admin/Standard User)
- **User Profile Management** with customizable permissions
- **Password Security** with hashed authentication

### 📊 **Smart Dashboard**
- **Real-time Analytics** - Revenue tracking in KSh
- **Visual Statistics** - Products, orders, and user activity
- **Low Stock Alerts** - Never run out of essential items
- **Quick Actions** - Access frequently used features instantly

### 🏷️ **Product & Inventory Management**
- **Complete Product Catalog** with categories and brands
- **Real-time Stock Tracking** with automatic updates
- **Image Management** for product visualization
- **Excel Import/Export** for bulk operations
- **Advanced Search & Filtering**

### 🛒 **Order Processing System**
- **Professional Invoice Generation** (PDF export)
- **Multiple Payment Types** (Cash, Cheque, Credit Card)
- **Payment Status Tracking** (Full/Advance/No Payment)
- **Kenya VAT Calculations** (16% standard rate)
- **Automatic Order Numbering**

### 📈 **Comprehensive Reporting**
- **Sales Reports** with date range filtering
- **Inventory Reports** with stock levels
- **User-wise Sales Analysis**
- **Revenue Tracking** in Kenyan Shillings
- **Export to PDF/Excel** capabilities

### ⚙️ **System Configuration**
- **Company Settings** with logo management
- **Customizable Tax Rates** (Kenya VAT ready)
- **Payment Method Configuration**
- **User Role Management**

---

## ⚙️ **Tech Stack**

### 🔙 **Backend Technologies**
- **PHP 7.4+** (Core PHP - No frameworks, pure performance)
- **MySQL 5.7+** (Robust relational database)
- **PHP Sessions** (Secure user authentication)
- **mPDF Library** (Professional PDF generation)

### 🌐 **Frontend Technologies**
- **HTML5 & CSS3** (Modern web standards)
- **JavaScript & jQuery 3.x** (Dynamic user interactions)
- **Bootstrap 3.4** (Responsive design framework)
- **Font Awesome** (Beautiful iconography)
- **DataTables** (Advanced table management)
- **jQuery UI** (Enhanced user interface)
- **FullCalendar** (Date management)

### �️ **Development Tools**
- **PHPExcel** (Excel import/export functionality)
- **Bootstrap File Input** (Advanced file uploads)
- **Custom CSS** (Tailored styling)
- **Responsive Design** (Mobile-first approach)

---

## 🎯 **Perfect For**

- 🏫 **Schools & Educational Institutions** - Manage school store inventory
- 🏢 **Small to Medium Businesses** - Complete inventory solution
- 🏪 **Retail Stores** - Point of sale and inventory tracking
- 🛒 **E-commerce Businesses** - Backend inventory management
- 🏥 **Healthcare Facilities** - Medical supply tracking
- 🏭 **Manufacturing Units** - Raw material management

---

## � **System Screenshots**

*Dashboard Overview*
- Real-time revenue tracking in KSh
- Product and order statistics
- Low stock alerts
- User activity monitoring

*Order Management*
- Professional invoice generation
- Kenya VAT calculations (16%)
- Multiple payment options
- Payment status tracking

*Inventory Control*
- Complete product catalog
- Stock level monitoring
- Category and brand management
- Image upload capabilities

---

## � **Quick Start Guide**

### 📋 **Prerequisites**
- **XAMPP/WAMP/MAMP** (PHP 7.4+ and MySQL 5.7+)
- **Web Browser** (Chrome, Firefox, Edge, Safari)
- **Text Editor** (VS Code, Sublime Text, or any IDE)

### 1️⃣ **Clone the Repository**
```bash
git clone https://github.com/yourusername/Full-Stack-School-Inventory-Management-System.git
cd Full-Stack-School-Inventory-Management-System
```

### 2️⃣ **Database Setup**
1. Start your **XAMPP/WAMP** server (Apache + MySQL)
2. Open **phpMyAdmin** in your browser: `http://localhost/phpmyadmin`
3. Create a new database named `store`
4. Import the SQL file: `database/store.sql`

### 3️⃣ **Configuration**
1. Open `php_action/db_connect.php`
2. Update database credentials if needed:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";
```

### 4️⃣ **Launch the Application**
1. Place the project in your web server directory (e.g., `htdocs/`)
2. Open your browser and navigate to: `http://localhost/Full-Stack-School-Inventory-Management-System`
3. Login with default credentials:
   - **Username:** `admin`
   - **Password:** `admin`

**⚠️ Important:** Change default credentials immediately after first login!

---

## 📁 **Project Architecture**

```
📦 School-Inventory-Management-System/
├── 📂 php_action/          # Backend logic & database operations
│   ├── db_connect.php      # Database connection & config
│   ├── createOrder.php     # Order processing logic
│   ├── createProduct.php   # Product management
│   └── ...                 # Other PHP actions
├── 📂 includes/            # Reusable components
│   ├── header.php          # Common header
│   └── footer.php          # Common footer
├── 📂 assets/              # Frontend resources
│   ├── bootstrap/          # Bootstrap framework
│   ├── jquery/             # jQuery library
│   ├── font-awesome/       # Icon fonts
│   └── plugins/            # Additional plugins
├── 📂 custom/              # Custom styles & scripts
│   ├── css/custom.css      # Custom styling
│   └── js/                 # Custom JavaScript files
├── 📂 database/            # Database schema
│   └── store.sql           # MySQL database dump
├── 📂 libraries/           # External libraries
│   └── phpexcel/           # Excel handling
├── 📄 index.php            # Login page
├── 📄 dashboard.php        # Main dashboard
├── 📄 orders.php           # Order management
├── 📄 product.php          # Product management
├── 📄 user.php             # User management
└── 📄 README.md            # This file
```

---

## Localization Features

This system has been specifically adapted for the Kenyan market:

### 💰 **Currency Integration**

- Automatic currency formatting throughout the system
- Invoice generation 

### 🏛️ **Tax Compliance**
- **16% VAT** calculation (Kenya standard rate)
- **VAT PIN** field for tax compliance
- Export VAT handling for international orders
- Professional invoice templates with tax breakdowns

### 🇰🇪 **Payment Locations**
- **Within Kenya** - Standard VAT application
- **Outside Kenya** - Export VAT handling
- Compliant with Kenya Revenue Authority requirements

---

## 🔒 **Security Features**

- **SQL Injection Protection** - Prepared statements
- **Session Management** - Secure user sessions
- **Password Hashing** - Encrypted password storage
- **Access Control** - Role-based permissions
- **Input Validation** - Server-side data validation
- **CSRF Protection** - Form token validation

---

## 🤝 **Contributing**

We welcome contributions! Here's how you can help:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** your changes (`git commit -m 'Add some AmazingFeature'`)
4. **Push** to the branch (`git push origin feature/AmazingFeature`)
5. **Open** a Pull Request

### 🐛 **Bug Reports**
- Use the GitHub Issues tab
- Provide detailed description
- Include steps to reproduce
- Mention your environment (OS, PHP version, etc.)

### 💡 **Feature Requests**
- Check existing issues first
- Describe the feature clearly
- Explain why it would be useful

---

## 📜 **License**

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

---

## 🙏 **Acknowledgments**

- **Bootstrap Team** - For the excellent responsive framework
- **jQuery Foundation** - For the powerful JavaScript library
- **Font Awesome** - For the comprehensive icon set
- **mPDF** - For professional PDF generation
- **Kenya Revenue Authority** - For VAT guidelines and compliance requirements

---

## � **Support & Contact**

- 🐛 **Issues:** [GitHub Issues](https://github.com/yourusername/Full-Stack-School-Inventory-Management-System/issues)
- 📧 **Email:** your.email@example.com
- 💬 **Discussions:** [GitHub Discussions](https://github.com/yourusername/Full-Stack-School-Inventory-Management-System/discussions)

---

## 🚀 **What's Next?**

**Planned Features:**
- 📱 Mobile app integration
- 🔔 Email notifications
- 📊 Advanced analytics dashboard
- 🌐 Multi-language support
- ☁️ Cloud deployment options
- 🔄 API development for third-party integrations

---

**⭐ If this project helped you, please give it a star! It helps others discover this solution.**

**🇰🇪 Proudly made for Kenya - Ready for global use!**
```
echo "**⚠️ Please change these default credentials immediately after your first login for security reasons.**"
