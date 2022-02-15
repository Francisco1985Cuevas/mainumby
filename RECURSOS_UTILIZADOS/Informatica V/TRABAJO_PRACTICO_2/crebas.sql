/*==============================================================*/
/* DBMS name:      Sybase SQL Anywhere 10                       */
/* Created on:     29/06/2015 21:18:41                          */
/*==============================================================*/


if exists(select 1 from sys.sysforeignkey where role='detallecompra_compra') then
    alter table ComprasProductos
       delete foreign key detallecompra_compra
end if;

if exists(select 1 from sys.sysforeignkey where role='item_producto') then
    alter table VentasProductos
       delete foreign key item_producto
end if;

if exists(select 1 from sys.sysforeignkey where role='item_venta') then
    alter table VentasProductos
       delete foreign key item_venta
end if;

if exists(select 1 from sys.sysforeignkey where role='cliente_persona') then
    alter table clientes
       delete foreign key cliente_persona
end if;

if exists(select 1 from sys.sysforeignkey where role='compra_proveedor') then
    alter table compras
       delete foreign key compra_proveedor
end if;

if exists(select 1 from sys.sysforeignkey where role='funcionario_persona') then
    alter table funcionarios
       delete foreign key funcionario_persona
end if;

if exists(select 1 from sys.sysforeignkey where role='persona_ciudad') then
    alter table personas
       delete foreign key persona_ciudad
end if;

if exists(select 1 from sys.sysforeignkey where role='producto_tipoproducto') then
    alter table productos
       delete foreign key producto_tipoproducto
end if;

if exists(select 1 from sys.sysforeignkey where role='proveedor_persona') then
    alter table proveedores
       delete foreign key proveedor_persona
end if;

if exists(select 1 from sys.sysforeignkey where role='tipoProducto_tipoImpuesto') then
    alter table tipos_de_productos
       delete foreign key tipoProducto_tipoImpuesto
end if;

if exists(select 1 from sys.sysforeignkey where role='venta_cliente') then
    alter table ventas
       delete foreign key venta_cliente
end if;

if exists(select 1 from sys.sysforeignkey where role='venta_funcionario') then
    alter table ventas
       delete foreign key venta_funcionario
end if;

if exists(
   select 1 from sys.systable 
   where table_name='ComprasProductos'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table ComprasProductos
end if;

if exists(
   select 1 from sys.systable 
   where table_name='VentasProductos'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table VentasProductos
end if;

if exists(
   select 1 from sys.systable 
   where table_name='ciudades'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table ciudades
end if;

if exists(
   select 1 from sys.systable 
   where table_name='clientes'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table clientes
end if;

if exists(
   select 1 from sys.systable 
   where table_name='compras'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table compras
end if;

if exists(
   select 1 from sys.systable 
   where table_name='funcionarios'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table funcionarios
end if;

if exists(
   select 1 from sys.systable 
   where table_name='personas'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table personas
end if;

if exists(
   select 1 from sys.systable 
   where table_name='productos'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table productos
end if;

if exists(
   select 1 from sys.systable 
   where table_name='proveedores'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table proveedores
end if;

if exists(
   select 1 from sys.systable 
   where table_name='tipos_de_impuestos'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table tipos_de_impuestos
end if;

if exists(
   select 1 from sys.systable 
   where table_name='tipos_de_productos'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table tipos_de_productos
end if;

if exists(
   select 1 from sys.systable 
   where table_name='ventas'
     and table_type in ('BASE', 'GBL TEMP')
) then
    drop table ventas
end if;

if exists(select 1 from sys.sysusertype where type_name='CODIGO') then
   drop domain CODIGO
end if;

if exists(select 1 from sys.sysusertype where type_name='CODIGO2') then
   drop domain CODIGO2
end if;

if exists(select 1 from sys.sysusertype where type_name='DESCRIPCION') then
   drop domain DESCRIPCION
end if;

if exists(select 1 from sys.sysusertype where type_name='DOCUMENTO') then
   drop domain DOCUMENTO
end if;

if exists(select 1 from sys.sysusertype where type_name='EXISTENCIA') then
   drop domain EXISTENCIA
end if;

if exists(select 1 from sys.sysusertype where type_name='FECHA') then
   drop domain FECHA
end if;

if exists(select 1 from sys.sysusertype where type_name='LEGAJO') then
   drop domain LEGAJO
end if;

if exists(select 1 from sys.sysusertype where type_name='NOMBRE') then
   drop domain NOMBRE
end if;

if exists(select 1 from sys.sysusertype where type_name='PRECIO') then
   drop domain PRECIO
end if;

if exists(select 1 from sys.sysusertype where type_name='SEXO') then
   drop domain SEXO
end if;

if exists(select 1 from sys.sysusertype where type_name='TELEFONO') then
   drop domain TELEFONO
end if;

if exists(select 1 from sys.sysusertype where type_name='TIPO_COMPROBANTE') then
   drop domain TIPO_COMPROBANTE
end if;

if exists(select 1 from sys.sysusertype where type_name='TIPO_FUNCIONARIO') then
   drop domain TIPO_FUNCIONARIO
end if;

if exists(select 1 from sys.sysusertype where type_name='VALOR') then
   drop domain VALOR
end if;

/*==============================================================*/
/* Domain: CODIGO                                               */
/*==============================================================*/
create domain CODIGO as numeric(10) default autoincrement 
     check (@column is null or (@column between 1 and 9999999999));

/*==============================================================*/
/* Domain: CODIGO2                                              */
/*==============================================================*/
create domain CODIGO2 as numeric(10) 
     check (@column is null or (@column between 1 and 9999999999));

/*==============================================================*/
/* Domain: DESCRIPCION                                          */
/*==============================================================*/
create domain DESCRIPCION as varchar(500);

/*==============================================================*/
/* Domain: DOCUMENTO                                            */
/*==============================================================*/
create domain DOCUMENTO as varchar(20);

/*==============================================================*/
/* Domain: EXISTENCIA                                           */
/*==============================================================*/
create domain EXISTENCIA as numeric(10) 
     check (@column is null or (@column between 1 and 9999999999));

/*==============================================================*/
/* Domain: FECHA                                                */
/*==============================================================*/
create domain FECHA as date;

/*==============================================================*/
/* Domain: LEGAJO                                               */
/*==============================================================*/
create domain LEGAJO as varchar(8);

/*==============================================================*/
/* Domain: NOMBRE                                               */
/*==============================================================*/
create domain NOMBRE as varchar(30);

/*==============================================================*/
/* Domain: PRECIO                                               */
/*==============================================================*/
create domain PRECIO as numeric(17,2) 
     check (@column is null or (@column >= 1));

/*==============================================================*/
/* Domain: SEXO                                                 */
/*==============================================================*/
create domain SEXO as char(1) 
     check (@column is null or (@column in ('f','m')));

/*==============================================================*/
/* Domain: TELEFONO                                             */
/*==============================================================*/
create domain TELEFONO as varchar(20);

/*==============================================================*/
/* Domain: TIPO_COMPROBANTE                                     */
/*==============================================================*/
create domain TIPO_COMPROBANTE as char(1) 
     check (@column is null or (@column in ('f','a','n','r')));

/*==============================================================*/
/* Domain: TIPO_FUNCIONARIO                                     */
/*==============================================================*/
create domain TIPO_FUNCIONARIO as char(1) 
     check (@column is null or (@column in ('c','i')));

/*==============================================================*/
/* Domain: VALOR                                                */
/*==============================================================*/
create domain VALOR as integer;

/*==============================================================*/
/* Table: ComprasProductos                                      */
/*==============================================================*/
create table ComprasProductos 
(
   compra               CODIGO2                        not null,
   producto             CODIGO2                        not null,
   cantidad             EXISTENCIA,
   precio_compra        PRECIO,
   monto_compras        PRECIO,
   monto_neto           PRECIO,
   monto_impuesto       PRECIO,
   constraint PK_COMPRASPRODUCTOS primary key clustered (compra, producto)
);

/*==============================================================*/
/* Table: VentasProductos                                       */
/*==============================================================*/
create table VentasProductos 
(
   venta                CODIGO2                        not null,
   producto             CODIGO2                        not null,
   cantidad             EXISTENCIA,
   precio_venta         PRECIO,
   monto_venta          PRECIO,
   monto_neto           PRECIO,
   monto_impuesto       PRECIO,
   constraint PK_VENTASPRODUCTOS primary key clustered (venta, producto)
);

/*==============================================================*/
/* Table: ciudades                                              */
/*==============================================================*/
create table ciudades 
(
   ciudad               CODIGO                         not null default autoincrement,
   nombre               NOMBRE                         not null,
   constraint PK_CIUDADES primary key clustered (ciudad)
);

/*==============================================================*/
/* Table: clientes                                              */
/*==============================================================*/
create table clientes 
(
   cliente              CODIGO2                        not null,
   direccion            DESCRIPCION                    not null,
   telefonos            TELEFONO,
   fax                  TELEFONO,
   paginaweb            NOMBRE,
   email                NOMBRE,
   constraint PK_CLIENTES primary key clustered (cliente)
);

/*==============================================================*/
/* Table: compras                                               */
/*==============================================================*/
create table compras 
(
   compra               CODIGO                         not null default autoincrement,
   proveedor            CODIGO2                        not null,
   fecha_compra         FECHA                          not null,
   constraint PK_COMPRAS primary key clustered (compra)
);

/*==============================================================*/
/* Table: funcionarios                                          */
/*==============================================================*/
create table funcionarios 
(
   funcionario          CODIGO2                        not null,
   legajo               LEGAJO,
   fecha_ingreso        FECHA,
   fecha_egreso         FECHA,
   tipo_funcionario     TIPO_FUNCIONARIO,
   constraint PK_FUNCIONARIOS primary key clustered (funcionario)
);

/*==============================================================*/
/* Table: personas                                              */
/*==============================================================*/
create table personas 
(
   persona              CODIGO                         not null default autoincrement,
   ciudad               CODIGO2                        not null,
   primer_nombre        NOMBRE                         not null,
   segundo_nombre       NOMBRE,
   primer_apellido      NOMBRE                         not null,
   segundo_apellido     NOMBRE,
   ruc                  DOCUMENTO,
   razon_social         DOCUMENTO,
   fecha_nacimiento     FECHA,
   sexo                 SEXO                           not null,
   numero_documento     DOCUMENTO                      not null,
   constraint PK_PERSONAS primary key clustered (persona)
);

/*==============================================================*/
/* Table: productos                                             */
/*==============================================================*/
create table productos 
(
   producto             CODIGO                         not null default autoincrement,
   tipo_producto        CODIGO2                        not null,
   descripcion          DESCRIPCION,
   precio_venta         PRECIO,
   monto_impuesto       PRECIO,
   existencia_actual    EXISTENCIA,
   constraint PK_PRODUCTOS primary key clustered (producto)
);

/*==============================================================*/
/* Table: proveedores                                           */
/*==============================================================*/
create table proveedores 
(
   proveedor            CODIGO2                        not null,
   direccion            DESCRIPCION                    not null,
   telefonos            TELEFONO,
   fax                  TELEFONO,
   paginaweb            NOMBRE,
   email                NOMBRE,
   constraint PK_PROVEEDORES primary key clustered (proveedor)
);

/*==============================================================*/
/* Table: tipos_de_impuestos                                    */
/*==============================================================*/
create table tipos_de_impuestos 
(
   tipo_impuesto        CODIGO                         not null default autoincrement,
   descripcion          DESCRIPCION                    not null,
   valor                VALOR,
   constraint PK_TIPOS_DE_IMPUESTOS primary key clustered (tipo_impuesto)
);

/*==============================================================*/
/* Table: tipos_de_productos                                    */
/*==============================================================*/
create table tipos_de_productos 
(
   tipo_producto        CODIGO                         not null default autoincrement,
   tipo_impuesto        CODIGO2                        not null,
   descripcion          DESCRIPCION                    not null,
   constraint PK_TIPOS_DE_PRODUCTOS primary key clustered (tipo_producto)
);

/*==============================================================*/
/* Table: ventas                                                */
/*==============================================================*/
create table ventas 
(
   venta                CODIGO                         not null default autoincrement,
   cliente              CODIGO2                        not null,
   funcionario          CODIGO2                        not null,
   tipo_comprobante     TIPO_COMPROBANTE,
   numero_comprobante   NOMBRE,
   total_venta          PRECIO,
   total_iva10          PRECIO,
   total_iva5           PRECIO,
   total_exentas        PRECIO,
   constraint PK_VENTAS primary key clustered (venta)
);

alter table ComprasProductos
   add constraint detallecompra_compra foreign key (compra)
      references compras (compra)
      on update restrict
      on delete restrict;

alter table VentasProductos
   add constraint item_producto foreign key (producto)
      references productos (producto)
      on update restrict
      on delete restrict;

alter table VentasProductos
   add constraint item_venta foreign key (venta)
      references ventas (venta)
      on update restrict
      on delete restrict;

alter table clientes
   add constraint cliente_persona foreign key (cliente)
      references personas (persona)
      on update restrict
      on delete restrict;

alter table compras
   add constraint compra_proveedor foreign key (proveedor)
      references proveedores (proveedor)
      on update restrict
      on delete restrict;

alter table funcionarios
   add constraint funcionario_persona foreign key (funcionario)
      references personas (persona)
      on update restrict
      on delete restrict;

alter table personas
   add constraint persona_ciudad foreign key (ciudad)
      references ciudades (ciudad)
      on update restrict
      on delete restrict;

alter table productos
   add constraint producto_tipoproducto foreign key (tipo_producto)
      references tipos_de_productos (tipo_producto)
      on update restrict
      on delete restrict;

alter table proveedores
   add constraint proveedor_persona foreign key (proveedor)
      references personas (persona)
      on update restrict
      on delete restrict;

alter table tipos_de_productos
   add constraint tipoProducto_tipoImpuesto foreign key (tipo_impuesto)
      references tipos_de_impuestos (tipo_impuesto)
      on update restrict
      on delete restrict;

alter table ventas
   add constraint venta_cliente foreign key (cliente)
      references clientes (cliente)
      on update restrict
      on delete restrict;

alter table ventas
   add constraint venta_funcionario foreign key (funcionario)
      references funcionarios (funcionario)
      on update restrict
      on delete restrict;

