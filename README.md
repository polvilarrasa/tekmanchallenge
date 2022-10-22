------------------------------------------------------
               Comentarios                   
------------------------------------------------------

    - Se ha creado un fichero makefile que permite crear la base de datos
    con Fixtures y ejecutar los tests.

    - El Comando de consola, el Endpoint y los Fixtures se han dejado en src/

    - Los tests se han creado en tests/

    - Para el comando de consola se ha creado un transformer que recibe un array de Order
    y devuelve un string con el formato pedido.

    - Para el endpoint se ha creado un transformer que crea un array de un Order

    - Se podían haber creado 2 value object, uno para el id de order y otro para el name
    no se ha hecho por no complicar el ejercicio.

    - He instaldo y configurado el Doctrine des de 0 ya que en el repositorio inicial no
    estaba. (Imagino que estará todo correcto)