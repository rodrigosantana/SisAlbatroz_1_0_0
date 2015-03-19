CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE mb_geral (
	id_mb integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
	barco character varying(50) NOT NULL,
	mestre character varying(50) NOT NULL,
	petrecho character varying(50) NOT NULL,
	data_saida date NOT NULL,
	data_chegda date NOT NULL,
	observacoes character varying(500) NOT NULL,
);

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);

-------------------------------------------------------------------------

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE mb_isca (
	id_isca integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
	id_lance integer NOT NULL,
	isca character varying(50) NOT NULL
);

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_isca PRIMARY KEY (id_isca);

-------------------------------------------------------------------------

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE mb_mitiga (
    id_mm integer DEFAULT nextval('mb_medmit_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    medida_mitigatoria character varying(50) NOT NULL
);

ALTER TABLE ONLY mb_mitiga
    ADD CONSTRAINT pk_mm PRIMARY KEY (id_mm);

-------------------------------------------------------------------------

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE mb_captura (
	id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
	id_lance integer NOT NULL,
	id_aves integer NOT NULL,
    quantidade integer NOT NULL
);

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);

-------------------------------------------------------------------------


CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;


CREATE TABLE mb_lance (
    id_lance integer DEFAULT nextval('mb_lance_seq'::regclass) NOT NULL,
    id_mb integer NOT NULL,
    lance integer NOT NULL,
    data date NOT NULL,
    anzois integer NOT NULL,
    latitude varchar(50) NOT NULL,
    longitude varchar(50) NOT NULL,
    hora_inicial timestamp NOT NULL,
    hora_final timestamp NOT NULL,
    mm_uso varchar(1) NOT NULL,
    ave_capt varchar(1) NOT NULL
);

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);
