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

CREATE TABLE cuentas (
  id mediumint(9) NOT NULL AUTO_INCREMENT,
  nombre varchar(200) DEFAULT NULL,
  tipo varchar(200) DEFAULT NULL,
  subtipo varchar(200) DEFAULT NULL,
  telefono varchar(200) DEFAULT NULL,
  sitioWeb varchar(200) DEFAULT NULL,
  paisFisico varchar(200) DEFAULT NULL,
  provincia varchar(200) DEFAULT NULL,
  canton varchar(200) DEFAULT NULL,
  direccion varchar(200) DEFAULT NULL,
  latitud varchar(200) DEFAULT NULL,
  longitud varchar(200) DEFAULT NULL,
  descripcion varchar(200) DEFAULT NULL,
  zona varchar(200) DEFAULT NULL,
  ADORNE varchar(200) DEFAULT NULL,
  LIVINGLIGHT varchar(1) DEFAULT '0',
  MATIX varchar(1) DEFAULT '0',
  MAGIC varchar(1) DEFAULT '0',
  MODUSSTYLE varchar(1) DEFAULT '0',
  DOMINOSENCIA varchar(1) DEFAULT '0',
  DOMINOAVANT varchar(1) DEFAULT '0',
  OVAL varchar(1) DEFAULT '0',
  PASSSEYMOUR varchar(1) DEFAULT '0',
  IDROBOARD varchar(1) DEFAULT '0',
  TAPAUNIVERSAL varchar(1) DEFAULT '0',
  WIREMOLD varchar(1) DEFAULT '0',
  ONQ varchar(1) DEFAULT '0',
  BTDIN varchar(1) DEFAULT '0',
  TIVEN varchar(1) DEFAULT '0',
  ROTOMA varchar(1) DEFAULT '0',
  INTERCOMUNICADORES varchar(1) DEFAULT '0',
  CALOTACONBREAKER varchar(1) DEFAULT '0',
  TIMBRES varchar(1) DEFAULT '0',
  TIMBRESINALAMBRICOS varchar(1) DEFAULT '0',
  INTERLINK varchar(1) DEFAULT '0',
  DLPS varchar(1) DEFAULT '0',
  DLP varchar(1) DEFAULT '0',
  Cooper varchar(1) DEFAULT '0',
  Leviton varchar(1) DEFAULT '0',
  Hubbel varchar(1) DEFAULT '0',
  Conatel varchar(1) DEFAULT '0',
  Sica varchar(1) DEFAULT '0',
  Master varchar(1) DEFAULT '0',
  EagleCentroamerica varchar(1) DEFAULT '0',
  Simon varchar(1) DEFAULT '0',
  Vimar varchar(1) DEFAULT '0',
  Voltech varchar(1) DEFAULT '0',
  Teclastar varchar(1) DEFAULT '0',
  TandJ varchar(1) DEFAULT '0',
  OtroAcceElectrico varchar(255),
  Kocom varchar(1) DEFAULT '0',
  Commax varchar(1) DEFAULT '0',
  Aiphone varchar(1) DEFAULT '0',
  Yale varchar(1) DEFAULT '0',
  Swann varchar(1) DEFAULT '0',
  Steren varchar(1) DEFAULT '0',
  SLSystem varchar(1) DEFAULT '0',
  RL varchar(1) DEFAULT '0',
  OtroIntercomunicador varchar(255),
  SchneiderSquareD varchar(1) DEFAULT '0',
  EatonCutlerHammer varchar(1) DEFAULT '0',
  GeneralElectric varchar(1) DEFAULT '0',
  Siemens varchar(1) DEFAULT '0',
  OtroTablero varchar(255),
  EagleJS varchar(1) DEFAULT '0',
  DexsonSchneider varchar(1) DEFAULT '0',
  EagleEfapel varchar(1) DEFAULT '0',
  OtroCanalizacion varchar(255),
  PRIMARY KEY (id)
);



Cooper
Leviton
Hubbel
Conatel
Sica
Master
EagleCentroamerica
Simon
Vimar
Voltech
Teclastar
TandJ
OtroAcceElectrico
Kocom
Commax
Aiphone
Yale
Swann
Steren
SLSystem
RL
OtroIntercomunicador
SchneiderSquareD
EatonCutlerHammer
GeneralElectric
Siemens
OtroTablero
EagleJS
DexsonSchneider
EagleEfapel
OtroCanalizacion
