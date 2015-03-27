--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-03-26 23:15:29

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2149 (class 1262 OID 24958)
-- Dependencies: 2148
-- Name: SisMBAlbatroz; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "SisMBAlbatroz" IS 'Banco de dados primários para armazenamento de informações provenientes de Mapas de Bordo coletados pelo Projeto Albatroz.';


--
-- TOC entry 207 (class 3079 OID 11750)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 207
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 170 (class 1259 OID 25257)
-- Name: auto_pesca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE auto_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.auto_pesca_seq OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 171 (class 1259 OID 25259)
-- Name: autoriz_pesca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


ALTER TABLE public.autoriz_pesca OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 25263)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_aves_seq OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 25265)
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
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 174 (class 1259 OID 25269)
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
-- TOC entry 175 (class 1259 OID 25271)
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
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.municipio IS 'Campo para inserção do nome do município em que a Embarcação da Pesca esta vinculada.';


--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.uf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.uf IS 'Campo para inserção da Unidade da Federação em que a Embarcação de Pesca está vinculada.';


--
-- TOC entry 176 (class 1259 OID 25275)
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
-- TOC entry 177 (class 1259 OID 25277)
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
-- TOC entry 2170 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 2171 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 2172 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.cidade; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cidade IS 'Campo para inserção do nome completo da Cidade onde a Empresa de Pesca está sediada.';


--
-- TOC entry 2173 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 2174 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 2175 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 2176 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 2177 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 178 (class 1259 OID 25281)
-- Name: cad_entrevistador_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_entrevistador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_entrevistador_seq OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 25283)
-- Name: cad_entrevistador; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.cad_entrevistador OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 25287)
-- Name: cad_isca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_isca_seq OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 25289)
-- Name: cad_isca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.cad_isca OWNER TO postgres;

--
-- TOC entry 182 (class 1259 OID 25293)
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_medida_metigatoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_medida_metigatoria_seq OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 25295)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


ALTER TABLE public.cad_medida_metigatoria OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 25299)
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
-- TOC entry 185 (class 1259 OID 25301)
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
-- TOC entry 2178 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 2179 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 2180 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 2181 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 2182 (class 0 OID 0)
-- Dependencies: 185
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 186 (class 1259 OID 25305)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cad_observ_seq OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 25307)
-- Name: cad_observador; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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


ALTER TABLE public.cad_observador OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 25311)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mb_captura_seq OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 25313)
-- Name: mb_captura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    id_ave integer NOT NULL,
    quantidade integer
);


ALTER TABLE public.mb_captura OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 25317)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mb_geral_seq OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 25319)
-- Name: mb_geral; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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


ALTER TABLE public.mb_geral OWNER TO postgres;

--
-- TOC entry 2183 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 192 (class 1259 OID 25326)
-- Name: mb_isca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE public.mb_isca OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 25329)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mb_isca_seq OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 25331)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mb_lance_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 25333)
-- Name: mb_lance; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_lance (
    id_lance integer DEFAULT nextval('mb_lance_seq'::regclass) NOT NULL,
    lance integer NOT NULL,
    data date,
    anzois integer,
    latitude character varying(50),
    longitude character varying(50),
    hora_inicial character varying(10),
    hora_final character varying(10),
    mm_uso character varying(10),
    mb_geral integer NOT NULL,
    ave_capt boolean
);


ALTER TABLE public.mb_lance OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 25337)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.mb_medmit_seq OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 25339)
-- Name: mb_mitigatoria; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


ALTER TABLE public.mb_mitigatoria OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 25342)
-- Name: system_users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
    status smallint
);


ALTER TABLE public.system_users OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 25348)
-- Name: system_users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE system_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.system_users_id_seq OWNER TO postgres;

--
-- TOC entry 2184 (class 0 OID 0)
-- Dependencies: 199
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 200 (class 1259 OID 25350)
-- Name: user_access_map; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


ALTER TABLE public.user_access_map OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 25353)
-- Name: user_autologin; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE user_autologin (
    key_id character(32) NOT NULL,
    user_id integer DEFAULT 0 NOT NULL,
    user_agent character varying(150) NOT NULL,
    last_ip character varying(40) NOT NULL,
    last_login timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.user_autologin OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 25358)
-- Name: user_meta; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE user_meta (
    user_id bigint NOT NULL,
    first_name character varying(100),
    last_name character varying(100),
    phone character varying(100)
);


ALTER TABLE public.user_meta OWNER TO postgres;

--
-- TOC entry 203 (class 1259 OID 25361)
-- Name: user_role; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


ALTER TABLE public.user_role OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 25364)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_role_id_seq OWNER TO postgres;

--
-- TOC entry 2185 (class 0 OID 0)
-- Dependencies: 204
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 205 (class 1259 OID 25366)
-- Name: users_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_seq OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 25368)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id_users integer DEFAULT nextval('users_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    base character varying(30) NOT NULL,
    email character varying(100) NOT NULL,
    skype character varying(50) NOT NULL,
    senha character varying(50) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 1945 (class 2604 OID 25372)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 1948 (class 2604 OID 25373)
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 2186 (class 0 OID 0)
-- Dependencies: 170
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 2108 (class 0 OID 25259)
-- Dependencies: 171
-- Data for Name: autoriz_pesca; Type: TABLE DATA; Schema: public; Owner: postgres
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
-- TOC entry 2110 (class 0 OID 25265)
-- Dependencies: 173
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (21, 'sada', 'dasdasd', 'dasd');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (22, 'aaa', 'aa', 'aa');


--
-- TOC entry 2187 (class 0 OID 0)
-- Dependencies: 172
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_aves_seq', 22, true);


--
-- TOC entry 2112 (class 0 OID 25271)
-- Dependencies: 175
-- Data for Name: cad_embarcacao; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (4, 'Marbella I', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (5, 'Yamaia II', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (7, 'Kopesca IV', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (9, 'Elias Safe', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (6, 'Floripa SL 3', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio, uf) VALUES (8, 'Ana Amaral', '1.01.002', '213123', '123123', 32, 43, 1234, 'aço', 'motor', 23, 12, 'Itajai', 'SC');


--
-- TOC entry 2188 (class 0 OID 0)
-- Dependencies: 174
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 13, true);


--
-- TOC entry 2114 (class 0 OID 25277)
-- Dependencies: 177
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_empresa (id_empresa, nome, cidade, endereco, contato, cargo, telefone, email) VALUES (10, 'Hotel', 'New York', '36 central park south', 'iasmin', 'estagiaria', '1223423', '');


--
-- TOC entry 2189 (class 0 OID 0)
-- Dependencies: 176
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_empresa_seq', 10, true);


--
-- TOC entry 2116 (class 0 OID 25283)
-- Dependencies: 179
-- Data for Name: cad_entrevistador; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_entrevistador (id, nome) VALUES (1, 'João');
INSERT INTO cad_entrevistador (id, nome) VALUES (2, 'Maria');


--
-- TOC entry 2190 (class 0 OID 0)
-- Dependencies: 178
-- Name: cad_entrevistador_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_entrevistador_seq', 2, true);


--
-- TOC entry 2118 (class 0 OID 25289)
-- Dependencies: 181
-- Data for Name: cad_isca; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_isca (id_isca, nome) VALUES (1, 'Lula');
INSERT INTO cad_isca (id_isca, nome) VALUES (2, 'Cavalinha');
INSERT INTO cad_isca (id_isca, nome) VALUES (3, 'Bonito');
INSERT INTO cad_isca (id_isca, nome) VALUES (4, 'Sardinha');


--
-- TOC entry 2191 (class 0 OID 0)
-- Dependencies: 180
-- Name: cad_isca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_isca_seq', 4, true);


--
-- TOC entry 2120 (class 0 OID 25295)
-- Dependencies: 183
-- Data for Name: cad_medida_metigatoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (1, 'Toriline');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (2, 'Largada noturna');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (3, 'Regime de peso');


--
-- TOC entry 2192 (class 0 OID 0)
-- Dependencies: 182
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_medida_metigatoria_seq', 3, true);


--
-- TOC entry 2122 (class 0 OID 25301)
-- Dependencies: 185
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (20, 'Andre', 'Kbçudo', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (21, 'Iasmin', 'Iaia', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (22, 'Rodrigo', 'Yano', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (23, 'Eduardo', 'Dudu', '123412', 'andre.santoro@gmail.com');


--
-- TOC entry 2193 (class 0 OID 0)
-- Dependencies: 184
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_mestre_seq', 23, true);


--
-- TOC entry 2194 (class 0 OID 0)
-- Dependencies: 186
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_observ_seq', 10, true);


--
-- TOC entry 2124 (class 0 OID 25307)
-- Dependencies: 187
-- Data for Name: cad_observador; Type: TABLE DATA; Schema: public; Owner: postgres
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
-- TOC entry 2126 (class 0 OID 25313)
-- Dependencies: 189
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (33, 61, 1, 3);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (34, 62, 3, 6);


--
-- TOC entry 2195 (class 0 OID 0)
-- Dependencies: 188
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_captura_seq', 34, true);


--
-- TOC entry 2128 (class 0 OID 25319)
-- Dependencies: 191
-- Data for Name: mb_geral; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho) VALUES (60, 8, 23, '2015-03-01', '2015-03-07', 'aa', 1, 1);


--
-- TOC entry 2196 (class 0 OID 0)
-- Dependencies: 190
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_geral_seq', 61, true);


--
-- TOC entry 2129 (class 0 OID 25326)
-- Dependencies: 192
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_isca (id_isca, id_lance) VALUES (3, 61);
INSERT INTO mb_isca (id_isca, id_lance) VALUES (4, 62);


--
-- TOC entry 2197 (class 0 OID 0)
-- Dependencies: 193
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 2132 (class 0 OID 25333)
-- Dependencies: 195
-- Data for Name: mb_lance; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_lance (id_lance, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, mb_geral, ave_capt) VALUES (61, 1, '2015-03-02', 1000, '-55.666', '-5.775', '11:11', '11:22', 'TOTAL', 60, true);
INSERT INTO mb_lance (id_lance, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, mb_geral, ave_capt) VALUES (62, 2, '2015-03-02', 2000, '-55.666', '-5.775', '11:11', '11:22', 'PARCIAL', 60, false);


--
-- TOC entry 2198 (class 0 OID 0)
-- Dependencies: 194
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_lance_seq', 62, true);


--
-- TOC entry 2199 (class 0 OID 0)
-- Dependencies: 196
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 2134 (class 0 OID 25339)
-- Dependencies: 197
-- Data for Name: mb_mitigatoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 61);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 62);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (3, 62);


--
-- TOC entry 2135 (class 0 OID 25342)
-- Dependencies: 198
-- Data for Name: system_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status) VALUES (1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2015-03-27 02:55:53', '127.0.0.1', NULL, NULL, NULL, 1, 1);


--
-- TOC entry 2200 (class 0 OID 0)
-- Dependencies: 199
-- Name: system_users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('system_users_id_seq', 1, false);


--
-- TOC entry 2137 (class 0 OID 25350)
-- Dependencies: 200
-- Data for Name: user_access_map; Type: TABLE DATA; Schema: public; Owner: postgres
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


--
-- TOC entry 2138 (class 0 OID 25353)
-- Dependencies: 201
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2139 (class 0 OID 25358)
-- Dependencies: 202
-- Data for Name: user_meta; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2140 (class 0 OID 25361)
-- Dependencies: 203
-- Data for Name: user_role; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO user_role (id, role_name, default_access) VALUES (1, 'Admin', '11111');


--
-- TOC entry 2201 (class 0 OID 0)
-- Dependencies: 204
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('user_role_id_seq', 1, false);


--
-- TOC entry 2143 (class 0 OID 25368)
-- Dependencies: 206
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id_users, nome, base, email, skype, senha) VALUES (1, 'andre', '', '', '', 'oceano');


--
-- TOC entry 2202 (class 0 OID 0)
-- Dependencies: 205
-- Name: users_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 1951 (class 2606 OID 25375)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 1953 (class 2606 OID 25377)
-- Name: pk_aves; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 1961 (class 2606 OID 25379)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 1969 (class 2606 OID 25381)
-- Name: pk_capt; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 1955 (class 2606 OID 25383)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 1957 (class 2606 OID 25385)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 1959 (class 2606 OID 25387)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 1975 (class 2606 OID 25389)
-- Name: pk_lance; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 1971 (class 2606 OID 25391)
-- Name: pk_mb; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 1973 (class 2606 OID 25393)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 1977 (class 2606 OID 25395)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 1963 (class 2606 OID 25397)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 1965 (class 2606 OID 25399)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 1967 (class 2606 OID 25401)
-- Name: pk_observ; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 1979 (class 2606 OID 25403)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 1981 (class 2606 OID 25405)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 1983 (class 2606 OID 25407)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 1985 (class 2606 OID 25409)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 1987 (class 2606 OID 25411)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 1989 (class 2606 OID 25413)
-- Name: pk_users; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 1990 (class 2606 OID 25414)
-- Name: fk_cad_ave; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_cad_ave FOREIGN KEY (id_ave) REFERENCES cad_aves(id_aves);


--
-- TOC entry 1992 (class 2606 OID 25419)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 1993 (class 2606 OID 25424)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES cad_entrevistador(id);


--
-- TOC entry 1997 (class 2606 OID 25429)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 1995 (class 2606 OID 25434)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 1996 (class 2606 OID 25439)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 1991 (class 2606 OID 25444)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 1998 (class 2606 OID 25449)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 1999 (class 2606 OID 25454)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 1994 (class 2606 OID 25459)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-03-26 23:15:30

--
-- PostgreSQL database dump complete
--

