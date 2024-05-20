
# Mobee Car Price Checker

Data table that shows a list of car details and their respective prices. This project is to create a price checker function page where a user can select the car details and once completed the price will appear


## Installation

- ```git clone https://github.com/MuhdAfif98/mobee-car-price-checker.git```

- ```composer install```

- ```npm install```

- ```copy .env-example to .env```

- ```change database to mysql and enable the other config for the database```

- ```php artisan migrate```

- ```php artisan db:seed CarSeeder```

- ```composer dump-autoload```
- 
- ```php artisan serve```

## Brief Intro

I develop this simple project using Laravel, Livewire, Tailwind CSS and Filament table

I have two different method to filter the price

- Using Filament table
    - Filament table have options to filter the result directly using select option input

- Using Livewire
    - Livewire will send network request to filter the result based on the select option
