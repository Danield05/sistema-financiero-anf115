@echo off
echo ========================================
echo    INSTALADOR SIFIN - Sistema Financiero
echo ========================================
echo.

echo Verificando requisitos del sistema...
echo.

REM Verificar si PHP esta disponible
php --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ERROR: PHP no esta instalado o no esta en el PATH
    echo Por favor instala XAMPP primero
    pause
    exit /b 1
)

REM Verificar Composer
composer --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ERROR: Composer no esta instalado
    echo Descarga desde: https://getcomposer.org/Composer-Setup.exe
    pause
    exit /b 1
)

REM Verificar Node.js
node --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ERROR: Node.js no esta instalado
    echo Descarga desde: https://nodejs.org/
    pause
    exit /b 1
)

REM Verificar npm
npm --version >nul 2>&1
if %errorlevel% neq 0 (
    echo ERROR: npm no esta disponible
    echo Verifica la instalacion de Node.js
    pause
    exit /b 1
)

echo Todos los requisitos verificados correctamente.
echo.

echo ========================================
echo    INSTALANDO DEPENDENCIAS PHP
echo ========================================
echo.

composer install
if %errorlevel% neq 0 (
    echo ERROR: Fallo al instalar dependencias PHP
    pause
    exit /b 1
)

echo.
echo ========================================
echo    CONFIGURANDO ENTORNO
echo ========================================
echo.

REM Copiar .env si no existe
if not exist .env (
    copy .env.example .env
    echo Archivo .env creado desde .env.example
)

REM Generar clave de aplicacion
php artisan key:generate

echo.
echo ========================================
echo    INSTALANDO DEPENDENCIAS NODE.JS
echo ========================================
echo.

npm install
if %errorlevel% neq 0 (
    echo ERROR: Fallo al instalar dependencias Node.js
    pause
    exit /b 1
)

echo.
echo ========================================
echo    COMPILANDO ASSETS
echo ========================================
echo.

npm run dev
if %errorlevel% neq 0 (
    echo ERROR: Fallo al compilar assets
    pause
    exit /b 1
)

echo.
echo ========================================
echo    CONFIGURACION COMPLETADA
echo ========================================
echo.
echo SIFIN se ha instalado correctamente!
echo.
echo Pasos siguientes:
echo 1. Configura la base de datos en el archivo .env
echo 2. Ejecuta: php artisan migrate
echo 3. Opcional: php artisan db:seed
echo 4. Inicia XAMPP (Apache y MySQL)
echo 5. Accede a: http://localhost/sistema-financiero-anf115/public/
echo.
echo Para desarrollo adicional:
echo - php artisan serve (servidor Laravel)
echo - npm run watch (assets en tiempo real)
echo.

pause