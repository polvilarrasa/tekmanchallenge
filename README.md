------------------------------------------------------
               Comentarios                   
------------------------------------------------------

    - El Comando de consola, el Endpoint y los Fixtures se han dejado en src/

    - Los tests se han creado en tests/

    - He instaldo y configurado el Doctrine des de 0 ya que en el repositorio inicial no
    estaba. (Imagino que estará todo correcto)

    - El comando para acceder a docker y ejecutar, no funcionaba y me he dado cuenta que había que cambiar
    el web por php ("docker-compose run php php bin/console tekman:list:orders")

    - Para la configuración del Nginx, había que poner bien el root del server y el parámetro fastcgi_pass
    apunta al servidor php a "php:9000" en vez de como estaba a "localhost:9000"

    - Se ha dividido el BoundedContext en 3 capas: Domain, Application y Infrastructure

    - Para la parte del Domain he creado la clase Order sólo con los atributos que deben mostrarse en el comando de consola.
        · He creado una interfaz OrderRepository básica con el método save y findAll().

        · He creado una interfaz OrderTransformer que transforma un Order en un array.

        · He creado un par de excepciones que se lanzan en caso de construir mal una Orden.

    - Se podían haber creado 2 value object, uno para el id de order y otro para el name pero no se ha hecho por no complicar el ejercicio.
    
    Para la parte de infrastructura:
        · La clase DoctrineOrdersRepository implementa la anterior interfaz y también extiende del ServiceManager de Doctrine
        así ya podriamos tener acceso a todas las funcionalidades de Doctrine.

        · La clase OrderJsonTransformer implementa la interfaz OrderTransformer y transforma un Order en un array
        con el id y el nombre.

    - Para la parte de aplicación, en el enunciado se indicaba crear 2 casos de uso, dentro de la capa aplicación solamente he creado 1 caso de uso, ya que me he dado cuenta de que no era necesario crear 2. Utilizando 1 unico transformer, podía hacer que el caso de uso me devolviese un array de Orders, y después en el Controller devolverlo como una JsonResponse o bién en el Comando de consola, imprimirlo por pantalla como indicaba el enunciado. El caso de uso se llama GetOrdersUseCase y recibe un OrderRepository y un OrderTransformer.

    Inicialmente había creado 2 casos de uso dentro de Application y tenía 2 transformadores (se puede ver en los commits), pero al final me he dado cuenta de que no era necesario y he eliminado el caso de uso y el transformer que haciendo una pequeña modificación podía utilizar el caso de uso que ya tenía.

    - Para la parte de los tests:
        · He creado un test unitario para la clase Order, donde se comprueba que se construya correctamente y que se lanzen las 2 excepciones mencionadas anteriormente

        · He creado un test unitario para el caso de uso GetOrders utilizando un MockRepository y comprobando que el caso de uso devuelva esos Orders en un array de arrays

        · He creado un test para el comando ListOrders, utilizando también un MockRepository y comprobando que se imprima por pantalla el array de arrays que devuelve el caso de uso (Se podria considerar "integración" ya que dependemos de la clase CommandTester de Symfony para poder validar el output del comando, si ejecutamos el comando normal sin la clase tester no podemos ver el output)

        · He creado un test para probar el endpoint, en este test solamente he validado que el servidor devuelva una respuesta valida, aquí podría haber hecho tests mucho más complejos, pero he decidido no hacerlo ya que habría necesitado montar todo un sistema de testeo con una base de datos dedicada y que se reseteara cada vez que se ejecutara el test, y no quería complicarme más el ejercicio.

        · Finalmente he creado un test para comprobar si el commando de consola funcionaba, aquí no he tenido en cuenta qué contenido devolvía el comando ya que se ha probado en el otro test.

    - A parte he creado una Fixture para poder cargar un par de datos y poder probar el endpoint y el comando de consola a parte de los tests.