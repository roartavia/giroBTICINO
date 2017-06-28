CREATE TABLE contactos (
    id int NOT NULL AUTO_INCREMENT,
    nombreCuenta varchar(255),
    nombre varchar(255),
    apellidos varchar(255),
    perfilContactoCargo varchar(255),
    telefono varchar(255),
    correo varchar(255),
    pais varchar(255),
    provincia varchar(255),
    canton varchar(255),
    zona varchar(255),
    asistente varchar(255),
    telefonoAsistente varchar(255),
    descripcion varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE bitacoras (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255),
    apellido varchar(255),
    telefono varchar(255),
    correo varchar(255),
    producto varchar(255),
    unidades varchar(255),
    monto varchar(255),
    premio varchar(255),
    PRIMARY KEY (id)
);

CREATE TABLE perfilContactoCargo (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255),
    PRIMARY KEY (id)
);

INSERT INTO perfilContactoCargo (nombre) VALUES
('Arquitecto'),
('Gerente General'),
('Gerente de Ventas o Mercadeo'),
('Gerente Administrativo'),
('Decorador Interiores'),
('Vendedor'),
('Electricista'),
('Ingeniero Electricista'),
('Diseñador Electrico'),
('Gerente de Compras'),
('Proveedor'),
('Agente Ventas'),
('Asistente de Compras'),
('Gerente de Proyecto'),
('Ingeniero Civil'),
('Ingeniero Electronico'),
('Comprador o cotizador'),
('Jefe de Compras'),
('Ingeniero Electromecanico'),
('Inversionista'),
('Contratista Electrico'),
('Presupuestador'),
('Responsable de Infraestructura o Mantenimiento'),
('Gerente de TI'),
('Jefe de tienda o sucursal'),
('Responsable o Ing. de Telecomunicaciones'),
('Tecnico Electricista'),
('Asistente Gerencia'),
('Contratista Eléctrico'),
('Especialista de Producto (Cableado)'),
('Asistente de Ventas'),
('Asistente Administrativa'),
('Proveeduría'),
('Instructor'),
('Asistente'),
('Supervisor de Ventas');
