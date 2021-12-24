# TicTac

Tercer projecte del cicle superior de Desenvolupament d'Aplicacions Web a l'Institut Cendrassos.

## Installation Guide 🚀

1. The first step is to download the latest version of the project and verify that we have php7.4.2 installed.

2. Next we will create a database and configure the variables in a `.env` file

3. Once the database is created, we will begin with the steps prior to migration.

4. Use the command `composer install` and` npm i` to install all the project dependencies.

5. Once installed, we will use the `php artisan migrate` command to migrate all the database tables.

6. If you want to add sample content you can also run `php artisan db: seed`.

7. Finally, you will have to use the `php artisan serve` command to turn on the local server and compile the application with` npm run dev` or `npm run watch`. If you want to see how it would work in production you can use the `npm run prod` command. You can also see the application running from [here] (https://tictac.seoalexramon.dev/).

## Administration Guide 🔧

1. Con un usuario administrador y gestor puedes acceder al panel de administración. Para ello debes ir arriba a la derecha, donde aparece el nombre de usuario. Hacer click y aparecerá Panell Administració.

2. Una vez dentro puedes ver en la página principal de administración ciertas métricas que indican las estadísticas de la aplicación.

3. Los usuarios gestor sólo pueden acceder al apartado Validar Comentarios y Artículos. Los administradores tienen acceso a todos los parámetros del proyecto web.

4. El usuario administrador puede editar, crear y eliminar categorías, usuarios, artículos y comentarios.

5. El usuario administrador también podrá editar el diseño web desde el apartado con el mismo nombre.

## Autors ✒️

* **Oriol Bech**  - [Oriol Bech](https://github.com/OriolBech)
* **Adrián Pons** - [sleyvenn](https://github.com/sleyvenn)
* **Alex Ramón** - [SEOAlexRamon](https://github.com/SEOAlexRamon)