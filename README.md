✈️ Travel Agency - High Availability System

Course: IT Service Management

Project: High Availability Web System Prototype

📖 Project Description

This project involves the development of a comprehensive web platform for travel booking management (flights, buses, and hotels). The core objective is not only the web application itself but the High Availability (HA) infrastructure supporting it.

The system implements a distributed hybrid architecture using Virtual Machines (Ubuntu Server) and Docker Containers, orchestrated to ensure continuous service through load balancing and data replication.

🏗️ System Architecture

The infrastructure is deployed across three nodes (VMs) connected via a private internal network (Host-Only Adapter):

Network Topology

Node

Role

Static IP

Description

VM-01

App Host & Balancer

192.168.56.10

Runs Docker. Hosts the HAproxy load balancer and Laravel app containers.

VM-02

DB Master

192.168.56.20

Native MySQL server. Handles critical writes and reads.

VM-03

DB Replica

192.168.56.21

Native MySQL server (Mirror). Real-time replica of the master.

Architecture Diagram

graph LR
    User(User) -->|HTTP:80| HAProxy[HAProxy Load Balancer]
    HAProxy -->|Round Robin| Web1[Web Container 01]
    HAProxy -->|Round Robin| Web2[Web Container 02]
    Web1 -->|Laravel Eloquent| DBMaster[(MySQL Master)]
    Web2 -->|Laravel Eloquent| DBMaster
    DBMaster -->|Replication| DBReplica[(MySQL Replica)]


🛠️ Tech Stack

Backend: PHP 8.2, Laravel 11 Framework.

Frontend: Blade Templates, Tailwind CSS, Laravel Breeze (Authentication).

Database: MySQL 8.0 (Master-Slave Configuration).

Infrastructure:

VirtualBox (Virtualization).

Ubuntu Server 22.04 LTS (Operating System).

Docker & Docker Compose (Containerization).

HAProxy (Load Balancing).

Netplan (Static Network Configuration).

🚀 Installation Guide (For Developers)

If you are part of the team and have just cloned this repository, follow these steps to set up the environment on your VM-01.

Prerequisites

Ensure all 3 VMs are imported and configured with their static IPs.

Ensure VM-02 (Master) is powered on and running MySQL.

Deployment Steps

Clone the repository:

git clone [https://github.com/YOUR_USERNAME/REPO_NAME.git](https://github.com/YOUR_USERNAME/REPO_NAME.git) agencia-viajes
cd agencia-viajes


Configure the environment (.env):
The .env file is not tracked for security reasons. Create a copy from the example:

cp src/.env.example src/.env
nano src/.env


Inside the file, configure the connection to the Master database:

DB_CONNECTION=mysql
DB_HOST=192.168.56.20
DB_PORT=3306
DB_DATABASE=agencia_viajes_db
DB_USERNAME=app_user
DB_PASSWORD=1234
SESSION_DRIVER=database


Start the infrastructure (Docker):
This command will build the custom image with Node.js and PHP.

docker compose up -d --build


Install Dependencies and Configure Laravel:
Run these commands to download libraries inside the container:

# Install PHP packages (Vendor)
docker compose exec web01 composer install

# Generate App Encryption Key
docker compose exec web01 php artisan key:generate

# Install Node packages and compile assets (Vite/Tailwind)
docker compose exec web01 npm install
docker compose exec web01 npm run build

# Run Database Migrations
docker compose exec web01 php artisan migrate


Ready!
Access the application from your host browser at: http://192.168.56.10

🔌 API Endpoints

The system exposes a RESTful API for service queries.

Get Flights:

GET /api/vuelos

Response: JSON Array containing the list of available flights.

👥 Authors

Sebastian Duran - [23110319]

Miriam Ulloa - [23110011]

Project developed for the IT Service Management course - 2025
