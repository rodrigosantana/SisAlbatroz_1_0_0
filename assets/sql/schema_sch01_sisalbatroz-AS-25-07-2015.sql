--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.0
-- Dumped by pg_dump version 9.4.0
-- Started on 2015-07-25 22:42:14

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 3857 (class 1262 OID 59406)
-- Name: sisalbatroz; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE sisalbatroz WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'Portuguese_Brazil.1252' LC_CTYPE = 'Portuguese_Brazil.1252';


ALTER DATABASE sisalbatroz OWNER TO postgres;

\connect sisalbatroz

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 60703)
-- Name: sch01; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sch01;


ALTER SCHEMA sch01 OWNER TO postgres;

--
-- TOC entry 279 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3860 (class 0 OID 0)
-- Dependencies: 279
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 280 (class 3079 OID 59407)
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- TOC entry 3861 (class 0 OID 0)
-- Dependencies: 280
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry, geography, and raster spatial types and functions';


SET search_path = sch01, pg_catalog;

--
-- TOC entry 186 (class 1259 OID 60704)
-- Name: auto_pesca_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE auto_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE auto_pesca_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 187 (class 1259 OID 60706)
-- Name: autoriz_pesca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


ALTER TABLE autoriz_pesca OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 60710)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_aves_seq OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 60712)
-- Name: cad_aves; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_aves (
    id_aves integer DEFAULT nextval('cad_aves_seq'::regclass) NOT NULL,
    nome_comum_br character varying(50) NOT NULL,
    nome_cientifico character varying(50) NOT NULL,
    nome_comum_en character varying(50) NOT NULL
);


ALTER TABLE cad_aves OWNER TO postgres;

--
-- TOC entry 3862 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 3863 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 3864 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 3865 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 190 (class 1259 OID 60716)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_embarcacao_seq OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 60718)
-- Name: cad_embarcacao; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_embarcacao (
    id_embarcacao integer DEFAULT nextval('cad_embarcacao_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL,
    autorizacao_pesca character varying(150) NOT NULL,
    reg_marinha character varying(30) NOT NULL,
    reg_mpa character varying(30) NOT NULL,
    comprim_barco numeric(10,2),
    arqueacao_bruta numeric(10,2),
    ano_fabricacao integer,
    mat_casco character varying(50),
    propulsao character varying(50),
    potencia_motor numeric(10,2),
    tripulacao integer,
    municipio integer,
    muni_t character varying(150),
    uf_t character varying(5)
);


ALTER TABLE cad_embarcacao OWNER TO postgres;

--
-- TOC entry 3866 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 3867 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 3868 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 3869 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 3870 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 3871 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 3872 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 3873 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 3874 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 3875 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 3876 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 3877 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 192 (class 1259 OID 60725)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_empresa_seq OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 60727)
-- Name: cad_empresa; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_empresa (
    id_empresa integer DEFAULT nextval('cad_empresa_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    endereco character varying(225) NOT NULL,
    contato character varying(50),
    cargo character varying(20),
    telefone character varying(11),
    email character varying(100),
    municipio integer NOT NULL
);


ALTER TABLE cad_empresa OWNER TO postgres;

--
-- TOC entry 3878 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 3879 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 3880 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 3881 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 3882 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 3883 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 3884 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 3885 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.municipio; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.municipio IS 'Campo para inserção do nome completo da Cidade e UF onde a Empresa de Pesca está sediada. Utiliza o basilar de Município da Base de Dados do IBGE.';


--
-- TOC entry 194 (class 1259 OID 60731)
-- Name: cad_entrevistador_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_entrevistador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_entrevistador_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 60733)
-- Name: cad_entrevistador; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_entrevistador OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 60737)
-- Name: cad_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_especie_seq OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 60739)
-- Name: cad_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_especie (
    id integer DEFAULT nextval('cad_especie_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE cad_especie OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 60743)
-- Name: cad_financiador_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_financiador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_financiador_seq OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 60745)
-- Name: cad_financiador; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_financiador (
    id integer DEFAULT nextval('cad_financiador_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE cad_financiador OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 60749)
-- Name: cad_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_isca_seq OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 60751)
-- Name: cad_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_isca OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 60755)
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_medida_metigatoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_medida_metigatoria_seq OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 60757)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_medida_metigatoria OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 60761)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_mestre_seq OWNER TO postgres;

--
-- TOC entry 205 (class 1259 OID 60763)
-- Name: cad_mestre; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_mestre (
    id_mestre integer DEFAULT nextval('cad_mestre_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    apelido character varying(20),
    telefone character varying(11),
    email character varying(100)
);


ALTER TABLE cad_mestre OWNER TO postgres;

--
-- TOC entry 3886 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 3887 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 3888 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 3889 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 3890 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 206 (class 1259 OID 60767)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_observ_seq OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 60769)
-- Name: cad_observador; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_observador (
    id_observ integer DEFAULT nextval('cad_observ_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    cpf character varying(10) NOT NULL,
    rg character varying(10) NOT NULL,
    email character varying(100) NOT NULL,
    telefone character varying(11) NOT NULL,
    skype character varying(50),
    endereco character varying(200) NOT NULL,
    municipio integer NOT NULL
);


ALTER TABLE cad_observador OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 60773)
-- Name: captura_incidental_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE captura_incidental_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE captura_incidental_seq OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 60775)
-- Name: captura_incidental; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE captura_incidental (
    id integer DEFAULT nextval('captura_incidental_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    data date,
    coordenada public.geometry,
    boia_radio integer
);


ALTER TABLE captura_incidental OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 60782)
-- Name: captura_incidental_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE captura_incidental_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE captura_incidental_especie_seq OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 60784)
-- Name: captura_incidental_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE captura_incidental_especie (
    id integer DEFAULT nextval('captura_incidental_especie_seq'::regclass) NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    etiqueta integer,
    captura_incidental integer
);


ALTER TABLE captura_incidental_especie OWNER TO postgres;

--
-- TOC entry 212 (class 1259 OID 60788)
-- Name: contagem_ave_boia_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE contagem_ave_boia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contagem_ave_boia_seq OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 60790)
-- Name: contagem_ave_boia; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE contagem_ave_boia (
    id integer DEFAULT nextval('contagem_ave_boia_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    boia_radio character varying(255),
    data_hora timestamp without time zone,
    temperatura_agua numeric(10,2),
    profundidade integer,
    pressao_atmosferica numeric(10,2),
    coordenada public.geometry
);


ALTER TABLE contagem_ave_boia OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 60797)
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE contagem_ave_boia_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contagem_ave_boia_especie_seq OWNER TO postgres;

--
-- TOC entry 215 (class 1259 OID 60799)
-- Name: contagem_ave_boia_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE contagem_ave_boia_especie (
    id integer DEFAULT nextval('contagem_ave_boia_especie_seq'::regclass) NOT NULL,
    contagem_ave_boia integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


ALTER TABLE contagem_ave_boia_especie OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 60803)
-- Name: contagem_por_sol_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE contagem_por_sol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contagem_por_sol_seq OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 60805)
-- Name: contagem_por_sol; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE contagem_por_sol (
    id integer DEFAULT nextval('contagem_por_sol_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    data date NOT NULL,
    coordenada public.geometry,
    lance integer,
    toriline boolean,
    isca_tingida boolean,
    observacao text,
    indice integer,
    hora time without time zone,
    total integer,
    hora_por_sol time without time zone
);


ALTER TABLE contagem_por_sol OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 60812)
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE contagem_por_sol_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contagem_por_sol_especie_seq OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 60814)
-- Name: contagem_por_sol_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE contagem_por_sol_especie (
    id integer DEFAULT nextval('contagem_por_sol_especie_seq'::regclass) NOT NULL,
    contagem_psi integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    tipo_individuo character varying(30)
);


ALTER TABLE contagem_por_sol_especie OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 60818)
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE contagem_por_sol_indice_seq
    START WITH 27
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE contagem_por_sol_indice_seq OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 60820)
-- Name: contagem_por_sol_indice; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE contagem_por_sol_indice (
    id integer DEFAULT nextval('contagem_por_sol_indice_seq'::regclass) NOT NULL,
    contagem_por_sol integer NOT NULL,
    indice integer,
    hora time without time zone,
    total integer
);


ALTER TABLE contagem_por_sol_indice OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 60824)
-- Name: cruzeiro_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cruzeiro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruzeiro_seq OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 60826)
-- Name: cruzeiro; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cruzeiro (
    id integer DEFAULT nextval('cruzeiro_seq'::regclass) NOT NULL,
    observador integer NOT NULL,
    embarcacao integer NOT NULL,
    mestre integer,
    empresa integer,
    financiador integer,
    data_saida date,
    data_chegada date,
    observacao text,
    usuario_insercao integer,
    data_insercao timestamp without time zone,
    usuario_alteracao integer,
    data_alteracao timestamp without time zone
);


ALTER TABLE cruzeiro OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 60833)
-- Name: cruzeiro_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE cruzeiro_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cruzeiro_lance_seq OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 60835)
-- Name: dados_abioticos_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE dados_abioticos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dados_abioticos_seq OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 60837)
-- Name: dados_abioticos; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE dados_abioticos (
    id integer DEFAULT nextval('dados_abioticos_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer NOT NULL,
    anzois integer,
    reg_peso boolean,
    toriline boolean,
    isca_tingida boolean,
    dado_lancamento integer,
    dado_recolhimento integer
);


ALTER TABLE dados_abioticos OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 60841)
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE dados_abioticos_complementar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE dados_abioticos_complementar_seq OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 60843)
-- Name: dados_abioticos_complementar; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE dados_abioticos_complementar (
    id integer DEFAULT nextval('dados_abioticos_complementar_seq'::regclass) NOT NULL,
    tipo smallint,
    coordenada_inicio public.geometry,
    coordenada_fim public.geometry,
    data_inicio timestamp without time zone,
    data_fim timestamp without time zone,
    profundidade_inicio integer,
    profundidade_fim integer,
    velocidade_vento_inicio integer,
    velocidade_vento_fim integer,
    categoria_mar_inicio smallint,
    categoria_mar_fim smallint,
    temperatura_ar_inicio integer,
    temperatura_ar_fim integer,
    temperatura_sup_mar_inicio integer,
    temperatura_sup_mar_fim integer,
    cobertura_ceu_inicio smallint,
    cobertura_ceu_fim smallint,
    pressao_atmosferica_inicio integer,
    pressao_atmosferica_fim integer,
    rumo_inicio character varying(4),
    rumo_fim character varying(4),
    direcao_vento_inicio character varying(4),
    direcao_vento_fim character varying(4)
);


ALTER TABLE dados_abioticos_complementar OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 60850)
-- Name: dados_abioticos_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE dados_abioticos_isca (
    id_isca integer NOT NULL,
    id_dados_abioticos integer NOT NULL
);


ALTER TABLE dados_abioticos_isca OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 60859)
-- Name: entrevista_cais_area_pesca_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE entrevista_cais_area_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE entrevista_cais_area_pesca_seq OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 60861)
-- Name: ec_area_pesca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_area_pesca (
    id integer DEFAULT nextval('entrevista_cais_area_pesca_seq'::regclass) NOT NULL,
    entrevista_cais integer NOT NULL,
    nome character varying(150) NOT NULL,
    profundidade_inicial integer,
    profundidade_final integer
);


ALTER TABLE ec_area_pesca OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 60865)
-- Name: entrevista_cais_captura_ave_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE entrevista_cais_captura_ave_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE entrevista_cais_captura_ave_seq OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 60867)
-- Name: ec_captura_ave; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_captura_ave (
    id integer DEFAULT nextval('entrevista_cais_captura_ave_seq'::regclass) NOT NULL,
    entrevista_cais integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


ALTER TABLE ec_captura_ave OWNER TO postgres;

--
-- TOC entry 256 (class 1259 OID 60947)
-- Name: petrecho_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE petrecho_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE petrecho_seq OWNER TO postgres;

--
-- TOC entry 257 (class 1259 OID 60949)
-- Name: ec_petrecho; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho (
    id integer DEFAULT nextval('petrecho_seq'::regclass) NOT NULL,
    tipo character varying(50) NOT NULL
);


ALTER TABLE ec_petrecho OWNER TO postgres;

--
-- TOC entry 277 (class 1259 OID 61492)
-- Name: ec_petrecho_arrasto; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_arrasto (
    id integer NOT NULL,
    tipo_arrasto character varying(20),
    numero_arrastos_dia integer,
    tempo_medio_arrasto time without time zone
);


ALTER TABLE ec_petrecho_arrasto OWNER TO postgres;

--
-- TOC entry 260 (class 1259 OID 60962)
-- Name: ec_petrecho_cerco; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_cerco (
    id integer NOT NULL,
    comprimento_rede integer,
    altura_rede integer,
    numero_cercos_totais integer,
    tempo_estimado_cercamento time without time zone,
    tempo_estimado_recolhimento time without time zone
);


ALTER TABLE ec_petrecho_cerco OWNER TO postgres;

--
-- TOC entry 261 (class 1259 OID 60965)
-- Name: ec_petrecho_emalhe; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_emalhe (
    id integer NOT NULL,
    tipo_rede character varying(20),
    comprimento_pano integer,
    altura_pano integer,
    numero_panos_por_lance integer,
    regime_trabalho character varying(20),
    tempo_estimado_lancamento time without time zone,
    tempo_estimado_recolhimento time without time zone
);


ALTER TABLE ec_petrecho_emalhe OWNER TO postgres;

--
-- TOC entry 258 (class 1259 OID 60953)
-- Name: ec_petrecho_espinhel; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_espinhel (
    id integer NOT NULL,
    numero_espinheis integer,
    numero_anzois integer,
    numero_lances integer,
    light_stick boolean,
    toriline boolean,
    hora_lancamento_inicio time without time zone,
    hora_lancamento_fim time without time zone,
    hora_recolhimento_inicio time without time zone,
    hora_recolhimento_fim time without time zone
);


ALTER TABLE ec_petrecho_espinhel OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 60956)
-- Name: ec_petrecho_linha_mao; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_linha_mao (
    id integer NOT NULL,
    numero_linhas integer,
    numero_anzois_por_linha integer,
    numero_lances_por_dia integer,
    hora_inicial time without time zone,
    hora_final time without time zone,
    tipo_petrecho_utilizado text,
    outros text
);


ALTER TABLE ec_petrecho_linha_mao OWNER TO postgres;

--
-- TOC entry 278 (class 1259 OID 61502)
-- Name: ec_petrecho_vara_isca_viva; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE ec_petrecho_vara_isca_viva (
    id integer NOT NULL,
    dias_isca integer,
    dias_capeando integer,
    total_lances integer,
    numero_pescadores integer,
    boia boolean
);


ALTER TABLE ec_petrecho_vara_isca_viva OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 60853)
-- Name: entrevista_cais_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE entrevista_cais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE entrevista_cais_seq OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 60855)
-- Name: entrevista_cais; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE entrevista_cais (
    id integer DEFAULT nextval('entrevista_cais_seq'::regclass) NOT NULL,
    responsavel_campo integer NOT NULL,
    data date,
    empresa integer,
    municipio integer,
    embarcacao integer NOT NULL,
    porto_saida integer,
    data_saida date,
    hora_saida time without time zone,
    data_chegada date,
    hora_chegada time without time zone,
    dias_mar integer,
    dias_pesca integer,
    petrecho integer,
    ave_observado boolean,
    ave_atrapalhou boolean,
    usuario_insercao integer,
    data_insercao timestamp without time zone,
    usuario_alteracao integer,
    data_alteracao timestamp without time zone
);


ALTER TABLE entrevista_cais OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 60871)
-- Name: especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE especie_seq OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 60873)
-- Name: especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE especie (
    id integer DEFAULT nextval('especie_seq'::regclass) NOT NULL,
    nome_cientifico character varying(100) NOT NULL,
    nome_comum_br character varying(100) NOT NULL,
    nome_comum_en character varying(100),
    tipo character varying(20) NOT NULL
);


ALTER TABLE especie OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 60877)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_captura_seq OWNER TO postgres;

--
-- TOC entry 239 (class 1259 OID 60879)
-- Name: mb_captura; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    id_ave integer NOT NULL,
    quantidade integer
);


ALTER TABLE mb_captura OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 60883)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_geral_seq OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 60885)
-- Name: mb_geral; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_geral (
    id_mb integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
    embarcacao integer NOT NULL,
    mestre integer NOT NULL,
    data_saida date,
    data_chegada date,
    observacao character varying(500),
    entrevistador integer,
    petrecho smallint NOT NULL,
    usuario_insercao integer,
    data_insercao timestamp without time zone,
    usuario_alteracao integer,
    data_alteracao timestamp without time zone
);


ALTER TABLE mb_geral OWNER TO postgres;

--
-- TOC entry 3891 (class 0 OID 0)
-- Dependencies: 241
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 242 (class 1259 OID 60892)
-- Name: mb_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE mb_isca OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 60895)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_isca_seq OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 60897)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_lance_seq OWNER TO postgres;

--
-- TOC entry 245 (class 1259 OID 60899)
-- Name: mb_lance; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_lance (
    id_lance integer DEFAULT nextval('mb_lance_seq'::regclass) NOT NULL,
    lance integer NOT NULL,
    data date,
    anzois integer,
    mm_uso character varying(10),
    mb_geral integer NOT NULL,
    ave_capt boolean,
    hora_inicial time without time zone,
    hora_final time without time zone,
    coordenada public.geometry,
    ponteira_peso numeric(5,0),
    ponteira_distancia numeric(5,2)
);


ALTER TABLE mb_lance OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 60906)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_medmit_seq OWNER TO postgres;

--
-- TOC entry 247 (class 1259 OID 60908)
-- Name: mb_mitigatoria; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE mb_mitigatoria OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 60911)
-- Name: mc_biometria; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mc_biometria (
    id integer NOT NULL,
    peso integer,
    comprimento integer,
    culmem integer,
    narina_culmem integer,
    altura_bico_base integer,
    altura_minima_bico integer,
    altura_bico_unguis integer,
    largura_bico_base integer,
    comprimento_cabeca integer,
    comprimento_asa integer,
    comprimento_cauda integer,
    comprimento_tarso integer,
    comprimento_dedo_sem_unha integer,
    comprimento_dedo_com_unha integer,
    envergadura integer,
    muda_asa boolean,
    muda_cauda boolean,
    muda_cabeca boolean,
    muda_dorso boolean,
    muda_ventre boolean
);


ALTER TABLE mc_biometria OWNER TO postgres;

--
-- TOC entry 249 (class 1259 OID 60914)
-- Name: mc_captura_incidental; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mc_captura_incidental (
    mc_id integer NOT NULL,
    informacao character varying(20),
    cruzeiro integer,
    lance integer,
    observador integer,
    mestre integer,
    embarcacao integer,
    historico text,
    descricao_local_coleta text
);


ALTER TABLE mc_captura_incidental OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 60920)
-- Name: mc_coleta_material_biologico; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mc_coleta_material_biologico (
    id integer NOT NULL,
    data_necropsia date,
    local_necropsia text,
    condicao_carcaca character varying(50),
    autolise character varying(50),
    sexagem character varying(50),
    empetrolamento character varying(50),
    condicao_corporal character varying(50),
    piolho character varying(50),
    carrapato character varying(50),
    pulga character varying(50),
    lepadomorpha character varying(50),
    larvas_putrefacao character varying(50),
    outros character varying(50),
    outros_descricao character varying(255),
    nematoides character varying(50),
    acantocefalos character varying(50),
    cestoides character varying(50),
    trematoides character varying(50),
    amt_encefalo text,
    amt_medula_ossea text,
    amt_musculo text,
    amt_figado text,
    amt_pulmao text,
    amt_baco text,
    amt_gordura text,
    htp_pele boolean,
    htp_lingua boolean,
    htp_esofago boolean,
    htp_ingluvio boolean,
    htp_tireoide boolean,
    htp_paratireoide boolean,
    htp_siringe boolean,
    htp_traqueia boolean,
    htp_pulmao boolean,
    htp_coracao boolean,
    htp_proventriculo boolean,
    htp_ventriculo boolean,
    htp_figado boolean,
    htp_vesicula_biliar boolean,
    htp_baco boolean,
    htp_duodeno boolean,
    htp_jejuno boolean,
    htp_ileo_ceco_colon boolean,
    htp_pancreas boolean,
    htp_cloaca boolean,
    htp_rim boolean,
    htp_adrenais boolean,
    htp_ureter boolean,
    htp_gonada boolean,
    htp_bexiga boolean,
    htp_oviduto boolean,
    htp_bursa boolean,
    htp_grandes_vasos boolean,
    htp_saco_aereo boolean,
    htp_timo boolean,
    htp_musculo_esqueletico boolean,
    htp_medula_ossea boolean,
    htp_olho boolean,
    htp_gld_sal boolean,
    htp_encefalo boolean,
    htp_cerebelo boolean,
    htp_osso boolean
);


ALTER TABLE mc_coleta_material_biologico OWNER TO postgres;

--
-- TOC entry 251 (class 1259 OID 60926)
-- Name: mc_outras_pesquisas; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mc_outras_pesquisas (
    id integer NOT NULL,
    swab_cloaca boolean,
    swab_coana boolean,
    conteudo_estomacal boolean,
    sangue_cardiaco boolean,
    penas text,
    outros text,
    observacoes text
);


ALTER TABLE mc_outras_pesquisas OWNER TO postgres;

--
-- TOC entry 252 (class 1259 OID 60932)
-- Name: medicina_conservacao_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE medicina_conservacao_seq
    START WITH 20
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE medicina_conservacao_seq OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 60934)
-- Name: medicina_conservacao; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE medicina_conservacao (
    id integer DEFAULT nextval('medicina_conservacao_seq'::regclass) NOT NULL,
    etiqueta character varying(100) NOT NULL,
    etiqueta_antiga character varying(100),
    especie integer NOT NULL,
    responsavel character varying(255),
    data_entrada date,
    data_captura date,
    coordenada public.geometry,
    anilha character varying(100),
    plumagem character varying(50),
    procedencia character varying(50),
    procedencia_outros character varying(150),
    usuario_insercao integer,
    data_insercao timestamp without time zone,
    usuario_alteracao integer,
    data_alteracao timestamp without time zone
);


ALTER TABLE medicina_conservacao OWNER TO postgres;

--
-- TOC entry 254 (class 1259 OID 60941)
-- Name: municipio_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE municipio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE municipio_seq OWNER TO postgres;

--
-- TOC entry 255 (class 1259 OID 60943)
-- Name: municipio; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE municipio (
    id integer DEFAULT nextval('municipio_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL,
    uf character varying(3) NOT NULL,
    codigo_ibge integer
);


ALTER TABLE municipio OWNER TO postgres;

--
-- TOC entry 262 (class 1259 OID 60968)
-- Name: porto_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE porto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE porto_seq OWNER TO postgres;

--
-- TOC entry 263 (class 1259 OID 60970)
-- Name: porto; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE porto (
    id integer DEFAULT nextval('porto_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL
);


ALTER TABLE porto OWNER TO postgres;

--
-- TOC entry 264 (class 1259 OID 60974)
-- Name: producao_pesqueira_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE producao_pesqueira_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE producao_pesqueira_seq OWNER TO postgres;

--
-- TOC entry 265 (class 1259 OID 60976)
-- Name: producao_pesqueira; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE producao_pesqueira (
    id integer DEFAULT nextval('producao_pesqueira_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    boia_radio integer
);


ALTER TABLE producao_pesqueira OWNER TO postgres;

--
-- TOC entry 266 (class 1259 OID 60980)
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE producao_pesqueira_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE producao_pesqueira_especie_seq OWNER TO postgres;

--
-- TOC entry 267 (class 1259 OID 60982)
-- Name: producao_pesqueira_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE producao_pesqueira_especie (
    id integer DEFAULT nextval('producao_pesqueira_especie_seq'::regclass) NOT NULL,
    producao_pesqueira integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    predacao character varying(255)
);


ALTER TABLE producao_pesqueira_especie OWNER TO postgres;

--
-- TOC entry 268 (class 1259 OID 60986)
-- Name: system_users; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE system_users (
    id integer NOT NULL,
    email character varying(254),
    password character varying(160),
    salt character varying(160),
    user_role_id integer,
    last_login timestamp without time zone,
    last_login_ip character varying(64),
    reset_request_code character varying(128),
    reset_request_time timestamp without time zone,
    reset_request_ip character varying(64),
    verification_status smallint,
    status smallint,
    name character varying(255) NOT NULL,
    n character varying(255)
);


ALTER TABLE system_users OWNER TO postgres;

--
-- TOC entry 269 (class 1259 OID 60992)
-- Name: system_users_id_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE system_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE system_users_id_seq OWNER TO postgres;

--
-- TOC entry 3892 (class 0 OID 0)
-- Dependencies: 269
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: postgres
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 270 (class 1259 OID 60994)
-- Name: user_access_map; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


ALTER TABLE user_access_map OWNER TO postgres;

--
-- TOC entry 271 (class 1259 OID 60997)
-- Name: user_autologin; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE user_autologin OWNER TO postgres;

--
-- TOC entry 272 (class 1259 OID 61002)
-- Name: user_meta; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_meta (
    user_id bigint NOT NULL,
    first_name character varying(100),
    last_name character varying(100),
    phone character varying(100)
);


ALTER TABLE user_meta OWNER TO postgres;

--
-- TOC entry 273 (class 1259 OID 61005)
-- Name: user_role; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


ALTER TABLE user_role OWNER TO postgres;

--
-- TOC entry 274 (class 1259 OID 61008)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE user_role_id_seq OWNER TO postgres;

--
-- TOC entry 3893 (class 0 OID 0)
-- Dependencies: 274
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: postgres
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 275 (class 1259 OID 61010)
-- Name: users_seq; Type: SEQUENCE; Schema: sch01; Owner: postgres
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_seq OWNER TO postgres;

--
-- TOC entry 276 (class 1259 OID 61012)
-- Name: users; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id_users integer DEFAULT nextval('users_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    base character varying(30) NOT NULL,
    email character varying(100) NOT NULL,
    skype character varying(50) NOT NULL,
    senha character varying(50) NOT NULL
);


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 3459 (class 2604 OID 61016)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 3462 (class 2604 OID 61017)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


SET search_path = public, pg_catalog;

--
-- TOC entry 3423 (class 0 OID 59675)
-- Dependencies: 174
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: postgres
--



SET search_path = sch01, pg_catalog;

--
-- TOC entry 3894 (class 0 OID 0)
-- Dependencies: 186
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 3761 (class 0 OID 60706)
-- Dependencies: 187
-- Data for Name: autoriz_pesca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (1, '1.01.002', 'Espinhel Horizontal de Superfície (Albacoras - atuns e afins) - Litoral Brasileiro
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (2, '1.01.001', 'Espinhel Horizontal de Superfície (Espadarte - atuns e afins) - Litoral Brasileiro
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (3, '1.02.001', 'Espinhel Horizontal de Superfície/Isca Viva (Dourado - atuns e afins) - Litoral Sudeste/Sul
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (4, '1.01.003', 'Espinhel Horizontal de Superfície (Dourado - atuns e afins) - Litoral Norte/Nordeste');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (5, '1.03.004', 'Espinhel Horizontal de Fundo (Piramutaba, Dourada e Gurijuba) - Litoral Norte
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (6, '1.03.005', 'Espinhel Horizontal de Fundo (Garoupas, Cherne, Sirigado e outros peixes de fundo) - Litoral Nordeste
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (7, '1.02.002', 'Espinhel Horizontal de Fundo (peixes demersais) - Litoral Sudeste/Sul
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (8, '1.04.001', 'Espinhel Vertical/Covos (Pargo) e Linha de Mão de Superfície (peixes pelágicos) - Litoral Norte/Nordeste
');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (9, '1.09.002', 'Espinhel Vertical/Covos (Pargo) e Espinhel Horizontal de Superfície (peixes pelágicos) - Litoral Norte/Nordeste');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (10, '1.09.003', 'Espinhel Vertical/Covos (Pargo) e Rede de Emalhe de Superfície (peixes pelágicos) - Litoral Norte/Nordeste');
INSERT INTO autoriz_pesca (id_auto_pesca, modalidade, descricao) VALUES (11, '1.09.004', 'Espinhel Vertical (Pargo e outros peixes de fundo) - Litoral Sudeste/Sul');


--
-- TOC entry 3763 (class 0 OID 60712)
-- Dependencies: 189
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (21, 'sada', 'dasdasd', 'dasd');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (22, 'aaa', 'aa', 'aa');


--
-- TOC entry 3895 (class 0 OID 0)
-- Dependencies: 188
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_aves_seq', 22, true);


--
-- TOC entry 3765 (class 0 OID 60718)
-- Dependencies: 191
-- Data for Name: cad_embarcacao; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (19, 'Macedo II', '1.01.002', '135483215', '2315325', 24.00, 34.00, 2012, 'madeira', 'motor', 125.00, 12, NULL, NULL, NULL);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (4, 'Marbella I', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Itajaí', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (5, 'Yamaia II', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Rio Grande', 'RS');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (6, 'Floripa SL 3', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Itajaí', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (8, 'Ana Amaral', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Itajaí', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (18, 'Umbrela', '1.01.002', '12', '32', 22.00, 2.00, 324, 'aço', 'motor', 32.00, 3, NULL, 'Itajaí', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (24, 'Yamaia 4', '1.01.001', '123', '12434453', 15.45, 35.00, 1990, 'aço', 'motor', 500.00, 12, NULL, 'Itajaí', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (7, 'Kopesca IV', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Rio Grande', 'RS');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, muni_t, uf_t) VALUES (9, 'Elias Safe', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, NULL, 'Rio Grande', 'RS');


--
-- TOC entry 3896 (class 0 OID 0)
-- Dependencies: 190
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 24, true);


--
-- TOC entry 3767 (class 0 OID 60727)
-- Dependencies: 193
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (15, 'teste2', 'Rua Jorge Tzachel 114, Bloco C apt 304', '', '', '4797444183', 'asantoro@projetoalbatroz.org.br', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (13, 'teste', 'asdfadsfdsfsd', '', '', '', 'andre.santoro@gmail.com', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (12, 'Coqueiros', 'Rua Jorge Tzachel', 'João', 'porteiro', '4797444183', 'andre.santo', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (10, 'Hotel', '36 central park south', 'iasmin', 'estagiaria', '1223423', '', 1);


--
-- TOC entry 3897 (class 0 OID 0)
-- Dependencies: 192
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_empresa_seq', 15, true);


--
-- TOC entry 3769 (class 0 OID 60733)
-- Dependencies: 195
-- Data for Name: cad_entrevistador; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_entrevistador (id, nome) VALUES (1, 'João');
INSERT INTO cad_entrevistador (id, nome) VALUES (2, 'Maria');


--
-- TOC entry 3898 (class 0 OID 0)
-- Dependencies: 194
-- Name: cad_entrevistador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_entrevistador_seq', 2, true);


--
-- TOC entry 3771 (class 0 OID 60739)
-- Dependencies: 197
-- Data for Name: cad_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_especie (id, nome) VALUES (1, 'Peixe espada');
INSERT INTO cad_especie (id, nome) VALUES (2, 'Camarão Branco');


--
-- TOC entry 3899 (class 0 OID 0)
-- Dependencies: 196
-- Name: cad_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_especie_seq', 2, true);


--
-- TOC entry 3773 (class 0 OID 60745)
-- Dependencies: 199
-- Data for Name: cad_financiador; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_financiador (id, nome) VALUES (1, 'Financiador 1');


--
-- TOC entry 3900 (class 0 OID 0)
-- Dependencies: 198
-- Name: cad_financiador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_financiador_seq', 1, true);


--
-- TOC entry 3775 (class 0 OID 60751)
-- Dependencies: 201
-- Data for Name: cad_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_isca (id_isca, nome) VALUES (1, 'Lula');
INSERT INTO cad_isca (id_isca, nome) VALUES (2, 'Cavalinha');
INSERT INTO cad_isca (id_isca, nome) VALUES (3, 'Bonito');
INSERT INTO cad_isca (id_isca, nome) VALUES (4, 'Sardinha');


--
-- TOC entry 3901 (class 0 OID 0)
-- Dependencies: 200
-- Name: cad_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_isca_seq', 4, true);


--
-- TOC entry 3777 (class 0 OID 60757)
-- Dependencies: 203
-- Data for Name: cad_medida_metigatoria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (1, 'Toriline');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (2, 'Largada noturna');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (3, 'Regime de peso');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (4, 'Isca tingida');


--
-- TOC entry 3902 (class 0 OID 0)
-- Dependencies: 202
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_medida_metigatoria_seq', 4, true);


--
-- TOC entry 3779 (class 0 OID 60763)
-- Dependencies: 205
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (20, 'Andre', 'Kbçudo', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (21, 'Iasmin', 'Iaia', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (22, 'Rodrigo', 'Yano', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (23, 'Eduardo', 'Dudu', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (24, 'Paulo', 'Paulo', '4797444183', 'paulo@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (25, 'Francisco', 'Francisco', '', '');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (26, 'Oziman', 'Oziman', '', '');


--
-- TOC entry 3903 (class 0 OID 0)
-- Dependencies: 204
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_mestre_seq', 26, true);


--
-- TOC entry 3904 (class 0 OID 0)
-- Dependencies: 206
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_observ_seq', 18, true);


--
-- TOC entry 3781 (class 0 OID 60769)
-- Dependencies: 207
-- Data for Name: cad_observador; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (1, 'asdasd', '1231', '231231', 'dasda', 'dasd', 'dasd', 'dasd', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (2, 'André A Santoro', '', '', 'asantoro@projetoalbatroz.org.br', '', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (3, 'dasd', 'das', 'das', 'das', 'das', 'asd', 'das', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (4, 'dasdas', 'dsa', 'das', 'das', 'ads', 'asd', 'asd', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (5, 'da', 'asd', 'ads', 'asd', 'asd', 'asd', 'asd', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (6, 'Rodrigo', '123412', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '36 central park south', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (7, 'Iasmin', '12341212', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '10440 Deerwood Dr.
Apartament 833', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (8, 'fdsafasd', '12213', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (9, 'fdsafasd', '122133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (10, 'fdsafasd', '1223133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (11, 'Pedro', '045951', '587463', 'pedro@gmail.com', '479951328', 'pedromar', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (12, 'Fabiano', '423432', '342534', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (13, 'André A Santoro', '123456', '123456', 'asantoro@projetoalbatroz.org.br', '123456', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (14, 'André A Santoro', '123', '1234324', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 1);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (15, 'André A Santoro', '1234', '12312', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (16, 'André A Santoro', '12', '12', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (17, 'André A Santoro', '14', '12', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, municipio) VALUES (18, 'André A Santoro', '5354432534', '3532452345', 'asantoro@projetoalbatroz.org.br', '4797444183', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 2);


--
-- TOC entry 3783 (class 0 OID 60775)
-- Dependencies: 209
-- Data for Name: captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (16, 59, NULL, NULL, '0101000020E6100000000000000000F03F0000000000003740', NULL);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (36, 58, 96, NULL, NULL, NULL);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (58, 69, 135, '2015-07-02', '0101000020E6100000696FF085C9743540696FF085C9743540', 69);


--
-- TOC entry 3785 (class 0 OID 60784)
-- Dependencies: 211
-- Data for Name: captura_incidental_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO captura_incidental_especie (id, especie, quantidade, etiqueta, captura_incidental) VALUES (40, 1, NULL, 2, 58);


--
-- TOC entry 3905 (class 0 OID 0)
-- Dependencies: 210
-- Name: captura_incidental_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('captura_incidental_especie_seq', 41, true);


--
-- TOC entry 3906 (class 0 OID 0)
-- Dependencies: 208
-- Name: captura_incidental_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('captura_incidental_seq', 60, true);


--
-- TOC entry 3787 (class 0 OID 60790)
-- Dependencies: 213
-- Data for Name: contagem_ave_boia; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (30, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (50, 58, 96, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (69, 69, 135, '2', '2015-07-02 14:42:00', 21.45, 1500, 1234.00, '0101000020E61000002B8716D9CE0F40402B8716D9CE0F4040');


--
-- TOC entry 3789 (class 0 OID 60799)
-- Dependencies: 215
-- Data for Name: contagem_ave_boia_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (32, 30, 1, 11);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (46, 50, 3, 1);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (78, 69, 1, 5);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (79, 69, 11, 4);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (80, 69, 2, 7);


--
-- TOC entry 3907 (class 0 OID 0)
-- Dependencies: 214
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_ave_boia_especie_seq', 82, true);


--
-- TOC entry 3908 (class 0 OID 0)
-- Dependencies: 212
-- Name: contagem_ave_boia_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_ave_boia_seq', 73, true);


--
-- TOC entry 3791 (class 0 OID 60805)
-- Dependencies: 217
-- Data for Name: contagem_por_sol; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (27, 59, '3233-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (57, 58, '2015-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (90, 69, '2015-07-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3793 (class 0 OID 60814)
-- Dependencies: 219
-- Data for Name: contagem_por_sol_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3909 (class 0 OID 0)
-- Dependencies: 218
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_especie_seq', 33, true);


--
-- TOC entry 3795 (class 0 OID 60820)
-- Dependencies: 221
-- Data for Name: contagem_por_sol_indice; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_por_sol_indice (id, contagem_por_sol, indice, hora, total) VALUES (33, 90, 2, NULL, NULL);


--
-- TOC entry 3910 (class 0 OID 0)
-- Dependencies: 220
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_indice_seq', 34, true);


--
-- TOC entry 3911 (class 0 OID 0)
-- Dependencies: 216
-- Name: contagem_por_sol_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_seq', 93, true);


--
-- TOC entry 3797 (class 0 OID 60826)
-- Dependencies: 223
-- Data for Name: cruzeiro; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (59, 2, 9, 23, NULL, NULL, '1988-11-11', '1988-11-11', NULL, 1, '2015-05-09 00:23:53', NULL, NULL);
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (58, 2, 8, 20, NULL, NULL, '2015-04-01', '2015-04-30', NULL, 1, '2015-04-30 02:35:14', 1, '2015-06-04 18:41:23');
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (69, 2, 9, 25, 13, 1, '2015-07-01', '2015-07-31', '2', 1, '2015-07-15 15:54:03', 1, '2015-07-15 19:19:00');
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (70, 8, 7, 24, 12, 1, '2015-07-01', '2015-07-31', 'nada a declarar', 1, '2015-07-15 21:31:09', 1, '2015-07-15 21:50:38');


--
-- TOC entry 3912 (class 0 OID 0)
-- Dependencies: 224
-- Name: cruzeiro_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cruzeiro_lance_seq', 1, false);


--
-- TOC entry 3913 (class 0 OID 0)
-- Dependencies: 222
-- Name: cruzeiro_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cruzeiro_seq', 70, true);


--
-- TOC entry 3800 (class 0 OID 60837)
-- Dependencies: 226
-- Data for Name: dados_abioticos; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (25, 59, 1, NULL, NULL, true, NULL, 22, 23);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (96, 58, 2, NULL, true, NULL, NULL, 164, 165);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (135, 69, 1, NULL, NULL, NULL, NULL, 242, 243);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (142, 70, 1, 2342, NULL, true, true, 256, 257);


--
-- TOC entry 3802 (class 0 OID 60843)
-- Dependencies: 228
-- Data for Name: dados_abioticos_complementar; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, 'NE', NULL, 'O', NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (22, 1, '0101000020E61000000000000000000040000000000000F03F', '0101000020E61000000000000000000040000000000000F03F', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (165, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (164, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (243, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (242, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (257, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (256, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3914 (class 0 OID 0)
-- Dependencies: 227
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('dados_abioticos_complementar_seq', 257, true);


--
-- TOC entry 3803 (class 0 OID 60850)
-- Dependencies: 229
-- Data for Name: dados_abioticos_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO dados_abioticos_isca (id_isca, id_dados_abioticos) VALUES (2, 142);
INSERT INTO dados_abioticos_isca (id_isca, id_dados_abioticos) VALUES (1, 142);


--
-- TOC entry 3915 (class 0 OID 0)
-- Dependencies: 225
-- Name: dados_abioticos_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('dados_abioticos_seq', 142, true);


--
-- TOC entry 3807 (class 0 OID 60861)
-- Dependencies: 233
-- Data for Name: ec_area_pesca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3809 (class 0 OID 60867)
-- Dependencies: 235
-- Data for Name: ec_captura_ave; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3831 (class 0 OID 60949)
-- Dependencies: 257
-- Data for Name: ec_petrecho; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3851 (class 0 OID 61492)
-- Dependencies: 277
-- Data for Name: ec_petrecho_arrasto; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3834 (class 0 OID 60962)
-- Dependencies: 260
-- Data for Name: ec_petrecho_cerco; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3835 (class 0 OID 60965)
-- Dependencies: 261
-- Data for Name: ec_petrecho_emalhe; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3832 (class 0 OID 60953)
-- Dependencies: 258
-- Data for Name: ec_petrecho_espinhel; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3833 (class 0 OID 60956)
-- Dependencies: 259
-- Data for Name: ec_petrecho_linha_mao; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3852 (class 0 OID 61502)
-- Dependencies: 278
-- Data for Name: ec_petrecho_vara_isca_viva; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3805 (class 0 OID 60855)
-- Dependencies: 231
-- Data for Name: entrevista_cais; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3916 (class 0 OID 0)
-- Dependencies: 232
-- Name: entrevista_cais_area_pesca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('entrevista_cais_area_pesca_seq', 1, true);


--
-- TOC entry 3917 (class 0 OID 0)
-- Dependencies: 234
-- Name: entrevista_cais_captura_ave_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('entrevista_cais_captura_ave_seq', 1, true);


--
-- TOC entry 3918 (class 0 OID 0)
-- Dependencies: 230
-- Name: entrevista_cais_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('entrevista_cais_seq', 1, true);


--
-- TOC entry 3811 (class 0 OID 60873)
-- Dependencies: 237
-- Data for Name: especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (1, 'Thalassarche chlororhynchos', 'Albatroz-de-nariz-amarelo', 'Atlantic Yellow-nosed Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (2, 'Thalassarche melanophrys', 'Albatroz-de-sobrancelha-negra', 'Black-browed Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (3, 'Diomedea exulans', 'Albatroz-viageiro', 'Wandering Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (10, 'Peixes espadus', 'Peixe espada', 'Swordfish', 'pescado');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (12, 'Xiphias gladius', 'Meka', 'Swordfish', 'pescado');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (11, 'Thalassarche spp', 'Albatroz', 'Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (4, 'Chelon bispinosus', 'Tainha-de-cabo-verde', '', 'pescado');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (5, 'Camaronis', 'Camarão', 'Test_testing', 'pescado');


--
-- TOC entry 3919 (class 0 OID 0)
-- Dependencies: 236
-- Name: especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('especie_seq', 12, true);


--
-- TOC entry 3813 (class 0 OID 60879)
-- Dependencies: 239
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (81, 124, 1, 4);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (82, 125, 2, 1);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (85, 133, 1, 4);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (86, 133, 1, 2);


--
-- TOC entry 3920 (class 0 OID 0)
-- Dependencies: 238
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_captura_seq', 86, true);


--
-- TOC entry 3815 (class 0 OID 60885)
-- Dependencies: 241
-- Data for Name: mb_geral; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (73, 6, 21, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 20:46:04', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (74, 6, 25, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 21:14:50', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (75, 6, 21, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 21:18:36', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (76, 6, 21, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 21:19:55', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (77, 9, 25, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 21:24:01', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (79, 9, 25, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 21:25:21', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (69, 19, 26, '2015-07-01', '2015-07-30', NULL, 1, 1, 1, '2015-07-02 20:35:02', 1, '2015-07-15 15:50:31');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (78, 6, 21, '2015-07-01', '2015-07-31', NULL, 1, 1, 1, '2015-07-02 21:24:39', 1, '2015-07-15 19:22:47');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (68, 9, 25, NULL, NULL, NULL, 1, 1, 1, '2015-07-02 20:15:17', 1, '2015-07-15 19:23:09');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (81, 9, 25, '2015-03-03', '2015-03-22', 'nada a declarar', 1, 1, 1, '2015-07-15 20:28:14', 1, '2015-07-15 20:33:30');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (72, 6, 20, '2015-07-01', '2015-07-31', NULL, 1, 2, 1, '2015-07-02 20:45:10', 1, '2015-07-15 20:34:33');


--
-- TOC entry 3921 (class 0 OID 0)
-- Dependencies: 240
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_geral_seq', 81, true);


--
-- TOC entry 3816 (class 0 OID 60892)
-- Dependencies: 242
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_isca (id_isca, id_lance) VALUES (1, 132);
INSERT INTO mb_isca (id_isca, id_lance) VALUES (2, 133);


--
-- TOC entry 3922 (class 0 OID 0)
-- Dependencies: 243
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 3819 (class 0 OID 60899)
-- Dependencies: 245
-- Data for Name: mb_lance; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (111, 2, NULL, NULL, NULL, 73, NULL, NULL, NULL, NULL, 12, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (112, 2, NULL, NULL, NULL, 74, NULL, NULL, NULL, NULL, 23, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (113, 3, NULL, NULL, NULL, 75, NULL, NULL, NULL, NULL, 12, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (114, 4, NULL, NULL, NULL, 76, NULL, NULL, NULL, NULL, 12, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (115, 3, NULL, NULL, NULL, 77, NULL, NULL, NULL, NULL, 23, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (117, 1, NULL, NULL, NULL, 79, NULL, NULL, NULL, NULL, 75, 3.50);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (118, 2, NULL, NULL, NULL, 79, NULL, NULL, NULL, NULL, 60, 2.00);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (119, 3, NULL, NULL, NULL, 79, NULL, NULL, NULL, NULL, 90, 4.30);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (121, 5, NULL, NULL, NULL, 69, NULL, NULL, NULL, NULL, 75, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (124, 3, NULL, NULL, NULL, 78, NULL, NULL, NULL, NULL, 23, 12.43);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (125, 2, '2015-07-08', NULL, NULL, 68, NULL, NULL, NULL, NULL, 65, 3.50);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (132, 1, '2015-03-05', 1400, NULL, 81, false, '17:20:00', '23:50:00', '0101000020E6100000E17A14AE47A14740A4703D0AD7034040', 75, 3.00);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (133, 2, '2015-03-06', 1400, NULL, 81, true, '17:30:00', '23:55:00', '0101000020E6100000C3F5285C8FA24740D7A3703D0AB74040', 75, 3.00);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (134, 1, NULL, NULL, NULL, 72, NULL, NULL, NULL, NULL, 24, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada, ponteira_peso, ponteira_distancia) VALUES (135, 2, NULL, NULL, NULL, 72, NULL, NULL, NULL, NULL, 234, NULL);


--
-- TOC entry 3923 (class 0 OID 0)
-- Dependencies: 244
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_lance_seq', 135, true);


--
-- TOC entry 3924 (class 0 OID 0)
-- Dependencies: 246
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 3821 (class 0 OID 60908)
-- Dependencies: 247
-- Data for Name: mb_mitigatoria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (1, 132);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (3, 133);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (1, 133);


--
-- TOC entry 3822 (class 0 OID 60911)
-- Dependencies: 248
-- Data for Name: mc_biometria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_biometria (id, peso, comprimento, culmem, narina_culmem, altura_bico_base, altura_minima_bico, altura_bico_unguis, largura_bico_base, comprimento_cabeca, comprimento_asa, comprimento_cauda, comprimento_tarso, comprimento_dedo_sem_unha, comprimento_dedo_com_unha, envergadura, muda_asa, muda_cauda, muda_cabeca, muda_dorso, muda_ventre) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3823 (class 0 OID 60914)
-- Dependencies: 249
-- Data for Name: mc_captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_captura_incidental (mc_id, informacao, cruzeiro, lance, observador, mestre, embarcacao, historico, descricao_local_coleta) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3824 (class 0 OID 60920)
-- Dependencies: 250
-- Data for Name: mc_coleta_material_biologico; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_coleta_material_biologico (id, data_necropsia, local_necropsia, condicao_carcaca, autolise, sexagem, empetrolamento, condicao_corporal, piolho, carrapato, pulga, lepadomorpha, larvas_putrefacao, outros, outros_descricao, nematoides, acantocefalos, cestoides, trematoides, amt_encefalo, amt_medula_ossea, amt_musculo, amt_figado, amt_pulmao, amt_baco, amt_gordura, htp_pele, htp_lingua, htp_esofago, htp_ingluvio, htp_tireoide, htp_paratireoide, htp_siringe, htp_traqueia, htp_pulmao, htp_coracao, htp_proventriculo, htp_ventriculo, htp_figado, htp_vesicula_biliar, htp_baco, htp_duodeno, htp_jejuno, htp_ileo_ceco_colon, htp_pancreas, htp_cloaca, htp_rim, htp_adrenais, htp_ureter, htp_gonada, htp_bexiga, htp_oviduto, htp_bursa, htp_grandes_vasos, htp_saco_aereo, htp_timo, htp_musculo_esqueletico, htp_medula_ossea, htp_olho, htp_gld_sal, htp_encefalo, htp_cerebelo, htp_osso) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:3:{i:0;s:14:"papel_aluminio";i:1;s:15:"papel_eppendorf";i:2;s:9:"alcool_70";}', 'a:2:{i:0;s:14:"papel_aluminio";i:1;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:14:"papel_aluminio";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', true, false, NULL, true, false, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3825 (class 0 OID 60926)
-- Dependencies: 251
-- Data for Name: mc_outras_pesquisas; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_outras_pesquisas (id, swab_cloaca, swab_coana, conteudo_estomacal, sangue_cardiaco, penas, outros, observacoes) VALUES (62, NULL, NULL, NULL, NULL, 'N;', NULL, NULL);


--
-- TOC entry 3827 (class 0 OID 60934)
-- Dependencies: 253
-- Data for Name: medicina_conservacao; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO medicina_conservacao (id, etiqueta, etiqueta_antiga, especie, responsavel, data_entrada, data_captura, coordenada, anilha, plumagem, procedencia, procedencia_outros, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (62, '123456', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-07-14 14:46:32', NULL, NULL);


--
-- TOC entry 3925 (class 0 OID 0)
-- Dependencies: 252
-- Name: medicina_conservacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('medicina_conservacao_seq', 62, true);


--
-- TOC entry 3829 (class 0 OID 60943)
-- Dependencies: 255
-- Data for Name: municipio; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO municipio (id, nome, uf, codigo_ibge) VALUES (1, 'Itajaí', 'SC', NULL);
INSERT INTO municipio (id, nome, uf, codigo_ibge) VALUES (2, 'Rio Grande', 'RS', NULL);


--
-- TOC entry 3926 (class 0 OID 0)
-- Dependencies: 254
-- Name: municipio_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('municipio_seq', 2, true);


--
-- TOC entry 3927 (class 0 OID 0)
-- Dependencies: 256
-- Name: petrecho_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('petrecho_seq', 1, true);


--
-- TOC entry 3837 (class 0 OID 60970)
-- Dependencies: 263
-- Data for Name: porto; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3928 (class 0 OID 0)
-- Dependencies: 262
-- Name: porto_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('porto_seq', 1, false);


--
-- TOC entry 3839 (class 0 OID 60976)
-- Dependencies: 265
-- Data for Name: producao_pesqueira; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (70, 59, NULL, NULL);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (74, 58, 96, NULL);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (81, 69, 135, 69);


--
-- TOC entry 3841 (class 0 OID 60982)
-- Dependencies: 267
-- Data for Name: producao_pesqueira_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (70, 70, 1, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (73, 74, 4, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (74, 74, 5, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (87, 81, 10, 10, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (88, 81, 12, 50, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (89, 81, 12, 5, 'orca');


--
-- TOC entry 3929 (class 0 OID 0)
-- Dependencies: 266
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('producao_pesqueira_especie_seq', 90, true);


--
-- TOC entry 3930 (class 0 OID 0)
-- Dependencies: 264
-- Name: producao_pesqueira_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('producao_pesqueira_seq', 82, true);


--
-- TOC entry 3842 (class 0 OID 60986)
-- Dependencies: 268
-- Data for Name: system_users; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (2, 'tiagozis@gmail.com', 'e83930dca43b04125bac395678ed61d0d3db1e03', '5515f69aa86390.99105598', 1, '2015-03-28 01:34:18', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Tiago Zis', '2');
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (213, 'digitador@email.com', 'b67a3c28932ba86d3da9f34568bce4233e3b344a', '5570eb35a48af0.06984395', 10, '2015-06-09 01:10:54', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Zé digitador', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (211, 'teste@teste.com', 'a78471bd4d93a49b2ba0713a61a19d5b633b9405', '55928c872cf510.45442147', 10, '2015-06-13 21:56:34', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Teste', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (214, 'ibegnini@projetoalbatroz.org.br', 'c58d818ce2ddf11ae3dd77edeb445dcc8ef3222e', '55928d984b1ff0.26466267', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Iasmin Begnini', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2015-07-20 19:34:24', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Admin', '2');


--
-- TOC entry 3931 (class 0 OID 0)
-- Dependencies: 269
-- Name: system_users_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('system_users_id_seq', 214, true);


--
-- TOC entry 3844 (class 0 OID 60994)
-- Dependencies: 270
-- Data for Name: user_access_map; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'admin/welcome', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'sistema_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_ave_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_embarcacao_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_empresa_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_mestre_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_observ_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'entrevista_cais_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'mapa_bordo_ct', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'usuario', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'observadorbordo', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'medicinaconservacao', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'tipousuario', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'sistema_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'medicinaconservacao', 7);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'usuario', 0);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'cad_ave_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'cad_embarcacao_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'cad_empresa_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'cad_mestre_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'cad_observ_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'entrevista_cais_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'login_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'mapa_bordo_ct', 7);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'observadorbordo', 7);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'tipousuario', 0);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (10, 'welcome', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'especie', 15);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'login_ct', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'welcome', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_empresa_ct_old', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'cad_mestre_ct_old', 1);
INSERT INTO user_access_map (user_role_id, controller, permission) VALUES (1, 'entrevistacaisct', 15);


--
-- TOC entry 3845 (class 0 OID 60997)
-- Dependencies: 271
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3846 (class 0 OID 61002)
-- Dependencies: 272
-- Data for Name: user_meta; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3847 (class 0 OID 61005)
-- Dependencies: 273
-- Data for Name: user_role; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO user_role (id, role_name, default_access) VALUES (1, 'Admin', '11111');
INSERT INTO user_role (id, role_name, default_access) VALUES (10, 'Digitador', '11111');


--
-- TOC entry 3932 (class 0 OID 0)
-- Dependencies: 274
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('user_role_id_seq', 11, true);


--
-- TOC entry 3850 (class 0 OID 61012)
-- Dependencies: 276
-- Data for Name: users; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3933 (class 0 OID 0)
-- Dependencies: 275
-- Name: users_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 3465 (class 2606 OID 61019)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 3467 (class 2606 OID 61021)
-- Name: pk_aves; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 3527 (class 2606 OID 61023)
-- Name: pk_biometria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT pk_biometria PRIMARY KEY (id);


--
-- TOC entry 3475 (class 2606 OID 61025)
-- Name: pk_cad_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_especie
    ADD CONSTRAINT pk_cad_especie PRIMARY KEY (id);


--
-- TOC entry 3477 (class 2606 OID 61027)
-- Name: pk_cad_financiador; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_financiador
    ADD CONSTRAINT pk_cad_financiador PRIMARY KEY (id);


--
-- TOC entry 3479 (class 2606 OID 61029)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 3517 (class 2606 OID 61031)
-- Name: pk_capt; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 3487 (class 2606 OID 61033)
-- Name: pk_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT pk_captura_incidental PRIMARY KEY (id);


--
-- TOC entry 3489 (class 2606 OID 61035)
-- Name: pk_captura_incidental_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT pk_captura_incidental_especie PRIMARY KEY (id);


--
-- TOC entry 3531 (class 2606 OID 61037)
-- Name: pk_coleta_material_biologico; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT pk_coleta_material_biologico PRIMARY KEY (id);


--
-- TOC entry 3491 (class 2606 OID 61039)
-- Name: pk_contagem_ave_boia; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT pk_contagem_ave_boia PRIMARY KEY (id);


--
-- TOC entry 3493 (class 2606 OID 61041)
-- Name: pk_contagem_ave_boia_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT pk_contagem_ave_boia_especie PRIMARY KEY (id);


--
-- TOC entry 3495 (class 2606 OID 61043)
-- Name: pk_contagem_por_sol; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT pk_contagem_por_sol PRIMARY KEY (id);


--
-- TOC entry 3497 (class 2606 OID 61045)
-- Name: pk_contagem_por_sol_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT pk_contagem_por_sol_especie PRIMARY KEY (id);


--
-- TOC entry 3499 (class 2606 OID 61047)
-- Name: pk_contagem_por_sol_indice; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT pk_contagem_por_sol_indice PRIMARY KEY (id);


--
-- TOC entry 3501 (class 2606 OID 61049)
-- Name: pk_cruzeiro; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT pk_cruzeiro PRIMARY KEY (id);


--
-- TOC entry 3503 (class 2606 OID 61051)
-- Name: pk_dados_abioticos; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT pk_dados_abioticos PRIMARY KEY (id);


--
-- TOC entry 3505 (class 2606 OID 61053)
-- Name: pk_dados_abioticos_complementar; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos_complementar
    ADD CONSTRAINT pk_dados_abioticos_complementar PRIMARY KEY (id);


--
-- TOC entry 3507 (class 2606 OID 61055)
-- Name: pk_dados_abioticos_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT pk_dados_abioticos_isca PRIMARY KEY (id_isca, id_dados_abioticos);


--
-- TOC entry 3469 (class 2606 OID 61057)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 3471 (class 2606 OID 61059)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 3509 (class 2606 OID 61061)
-- Name: pk_entrevista_cais; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT pk_entrevista_cais PRIMARY KEY (id);


--
-- TOC entry 3511 (class 2606 OID 61063)
-- Name: pk_entrevista_cais_area_pesca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_area_pesca
    ADD CONSTRAINT pk_entrevista_cais_area_pesca PRIMARY KEY (id);


--
-- TOC entry 3513 (class 2606 OID 61065)
-- Name: pk_entrevista_cais_captura_ave; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT pk_entrevista_cais_captura_ave PRIMARY KEY (id);


--
-- TOC entry 3473 (class 2606 OID 61067)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 3515 (class 2606 OID 61069)
-- Name: pk_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY especie
    ADD CONSTRAINT pk_especie PRIMARY KEY (id);


--
-- TOC entry 3523 (class 2606 OID 61071)
-- Name: pk_lance; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 3519 (class 2606 OID 61073)
-- Name: pk_mb; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 3521 (class 2606 OID 61075)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 3525 (class 2606 OID 61077)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 3529 (class 2606 OID 61079)
-- Name: pk_mc_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT pk_mc_captura_incidental PRIMARY KEY (mc_id);


--
-- TOC entry 3535 (class 2606 OID 61081)
-- Name: pk_medicina_conservacao; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT pk_medicina_conservacao PRIMARY KEY (id);


--
-- TOC entry 3481 (class 2606 OID 61083)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 3483 (class 2606 OID 61085)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 3537 (class 2606 OID 61087)
-- Name: pk_municipio; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (id);


--
-- TOC entry 3485 (class 2606 OID 61089)
-- Name: pk_observ; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 3533 (class 2606 OID 61091)
-- Name: pk_outras_pesquisas; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT pk_outras_pesquisas PRIMARY KEY (id);


--
-- TOC entry 3539 (class 2606 OID 61093)
-- Name: pk_petrecho; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho
    ADD CONSTRAINT pk_petrecho PRIMARY KEY (id);


--
-- TOC entry 3567 (class 2606 OID 61496)
-- Name: pk_petrecho_arrasto; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_arrasto
    ADD CONSTRAINT pk_petrecho_arrasto PRIMARY KEY (id);


--
-- TOC entry 3541 (class 2606 OID 61095)
-- Name: pk_petrecho_espinhel; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_espinhel
    ADD CONSTRAINT pk_petrecho_espinhel PRIMARY KEY (id);


--
-- TOC entry 3543 (class 2606 OID 61097)
-- Name: pk_petrecho_linha; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_linha_mao
    ADD CONSTRAINT pk_petrecho_linha PRIMARY KEY (id);


--
-- TOC entry 3545 (class 2606 OID 61099)
-- Name: pk_petrecho_rede; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_cerco
    ADD CONSTRAINT pk_petrecho_rede PRIMARY KEY (id);


--
-- TOC entry 3547 (class 2606 OID 61101)
-- Name: pk_petrecho_rede_pano; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_emalhe
    ADD CONSTRAINT pk_petrecho_rede_pano PRIMARY KEY (id);


--
-- TOC entry 3569 (class 2606 OID 61506)
-- Name: pk_petrecho_vara_isca_viva; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_vara_isca_viva
    ADD CONSTRAINT pk_petrecho_vara_isca_viva PRIMARY KEY (id);


--
-- TOC entry 3549 (class 2606 OID 61103)
-- Name: pk_porto; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY porto
    ADD CONSTRAINT pk_porto PRIMARY KEY (id);


--
-- TOC entry 3551 (class 2606 OID 61105)
-- Name: pk_producao_pesqueira; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT pk_producao_pesqueira PRIMARY KEY (id);


--
-- TOC entry 3553 (class 2606 OID 61107)
-- Name: pk_producao_pesqueira_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT pk_producao_pesqueira_especie PRIMARY KEY (id);


--
-- TOC entry 3555 (class 2606 OID 61109)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 3557 (class 2606 OID 61111)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 3559 (class 2606 OID 61113)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 3561 (class 2606 OID 61115)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 3563 (class 2606 OID 61117)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 3565 (class 2606 OID 61119)
-- Name: pk_users; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 3636 (class 2606 OID 61120)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3571 (class 2606 OID 61125)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3574 (class 2606 OID 61130)
-- Name: fk_captura_incidental; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_captura_incidental FOREIGN KEY (captura_incidental) REFERENCES captura_incidental(id);


--
-- TOC entry 3578 (class 2606 OID 61135)
-- Name: fk_contagem_ave_boia; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_contagem_ave_boia FOREIGN KEY (contagem_ave_boia) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3584 (class 2606 OID 61140)
-- Name: fk_contagem_por_sol; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT fk_contagem_por_sol FOREIGN KEY (contagem_por_sol) REFERENCES contagem_por_sol(id);


--
-- TOC entry 3582 (class 2606 OID 61145)
-- Name: fk_contagem_psi; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_contagem_psi FOREIGN KEY (contagem_psi) REFERENCES contagem_por_sol_indice(id);


--
-- TOC entry 3592 (class 2606 OID 61150)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3580 (class 2606 OID 61155)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3572 (class 2606 OID 61160)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3576 (class 2606 OID 61165)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3637 (class 2606 OID 61170)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3621 (class 2606 OID 61175)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3593 (class 2606 OID 61180)
-- Name: fk_dado_lancamento; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_lancamento FOREIGN KEY (dado_lancamento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3594 (class 2606 OID 61185)
-- Name: fk_dado_recolhimento; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_recolhimento FOREIGN KEY (dado_recolhimento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3595 (class 2606 OID 61190)
-- Name: fk_dados_abioticos_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3596 (class 2606 OID 61195)
-- Name: fk_dados_abioticos_isca_dados_abioticos; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_dados_abioticos FOREIGN KEY (id_dados_abioticos) REFERENCES dados_abioticos(id);


--
-- TOC entry 3610 (class 2606 OID 61200)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3585 (class 2606 OID 61205)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3622 (class 2606 OID 61210)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3597 (class 2606 OID 61215)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3586 (class 2606 OID 61220)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3598 (class 2606 OID 61225)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3605 (class 2606 OID 61230)
-- Name: fk_entrevista_cais; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_area_pesca
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);


--
-- TOC entry 3606 (class 2606 OID 61235)
-- Name: fk_entrevista_cais; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);


--
-- TOC entry 3611 (class 2606 OID 61240)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES system_users(id);


--
-- TOC entry 3575 (class 2606 OID 61245)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3579 (class 2606 OID 61250)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3583 (class 2606 OID 61255)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3639 (class 2606 OID 61260)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3608 (class 2606 OID 61265)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_especie FOREIGN KEY (id_ave) REFERENCES especie(id);


--
-- TOC entry 3629 (class 2606 OID 61270)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3607 (class 2606 OID 61275)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3587 (class 2606 OID 61280)
-- Name: fk_financiador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_financiador FOREIGN KEY (financiador) REFERENCES cad_financiador(id);


--
-- TOC entry 3573 (class 2606 OID 61285)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3581 (class 2606 OID 61290)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3577 (class 2606 OID 61295)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3638 (class 2606 OID 61300)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3623 (class 2606 OID 61305)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3617 (class 2606 OID 61310)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 3615 (class 2606 OID 61315)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3616 (class 2606 OID 61320)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3609 (class 2606 OID 61325)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3618 (class 2606 OID 61330)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 3619 (class 2606 OID 61335)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3624 (class 2606 OID 61340)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (mc_id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3620 (class 2606 OID 61345)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3627 (class 2606 OID 61350)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3628 (class 2606 OID 61355)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3612 (class 2606 OID 61360)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3588 (class 2606 OID 61365)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3625 (class 2606 OID 61370)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3570 (class 2606 OID 61375)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES municipio(id);


--
-- TOC entry 3599 (class 2606 OID 61380)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES municipio(id);


--
-- TOC entry 3589 (class 2606 OID 61385)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3626 (class 2606 OID 61390)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3600 (class 2606 OID 61395)
-- Name: fk_petrecho; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_petrecho FOREIGN KEY (petrecho) REFERENCES ec_petrecho(id);


--
-- TOC entry 3642 (class 2606 OID 61497)
-- Name: fk_petrecho_arrasto; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_arrasto
    ADD CONSTRAINT fk_petrecho_arrasto FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3632 (class 2606 OID 61400)
-- Name: fk_petrecho_espinhel; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_espinhel
    ADD CONSTRAINT fk_petrecho_espinhel FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3633 (class 2606 OID 61405)
-- Name: fk_petrecho_linha; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_linha_mao
    ADD CONSTRAINT fk_petrecho_linha FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3634 (class 2606 OID 61410)
-- Name: fk_petrecho_rede; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_cerco
    ADD CONSTRAINT fk_petrecho_rede FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3635 (class 2606 OID 61415)
-- Name: fk_petrecho_rede_pano; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_emalhe
    ADD CONSTRAINT fk_petrecho_rede_pano FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3643 (class 2606 OID 61507)
-- Name: fk_petrecho_vara_isca_viva; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY ec_petrecho_vara_isca_viva
    ADD CONSTRAINT fk_petrecho_vara_isca_viva FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3601 (class 2606 OID 61420)
-- Name: fk_porto_saida; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_porto_saida FOREIGN KEY (porto_saida) REFERENCES porto(id);


--
-- TOC entry 3640 (class 2606 OID 61425)
-- Name: fk_producao_pesqueira; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_producao_pesqueira FOREIGN KEY (producao_pesqueira) REFERENCES producao_pesqueira(id);


--
-- TOC entry 3602 (class 2606 OID 61430)
-- Name: fk_responsavel_campo; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_responsavel_campo FOREIGN KEY (responsavel_campo) REFERENCES system_users(id);


--
-- TOC entry 3641 (class 2606 OID 61435)
-- Name: fk_user_role; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT fk_user_role FOREIGN KEY (user_role_id) REFERENCES user_role(id);


--
-- TOC entry 3613 (class 2606 OID 61440)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3590 (class 2606 OID 61445)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3630 (class 2606 OID 61450)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3603 (class 2606 OID 61455)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3614 (class 2606 OID 61460)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3591 (class 2606 OID 61465)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3631 (class 2606 OID 61470)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3604 (class 2606 OID 61475)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3859 (class 0 OID 0)
-- Dependencies: 5
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-07-25 22:42:15

--
-- PostgreSQL database dump complete
--

