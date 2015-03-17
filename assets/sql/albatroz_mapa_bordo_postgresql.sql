--
-- PostgreSQL database cluster dump
--

-- Started on 2015-03-08 19:48:49 BRT

SET default_transaction_read_only = off;

SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;

--
-- Roles
--

CREATE ROLE postgres;
ALTER ROLE postgres WITH SUPERUSER INHERIT CREATEROLE CREATEDB LOGIN REPLICATION PASSWORD 'md5a8db61d09e97576db1e2074f71bda879';






--
-- Database creation
--

CREATE DATABASE "SisMBAlbatroz" WITH TEMPLATE = template0 OWNER = postgres;
REVOKE ALL ON DATABASE template1 FROM PUBLIC;
REVOKE ALL ON DATABASE template1 FROM postgres;
GRANT ALL ON DATABASE template1 TO postgres;
GRANT CONNECT ON DATABASE template1 TO PUBLIC;


\connect "SisMBAlbatroz"

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.6
-- Dumped by pg_dump version 9.3.6
-- Started on 2015-03-08 19:48:49 BRT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2892 (class 1262 OID 16384)
-- Dependencies: 2891
-- Name: SisMBAlbatroz; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "SisMBAlbatroz" IS 'Banco de dados primários para armazenamento de informações provenientes de Mapas de Bordo coletados pelo Projeto Albatroz.';


--
-- TOC entry 178 (class 3079 OID 12670)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2895 (class 0 OID 0)
-- Dependencies: 178
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 174 (class 1259 OID 16404)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_aves_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 175 (class 1259 OID 16406)
-- Name: cad_aves; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_aves (
    id_aves integer DEFAULT nextval('cad_aves_seq'::regclass) NOT NULL,
    nome_comum_br character varying(50) NOT NULL,
    nome_cientifico character varying(50) NOT NULL,
    nome_comum_en character varying(50) NOT NULL
);


ALTER TABLE public.cad_aves OWNER TO postgres;

--
-- TOC entry 2896 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 2897 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 2898 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 2899 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 176 (class 1259 OID 16412)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_embarcacao_seq OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16414)
-- Name: cad_embarcacao; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_embarcacao (
    id_embarcacao integer DEFAULT nextval('cad_embarcacao_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    autorizacao_pesca character varying(150) NOT NULL,
    reg_marinha character varying(30) NOT NULL,
    reg_mpa character varying(30) NOT NULL,
    comprim_barco numeric(2,0),
    arqueacao_bruta numeric(2,0),
    ano_fabricacao integer,
    mat_casco character varying(10),
    propulsao character varying(10),
    potencia_motor numeric(2,0),
    tripulacao integer,
    municipio character varying(20),
    uf character varying(3)
);


ALTER TABLE public.cad_embarcacao OWNER TO postgres;

--
-- TOC entry 2900 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 2901 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 2902 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 2903 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 2904 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 2905 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 2906 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 2907 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 2908 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 2909 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 2910 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 2911 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 2912 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.municipio IS 'Campo para inserção do nome do município em que a Embarcação da Pesca esta vinculada.';


--
-- TOC entry 2913 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_embarcacao.uf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.uf IS 'Campo para inserção da Unidade da Federação em que a Embarcação de Pesca está vinculada.';


--
-- TOC entry 172 (class 1259 OID 16396)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_empresa_seq OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 16398)
-- Name: cad_empresa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_empresa (
    id_empresa integer DEFAULT nextval('cad_empresa_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    cidade character varying(30) NOT NULL,
    endereco character varying(225) NOT NULL,
    contato character varying(50),
    cargo character varying(20),
    telefone character varying(11),
    email character varying(100)
);


ALTER TABLE public.cad_empresa OWNER TO postgres;

--
-- TOC entry 2914 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 2915 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 2916 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.cidade; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cidade IS 'Campo para inserção do nome completo da Cidade onde a Empresa de Pesca está sediada.';


--
-- TOC entry 2917 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 2918 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 2919 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 2920 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 2921 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 170 (class 1259 OID 16388)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_mestre_seq OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 16390)
-- Name: cad_mestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_mestre (
    id_mestre integer DEFAULT nextval('cad_mestre_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    apelido character varying(20),
    telefone character varying(11),
    email character varying(100)
);


ALTER TABLE public.cad_mestre OWNER TO postgres;

--
-- TOC entry 2922 (class 0 OID 0)
-- Dependencies: 171
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 2923 (class 0 OID 0)
-- Dependencies: 171
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 2924 (class 0 OID 0)
-- Dependencies: 171
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 2925 (class 0 OID 0)
-- Dependencies: 171
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 2926 (class 0 OID 0)
-- Dependencies: 171
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 2884 (class 0 OID 16406)
-- Dependencies: 175
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) FROM stdin;
\.


--
-- TOC entry 2927 (class 0 OID 0)
-- Dependencies: 174
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_aves_seq', 1, false);


--
-- TOC entry 2886 (class 0 OID 16414)
-- Dependencies: 177
-- Data for Name: cad_embarcacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) FROM stdin;
\.


--
-- TOC entry 2928 (class 0 OID 0)
-- Dependencies: 176
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 1, false);


--
-- TOC entry 2882 (class 0 OID 16398)
-- Dependencies: 173
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cad_empresa (id_empresa, nome, cidade, endereco, contato, cargo, telefone, email) FROM stdin;
\.


--
-- TOC entry 2929 (class 0 OID 0)
-- Dependencies: 172
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_empresa_seq', 1, false);


--
-- TOC entry 2880 (class 0 OID 16390)
-- Dependencies: 171
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY cad_mestre (id_mestre, nome, apelido, telefone, email) FROM stdin;
\.


--
-- TOC entry 2930 (class 0 OID 0)
-- Dependencies: 170
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_mestre_seq', 1, false);


--
-- TOC entry 2769 (class 2606 OID 16411)
-- Name: pk_aves; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 2771 (class 2606 OID 16419)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 2767 (class 2606 OID 16403)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 2765 (class 2606 OID 16395)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 2894 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-03-08 19:48:49 BRT

--
-- PostgreSQL database dump complete
--

\connect postgres

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.6
-- Dumped by pg_dump version 9.3.6
-- Started on 2015-03-08 19:48:49 BRT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2848 (class 1262 OID 12949)
-- Dependencies: 2847
-- Name: postgres; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE postgres IS 'default administrative connection database';


--
-- TOC entry 170 (class 3079 OID 12670)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2851 (class 0 OID 0)
-- Dependencies: 170
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 2850 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-03-08 19:48:49 BRT

--
-- PostgreSQL database dump complete
--

\connect template1

SET default_transaction_read_only = off;

--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.6
-- Dumped by pg_dump version 9.3.6
-- Started on 2015-03-08 19:48:49 BRT

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2848 (class 1262 OID 1)
-- Dependencies: 2847
-- Name: template1; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE template1 IS 'default template for new databases';


--
-- TOC entry 170 (class 3079 OID 12670)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2851 (class 0 OID 0)
-- Dependencies: 170
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 2850 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-03-08 19:48:49 BRT

--
-- PostgreSQL database dump complete
--

-- Completed on 2015-03-08 19:48:49 BRT

--
-- PostgreSQL database cluster dump complete
--

