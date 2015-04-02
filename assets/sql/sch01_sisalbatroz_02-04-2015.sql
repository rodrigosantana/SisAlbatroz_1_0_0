--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-04-02 08:05:12

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 10 (class 2615 OID 27581)
-- Name: sch01; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA sch01;


SET search_path = sch01, pg_catalog;

--
-- TOC entry 246 (class 1259 OID 27582)
-- Name: auto_pesca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE auto_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 247 (class 1259 OID 27584)
-- Name: autoriz_pesca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


--
-- TOC entry 248 (class 1259 OID 27588)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 249 (class 1259 OID 27590)
-- Name: cad_aves; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_aves (
    id_aves integer DEFAULT nextval('cad_aves_seq'::regclass) NOT NULL,
    nome_comum_br character varying(50) NOT NULL,
    nome_cientifico character varying(50) NOT NULL,
    nome_comum_en character varying(50) NOT NULL
);


--
-- TOC entry 3740 (class 0 OID 0)
-- Dependencies: 249
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 3741 (class 0 OID 0)
-- Dependencies: 249
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 3742 (class 0 OID 0)
-- Dependencies: 249
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 3743 (class 0 OID 0)
-- Dependencies: 249
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 250 (class 1259 OID 27594)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 251 (class 1259 OID 27596)
-- Name: cad_embarcacao; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 3744 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 3745 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 3746 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 3747 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 3748 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 3749 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 3750 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 3751 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 3752 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 3753 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 3754 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 3755 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 3756 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.municipio; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.municipio IS 'Campo para inserção do nome do município em que a Embarcação da Pesca esta vinculada.';


--
-- TOC entry 3757 (class 0 OID 0)
-- Dependencies: 251
-- Name: COLUMN cad_embarcacao.uf; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.uf IS 'Campo para inserção da Unidade da Federação em que a Embarcação de Pesca está vinculada.';


--
-- TOC entry 252 (class 1259 OID 27600)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 253 (class 1259 OID 27602)
-- Name: cad_empresa; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 3758 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 3759 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 3760 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.cidade; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.cidade IS 'Campo para inserção do nome completo da Cidade onde a Empresa de Pesca está sediada.';


--
-- TOC entry 3761 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 3762 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 3763 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 3764 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 3765 (class 0 OID 0)
-- Dependencies: 253
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 254 (class 1259 OID 27606)
-- Name: cad_entrevistador_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_entrevistador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 255 (class 1259 OID 27608)
-- Name: cad_entrevistador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 256 (class 1259 OID 27612)
-- Name: cad_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 257 (class 1259 OID 27614)
-- Name: cad_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 258 (class 1259 OID 27618)
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_medida_metigatoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 259 (class 1259 OID 27620)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 260 (class 1259 OID 27624)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 261 (class 1259 OID 27626)
-- Name: cad_mestre; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_mestre (
    id_mestre integer DEFAULT nextval('cad_mestre_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    apelido character varying(20),
    telefone character varying(11),
    email character varying(100)
);


--
-- TOC entry 3766 (class 0 OID 0)
-- Dependencies: 261
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 3767 (class 0 OID 0)
-- Dependencies: 261
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 3768 (class 0 OID 0)
-- Dependencies: 261
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 3769 (class 0 OID 0)
-- Dependencies: 261
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 3770 (class 0 OID 0)
-- Dependencies: 261
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 262 (class 1259 OID 27630)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 263 (class 1259 OID 27632)
-- Name: cad_observador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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
    cidade character varying(50) NOT NULL,
    uf character varying(3) NOT NULL
);


--
-- TOC entry 264 (class 1259 OID 27636)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 265 (class 1259 OID 27638)
-- Name: mb_captura; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    id_ave integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 266 (class 1259 OID 27642)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 267 (class 1259 OID 27644)
-- Name: mb_geral; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_geral (
    id_mb integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
    embarcacao integer NOT NULL,
    mestre integer NOT NULL,
    data_saida date,
    data_chegada date,
    observacao character varying(500),
    entrevistador integer,
    petrecho smallint NOT NULL
);


--
-- TOC entry 3771 (class 0 OID 0)
-- Dependencies: 267
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 268 (class 1259 OID 27651)
-- Name: mb_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 269 (class 1259 OID 27654)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 270 (class 1259 OID 27656)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 271 (class 1259 OID 27658)
-- Name: mb_lance; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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
    coordenada public.geometry
);


--
-- TOC entry 272 (class 1259 OID 27662)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 273 (class 1259 OID 27664)
-- Name: mb_mitigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 274 (class 1259 OID 27667)
-- Name: system_users; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 275 (class 1259 OID 27673)
-- Name: system_users_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE system_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3772 (class 0 OID 0)
-- Dependencies: 275
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 276 (class 1259 OID 27675)
-- Name: user_access_map; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


--
-- TOC entry 277 (class 1259 OID 27678)
-- Name: user_autologin; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone DEFAULT now() NOT NULL
);


--
-- TOC entry 278 (class 1259 OID 27683)
-- Name: user_meta; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_meta (
    user_id bigint NOT NULL,
    first_name character varying(100),
    last_name character varying(100),
    phone character varying(100)
);


--
-- TOC entry 279 (class 1259 OID 27686)
-- Name: user_role; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


--
-- TOC entry 280 (class 1259 OID 27689)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3773 (class 0 OID 0)
-- Dependencies: 280
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 281 (class 1259 OID 27691)
-- Name: users_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 282 (class 1259 OID 27693)
-- Name: users; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE users (
    id_users integer DEFAULT nextval('users_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    base character varying(30) NOT NULL,
    email character varying(100) NOT NULL,
    skype character varying(50) NOT NULL,
    senha character varying(50) NOT NULL
);


--
-- TOC entry 3530 (class 2604 OID 27697)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 3533 (class 2604 OID 27698)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 3774 (class 0 OID 0)
-- Dependencies: 246
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 3700 (class 0 OID 27584)
-- Dependencies: 247
-- Data for Name: autoriz_pesca; Type: TABLE DATA; Schema: sch01; Owner: -
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
-- TOC entry 3702 (class 0 OID 27590)
-- Dependencies: 249
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (21, 'sada', 'dasdasd', 'dasd');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (22, 'aaa', 'aa', 'aa');


--
-- TOC entry 3775 (class 0 OID 0)
-- Dependencies: 248
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_aves_seq', 22, true);


--
-- TOC entry 3704 (class 0 OID 27596)
-- Dependencies: 251
-- Data for Name: cad_embarcacao; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (4, 'Marbella I', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (5, 'Yamaia II', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (7, 'Kopesca IV', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (9, 'Elias Safe', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (6, 'Floripa SL 3', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (8, 'Ana Amaral', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');


--
-- TOC entry 3776 (class 0 OID 0)
-- Dependencies: 250
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 13, true);


--
-- TOC entry 3706 (class 0 OID 27602)
-- Dependencies: 253
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_empresa (id_empresa, nome, cidade, endereco, contato, cargo, telefone, email) VALUES (10, 'Hotel', 'New York', '36 central park south', 'iasmin', 'estagiaria', '1223423', '');


--
-- TOC entry 3777 (class 0 OID 0)
-- Dependencies: 252
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_empresa_seq', 10, true);


--
-- TOC entry 3708 (class 0 OID 27608)
-- Dependencies: 255
-- Data for Name: cad_entrevistador; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_entrevistador (id, nome) VALUES (1, 'João');
INSERT INTO cad_entrevistador (id, nome) VALUES (2, 'Maria');


--
-- TOC entry 3778 (class 0 OID 0)
-- Dependencies: 254
-- Name: cad_entrevistador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_entrevistador_seq', 2, true);


--
-- TOC entry 3710 (class 0 OID 27614)
-- Dependencies: 257
-- Data for Name: cad_isca; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_isca (id_isca, nome) VALUES (1, 'Lula');
INSERT INTO cad_isca (id_isca, nome) VALUES (2, 'Cavalinha');
INSERT INTO cad_isca (id_isca, nome) VALUES (3, 'Bonito');
INSERT INTO cad_isca (id_isca, nome) VALUES (4, 'Sardinha');


--
-- TOC entry 3779 (class 0 OID 0)
-- Dependencies: 256
-- Name: cad_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_isca_seq', 4, true);


--
-- TOC entry 3712 (class 0 OID 27620)
-- Dependencies: 259
-- Data for Name: cad_medida_metigatoria; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (1, 'Toriline');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (2, 'Largada noturna');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (3, 'Regime de peso');


--
-- TOC entry 3780 (class 0 OID 0)
-- Dependencies: 258
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_medida_metigatoria_seq', 3, true);


--
-- TOC entry 3714 (class 0 OID 27626)
-- Dependencies: 261
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (20, 'Andre', 'Kbçudo', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (21, 'Iasmin', 'Iaia', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (22, 'Rodrigo', 'Yano', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (23, 'Eduardo', 'Dudu', '123412', 'andre.santoro@gmail.com');


--
-- TOC entry 3781 (class 0 OID 0)
-- Dependencies: 260
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_mestre_seq', 23, true);


--
-- TOC entry 3782 (class 0 OID 0)
-- Dependencies: 262
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_observ_seq', 10, true);


--
-- TOC entry 3716 (class 0 OID 27632)
-- Dependencies: 263
-- Data for Name: cad_observador; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (2, 'André A Santoro', '', '', 'asantoro@projetoalbatroz.org.br', '', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 'Itajai', '');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (6, 'Rodrigo', '123412', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '36 central park south', 'Itajai', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (7, 'Iasmin', '12341212', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '10440 Deerwood Dr.
Apartament 833', 'Itajai', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (8, 'fdsafasd', '12213', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (9, 'fdsafasd', '122133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (10, 'fdsafasd', '1223133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (1, 'asdasd', '1231', '231231', 'dasda', 'dasd', 'dasd', 'dasd', 'das', 'a');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (3, 'dasd', 'das', 'das', 'das', 'das', 'asd', 'das', 'asd', 'asd');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (4, 'dasdas', 'dsa', 'das', 'das', 'ads', 'asd', 'asd', 'asd', 'da');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (5, 'da', 'asd', 'ads', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');


--
-- TOC entry 3718 (class 0 OID 27638)
-- Dependencies: 265
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (43, 71, 1, 3);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (44, 72, 3, 6);


--
-- TOC entry 3783 (class 0 OID 0)
-- Dependencies: 264
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_captura_seq', 44, true);


--
-- TOC entry 3720 (class 0 OID 27644)
-- Dependencies: 267
-- Data for Name: mb_geral; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho) VALUES (60, 8, 23, '2015-03-01', '2015-03-07', 'aa', 1, 1);


--
-- TOC entry 3784 (class 0 OID 0)
-- Dependencies: 266
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_geral_seq', 61, true);


--
-- TOC entry 3721 (class 0 OID 27651)
-- Dependencies: 268
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_isca (id_isca, id_lance) VALUES (3, 71);
INSERT INTO mb_isca (id_isca, id_lance) VALUES (4, 72);


--
-- TOC entry 3785 (class 0 OID 0)
-- Dependencies: 269
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 3724 (class 0 OID 27658)
-- Dependencies: 271
-- Data for Name: mb_lance; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (71, 1, '2015-03-02', 1000, 'TOTAL', 60, true, '04:35:00', '03:35:00', '0101000020E61000000000000000804B400000000000804040');
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (72, 2, '2015-03-02', 2000, 'PARCIAL', 60, false, NULL, NULL, NULL);


--
-- TOC entry 3786 (class 0 OID 0)
-- Dependencies: 270
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_lance_seq', 72, true);


--
-- TOC entry 3787 (class 0 OID 0)
-- Dependencies: 272
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 3726 (class 0 OID 27664)
-- Dependencies: 273
-- Data for Name: mb_mitigatoria; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 71);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 72);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (3, 72);


--
-- TOC entry 3727 (class 0 OID 27667)
-- Dependencies: 274
-- Data for Name: system_users; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (2, 'tiagozis@gmail.com', 'e83930dca43b04125bac395678ed61d0d3db1e03', '5515f69aa86390.99105598', 1, '2015-03-28 01:34:18', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Tiago Zis', '2');
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2015-04-02 12:56:12', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Admin', '2');


--
-- TOC entry 3788 (class 0 OID 0)
-- Dependencies: 275
-- Name: system_users_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('system_users_id_seq', 210, true);


--
-- TOC entry 3729 (class 0 OID 27675)
-- Dependencies: 276
-- Data for Name: user_access_map; Type: TABLE DATA; Schema: sch01; Owner: -
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


--
-- TOC entry 3730 (class 0 OID 27678)
-- Dependencies: 277
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3731 (class 0 OID 27683)
-- Dependencies: 278
-- Data for Name: user_meta; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3732 (class 0 OID 27686)
-- Dependencies: 279
-- Data for Name: user_role; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO user_role (id, role_name, default_access) VALUES (1, 'Admin', '11111');


--
-- TOC entry 3789 (class 0 OID 0)
-- Dependencies: 280
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('user_role_id_seq', 1, false);


--
-- TOC entry 3735 (class 0 OID 27693)
-- Dependencies: 282
-- Data for Name: users; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO users (id_users, nome, base, email, skype, senha) VALUES (1, 'andre', '', '', '', 'oceano');


--
-- TOC entry 3790 (class 0 OID 0)
-- Dependencies: 281
-- Name: users_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 3536 (class 2606 OID 27700)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 3538 (class 2606 OID 27702)
-- Name: pk_aves; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 3546 (class 2606 OID 27704)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 3554 (class 2606 OID 27706)
-- Name: pk_capt; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 3540 (class 2606 OID 27708)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 3542 (class 2606 OID 27710)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 3544 (class 2606 OID 27712)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 3560 (class 2606 OID 27714)
-- Name: pk_lance; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 3556 (class 2606 OID 27716)
-- Name: pk_mb; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 3558 (class 2606 OID 27718)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 3562 (class 2606 OID 27720)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 3548 (class 2606 OID 27722)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 3550 (class 2606 OID 27724)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 3552 (class 2606 OID 27726)
-- Name: pk_observ; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 3564 (class 2606 OID 27728)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 3566 (class 2606 OID 27730)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 3568 (class 2606 OID 27732)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 3570 (class 2606 OID 27734)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 3572 (class 2606 OID 27736)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 3574 (class 2606 OID 27738)
-- Name: pk_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 3576 (class 2606 OID 27739)
-- Name: fk_cad_ave; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_cad_ave FOREIGN KEY (id_ave) REFERENCES cad_aves(id_aves);


--
-- TOC entry 3579 (class 2606 OID 27744)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3578 (class 2606 OID 27749)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES cad_entrevistador(id);


--
-- TOC entry 3582 (class 2606 OID 27754)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 3581 (class 2606 OID 27759)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3580 (class 2606 OID 27764)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3575 (class 2606 OID 27769)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3584 (class 2606 OID 27774)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 3583 (class 2606 OID 27779)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3577 (class 2606 OID 27784)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


-- Completed on 2015-04-02 08:05:13

--
-- PostgreSQL database dump complete
--

