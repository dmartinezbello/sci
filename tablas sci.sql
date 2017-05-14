create table Salida(
id_salida int not null auto_increment,
fecha date not null,
id_empleado int not null,
primary key (id_salida)
);

create table Empleado(
id_empleado int not null auto_increment,
usuario varchar(30) not null unique,
contrasena varchar(255) not null,
nombre varchar(30) not null,
apellido varchar(30) not null,
primary key (id_empleado)
);

create table Detalle_Salida(
id_detalle_salida int not null auto_increment,
id_producto varchar(10) not null,
cantidad numeric(12,2) not null,
id_salida int not null,
primary key (id_detalle_salida)
);

create table Devolucion(
id_devolucion int not null auto_increment,
tipo varchar(10) not null,
id_detalle_salida int null,
id_detalle_entrada int null,
primary key (id_devolucion)
);

create table Producto(
id_producto varchar(10) not null,
nombre varchar(30) not null,
precio numeric(12,2) not null,
descripcion varchar(100) not null,
id_categoria int not null,
id_proveedor int not null,
primary key (id_producto)
);

create table Categoria(
id_categoria int not null auto_increment,
nombre varchar(30) not null,
descripcion varchar(100) not null,
primary key (id_categoria)
);

create table Stock(
id_stock int not null auto_increment,
id_almacen int not null,
id_producto int not null,
cantidad numeric(12,2) not null,
primary key (id_stock)
);

create table Almacen(
id_almacen int not null auto_increment,
nombre varchar(30) not null,
direccion varchar(100) not null,
capacidad numeric(12,2) not null,
primary key (id_almacen)
);

create table Proveedor(
id_proveedor int not null auto_increment,
nombre varchar(30) not null,
email varchar(30) not null,
direccion varchar(100) not null,
telefono int not null,
primary key (id_proveedor)
);

create table Entrada(
id_entrada int not null auto_increment,
tipo varchar(30) not null,
fecha date not null,
primary key (id_entrada)
);

create table Detalle_Entrada(
id_detalle_entrada int not null auto_increment,
id_producto varchar(10) not null,
cantidad numeric(12,2) not null,
id_entrada int not null,
primary key (id_detalle_entrada)
);

alter table Salida
add foreign key (id_empleado) references Empleado(id_empleado);

alter table Detalle_Salida
add foreign key (id_salida) references Salida(id_salida);

alter table Detalle_Salida
add foreign key (id_producto) references Producto(id_producto);

alter table Devolucion
add foreign key (id_detalle_salida) references Detalle_Salida(id_detalle_salida);

alter table Devolucion
add foreign key (id_detalle_entrada) references Detalle_Entrada(id_detalle_entrada);

alter table Producto
add foreign key (id_categoria) references Categoria(id_categoria);

alter table Producto
add foreign key (id_proveedor) references Proveedor(id_proveedor);

alter table Stock
add foreign key (id_almacen) references Almacen(id_almacen);

alter table Stock
add foreign key (id_producto) references Producto(id_producto);

alter table Detalle_Entrada
add foreign key (id_entrada) references Entrada(id_entrada);

alter table Detalle_Entrada
add foreign key (id_producto) references Producto(id_producto);



