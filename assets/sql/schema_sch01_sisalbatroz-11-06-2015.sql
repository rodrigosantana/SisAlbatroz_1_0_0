--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-06-11 22:11:10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 7 (class 2615 OID 27581)
-- Name: sch01; Type: SCHEMA; Schema: -; Owner: -
--

CREATE SCHEMA sch01;


SET search_path = sch01, pg_catalog;

--
-- TOC entry 188 (class 1259 OID 27582)
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
-- TOC entry 189 (class 1259 OID 27584)
-- Name: autoriz_pesca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE autoriz_pesca (
    id_auto_pesca integer DEFAULT nextval('auto_pesca_seq'::regclass) NOT NULL,
    modalidade character varying(9) NOT NULL,
    descricao character varying(150) NOT NULL
);


--
-- TOC entry 190 (class 1259 OID 27588)
-- Name: cad_aves_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_aves_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 191 (class 1259 OID 27590)
-- Name: cad_aves; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_aves (
    id_aves integer DEFAULT nextval('cad_aves_seq'::regclass) NOT NULL,
    nome_comum_br character varying(50) NOT NULL,
    nome_cientifico character varying(50) NOT NULL,
    nome_comum_en character varying(50) NOT NULL
);


--
-- TOC entry 3701 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_aves.id_aves; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.id_aves IS 'Campo identificador auto incrementado para controle de Cadastro de Aves.';


--
-- TOC entry 3702 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_aves.nome_comum_br; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_comum_br IS 'Campo para inserção do nome comum da espécie em português.';


--
-- TOC entry 3703 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_aves.nome_cientifico; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_cientifico IS 'Campo para inserção do nome científico da espécie.';


--
-- TOC entry 3704 (class 0 OID 0)
-- Dependencies: 191
-- Name: COLUMN cad_aves.nome_comum_en; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_aves.nome_comum_en IS 'Campo para inserção do nome comum da espécie em inglês.';


--
-- TOC entry 192 (class 1259 OID 27594)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 193 (class 1259 OID 27596)
-- Name: cad_embarcacao; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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
    municipio integer
);


--
-- TOC entry 3705 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 3706 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 3707 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.autorizacao_pesca; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.autorizacao_pesca IS 'Campo para inserção do tipo de autorização de pesca da Embarcação de Pesca.';


--
-- TOC entry 3708 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 3709 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 3710 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 3711 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 3712 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 3713 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 3714 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 3715 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 3716 (class 0 OID 0)
-- Dependencies: 193
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 194 (class 1259 OID 27600)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 195 (class 1259 OID 27602)
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
-- TOC entry 3717 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 3718 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 3719 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.cidade; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.cidade IS 'Campo para inserção do nome completo da Cidade onde a Empresa de Pesca está sediada.';


--
-- TOC entry 3720 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 3721 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 3722 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 3723 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 3724 (class 0 OID 0)
-- Dependencies: 195
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 196 (class 1259 OID 27606)
-- Name: cad_entrevistador_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_entrevistador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 197 (class 1259 OID 27608)
-- Name: cad_entrevistador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 229 (class 1259 OID 29966)
-- Name: cad_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 230 (class 1259 OID 29968)
-- Name: cad_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_especie (
    id integer DEFAULT nextval('cad_especie_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


--
-- TOC entry 225 (class 1259 OID 29922)
-- Name: cad_financiador_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_financiador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 226 (class 1259 OID 29924)
-- Name: cad_financiador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_financiador (
    id integer DEFAULT nextval('cad_financiador_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


--
-- TOC entry 198 (class 1259 OID 27612)
-- Name: cad_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 199 (class 1259 OID 27614)
-- Name: cad_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 200 (class 1259 OID 27618)
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_medida_metigatoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 201 (class 1259 OID 27620)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 202 (class 1259 OID 27624)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 203 (class 1259 OID 27626)
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
-- TOC entry 3725 (class 0 OID 0)
-- Dependencies: 203
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 3726 (class 0 OID 0)
-- Dependencies: 203
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 3727 (class 0 OID 0)
-- Dependencies: 203
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 3728 (class 0 OID 0)
-- Dependencies: 203
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 3729 (class 0 OID 0)
-- Dependencies: 203
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 204 (class 1259 OID 27630)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 205 (class 1259 OID 27632)
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
-- TOC entry 239 (class 1259 OID 30047)
-- Name: captura_incidental_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE captura_incidental_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 240 (class 1259 OID 30049)
-- Name: captura_incidental; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE captura_incidental (
    id integer DEFAULT nextval('captura_incidental_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    data date,
    coordenada public.geometry,
    boia_radio integer
);


--
-- TOC entry 252 (class 1259 OID 33374)
-- Name: captura_incidental_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE captura_incidental_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 253 (class 1259 OID 33376)
-- Name: captura_incidental_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE captura_incidental_especie (
    id integer DEFAULT nextval('captura_incidental_especie_seq'::regclass) NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    etiqueta integer,
    captura_incidental integer
);


--
-- TOC entry 241 (class 1259 OID 30068)
-- Name: contagem_ave_boia_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_ave_boia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 242 (class 1259 OID 30070)
-- Name: contagem_ave_boia; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 243 (class 1259 OID 30084)
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_ave_boia_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 244 (class 1259 OID 30086)
-- Name: contagem_ave_boia_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE contagem_ave_boia_especie (
    id integer DEFAULT nextval('contagem_ave_boia_especie_seq'::regclass) NOT NULL,
    contagem_ave_boia integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 235 (class 1259 OID 30013)
-- Name: contagem_por_sol_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 236 (class 1259 OID 30015)
-- Name: contagem_por_sol; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 237 (class 1259 OID 30029)
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 238 (class 1259 OID 30031)
-- Name: contagem_por_sol_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE contagem_por_sol_especie (
    id integer DEFAULT nextval('contagem_por_sol_especie_seq'::regclass) NOT NULL,
    contagem_psi integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 250 (class 1259 OID 33351)
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_indice_seq
    START WITH 27
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 251 (class 1259 OID 33353)
-- Name: contagem_por_sol_indice; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE contagem_por_sol_indice (
    id integer DEFAULT nextval('contagem_por_sol_indice_seq'::regclass) NOT NULL,
    contagem_por_sol integer NOT NULL,
    indice integer,
    hora time without time zone,
    total integer
);


--
-- TOC entry 227 (class 1259 OID 29930)
-- Name: cruzeiro_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cruzeiro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 228 (class 1259 OID 29932)
-- Name: cruzeiro; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 249 (class 1259 OID 33289)
-- Name: cruzeiro_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cruzeiro_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 231 (class 1259 OID 29974)
-- Name: dados_abioticos_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE dados_abioticos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 232 (class 1259 OID 29976)
-- Name: dados_abioticos; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE dados_abioticos (
    id integer DEFAULT nextval('dados_abioticos_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer NOT NULL,
    tipo_isca integer,
    anzois integer,
    reg_peso boolean,
    toriline boolean,
    isca_tingida boolean,
    dado_lancamento integer,
    dado_recolhimento integer
);


--
-- TOC entry 233 (class 1259 OID 29997)
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE dados_abioticos_complementar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 234 (class 1259 OID 29999)
-- Name: dados_abioticos_complementar; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 254 (class 1259 OID 33419)
-- Name: especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 255 (class 1259 OID 33421)
-- Name: especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE especie (
    id integer DEFAULT nextval('especie_seq'::regclass) NOT NULL,
    nome_cientifico character varying(100) NOT NULL,
    nome_comum_br character varying(100) NOT NULL,
    nome_comum_en character varying(100),
    tipo character varying(20) NOT NULL
);


--
-- TOC entry 206 (class 1259 OID 27636)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 207 (class 1259 OID 27638)
-- Name: mb_captura; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    id_ave integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 208 (class 1259 OID 27642)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 209 (class 1259 OID 27644)
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
    petrecho smallint NOT NULL,
    usuario_insercao integer,
    data_insercao timestamp without time zone,
    usuario_alteracao integer,
    data_alteracao timestamp without time zone
);


--
-- TOC entry 3730 (class 0 OID 0)
-- Dependencies: 209
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 210 (class 1259 OID 27651)
-- Name: mb_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 211 (class 1259 OID 27654)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 212 (class 1259 OID 27656)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 213 (class 1259 OID 27658)
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
-- TOC entry 214 (class 1259 OID 27662)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 215 (class 1259 OID 27664)
-- Name: mb_mitigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 261 (class 1259 OID 33693)
-- Name: mc_biometria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 260 (class 1259 OID 33655)
-- Name: mc_captura_incidental; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 262 (class 1259 OID 33703)
-- Name: mc_coleta_material_biologico; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 263 (class 1259 OID 33716)
-- Name: mc_outras_pesquisas; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 258 (class 1259 OID 33510)
-- Name: medicina_conservacao_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE medicina_conservacao_seq
    START WITH 20
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 259 (class 1259 OID 33631)
-- Name: medicina_conservacao; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 256 (class 1259 OID 33470)
-- Name: municipio_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE municipio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 257 (class 1259 OID 33472)
-- Name: municipio; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE municipio (
    id integer DEFAULT nextval('municipio_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL,
    uf character varying(3) NOT NULL,
    codigo_ibge integer
);


--
-- TOC entry 245 (class 1259 OID 30102)
-- Name: producao_pesqueira_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE producao_pesqueira_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 246 (class 1259 OID 30104)
-- Name: producao_pesqueira; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE producao_pesqueira (
    id integer DEFAULT nextval('producao_pesqueira_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    data date,
    boia_radio integer
);


--
-- TOC entry 247 (class 1259 OID 30115)
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE producao_pesqueira_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 248 (class 1259 OID 30117)
-- Name: producao_pesqueira_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE producao_pesqueira_especie (
    id integer DEFAULT nextval('producao_pesqueira_especie_seq'::regclass) NOT NULL,
    producao_pesqueira integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    predacao character varying(255)
);


--
-- TOC entry 216 (class 1259 OID 27667)
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
-- TOC entry 217 (class 1259 OID 27673)
-- Name: system_users_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE system_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3731 (class 0 OID 0)
-- Dependencies: 217
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 218 (class 1259 OID 27675)
-- Name: user_access_map; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


--
-- TOC entry 219 (class 1259 OID 27678)
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
-- TOC entry 220 (class 1259 OID 27683)
-- Name: user_meta; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_meta (
    user_id bigint NOT NULL,
    first_name character varying(100),
    last_name character varying(100),
    phone character varying(100)
);


--
-- TOC entry 221 (class 1259 OID 27686)
-- Name: user_role; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


--
-- TOC entry 222 (class 1259 OID 27689)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3732 (class 0 OID 0)
-- Dependencies: 222
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 223 (class 1259 OID 27691)
-- Name: users_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 224 (class 1259 OID 27693)
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
-- TOC entry 3347 (class 2604 OID 27697)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 3350 (class 2604 OID 27698)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 3733 (class 0 OID 0)
-- Dependencies: 188
-- Name: auto_pesca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('auto_pesca_seq', 20, true);


--
-- TOC entry 3622 (class 0 OID 27584)
-- Dependencies: 189
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
-- TOC entry 3624 (class 0 OID 27590)
-- Dependencies: 191
-- Data for Name: cad_aves; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (1, 'Albatroz-de-nariz-amarelo', 'Thalassarche chlororhynchos', 'Atlantic Yellow-nosed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (2, 'Albatroz-de-sobrancelha-negra', 'Thalassarche melanophrys', 'Black-browed Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (3, 'Albatroz-viageiro', 'Diomedea exulans', 'Wandering Albatross');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (21, 'sada', 'dasdasd', 'dasd');
INSERT INTO cad_aves (id_aves, nome_comum_br, nome_cientifico, nome_comum_en) VALUES (22, 'aaa', 'aa', 'aa');


--
-- TOC entry 3734 (class 0 OID 0)
-- Dependencies: 190
-- Name: cad_aves_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_aves_seq', 22, true);


--
-- TOC entry 3626 (class 0 OID 27596)
-- Dependencies: 193
-- Data for Name: cad_embarcacao; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (4, 'Marbella I', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (5, 'Yamaia II', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (6, 'Floripa SL 3', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (7, 'Kopesca IV', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (8, 'Ana Amaral', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (9, 'Elias Safe', '1.01.002', '213123', '123123', 32.00, 43.00, 1234, 'aço', 'motor', 23.00, 12, 1);
INSERT INTO cad_embarcacao (id_embarcacao, nome, autorizacao_pesca, reg_marinha, reg_mpa, comprim_barco, arqueacao_bruta, ano_fabricacao, mat_casco, propulsao, potencia_motor, tripulacao, municipio) VALUES (18, 'Umbrela', '1.01.002', '12', '32', 22.00, 2.00, 324, 'aço', 'motor', 32.00, 3, 1);


--
-- TOC entry 3735 (class 0 OID 0)
-- Dependencies: 192
-- Name: cad_embarcacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_embarcacao_seq', 18, true);


--
-- TOC entry 3628 (class 0 OID 27602)
-- Dependencies: 195
-- Data for Name: cad_empresa; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_empresa (id_empresa, nome, cidade, endereco, contato, cargo, telefone, email) VALUES (10, 'Hotel', 'New York', '36 central park south', 'iasmin', 'estagiaria', '1223423', '');


--
-- TOC entry 3736 (class 0 OID 0)
-- Dependencies: 194
-- Name: cad_empresa_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_empresa_seq', 10, true);


--
-- TOC entry 3630 (class 0 OID 27608)
-- Dependencies: 197
-- Data for Name: cad_entrevistador; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_entrevistador (id, nome) VALUES (1, 'João');
INSERT INTO cad_entrevistador (id, nome) VALUES (2, 'Maria');


--
-- TOC entry 3737 (class 0 OID 0)
-- Dependencies: 196
-- Name: cad_entrevistador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_entrevistador_seq', 2, true);


--
-- TOC entry 3663 (class 0 OID 29968)
-- Dependencies: 230
-- Data for Name: cad_especie; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_especie (id, nome) VALUES (1, 'Peixe espada');
INSERT INTO cad_especie (id, nome) VALUES (2, 'Camarão Branco');


--
-- TOC entry 3738 (class 0 OID 0)
-- Dependencies: 229
-- Name: cad_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_especie_seq', 2, true);


--
-- TOC entry 3659 (class 0 OID 29924)
-- Dependencies: 226
-- Data for Name: cad_financiador; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_financiador (id, nome) VALUES (1, 'Financiador 1');


--
-- TOC entry 3739 (class 0 OID 0)
-- Dependencies: 225
-- Name: cad_financiador_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_financiador_seq', 1, true);


--
-- TOC entry 3632 (class 0 OID 27614)
-- Dependencies: 199
-- Data for Name: cad_isca; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_isca (id_isca, nome) VALUES (1, 'Lula');
INSERT INTO cad_isca (id_isca, nome) VALUES (2, 'Cavalinha');
INSERT INTO cad_isca (id_isca, nome) VALUES (3, 'Bonito');
INSERT INTO cad_isca (id_isca, nome) VALUES (4, 'Sardinha');


--
-- TOC entry 3740 (class 0 OID 0)
-- Dependencies: 198
-- Name: cad_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_isca_seq', 4, true);


--
-- TOC entry 3634 (class 0 OID 27620)
-- Dependencies: 201
-- Data for Name: cad_medida_metigatoria; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (1, 'Toriline');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (2, 'Largada noturna');
INSERT INTO cad_medida_metigatoria (id_medida_metigatoria, nome) VALUES (3, 'Regime de peso');


--
-- TOC entry 3741 (class 0 OID 0)
-- Dependencies: 200
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_medida_metigatoria_seq', 3, true);


--
-- TOC entry 3636 (class 0 OID 27626)
-- Dependencies: 203
-- Data for Name: cad_mestre; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (20, 'Andre', 'Kbçudo', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (21, 'Iasmin', 'Iaia', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (22, 'Rodrigo', 'Yano', '123412', 'andre.santoro@gmail.com');
INSERT INTO cad_mestre (id_mestre, nome, apelido, telefone, email) VALUES (23, 'Eduardo', 'Dudu', '123412', 'andre.santoro@gmail.com');


--
-- TOC entry 3742 (class 0 OID 0)
-- Dependencies: 202
-- Name: cad_mestre_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_mestre_seq', 23, true);


--
-- TOC entry 3743 (class 0 OID 0)
-- Dependencies: 204
-- Name: cad_observ_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cad_observ_seq', 10, true);


--
-- TOC entry 3638 (class 0 OID 27632)
-- Dependencies: 205
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
-- TOC entry 3673 (class 0 OID 30049)
-- Dependencies: 240
-- Data for Name: captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (16, 59, NULL, NULL, '0101000020E6100000000000000000F03F0000000000003740', NULL);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (33, 67, 94, NULL, '0101000020E6100000000000000000F03F000000000000F03F', 48);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (34, 67, 94, NULL, NULL, 48);
INSERT INTO captura_incidental (id, cruzeiro, lance, data, coordenada, boia_radio) VALUES (36, 58, 96, NULL, NULL, NULL);


--
-- TOC entry 3686 (class 0 OID 33376)
-- Dependencies: 253
-- Data for Name: captura_incidental_especie; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO captura_incidental_especie (id, especie, quantidade, etiqueta, captura_incidental) VALUES (17, 1, NULL, 2, 33);


--
-- TOC entry 3744 (class 0 OID 0)
-- Dependencies: 252
-- Name: captura_incidental_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('captura_incidental_especie_seq', 17, true);


--
-- TOC entry 3745 (class 0 OID 0)
-- Dependencies: 239
-- Name: captura_incidental_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('captura_incidental_seq', 36, true);


--
-- TOC entry 3675 (class 0 OID 30070)
-- Dependencies: 242
-- Data for Name: contagem_ave_boia; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (30, 59, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (46, 67, 90, '1', '2015-06-02 11:58:00', NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (47, 67, 90, '55', '2015-06-01 11:01:00', NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (48, 67, 90, '33', '2015-06-02 00:11:00', NULL, NULL, NULL, NULL);
INSERT INTO contagem_ave_boia (id, cruzeiro, lance, boia_radio, data_hora, temperatura_agua, profundidade, pressao_atmosferica, coordenada) VALUES (50, 58, 96, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3677 (class 0 OID 30086)
-- Dependencies: 244
-- Data for Name: contagem_ave_boia_especie; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (32, 30, 1, 11);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (43, 46, 3, 1);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (44, 48, 1, 1);
INSERT INTO contagem_ave_boia_especie (id, contagem_ave_boia, especie, quantidade) VALUES (46, 50, 3, 1);


--
-- TOC entry 3746 (class 0 OID 0)
-- Dependencies: 243
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('contagem_ave_boia_especie_seq', 46, true);


--
-- TOC entry 3747 (class 0 OID 0)
-- Dependencies: 241
-- Name: contagem_ave_boia_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('contagem_ave_boia_seq', 50, true);


--
-- TOC entry 3669 (class 0 OID 30015)
-- Dependencies: 236
-- Data for Name: contagem_por_sol; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (27, 59, '3233-02-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (54, 67, '2015-06-01', NULL, 92, true, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (55, 67, '2015-06-01', NULL, 93, NULL, true, NULL, NULL, NULL, NULL, '11:01:00');
INSERT INTO contagem_por_sol (id, cruzeiro, data, coordenada, lance, toriline, isca_tingida, observacao, indice, hora, total, hora_por_sol) VALUES (57, 58, '2015-05-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3671 (class 0 OID 30031)
-- Dependencies: 238
-- Data for Name: contagem_por_sol_especie; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3748 (class 0 OID 0)
-- Dependencies: 237
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('contagem_por_sol_especie_seq', 29, true);


--
-- TOC entry 3684 (class 0 OID 33353)
-- Dependencies: 251
-- Data for Name: contagem_por_sol_indice; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3749 (class 0 OID 0)
-- Dependencies: 250
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('contagem_por_sol_indice_seq', 27, false);


--
-- TOC entry 3750 (class 0 OID 0)
-- Dependencies: 235
-- Name: contagem_por_sol_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('contagem_por_sol_seq', 57, true);


--
-- TOC entry 3661 (class 0 OID 29932)
-- Dependencies: 228
-- Data for Name: cruzeiro; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (59, 2, 9, 23, NULL, NULL, '1988-11-11', '1988-11-11', NULL, 1, '2015-05-09 00:23:53', NULL, NULL);
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (67, 2, 8, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-06-02 02:35:11', 1, '2015-06-03 04:08:32');
INSERT INTO cruzeiro (id, observador, embarcacao, mestre, empresa, financiador, data_saida, data_chegada, observacao, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (58, 2, 8, 20, NULL, NULL, '2015-04-01', '2015-04-30', NULL, 1, '2015-04-30 02:35:14', 1, '2015-06-04 18:41:23');


--
-- TOC entry 3751 (class 0 OID 0)
-- Dependencies: 249
-- Name: cruzeiro_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cruzeiro_lance_seq', 1, false);


--
-- TOC entry 3752 (class 0 OID 0)
-- Dependencies: 227
-- Name: cruzeiro_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('cruzeiro_seq', 67, true);


--
-- TOC entry 3665 (class 0 OID 29976)
-- Dependencies: 232
-- Data for Name: dados_abioticos; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (25, 59, 1, 2, NULL, NULL, true, NULL, 22, 23);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (90, 67, 33, NULL, NULL, true, false, true, 152, 153);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (91, 67, 2, NULL, NULL, NULL, NULL, NULL, 154, 155);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (92, 67, 5, NULL, NULL, NULL, NULL, NULL, 156, 157);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (93, 67, 11, NULL, NULL, NULL, NULL, NULL, 158, 159);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (94, 67, 55, 3, NULL, NULL, true, true, 160, 161);
INSERT INTO dados_abioticos (id, cruzeiro, lance, tipo_isca, anzois, reg_peso, toriline, isca_tingida, dado_lancamento, dado_recolhimento) VALUES (96, 58, 2, NULL, NULL, true, NULL, NULL, 164, 165);


--
-- TOC entry 3667 (class 0 OID 29999)
-- Dependencies: 234
-- Data for Name: dados_abioticos_complementar; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (23, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, 'NE', NULL, 'O', NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (22, 1, '0101000020E61000000000000000000040000000000000F03F', '0101000020E61000000000000000000040000000000000F03F', NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (153, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (155, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (157, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (159, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (161, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (152, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (154, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (156, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (158, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (160, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (165, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO dados_abioticos_complementar (id, tipo, coordenada_inicio, coordenada_fim, data_inicio, data_fim, profundidade_inicio, profundidade_fim, velocidade_vento_inicio, velocidade_vento_fim, categoria_mar_inicio, categoria_mar_fim, temperatura_ar_inicio, temperatura_ar_fim, temperatura_sup_mar_inicio, temperatura_sup_mar_fim, cobertura_ceu_inicio, cobertura_ceu_fim, pressao_atmosferica_inicio, pressao_atmosferica_fim, rumo_inicio, rumo_fim, direcao_vento_inicio, direcao_vento_fim) VALUES (164, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


--
-- TOC entry 3753 (class 0 OID 0)
-- Dependencies: 233
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('dados_abioticos_complementar_seq', 165, true);


--
-- TOC entry 3754 (class 0 OID 0)
-- Dependencies: 231
-- Name: dados_abioticos_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('dados_abioticos_seq', 96, true);


--
-- TOC entry 3688 (class 0 OID 33421)
-- Dependencies: 255
-- Data for Name: especie; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (1, 'Thalassarche chlororhynchos', 'Albatroz-de-nariz-amarelo', 'Atlantic Yellow-nosed Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (2, 'Thalassarche melanophrys', 'Albatroz-de-sobrancelha-negra', 'Black-browed Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (3, 'Diomedea exulans', 'Albatroz-viageiro', 'Wandering Albatross', 'aves');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (5, 'Camaronis', 'Camarão', NULL, 'pescado');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (4, 'Chelon bispinosus', 'tainha-de-cabo-verde', NULL, 'pescado');
INSERT INTO especie (id, nome_cientifico, nome_comum_br, nome_comum_en, tipo) VALUES (10, 'Peixes espadus', 'Peixe espada', 'Swordfish', 'pescado');


--
-- TOC entry 3755 (class 0 OID 0)
-- Dependencies: 254
-- Name: especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('especie_seq', 10, true);


--
-- TOC entry 3640 (class 0 OID 27638)
-- Dependencies: 207
-- Data for Name: mb_captura; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (69, 98, 1, 3);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (70, 98, 2, NULL);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (71, 98, 3, NULL);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (72, 99, 3, 6);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (73, 99, 1, NULL);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (74, 99, 2, NULL);
INSERT INTO mb_captura (id_capt, id_lance, id_ave, quantidade) VALUES (75, 100, 2, NULL);


--
-- TOC entry 3756 (class 0 OID 0)
-- Dependencies: 206
-- Name: mb_captura_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_captura_seq', 75, true);


--
-- TOC entry 3642 (class 0 OID 27644)
-- Dependencies: 209
-- Data for Name: mb_geral; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (64, 9, 21, NULL, NULL, NULL, 1, 2, 1, '2015-04-26 13:37:28', 1, '2015-05-08 01:46:10');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (65, 9, 21, NULL, NULL, NULL, 1, 1, 1, '2015-05-08 01:46:42', NULL, NULL);
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (60, 8, 23, '2012-03-01', '2015-03-07', 'aa', 1, 1, NULL, NULL, 1, '2015-06-04 18:56:44');
INSERT INTO mb_geral (id_mb, embarcacao, mestre, data_saida, data_chegada, observacao, entrevistador, petrecho, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (66, 8, 21, NULL, NULL, NULL, 1, 1, 1, '2015-06-04 18:57:07', NULL, NULL);


--
-- TOC entry 3757 (class 0 OID 0)
-- Dependencies: 208
-- Name: mb_geral_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_geral_seq', 66, true);


--
-- TOC entry 3643 (class 0 OID 27651)
-- Dependencies: 210
-- Data for Name: mb_isca; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_isca (id_isca, id_lance) VALUES (3, 98);
INSERT INTO mb_isca (id_isca, id_lance) VALUES (4, 99);


--
-- TOC entry 3758 (class 0 OID 0)
-- Dependencies: 211
-- Name: mb_isca_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_isca_seq', 1, false);


--
-- TOC entry 3646 (class 0 OID 27658)
-- Dependencies: 213
-- Data for Name: mb_lance; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (93, 1, NULL, NULL, NULL, 64, NULL, NULL, NULL, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (94, 1, NULL, NULL, NULL, 65, NULL, NULL, NULL, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (95, 1, NULL, NULL, NULL, 65, NULL, NULL, NULL, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (98, 1, '2015-03-02', 1000, 'TOTAL', 60, true, '04:35:00', '23:35:00', '0101000020E61000000000000000804B4000000000008040C0');
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (99, 2, '2015-03-02', 2000, 'PARCIAL', 60, false, NULL, NULL, NULL);
INSERT INTO mb_lance (id_lance, lance, data, anzois, mm_uso, mb_geral, ave_capt, hora_inicial, hora_final, coordenada) VALUES (100, 1, NULL, NULL, NULL, 66, NULL, NULL, NULL, NULL);


--
-- TOC entry 3759 (class 0 OID 0)
-- Dependencies: 212
-- Name: mb_lance_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_lance_seq', 100, true);


--
-- TOC entry 3760 (class 0 OID 0)
-- Dependencies: 214
-- Name: mb_medmit_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('mb_medmit_seq', 1, false);


--
-- TOC entry 3648 (class 0 OID 27664)
-- Dependencies: 215
-- Data for Name: mb_mitigatoria; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 98);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (2, 99);
INSERT INTO mb_mitigatoria (id_mm, id_lance) VALUES (3, 99);


--
-- TOC entry 3694 (class 0 OID 33693)
-- Dependencies: 261
-- Data for Name: mc_biometria; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mc_biometria (id, peso, comprimento, culmem, narina_culmem, altura_bico_base, altura_minima_bico, altura_bico_unguis, largura_bico_base, comprimento_cabeca, comprimento_asa, comprimento_cauda, comprimento_tarso, comprimento_dedo_sem_unha, comprimento_dedo_com_unha, envergadura, muda_asa, muda_cauda, muda_cabeca, muda_dorso, muda_ventre) VALUES (52, 101, 111, 121, 131, 141, 151, 161, 171, 181, 191, 201, 211, 221, 231, 241, true, false, false, false, true);


--
-- TOC entry 3693 (class 0 OID 33655)
-- Dependencies: 260
-- Data for Name: mc_captura_incidental; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mc_captura_incidental (mc_id, informacao, cruzeiro, lance, observador, mestre, embarcacao, historico, descricao_local_coleta) VALUES (52, 'cruzeiro', 67, 92, NULL, NULL, NULL, 'djajdlkasjdlkasd
dasdsad   
df

sdf
sd', 'aaaafsdfdsfsdfsdfsd
cccc');


--
-- TOC entry 3695 (class 0 OID 33703)
-- Dependencies: 262
-- Data for Name: mc_coleta_material_biologico; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mc_coleta_material_biologico (id, data_necropsia, local_necropsia, condicao_carcaca, autolise, sexagem, empetrolamento, condicao_corporal, piolho, carrapato, pulga, lepadomorpha, larvas_putrefacao, outros, outros_descricao, nematoides, acantocefalos, cestoides, trematoides, amt_encefalo, amt_medula_ossea, amt_musculo, amt_figado, amt_pulmao, amt_baco, amt_gordura, htp_pele, htp_lingua, htp_esofago, htp_ingluvio, htp_tireoide, htp_paratireoide, htp_siringe, htp_traqueia, htp_pulmao, htp_coracao, htp_proventriculo, htp_ventriculo, htp_figado, htp_vesicula_biliar, htp_baco, htp_duodeno, htp_jejuno, htp_ileo_ceco_colon, htp_pancreas, htp_cloaca, htp_rim, htp_adrenais, htp_ureter, htp_gonada, htp_bexiga, htp_oviduto, htp_bursa, htp_grandes_vasos, htp_saco_aereo, htp_timo, htp_musculo_esqueletico, htp_medula_ossea, htp_olho, htp_gld_sal, htp_encefalo, htp_cerebelo, htp_osso) VALUES (52, '2015-06-11', 'AAAA
CCCC', 'fresca', 'moderada', 'femea_incerteza', NULL, 'otimo', 'media', 'media', NULL, 'baixa', NULL, NULL, 'Carniça', 'nao_informado', 'nao_informado', 'alta', 'baixa', 'a:6:{i:0;s:12:"nao_coletado";i:1;s:13:"nao_informado";i:2;s:14:"papel_aluminio";i:3;s:15:"papel_eppendorf";i:4;s:6:"falcon";i:5;s:9:"alcool_70";}', 'a:2:{i:0;s:13:"nao_informado";i:1;s:14:"papel_aluminio";}', 'a:2:{i:0;s:13:"nao_informado";i:1;s:14:"papel_aluminio";}', 'a:2:{i:0;s:15:"papel_eppendorf";i:1;s:6:"falcon";}', 'a:2:{i:0;s:15:"papel_eppendorf";i:1;s:6:"falcon";}', 'a:1:{i:0;s:14:"papel_aluminio";}', 'a:1:{i:0;s:14:"papel_aluminio";}', false, false, true, true, false, true, false, true, true, true, true, true, true, false, false, false, false, false, false, false, false, false, false, false, false, false, false, NULL, NULL, NULL, false, false, false, false, false, false, false);


--
-- TOC entry 3696 (class 0 OID 33716)
-- Dependencies: 263
-- Data for Name: mc_outras_pesquisas; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO mc_outras_pesquisas (id, swab_cloaca, swab_coana, conteudo_estomacal, sangue_cardiaco, penas, outros, observacoes) VALUES (52, true, NULL, NULL, true, 'a:1:{i:0;s:3:"asa";}', 'sdaasdasdas
da
sd
sa', 'aadasd
da
sd
asd');


--
-- TOC entry 3692 (class 0 OID 33631)
-- Dependencies: 259
-- Data for Name: medicina_conservacao; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO medicina_conservacao (id, etiqueta, etiqueta_antiga, especie, responsavel, data_entrada, data_captura, coordenada, anilha, plumagem, procedencia, procedencia_outros, usuario_insercao, data_insercao, usuario_alteracao, data_alteracao) VALUES (52, 'A53', 'A51', 3, 'Mario 2', '2015-06-13', '2015-06-05', '0101000020E610000048E17A14AEFF60400AD7A3703DAA5340', 'AX5454', 'adulto_em_muda', NULL, NULL, 1, '2015-06-12 01:40:10', 1, '2015-06-12 02:51:59');


--
-- TOC entry 3761 (class 0 OID 0)
-- Dependencies: 258
-- Name: medicina_conservacao_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('medicina_conservacao_seq', 56, true);


--
-- TOC entry 3690 (class 0 OID 33472)
-- Dependencies: 257
-- Data for Name: municipio; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO municipio (id, nome, uf, codigo_ibge) VALUES (1, 'Itajaí', 'SC', NULL);


--
-- TOC entry 3762 (class 0 OID 0)
-- Dependencies: 256
-- Name: municipio_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('municipio_seq', 1, true);


--
-- TOC entry 3679 (class 0 OID 30104)
-- Dependencies: 246
-- Data for Name: producao_pesqueira; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO producao_pesqueira (id, cruzeiro, lance, data, boia_radio) VALUES (70, 59, NULL, NULL, NULL);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, data, boia_radio) VALUES (72, 67, 93, NULL, 47);
INSERT INTO producao_pesqueira (id, cruzeiro, lance, data, boia_radio) VALUES (74, 58, 96, NULL, NULL);


--
-- TOC entry 3681 (class 0 OID 30117)
-- Dependencies: 248
-- Data for Name: producao_pesqueira_especie; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (70, 70, 1, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (73, 74, 4, NULL, NULL);
INSERT INTO producao_pesqueira_especie (id, producao_pesqueira, especie, quantidade, predacao) VALUES (74, 74, 5, NULL, NULL);


--
-- TOC entry 3763 (class 0 OID 0)
-- Dependencies: 247
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('producao_pesqueira_especie_seq', 74, true);


--
-- TOC entry 3764 (class 0 OID 0)
-- Dependencies: 245
-- Name: producao_pesqueira_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('producao_pesqueira_seq', 74, true);


--
-- TOC entry 3649 (class 0 OID 27667)
-- Dependencies: 216
-- Data for Name: system_users; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (2, 'tiagozis@gmail.com', 'e83930dca43b04125bac395678ed61d0d3db1e03', '5515f69aa86390.99105598', 1, '2015-03-28 01:34:18', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Tiago Zis', '2');
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (213, 'digitador@email.com', 'b67a3c28932ba86d3da9f34568bce4233e3b344a', '5570eb35a48af0.06984395', 10, '2015-06-09 01:10:54', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Zé digitador', NULL);
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (1, 'admin@admin.com', '8e666f12a66c17a952a1d5e273428e478e02d943', '4f6cdddc4979b8.51434094', 1, '2015-06-11 23:39:49', '127.0.0.1', NULL, NULL, NULL, 1, 1, 'Admin', '2');
INSERT INTO system_users (id, email, password, salt, user_role_id, last_login, last_login_ip, reset_request_code, reset_request_time, reset_request_ip, verification_status, status, name, n) VALUES (211, 'teste@teste.com', '30d5417d83db69257834a4be72444c9ac8703429', '555a5e1e7d11e5.63702608', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Teste', NULL);


--
-- TOC entry 3765 (class 0 OID 0)
-- Dependencies: 217
-- Name: system_users_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('system_users_id_seq', 213, true);


--
-- TOC entry 3651 (class 0 OID 27675)
-- Dependencies: 218
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
-- TOC entry 3652 (class 0 OID 27678)
-- Dependencies: 219
-- Data for Name: user_autologin; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3653 (class 0 OID 27683)
-- Dependencies: 220
-- Data for Name: user_meta; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3654 (class 0 OID 27686)
-- Dependencies: 221
-- Data for Name: user_role; Type: TABLE DATA; Schema: sch01; Owner: -
--

INSERT INTO user_role (id, role_name, default_access) VALUES (1, 'Admin', '11111');
INSERT INTO user_role (id, role_name, default_access) VALUES (10, 'Digitador', '11111');


--
-- TOC entry 3766 (class 0 OID 0)
-- Dependencies: 222
-- Name: user_role_id_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('user_role_id_seq', 11, true);


--
-- TOC entry 3657 (class 0 OID 27693)
-- Dependencies: 224
-- Data for Name: users; Type: TABLE DATA; Schema: sch01; Owner: -
--



--
-- TOC entry 3767 (class 0 OID 0)
-- Dependencies: 223
-- Name: users_seq; Type: SEQUENCE SET; Schema: sch01; Owner: -
--

SELECT pg_catalog.setval('users_seq', 1, true);


--
-- TOC entry 3370 (class 2606 OID 27700)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 3372 (class 2606 OID 27702)
-- Name: pk_aves; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_aves
    ADD CONSTRAINT pk_aves PRIMARY KEY (id_aves);


--
-- TOC entry 3446 (class 2606 OID 33697)
-- Name: pk_biometria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT pk_biometria PRIMARY KEY (id);


--
-- TOC entry 3414 (class 2606 OID 29973)
-- Name: pk_cad_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_especie
    ADD CONSTRAINT pk_cad_especie PRIMARY KEY (id);


--
-- TOC entry 3410 (class 2606 OID 29929)
-- Name: pk_cad_financiador; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_financiador
    ADD CONSTRAINT pk_cad_financiador PRIMARY KEY (id);


--
-- TOC entry 3380 (class 2606 OID 27704)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 3388 (class 2606 OID 27706)
-- Name: pk_capt; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 3424 (class 2606 OID 30057)
-- Name: pk_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT pk_captura_incidental PRIMARY KEY (id);


--
-- TOC entry 3436 (class 2606 OID 33381)
-- Name: pk_captura_incidental_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT pk_captura_incidental_especie PRIMARY KEY (id);


--
-- TOC entry 3448 (class 2606 OID 33710)
-- Name: pk_coleta_material_biologico; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT pk_coleta_material_biologico PRIMARY KEY (id);


--
-- TOC entry 3426 (class 2606 OID 30078)
-- Name: pk_contagem_ave_boia; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT pk_contagem_ave_boia PRIMARY KEY (id);


--
-- TOC entry 3428 (class 2606 OID 30091)
-- Name: pk_contagem_ave_boia_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT pk_contagem_ave_boia_especie PRIMARY KEY (id);


--
-- TOC entry 3420 (class 2606 OID 30023)
-- Name: pk_contagem_por_sol; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT pk_contagem_por_sol PRIMARY KEY (id);


--
-- TOC entry 3422 (class 2606 OID 30036)
-- Name: pk_contagem_por_sol_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT pk_contagem_por_sol_especie PRIMARY KEY (id);


--
-- TOC entry 3434 (class 2606 OID 33358)
-- Name: pk_contagem_por_sol_indice; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT pk_contagem_por_sol_indice PRIMARY KEY (id);


--
-- TOC entry 3412 (class 2606 OID 29940)
-- Name: pk_cruzeiro; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT pk_cruzeiro PRIMARY KEY (id);


--
-- TOC entry 3416 (class 2606 OID 29981)
-- Name: pk_dados_abioticos; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT pk_dados_abioticos PRIMARY KEY (id);


--
-- TOC entry 3418 (class 2606 OID 30007)
-- Name: pk_dados_abioticos_complementar; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY dados_abioticos_complementar
    ADD CONSTRAINT pk_dados_abioticos_complementar PRIMARY KEY (id);


--
-- TOC entry 3374 (class 2606 OID 27708)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 3376 (class 2606 OID 27710)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 3378 (class 2606 OID 27712)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 3438 (class 2606 OID 33426)
-- Name: pk_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY especie
    ADD CONSTRAINT pk_especie PRIMARY KEY (id);


--
-- TOC entry 3394 (class 2606 OID 27714)
-- Name: pk_lance; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 3390 (class 2606 OID 27716)
-- Name: pk_mb; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 3392 (class 2606 OID 27718)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 3396 (class 2606 OID 27720)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 3444 (class 2606 OID 33662)
-- Name: pk_mc_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT pk_mc_captura_incidental PRIMARY KEY (mc_id);


--
-- TOC entry 3442 (class 2606 OID 33639)
-- Name: pk_medicina_conservacao; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT pk_medicina_conservacao PRIMARY KEY (id);


--
-- TOC entry 3382 (class 2606 OID 27722)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 3384 (class 2606 OID 27724)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 3440 (class 2606 OID 33477)
-- Name: pk_municipio; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (id);


--
-- TOC entry 3386 (class 2606 OID 27726)
-- Name: pk_observ; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 3450 (class 2606 OID 33723)
-- Name: pk_outras_pesquisas; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT pk_outras_pesquisas PRIMARY KEY (id);


--
-- TOC entry 3430 (class 2606 OID 30109)
-- Name: pk_producao_pesqueira; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT pk_producao_pesqueira PRIMARY KEY (id);


--
-- TOC entry 3432 (class 2606 OID 30122)
-- Name: pk_producao_pesqueira_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT pk_producao_pesqueira_especie PRIMARY KEY (id);


--
-- TOC entry 3398 (class 2606 OID 27728)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 3400 (class 2606 OID 27730)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 3402 (class 2606 OID 27732)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 3404 (class 2606 OID 27734)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 3406 (class 2606 OID 27736)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 3408 (class 2606 OID 27738)
-- Name: pk_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 3488 (class 2606 OID 33407)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3481 (class 2606 OID 33412)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3493 (class 2606 OID 33387)
-- Name: fk_captura_incidental; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_captura_incidental FOREIGN KEY (captura_incidental) REFERENCES captura_incidental(id);


--
-- TOC entry 3486 (class 2606 OID 30092)
-- Name: fk_contagem_ave_boia; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_contagem_ave_boia FOREIGN KEY (contagem_ave_boia) REFERENCES contagem_ave_boia(id);


--
-- TOC entry 3492 (class 2606 OID 33359)
-- Name: fk_contagem_por_sol; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_por_sol_indice
    ADD CONSTRAINT fk_contagem_por_sol FOREIGN KEY (contagem_por_sol) REFERENCES contagem_por_sol(id);


--
-- TOC entry 3479 (class 2606 OID 33369)
-- Name: fk_contagem_psi; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_contagem_psi FOREIGN KEY (contagem_psi) REFERENCES contagem_por_sol_indice(id);


--
-- TOC entry 3474 (class 2606 OID 29982)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3477 (class 2606 OID 30024)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3482 (class 2606 OID 30058)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3484 (class 2606 OID 30079)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3489 (class 2606 OID 30110)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3502 (class 2606 OID 33668)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3472 (class 2606 OID 30135)
-- Name: fk_dado_lancamento; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_lancamento FOREIGN KEY (dado_lancamento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3473 (class 2606 OID 30140)
-- Name: fk_dado_recolhimento; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_dado_recolhimento FOREIGN KEY (dado_recolhimento) REFERENCES dados_abioticos_complementar(id);


--
-- TOC entry 3457 (class 2606 OID 27744)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3468 (class 2606 OID 29946)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3498 (class 2606 OID 33688)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3470 (class 2606 OID 29956)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3454 (class 2606 OID 33225)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES system_users(id);


--
-- TOC entry 3494 (class 2606 OID 33427)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY captura_incidental_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3485 (class 2606 OID 33432)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_ave_boia_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3478 (class 2606 OID 33437)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_por_sol_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3490 (class 2606 OID 33442)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3452 (class 2606 OID 33447)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_especie FOREIGN KEY (id_ave) REFERENCES especie(id);


--
-- TOC entry 3497 (class 2606 OID 33640)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);


--
-- TOC entry 3471 (class 2606 OID 29961)
-- Name: fk_financiador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_financiador FOREIGN KEY (financiador) REFERENCES cad_financiador(id);


--
-- TOC entry 3475 (class 2606 OID 29987)
-- Name: fk_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY dados_abioticos
    ADD CONSTRAINT fk_isca FOREIGN KEY (tipo_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3480 (class 2606 OID 33312)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3476 (class 2606 OID 33317)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_por_sol
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3483 (class 2606 OID 33327)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY contagem_ave_boia
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3487 (class 2606 OID 33332)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY producao_pesqueira
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3501 (class 2606 OID 33673)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES dados_abioticos(id);


--
-- TOC entry 3461 (class 2606 OID 27754)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 3459 (class 2606 OID 27759)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3460 (class 2606 OID 27764)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3453 (class 2606 OID 27769)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3462 (class 2606 OID 27774)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 3463 (class 2606 OID 27779)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3503 (class 2606 OID 33663)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (mc_id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3504 (class 2606 OID 33698)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3505 (class 2606 OID 33711)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3506 (class 2606 OID 33724)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3458 (class 2606 OID 27784)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3469 (class 2606 OID 29951)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3499 (class 2606 OID 33683)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3451 (class 2606 OID 33478)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES municipio(id);


--
-- TOC entry 3467 (class 2606 OID 29941)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3500 (class 2606 OID 33678)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3491 (class 2606 OID 30123)
-- Name: fk_producao_pesqueira; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY producao_pesqueira_especie
    ADD CONSTRAINT fk_producao_pesqueira FOREIGN KEY (producao_pesqueira) REFERENCES producao_pesqueira(id);


--
-- TOC entry 3464 (class 2606 OID 33483)
-- Name: fk_user_role; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT fk_user_role FOREIGN KEY (user_role_id) REFERENCES user_role(id);


--
-- TOC entry 3455 (class 2606 OID 33230)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3465 (class 2606 OID 33240)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3496 (class 2606 OID 33645)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3456 (class 2606 OID 33235)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3466 (class 2606 OID 33245)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3495 (class 2606 OID 33650)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


-- Completed on 2015-06-11 22:11:13

--
-- PostgreSQL database dump complete
--

