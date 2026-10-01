# Admin Dashboard Widgets Documentation

## 📊 Overview

The admin dashboard is now fully equipped with comprehensive widgets to display all important business metrics, statistics, and data insights.

## 🎯 Available Widgets

### 1. **Stats Overview** (Priority: 1)
**File**: `app/Filament/Admin/Widgets/StatsOverview.php`

**Display**: 6 key metrics cards

**Metrics**:
- 💰 **Total Revenue** 
  - Shows total revenue from successful orders
  - Displays growth percentage vs last month
  - Mini chart visualization
  - Color-coded trend (green = up, red = down)

- 📦 **Total Orders**
  - Count of all successful orders
  - Growth percentage vs last month
  - Mini chart visualization
  - Color-coded trend indicator

- 🎫 **Total Events**
  - Count of all events in system
  - Shows number of upcoming events
  - Mini chart visualization
  - Info badge color

- 👥 **Total Users**
  - Count of registered customers
  - Description: "Registered customers"
  - Mini chart visualization
  - Success badge color

- 🤝 **Partner Requests**
  - Count of pending partner requests
  - Description: "Pending review"
  - Clickable (links to Partner Requests page)
  - Warning badge color

- 💵 **This Month Revenue**
  - Revenue from last 30 days
  - Description: "Revenue in last 30 days"
  - Success badge color

**Features**:
- Real-time calculations
- Comparative analysis (current month vs previous month)
- Growth indicators with icons and colors
- Mini charts for visual trends
- Clickable cards for drill-down

---

### 2. **Recent Orders** (Priority: 2)
**File**: `app/Filament/Admin/Widgets/RecentOrders.php`

**Display**: Table showing 10 most recent orders

**Columns**:
- Transaction Code (searchable, copyable)
- Customer Name (searchable, sortable)
- Total Amount (formatted as IDR currency)
- Order Status (color-coded badge: pending/success/failed)
- Payment Status (color-coded badge: pending/paid/failed)
- Order Date (datetime format)

**Actions**:
- View button → links to Order detail page

**Features**:
- Full-width layout
- Latest orders first
- Quick access to order details
- Copyable transaction code

---

### 3. **Recent Partner Requests** (Priority: 3)
**File**: `app/Filament/Admin/Widgets/RecentPartnerRequests.php`

**Display**: Table showing 10 most recent partnership requests

**Columns**:
- Company Name (searchable, sortable, bold)
- Event Name (searchable, sortable)
- Applicant Name (searchable, sortable)
- Phone Number (searchable, with icon)
- Email (searchable, copyable, with icon)
- Status (color-coded badge: pending/reviewed/approved/rejected)
- Submission Date (date format)

**Actions**:
- View button → links to request edit page

**Features**:
- Full-width layout
- Latest submissions first
- Quick status overview
- Copyable email addresses

---

### 4. **Upcoming Events** (Priority: 4)
**File**: `app/Filament/Admin/Widgets/UpcomingEvents.php`

**Display**: Table showing 10 upcoming events

**Columns**:
- Event Image (circular thumbnail, 50px)
- Event Name (searchable, sortable, bold, truncated at 40 chars)
- Category (badge, info color)
- Location City (searchable, with map pin icon)
- Start Date (date format, with calendar icon)
- Ticket Count (badge, success color)
- Active Status (icon: check/x circle)

**Actions**:
- View button → links to Event edit page

**Features**:
- Full-width layout
- Sorted by start date (ascending)
- Only shows future events
- Visual indicators for active status
- Image previews

---

### 5. **Revenue Chart** (Priority: 5)
**File**: `app/Filament/Admin/Widgets/RevenueChart.php`

**Type**: Line Chart

**Display**: Monthly revenue for last 12 months

**Data**:
- X-axis: Month names (e.g., "Jan 2026", "Feb 2026")
- Y-axis: Revenue in Rupiah (Rp)
- Line: Blue color with light blue fill
- Smooth curve (tension: 0.4)

**Features**:
- Full-width layout
- 12-month historical view
- IDR currency formatting on Y-axis
- Legend display
- Responsive design
- Smooth animations

---

### 6. **Most Popular Events** (Priority: 6)
**File**: `app/Filament/Admin/Widgets/PopularEvents.php`

**Display**: Table showing 10 most popular events (by ticket count)

**Columns**:
- Event Image (circular thumbnail, 50px)
- Event Name (searchable, sortable, bold, truncated at 40 chars)
- Category (badge, info color)
- Location City (searchable, with map pin icon)
- Start Date (date format, with calendar icon)
- Total Tickets (badge, success color, sortable)

**Actions**:
- View button → links to Event edit page

**Features**:
- Full-width layout
- Sorted by ticket count (descending)
- Helps identify trending events
- Image previews
- Category badges

---

### 7. **Sales by Category** (Priority: 7)
**File**: `app/Filament/Admin/Widgets/SalesByCategory.php`

**Type**: Doughnut Chart

**Display**: Total sales breakdown by event category

**Data**:
- Shows top 10 categories by sales
- Each category gets unique color
- Displays percentage and value

**Colors Used**:
- Blue, Green, Amber, Red, Purple, Pink, Emerald, Orange, Indigo, Violet

**Features**:
- Full-width layout
- Legend at bottom
- Interactive tooltips
- Color-coded segments
- Percentage calculations

---

### 8. **Latest Registered Users** (Priority: 8)
**File**: `app/Filament/Admin/Widgets/LatestUsers.php`

**Display**: Table showing 10 most recently registered users

**Columns**:
- Name (searchable, sortable, bold, with user icon)
- Email (searchable, sortable, copyable, with envelope icon)
- Total Orders (count badge, info color)
- Total Spent (calculated, IDR currency, sortable)
- Registration Date (date format, with calendar icon)

**Actions**:
- View button → links to User edit page

**Features**:
- Full-width layout
- Latest registrations first
- Customer value calculation (total spent)
- Order history at a glance
- Copyable email addresses

---

## 🎨 Widget Layout Order

Widgets are displayed in order of priority (sort property):

1. **Stats Overview** - Key metrics cards
2. **Recent Orders** - Latest transactions
3. **Recent Partner Requests** - Latest partnership inquiries
4. **Upcoming Events** - Future scheduled events
5. **Revenue Chart** - Monthly revenue trends
6. **Popular Events** - Top events by ticket count
7. **Sales by Category** - Category performance
8. **Latest Users** - New customer registrations

## 📍 Widget Locations

All widgets are located in:
```
app/Filament/Admin/Widgets/
├── StatsOverview.php
├── RecentOrders.php
├── RecentPartnerRequests.php
├── UpcomingEvents.php
├── RevenueChart.php
├── PopularEvents.php
├── SalesByCategory.php
└── LatestUsers.php
```

## 🔧 Configuration

Widgets are auto-discovered in:
- **File**: `app/Providers/Filament/AdminPanelProvider.php`
- **Line**: `->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\\Filament\\Admin\\Widgets')`

## ✨ Features Summary

### Interactive Elements
- ✅ Clickable cards (Stats Overview → Partner Requests)
- ✅ Copyable fields (Transaction codes, emails)
- ✅ View actions on all tables
- ✅ Search functionality
- ✅ Sorting capabilities

### Visual Indicators
- ✅ Color-coded badges (status, categories, metrics)
- ✅ Trend arrows (up/down indicators)
- ✅ Icons for better UX (calendar, map pin, user, envelope, etc.)
- ✅ Mini charts in stats cards
- ✅ Progress indicators

### Data Insights
- ✅ Growth calculations (month-over-month)
- ✅ Revenue trends (12-month historical)
- ✅ Category performance analysis
- ✅ Customer value metrics
- ✅ Event popularity tracking
- ✅ Real-time statistics

### Responsive Design
- ✅ Full-width layouts for tables
- ✅ Grid layouts for stat cards
- ✅ Mobile-friendly
- ✅ Auto-adjusting columns

## 🎯 Key Metrics Tracked

### Financial Metrics
- Total Revenue (all-time)
- Monthly Revenue (current month)
- Revenue Growth (%)
- Revenue Trends (12 months)
- Sales by Category

### Operational Metrics
- Total Orders
- Order Growth (%)
- Recent Transactions
- Order Status Distribution

### Event Metrics
- Total Events
- Upcoming Events
- Popular Events (by tickets)
- Event Categories Performance

### Customer Metrics
- Total Users
- Latest Registrations
- Customer Lifetime Value
- Order History per Customer

### Partnership Metrics
- Pending Partner Requests
- Request Status Distribution
- Recent Submissions

## 🔄 Auto-Refresh

All widgets automatically refresh when:
- Page is loaded
- Admin navigates to dashboard
- Data is modified (orders, events, users, etc.)

## 📊 Data Sources

Widgets pull data from:
- **Orders** table (revenue, transactions)
- **Events** table (event listings, schedules)
- **Users** table (customer data)
- **PartnerRequests** table (partnership inquiries)
- **EventCategories** table (category analytics)
- **Tickets** table (ticket inventory)
- **OrderItems** table (detailed sales data)

## 💡 Usage Tips

1. **Dashboard Overview**: Get instant insights into business performance at a glance
2. **Quick Actions**: Click "View" buttons to drill down into specific records
3. **Copy Data**: Use copy icons to quickly copy transaction codes and emails
4. **Search**: Use search functionality to find specific records in tables
5. **Sort**: Click column headers to sort data
6. **Trends**: Look for growth indicators to spot trends
7. **Charts**: Hover over charts for detailed tooltips

## 🚀 Performance

- Widgets use efficient queries with proper indexing
- Limited to 10 records per table widget
- Cached calculations where possible
- Optimized relationships (eager loading)
- No N+1 query issues

## 📝 Customization

To modify widgets:
1. Edit the respective widget file in `app/Filament/Admin/Widgets/`
2. Change query logic, columns, or formatting as needed
3. Adjust sort order by changing `$sort` property
4. Modify column span with `$columnSpan` property

## 🎉 Result

Admin dashboard now provides:
- **Comprehensive** business overview
- **Real-time** data insights
- **Interactive** elements for drill-down
- **Visual** trends and patterns
- **Quick access** to important records
- **Professional** presentation
