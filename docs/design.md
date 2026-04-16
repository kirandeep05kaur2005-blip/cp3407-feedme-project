# Design

## System Architecture
The system follows a simple 3-layer architecture:

- Frontend: HTML, CSS, Bootstrap
- Backend: PHP
- Database: MySQL

This structure helps separate the user interface, application logic, and data storage.

## Database Design
The system uses the following tables:

- users
- restaurants
- menu_items
- orders
- order_items

## Relationships
- One restaurant has many menu items
- One user can place many orders
- One order can have many items

## Interface Design
Main pages of the system:

- Home page
- Restaurant list page
- Menu page
- Cart page
- Checkout page
- Login/Register page
- Admin dashboard

The interface is designed to be simple and user-friendly.

## Simple Diagram
User → Website → PHP → MySQL Database
