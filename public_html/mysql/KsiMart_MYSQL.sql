create table tienda(
	id_tienda int ,
	sucursal varchar(100) not null,
	direccion varchar(100) not null,
	constraint id_tienda_pk primary key (id_tienda)
);

create table seccion (
	id_seccion int ,
	id_tienda int not null, 
	categoria varchar(2) not null, 
	constraint id_seccion_pk primary key (id_seccion),
	constraint seccion_id_tienda_fk foreign key (id_tienda) 
		references tienda (id_tienda),
	constraint categoria_chk check (categoria in ('DE', 'TH'))
);

create table producto (
    codigo_barras char(30) ,
	id_seccion int not null,
	descripcion varchar(100) not null,
	precio float(3) not null,
	nombre varchar(100) not null,
	cantidad int not null,
	constraint codigo_barras_pk primary key (codigo_barras),
	constraint prosucto_id_seccion_fk foreign key (id_seccion)
		references seccion (id_seccion)
);

create table cliente (
	id_cliente int ,
	id_tienda int not null,
	nombre varchar(100) not null,
	constraint id_cliente_pk primary key (id_cliente),
	constraint cliente_id_tienda_fk foreign key (id_tienda)
		references tienda(id_tienda)
);

create table carrito (
	id_cliente int not null,
	precio float(3) not null,
	nombre varchar(100) not null,
	cantidad int not null,
	fecha date not null,
    constraint carrito_id_cliente_fk foreign key (id_cliente)
		references cliente (id_cliente)
);