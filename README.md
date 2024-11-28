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
### 6. Pegar KEY en el .env: 
    API_KEY=Y2FORUpSMmk0YjkyS2ZqM3QweFRrTUxrTUNSeHlEcERnOTRPY2FORUpSMmk0YjkyS2ZqM3QweFRrTUxrTUNSeHlEcERnOTRP
### 7 `php artisan serve`
### 8. Credential:
    test@example.com
    password
### 9. Para pruebas de test, pasar a la rama test, primero detener el servior: tecla win + C(windows) - comand + c(iO)
    git branch -M test
    git pull origin test
    php artisan test

