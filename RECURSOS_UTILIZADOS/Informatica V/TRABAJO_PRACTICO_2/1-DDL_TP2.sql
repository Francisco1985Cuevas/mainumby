--CREAR TABLA DE IMPUESTOS
CREATE TABLE TIPOS_DE_IMPUESTOS
(TIPO_IMPUESTO NUMERIC primary key,
 DESCRIPCION varchar(60),
 VALOR INTEGER )
 
 --MODIFICAR LA TABLA DE TIPOS DE PRODUCTOS
 ALTER TABLE TIPOS_DE_PRODUCTOS ADD TIPO_IMPUESTO NUMERIC
 ALTER TABLE TIPOS_DE_PRODUCTOS ADD CONSTRAINT FK_TIPOS_IMPUESTOS 
 FOREIGN KEY (TIPO_IMPUESTO) REFERENCES TIPOS_DE_IMPUESTOS(TIPO_IMPUESTO)
--MODIFICAR LA TABLA DE PRODUCTOS
ALTER TABLE PRODUCTOS ADD MONTO_IMPUESTO NUMERIC(17,2)
 -- MODIFICAR LA TABLA COMPRA PRODUCTOS
ALTER TABLE COMPRASPRODUCTOS ADD  MONTO_COMPRA numeric(17,2)
ALTER TABLE COMPRASPRODUCTOS ADD MONTO_NETO numeric(17,2)
ALTER TABLE COMPRASPRODUCTOS ADD MONTO_IMPUESTO numeric(17,2)
--MODIFICAR LA TABLA VENTAS
ALTER TABLE VENTAS ADD TOTAL_VENTA numeric(17,2)
ALTER TABLE VENTAS ADD TOTAL_IVA10 numeric(17,2)
ALTER TABLE VENTAS ADD TOTAL_IVA5 numeric(17,2)
ALTER TABLE VENTAS ADD TOTAL_EXENTAS numeric(17,2)
--MODIFICAR LA TABLA VENTAS PRODUCTOS
ALTER TABLE VENTASPRODUCTOS ADD MONTO_VENTA numeric(17,2)
ALTER TABLE VENTASPRODUCTOS ADD MONTO_NETO numeric(17,2)
ALTER TABLE VENTASPRODUCTOS ADD MONTO_IMPUESTO numeric(17,2)
