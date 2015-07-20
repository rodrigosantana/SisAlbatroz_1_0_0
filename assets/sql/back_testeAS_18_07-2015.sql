--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.0
-- Dumped by pg_dump version 9.4.0
-- Started on 2015-07-18 16:33:00

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 87226)
-- Name: sch01; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sch01;


ALTER SCHEMA sch01 OWNER TO postgres;

SET search_path = sch01, pg_catalog;

--
-- TOC entry 186 (class 1259 OID 87227)
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
-- TOC entry 187 (class 1259 OID 87229)
-- Name: autoriz_pesca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


ALTER TABLE autoriz_pesca OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 87233)
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
-- TOC entry 189 (class 1259 OID 87235)
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
-- TOC entry 3710 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 3711 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 3712 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 3713 (class 0 OID 0)
-- Dependencies: 189
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 190 (class 1259 OID 87239)
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
-- TOC entry 191 (class 1259 OID 87241)
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
-- TOC entry 3714 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 3715 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 3716 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 3717 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 3718 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 3719 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 3720 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 3721 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 3722 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 3723 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 3724 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 3725 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 192 (class 1259 OID 87245)
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
-- TOC entry 193 (class 1259 OID 87247)
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
-- TOC entry 3726 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 3727 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 3728 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 3729 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 3730 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 3731 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 3732 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 3733 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_empresa.municipio; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.municipio IS 'Campo para inserção do nome completo da Cidade e UF onde a Empresa de Pesca está sediada. Utiliza o basilar de Município da Base de Dados do IBGE.';


--
-- TOC entry 194 (class 1259 OID 87251)
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
-- TOC entry 195 (class 1259 OID 87253)
-- Name: cad_entrevistador; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_entrevistador OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 87257)
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
-- TOC entry 197 (class 1259 OID 87259)
-- Name: cad_especie; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_especie (
    id integer DEFAULT nextval('cad_especie_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE cad_especie OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 87263)
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
-- TOC entry 199 (class 1259 OID 87265)
-- Name: cad_financiador; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_financiador (
    id integer DEFAULT nextval('cad_financiador_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


ALTER TABLE cad_financiador OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 87269)
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
-- TOC entry 201 (class 1259 OID 87271)
-- Name: cad_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_isca OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 87275)
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
-- TOC entry 203 (class 1259 OID 87277)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE cad_medida_metigatoria OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 87281)
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
-- TOC entry 205 (class 1259 OID 87283)
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
-- TOC entry 3734 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 3735 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 3736 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 3737 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 3738 (class 0 OID 0)
-- Dependencies: 205
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 206 (class 1259 OID 87287)
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
-- TOC entry 207 (class 1259 OID 87289)
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
-- TOC entry 208 (class 1259 OID 87293)
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
-- TOC entry 209 (class 1259 OID 87295)
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
-- TOC entry 210 (class 1259 OID 87302)
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
-- TOC entry 211 (class 1259 OID 87304)
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
-- TOC entry 212 (class 1259 OID 87308)
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
-- TOC entry 213 (class 1259 OID 87310)
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
-- TOC entry 214 (class 1259 OID 87317)
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
-- TOC entry 215 (class 1259 OID 87319)
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
-- TOC entry 216 (class 1259 OID 87323)
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
-- TOC entry 217 (class 1259 OID 87325)
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
-- TOC entry 218 (class 1259 OID 87332)
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
-- TOC entry 219 (class 1259 OID 87334)
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
-- TOC entry 220 (class 1259 OID 87338)
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
-- TOC entry 221 (class 1259 OID 87340)
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
-- TOC entry 222 (class 1259 OID 87344)
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
-- TOC entry 223 (class 1259 OID 87346)
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
-- TOC entry 224 (class 1259 OID 87353)
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
-- TOC entry 225 (class 1259 OID 87355)
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
-- TOC entry 226 (class 1259 OID 87357)
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
-- TOC entry 227 (class 1259 OID 87361)
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
-- TOC entry 228 (class 1259 OID 87363)
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
-- TOC entry 262 (class 1259 OID 104237)
-- Name: dados_abioticos_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE dados_abioticos_isca (
    id_isca integer NOT NULL,
    id_dados_abioticos integer NOT NULL
);


ALTER TABLE dados_abioticos_isca OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 87370)
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
-- TOC entry 230 (class 1259 OID 87372)
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
-- TOC entry 231 (class 1259 OID 87376)
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
-- TOC entry 232 (class 1259 OID 87378)
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
-- TOC entry 233 (class 1259 OID 87382)
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
-- TOC entry 234 (class 1259 OID 87384)
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
-- TOC entry 3739 (class 0 OID 0)
-- Dependencies: 234
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: sch01; Owner: postgres
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 235 (class 1259 OID 87391)
-- Name: mb_isca; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE mb_isca OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 87394)
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
-- TOC entry 237 (class 1259 OID 87396)
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
-- TOC entry 238 (class 1259 OID 87398)
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
-- TOC entry 239 (class 1259 OID 87405)
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
-- TOC entry 240 (class 1259 OID 87407)
-- Name: mb_mitigatoria; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE mb_mitigatoria OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 87410)
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
-- TOC entry 242 (class 1259 OID 87413)
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
-- TOC entry 243 (class 1259 OID 87419)
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
-- TOC entry 244 (class 1259 OID 87425)
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
-- TOC entry 245 (class 1259 OID 87431)
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
-- TOC entry 246 (class 1259 OID 87433)
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
-- TOC entry 247 (class 1259 OID 87440)
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
-- TOC entry 248 (class 1259 OID 87442)
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
-- TOC entry 249 (class 1259 OID 87446)
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
-- TOC entry 250 (class 1259 OID 87448)
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
-- TOC entry 251 (class 1259 OID 87452)
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
-- TOC entry 252 (class 1259 OID 87454)
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
-- TOC entry 253 (class 1259 OID 87458)
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
-- TOC entry 254 (class 1259 OID 87464)
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
-- TOC entry 3740 (class 0 OID 0)
-- Dependencies: 254
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: postgres
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 255 (class 1259 OID 87466)
-- Name: user_access_map; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


ALTER TABLE user_access_map OWNER TO postgres;

--
-- TOC entry 256 (class 1259 OID 87469)
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
-- TOC entry 257 (class 1259 OID 87474)
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
-- TOC entry 258 (class 1259 OID 87477)
-- Name: user_role; Type: TABLE; Schema: sch01; Owner: postgres; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


ALTER TABLE user_role OWNER TO postgres;

--
-- TOC entry 259 (class 1259 OID 87480)
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
-- TOC entry 3741 (class 0 OID 0)
-- Dependencies: 259
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: postgres
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 260 (class 1259 OID 87482)
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
-- TOC entry 261 (class 1259 OID 87484)
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
-- TOC entry 3367 (class 2604 OID 87488)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 3370 (class 2604 OID 87489)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 3742 (class 0 OID 0)
-- Dependencies: 186
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 3630 (class 0 OID 87229)
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
-- TOC entry 3632 (class 0 OID 87235)
-- Dependencies: 189
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (21, 'sada', 'dasdasd', 'dasd');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (22, 'aaa', 'aa', 'aa');


--
-- TOC entry 3743 (class 0 OID 0)
-- Dependencies: 188
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_aves_seq', 22, true);


--
-- TOC entry 3634 (class 0 OID 87241)
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
-- TOC entry 3744 (class 0 OID 0)
-- Dependencies: 190
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 24, true);


--
-- TOC entry 3636 (class 0 OID 87247)
-- Dependencies: 193
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (15, 'teste2', 'Rua Jorge Tzachel 114, Bloco C apt 304', '', '', '4797444183', 'asantoro@projetoalbatroz.org.br', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (13, 'teste', 'asdfadsfdsfsd', '', '', '', 'andre.santoro@gmail.com', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (12, 'Coqueiros', 'Rua Jorge Tzachel', 'João', 'porteiro', '4797444183', 'andre.santo', 1);
INSERT INTO cad_empresa (id_empresa, nome, endereco, contato, cargo, telefone, email, municipio) VALUES (10, 'Hotel', '36 central park south', 'iasmin', 'estagiaria', '1223423', '', 1);


--
-- TOC entry 3745 (class 0 OID 0)
-- Dependencies: 192
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_empresa_seq', 15, true);


--
-- TOC entry 3638 (class 0 OID 87253)
-- Dependencies: 195
-- Data for Name: cad_entrevistador; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_entrevistador (id, nome) VALUES (1, 'João');
INSERT INTO cad_entrevistador (id, nome) VALUES (2, 'Maria');


--
-- TOC entry 3746 (class 0 OID 0)
-- Dependencies: 194
-- Name: cad_entrevistador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_entrevistador_seq', 2, true);


--
-- TOC entry 3640 (class 0 OID 87259)
-- Dependencies: 197
-- Data for Name: cad_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_especie (id, nome) VALUES (1, 'Peixe espada');
INSERT INTO cad_especie (id, nome) VALUES (2, 'Camarão Branco');


--
-- TOC entry 3747 (class 0 OID 0)
-- Dependencies: 196
-- Name: cad_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_especie_seq', 2, true);


--
-- TOC entry 3642 (class 0 OID 87265)
-- Dependencies: 199
-- Data for Name: cad_financiador; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_financiador (id, nome) VALUES (1, 'Financiador 1');


--
-- TOC entry 3748 (class 0 OID 0)
-- Dependencies: 198
-- Name: cad_financiador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_financiador_seq', 1, true);


--
-- TOC entry 3644 (class 0 OID 87271)
-- Dependencies: 201
-- Data for Name: cad_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_isca (id_isca, nome) VALUES (1, 'Lula');
INSERT INTO cad_isca (id_isca, nome) VALUES (2, 'Cavalinha');
INSERT INTO cad_isca (id_isca, nome) VALUES (3, 'Bonito');
INSERT INTO cad_isca (id_isca, nome) VALUES (4, 'Sardinha');


--
-- TOC entry 3749 (class 0 OID 0)
-- Dependencies: 200
-- Name: cad_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_isca_seq', 4, true);


--
-- TOC entry 3646 (class 0 OID 87277)
-- Dependencies: 203
-- Data for Name: cad_medida_metigatoria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (1, 'Toriline');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (2, 'Largada noturna');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (3, 'Regime de peso');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (4, 'Isca tingida');


--
-- TOC entry 3750 (class 0 OID 0)
-- Dependencies: 202
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_medida_metigatoria_seq', 4, true);


--
-- TOC entry 3648 (class 0 OID 87283)
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
-- TOC entry 3751 (class 0 OID 0)
-- Dependencies: 204
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_mestre_seq', 26, true);


--
-- TOC entry 3752 (class 0 OID 0)
-- Dependencies: 206
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cad_observ_seq', 18, true);


--
-- TOC entry 3650 (class 0 OID 87289)
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
-- TOC entry 3652 (class 0 OID 87295)
-- Dependencies: 209
-- Data for Name: captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (16, 59, NULL, NULL, '0101000020E6100000000000000000F03F0000000000003740', NULL);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (36, 58, 96, NULL, NULL, NULL);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (58, 69, 135, '2015-07-02', '0101000020E6100000696FF085C9743540696FF085C9743540', 69);


--
-- TOC entry 3654 (class 0 OID 87304)
-- Dependencies: 211
-- Data for Name: captura_incidental_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO captura_incidental_especie (id, especie, quantidade, etiqueta, captura_incidental) VALUES (40, 1, NULL, 2, 58);


--
-- TOC entry 3753 (class 0 OID 0)
-- Dependencies: 210
-- Name: captura_incidental_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('captura_incidental_especie_seq', 41, true);


--
-- TOC entry 3754 (class 0 OID 0)
-- Dependencies: 208
-- Name: captura_incidental_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('captura_incidental_seq', 60, true);


--
-- TOC entry 3656 (class 0 OID 87310)
-- Dependencies: 213
-- Data for Name: contagem_ave_boia; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (30, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (50, 58, 96, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (69, 69, 135, '2', '2015-07-02 14:42:00', 21.45, 1500, 1234.00, '0101000020E61000002B8716D9CE0F40402B8716D9CE0F4040');


--
-- TOC entry 3658 (class 0 OID 87319)
-- Dependencies: 215
-- Data for Name: contagem_ave_boia_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (32, 30, 1, 11);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (46, 50, 3, 1);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (78, 69, 1, 5);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (79, 69, 11, 4);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (80, 69, 2, 7);


--
-- TOC entry 3755 (class 0 OID 0)
-- Dependencies: 214
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_ave_boia_especie_seq', 82, true);


--
-- TOC entry 3756 (class 0 OID 0)
-- Dependencies: 212
-- Name: contagem_ave_boia_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_ave_boia_seq', 73, true);


--
-- TOC entry 3660 (class 0 OID 87325)
-- Dependencies: 217
-- Data for Name: contagem_por_sol; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (27, 59, '3233-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (57, 58, '2015-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (90, 69, '2015-07-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3662 (class 0 OID 87334)
-- Dependencies: 219
-- Data for Name: contagem_por_sol_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3757 (class 0 OID 0)
-- Dependencies: 218
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_especie_seq', 33, true);


--
-- TOC entry 3664 (class 0 OID 87340)
-- Dependencies: 221
-- Data for Name: contagem_por_sol_indice; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO contagem_por_sol_indice (id, contagem_por_sol, indice, hora, total) VALUES (33, 90, 2, NULL, NULL);


--
-- TOC entry 3758 (class 0 OID 0)
-- Dependencies: 220
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_indice_seq', 34, true);


--
-- TOC entry 3759 (class 0 OID 0)
-- Dependencies: 216
-- Name: contagem_por_sol_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('contagem_por_sol_seq', 93, true);


--
-- TOC entry 3666 (class 0 OID 87346)
-- Dependencies: 223
-- Data for Name: cruzeiro; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (59, 2, 9, 23, NULL, NULL, '1988-11-11', '1988-11-11', NULL, 1, '2015-05-09 00:23:53', NULL, NULL);
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (58, 2, 8, 20, NULL, NULL, '2015-04-01', '2015-04-30', NULL, 1, '2015-04-30 02:35:14', 1, '2015-06-04 18:41:23');
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (69, 2, 9, 25, 13, 1, '2015-07-01', '2015-07-31', '2', 1, '2015-07-15 15:54:03', 1, '2015-07-15 19:19:00');
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (70, 8, 7, 24, 12, 1, '2015-07-01', '2015-07-31', 'nada a declarar', 1, '2015-07-15 21:31:09', 1, '2015-07-15 21:50:38');


--
-- TOC entry 3760 (class 0 OID 0)
-- Dependencies: 224
-- Name: cruzeiro_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cruzeiro_lance_seq', 1, false);


--
-- TOC entry 3761 (class 0 OID 0)
-- Dependencies: 222
-- Name: cruzeiro_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('cruzeiro_seq', 70, true);


--
-- TOC entry 3669 (class 0 OID 87357)
-- Dependencies: 226
-- Data for Name: dados_abioticos; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (25, 59, 1, NULL, NULL, true, NULL, 22, 23);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (96, 58, 2, NULL, true, NULL, NULL, 164, 165);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (135, 69, 1, NULL, NULL, NULL, NULL, 242, 243);
INSERT INTO dados_abioticos (id, cruzeiro, lance, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (142, 70, 1, 2342, NULL, true, true, 256, 257);


--
-- TOC entry 3671 (class 0 OID 87363)
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
-- TOC entry 3762 (class 0 OID 0)
-- Dependencies: 227
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('dados_abioticos_complementar_seq', 257, true);


--
-- TOC entry 3705 (class 0 OID 104237)
-- Dependencies: 262
-- Data for Name: dados_abioticos_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO dados_abioticos_isca (id_isca, id_dados_abioticos) VALUES (2, 142);
INSERT INTO dados_abioticos_isca (id_isca, id_dados_abioticos) VALUES (1, 142);


--
-- TOC entry 3763 (class 0 OID 0)
-- Dependencies: 225
-- Name: dados_abioticos_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('dados_abioticos_seq', 142, true);


--
-- TOC entry 3673 (class 0 OID 87372)
-- Dependencies: 230
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
-- TOC entry 3764 (class 0 OID 0)
-- Dependencies: 229
-- Name: especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('especie_seq', 12, true);


--
-- TOC entry 3675 (class 0 OID 87378)
-- Dependencies: 232
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (81, 124, 1, 4);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (82, 125, 2, 1);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (85, 133, 1, 4);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (86, 133, 1, 2);


--
-- TOC entry 3765 (class 0 OID 0)
-- Dependencies: 231
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_captura_seq', 86, true);


--
-- TOC entry 3677 (class 0 OID 87384)
-- Dependencies: 234
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
-- TOC entry 3766 (class 0 OID 0)
-- Dependencies: 233
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_geral_seq', 81, true);


--
-- TOC entry 3678 (class 0 OID 87391)
-- Dependencies: 235
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_isca (id_isca, id_lance) VALUES (1, 132);
INSERT INTO mb_isca (id_isca, id_lance) VALUES (2, 133);


--
-- TOC entry 3767 (class 0 OID 0)
-- Dependencies: 236
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 3681 (class 0 OID 87398)
-- Dependencies: 238
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
-- TOC entry 3768 (class 0 OID 0)
-- Dependencies: 237
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_lance_seq', 135, true);


--
-- TOC entry 3769 (class 0 OID 0)
-- Dependencies: 239
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 3683 (class 0 OID 87407)
-- Dependencies: 240
-- Data for Name: mb_mitigatoria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (1, 132);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (3, 133);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (1, 133);


--
-- TOC entry 3684 (class 0 OID 87410)
-- Dependencies: 241
-- Data for Name: mc_biometria; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_biometria (id, peso, comprimento, culmem, narina_culmem, altura_bico_base, altura_minima_bico, altura_bico_unguis, largura_bico_base, comprimento_cabeca, comprimento_asa, comprimento_cauda, comprimento_tarso, comprimento_dedo_sem_unha, comprimento_dedo_com_unha, envergadura, muda_asa, muda_cauda, muda_cabeca, muda_dorso, muda_ventre) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3685 (class 0 OID 87413)
-- Dependencies: 242
-- Data for Name: mc_captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_captura_incidental (mc_id, informacao, cruzeiro, lance, observador, mestre, embarcacao, historico, descricao_local_coleta) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3686 (class 0 OID 87419)
-- Dependencies: 243
-- Data for Name: mc_coleta_material_biologico; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_coleta_material_biologico (id, data_necropsia, local_necropsia, condicao_carcaca, autolise, sexagem, empetrolamento, condicao_corporal, piolho, carrapato, pulga, lepadomorpha, larvas_putrefacao, outros, outros_descricao, nematoides, acantocefalos, cestoides, trematoides, amt_encefalo, amt_medula_ossea, amt_musculo, amt_figado, amt_pulmao, amt_baco, amt_gordura, htp_pele, htp_lingua, htp_esofago, htp_ingluvio, htp_tireoide, htp_paratireoide, htp_siringe, htp_traqueia, htp_pulmao, htp_coracao, htp_proventriculo, htp_ventriculo, htp_figado, htp_vesicula_biliar, htp_baco, htp_duodeno, htp_jejuno, htp_ileo_ceco_colon, htp_pancreas, htp_cloaca, htp_rim, htp_adrenais, htp_ureter, htp_gonada, htp_bexiga, htp_oviduto, htp_bursa, htp_grandes_vasos, htp_saco_aereo, htp_timo, htp_musculo_esqueletico, htp_medula_ossea, htp_olho, htp_gld_sal, htp_encefalo, htp_cerebelo, htp_osso) VALUES (62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a:3:{i:0;s:14:"papel_aluminio";i:1;s:15:"papel_eppendorf";i:2;s:9:"alcool_70";}', 'a:2:{i:0;s:14:"papel_aluminio";i:1;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', 'a:1:{i:0;s:14:"papel_aluminio";}', 'a:1:{i:0;s:15:"papel_eppendorf";}', true, false, NULL, true, false, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3687 (class 0 OID 87425)
-- Dependencies: 244
-- Data for Name: mc_outras_pesquisas; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO mc_outras_pesquisas (id, swab_cloaca, swab_coana, conteudo_estomacal, sangue_cardiaco, penas, outros, observacoes) VALUES (62, NULL, NULL, NULL, NULL, 'N;', NULL, NULL);


--
-- TOC entry 3689 (class 0 OID 87433)
-- Dependencies: 246
-- Data for Name: medicina_conservacao; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO medicina_conservacao (id, etiqueta, etiqueta_antiga, especie, responsavel, data_entrada, data_captura, coordenada, anilha, plumagem, procedencia, procedencia_outros, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (62, '123456', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-07-14 14:46:32', NULL, NULL);


--
-- TOC entry 3770 (class 0 OID 0)
-- Dependencies: 245
-- Name: medicina_conservacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('medicina_conservacao_seq', 62, true);


--
-- TOC entry 3691 (class 0 OID 87442)
-- Dependencies: 248
-- Data for Name: municipio; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO municipio (id, nome, uf, codigo_ibge) VALUES (1, 'Itajaí', 'SC', NULL);
INSERT INTO municipio (id, nome, uf, codigo_ibge) VALUES (2, 'Rio Grande', 'RS', NULL);


--
-- TOC entry 3771 (class 0 OID 0)
-- Dependencies: 247
-- Name: municipio_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('municipio_seq', 2, true);


--
-- TOC entry 3693 (class 0 OID 87448)
-- Dependencies: 250
-- Data for Name: producao_pesqueira; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (70, 59, NULL, NULL);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (74, 58, 96, NULL);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, boia_radio) VALUES (81, 69, 135, 69);


--
-- TOC entry 3695 (class 0 OID 87454)
-- Dependencies: 252
-- Data for Name: producao_pesqueira_especie; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (70, 70, 1, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (73, 74, 4, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (74, 74, 5, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (87, 81, 10, 10, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (88, 81, 12, 50, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (89, 81, 12, 5, 'orca');


--
-- TOC entry 3772 (class 0 OID 0)
-- Dependencies: 251
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('producao_pesqueira_especie_seq', 90, true);


--
-- TOC entry 3773 (class 0 OID 0)
-- Dependencies: 249
-- Name: producao_pesqueira_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('producao_pesqueira_seq', 82, true);


--
-- TOC entry 3696 (class 0 OID 87458)
-- Dependencies: 253
-- Data for Name: system_users; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (2, 'tiagozis@gmail.com', 'e83930dca43b04125bac395678ed61d0d3db1e03', '5515f69aa86390.99105598', 1, '2015-03-28 01:34:18', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Tiago Zis', '2');
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (213, 'digitador@email.com', 'b67a3c28932ba86d3da9f34568bce4233e3b344a', '5570eb35a48af0.06984395', 10, '2015-06-09 01:10:54', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Zé digitador', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (211, 'teste@teste.com', 'a78471bd4d93a49b2ba0713a61a19d5b633b9405', '55928c872cf510.45442147', 10, '2015-06-13 21:56:34', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Teste', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (214, 'ibegnini@projetoalbatroz.org.br', 'c58d818ce2ddf11ae3dd77edeb445dcc8ef3222e', '55928d984b1ff0.26466267', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Iasmin Begnini', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2015-07-17 21:14:24', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Admin', '2');


--
-- TOC entry 3774 (class 0 OID 0)
-- Dependencies: 254
-- Name: system_users_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('system_users_id_seq', 214, true);


--
-- TOC entry 3698 (class 0 OID 87466)
-- Dependencies: 255
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


--
-- TOC entry 3699 (class 0 OID 87469)
-- Dependencies: 256
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3700 (class 0 OID 87474)
-- Dependencies: 257
-- Data for Name: user_meta; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3701 (class 0 OID 87477)
-- Dependencies: 258
-- Data for Name: user_role; Type: TABLE DATA; Schema: sch01; Owner: postgres
--

INSERT INTO user_role (id, role_name, default_access) VALUES (1, 'Admin', '11111');
INSERT INTO user_role (id, role_name, default_access) VALUES (10, 'Digitador', '11111');


--
-- TOC entry 3775 (class 0 OID 0)
-- Dependencies: 259
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('user_role_id_seq', 11, true);


--
-- TOC entry 3704 (class 0 OID 87484)
-- Dependencies: 261
-- Data for Name: users; Type: TABLE DATA; Schema: sch01; Owner: postgres
--



--
-- TOC entry 3776 (class 0 OID 0)
-- Dependencies: 260
-- Name: users_seq; Type: SEQUENCE SET; Schema: sch01; Owner: postgres
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 3373 (class 2606 OID 87491)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 3375 (class 2606 OID 87493)
-- Name: pk_aves; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 3427 (class 2606 OID 87495)
-- Name: pk_biometria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT pk_biometria PRIMARY KEY (id);


--
-- TOC entry 3383 (class 2606 OID 87497)
-- Name: pk_cad_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_especie
    ADD CONSTRAINT pk_cad_especie PRIMARY KEY (id);


--
-- TOC entry 3385 (class 2606 OID 87499)
-- Name: pk_cad_financiador; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_financiador
    ADD CONSTRAINT pk_cad_financiador PRIMARY KEY (id);


--
-- TOC entry 3387 (class 2606 OID 87501)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 3417 (class 2606 OID 87503)
-- Name: pk_capt; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 3395 (class 2606 OID 87505)
-- Name: pk_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT pk_captura_incidental PRIMARY KEY (id);


--
-- TOC entry 3397 (class 2606 OID 87507)
-- Name: pk_captura_incidental_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT pk_captura_incidental_especie PRIMARY KEY (id);


--
-- TOC entry 3431 (class 2606 OID 87509)
-- Name: pk_coleta_material_biologico; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT pk_coleta_material_biologico PRIMARY KEY (id);


--
-- TOC entry 3399 (class 2606 OID 87511)
-- Name: pk_contagem_ave_boia; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT pk_contagem_ave_boia PRIMARY KEY (id);


--
-- TOC entry 3401 (class 2606 OID 87513)
-- Name: pk_contagem_ave_boia_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT pk_contagem_ave_boia_especie PRIMARY KEY (id);


--
-- TOC entry 3403 (class 2606 OID 87515)
-- Name: pk_contagem_por_sol; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT pk_contagem_por_sol PRIMARY KEY (id);


--
-- TOC entry 3405 (class 2606 OID 87517)
-- Name: pk_contagem_por_sol_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT pk_contagem_por_sol_especie PRIMARY KEY (id);


--
-- TOC entry 3407 (class 2606 OID 87519)
-- Name: pk_contagem_por_sol_indice; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT pk_contagem_por_sol_indice PRIMARY KEY (id);


--
-- TOC entry 3409 (class 2606 OID 87521)
-- Name: pk_cruzeiro; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT pk_cruzeiro PRIMARY KEY (id);


--
-- TOC entry 3411 (class 2606 OID 87523)
-- Name: pk_dados_abioticos; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT pk_dados_abioticos PRIMARY KEY (id);


--
-- TOC entry 3413 (class 2606 OID 87525)
-- Name: pk_dados_abioticos_complementar; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos_complementar
    ADD CONSTRAINT pk_dados_abioticos_complementar PRIMARY KEY (id);


--
-- TOC entry 3455 (class 2606 OID 104241)
-- Name: pk_dados_abioticos_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT pk_dados_abioticos_isca PRIMARY KEY (id_isca, id_dados_abioticos);


--
-- TOC entry 3377 (class 2606 OID 87527)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 3379 (class 2606 OID 87529)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 3381 (class 2606 OID 87531)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 3415 (class 2606 OID 87533)
-- Name: pk_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY especie
    ADD CONSTRAINT pk_especie PRIMARY KEY (id);


--
-- TOC entry 3423 (class 2606 OID 87535)
-- Name: pk_lance; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 3419 (class 2606 OID 87537)
-- Name: pk_mb; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 3421 (class 2606 OID 87539)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 3425 (class 2606 OID 87541)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 3429 (class 2606 OID 87543)
-- Name: pk_mc_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT pk_mc_captura_incidental PRIMARY KEY (mc_id);


--
-- TOC entry 3435 (class 2606 OID 87545)
-- Name: pk_medicina_conservacao; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT pk_medicina_conservacao PRIMARY KEY (id);


--
-- TOC entry 3389 (class 2606 OID 87547)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 3391 (class 2606 OID 87549)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 3437 (class 2606 OID 87551)
-- Name: pk_municipio; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (id);


--
-- TOC entry 3393 (class 2606 OID 87553)
-- Name: pk_observ; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 3433 (class 2606 OID 87555)
-- Name: pk_outras_pesquisas; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT pk_outras_pesquisas PRIMARY KEY (id);


--
-- TOC entry 3439 (class 2606 OID 87557)
-- Name: pk_producao_pesqueira; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT pk_producao_pesqueira PRIMARY KEY (id);


--
-- TOC entry 3441 (class 2606 OID 87559)
-- Name: pk_producao_pesqueira_especie; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT pk_producao_pesqueira_especie PRIMARY KEY (id);


--
-- TOC entry 3443 (class 2606 OID 87561)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 3445 (class 2606 OID 87563)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 3447 (class 2606 OID 87565)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 3449 (class 2606 OID 87567)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 3451 (class 2606 OID 87569)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 3453 (class 2606 OID 87571)
-- Name: pk_users; Type: CONSTRAINT; Schema: sch01; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 3505 (class 2606 OID 87572)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3457 (class 2606 OID 87577)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3460 (class 2606 OID 87582)
-- Name: fk_captura_incidental; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_captura_incidental FOREIGN KEY (captura_incidental) REFERENCES captura_incidental(id);


--
-- TOC entry 3464 (class 2606 OID 87587)
-- Name: fk_contagem_ave_boia; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_contagem_ave_boia FOREIGN KEY (contagem_ave_boia) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3470 (class 2606 OID 87592)
-- Name: fk_contagem_por_sol; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT fk_contagem_por_sol FOREIGN KEY (contagem_por_sol) REFERENCES contagem_por_sol(id);


--
-- TOC entry 3468 (class 2606 OID 87597)
-- Name: fk_contagem_psi; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_contagem_psi FOREIGN KEY (contagem_psi) REFERENCES contagem_por_sol_indice(id);


--
-- TOC entry 3478 (class 2606 OID 87602)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3466 (class 2606 OID 87607)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3458 (class 2606 OID 87612)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3462 (class 2606 OID 87617)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3506 (class 2606 OID 87622)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3494 (class 2606 OID 87627)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3479 (class 2606 OID 87632)
-- Name: fk_dado_lancamento; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_lancamento FOREIGN KEY (dado_lancamento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3480 (class 2606 OID 87637)
-- Name: fk_dado_recolhimento; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_recolhimento FOREIGN KEY (dado_recolhimento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3511 (class 2606 OID 104242)
-- Name: fk_dados_abioticos_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3512 (class 2606 OID 104247)
-- Name: fk_dados_abioticos_isca_dados_abioticos; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_dados_abioticos FOREIGN KEY (id_dados_abioticos) REFERENCES dados_abioticos(id);


--
-- TOC entry 3483 (class 2606 OID 87642)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3471 (class 2606 OID 87647)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3495 (class 2606 OID 87652)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3472 (class 2606 OID 87657)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3484 (class 2606 OID 87662)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES system_users(id);


--
-- TOC entry 3461 (class 2606 OID 87667)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3465 (class 2606 OID 87672)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3469 (class 2606 OID 87677)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3508 (class 2606 OID 87682)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3481 (class 2606 OID 87687)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_especie FOREIGN KEY (id_ave) REFERENCES especie(id);


--
-- TOC entry 3502 (class 2606 OID 87692)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3473 (class 2606 OID 87697)
-- Name: fk_financiador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_financiador FOREIGN KEY (financiador) REFERENCES cad_financiador(id);


--
-- TOC entry 3459 (class 2606 OID 87707)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3467 (class 2606 OID 87712)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3463 (class 2606 OID 87717)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3507 (class 2606 OID 87722)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3496 (class 2606 OID 87727)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3490 (class 2606 OID 87732)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 3488 (class 2606 OID 87737)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3489 (class 2606 OID 87742)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3482 (class 2606 OID 87747)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3491 (class 2606 OID 87752)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 3492 (class 2606 OID 87757)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3497 (class 2606 OID 87762)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (mc_id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3493 (class 2606 OID 87767)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3500 (class 2606 OID 87772)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3501 (class 2606 OID 87777)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3485 (class 2606 OID 87782)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3474 (class 2606 OID 87787)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3498 (class 2606 OID 87792)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3456 (class 2606 OID 87797)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES municipio(id);


--
-- TOC entry 3475 (class 2606 OID 87802)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3499 (class 2606 OID 87807)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3509 (class 2606 OID 87812)
-- Name: fk_producao_pesqueira; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_producao_pesqueira FOREIGN KEY (producao_pesqueira) REFERENCES producao_pesqueira(id);


--
-- TOC entry 3510 (class 2606 OID 87817)
-- Name: fk_user_role; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT fk_user_role FOREIGN KEY (user_role_id) REFERENCES user_role(id);


--
-- TOC entry 3486 (class 2606 OID 87822)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3476 (class 2606 OID 87827)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3503 (class 2606 OID 87832)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3487 (class 2606 OID 87837)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3477 (class 2606 OID 87842)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3504 (class 2606 OID 87847)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: postgres
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


-- Completed on 2015-07-18 16:33:01

--
-- PostgreSQL database dump complete
--

