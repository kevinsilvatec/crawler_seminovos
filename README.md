# crawler_seminovos
Application to collect information from ads on Seminovos using the Lumen microframework

# Dependecies
- GuzzleHttp: To capture the html of the used car route;
- DomCrawler: Used to filter the returned html and iterate it;
- CssSelector: Used in conjunction with DomCrawler it facilitated html filtering via CSS selectors.


# Endpoints
The application has three accessible endpoints: _/_ e _/search_ and _/searchad_

## /
- Method: GET;
- Function: Test the application;

## /search
- Method: POST;
- Function: Return the cleaned ads of seminovos.com.br;

## /searchad
- Method: POST;
- Function: Return the breakdown of a specific ad from seminovos.com.br;
**To more info of the endpoints, view the swagger in:  https://crawlerseminovos.herokuapp.com/swagger**


# Architeture
The application has the following architeture:

/-- app/\
/-- bootstrap/\
/-- database/\
/-- public/\
/-- resources/\
/-- routes/\
/-- storage/\
/-- tests/\
/-- vendor/\
/-- .env\
/-- .env.example\
/-- .gitignore\
/-- .styleci.yml\
/-- artisan
/-- composer.json\
/-- composer.lock.json\
/-- Procfile\
/-- README.md\


# Observations and run instructions
This application was developed in PHP using the lumen microframework. To run the application it is necessary to have PHP (I used xampp with PHP version 7.2) installed. The composer was used to manage the dependencies, so to see the application working it is necessary to install the composer and after cloning the application code, execute the command _composer install_ inside the application folder to install the dependencies. To start the application you need the command _php -S localhost: 8000 -t public_. I used the postman to make the consumption of the routes. The application can also be tested through the link: https://crawlerseminovos.herokuapp.com. There is also swagger documentation for the API. It is available at: https://crawlerseminovos.herokuapp.com/swagger.