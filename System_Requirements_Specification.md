# System Requirements Specification (SRS)
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

### 3.1 System Architecture

The system follows a three-tier architecture:

**Presentation Tier (Client-Side):**
- HTML5 for structure and content
- CSS3 and Bootstrap for responsive design
- JavaScript and jQuery for dynamic interactions
- DataTables for advanced table management
- Font Awesome for iconography

**Application Tier (Server-Side):**
- Core PHP for business logic and processing
- Session management for user authentication
- mPDF library for PDF generation
- PHPExcel for Excel import/export functionality

**Data Tier (Database Layer):**
- MySQL database for data storage
- Structured tables with proper relationships
- SQL queries for data manipulation
- Backup and recovery mechanisms

### 3.2 Hardware Architecture

**Server Requirements:**
- CPU: Multi-core processor (minimum 2 GHz)
- RAM: Minimum 4GB, recommended 8GB
- Storage: Minimum 20GB available space
- Network: Stable internet connection for remote access

**Client Requirements:**
- Any device with web browser support
- Minimum 2GB RAM for optimal performance
- Screen resolution: 1024x768 or higher
- Stable internet connection

### 3.3 Network Architecture

- **Local Network:** LAN/WAN connectivity for internal access
- **Internet Access:** Web-based deployment capability
- **Security:** HTTPS protocol support for secure data transmission
- **Load Balancing:** Support for multiple concurrent users

---

## 4.0 Logical Design

### 4.1 System Modules

**Authentication Module:**
- User login and logout functionality
- Session management and security
- Password encryption and validation
- Role-based access control

**Product Management Module:**
- Product catalog creation and maintenance
- Category and brand management
- Stock level tracking and updates
- Image management and display
- Excel import/export capabilities

**Order Processing Module:**
- Multi-step order creation workflow
- Real-time inventory validation
- Payment type and status management
- Invoice generation and printing
- Order history and tracking

**User Management Module:**
- User account creation and modification
- Role assignment and permissions
- Profile management and settings
- User activity monitoring

**Reporting Module:**
- Sales analytics and reporting
- Inventory status reports
- User-wise performance analysis
- Date-range based filtering
- Export capabilities (PDF/Excel)

**Financial Management Module:**
- Revenue tracking and analysis
- VAT calculations and compliance
- Payment processing and tracking
- Financial reporting and analytics

### 4.2 Data Flow Design

**Order Processing Flow:**
1. User authentication and authorization
2. Product selection and availability check
3. Order details entry and validation
4. Payment information processing
5. Inventory level updates
6. Invoice generation and delivery
7. Order confirmation and tracking

**Inventory Management Flow:**
1. Product information entry
2. Category and brand assignment
3. Stock level initialization
4. Real-time stock tracking
5. Low stock alert generation
6. Reorder point management
7. Inventory reporting and analysis

### 4.3 Security Design

**Authentication Security:**
- Password hashing using MD5 encryption
- Session-based user management
- Role-based access control implementation
- Automatic session timeout

**Data Security:**
- SQL injection prevention through prepared statements
- Input validation and sanitization
- Cross-site scripting (XSS) protection
- Secure file upload mechanisms

---

## 5.0 Database Design

### 5.1 Database Schema

**Primary Tables:**

**users Table:**
```sql
- user_id (INT, Primary Key, Auto Increment)
- username (VARCHAR, Unique)
- password (VARCHAR, Encrypted)
- email (VARCHAR)
```

**product Table:**
```sql
- product_id (INT, Primary Key, Auto Increment)
- product_name (VARCHAR)
- product_image (VARCHAR)
- brand_id (INT, Foreign Key)
- categories_id (INT, Foreign Key)
- quantity (INT)
- rate (DECIMAL)
- active (TINYINT)
- status (TINYINT)
```

**orders Table:**
```sql
- order_id (INT, Primary Key, Auto Increment)
- order_date (DATE)
- client_name (VARCHAR)
- client_contact (VARCHAR)
- sub_total (DECIMAL)
- vat (DECIMAL)
- total_amount (DECIMAL)
- discount (DECIMAL)
- grand_total (DECIMAL)
- paid (DECIMAL)
- due (DECIMAL)
- payment_type (INT)
- payment_status (INT)
- payment_place (INT)
- gstn (VARCHAR)
- order_status (TINYINT)
- user_id (INT, Foreign Key)
```

**order_item Table:**
```sql
- order_item_id (INT, Primary Key, Auto Increment)
- order_id (INT, Foreign Key)
- product_id (INT, Foreign Key)
- quantity (INT)
- rate (DECIMAL)
- total (DECIMAL)
```

**categories Table:**
```sql
- categories_id (INT, Primary Key, Auto Increment)
- categories_name (VARCHAR)
- categories_active (TINYINT)
- categories_status (TINYINT)
```

**brands Table:**
```sql
- brand_id (INT, Primary Key, Auto Increment)
- brand_name (VARCHAR)
- brand_active (TINYINT)
- brand_status (TINYINT)
```

### 5.2 Relationships

- Users → Orders (One-to-Many)
- Orders → Order Items (One-to-Many)
- Products → Order Items (One-to-Many)
- Categories → Products (One-to-Many)
- Brands → Products (One-to-Many)

### 5.3 Indexes and Constraints

- Primary keys on all tables for unique identification
- Foreign key constraints for referential integrity
- Unique constraints on username in users table
- Index on frequently queried columns for performance

---

## 6.0 User Interface Design

### 6.1 Design Principles

**Responsive Design:**
- Bootstrap framework for mobile-first approach
- Adaptive layout for various screen sizes
- Touch-friendly interface elements
- Consistent styling across devices

**User Experience:**
- Intuitive navigation structure
- Clear visual hierarchy
- Consistent color scheme and typography
- Accessible design following web standards

**Functionality:**
- Real-time data updates using AJAX
- Interactive forms with client-side validation
- Dynamic table management with DataTables
- Modal dialogs for quick actions

### 6.2 Interface Components

**Dashboard Interface:**
- Key performance indicators display
- Quick action buttons
- Revenue tracking widgets
- Low stock alerts panel
- Recent orders summary

**Product Management Interface:**
- Product listing with search and filter
- Add/Edit product forms
- Image upload functionality
- Category and brand dropdowns
- Stock level indicators

**Order Management Interface:**
- Order creation wizard
- Product selection with availability check
- Real-time calculation display
- Payment information forms
- Invoice preview and generation

**User Management Interface:**
- User listing and management
- Role assignment interface
- Profile editing forms
- Activity monitoring dashboard

**Reporting Interface:**
- Date range selectors
- Filter and search options
- Data visualization charts
- Export functionality buttons
- Print-friendly layouts

### 6.3 Navigation Structure

**Main Navigation:**
- Dashboard (Home)
- Products (Management)
- Orders (Processing)
- Users (Administration)
- Reports (Analytics)
- Settings (Configuration)

**Breadcrumb Navigation:**
- Clear page hierarchy display
- Easy navigation between levels
- Context-aware breadcrumbs

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

*This document serves as the official System Requirements Specification for the School Inventory Management System and should be referenced for all development, implementation, and maintenance activities.*
