
create table seccion (
	id_seccion integer auto_increment,
	categoria varchar (2) not null, 
	nombre_seccion varchar(20) not null,
	constraint id_seccion_pk primary key (id_seccion),
	constraint categoria_chk check (categoria in ('DE', 'TH'))
);

create table producto (
    codigo_barras integer auto_increment,
	id_seccion integer not null,
	precio float(3) not null,
	cantidad integer not null,
	nombre varchar (100) not null,
	descripcion varchar (200) not null,
	constraint codigo_barras_pk primary key (codigo_barras),
	constraint id_seccion_fk foreign key (id_seccion)
		references seccion (id_seccion)
);

create table cliente (
	id_cliente integer auto_increment,
	nombre varchar(100) not null,
	constraint id_cliente_pk primary key (id_cliente)
);

create table carrito (
	id_cliente integer not null,
	codigo_barras integer not null,
    constraint id_cliente_fk foreign key (id_cliente)
		references cliente (id_cliente),
	constraint codigo_barras_fk foreign key (codigo_barras)
		references producto (codigo_barras)
);
