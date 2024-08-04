# Currency Rate Comparator

## Project Description

Currency Comparator is a web application that fetches currency exchange rates from multiple APIs, compares them, and displays the lowest exchange rate for each currency. The application uses Laravel for the backend, includes a console command for fetching and storing rates, and features a simple frontend to display the rates.

## Features

- Fetches exchange rates from multiple APIs.
- Compares rates to find the minimum for each currency.
- Displays the rates on a web page.
- Uses Laravel's console command for periodic data fetching and storage.
- Provides a basic user interface with Bootstrap and jQuery.

## API Endpoints

- **API 1**: [API 1 Mock Server](https://run.mocky.io/v3/d0589181-8ea1-4eaf-aaea-119a7372f032)
- **API 2**: [API 2 Mock Server](https://run.mocky.io/v3/c257cdec-3144-48af-bb79-fd76af4c3ac6)

## Installation

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL or another compatible database

### Setup

1. **Clone the repository:**

   ```bash
   git clone https://github.com/senafrakara/currency-rates-comporator-laravel.git

2. Navigate to the project directory:
 ```bash
cd currency-rates-comporator-laravel
 ```

3.Install dependencies
 ```bash
composer install
 ```

4. Create a '.env' file:

Copy the .env.example file to .env:
 ```
cp .env.example .env
 ```

5.Set up the database:

Update the .env file with your database connection details.
 ```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
 ```
In this case, I created database with name "currency_rates"
Also you should install mysql.
 ```
brew install mysql
 ```
To start mysql server: 
 ```
brew services start mysql
 ```

6. Run database migration:
```
php artisan migrate
 ```

7. To run the application:
 ```
php artisan serve
 ```

I used valet in this project, so when you want to serve project without artisan, you can use "park" command in valet.
The park command registers a directory on your machine that contains your applications. Once the directory has been "parked" with valet, all of the directories within that directory will serve in your web browser at http://<directory-name>.test.

8. Create tables, these commands used:
 To create table for currency rates
 ```
php artisan make:migration create-currency_rates-table
 ```
To create table for api's url
 ```
php artisan make:migration create-api_models-table
 ```
After these step, migration files were updated with new columns names.

9. Create Model classes for currency rates and api's url
 ```
 php artisan make:model CurrencyRate
 ```
 ```
php artisan make:model ApiModel
 ```

10. Agfter updating models, to create console commands, you should run those commands:
 To insert api urls into database =>
 ```
php artisan make:command GetInsertApis
 ```
To fetch currency rates data from apis and insert into database =>
 ```
php artisan make:command GetAndInsertCurrencyRate
 ```

11. To set min currency rate for each currency, a Controller should be generated.
 ```
php artisan make:controller CurrencyController
 ```

12. To run our console commands, these commands called in order:
 ```
php artisan app:get-insert-apis
php artisan app:get-insert-currency
 ```
I used command signatures as "app:get-insert-apis" and "app:get-insert-currency" in this project. 

After the necessary calculations are made in the controller, you can get minimum currency rates for each currency units that fetched from different api's. <br />


<img width="682" alt="image" src="https://github.com/user-attachments/assets/b8cd6001-a544-4a73-9ae7-79d6dc95466b">
<img width="894" alt="image" src="https://github.com/user-attachments/assets/b93ac159-7721-4e7e-9902-6eea579ec563">


<img width="450" alt="image" src="https://github.com/user-attachments/assets/3b92cee3-f2f7-4f5d-b326-679605eeb393">

    

