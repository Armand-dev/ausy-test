<p align="center"><a href="#" target="_blank"><img src="https://cdn.cookielaw.org/logos/9c9e1da5-cb5e-4789-be00-8f37c0e84ef3/c0d19564-0900-4187-9d2b-c3a05dba1ee0/1267abc8-7981-4864-8038-9873b581e4c0/Logo_AUSY_by_Randstad_png.png" width="400" alt="Laravel Logo"></a></p>


## About the test

This is the test entry created by Armand Codreanu as per the requirements Ronald Staepels sent me via email.

The solution was created in Laravel 9.43.0
## Installation
Create a database and edit the database name in .env.

Run the commands below in order.

```
clone https://github.com/Armand-dev/ausy-test

composer install
php artisan migrate:fresh --seed

npm install && npm run dev

php artisan serve
```

Now you should be able to see the app. (ex: ``` http://127.0.0.1:8000```, port may differ)
## About the app

There is an admin panel and an invite screen.
By design there is nothing displayed on root ```http://127.0.0.1:8000/``` because the requirements said that there should be a mandatory department in the url.

As an admin you should go to ```http://127.0.0.1:8000/registrations```, should prompt you to login. 

Admin email:```admin@test.com```

Admin password:```Secret@12```

Under ```Registrations``` you should see 50 example registrations.
Under ```Departments``` you should see 4 example departments.

To see the invite form, copy any invite link from the ```Departments``` table.

### Thank you!
Appreciate your time for checking it out. Should you have any questions do not hesitate to contact me via email ```codarmi@gmail.com``` or phone ```+4 0723 156 323```.

I am excited to hear your feedback! Good luck!
