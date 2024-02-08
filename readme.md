
# PHP MVC Framework

Este es un marco de trabajo simple para aplicaciones web PHP que utiliza el patrón de diseño Modelo-Vista-Controlador (MVC). El marco de trabajo proporciona una estructura básica para el desarrollo de aplicaciones web PHP, incluyendo enrutamiento, controladores, vistas y modelos.

## 1. Crear un nuevo controlador

### Paso 1: Crear el archivo del controlador
Crea un nuevo archivo PHP en el directorio `app/controllers/`. El nombre del archivo debe seguir el formato `NombreController.php`, donde `Nombre` es el nombre de tu controlador. Por ejemplo, para un controlador de "Productos", crearías `ProductController.php`.

### Paso 2: Definir la clase del controlador
Dentro de tu nuevo archivo, define una clase que extienda de `Controller`. La clase debe seguir la convención de nomenclatura `NombreController`.

```php
<?php
    // Incluye el modelo si es necesario
    // require_once(__DIR__ . '/../models/Nombremodel.php');

    class ProductController extends Controller {
        // Define propiedades y/o constructores si es necesario
        public function __construct($param) {
            // Constructor code
        }

        // Métodos para manejar las acciones del controlador
        public function home() {
            $this->render('product');
        }

        // Otros métodos según sea necesario
    }
```

### Paso 3: Añadir el archivo de vista
Para cada acción del controlador que renderiza una vista, necesitas crear un archivo de vista correspondiente en `app/views/`. El nombre del archivo debe seguir el formato `nombreView.php`, donde `nombre` es el nombre de la vista que pasaste como argumento al método `render` en tu controlador.

Crea un archivo, por ejemplo, `productView.php` dentro de `app/views/`.

### Paso 4: Definiendo el contenido de la vista
Dentro del archivo de vista, puedes escribir el HTML y el PHP necesarios para generar el contenido de la página. Por ejemplo:

```php
<h1>Página de Producto</h1>
<!-- Más contenido HTML/PHP según sea necesario -->
```

## Reglas y recomendaciones generales

- Mantén la nomenclatura consistente para facilitar el mantenimiento y la comprensión del código.
- Asegúrate de que los métodos del controlador que están destinados a ser rutas accesibles sigan la lógica implementada en `Router->matchRoute`.
- Para usar modelos en tu controlador, debes incluirlos con `require_once` al principio de tu archivo de controlador y luego instanciarlos en el constructor o según sea necesario.
- Los archivos de vista deben ubicarse en la carpeta `views` y seguir la convención de nomenclatura `nombreView.php`.
- Utiliza el método `render` para generar vistas desde los controladores, pasando el nombre de la vista y, opcionalmente, el layout que quieras usar.

Siguiendo estos pasos y recomendaciones, podrás expandir la funcionalidad de la aplicación añadiendo nuevos controladores y vistas según sea necesario.

# Configuraciones

## Xdebug

```ini
;zend_extension = xdebug
; tutorial: https://www.youtube.com/watch?v=_vUOljbEzoE
; tutorial: https://simplecodetips.wordpress.com/2018/07/12/instalar-xdebug-con-xampp-en-ubuntu-18-04/
zend_extension = /opt/lampp/lib/php/extensions/no-debug-non-zts-20220829/xdebug.so

[XDebug]
xdebug.remote_enable=1
xdebug.remote_port=9003
xdebug.profiler_append = 0
xdebug.profiler_enable = 1
xdebug.profiler_enable_trigger = 0
xdebug.profile_output_dir = "/tmp"
xdebug.start_with_request = yes
xdebug.discover_client_host = true
xdebug.mode = debug

```

## Inicialización de Base de datos MySQL

```sql

CREATE DATABASE IF NOT EXISTS ecommerce;

USE ecommerce;

CREATE TABLE
    IF NOT EXISTS users (
        user_id INT PRIMARY KEY AUTO_INCREMENT,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(64) NOT NULL
    );


CREATE TABLE
    IF NOT EXISTS customers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        address VARCHAR(64) NOT NULL
    );
    
INSERT INTO customers (first_name, last_name, address) VALUES
    ('cristhian', 'manrique', 'cra 3 a 2 b 1 - yopal, casanare'),
    ('fernando', 'moreno', 'cra 1 a 2 b 3 - yopal, casanare'),
    ('cristhian fernando', 'moreno manrique', 'cra 1 b 2 a 3 - yopal, casanare');
    
INSERT INTO users (username, password) VALUES
    ('admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918'),
    ('user2', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86'),
    ('user3', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86'),
    ('user1', '057ba03d6c44104863dc7361fe4578965d1887360f90a0895882e58a6248fc86');

```
