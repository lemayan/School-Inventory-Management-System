# System Design Specification (SDS)
## School Inventory Management System

**Document Version:** 1.0  
**Date:** August 2, 2025  
**Author:** lemayan leleina  
**Project:** School Inventory Management System  

---

## 1.0 Definition of Terms

**API (Application Programming Interface):** A set of protocols and tools for building software applications.

**AJAX (Asynchronous JavaScript and XML):** A web development technique for creating interactive web applications.

**Bootstrap:** A front-end framework for developing responsive, mobile-first websites.

**CRUD Operations:** Create, Read, Update, and Delete - the four basic functions of persistent storage.

**CSS (Cascading Style Sheets):** A stylesheet language used for describing the presentation of a document written in HTML.

**Database Management System (DBMS):** Software that handles the storage, retrieval, and updating of data in a database.

**HTML (HyperText Markup Language):** The standard markup language for creating web pages.

**IMS:** Inventory Management System - the core application for managing inventory operations.

**JavaScript:** A programming language that enables interactive web pages and dynamic content.

**jQuery:** A JavaScript library designed to simplify HTML DOM tree traversal and manipulation.

**JSON (JavaScript Object Notation):** A lightweight data-interchange format.

**KSh (Kenyan Shilling):** The official currency of Kenya used throughout the system.

**MySQL:** An open-source relational database management system.

**mPDF:** A PHP library for generating PDF documents from HTML and CSS.

**PDF (Portable Document Format):** A file format used to present documents independently of application software.

**PHP (PHP: Hypertext Preprocessor):** A server-side scripting language designed for web development.

**Session Management:** The process of keeping track of user activity across multiple requests.

**SQL (Structured Query Language):** A domain-specific language used for managing data in relational databases.

**UI (User Interface):** The means by which a user interacts with a computer system.

**VAT (Value Added Tax):** A consumption tax placed on products at each stage of the supply chain.

**XAMPP:** A free, open-source cross-platform web server solution stack package.

---

## 2.0 Introduction

### 2.1 Purpose

The School Inventory Management System is a comprehensive web-based application designed to automate and streamline inventory operations for educational institutions and small organizations. The system provides complete control over product management, order processing, user administration, and financial reporting with specific localization for the Kenyan market.

### 2.2 Scope

This system encompasses:
- **Product Management:** Complete catalog management with categories, brands, and stock tracking
- **Order Processing:** End-to-end order management with invoice generation
- **User Administration:** Role-based access control and user management
- **Financial Reporting:** Comprehensive analytics and reporting capabilities
- **Kenya Localization:** KSh currency integration and 16% VAT compliance
- **Security Management:** Authentication, authorization, and data protection

### 2.3 System Overview

The School Inventory Management System is built using modern web technologies including Core PHP, MySQL, Bootstrap, and jQuery. The system follows a modular architecture ensuring scalability, maintainability, and security. It provides a responsive user interface accessible from desktop and mobile devices.

### 2.4 Target Users

- **System Administrators:** Full system access and configuration
- **Inventory Managers:** Product and stock management
- **Sales Personnel:** Order processing and customer management
- **Finance Team:** Financial reporting and analytics
- **Educational Institutions:** Schools, colleges, and training centers
- **Small Businesses:** Retail stores and small organizations

---

## 3.0 Physical Design

### 3.1 System Architecture Overview

The School Inventory Management System employs a **three-tier web architecture** designed for scalability, maintainability, and performance:

```
┌─────────────────────────────────────────────────────────────┐
│                    PRESENTATION TIER                        │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   HTML5     │  │ Bootstrap 3 │  │    JavaScript       │  │
│  │    CSS3     │  │  Responsive │  │     jQuery          │  │
│  │ Font Awesome│  │   Design    │  │   DataTables        │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                   APPLICATION TIER                          │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  Core PHP   │  │   Session   │  │     Libraries       │  │
│  │ Business    │  │ Management  │  │   mPDF, PHPExcel    │  │
│  │   Logic     │  │ Security    │  │   File Processing   │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                     DATA TIER                               │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   MySQL     │  │  Database   │  │     Storage         │  │
│  │  Database   │  │ Procedures  │  │   File System       │  │
│  │   Tables    │  │ Functions   │  │  Images & Reports   │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

### 3.2 Server Infrastructure Design

**Web Server Configuration:**
- **Primary Server:** Apache HTTP Server 2.4+
- **Alternative:** Nginx (for high-traffic scenarios)
- **PHP Runtime:** PHP 7.4+ with FPM (FastCGI Process Manager)
- **Database Server:** MySQL 5.7+ or MariaDB 10.2+

**Load Distribution:**
```
Internet → Load Balancer → [Web Server 1, Web Server 2, Web Server N]
                              ↓
                        Shared Database Server
                              ↓
                        Shared File Storage
```

### 3.3 Network Topology

**Local Network Design:**
- **DMZ Zone:** Web servers with restricted access
- **Internal Zone:** Database server with enhanced security
- **Management Zone:** Administrative access and monitoring

**Security Layers:**
- **Firewall:** Port-based access control
- **SSL/TLS:** Encrypted data transmission
- **VPN:** Secure administrative access

### 3.4 Hardware Specifications

**Production Server (Recommended):**
- **CPU:** Intel Xeon or AMD EPYC, 8+ cores, 2.4GHz+
- **RAM:** 16GB minimum, 32GB recommended
- **Storage:** SSD 500GB+ for OS and applications, separate storage for database
- **Network:** Gigabit Ethernet with redundancy

**Development/Testing Server:**
- **CPU:** Quad-core, 2.0GHz+
- **RAM:** 8GB minimum
- **Storage:** SSD 250GB+
- **Network:** Standard Ethernet

---

## 4.0 Logical Design

### 4.1 Application Architecture Patterns

**Model-View-Controller (MVC) Pattern Implementation:**

```
┌─────────────────────────────────────────────────────────────┐
│                         VIEW LAYER                          │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  HTML Pages │  │   CSS/JS    │  │   User Interface    │  │
│  │ dashboard.php│  │  Bootstrap  │  │    Components       │  │
│  │ product.php │  │   jQuery    │  │   Modal Dialogs     │  │
│  │ orders.php  │  │DataTables   │  │     Forms           │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                      CONTROLLER LAYER                       │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   PHP       │  │  Business   │  │     Validation      │  │
│  │  Actions    │  │   Logic     │  │    & Security       │  │
│  │createOrder  │  │ Processing  │  │   Authentication    │  │
│  │editProduct  │  │   Rules     │  │   Authorization     │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                       MODEL LAYER                           │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  Database   │  │    Data     │  │    Business         │  │
│  │  Access     │  │   Objects   │  │     Entities        │  │
│  │  Objects    │  │    CRUD     │  │   Relationships     │  │
│  │fetch*.php   │  │ Operations  │  │     Rules           │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

### 4.2 Module Design Architecture

**Core System Modules:**

```
┌─────────────────────────────────────────────────────────────┐
│                    AUTHENTICATION MODULE                    │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │Login/Logout │  │   Session   │  │   Role-Based        │  │
│  │   System    │  │ Management  │  │Access Control (RBAC)│  │
│  │index.php    │  │core.php     │  │  User Permissions   │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│                  INVENTORY MODULE                           │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  Product    │  │ Categories  │  │      Brands         │  │
│  │ Management  │  │   & Stock   │  │   Management        │  │
│  │product.php  │  │  Tracking   │  │   brand.php         │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│                   ORDER PROCESSING MODULE                   │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   Order     │  │   Invoice   │  │     Payment         │  │
│  │ Management  │  │ Generation  │  │   Processing        │  │
│  │orders.php   │  │printOrder   │  │ VAT Calculations    │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘

┌─────────────────────────────────────────────────────────────┐
│                    REPORTING MODULE                         │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   Sales     │  │  Inventory  │  │    Financial        │  │
│  │  Analytics  │  │   Reports   │  │    Reports          │  │
│  │report.php   │  │  Dashboard  │  │  Revenue Tracking   │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

### 4.3 Data Flow Architecture

**Order Processing Workflow:**

```
User Login → Authentication → Dashboard → Order Creation
     ↓
Product Selection → Inventory Check → Price Calculation
     ↓
VAT Application → Payment Processing → Order Confirmation
     ↓
Invoice Generation → Inventory Update → Order Completion
```

**Inventory Management Workflow:**

```
Product Entry → Category Assignment → Brand Association
     ↓
Stock Level Setting → Image Upload → Activation
     ↓
Real-time Tracking → Low Stock Alerts → Reorder Notifications
```

### 4.4 Security Architecture Design

**Multi-Layer Security Implementation:**

```
┌─────────────────────────────────────────────────────────────┐
│                  PRESENTATION SECURITY                      │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   Input     │  │  Client-    │  │      Form           │  │
│  │ Validation  │  │   Side      │  │   Validation        │  │
│  │JavaScript   │  │ Sanitization│  │   CSRF Tokens       │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                  APPLICATION SECURITY                       │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   Session   │  │   Server-   │  │    SQL Injection    │  │
│  │ Management  │  │    Side     │  │    Prevention       │  │
│  │ Protection  │  │ Validation  │  │  Prepared Statements│  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                    DATA SECURITY                            │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  Password   │  │  Database   │  │     Access          │  │
│  │  Hashing    │  │ Encryption  │  │    Controls         │  │
│  │   MD5/SHA   │  │   At Rest   │  │   User Roles        │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

### 4.5 API Design (Future Enhancement)

**RESTful API Architecture:**

```
┌─────────────────────────────────────────────────────────────┐
│                     API ENDPOINTS                           │
│                                                             │
│  GET    /api/products          → List all products         │
│  POST   /api/products          → Create new product        │
│  GET    /api/products/{id}     → Get specific product      │
│  PUT    /api/products/{id}     → Update product            │
│  DELETE /api/products/{id}     → Delete product            │
│                                                             │
│  GET    /api/orders            → List all orders           │
│  POST   /api/orders            → Create new order          │
│  GET    /api/orders/{id}       → Get specific order        │
│  PUT    /api/orders/{id}       → Update order              │
│                                                             │
│  GET    /api/reports/sales     → Sales analytics           │
│  GET    /api/reports/inventory → Inventory reports         │
└─────────────────────────────────────────────────────────────┘
```

---

## 5.0 Database Design

### 5.1 Database Architecture

**Entity Relationship Diagram (ERD):**

```
┌─────────────────┐       ┌─────────────────┐       ┌─────────────────┐
│     USERS       │       │    PRODUCTS     │       │   CATEGORIES    │
├─────────────────┤       ├─────────────────┤       ├─────────────────┤
│ user_id (PK)    │       │ product_id (PK) │       │categories_id(PK)│
│ username        │       │ product_name    │       │ categories_name │
│ password        │       │ product_image   │       │categories_active│
│ email           │       │ brand_id (FK)   │       │categories_status│
└─────────────────┘       │ categories_id(FK)│       └─────────────────┘
         │                │ quantity        │                │
         │                │ rate            │                │
         │                │ active          │                │
         │                │ status          │                │
         │                └─────────────────┘                │
         │                         │                         │
         │                         │                         │
         │                ┌─────────────────┐                │
         │                │     BRANDS      │                │
         │                ├─────────────────┤                │
         │                │ brand_id (PK)   │                │
         │                │ brand_name      │                │
         │                │ brand_active    │                │
         │                │ brand_status    │                │
         │                └─────────────────┘                │
         │                                                   │
         │                                                   │
         ▼                                                   ▼
┌─────────────────┐       ┌─────────────────┐
│     ORDERS      │       │   ORDER_ITEM    │
├─────────────────┤       ├─────────────────┤
│ order_id (PK)   │◄──────┤order_item_id(PK)│
│ order_date      │       │ order_id (FK)   │
│ client_name     │       │ product_id (FK) │──────┐
│ client_contact  │       │ quantity        │      │
│ sub_total       │       │ rate            │      │
│ vat             │       │ total           │      │
│ total_amount    │       └─────────────────┘      │
│ discount        │                                │
│ grand_total     │                                │
│ paid            │                                │
│ due             │                                │
│ payment_type    │                                │
│ payment_status  │                                │
│ payment_place   │                                │
│ gstn            │                                │
│ order_status    │                                │
│ user_id (FK)    │                                │
└─────────────────┘                                │
                                                   │
                   ┌───────────────────────────────┘
                   ▼
         ┌─────────────────┐
         │    PRODUCTS     │
         │ (Referenced)    │
         └─────────────────┘
```

### 5.2 Database Schema Design

**Table Specifications with Constraints:**

**USERS Table:**
```sql
CREATE TABLE users (
    user_id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    status TINYINT(1) DEFAULT 1,
    PRIMARY KEY (user_id),
    INDEX idx_username (username),
    INDEX idx_status (status)
);
```

**PRODUCTS Table:**
```sql
CREATE TABLE product (
    product_id INT(11) NOT NULL AUTO_INCREMENT,
    product_name VARCHAR(255) NOT NULL,
    product_image VARCHAR(255),
    brand_id INT(11),
    categories_id INT(11),
    quantity INT(11) NOT NULL DEFAULT 0,
    rate DECIMAL(10,2) NOT NULL,
    active TINYINT(1) DEFAULT 1,
    status TINYINT(1) DEFAULT 1,
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (product_id),
    FOREIGN KEY (brand_id) REFERENCES brands(brand_id),
    FOREIGN KEY (categories_id) REFERENCES categories(categories_id),
    INDEX idx_brand (brand_id),
    INDEX idx_category (categories_id),
    INDEX idx_status (status),
    INDEX idx_quantity (quantity)
);
```

**ORDERS Table:**
```sql
CREATE TABLE orders (
    order_id INT(11) NOT NULL AUTO_INCREMENT,
    order_date DATE NOT NULL,
    client_name VARCHAR(255) NOT NULL,
    client_contact VARCHAR(255),
    sub_total DECIMAL(10,2) NOT NULL,
    vat DECIMAL(10,2) NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    discount DECIMAL(10,2) DEFAULT 0.00,
    grand_total DECIMAL(10,2) NOT NULL,
    paid DECIMAL(10,2) DEFAULT 0.00,
    due DECIMAL(10,2) NOT NULL,
    payment_type INT(1),
    payment_status INT(1),
    payment_place INT(1),
    gstn VARCHAR(255),
    order_status TINYINT(1) DEFAULT 1,
    user_id INT(11),
    created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (order_id),
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    INDEX idx_order_date (order_date),
    INDEX idx_client (client_name),
    INDEX idx_status (order_status),
    INDEX idx_user (user_id)
);
```

### 5.3 Database Optimization Design

**Indexing Strategy:**
- Primary keys for unique identification and fast lookups
- Foreign key indexes for join operations
- Composite indexes for frequently used query combinations
- Status-based indexes for filtering active records

**Query Optimization:**
```sql
-- Optimized query for dashboard revenue calculation
SELECT SUM(paid) as total_revenue 
FROM orders 
WHERE order_status = 1 
  AND order_date >= DATE_SUB(CURRENT_DATE, INTERVAL 30 DAY);

-- Optimized query for low stock alerts
SELECT p.product_name, p.quantity, c.categories_name, b.brand_name
FROM product p
JOIN categories c ON p.categories_id = c.categories_id
JOIN brands b ON p.brand_id = b.brand_id
WHERE p.quantity <= 3 AND p.status = 1;
```

### 5.4 Data Integrity Design

**Referential Integrity:**
- Foreign key constraints ensure data consistency
- Cascade delete operations where appropriate
- Prevent orphaned records through constraint validation

**Data Validation Rules:**
- Quantity cannot be negative
- Rates must be positive values
- Order totals must match calculated values
- User roles must be valid enumerated values

### 5.5 Backup and Recovery Design

**Backup Strategy:**
```sql
-- Daily backup script
mysqldump --single-transaction --routines --triggers store > backup_$(date +%Y%m%d).sql

-- Point-in-time recovery preparation
SET GLOBAL log_bin = ON;
SET GLOBAL expire_logs_days = 7;
```

**Recovery Procedures:**
- Full database restoration from backup files
- Point-in-time recovery using binary logs
- Table-level recovery for specific data corruption
- Automated backup verification and testing

---

## 6.0 User Interface Design

### 6.1 UI Architecture Framework

**Design System Hierarchy:**

```
┌─────────────────────────────────────────────────────────────┐
│                   DESIGN FRAMEWORK                          │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │  Bootstrap  │  │   Custom    │  │    Component        │  │
│  │    Grid     │  │    CSS      │  │     Library         │  │
│  │   System    │  │  Overrides  │  │   Font Awesome      │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                   INTERACTION LAYER                         │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │   jQuery    │  │ DataTables  │  │      AJAX           │  │
│  │ JavaScript  │  │   Plugin    │  │   Interactions      │  │
│  │  Library    │  │Enhanced UI  │  │  Real-time Updates  │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────┐
│                   PRESENTATION LAYER                        │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────────┐  │
│  │    HTML5    │  │  Responsive │  │    Accessibility    │  │
│  │  Semantic   │  │   Design    │  │     Features        │  │
│  │   Markup    │  │  Patterns   │  │   WCAG Compliance   │  │
│  └─────────────┘  └─────────────┘  └─────────────────────┘  │
└─────────────────────────────────────────────────────────────┘
```

### 6.2 Screen Layout Design

**Main Dashboard Layout:**
```
┌────────────────────────────────────────────────────────────┐
│  HEADER: Logo | Navigation Menu | User Profile | Logout    │
├────────────────────────────────────────────────────────────┤
│  BREADCRUMB: Home > Dashboard                              │
├────┬─────────────────────────────────────────────────┬─────┤
│    │               MAIN CONTENT AREA                 │     │
│    │  ┌─────────────┐  ┌─────────────┐             │     │
│  S │  │   Total     │  │    Low      │             │  Q  │
│  I │  │ Products    │  │   Stock     │             │  U  │
│  D │  │             │  │   Alert     │             │  I  │
│  E │  └─────────────┘  └─────────────┘             │  C  │
│    │  ┌─────────────┐  ┌─────────────┐             │  K  │
│  B │  │   Total     │  │  Revenue    │             │     │
│  A │  │  Orders     │  │ Tracking    │             │  A  │
│  R │  │             │  │  (KSh)      │             │  C  │
│    │  └─────────────┘  └─────────────┘             │  T  │
│    │                                               │  I  │
│    │         USER ORDERS TABLE                     │  O  │
│    │  ┌─────────────────────────────────────────┐  │  N  │
│    │  │ Order ID | Client | Amount | Status     │  │  S  │
│    │  │ #001     | John   | KSh500 | Completed  │  │     │
│    │  │ #002     | Mary   | KSh750 | Pending    │  │     │
│    │  └─────────────────────────────────────────┘  │     │
├────┴─────────────────────────────────────────────────┴─────┤
│  FOOTER: Copyright | Version | Support Links               │
└────────────────────────────────────────────────────────────┘
```

**Order Management Interface Design:**
```
┌────────────────────────────────────────────────────────────┐
│  HEADER NAVIGATION                                         │
├────────────────────────────────────────────────────────────┤
│  BREADCRUMB: Home > Orders > Add Order                    │
├────────────────────────────────────────────────────────────┤
│                    ORDER CREATION FORM                     │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  CLIENT INFORMATION                                  │  │
│  │  Order Date: [Date Picker]  Client Name: [________] │  │
│  │  Contact: [_______________]                          │  │
│  └──────────────────────────────────────────────────────┘  │
│                                                            │
│  ┌──────────────────────────────────────────────────────┐  │
│  │  PRODUCT SELECTION TABLE                             │  │
│  │  Product ▼ | Rate | Available | Qty | Total         │  │
│  │  [Select]  | 100  |    50     | [_] | [Calculated]  │  │
│  │  [+ Add Row]                                         │  │
│  └──────────────────────────────────────────────────────┘  │
│                                                            │
│  ┌─────────────────┐  ┌─────────────────────────────────┐  │
│  │ FINANCIAL CALC  │  │     PAYMENT INFORMATION         │  │
│  │ Sub Total: KSh  │  │ Payment Type: [Dropdown]        │  │
│  │ VAT 16%:  KSh   │  │ Payment Status: [Dropdown]      │  │
│  │ Discount: KSh   │  │ Payment Place: [Within Kenya]   │  │
│  │ Total:    KSh   │  │ VAT PIN: [________________]     │  │
│  │ Paid:     KSh   │  │ Due Amount: KSh [Calculated]    │  │
│  │ Due:      KSh   │  │                                 │  │
│  └─────────────────┘  └─────────────────────────────────┘  │
│                                                            │
│  [Save Order] [Reset Form] [Preview Invoice]              │
└────────────────────────────────────────────────────────────┘
```

### 6.3 Component Design Specifications

**Navigation Component:**
```html
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <brand>IMS - Inventory Management System</brand>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="product.php">Products</a></li>
      <li><a href="orders.php">Orders</a></li>
      <li><a href="user.php">Users</a></li>
      <li><a href="report.php">Reports</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="setting.php">Settings</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
  </div>
</nav>
```

**Data Table Component:**
```javascript
// Enhanced DataTable configuration
$('#manageOrderTable').DataTable({
    "ajax": "php_action/fetchOrder.php",
    "order": [],
    "columns": [
        {"data": "order_date"},
        {"data": "client_name"},
        {"data": "client_contact"},
        {"data": "payment_status"},
        {"data": "options", "orderable": false}
    ],
    "responsive": true,
    "processing": true,
    "serverSide": true,
    "pageLength": 25,
    "language": {
        "search": "Search Orders:",
        "lengthMenu": "Show _MENU_ orders per page",
        "info": "Showing _START_ to _END_ of _TOTAL_ orders"
    }
});
```

### 6.4 Responsive Design Strategy

**Breakpoint Design:**
```css
/* Mobile First Approach */
/* Base styles for mobile devices */
.dashboard-stats {
    display: block;
    width: 100%;
    margin-bottom: 15px;
}

/* Tablet styles */
@media (min-width: 768px) {
    .dashboard-stats {
        display: inline-block;
        width: 48%;
        margin-right: 2%;
    }
}

/* Desktop styles */
@media (min-width: 1024px) {
    .dashboard-stats {
        width: 23%;
        margin-right: 2%;
    }
    
    .sidebar {
        position: fixed;
        width: 250px;
    }
    
    .main-content {
        margin-left: 270px;
    }
}
```

### 6.5 User Experience (UX) Design Patterns

**Form Validation Design:**
```javascript
// Real-time form validation
function validateOrderForm() {
    const clientName = $('#clientName').val();
    const products = $('select[name="productName[]"]');
    
    // Client name validation
    if (clientName.length < 2) {
        showError('Client name must be at least 2 characters');
        return false;
    }
    
    // Product selection validation
    if (products.filter(function() { return $(this).val() !== ''; }).length === 0) {
        showError('Please select at least one product');
        return false;
    }
    
    return true;
}
```

**Loading States Design:**
```javascript
// Loading button states
function setLoadingState(button, loading) {
    if (loading) {
        button.attr('disabled', true)
              .data('original-text', button.text())
              .html('<i class="fa fa-spinner fa-spin"></i> Processing...');
    } else {
        button.attr('disabled', false)
              .html(button.data('original-text'));
    }
}
```

### 6.6 Accessibility Design

**WCAG 2.1 Compliance Features:**
- Semantic HTML structure for screen readers
- Keyboard navigation support
- High contrast color schemes
- Alternative text for images
- Focus indicators for interactive elements
- ARIA labels for complex components

**Implementation Example:**
```html
<button type="submit" 
        class="btn btn-primary"
        aria-label="Save order and generate invoice"
        tabindex="1">
    <i class="glyphicon glyphicon-ok-sign" aria-hidden="true"></i>
    Save Order
</button>
```

---

## 7.0 Minimum System Requirements

### 7.1 Server Requirements

**Operating System:**
- Windows 7/8/10/11 or Windows Server 2012+
- Linux (Ubuntu 16.04+, CentOS 7+)
- macOS 10.12+

**Web Server:**
- Apache 2.4+ (Recommended)
- Nginx 1.10+
- IIS 8.0+ (Windows)

**PHP Requirements:**
- PHP 7.4 or higher (Recommended: PHP 8.0+)
- Required Extensions:
  - mysqli
  - pdo_mysql
  - gd
  - json
  - session
  - mbstring
  - zip

**Database:**
- MySQL 5.7+ or MariaDB 10.2+
- Minimum 1GB database storage
- InnoDB storage engine support

**Memory and Storage:**
- RAM: Minimum 4GB, Recommended 8GB
- Storage: Minimum 20GB available space
- PHP Memory Limit: 256MB minimum

### 7.2 Client Requirements

**Web Browser Support:**
- Google Chrome 70+
- Mozilla Firefox 60+
- Microsoft Edge 18+
- Safari 12+
- Internet Explorer 11+ (Limited support)

**Hardware Requirements:**
- CPU: Dual-core 1.5GHz minimum
- RAM: 2GB minimum, 4GB recommended
- Screen Resolution: 1024x768 minimum
- Internet Connection: Broadband (1 Mbps minimum)

**Software Requirements:**
- JavaScript enabled browser
- PDF viewer (for invoice viewing)
- Excel viewer (for report exports)

### 7.3 Network Requirements

**Bandwidth:**
- Minimum: 1 Mbps per concurrent user
- Recommended: 5 Mbps for optimal performance
- LAN: 100 Mbps for local network deployment

**Security:**
- HTTPS support for secure connections
- Firewall configuration for web server ports
- SSL/TLS certificate for production deployment

---

## 8.0 Conclusion

### 8.1 System Benefits

The School Inventory Management System provides comprehensive automation of inventory operations, significantly reducing manual effort and improving accuracy. The system's Kenya-specific localization ensures compliance with local tax regulations while maintaining flexibility for global deployment.

**Key Advantages:**
- **Operational Efficiency:** Automated processes reduce manual work by 80%
- **Financial Accuracy:** Real-time calculations eliminate calculation errors
- **Regulatory Compliance:** Built-in VAT compliance for Kenya market
- **Scalability:** Modular architecture supports growth and expansion
- **Cost Effectiveness:** Open-source foundation reduces licensing costs
- **User-Friendly:** Intuitive interface requires minimal training

### 8.2 Implementation Considerations

**Deployment Strategy:**
- Phased implementation recommended for large organizations
- Comprehensive user training program required
- Data migration planning for existing systems
- Backup and disaster recovery procedures

**Maintenance Requirements:**
- Regular system updates and security patches
- Database maintenance and optimization
- User account management and monitoring
- Performance monitoring and tuning

### 8.3 Future Enhancements

**Planned Features:**
- Mobile application development
- Advanced analytics and reporting
- Integration with external systems
- Multi-language support
- Cloud deployment options
- API development for third-party integrations

### 8.4 Success Metrics

**Performance Indicators:**
- User adoption rate (Target: 95% within 3 months)
- System uptime (Target: 99.5% availability)
- Processing efficiency (Target: 50% reduction in processing time)
- Error reduction (Target: 90% reduction in manual errors)
- User satisfaction (Target: 4.5/5.0 rating)

### 8.5 Conclusion Statement

The School Inventory Management System represents a comprehensive solution for modern inventory management challenges faced by educational institutions and small organizations. With its robust architecture, user-friendly interface, and Kenya-specific localization, the system provides a solid foundation for efficient inventory operations while ensuring regulatory compliance and scalability for future growth.

The successful implementation of this system will result in improved operational efficiency, enhanced financial accuracy, and better decision-making capabilities through comprehensive reporting and analytics. The system's modular design and open-source foundation ensure long-term sustainability and cost-effectiveness.

---

**Document Control:**
- **Review Date:** Quarterly review recommended
- **Next Update:** February 2026
- **Approval:** Project Manager and Technical Lead
- **Distribution:** Development Team, Stakeholders, End Users

---

*This document serves as the official System Design Specification for the School Inventory Management System and should be referenced for all development, implementation, and maintenance activities.*
