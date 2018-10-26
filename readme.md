## Rocket X Developer Test

This app has been built using Laravel 5.7.
The app comprises of the following
- A CMS backend that can be logged into, to add, update and delete Casino details that includes name, location (latitude and longitude), and the opening times.
- A Google Map on the front that plots the location of the casinos and includes info windows that appear when the pin is clicked on.
- A user input, to input their location in latitude and longitude, to determine which of the casinos is closest.
- Browser unit tests to test the user location input and the admin login.

## Setup Summary

To get the system up and running you will need to do the following:

- Download the app and setup on the server
- Create an empty database
- Set the database and url settings in the .env file
- Perform a database migration and seed

## Setup on Server

To setup the app you need to download it from git using the command:

    git clone https://github.com/ascottp81/RocketX.git
    
When that has been downloaded, change the directory to the app directory, which will be RocketX.
When you are in that directory, run the command:

    composer update
    
This will install missing files.

## Settings

The server that is running the app, will need to point the domain to the 
``/public`` folder.

The settings that need to be set in the .env file are

    APP_URL=http://localhost
    DB_DATABASE=database_name
    DB_USERNAME=username
    DB_PASSWORD=password
    
## Database Migration and seed

To perform the migration and seed, you need to perform the following commands on a terminal at the root:

    php artisan migrate
    
Followed by:

    php artisan db:seed
    
This will create all of the database tables, and will create an administrator user account with the following details:

- Email: ``ascottp@yahoo.co.uk``
- Password: ``Password123``
 

## Usage

When the system is set up, if you go to the root page, you should see a message saying "No Casinos have been added".  To rectify this, you will need to login to the CMS by clicking on the login link on the top right corner.  This will take you to the login screen, where you will input the email and password.
This will take you to the Casinos page that should be empty.
Click on the "Add Casino" button that will take you to a form to add a casino.
After you have added a couple of casinos, you can logout by clicking on "Administrator" on the top right, then selecting "Logout".

If you return to the home page you should now see a Google Map plotting the location of the casinos that have just been added.
Above the map, there are inputs for your current location.  If you input this and press Submit, the map should plot the closest casino to that location.
If Reset is pressed, it will reset and show all of the casinos.


## Testing

A few browser tests have been added to test the user input and login to the CMS.
To run these tests open a terminal located at the root directory, and type in the following:

    php artisan dusk

This will run through the tests and at the end should say the following:

    OK (8 tests, 12 assertions)
