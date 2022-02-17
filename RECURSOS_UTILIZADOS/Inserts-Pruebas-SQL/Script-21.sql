-- database: localhost - mustardSeed

-- forma 1
CREATE UNIQUE INDEX paises_nombre_unique ON public.paises USING btree (UPPER(nombre));
CREATE UNIQUE INDEX paises_nombre_unique ON public.paises USING btree (nombre)

-- forma 2
CREATE EXTENSION citext;
ALTER TABLE public.paises ALTER COLUMN nombre TYPE citext USING nombre::citext;

select * from paises;
insert into paises (nombre, abreviatura, created_at) values('paraguay', 'py', NOW());
insert into paises (nombre, abreviatura, created_at) values('Paraguay', 'Py', NOW());
insert into paises (nombre, abreviatura, created_at) values('PARAGUAY', 'PY', NOW());
insert into paises (nombre, abreviatura, created_at) values('paraguay', 'py', NOW());
truncate table paises CASCADE;
-- No distingue si se carga en Mayuscula o Minuscula

select * from departamentos;
insert into departamentos (nombre, abreviatura, pais_id, region, created_at) values('CENTRAL', 'CEN', 1,'Oriental', NOW());
insert into departamentos (nombre, abreviatura, pais_id, region, created_at) values('Central', 'Cen', 1,'Oriental', Now());
insert into departamentos (nombre, abreviatura, pais_id, region, created_at) values('central', 'cen', 1,'Oriental', NOW());
insert into departamentos (nombre, abreviatura, pais_id, region, created_at) values('CENTRAL', 'CEN', 1,'Oriental', NOW());
-- No distingue si se carga en Mayuscula o Minuscula


select * from ciudades;
-- No distingue si se carga en Mayuscula o Minuscula









