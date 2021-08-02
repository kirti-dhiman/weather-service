# Weather Service

Here is a service which will extract the weather of a particular city in celsius. When user inputs the city and the date, weather of that city will be fetched according to the date through OpenWeatherMap API.

### Installation

	### Code Installation - There are two methods to install code file on the php server
        - Git - Make sure a server(wampserver, xampp) is already installed in the system. Place the directory in the "www" folder in case   wampserver or in "htdocs" in case xampp. After that follow the below steps
            - git clone
            ```
            // database
            define('DB_HOST', 'localhost');
            define('DB_USER', 'root');
            define('DB_PASS', '');
            define('DB_NAME', 'weather-data');	
            ```
            - composer update
            - import weather.sql in the weather-data database

        - By downloading the Code files - Alternately, you may download the zip file of the project from url and extract it over folder `C:\xampp\htdocs\` or `C:\wamp\www\` which will create the project in a folder.

        - Open any Command Prompt terminal

        - Now move into the project directory
            `cd C:/xampp/htdocs/`

        - Update composer
            `composer update`

	### Database Configuration
		When a new db is created in PhpMyAdmin and after running weather.sql, the table weather is created here.
		It has following fields:
			- id (int) - Primary key for storing all the data
	  		- city (varchar) - User input through API
			- date (date) - User input through API
			- temp (decimal) - Fetched from openweathermapAPI
			- created_at (datetime) - Current date and time

### To fetch Weather Information
- Navigate to url http://localhost/weather-service/Weather/WeatherForecast.php?date=2021-08-02&city=Amsterdam
	- For adding city and date you have to change the query string parameters.
    - when you hit the url city and temperature got added in the database.
    - there are validations added as well
        - If date is not added then an error message shows up
        - If date format is not valid then an error message shows up
        - If city is not added then an error message shows up
        - We have to add proper city name and date format, then only the data is stored in the database

### Folder Structure
	- app - all db repositories and interfaces resides here.
        - database - database connection file is stored here.
        - exceptions - Custom exception classes are added here.
        - repositories - all repositories and interfaces are stored here.
	- core - core folder contains 
        - application.php - intializing the classes weatherApi and WeatherRepository
		- bootstrap.php - which will initiate the process
		- config.php - it contains the db info, weather api keys and url and app url
		- messages.php - it contains all the default messages used in the application
	- public - This contains the file which is accessible to user
	- src - weather Api, classes and objects are created in this folder. This folder includes validator and formatter also for validating the result
    - test - test classes for testing the data
    - weather - entry point of the application is configured in weatherForcast.php
 



