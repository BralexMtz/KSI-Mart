
create table tienda (
	id_tienda integer auto_increment,
	sucursal varchar (100) not null,
	direccion varchar (100) not null,
	constraint id_tienda_pk primary key (id_tienda)
);

create table seccion (
	id_seccion integer auto_increment,
	id_tienda integer not null, 
	categoria varchar (2) not null, 
	constraint id_seccion_pk primary key (id_seccion),
	constraint id_tienda_fk foreign key (id_tienda) 
		references tienda (id_tienda),
	constraint categoria_chk check (categoria in ('DE', 'TH'))
);

create table producto (
    codigo_barras char(30) auto_increment,
	id_seccion integer not null,
	descripcion varchar (100) not null,
	precio float(3) not null,
	nombre varchar (100) not null,
	cantidad integer not null,
	constraint codigo_barras_pk primary key (codigo_barras),
	constraint id_seccion_fk foreign key (id_seccion)
		references seccion (id_seccion)
);

create table cliente (
	id_cliente integer auto_increment,
	id_tienda integer not null,
	nombre varchar(100) not null,
	constraint id_cliente_pk primary key (id_cliente),
	constraint id_tienda_fk foreign key (id_tienda)
		references tienda (id_tienda)
);

create table carrito (
	id_cliente integer not null,
	precio float(3) not null,
	nombre varchar (100) not null,
	cantidad integer not null,
    constraint id_cliente_fk foreign key (id_cliente)
		references cliente (id_cliente)
);
