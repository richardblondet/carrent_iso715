<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Car Rent ISO715

Aplicación realizada con Laravel 5.5 para proyecto de exoneración, curso Desarrollo Con Tecnología OpenSource 2 ISO715, UNAPEC, Santo Domingo, DN.

## Instalación

### Requisitos
1. PHP CLI >= 7
2. Apache o NGIX
3. MySQL Server 5.7

### Pasos

1. Clona este repositorio
```
$ git clone https://github.com/richardblondet/carrent_iso715.git
$ cd carrent_iso715
```
2. Sirve el directorio `public`

3. Crear Base Datos `carrent_iso715`

4. Migrar los archivos 
```
$ php artisan migrate:install
```

5. Lista las routas y empieza a inspeccionar
```
$ php artisan route:list
```

## Atribución

- **Richard Blondet :: 2011-0235**

## Tencologías Empleadas

- **[Laravel 5.5](https://laravel.com/docs/5.5/migrations)**
- **[jQuery 2.1](https://jquery.com/)**
- **[Parsley](parsleyjs.org/doc/index.html)**
- **[MySQL 5.7](https://dev.mysql.com/doc/refman/5.7/en/)**

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
