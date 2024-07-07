# H1  Login page setup 
This currently works using docker.

1. If you have docker installed, all you have to do is run docker-compose up --build -d Inside of your terminal
2. You should now be able to access all the pages on localhost:8080
3. You can Check what routes are available in the index.php

Everything should be all good!

For sample Data checkout the seed_data.php.

You can use that data to test logging into the site. which if successful will take you to the welcome page.

#H2 The Setup is missing the .env file for security purposes. Check the wp_config file to see what it's expecting.
