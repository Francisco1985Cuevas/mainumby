/*==============================================================*/
/* DBMS name:      PostgreSQL 8                                 */
/* Created on:     07/06/2021 17:41:23                          */
/*==============================================================*/


drop table BARRIOS;

drop table CIUDADES;

drop table DEPARTAMENTOS;

drop table PAISES;

drop table contactos;

drop table direcciones;

drop table documentos;

drop table emails;

drop table nacionalidades;

drop table personas;

drop table tipos_contactos;

drop table tipos_direcciones;

drop table tipos_documentos;

drop table tipos_emails;

/*==============================================================*/
/* Table: BARRIOS                                               */
/*==============================================================*/
create table BARRIOS (
   id                   INT4                 not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   ciudad               INT4                 null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_BARRIOS primary key (id)
);

/*==============================================================*/
/* Table: CIUDADES                                              */
/*==============================================================*/
create table CIUDADES (
   id                   SERIAL               not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   departamento         INT4                 null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_CIUDADES primary key (id)
);

/*==============================================================*/
/* Table: DEPARTAMENTOS                                         */
/*==============================================================*/
create table DEPARTAMENTOS (
   ID                   SERIAL               not null,
   NOMBRE               VARCHAR(60)          null,
   ABREVIATURA          VARCHAR(3)           null,
   pais                 INT8                 null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_DEPARTAMENTOS primary key (ID)
);

/*==============================================================*/
/* Table: PAISES                                                */
/*==============================================================*/
create table PAISES (
   ID                   SERIAL               not null,
   NOMBRE               VARCHAR(60)          null,
   ABREVIATURA          VARCHAR(3)           null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_PAISES primary key (ID)
);

/*==============================================================*/
/* Table: contactos                                             */
/*==============================================================*/
create table contactos (
   id                   INT4                 not null,
   persona              INT8                 not null,
   tipo_contacto        INT8                 null,
   numero_contacto      VARCHAR(20)          null,
   comentario           VARCHAR(500)         null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_CONTACTOS primary key (id, persona)
);

/*==============================================================*/
/* Table: direcciones                                           */
/*==============================================================*/
create table direcciones (
   id                   INT4                 not null,
   persona              INT8                 not null,
   tipo_direccion       INT8                 null,
   barrio               INT8                 null,
   calle                VARCHAR(500)         null,
   numero_casa          VARCHAR(10)          null,
   piso                 VARCHAR(10)          null,
   departamento         VARCHAR(20)          null,
   comentario           VARCHAR(500)         null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_DIRECCIONES primary key (id, persona)
);

/*==============================================================*/
/* Table: documentos                                            */
/*==============================================================*/
create table documentos (
   id                   INT4                 not null,
   persona              INT8                 null,
   tipo_documento       INT8                 null,
   numero               VARCHAR(15)          null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_DOCUMENTOS primary key (id)
);

/*==============================================================*/
/* Table: emails                                                */
/*==============================================================*/
create table emails (
   id                   INT4                 not null,
   persona              INT8                 not null,
   tipo_email           INT8                 null,
   descripcion          VARCHAR(500)         null,
   comentario           VARCHAR(500)         null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_EMAILS primary key (id, persona)
);

/*==============================================================*/
/* Table: nacionalidades                                        */
/*==============================================================*/
create table nacionalidades (
   id                   SERIAL               not null,
   persona              INT8                 null,
   pais                 INT8                 null,
   constraint PK_NACIONALIDADES primary key (id)
);

/*==============================================================*/
/* Table: personas                                              */
/*==============================================================*/
create table personas (
   id                   INT4                 not null,
   nombres              VARCHAR(100)         null,
   apellidos            VARCHAR(100)         null,
   fecha_nacimiento     DATE                 null,
   tipo_persona         VARCHAR(20)          null,
   comentario           VARCHAR(500)         null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_PERSONAS primary key (id)
);

/*==============================================================*/
/* Table: tipos_contactos                                       */
/*==============================================================*/
create table tipos_contactos (
   id                   SERIAL               not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_TIPOS_CONTACTOS primary key (id)
);

/*==============================================================*/
/* Table: tipos_direcciones                                     */
/*==============================================================*/
create table tipos_direcciones (
   id                   SERIAL               not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_TIPOS_DIRECCIONES primary key (id)
);

/*==============================================================*/
/* Table: tipos_documentos                                      */
/*==============================================================*/
create table tipos_documentos (
   id                   SERIAL               not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   created_at           date                 null,
   updated_at           date                 null,
   constraint PK_TIPOS_DOCUMENTOS primary key (id)
);

/*==============================================================*/
/* Table: tipos_emails                                          */
/*==============================================================*/
create table tipos_emails (
   id                   SERIAL               not null,
   nombre               VARCHAR(60)          null,
   abreviatura          VARCHAR(3)           null,
   created_at           DATE                 null,
   updated_at           DATE                 null,
   constraint PK_TIPOS_EMAILS primary key (id)
);

alter table BARRIOS
   add constraint FK_BARRIOS_REF_BARRI_CIUDADES foreign key (ciudad)
      references CIUDADES (id)
      on delete restrict on update cascade;

alter table CIUDADES
   add constraint FK_CIUDADES_REF_CIUDA_DEPARTAM foreign key (departamento)
      references DEPARTAMENTOS (ID)
      on delete restrict on update cascade;

alter table DEPARTAMENTOS
   add constraint FK_DEPARTAM_REF_DEPAR_PAISES foreign key (pais)
      references PAISES (ID)
      on delete restrict on update cascade;

alter table contactos
   add constraint FK_CONTACTO_REF_CONTA_TIPOS_CO foreign key (tipo_contacto)
      references tipos_contactos (id)
      on delete restrict on update cascade;

alter table contactos
   add constraint FK_CONTACTO_REF_TELEF_PERSONAS foreign key (persona)
      references personas (id)
      on delete restrict on update cascade;

alter table direcciones
   add constraint FK_DIRECCIO_REF_DIREC_BARRIOS foreign key (barrio)
      references BARRIOS (id)
      on delete restrict on update cascade;

alter table direcciones
   add constraint FK_DIRECCIO_REF_DIREC_TIPOS_DI foreign key (tipo_direccion)
      references tipos_direcciones (id)
      on delete restrict on update cascade;

alter table direcciones
   add constraint FK_DIRECCIO_REF_DIREC_PERSONAS foreign key (persona)
      references personas (id)
      on delete restrict on update cascade;

alter table documentos
   add constraint FK_DOCUMENT_REF_DOCUM_PERSONAS foreign key (persona)
      references personas (id)
      on delete restrict on update cascade;

alter table documentos
   add constraint FK_DOCUMENT_REF_DOCUM_TIPOS_DO foreign key (tipo_documento)
      references tipos_documentos (id)
      on delete restrict on update cascade;

alter table emails
   add constraint FK_EMAILS_REF_EMAIL_PERSONAS foreign key (persona)
      references personas (id)
      on delete restrict on update cascade;

alter table emails
   add constraint FK_EMAILS_REF_EMAIL_TIPOS_EM foreign key (tipo_email)
      references tipos_emails (id)
      on delete restrict on update cascade;

alter table nacionalidades
   add constraint FK_NACIONAL_REF_NACIO_PAISES foreign key (pais)
      references PAISES (ID)
      on delete restrict on update cascade;

alter table nacionalidades
   add constraint FK_NACIONAL_REF_NACIO_PERSONAS foreign key (persona)
      references personas (id)
      on delete restrict on update cascade;

