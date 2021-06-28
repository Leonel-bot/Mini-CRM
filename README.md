# Mini-CRM Laravel

Proyecto de gestión de empresas y empleados.

## Instalación

Instale todas las dependencias necesarias

```bash
composer install
```
Crear copia del archivo `.env.example` y a la copia renombrarla `.env`.

Crear una base de datos y relacionarla con Laravel en el archivo `.env`
`
DB_DATABASE=database
`
```bash
php artisan key:generate
```
```bash
php artisan storage:link
```
Crea las tablas users/companies/employees y crea el usuario administrador
```bash
$ php artisan migrate --seed 

```

## Ejecutar
```bash
$ php artisan serv
```
## User Admin

**Email:** admin@admin.com

**Password:** password
