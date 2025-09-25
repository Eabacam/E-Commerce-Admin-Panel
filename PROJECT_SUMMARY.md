### E-Commerce Admin Panel Resumen.

Panel de administración para eommerce construido con Laravel 11.

## Backend (PHP/Laravel).

# Migraciones de Base de Datos:

`create_categories_table` Categorías de productos
`create_products_table` Productos con SKU, precio, stock, imágenes
`create_orders_table` Órdenes con información del cliente
`create_order_items_table` Items de cada orden

# Modelos Eloquent:

**User** Usuario del sistema.
**Category** Con autoeneración de slugs y relación con productos.
**Product** Con autoeneración de SKU, slugs y validaciones de stock.
**Order** Con cálculo automático de totales y badges de estado.
**OrderItem** Con cálculo automático de subtotales.

# Controladores:

**AuthenticatedSessionController** Login/Logout.
**DashboardController** Estadísticas y métricas.
**CategoryController** CRUD completo con validaciones.
**ProductController** CRUD completo con manejo de imágenes.
**OrderController** Visualización y actualización de estados.

# Seeders:

**CategorySeeder** 6 categorías de ejemplo.
**ProductSeeder** 18 productos diferentes.
**OrderSeeder** 25 órdenes con distintos estados.

## Frontend (Blade/Tailwind):

# Layouts:

`layouts/app.blade.php` Layout principal con navegación.

# Vistas de Autenticación:

`auth/login.blade.php` Login con credenciales demo.

# Vistas:

**dashboard.blade.php** Dashboard con estadísticas.
**categories/index.blade.php** Listado con filtros.
**categories/create.blade.php** Formulario de creación.
**categories/edit.blade.php** Formulario de edición.
**products/index.blade.php** Listado con filtros.
**products/create.blade.php** Formulario con upload de imagen.
**products/edit.blade.php** Formulario de edición con preview de imagen.
**orders/index.blade.php** Listado con filtros por estado.
**orders/show.blade.php** Detalle completo con actualización de estado.

## Funcionalidades:

# Sistema de Autenticación:

Login seguro con validación.
Logout con invalidación de sesión.
Middleware de autenticación en todas las rutas protegidas.

# Dashboard con Estadísticas:

Total de productos, categorías, órdenes y ingresos.
Distribución de órdenes por estado.
Últimas 5 órdenes.
Productos con stock.

# CRUD de Categorías:

Crear, leer, actualizar y eliminar.
Autoeneración de slugs.
Búsqueda por nombre/descripción.
Filtro por estado activo/inactivo.
Contador de productos por categoría.
Prevención de eliminación si tiene productos.

# CRUD de Productos:

Crear, leer, actualizar y eliminar.
Autoeneración de SKU y slugs.
Upload y gestión de imágenes.
Búsqueda por nombre, SKU, descripción.
Filtros por categoría, estado y nivel de stock.
Indicadores visuales de stock (bajo, agotado, disponible).
Marcado de productos destacados.
Prevención de eliminación si tiene órdenes.

# Gestión de Órdenes:

Visualización de todas las órdenes.
Filtros por estado y búsqueda.
Vista detallada con items.
Información completa del cliente.
Actualización de estado de orden.
Notas internas editables.
Cálculo automático de subtotales, impuestos y envío.
Badges con colores según estado.

## Características:

# Validaciones:

Campos requeridos en todos los formularios.
Validación de tipos de datos.
Validación de unicidad (slugs, SKUs, emails).
Validación de formatos de archivos (para imágenes).
Mensajes de error personalizados.

# Relaciones de Base de Datos:

`Category` hasMany `Product`.
`Product` belongsTo `Category.`
`Order` hasMany `OrderItem`.
`Product` hasMany `OrderItem`.
`OrderItem` belongsTo `Order` y `Product`.

# Autogeneración de Datos:

**Slugs** para categorías y productos (basados en el nombre).
**SKU** para productos (formato: SKUXXXXXXX).
**Order Number** para órdenes (formato: ORDXXXX).
**Subtotales** calculados automáticamente en order items.

# UX/UI Profesional:

Diseño responsive con Tailwind CSS.
Navegación intuitiva con indicadores de página activa.
Badges con colores para estados y alertas.
Alertas de éxito/error para acciones.
Paginación en todos los listados.
Búsqueda y filtros en vistas index.
Confirmaciones para acciones destructivas.

# Seguridad:

Protección CSRF en todos los formularios (Falsificación de Petición en Sitios Cruzados).
Autenticación requerida para todas las rutas.
Validación de datos en servidor.
Passwords hasheados con bcrypt.
Sanitización de inputs.

## Datos de Prueba:

# Usuario Administrador:

Email: admin@example.com
Password: password

# Categorías:

Electronics.
Clothing.
Home & Garden.
Sports & Outdoors.
Books.
Toys & Games.

# Productos:

Variedad de productos en diferentes categorías con precios, stock y descripciones.

# Órdenes:

Con diferentes estados (pending, processing, shipped, delivered, cancelled) y múltiples items por orden.

# Estructura de Archivos:

```
app/
├── Http/Controllers/
│   ├── Auth/AuthenticatedSessionController.php
│   ├── CategoryController.php
│   ├── DashboardController.php
│   ├── OrderController.php
│   └── ProductController.php
├── Models/
│   ├── Category.php
│   ├── Order.php
│   ├── OrderItem.php
│   └── Product.php
database/
├── migrations/ [4 archivos]
└── seeders/ [3 archivos + DatabaseSeeder]
resources/views/
├── layouts/app.blade.php
├── auth/login.blade.php
├── dashboard.blade.php
├── categories/ [3 vistas]
├── products/ [3 vistas]
└── orders/ [2 vistas]
routes/
├── web.php
└── auth.php
``` 

# Comandos para iniciar proyecto:

```bash
# 1. Generar key
php artisan key:generate

# 2. Crear base de datos (MySQL)
CREATE DATABASE ecommerce_admin;

# 3. Configurar .env con credenciales de BD

# 4. Migrar y sembrar datos
php artisan migrate eed

# 5. Crear enlace de storage
php artisan storage:link

# 6. Iniciar servidor
php artisan serve
```

# Habilidades:

1. **Fulltack**: Backend (Laravel/PHP) + Frontend (Blade/Tailwind).
2. **Arquitectura MVC**: Separación clara de responsabilidades.
3. **Base de Datos**: Diseño de esquema, migraciones, relaciones.
4. **ORM Eloquent**: Modelos con relaciones y métodos auxiliares.
5. **Validaciones**: Robustas y con mensajes claros.
6. **UI/UX Profesional**: Interfaz moderna y responsive.
7. **Gestión de Estado**: Manejo de sesiones y autenticación.
8. **CRUD Completo**: Operaciones create, read, update, delete.
9. **Filtros y Búsqueda**: Funcionalidad avanzada de consultas.
10. **Buenas Prácticas**: Código limpio, comentado y organizado.

# Posibles Mejoras Futuras

Sistema de roles y permisos (admin, editor, viewer).
API REST para integración con frontend SPA.
Exportación de reportes a PDF/Excel.
Gráficos interactivos en dashboard (Chart.js).
Sistema de notificaciones por email.
Multidioma (i18n).
Tests unitarios y de integración.
Integración con pasarelas de pago.
Sistema de inventario avanzado.
Chat de soporte interno.


**Tecnologías:** Laravel 11, PHP 8.2, MySQL, Blade, Tailwind CSS.

