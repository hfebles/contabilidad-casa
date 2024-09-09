Para desarrollar un proyecto de contabilidad que incluya los 3 libros contables básicos (libro de ingresos y egresos, libro de inventarios y libro diario) en una base de datos, se recomienda la siguiente estructura de relaciones:

Entidades:

Cuentas:

Atributos:
ID_cuenta (PK)
Nombre
Tipo (activo, pasivo, capital, ingreso, gasto)
Saldo actual
Movimientos:

Atributos:
ID_movimiento (PK)
Fecha
Descripción
Monto
ID_cuenta (FK a Cuentas)
Tipo_movimiento (ingreso, egreso)
Entradas:

Atributos:
ID_entrada (PK)
Fecha
Número de factura
ID_movimiento (FK a Movimientos)
Proveedor (opcional)
Salidas:

Atributos:
ID_salida (PK)
Fecha
Número de factura
ID_movimiento (FK a Movimientos)
Cliente (opcional)
Productos:

Atributos:
ID_producto (PK)
Nombre
Descripción
Precio de compra
Precio de venta
Stock actual
Inventario:

Atributos:
ID_inventario (PK)
Fecha
ID_producto (FK a Productos)
Cantidad
Tipo_movimiento (entrada, salida)
Relaciones:

Una cuenta puede tener muchos movimientos. (1:N)
Un movimiento pertenece a una sola cuenta. (N:1)
Una entrada tiene un solo movimiento. (1:1)
Un movimiento puede tener una sola entrada. (1:1)
Una salida tiene un solo movimiento. (1:1)
Un movimiento puede tener una sola salida. (1:1)
Un producto puede tener muchos inventarios. (1:N)
Un inventario pertenece a un solo producto. (N:1)
Consideraciones adicionales:

La tabla de Cuentas puede incluir campos adicionales para clasificar las cuentas de manera más detallada, como por ejemplo, una columna para indicar si la cuenta es deudora o acreedora.
Las tablas de Entradas y Salidas pueden incluir campos para almacenar información adicional sobre las transacciones, como por ejemplo, la forma de pago o el nombre del vendedor o cliente.
La tabla de Productos puede incluir campos para almacenar información adicional sobre los productos, como por ejemplo, la categoría, la unidad de medida o la ubicación en el almacén.
La tabla de Inventario puede incluir campos para almacenar información adicional sobre los movimientos de inventario, como por ejemplo, el motivo del movimiento o el número de serie del producto.
Herramientas:

Existen diversas herramientas que pueden ser utilizadas para desarrollar el proyecto, incluyendo:

Sistemas de gestión de bases de datos (SGBD): MySQL, PostgreSQL, SQL Server, Oracle, etc.
Lenguajes de programación: Python, Java, C#, etc.
Frameworks de desarrollo web: Django, Ruby on Rails, Laravel, etc.
Hojas de cálculo: Excel, Google Sheets