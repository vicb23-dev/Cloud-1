#!/bin/bash

scp -i "C:/Users/vicb4/OneDrive/Documents/SEMESTRE VIII/Nube/keysss/ssh-key-2026-09-23.key" -r ./css ./database ./includes ./agregar.php ./config.php ./editar.php ./eliminar.php ./index.php ./README.md ubuntu@150.136.210.28:/var/www/html/agenda/

echo "Sincronización realizada correctamente."