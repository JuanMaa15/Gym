
# Gym
Aplicación web de gimnasio desarrollada con laravel 9

Instalación:

- composer install

Luego cambia el nombre del archivo ".env.example" que se encuentra en la carpeta raíz por '.env'

- php artisan key:generate

Crear la base de datos y en el archivo ".env" defines el mismo nombre de la base de datos en "DB_DATABASE"

- php artisan migrate

- php artisan serve

En otra pestaña de la consola:

- npm install

- npm run dev


======================================================


Tener en cuenta:

Cuando un cliente se registra, el administrador deberá habilitar la cuenta del cliente en la pagina de administración. (esto para simular cuando un cliente realiza el pago del plan y luego de pagar en el gym el admin procede a activar la cuenta).

Cuando un cliente manda una solicitud de un plan alimenticio, le llegara al administrador para luego asignarlo a un instructor de nutrición y este pasara a registrar el plan alimenticio para el cliente.

Las horas que registren los instructores serán las horas que tienen para los entrenamientos personalizados.
