Project Name: 
Fire_Safety_Management_Project
--------------------------------------------------------------------------------------------------------
Table of Contents
******************
* Overview
* Built With
* Features
* Usage
* Contribution

  
Overview
***********************************************************************
This is a Laravel-based application that allows users to manage products
such as Fire Extinguishers, Smoke Detectors, and Fire Alarms. 
The system includes user roles with specific dashboards, maintenance records, 
and product management. 
It uses Laravel Breeze for authentication, roles, 
and email verification. 
The system is role-based,with access controlled by Gates 
with different levels of access to the platform. The system includes:

Product Management:   Users can manage their assigned products.
Maintenance Records:  Technicians can track the maintenance status of products.
Role-based Dashboard: Redirect users to their specific dashboard after login based on their role.
Email Verification:   Ensures user email verification before accessing the platform..


Built With
****************************************************************************************
This project is built using the following technologies:
* Laravel
* Laravel Breeze
* MySQL
* Blade
* PHP

Features
Role-based Authentication:   Users can be assigned different roles 
                             (admin, customer, technician), with each role having a distinct dashboard and permissions.
Email Verification:          Ensures that users verify their email before accessing the system.
Product Management:          Users can add and manage products with different types and statuses.
Maintenance Record Tracking: Technicians can record maintenance activities for products.
Dashboard Redirects:         Users are automatically redirected to their appropriate dashboard (Admin, Customer, Technician) based on their role.
Technician Assignment:       Admins can assign technicians to products, and technicians can update the maintenance status.

Usage
********************************************************
1. Authentication
Register: Sign up with your name, email, and password.
Email Verification: After registering,
you will receive an email to verify your account.
You must click the verification link before logging in.

2. Dashboard
***********************************************************************************************
Admin:      Admin users can manage users, products, and maintenance records.
Customer:   Customer users can view and manage their assigned products.
Technician: Technician users can view and edit maintenance records related to their assigned products.

4. Access Control
*************************************************************************************************
Gates: Based on your role (admin, customer, technician),
the system will redirect you to your specific dashboard.
Admins can manage users and products, customers can manage their products,
and technicians can update maintenance records.

Contributing
******************************************************************************************************
Contributions are what make the open-source community such an amazing place to learn, inspire, and 
create.
Any contributions are greatly appreciated!Feel free to submit issues, 
pull requests, or any suggestions for improvements. 


Installation
******************************************************************************************************
* Clone the repository:
* Install the required dependencies:
* Copy the .env.example file to .env and configure the database:
* Set up the database and run the migrations:
* Seed the database with dummy data
* Run the application:
