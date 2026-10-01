# Partner Request System - Setup Guide

## 📋 Overview

The Partner Request system is now fully functional! Users can submit partnership requests through the Joint Partner form, and admins can view and manage these requests in the admin dashboard.

## 🚀 Setup Instructions

### 1. Run Database Migration

To create the `partner_requests` table, run:

```bash
php artisan migrate
```

This will create a table with the following fields:
- `id` - Primary key
- `company_name` - Company name
- `company_address` - Company address
- `event_name` - Event name
- `event_date_location` - Event date and location
- `applicant_name` - Applicant's name
- `phone` - Phone number (WhatsApp)
- `email` - Email address
- `message` - Message/details
- `status` - Request status (pending, reviewed, approved, rejected)
- `created_at` & `updated_at` - Timestamps

### 2. Access the Form

Users can submit partnership requests at:
- **URL**: `http://your-domain.com/joint-partner`
- **Route Name**: `joint-partner`

### 3. View Submissions in Admin Dashboard

1. Login to admin dashboard (`/admin`)
2. Look for **"Partner Requests"** in the left sidebar (icon: user-group)
3. You'll see a table with all submitted partner requests

## ✨ Features

### Frontend Form (`/joint-partner`)
- ✅ Full form validation
- ✅ Error messages displayed inline
- ✅ Success message after submission
- ✅ Form retains data on validation error
- ✅ Required field indicators
- ✅ Modern dark theme design

### Admin Dashboard
- 📊 **Table View** with columns:
  - Company name
  - Event name
  - Applicant name
  - Phone
  - Email
  - Status badge (color-coded)
  - Submission date/time

- 🔍 **Features**:
  - Search by company, event, applicant, phone, email
  - Sort by any column
  - Filter by status (pending, reviewed, approved, rejected)
  - View, Edit, Delete actions
  - Bulk delete
  - Default sorted by newest first

- 📝 **Edit Form** with sections:
  - Company Information
  - Event Information
  - Contact Information
  - Message
  - Status Management

## 🎨 Status Options

- **Pending** (Yellow badge) - New submission
- **Reviewed** (Blue badge) - Under review
- **Approved** (Green badge) - Partnership approved
- **Rejected** (Red badge) - Request declined

## 📧 Form Fields

All fields are required:
1. Company Name (Nama Perusahaan Penyelenggara)
2. Company Address (Alamat Perusahaan)
3. Event Name (NAMA EVENT)
4. Event Date & Location (Tanggal Event & Tempat)
5. Applicant Name (Nama Pemohon)
6. Phone Number (NO Telphon Selular - WA) - Max 16 characters
7. Email (Alamat E-mail)
8. Message (Pesan) - Textarea

## 🔒 Security

- ✅ CSRF protection enabled
- ✅ Server-side validation
- ✅ XSS protection
- ✅ SQL injection protection (Eloquent ORM)

## 📂 Files Created/Modified

### New Files:
- `database/migrations/2026_01_21_051138_create_partner_requests_table.php`
- `app/Models/PartnerRequest.php`
- `app/Http/Controllers/PartnerRequestController.php`
- `app/Filament/Admin/Resources/PartnerRequestResource.php`
- `app/Filament/Admin/Resources/PartnerRequestResource/Pages/ListPartnerRequests.php`
- `app/Filament/Admin/Resources/PartnerRequestResource/Pages/CreatePartnerRequest.php`
- `app/Filament/Admin/Resources/PartnerRequestResource/Pages/EditPartnerRequest.php`

### Modified Files:
- `routes/web.php` - Added POST route for form submission
- `resources/views/pages/joint-partner.blade.php` - Updated form action, added validation

## 🎯 Testing

### Test Form Submission:
1. Visit `/joint-partner`
2. Fill out all required fields
3. Submit the form
4. You should see a success message
5. Check admin dashboard to see the submission

### Test Validation:
1. Try submitting with empty fields
2. Try submitting with invalid email
3. Error messages should appear

### Test Admin Dashboard:
1. Login as admin
2. Navigate to Partner Requests
3. Try searching, filtering, sorting
4. Try changing status
5. Try viewing/editing/deleting requests

## 📝 Notes

- All new submissions have `pending` status by default
- Admins can change status to track partnership progress
- Email notifications are not implemented (can be added later)
- Data is stored indefinitely (consider adding auto-cleanup for old rejected requests)

## 🔄 Next Steps (Optional Enhancements)

Consider adding:
- [ ] Email notifications to admin on new submissions
- [ ] Email notifications to applicant on status changes
- [ ] Export functionality (CSV/Excel)
- [ ] Activity log for status changes
- [ ] Dashboard widget showing pending requests count
- [ ] Auto-responder email after submission
