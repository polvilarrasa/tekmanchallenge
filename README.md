![Image description](public/img/tekman.svg)

------------------------------------------------------
               Test candidato Tekman                   
------------------------------------------------------

Bienvenido a Test candidato Tekman, te acabamos de dar permiso al repositorio con lo cual has podido acceder a realizar
nuestro Test.

Para este feature contamos con un symfony 5.4 pelao que solo tiene manejo de orm's y doctrine.

y lo que queremos es listar los pedidos realizados por un comando de consola y un endpoint que debera listar todos los pedidos.
Para probar el endpoint, la url debera ser: http://prueba.tekman.cloud/orders

###### Se pide:
    - Crea una rama desde master con tu nombre y apellido.
    - Configurar en .env la conexion con la base de datos del container
    - Crea un BoundedContext TekmanCandidate
    - Crear modelo Orders.php con las propiedades de la tabla orders.               CAPA DOMAIN
    - Crear interface OrdersRepository con los métodos que consideres necesarios.   CAPA DOMAIN
    - Crear repositorio DoctrineOrdersRepository                                    CAPA INFRAESTRUCTURE
    - Crear caso de uso GetOrders                                                   CAPA APPLICATION
    - Crear Caso de uso ListOrders                                                  CAPA APPLICATION
    - Corregir si es necesario la conf de nginx para el correcto funcionamiento     CAPA INFRAESTRUCTURE
    - Queremos que dentro del BoundedContext TekmanCandidate apliques:
        - principios SOLID
        - arquitectura hexagonal
        - DDD, apostamos por llevar toda nuestra lógica de negocio al dominio y así evitar tenerla desperdigada por todo
          el proyecto.
        - TDD, aplica tests.
    - Crea un camando de consola                                                    CAPA INFRAESTRUCTURE
    - Crea un nuevo endpoint GET, que liste todas las orders de la BBDD en formato json, añade en el Controller las 
        exceptiones necesarias. 
    - Queremos ver el resultado en un comando de consola 'tekman:list:orders' y en via petición GET /orders     
        
###### Docker:        
- El proyecto consta con Docker, por tanto si ejecutas desde terminal:
    - docker-compose up --build ya tendras el container docker.

- Acceder por terminal al container docker y tirar comandos de consola
	- docker-compose run web php bin/console tekman:list:orders

###### Resultado esperado:
    ========================Tekman Candidate Begin======================
    
    +-------------------- Orders ----------+---------+
    | id                                   | name    |
    +--------------------------------------+---------+
    | 68ba2622-c8da-41d7-9a5c-64a19214d7de | order 1 |
    | 68ba2622-c8da-41d7-9a5c-64a19214d7df | order 2 |
    +--------------- total orders: 2 ------+---------+
    
    ========================Tekman Candidate End========================
    

###### Se valorara agregar algo de lógica al modelo de Orders, la lógica que tu quieras inventarte.