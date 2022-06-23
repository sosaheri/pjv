<p align="center"><a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Sobre la aplicación

## Requisitos

- PHP >= 8.1
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Git

## Instalación

- crear virtual host para el proyecto con el nombre que hayan establecido
- ubicarse el la ruta root de virtual host
- realizar el clone del proyecto en git

```
https://github.com/sosaheri/pjv.git

```

- ingresar a la carpeta de proyecto /pjv 
- otorgar los permisos de escritura correspondientes al proyecto
```
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
```
-instalar las depencias de composer
```
composer install
```
-llenar archivo de configuración de laravel datos de mysql, smtp etc. y guardar
```
cp .env.example .env
nano .env
```
-generar nuevo api-key de laravel
```
php artisan key:generate
```
-crear tablas y datos básicos del sistema, se deben ejecutar las migraciones de laravel
```
php artisan migrate --seed
```
## Instalación

Para el uso del proyecto se crearon dos usuarios por defecto

usuario             credencial

-cliente@gmail.com  password
-admin@gmail.com    password


## Licencia

Se hereda licencia de laravel [MIT license](https://opensource.org/licenses/MIT).
