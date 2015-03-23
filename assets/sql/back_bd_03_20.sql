--
-- PostgreSQL database dump
--

-- Dumped from database version 9.4.0
-- Dumped by pg_dump version 9.4.0
-- Started on 2015-03-20 23:47:04

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 2123 (class 1262 OID 16536)
-- Dependencies: 2122
-- Name: SisAlbatroz; Type: COMMENT; Schema: -; Owner: postgres
--

COMMENT ON DATABASE "SisAlbatroz" IS 'Banco de dados primários para armazenamento de informações provenientes de Mapas de Bordo coletados pelo Projeto Albatroz.';


--
-- TOC entry 196 (class 3079 OID 11855)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2126 (class 0 OID 0)
-- Dependencies: 196
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

--
-- TOC entry 182 (class 1259 OID 24764)
-- Name: auto_pesca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
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
-- TOC entry 183 (class 1259 OID 24772)
-- Name: autoriz_pesca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


ALTER TABLE autoriz_pesca OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 16537)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_aves_seq OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 16539)
-- Name: cad_aves; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE cad_aves (
    id_aves integer DEFAULT nextval('cad_aves_seq'::regclass) NOT NULL,
    nome_comum_br character varying(50) NOT NULL,
    nome_cientifico character varying(50) NOT NULL,
    nome_comum_en character varying(50) NOT NULL
);


ALTER TABLE cad_aves OWNER TO postgres;

--
-- TOC entry 2127 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 2128 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 2129 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 2130 (class 0 OID 0)
-- Dependencies: 173
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 174 (class 1259 OID 16543)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_embarcacao_seq OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 16545)
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


ALTER TABLE cad_embarcacao OWNER TO postgres;

--
-- TOC entry 2131 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 2132 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 2133 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 2134 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 2135 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 2136 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 2137 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 2138 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 2139 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 2140 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 2141 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 2142 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 2143 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.municipio; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.municipio IS 'Campo para inserção do nome do município em que a Embarcação da Pesca esta vinculada.';


--
-- TOC entry 2144 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN cad_embarcacao.uf; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_embarcacao.uf IS 'Campo para inserção da Unidade da Federação em que a Embarcação de Pesca está vinculada.';


--
-- TOC entry 176 (class 1259 OID 16549)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_empresa_seq OWNER TO postgres;

--
-- TOC entry 177 (class 1259 OID 16551)
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


ALTER TABLE cad_empresa OWNER TO postgres;

--
-- TOC entry 2145 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 2146 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 2147 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.cidade; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cidade IS 'Campo para inserção do nome completo da Cidade onde a Empresa de Pesca está sediada.';


--
-- TOC entry 2148 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 2149 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 2150 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 2151 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 2152 (class 0 OID 0)
-- Dependencies: 177
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 178 (class 1259 OID 16555)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_mestre_seq OWNER TO postgres;

--
-- TOC entry 179 (class 1259 OID 16557)
-- Name: cad_mestre; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
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
-- TOC entry 2153 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 2154 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 179
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 194 (class 1259 OID 24909)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE cad_observ_seq OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 24911)
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


ALTER TABLE cad_observador OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 24901)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_captura_seq OWNER TO postgres;

--
-- TOC entry 193 (class 1259 OID 24903)
-- Name: mb_captura; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    aves integer NOT NULL,
    quantidade integer NOT NULL
);


ALTER TABLE mb_captura OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 24778)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_geral_seq OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 24784)
-- Name: mb_geral; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_geral (
    id_mb integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
    embarcacao integer NOT NULL,
    mestre integer NOT NULL,
    petrecho character varying(50) NOT NULL,
    data_saida date NOT NULL,
    data_chegada date NOT NULL,
    observacao character varying(500) NOT NULL,
    observador integer NOT NULL
);


ALTER TABLE mb_geral OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 24887)
-- Name: mb_isca; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer DEFAULT nextval('mb_geral_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    isca character varying(50) NOT NULL
);


ALTER TABLE mb_isca OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 24885)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_isca_seq OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 24864)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_lance_seq OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 24866)
-- Name: mb_lance; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_lance (
    id_lance integer DEFAULT nextval('mb_lance_seq'::regclass) NOT NULL,
    id_mb character varying(10),
    lance integer NOT NULL,
    data date NOT NULL,
    anzois integer NOT NULL,
    latitude character varying(50) NOT NULL,
    longitude character varying(50) NOT NULL,
    hora_inicial character varying(10) NOT NULL,
    hora_final character varying(10) NOT NULL,
    mm_uso character varying(10) NOT NULL,
    ave_capt character varying(1) NOT NULL
);


ALTER TABLE mb_lance OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 24893)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mb_medmit_seq OWNER TO postgres;

--
-- TOC entry 191 (class 1259 OID 24895)
-- Name: mb_mitiga; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE mb_mitiga (
    id_mm integer DEFAULT nextval('mb_medmit_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    medida_mitigatoria character varying(50) NOT NULL
);


ALTER TABLE mb_mitiga OWNER TO postgres;

--
-- TOC entry 180 (class 1259 OID 16581)
-- Name: users_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE users_seq OWNER TO postgres;

--
-- TOC entry 181 (class 1259 OID 16583)
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


ALTER TABLE users OWNER TO postgres;

--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 182
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 2105 (class 0 OID 24772)
-- Dependencies: 183
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
-- TOC entry 2095 (class 0 OID 16539)
-- Dependencies: 173
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 172
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_aves_seq', 20, true);


--
-- TOC entry 2097 (class 0 OID 16545)
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
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 174
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 13, true);


--
-- TOC entry 2099 (class 0 OID 16551)
-- Dependencies: 177
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_empresa (id_empresa, nome, cidade, endereco, contato, cargo, telefone, email) VALUES (10, 'Hotel', 'New York', '36 central park south', 'iasmin', 'estagiaria', '1223423', '');


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 176
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_empresa_seq', 10, true);


--
-- TOC entry 2101 (class 0 OID 16557)
-- Dependencies: 179
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (20, 'Andre', 'Kbçudo', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (21, 'Iasmin', 'Iaia', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (22, 'Rodrigo', 'Yano', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (23, 'Eduardo', 'Dudu', '123412', 'andre.santoro@gmail.com');


--
-- TOC entry 2162 (class 0 OID 0)
-- Dependencies: 178
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_mestre_seq', 23, true);


--
-- TOC entry 2163 (class 0 OID 0)
-- Dependencies: 194
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('cad_observ_seq', 10, true);


--
-- TOC entry 2117 (class 0 OID 24911)
-- Dependencies: 195
-- Data for Name: cad_observador; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (2, 'André A Santoro', '', '', 'asantoro@projetoalbatroz.org.br', '', '', 'Rua Jorge Tzachel 114, Bloco C apt 304', 'Itajai', '');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (6, 'Rodrigo', '123412', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '36 central park south', 'Itajai', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (7, 'Iasmin', '12341212', '', 'asantoro@projetoalbatroz.org.br', '123123', 'asdadsfasd', '10440 Deerwood Dr.
Apartament 833', 'Itajai', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (8, 'fdsafasd', '12213', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (9, 'fdsafasd', '122133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');
INSERT INTO cad_observador (id_observ, nome, cpf, rg, email, telefone, skype, endereco, cidade, uf) VALUES (10, 'fdsafasd', '1223133', '12321', 'andre.santoro@gmail.com', '132423', 'adsfdsf', 'Rua Jorge Tzachel', 'Itajaí', 'sc');


--
-- TOC entry 2115 (class 0 OID 24903)
-- Dependencies: 193
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2164 (class 0 OID 0)
-- Dependencies: 192
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_captura_seq', 1, false);


--
-- TOC entry 2107 (class 0 OID 24784)
-- Dependencies: 185
-- Data for Name: mb_geral; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (33, 8, 21, 'esp_sup', '2015-02-10', '2015-03-20', 'dsfdsaf', 1);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (35, 8, 21, 'esp_sup', '2015-02-10', '2015-03-20', 'dsfdsaf', 3);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (36, 4, 22, 'esp_fun', '2015-03-06', '2015-03-28', 'asadsfsd', 4);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (37, 4, 22, 'esp_fun', '2015-03-06', '2015-03-28', 'asadsfsd', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (38, 5, 23, 'esp_sup', '2015-03-06', '2015-03-28', 'adfasdfs', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (39, 8, 21, 'esp_fun', '2015-03-01', '2015-03-28', 'afsdafsd', 1);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (40, 8, 21, 'esp_fun', '2015-03-01', '2015-03-28', 'afsdafsd', 1);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (41, 8, 21, 'esp_fun', '2015-03-01', '2015-03-28', 'afsdafsd', 4);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (42, 8, 21, 'esp_fun', '2015-03-01', '2015-03-28', 'afsdafsd', 3);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (43, 8, 21, 'esp_fun', '2015-03-01', '2015-03-28', 'afsdafsd', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (44, 9, 21, 'esp_sup', '2015-03-26', '2015-03-01', 'asdfa', 1);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (45, 9, 21, 'esp_sup', '2015-03-26', '2015-03-01', 'asdfa', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (46, 9, 21, 'esp_sup', '2015-03-26', '2015-03-01', 'asdfa', 3);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (47, 9, 21, 'esp_sup', '2015-03-26', '2015-03-01', 'asdfa', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (49, 8, 23, 'esp_fun', '2015-03-04', '2015-03-25', '', 2);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, petrecho, data_saida, data_chegada, observacao, observador) VALUES (50, 8, 23, 'esp_fun', '2015-03-04', '2015-03-25', '', 2);


--
-- TOC entry 2165 (class 0 OID 0)
-- Dependencies: 184
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_geral_seq', 50, true);


--
-- TOC entry 2111 (class 0 OID 24887)
-- Dependencies: 189
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2166 (class 0 OID 0)
-- Dependencies: 188
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 2109 (class 0 OID 24866)
-- Dependencies: 187
-- Data for Name: mb_lance; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (6, NULL, 1, '2015-03-04', 1234, '12345', '4321', '12:23', '04:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (7, NULL, 1, '2015-03-04', 1234, '12345', '4321', '12:23', '04:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (14, NULL, 1, '2015-03-05', 123123, '1213123', '12312', '12:32', '12:23', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (16, NULL, 1, '2015-03-13', 231, '1234', '4321', '12:23', '03:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (18, '', 1, '2015-03-13', 231, '1234', '4321', '12:23', '03:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (19, '', 1, '2015-03-13', 231, '1234', '4321', '12:23', '03:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (20, '', 1, '2015-03-13', 231, '1234', '4321', '12:23', '03:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (21, '', 1, '2015-03-13', 231, '1234', '4321', '12:23', '03:12', 'parcial', 's');
INSERT INTO mb_lance (id_lance, id_mb, lance, data, anzois, latitude, longitude, hora_inicial, hora_final, mm_uso, ave_capt) VALUES (22, NULL, 1, '2015-03-12', 12321, '123123', '123123', '12:32', '12:32', 'parcial', 's');


--
-- TOC entry 2167 (class 0 OID 0)
-- Dependencies: 186
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_lance_seq', 22, true);


--
-- TOC entry 2168 (class 0 OID 0)
-- Dependencies: 190
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 2113 (class 0 OID 24895)
-- Dependencies: 191
-- Data for Name: mb_mitiga; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2103 (class 0 OID 16583)
-- Dependencies: 181
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id_users, nome, base, email, skype, senha) VALUES (1, 'andre', '', '', '', 'oceano');


--
-- TOC entry 2169 (class 0 OID 0)
-- Dependencies: 180
-- Name: users_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 1971 (class 2606 OID 24777)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 1961 (class 2606 OID 16562)
-- Name: pk_aves; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 1981 (class 2606 OID 24908)
-- Name: pk_capt; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 1963 (class 2606 OID 16564)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 1965 (class 2606 OID 16566)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 1977 (class 2606 OID 24892)
-- Name: pk_isca; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_isca PRIMARY KEY (id_isca);


--
-- TOC entry 1975 (class 2606 OID 24871)
-- Name: pk_lance; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 1973 (class 2606 OID 24792)
-- Name: pk_mb; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 1967 (class 2606 OID 16568)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 1979 (class 2606 OID 24900)
-- Name: pk_mm; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY mb_mitiga
    ADD CONSTRAINT pk_mm PRIMARY KEY (id_mm);


--
-- TOC entry 1983 (class 2606 OID 24919)
-- Name: pk_observ; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 1969 (class 2606 OID 16588)
-- Name: pk_users; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 1984 (class 2606 OID 24944)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 2125 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2015-03-20 23:47:05

--
-- PostgreSQL database dump complete
--

