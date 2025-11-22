# 🏥 Hospital Management System

A comprehensive, modern Hospital Management System built with Laravel and Blade templates, featuring a stunning glassmorphism UI design.

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

## ✨ Features

### 🔐 Authentication & Authorization
- Multi-role authentication (Admin, Doctor, Patient)
- Role-based access control
- Secure login and registration
- User profile management

### 👥 User Management
- **Patients**: Complete patient records with medical history, allergies, emergency contacts
- **Doctors**: Doctor profiles with specializations, qualifications, and experience
- **Departments**: Organize doctors by hospital departments

### 📅 Appointment System
- Schedule and manage appointments
- Track appointment status (Scheduled, Confirmed, Completed, Cancelled)
- Link appointments to patients and doctors
- Search and filter appointments

### 💊 Prescription Management
- Create digital prescriptions
- Multiple medications per prescription
- Dosage, frequency, and duration tracking
- Follow-up date scheduling
- Link prescriptions to appointments

### 🧪 Laboratory Module
- Lab test catalog management
- Record and track test results
- Test status tracking (Pending, Completed, Cancelled)
- Link results to patients and doctors

### 💰 Billing & Invoicing
- Generate professional invoices
- Track payment status (Paid, Unpaid, Refunded)
- Multiple payment methods support
- Printable invoice view

### 📦 Inventory Management
- Medical supplies and equipment tracking
- Low stock alerts
- Automatic status updates
- Category-based organization

### 🔍 Search & Filtering
- Server-side search across all modules
- Real-time filtering
- Advanced search capabilities

### 🎨 Modern UI/UX
- Glassmorphism design
- Smooth animations and transitions
- Responsive design for all devices
- Premium visual aesthetics
- Interactive micro-animations

## 🚀 Installation

### Prerequisites
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM (optional, for asset compilation)

### Setup Instructions

1. **Clone the repository**
```bash
git clone https://github.com/Aikun100/HospitalManagement_System.git
cd HospitalManagement_System
```

2. **Install dependencies**
```bash
composer install
```

3. **Environment configuration**
```bash
cp .env.example .env
```

Edit `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hospital_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. **Generate application key**
```bash
php artisan key:generate
```

5. **Run migrations**
```bash
php artisan migrate
```

6. **Seed database (optional)**
```bash
php artisan db:seed
```

7. **Start the development server**
```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 👤 Default Admin Account

After running migrations, create an admin account manually or use these credentials if seeded:

**Email:** `admin@hospital.com`  
**Password:** `admin123`  
**Role:** Admin

### Creating Admin Account Manually

If you haven't seeded the database, create an admin account using Laravel Tinker:

```bash
php artisan tinker
```

Then run:
```php
\App\Models\User::create([
    'name' => 'Admin User',
    'email' => 'admin@hospital.com',
    'password' => bcrypt('admin123'),
    'role' => 'admin'
]);
```

## 📱 User Roles & Permissions

### Admin
- Full system access
- Manage all users, doctors, patients
- Access to billing and inventory
- Department management
- System settings

### Doctor
- View and manage appointments
- Create and manage prescriptions
- Access patient records
- Record lab test results
- Limited inventory access

### Patient
- View personal appointments
- View prescriptions
- View lab results
- Update profile settings

## 🗂️ Project Structure

```
HospitalManagement-System/
├── app/
│   ├── Http/Controllers/
│   │   ├── AppointmentController.php
│   │   ├── BillingController.php
│   │   ├── DashboardController.php
│   │   ├── DepartmentController.php
│   │   ├── DoctorController.php
│   │   ├── InventoryController.php
│   │   ├── LabTestController.php
│   │   ├── PatientController.php
│   │   ├── PrescriptionController.php
│   │   ├── SettingsController.php
│   │   └── TestResultController.php
│   └── Models/
│       ├── Appointment.php
│       ├── Billing.php
│       ├── Department.php
│       ├── Doctor.php
│       ├── Inventory.php
│       ├── LabTest.php
│       ├── Patient.php
│       ├── Prescription.php
│       ├── TestResult.php
│       └── User.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── appointments/
│       ├── billing/
│       ├── departments/
│       ├── doctors/
│       ├── inventory/
│       ├── lab_tests/
│       ├── patients/
│       ├── prescriptions/
│       ├── settings/
│       ├── test_results/
│       └── layouts/
│           └── app.blade.php
└── routes/
    └── web.php
```

## 🎨 Design Features

- **Glassmorphism UI**: Modern frosted glass effect throughout
- **Gradient Backgrounds**: Multi-layered, animated gradients
- **Smooth Animations**: Page transitions, hover effects, and micro-interactions
- **Responsive Design**: Mobile-first approach
- **Premium Aesthetics**: Professional color palette and typography
- **Interactive Elements**: Button ripple effects, form animations

## 🔧 Technologies Used

- **Backend**: Laravel 10.x
- **Frontend**: Blade Templates, Vanilla CSS
- **Database**: MySQL
- **Icons**: Font Awesome 6.4
- **Fonts**: Inter (Google Fonts)

## 📊 Database Schema

### Main Tables
- `users` - System users with role-based access
- `patients` - Patient records and medical information
- `doctors` - Doctor profiles and credentials
- `departments` - Hospital departments
- `appointments` - Appointment scheduling
- `prescriptions` - Medical prescriptions
- `inventory` - Medical supplies and equipment
- `billings` - Invoice and payment tracking
- `lab_tests` - Available laboratory tests
- `test_results` - Patient test results

## 🛠️ Development

### Running Tests
```bash
php artisan test
```

### Code Style
```bash
./vendor/bin/pint
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## 📝 License

This project is open-sourced software licensed under the [MIT license](LICENSE).

## 👨‍💻 Author

**Aikun100**

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

## 📧 Support

For support, email support@hospital.com or open an issue in the repository.

## 🙏 Acknowledgments

- Laravel Framework
- Font Awesome Icons
- Google Fonts (Inter)
- All contributors and supporters

---

**Note**: This is a demonstration project. Please ensure proper security measures, data encryption, and compliance with healthcare regulations (HIPAA, GDPR, etc.) before using in a production environment.
