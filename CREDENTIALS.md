# 🔐 Hospital Management System - Credentials

## Default Admin Account

Use these credentials to log in as an administrator:

**Email:** `admin@hospital.com`  
**Password:** `admin123`  
**Role:** Admin

## Creating the Admin Account

If the admin account doesn't exist, create it using Laravel Tinker:

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

## Test Accounts (Optional)

### Doctor Account
```php
\App\Models\User::create([
    'name' => 'Dr. John Smith',
    'email' => 'doctor@hospital.com',
    'password' => bcrypt('doctor123'),
    'role' => 'doctor'
]);
```

### Patient Account
```php
\App\Models\User::create([
    'name' => 'Jane Doe',
    'email' => 'patient@hospital.com',
    'password' => bcrypt('patient123'),
    'role' => 'patient'
]);
```

## Role Permissions

### Admin
- ✅ Full system access
- ✅ Manage all users, doctors, patients
- ✅ Access to billing and inventory
- ✅ Department management
- ✅ System settings
- ✅ All CRUD operations

### Doctor
- ✅ View and manage appointments
- ✅ Create and manage prescriptions
- ✅ Access patient records
- ✅ Record lab test results
- ✅ Limited inventory access
- ❌ Cannot manage billing
- ❌ Cannot manage departments

### Patient
- ✅ View personal appointments
- ✅ View prescriptions
- ✅ View lab results
- ✅ Update profile settings
- ❌ Cannot access other patients' data
- ❌ Cannot manage system resources

## Security Notes

⚠️ **IMPORTANT**: 
- Change the default admin password immediately after first login
- Use strong passwords in production
- Enable two-factor authentication if available
- Regularly audit user accounts
- Follow HIPAA/GDPR compliance guidelines for patient data

## Database Seeding

To create sample data for testing:

```bash
php artisan db:seed
```

This will create:
- Sample patients
- Sample doctors
- Sample appointments
- Sample prescriptions
- Sample inventory items

---

**Last Updated:** November 22, 2025  
**Version:** 1.0.0
