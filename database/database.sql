CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios(
id int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
imagen varchar(255),
CONSTRAINT pk_usuarios primary key(id),
CONSTRAINT uq_email unique(email)
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(null,'Admin','Admin','admin@admin.com','contraseña','admin',null);

CREATE TABLE categorias(
id int(255) auto_increment not null,
nombre varchar(100) not null,

CONSTRAINT pk_categorias primary key(id),
)ENGINE=InnoDb;

INSERT INTO categorias VALUES(null,'Manga corta');
INSERT INTO categorias VALUES(null,'Manga larga');
INSERT INTO categorias VALUES(null,'Tirantes');
INSERT INTO categorias VALUES(null,'Sudaderas');

CREATE TABLE productos(
id int(255) auto_increment not null,
categoria_id int(255) not null,
nombre varchar(100) not null,
descripcion text,
precio float(100,2) not null,
stock int(255) not null,
oferta varchar(2),
fecha date not null,
imagen varchar(255),
CONSTRAINT pk_productos primary key(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)
)ENGINE=InnoDb;

CREATE TABLE pedidos(
id int(255) auto_increment not null,
usuario_id int(255) not null,
privincia varchar(100) not null,
localidad varchar(100) not null,
direccion varchar(255) not null,
coste float(200,2) not null,
estado varchar(20) not null,
fecha date,
hora time,
CONSTRAINT pk_pedidos primary key(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)
)ENGINE=InnoDb;


CREATE TABLE lineas_pedidos(
id INT(255) auto_increment not null,
pedido_id int(255)  not null,
producto_id int(255)  not null,
unidades int(255),
CONSTRAINT pk_lineas_pedidos PRIMARY KEY (id),
CONSTRAINT fk_linea_pedido_ FOREIGN KEY (pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY (producto_id) REFERENCES productos(id)
)ENGINE=InnoDb;
