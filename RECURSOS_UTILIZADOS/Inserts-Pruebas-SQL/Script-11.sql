-- database: localhost - mustardSeed


insert into paises (nombre, abreviatura, created_at) values('PARAGUAY', 'PY', NOW());
insert into paises (nombre, abreviatura, created_at) values('ARGENTINA', 'ARG', NOW());
insert into paises (nombre, abreviatura, created_at) values('BRASIL', 'BR', NOW());
insert into paises (nombre, abreviatura, created_at) values('URUGUAY', 'URU', NOW());
insert into paises (nombre, abreviatura, created_at) values('BOLIVIA', 'BOL', NOW());
insert into paises (nombre, abreviatura, created_at) values('ECUADOR', 'EC', NOW());
insert into paises (nombre, abreviatura, created_at) values('COLOMBIA', 'COL', NOW());
insert into paises (nombre, abreviatura, created_at) values('PERU', 'PU', NOW());
insert into paises (nombre, abreviatura, created_at) values('VENEZUELA', 'VEN', NOW());
insert into paises (nombre, abreviatura, created_at) values('ESTADOS UNIDOS', 'USA', NOW());
insert into paises (nombre, abreviatura, created_at) values('CANADA', 'CAN', NOW());
insert into paises (nombre, abreviatura, created_at) values('MEXICO', 'ME', NOW());
insert into paises (nombre, abreviatura, created_at) values('ESPAÑA', 'ESP', NOW());
insert into paises (nombre, abreviatura, created_at) values('PORTUGAL', 'POR', NOW());
insert into paises (nombre, abreviatura, created_at) values('FRANCIA', 'FRA', NOW());
insert into paises (nombre, abreviatura, created_at) values('SUECIA', 'SUE', NOW());
insert into paises (nombre, abreviatura, created_at) values('SUIZA', 'SUI', NOW());
insert into paises (nombre, abreviatura, created_at) values('ARABIA SAUDITA', 'AS', NOW());
insert into paises (nombre, abreviatura, created_at) values('JAPON', 'JAP', NOW());
insert into paises (nombre, abreviatura, created_at) values('CHINA', 'CH', NOW());
insert into paises (nombre, abreviatura, created_at) values('COREA DEL SUR', 'CS', NOW());
insert into paises (nombre, abreviatura, created_at) values('NIGERIA', 'NIG', NOW());


insert into departamentos (nombre, abreviatura, pais_id) values('CENTRAL', 'CEN', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('MISIONES', 'MS', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('ÑEEMBUCU', 'NEM', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('ALTO PARANA', 'AP', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('AMAMBAY', 'AM', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('CORDILLERA', 'COR', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('CAAGUAZU', 'CAA', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('BOQUERON', 'BOQ', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('ITAPUA', 'ITA', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('PRESIDENTE HAYES', 'PH', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('PARAGUARI', 'PAR', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('GUAIRA', 'GUA', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('CANINDEYU', 'CAN', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('CONCEPCION', 'CON', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('SAN PEDRO', 'SP', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('CAAZAPA', 'CAA', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('ALTO PARAGUAY', 'AP', 1);
insert into departamentos (nombre, abreviatura, pais_id) values('BUENOS AIRES', 'BS', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('CATAMARCA', 'CAT', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('CHACO', 'CH', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('CHUBUT', 'CH', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('CORDOBA', 'COR', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('CORRIENTES', 'COR', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('ENTRE RIOS', 'ER', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('FORMOSA', 'FOR', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('JUJUY', 'JU', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('LA PAMPA', 'LP', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('LA RIOJA', 'LR', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('MENDOZA', 'MEN', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('MISIONES', 'MIS', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('NEUQUEN', 'NEU', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('RIO NEGRO', 'RN', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SALTA', 'SAL', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SAN JUAN', 'SJ', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SAN LUIS', 'SL', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SANTA CRUZ', 'SC', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SANTA FE', 'SF', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('SANTIAGO DEL ESTERO', 'SDE', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('TIERRA DEL FUEGO', 'TF', 2);
insert into departamentos (nombre, abreviatura, pais_id) values('TUCUMAN', 'TUC', 2);


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



