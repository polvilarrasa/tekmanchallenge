------------------------------------------------------
               Comentarios                   
------------------------------------------------------

    - El Comando de consola, el Endpoint y los Fixtures se han dejado en src/

    - Los tests se han creado en tests/

    - Para el comando de consola se ha creado un transformer que recibe un array de Order
    y devuelve un string con el formato pedido.

    - Para el endpoint se ha creado un transformer que crea un array de un Order

    - Se podían haber creado 2 value object, uno para el id de order y otro para el name
    no se ha hecho por no complicar el ejercicio.

    - He instaldo y configurado el Doctrine des de 0 ya que en el repositorio inicial no
    estaba. (Imagino que estará todo correcto)

    - El comando para acceder por terminal que me indicasteis ("docker-compose run web php bin/console tekman:list:orders") 
    no me han funcionado, no he tocado mucho docker y no se si es un problema mío local (utilizo docker en windows)
    o algún otro problema. Sin embargo, des de dentro del docker si que he podido ejecutar todo lo que he necesitado
    y me ha funcionado correctamente (tanto el tekman:list:orders, como los tests o los comandos de doctrine para la BD).