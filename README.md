# INTRUCCIONES PARA CORRER APP EN DESARROLLO

1. Si no se tiene las dependencias necesarias de PHP, instalarlas a traves del siguiente comando: 

MacOS
```/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"```

Windows:
```
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

2. Correr servidor de desarrollo: `composer run dev`

3. En el navegador busca `http://localhost:8000` para ver la app corriendo.

4. Ejecutar la migración para la DB: `php artisan migrate:fresh`

5. Ejecutar el seed para llenar la DDBB: `php artisan db:seed` y recargar el navegador para ver los cambios.

# NOTAS DEL DESARROLLO

- Se usaron componentes tradicionales de Laravel para la parte de la creacion, edicion y borrado de las task, con la estructura Modelo, vista, controlador
- Para la modificacion de status y el filtrado se usaron componentes Livewire de Laravel, los cuales ni siguen la estructura Modelo-Vista-Controlador, sino que realizan la logica dentro del mismo componente y lo renderizan en la vista .blade sin necesidad de un controlador como tal. Esto lo hice de esta manera para una experiencia de usuario mas fluida y tambien mostrar diferentes formas de implementacion.
- La tabla de tarear in-progress la renderizo con la estructura Modelo-vista-controlador, mientras que la tabla principalla renderizo con Livewire para poder aplicar el filtrado dinamico.
- Separación por componentes para abstraer mejor la logica de cada parte de la app y mayor mantenibilidad y escalabilidad.
- Para los estilos use Tailwind y componentes de Bootstrap para hacer un desarrollo más rapido en la UI.
- Se usaron las animaciones por defecto de bootstrap y un fade-in personalizado para la vista general.d
- Formato de fechas con Carbon, nativo de Laravel.
- Eloquent ORM para las consultas a la DDBB, tambien nativo en Laravel.