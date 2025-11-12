# SIFIN - Sistema Financiero Integrado

## 📊 Descripción

SIFIN es un sistema financiero integral desarrollado con Laravel para la gestión completa de operaciones financieras. Incluye módulos para balances generales, estados de resultados, análisis financiero, gestión de cuentas contables y reportes personalizados.

### ✨ Características Principales

- **🏦 Gestión de Cuentas**: Catálogo completo de cuentas contables
- **📈 Análisis Financiero**: Balances generales y estados de resultados
- **📊 Reportes**: Análisis horizontal y vertical
- **👥 Gestión de Usuarios**: Sistema de roles y permisos
- **🏢 Empresas**: Múltiples empresas y sectores
- **📅 Períodos**: Gestión de períodos contables
- **🔐 Autenticación**: Login y registro seguro

### 🎨 Diseño Moderno

- **Tema Financiero**: Colores azul-negro con acentos rojo-naranja
- **Interfaz Responsiva**: Adaptable a móviles y desktop
- **Animaciones 3D**: Efectos visuales modernos
- **UX Optimizada**: Navegación intuitiva y profesional

## 🏗️ Arquitectura

SIFIN sigue el patrón de arquitectura **MVC (Model-View-Controller)** proporcionado por Laravel:

### 📂 Estructura MVC

- **Models (Modelos)**: Representan las entidades de negocio y la lógica de datos
  - `User`, `Empresa`, `Cuenta`, `BalanceGeneral`, `EstadoResultado`
  - Relaciones Eloquent ORM
  - Validaciones y reglas de negocio

- **Views (Vistas)**: Capa de presentación con plantillas Blade
  - `resources/views/` - Plantillas Blade
  - Layouts, componentes y páginas
  - Diseño responsive con Bootstrap

- **Controllers (Controladores)**: Manejan la lógica de aplicación
  - `app/Http/Controllers/` - Lógica de negocio
  - Validación de requests
  - Respuestas JSON/API

### 🔄 Flujo de Datos

```
Usuario → Route → Controller → Model → Database
    ↓
Response ← View ← Controller ← Model ← Database
```

## ️ Tecnologías Utilizadas

- **Framework**: Laravel 8.x (MVC)
- **Backend**: PHP 7.3+/8.0+
- **Frontend**: Bootstrap 4, FontAwesome, Stisla Admin Template
- **Base de Datos**: MySQL con Eloquent ORM
- **Assets**: Laravel Mix, Sass, Webpack
- **Autenticación**: Laravel Sanctum
- **Permisos**: Spatie Laravel Permission
- **API**: RESTful con recursos

## 📋 Requisitos del Sistema

- **PHP**: 7.3+ o 8.0+
- **Composer**: Última versión
- **Node.js**: 14+ con npm
- **XAMPP**: Apache, MySQL, PHP
- **Navegador**: Chrome, Firefox, Safari (últimas versiones)

## 🚀 Instalación y Configuración

### Opción 1: Instalación Automática (Recomendada)

```bash
# Clona el repositorio desde GitHub
cd C:/xampp/htdocs/
git clone https://github.com/Danield05/sistema-financiero-anf115.git
cd sistema-financiero-anf115

# Ejecuta el instalador automático
setup.bat
```

### Opción 2: Instalación Manual

Si prefieres instalar manualmente o el script falla:

### 2. Instalación de Dependencias PHP

```bash
# Instala las dependencias de Composer
composer install
```

### 3. Configuración del Entorno

```bash
# Copia el archivo de configuración
copy .env.example .env

# Genera la clave de aplicación
php artisan key:generate
```

#### 📝 Configuración del archivo .env

Después de copiar `.env.example` a `.env`, configura los siguientes valores según tu entorno local:

**Archivo `.env` - Valores a modificar:**

```env
# === CONFIGURACIÓN DE APLICACIÓN ===
APP_NAME="Sistema Financiero ANF115"                    # Nombre de tu aplicación
APP_ENV=local                                           # Entorno (local/production)
APP_DEBUG=true                                          # Activar debug en desarrollo
APP_URL=http://localhost/sistema-financiero-anf115/public  # URL completa de la app

# === CONFIGURACIÓN DE BASE DE DATOS ===
DB_CONNECTION=mysql                                    # Tipo de base de datos
DB_HOST=127.0.0.1                                      # Host (localhost para XAMPP)
DB_PORT=3306                                           # Puerto MySQL
DB_DATABASE=sistema_financiero_anf115                  # Nombre de la base de datos
DB_USERNAME=root                                       # Usuario MySQL
DB_PASSWORD=                                           # Contraseña MySQL (vacía en XAMPP)
```

**Pasos para configurar:**
1. Abre el archivo `.env` con un editor de texto
2. Modifica solo los valores marcados arriba según tu configuración de XAMPP
3. **Importante**: Crea la base de datos `sistema_financiero_anf115` en phpMyAdmin antes de ejecutar migraciones
4. No modifiques otros valores a menos que sepas lo que haces

### 5. Instalación de Assets

```bash
# Instala dependencias de Node.js
npm install

# Compila los assets
npm run dev
```

### 6. Configuración de Base de Datos

**Opción A: Usar Migraciones (Recomendado)**
```bash
# Ejecuta las migraciones
php artisan migrate

# Ejecuta los seeders (opcional)
php artisan db:seed
```

**Opción B: Importar archivo SQL**
```bash
# Importa el archivo SQL incluido en el repositorio
# En phpMyAdmin: Importar > seleccionar sistema_financiero_anf115.sql
# O desde línea de comandos:
mysql -u root -p sistema_financiero_anf115 < sistema_financiero_anf115.sql
```

### 7. Inicio del Servidor

```bash
# Inicia XAMPP (Apache y MySQL)
# O usa el servidor integrado de Laravel
php artisan serve
```

## 🌐 Acceso al Sistema

Después de la instalación exitosa, accede al sistema desde tu navegador:

- **URL Principal**: `http://localhost/sistema-financiero-anf115/`
- **Página de Bienvenida**: `http://localhost/sistema-financiero-anf115/`
- **Login**: `http://localhost/sistema-financiero-anf115/login`
- **Registro**: `http://localhost/sistema-financiero-anf115/register`

> **Nota**: Gracias al archivo `.htaccess` incluido, puedes acceder sin `/public` en la URL.

### 📱 Páginas Disponibles

- **🏠 Welcome**: Página de bienvenida con información del proyecto
- **🔐 Login**: Autenticación de usuarios
- **📝 Register**: Registro de nuevos usuarios
- **📊 Dashboard**: Panel principal (requiere login)
- **💰 Balances**: Gestión de balances generales
- **📈 Estados**: Estados de resultados
- **📋 Cuentas**: Catálogo de cuentas contables
- **👥 Usuarios**: Gestión de usuarios y roles

## 📁 Estructura del Proyecto

```
sistema-financiero-anf115/
├── app/                    # Código de la aplicación Laravel
│   ├── Http/Controllers/   # Controladores
│   ├── Models/            # Modelos Eloquent
│   └── ...
├── resources/             # Vistas y assets
│   ├── views/            # Plantillas Blade
│   ├── css/              # Hojas de estilo
│   └── js/               # JavaScript
├── public/               # Assets públicos
│   ├── css/              # CSS compilado
│   ├── js/               # JS compilado
│   └── img/              # Imágenes
├── database/             # Migraciones y seeders
├── routes/               # Definición de rutas
└── config/               # Configuración de Laravel
```

## 👥 Equipo Desarrollador

| Apellidos | Nombres | Carnet |
|-----------|---------|--------|
| Aquino Cortez | Jose Daniel | AC21051 |
| Carranza Lopez | Angel Adan | CL19037 |
| Garcia Alfaro | Hugo Alejandro | GD15026 |

## 📝 Comandos Útiles

```bash
# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Recrear base de datos
php artisan migrate:fresh --seed

# Compilar assets para producción
npm run prod

# Ejecutar tests
php artisan test
```

## 🔧 Solución de Problemas

### Error de conexión a base de datos
- Verifica que MySQL esté ejecutándose en XAMPP
- Confirma las credenciales en `.env`
- Crea la base de datos manualmente si es necesario

### Assets no cargan
- Ejecuta `npm run dev` para compilar assets
- Limpia el caché del navegador (Ctrl+F5)
- Verifica que los archivos estén en `public/` folder

### Extensiones PHP faltantes
- Habilita `gd`, `zip`, `pdo_mysql` en `php.ini`
- Reinicia Apache después de cambios

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📄 Licencia

Este proyecto está bajo la Licencia MIT - ver el archivo [LICENSE](LICENSE) para más detalles.

## 📞 Soporte

Para soporte técnico o preguntas, contacta al equipo de desarrollo.

---

**Desarrollado con ❤️ por el equipo de SIFIN**