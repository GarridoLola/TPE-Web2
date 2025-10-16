# NutriAPP

## Integrantes del grupo
    * Garrido Dolores: loolaagarrido@gmail.com    
    * Calles Alan: callesalan718@gmail.com

## Temática del TPE: Nutrición

### Descripción:
El objetivo de este proyecto es desarrollar un sitio web dinámico que permita la visualización y administración de información nutricional. 
Cualquier persona podrá ingresar al sitio pero sólo los administradores podrán agregar, eliminar o modificar tanto los grupos de alimentos como los alimentos dentro de cada grupo.

El modelo de datos se centra en grupos alimenticios y en los alimentos que pertenecen a cada grupo, almacenando información como calorías, proteínas, carbohidratos, grasas y fibra.
La relación principal implementada es de 1 a N:

* Un grupo alimenticio puede contener múltiples alimentos.

* Cada alimento pertenece exclusivamente a un único grupo alimenticio.

### Usuarios no logueados:
Los usuarios que no inicien sesión podrán acceder únicamente a las secciones públicas de la página, que incluyen Home, Grupos de Alimentos y Alimentos. Tendrán la posibilidad de visualizar los detalles de cada grupo y sus alimentos, pero no podrán acceder a la sección administrativa. Para ello, será necesario iniciar sesión.

### Usuarios logueados:
Los usuarios registrados podrán ingresar a la sección de administración, donde podrán agregar, eliminar o modificar tanto los grupos de alimentos como los alimentos dentro de cada grupo. Además, podrán editar la información nutricional de cada alimento.

## Acceso administrador de datos:
    * Usuario: webadmin    
    * Contraseña: admin

### Despliegue del sitio (servidor Apache y MySQL):
Para desplegar el sitio web en un servidor con Apache y MySQL, lo primero que hay que hacer es clonar el repositorio git. Una vez que tenga el proyecto en el servidor, es necesario configurar la base de datos. Para eso, hay que importar en phpMyAdmin el archivo db_nutri.sql que se encuentra en la carpeta "TPE-Web2", contiene la estructura y los datos iniciales de la base de datos.

Desde el sitio web, podrás gestionar los datos de los grupos de alimentos y los alimentos. Después de realizar los cambios necesarios, podrás cerrar sesión y volver al acceso público, donde los cambios se reflejarán de inmediato. 

## Diagrama de Entidad de Relación
![Diagrama Entidad Relación](/der.png)