# TicTac

Third project of the upper cycle of Development of Web Applications at l'Institut Cendrassos, Figueres.

## Installation Guide 🚀

1. The first step is to download the latest version of the project and verify that we have php7.4.2 installed.

2. Next we will create a database and configure the variables in a `.env` file

3. Once the database is created, we will begin with the steps prior to migration.

4. Use the command `composer install` and` npm i` to install all the project dependencies.

5. Once installed, we will use the `php artisan migrate` command to migrate all the database tables.

6. If you want to add sample content you can also run `php artisan db: seed`.

7. Finally, you will have to use the `php artisan serve` command to turn on the local server and compile the application with` npm run dev` or `npm run watch`. If you want to see how it would work in production you can use the `npm run prod` command. You can also see the application running from [here](https://tictac.seoalexramon.dev/).

## Administration Guide 🔧

1. With an administrator and manager user you can access the administration panel. To do this you must go to the top right, where the username appears. Click and Panell Administració will appear.

2. Once inside you can see on the main administration page certain metrics that indicate the application's statistics.

3. Manager users can only access the Validate Comments and Articles section. Administrators have access to all parameters of the web project.

4. The admin user can edit, create and delete categories, users, articles and comments.

5. The administrator user can also edit the web design from the section with the same name.

## Autors ✒️

* **Oriol Bech**  - [Oriol Bech](https://github.com/OriolBech)
* **Adrián Pons** - [sleyvenn](https://github.com/sleyvenn)
* **Alex Ramón** - [SEOAlexRamon](https://github.com/SEOAlexRamon)