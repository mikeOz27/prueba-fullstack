<!-- PASOS PARA EL CORRECTO FUNCIONAMIENTO DEL PROYECTO DE LA API -->
### 1. `composer update`
### 2. `php artisan jwt:secret`
### 3. `php artisan db:create prueba_fullstack`
### 4. Renombrar el archivo .env.example por .env
### 5. Pegar esto en el apartado de conexion a la DB:   
                                                   DB_CONNECTION=mysql
                                                   DB_HOST=127.0.0.1
                                                   DB_PORT=3306 o puerto que se tenga por defecto
                                                   DB_DATABASE=prueba_fullstack
                                                   DB_USERNAME=usuario_por_db_por_defecto
                                                   DB_PASSWORD=password_por_defecto

### 6. Pegar la KEY en el .env: API_KEY=caNEJR2i4b92Kfj3t0xTkMLkMCRxyDpDg94O!caNEJR2i4b92Kfj3t0xTkMLkMCRxyDpDg94O
### 7. probar servicio de obtener las locaciones, sin llave: php artisan test

