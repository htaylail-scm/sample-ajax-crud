# this is testing for jquery and laravel crud 

### Environment 
* PHP ^7.3|^8.0
* Laravel Framework ^8.75

### Step 1 Clone this project 
* git clone https://github.com/htaylail-scm/sample-ajax-crud.git

### Step 2  Install all the dependencies using composer

* composer install

### Copy the example env file and make the required configuration changes in the .env file
*  cp .env.example .env

### Generate a new application key 
* php artisan key:generate

### Run the database migrations (Set the database connection in .env before migrating) 
* php artisan migrate

### For staff seeder data
* php artisan migrate:fresh --seed

### Start the local development server
* php artisan serve

You can now access the server at 
<http://localhost:8000>

#### To test staff curd <http://localhost:8000/staff>