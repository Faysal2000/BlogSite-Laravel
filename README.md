## 📝 Laravel Blog Project
This project is a simple blog site built using Laravel and MySQL. Users can create, edit, delete, and view blog posts.

## 🚀 Features
📝 Create, edit, and delete blog posts  
👥 User authentication (Auth)  
📌 List all blog posts  
🔎 View individual blog posts  
🎨 Blade Template Engine for a clean UI  

## 🛠 Technologies Used  
Laravel – PHP framework  
MySQL – Database management  
Bootstrap – UI design  
Blade – Laravel's template engine  
Eloquent ORM – Database handling  

## 📦 Installation  

1-Clone the repository:  

(```)

(``git clone https://github.com/your-username/blog-project.git``)  
cd BlogSite-Laravel  

2-Install dependencies:  
composer install  

3-Create the .env file and update database credentials:  

cp .env.example .env  

4-Set up Laravel configuration:  

php artisan key:generate   
php artisan migrate  
php artisan serve  

5-The project will be available at http://127.0.0.1:8000.  


## 🏗 Database Setup  

php artisan migrate --seed  


## 📜 API Support (Optional)  
If API support is enabled, the following endpoints are available:  

GET /api/posts – Retrieve all posts  
GET /api/posts/{id} – Get a specific post  
POST /api/posts – Create a new post  
PUT /api/posts/{id} – Update a post  
DELETE /api/posts/{id} – Delete a post  



## MAIN PAGE

![Image](https://github.com/user-attachments/assets/a042dabe-a39d-49dd-84c0-9cf808aa16f7)


## CREATE NEW POST 

![Image](https://github.com/user-attachments/assets/6d479a85-2322-40a5-8677-5e01650bf97a)

## DELETE PAGE

![Image](https://github.com/user-attachments/assets/de90ce4c-9433-4edc-b2bb-d3f4a55ed947)
