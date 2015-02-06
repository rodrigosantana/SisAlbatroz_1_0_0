CREATE SEQUENCE mb_id_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE mb_geral
(
  id_mb integer NOT NULL DEFAULT nextval('mb_id_seq'::regclass),
  barco character varying(50) NOT NULL,
  CONSTRAINT pk_mb_geral PRIMARY KEY (id_mb)
)
WITH (
  OIDS=FALSE
);

