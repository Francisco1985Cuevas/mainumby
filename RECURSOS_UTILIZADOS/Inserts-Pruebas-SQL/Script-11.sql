-- database: localhost - mustardSeed


insert into paises (nombre, abreviatura, created_at) values('Paraguay', 'PY', NOW());
insert into paises (nombre, abreviatura, created_at) values('Argentina', 'PY', NOW());
insert into paises (nombre, abreviatura, created_at) values('Brasil', 'BR', NOW());
insert into paises (nombre, abreviatura, created_at) values('Uruguay', 'URU', NOW());
insert into paises (nombre, abreviatura, created_at) values('Bolivia', 'BOL', NOW());
insert into paises (nombre, abreviatura, created_at) values('Ecuador', 'EC', NOW());
insert into paises (nombre, abreviatura, created_at) values('Colombia', 'COL', NOW());
insert into paises (nombre, abreviatura, created_at) values('Peru', 'PU', NOW());
insert into paises (nombre, abreviatura, created_at) values('Venezuela', 'VEN', NOW());
insert into paises (nombre, abreviatura, created_at) values('Estados Unidos', 'USA', NOW());
insert into paises (nombre, abreviatura, created_at) values('Canada', 'CAN', NOW());
insert into paises (nombre, abreviatura, created_at) values('Mexico', 'ME', NOW());
insert into paises (nombre, abreviatura, created_at) values('España', 'ESP', NOW());
insert into paises (nombre, abreviatura, created_at) values('Portugal', 'POR', NOW());



insert into departamentos (nombre, abreviatura, pais_id) values('central', 'cen', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('san pedro', 'sp', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('concepcion', 'con', 1);


insert into ciudades (nombre, abreviatura, departamento_id) values('Asuncion', 'ASU', 1);
insert into ciudades (nombre, abreviatura, departamento_id) values('Lambare', 'LAM', 1);
insert into ciudades (nombre, abreviatura, departamento_id) values('Fernando de la Mora', 'FDO', 1);


insert into barrios (nombre, abreviatura, ciudad_id) values('Republicano', 'REP', 1);
insert into barrios (nombre, abreviatura, ciudad_id) values('Roberto L. Petit', 'RLP', 1);
insert into barrios (nombre, abreviatura, ciudad_id) values('Santa Ana', 'SAN', 1);
insert into barrios (nombre, abreviatura, ciudad_id) values('San Pablo', 'SAP', 1);
insert into barrios (nombre, abreviatura, ciudad_id) values('Mbachio', 'MBA', 2);



insert into tipos_contactos (nombre, abreviatura) values('Casa', 'CAS');
insert into tipos_contactos (nombre, abreviatura) values('Trabajo', 'TRA');
insert into tipos_contactos (nombre, abreviatura) values('Gimnasio', 'Gym');



insert into tipos_documentos (nombre, abreviatura) values('CEDULA', 'CED');
insert into tipos_documentos (nombre, abreviatura) values('PASSAPORTE', 'PAS');
insert into tipos_documentos (nombre, abreviatura) values('LICENCIA DE CONDUCIR', 'LDC');
insert into tipos_documentos (nombre, abreviatura) values('ACTA DE NACIMIENTO', 'ANC');
insert into tipos_documentos (nombre, abreviatura) values('CARNET', 'CRT');
insert into tipos_documentos (nombre, abreviatura) values('RUC', 'RUC');


insert into tipos_direcciones (nombre, abreviatura) values('Casa', 'CAS');
insert into tipos_direcciones (nombre, abreviatura) values('Trabajo', 'TRA');
insert into tipos_direcciones (nombre, abreviatura) values('Gimnasio', 'Gym');

insert into tipos_emails (nombre, abreviatura) values('Casa', 'CAS');
insert into tipos_emails (nombre, abreviatura) values('Trabajo', 'TRA');
insert into tipos_emails (nombre, abreviatura) values('Gimnasio', 'Gym');
---------------------------------------------------------------------------

select * from paises;
-- update paises set created_at = NOW(), updated_at = NOW();
select * from departamentos d;
select * from ciudades;
select * from barrios;
select * from tipos_contactos;
select * from tipos_documentos;
select * from tipos_direcciones;
select * from tipos_emails;


select * from personas;

select * from documentos;

select * from direcciones;


select * from emails;


select * from contactos;





/*
delete from documentos where id = 16;
delete from direcciones;
delete from contactos where id = 4;
delete from personas where id = 6;
*/



