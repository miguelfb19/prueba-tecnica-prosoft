# INTRUCCIONES PARA CORRER APP EN DESARROLLO

1. Si no las tienes las dependencias necesarios de PHP, puedes instalarlas a traves del siguiente comando: 

MacOS
```/bin/bash -c "$(curl -fsSL https://php.new/install/mac/8.4)"```

Windows:
```
# Run as administrator...
Set-ExecutionPolicy Bypass -Scope Process -Force; [System.Net.ServicePointManager]::SecurityProtocol = [System.Net.ServicePointManager]::SecurityProtocol -bor 3072; iex ((New-Object System.Net.WebClient).DownloadString('https://php.new/install/windows/8.4'))
```

2. Correr servidor de desarrollo: `composer run dev`

