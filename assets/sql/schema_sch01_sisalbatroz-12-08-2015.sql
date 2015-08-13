--
-- PostgreSQL database dump
--

-- Dumped from database version 9.3.5
-- Dumped by pg_dump version 9.3.5
-- Started on 2015-08-12 21:07:55

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
-- Name: cad_autoriz_pesca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_autoriz_pesca (
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
-- TOC entry 191 (class 1259 OID 27594)
-- Name: cad_embarcacao_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_embarcacao_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 192 (class 1259 OID 27596)
-- Name: cad_embarcacao; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_embarcacao (
    id_embarcacao integer DEFAULT nextval('cad_embarcacao_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL,
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
    autorizacao_pesca_id integer NOT NULL
);


--
-- TOC entry 3731 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.id_embarcacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.id_embarcacao IS 'Campo identificador auto incrementado para controle do Cadastro de Embarcações.';


--
-- TOC entry 3732 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.nome IS 'Campo para inserção do nome completo da Embarcação de Pesca.';


--
-- TOC entry 3733 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.reg_marinha; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_marinha IS 'Campo para inserção do número de registro da marinha da Embarcação de Pesca.';


--
-- TOC entry 3734 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.reg_mpa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.reg_mpa IS 'Campo para inserção do número do registro geral da pesca (MPA) da Embarcação.';


--
-- TOC entry 3735 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.comprim_barco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.comprim_barco IS 'Campo para inserção do comprimento da Embarcação de Pesca em metros.';


--
-- TOC entry 3736 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.arqueacao_bruta; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.arqueacao_bruta IS 'Campo para inserção da tonelagem de arqueação bruta da Embarcação de Pesca.';


--
-- TOC entry 3737 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.ano_fabricacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.ano_fabricacao IS 'Campo para inserção do ano de fabricação da Embarcação de Pesca.';


--
-- TOC entry 3738 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.mat_casco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.mat_casco IS 'Campo para inserção do material do casco da Embarcação de Pesca.';


--
-- TOC entry 3739 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.propulsao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.propulsao IS 'Campo para inserção do tipo de propulsão da Embarcação de Pesca.';


--
-- TOC entry 3740 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.potencia_motor; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.potencia_motor IS 'Campo para inserção da potência do motor da Embarcação de Pesca em HP.';


--
-- TOC entry 3741 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN cad_embarcacao.tripulacao; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_embarcacao.tripulacao IS 'Campo para inserção do número de tripulantes que a Embarcação de Pesca suporta.';


--
-- TOC entry 193 (class 1259 OID 27600)
-- Name: cad_empresa_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_empresa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 194 (class 1259 OID 27602)
-- Name: cad_empresa; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_empresa (
    id_empresa integer DEFAULT nextval('cad_empresa_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL,
    endereco character varying(225) NOT NULL,
    contato character varying(50),
    cargo character varying(20),
    telefone character varying(11),
    email character varying(100),
    municipio integer
);


--
-- TOC entry 3742 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.id_empresa; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.id_empresa IS 'Campo identificador auto incrementado para controle de Cadastro de Empresas.';


--
-- TOC entry 3743 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.nome IS 'Campo para inserção do nome completo da Empresa de Pesca.';


--
-- TOC entry 3744 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.endereco; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.endereco IS 'Campo para inserção do endereço completo da Empresa de Pesca.';


--
-- TOC entry 3745 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.contato; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.contato IS 'Campo para inserção do nome completo do contato da Empresa de Pesca.';


--
-- TOC entry 3746 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.cargo; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.cargo IS 'Campo para inserção do cargo/função do contato na Empresa de Pesca.';


--
-- TOC entry 3747 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.telefone IS 'Campo para inserção do telefone do contato na Empresa de Pesca.';


--
-- TOC entry 3748 (class 0 OID 0)
-- Dependencies: 194
-- Name: COLUMN cad_empresa.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_empresa.email IS 'Campo para inserção do endereço eletrônico do contato na Empresa de Pesca.';


--
-- TOC entry 195 (class 1259 OID 27606)
-- Name: cad_entrevistador_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_entrevistador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 196 (class 1259 OID 27608)
-- Name: cad_entrevistador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_entrevistador (
    id integer DEFAULT nextval('cad_entrevistador_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 252 (class 1259 OID 33419)
-- Name: especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 253 (class 1259 OID 33421)
-- Name: cad_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_especie (
    id integer DEFAULT nextval('especie_seq'::regclass) NOT NULL,
    nome_cientifico character varying(100) NOT NULL,
    nome_comum_br character varying(100) NOT NULL,
    nome_comum_en character varying(100),
    tipo character varying(20) NOT NULL
);


--
-- TOC entry 228 (class 1259 OID 29966)
-- Name: cad_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 224 (class 1259 OID 29922)
-- Name: cad_financiador_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_financiador_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 225 (class 1259 OID 29924)
-- Name: cad_financiador; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_financiador (
    id integer DEFAULT nextval('cad_financiador_seq'::regclass) NOT NULL,
    nome character varying(100) NOT NULL
);


--
-- TOC entry 197 (class 1259 OID 27612)
-- Name: cad_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 198 (class 1259 OID 27614)
-- Name: cad_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_isca (
    id_isca integer DEFAULT nextval('cad_isca_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 199 (class 1259 OID 27618)
-- Name: cad_medida_metigatoria_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_medida_metigatoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 200 (class 1259 OID 27620)
-- Name: cad_medida_metigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_medida_metigatoria (
    id_medida_metigatoria integer DEFAULT nextval('cad_medida_metigatoria_seq'::regclass) NOT NULL,
    nome character varying(50) NOT NULL
);


--
-- TOC entry 201 (class 1259 OID 27624)
-- Name: cad_mestre_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_mestre_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 202 (class 1259 OID 27626)
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
-- TOC entry 3749 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN cad_mestre.id_mestre; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.id_mestre IS 'Campo identificador auto incrementado de Mestres de Pesca.';


--
-- TOC entry 3750 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN cad_mestre.nome; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.nome IS 'Campo para inserção do nome completo do Mestre de Pesca.';


--
-- TOC entry 3751 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN cad_mestre.apelido; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.apelido IS 'Campo para inserção do apelido do Mestre de Pesca.';


--
-- TOC entry 3752 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN cad_mestre.telefone; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.telefone IS 'Campo para inserção do número de telefone do Mestre de Pesca, considerando código DDD plus número telefônico.';


--
-- TOC entry 3753 (class 0 OID 0)
-- Dependencies: 202
-- Name: COLUMN cad_mestre.email; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN cad_mestre.email IS 'Campo para inserção do endereço eletrônico do Mestre de Pesca.';


--
-- TOC entry 254 (class 1259 OID 33470)
-- Name: municipio_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE municipio_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 255 (class 1259 OID 33472)
-- Name: cad_municipio; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_municipio (
    id integer DEFAULT nextval('municipio_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL,
    uf character varying(3) NOT NULL,
    codigo_ibge integer
);


--
-- TOC entry 203 (class 1259 OID 27630)
-- Name: cad_observ_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cad_observ_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 204 (class 1259 OID 27632)
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
    municipio integer
);


--
-- TOC entry 264 (class 1259 OID 33746)
-- Name: porto_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE porto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 268 (class 1259 OID 33755)
-- Name: cad_porto; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cad_porto (
    id integer DEFAULT nextval('porto_seq'::regclass) NOT NULL,
    nome character varying(150) NOT NULL
);


--
-- TOC entry 250 (class 1259 OID 33374)
-- Name: captura_incidental_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE captura_incidental_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 237 (class 1259 OID 30047)
-- Name: captura_incidental_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE captura_incidental_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 241 (class 1259 OID 30084)
-- Name: contagem_ave_boia_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_ave_boia_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 239 (class 1259 OID 30068)
-- Name: contagem_ave_boia_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_ave_boia_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 235 (class 1259 OID 30029)
-- Name: contagem_por_sol_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 248 (class 1259 OID 33351)
-- Name: contagem_por_sol_indice_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_indice_seq
    START WITH 27
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 233 (class 1259 OID 30013)
-- Name: contagem_por_sol_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE contagem_por_sol_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 238 (class 1259 OID 30049)
-- Name: cr_captura_incidental; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_captura_incidental (
    id integer DEFAULT nextval('captura_incidental_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    data date,
    coordenada public.geometry,
    boia_radio integer
);


--
-- TOC entry 251 (class 1259 OID 33376)
-- Name: cr_captura_incidental_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_captura_incidental_especie (
    id integer DEFAULT nextval('captura_incidental_especie_seq'::regclass) NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    etiqueta integer,
    captura_incidental integer
);


--
-- TOC entry 240 (class 1259 OID 30070)
-- Name: cr_contagem_ave_boia; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_contagem_ave_boia (
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
-- TOC entry 242 (class 1259 OID 30086)
-- Name: cr_contagem_ave_boia_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_contagem_ave_boia_especie (
    id integer DEFAULT nextval('contagem_ave_boia_especie_seq'::regclass) NOT NULL,
    contagem_ave_boia integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 234 (class 1259 OID 30015)
-- Name: cr_contagem_por_sol; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_contagem_por_sol (
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
-- TOC entry 236 (class 1259 OID 30031)
-- Name: cr_contagem_por_sol_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_contagem_por_sol_especie (
    id integer DEFAULT nextval('contagem_por_sol_especie_seq'::regclass) NOT NULL,
    contagem_psi integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    tipo_individuo character varying(30)
);


--
-- TOC entry 249 (class 1259 OID 33353)
-- Name: cr_contagem_por_sol_indice; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_contagem_por_sol_indice (
    id integer DEFAULT nextval('contagem_por_sol_indice_seq'::regclass) NOT NULL,
    contagem_por_sol integer NOT NULL,
    indice integer,
    hora time without time zone,
    total integer
);


--
-- TOC entry 229 (class 1259 OID 29974)
-- Name: dados_abioticos_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE dados_abioticos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 230 (class 1259 OID 29976)
-- Name: cr_dados_abioticos; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_dados_abioticos (
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


--
-- TOC entry 231 (class 1259 OID 29997)
-- Name: dados_abioticos_complementar_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE dados_abioticos_complementar_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 232 (class 1259 OID 29999)
-- Name: cr_dados_abioticos_complementar; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_dados_abioticos_complementar (
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
-- TOC entry 262 (class 1259 OID 33729)
-- Name: cr_dados_abioticos_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_dados_abioticos_isca (
    id_isca integer NOT NULL,
    id_dados_abioticos integer NOT NULL
);


--
-- TOC entry 243 (class 1259 OID 30102)
-- Name: producao_pesqueira_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE producao_pesqueira_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 244 (class 1259 OID 30104)
-- Name: cr_producao_pesqueira; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_producao_pesqueira (
    id integer DEFAULT nextval('producao_pesqueira_seq'::regclass) NOT NULL,
    cruzeiro integer NOT NULL,
    lance integer,
    boia_radio integer
);


--
-- TOC entry 245 (class 1259 OID 30115)
-- Name: producao_pesqueira_especie_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE producao_pesqueira_especie_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 246 (class 1259 OID 30117)
-- Name: cr_producao_pesqueira_especie; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE cr_producao_pesqueira_especie (
    id integer DEFAULT nextval('producao_pesqueira_especie_seq'::regclass) NOT NULL,
    producao_pesqueira integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer,
    predacao character varying(255)
);


--
-- TOC entry 226 (class 1259 OID 29930)
-- Name: cruzeiro_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cruzeiro_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 227 (class 1259 OID 29932)
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
-- TOC entry 247 (class 1259 OID 33289)
-- Name: cruzeiro_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE cruzeiro_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 265 (class 1259 OID 33748)
-- Name: entrevista_cais_area_pesca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE entrevista_cais_area_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 271 (class 1259 OID 33767)
-- Name: ec_area_pesca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_area_pesca (
    id integer DEFAULT nextval('entrevista_cais_area_pesca_seq'::regclass) NOT NULL,
    entrevista_cais integer NOT NULL,
    nome character varying(150) NOT NULL,
    profundidade_inicial integer,
    profundidade_final integer
);


--
-- TOC entry 266 (class 1259 OID 33750)
-- Name: entrevista_cais_captura_ave_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE entrevista_cais_captura_ave_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 272 (class 1259 OID 33771)
-- Name: ec_captura_ave; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_captura_ave (
    id integer DEFAULT nextval('entrevista_cais_captura_ave_seq'::regclass) NOT NULL,
    entrevista_cais integer NOT NULL,
    especie integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 267 (class 1259 OID 33752)
-- Name: petrecho_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE petrecho_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 269 (class 1259 OID 33759)
-- Name: ec_petrecho; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_petrecho (
    id integer DEFAULT nextval('petrecho_seq'::regclass) NOT NULL,
    tipo character varying(50) NOT NULL
);


--
-- TOC entry 277 (class 1259 OID 33929)
-- Name: ec_petrecho_arrasto; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_petrecho_arrasto (
    id integer NOT NULL,
    tipo_arrasto character varying(20),
    numero_arrastos_dia integer,
    tempo_medio_arrasto time without time zone
);


--
-- TOC entry 275 (class 1259 OID 33909)
-- Name: ec_petrecho_cerco; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_petrecho_cerco (
    id integer NOT NULL,
    comprimento_rede integer,
    altura_rede integer,
    numero_cercos_totais integer,
    tempo_estimado_cercamento time without time zone,
    tempo_estimado_recolhimento time without time zone
);


--
-- TOC entry 276 (class 1259 OID 33919)
-- Name: ec_petrecho_emalhe; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 273 (class 1259 OID 33886)
-- Name: ec_petrecho_espinhel; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 274 (class 1259 OID 33896)
-- Name: ec_petrecho_linha_mao; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 278 (class 1259 OID 33964)
-- Name: ec_petrecho_vara_isca_viva; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE ec_petrecho_vara_isca_viva (
    id integer NOT NULL,
    dias_isca integer,
    dias_capeando integer,
    total_lances integer,
    numero_pescadores integer,
    boia boolean
);


--
-- TOC entry 263 (class 1259 OID 33744)
-- Name: entrevista_cais_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE entrevista_cais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 270 (class 1259 OID 33763)
-- Name: entrevista_cais; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
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


--
-- TOC entry 279 (class 1259 OID 33995)
-- Name: log_sistema_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE log_sistema_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 280 (class 1259 OID 33997)
-- Name: log_sistema; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE log_sistema (
    id integer DEFAULT nextval('log_sistema_seq'::regclass) NOT NULL,
    usuario integer NOT NULL,
    data_hora timestamp without time zone NOT NULL,
    controller character varying(100),
    acao character varying(100),
    ip character varying(100),
    info character varying(255),
    descricao text,
    dados_requisicao text,
    dados_salvos text
);


--
-- TOC entry 205 (class 1259 OID 27636)
-- Name: mb_captura_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_captura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 206 (class 1259 OID 27638)
-- Name: mb_captura; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_captura (
    id_capt integer DEFAULT nextval('mb_captura_seq'::regclass) NOT NULL,
    id_lance integer NOT NULL,
    id_ave integer NOT NULL,
    quantidade integer
);


--
-- TOC entry 207 (class 1259 OID 27642)
-- Name: mb_geral_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_geral_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 208 (class 1259 OID 27644)
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
-- TOC entry 3754 (class 0 OID 0)
-- Dependencies: 208
-- Name: COLUMN mb_geral.petrecho; Type: COMMENT; Schema: sch01; Owner: -
--

COMMENT ON COLUMN mb_geral.petrecho IS '1 - espinhel de superfície; 2 - espinhel de fundo';


--
-- TOC entry 209 (class 1259 OID 27651)
-- Name: mb_isca; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_isca (
    id_isca integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 210 (class 1259 OID 27654)
-- Name: mb_isca_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_isca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 211 (class 1259 OID 27656)
-- Name: mb_lance_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_lance_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 212 (class 1259 OID 27658)
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
    coordenada public.geometry,
    ponteira_peso integer,
    ponteira_distancia numeric(10,2)
);


--
-- TOC entry 213 (class 1259 OID 27662)
-- Name: mb_medmit_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE mb_medmit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 214 (class 1259 OID 27664)
-- Name: mb_mitigatoria; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE mb_mitigatoria (
    id_mm integer NOT NULL,
    id_lance integer NOT NULL
);


--
-- TOC entry 259 (class 1259 OID 33693)
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
-- TOC entry 258 (class 1259 OID 33655)
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
-- TOC entry 260 (class 1259 OID 33703)
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
-- TOC entry 261 (class 1259 OID 33716)
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
-- TOC entry 256 (class 1259 OID 33510)
-- Name: medicina_conservacao_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE medicina_conservacao_seq
    START WITH 20
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 257 (class 1259 OID 33631)
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
-- TOC entry 215 (class 1259 OID 27667)
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
-- TOC entry 216 (class 1259 OID 27673)
-- Name: system_users_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE system_users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3755 (class 0 OID 0)
-- Dependencies: 216
-- Name: system_users_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE system_users_id_seq OWNED BY system_users.id;


--
-- TOC entry 217 (class 1259 OID 27675)
-- Name: user_access_map; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_access_map (
    user_role_id integer NOT NULL,
    controller character varying(255) NOT NULL,
    permission integer
);


--
-- TOC entry 218 (class 1259 OID 27678)
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
-- TOC entry 219 (class 1259 OID 27683)
-- Name: user_meta; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_meta (
    user_id bigint NOT NULL,
    first_name character varying(100),
    last_name character varying(100),
    phone character varying(100)
);


--
-- TOC entry 220 (class 1259 OID 27686)
-- Name: user_role; Type: TABLE; Schema: sch01; Owner: -; Tablespace: 
--

CREATE TABLE user_role (
    id integer NOT NULL,
    role_name character varying(50),
    default_access character varying(10)
);


--
-- TOC entry 221 (class 1259 OID 27689)
-- Name: user_role_id_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE user_role_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 3756 (class 0 OID 0)
-- Dependencies: 221
-- Name: user_role_id_seq; Type: SEQUENCE OWNED BY; Schema: sch01; Owner: -
--

ALTER SEQUENCE user_role_id_seq OWNED BY user_role.id;


--
-- TOC entry 222 (class 1259 OID 27691)
-- Name: users_seq; Type: SEQUENCE; Schema: sch01; Owner: -
--

CREATE SEQUENCE users_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- TOC entry 223 (class 1259 OID 27693)
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
-- TOC entry 3404 (class 2604 OID 27697)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY system_users ALTER COLUMN id SET DEFAULT nextval('system_users_id_seq'::regclass);


--
-- TOC entry 3407 (class 2604 OID 27698)
-- Name: id; Type: DEFAULT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY user_role ALTER COLUMN id SET DEFAULT nextval('user_role_id_seq'::regclass);


--
-- TOC entry 3432 (class 2606 OID 27700)
-- Name: pk_auto_pesca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_autoriz_pesca
    ADD CONSTRAINT pk_auto_pesca PRIMARY KEY (id_auto_pesca);


--
-- TOC entry 3504 (class 2606 OID 33697)
-- Name: pk_biometria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT pk_biometria PRIMARY KEY (id);


--
-- TOC entry 3470 (class 2606 OID 29929)
-- Name: pk_cad_financiador; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_financiador
    ADD CONSTRAINT pk_cad_financiador PRIMARY KEY (id);


--
-- TOC entry 3440 (class 2606 OID 27704)
-- Name: pk_cad_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_isca
    ADD CONSTRAINT pk_cad_isca PRIMARY KEY (id_isca);


--
-- TOC entry 3448 (class 2606 OID 27706)
-- Name: pk_capt; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT pk_capt PRIMARY KEY (id_capt);


--
-- TOC entry 3482 (class 2606 OID 30057)
-- Name: pk_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_captura_incidental
    ADD CONSTRAINT pk_captura_incidental PRIMARY KEY (id);


--
-- TOC entry 3494 (class 2606 OID 33381)
-- Name: pk_captura_incidental_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_captura_incidental_especie
    ADD CONSTRAINT pk_captura_incidental_especie PRIMARY KEY (id);


--
-- TOC entry 3506 (class 2606 OID 33710)
-- Name: pk_coleta_material_biologico; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT pk_coleta_material_biologico PRIMARY KEY (id);


--
-- TOC entry 3484 (class 2606 OID 30078)
-- Name: pk_contagem_ave_boia; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_contagem_ave_boia
    ADD CONSTRAINT pk_contagem_ave_boia PRIMARY KEY (id);


--
-- TOC entry 3486 (class 2606 OID 30091)
-- Name: pk_contagem_ave_boia_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_contagem_ave_boia_especie
    ADD CONSTRAINT pk_contagem_ave_boia_especie PRIMARY KEY (id);


--
-- TOC entry 3478 (class 2606 OID 30023)
-- Name: pk_contagem_por_sol; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_contagem_por_sol
    ADD CONSTRAINT pk_contagem_por_sol PRIMARY KEY (id);


--
-- TOC entry 3480 (class 2606 OID 30036)
-- Name: pk_contagem_por_sol_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_contagem_por_sol_especie
    ADD CONSTRAINT pk_contagem_por_sol_especie PRIMARY KEY (id);


--
-- TOC entry 3492 (class 2606 OID 33358)
-- Name: pk_contagem_por_sol_indice; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_contagem_por_sol_indice
    ADD CONSTRAINT pk_contagem_por_sol_indice PRIMARY KEY (id);


--
-- TOC entry 3472 (class 2606 OID 29940)
-- Name: pk_cruzeiro; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT pk_cruzeiro PRIMARY KEY (id);


--
-- TOC entry 3474 (class 2606 OID 29981)
-- Name: pk_dados_abioticos; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_dados_abioticos
    ADD CONSTRAINT pk_dados_abioticos PRIMARY KEY (id);


--
-- TOC entry 3476 (class 2606 OID 30007)
-- Name: pk_dados_abioticos_complementar; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_dados_abioticos_complementar
    ADD CONSTRAINT pk_dados_abioticos_complementar PRIMARY KEY (id);


--
-- TOC entry 3510 (class 2606 OID 33733)
-- Name: pk_dados_abioticos_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_dados_abioticos_isca
    ADD CONSTRAINT pk_dados_abioticos_isca PRIMARY KEY (id_isca, id_dados_abioticos);


--
-- TOC entry 3434 (class 2606 OID 27708)
-- Name: pk_embarcacao; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT pk_embarcacao PRIMARY KEY (id_embarcacao);


--
-- TOC entry 3436 (class 2606 OID 27710)
-- Name: pk_empresa; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT pk_empresa PRIMARY KEY (id_empresa);


--
-- TOC entry 3516 (class 2606 OID 33778)
-- Name: pk_entrevista_cais; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT pk_entrevista_cais PRIMARY KEY (id);


--
-- TOC entry 3518 (class 2606 OID 33780)
-- Name: pk_entrevista_cais_area_pesca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_area_pesca
    ADD CONSTRAINT pk_entrevista_cais_area_pesca PRIMARY KEY (id);


--
-- TOC entry 3520 (class 2606 OID 33782)
-- Name: pk_entrevista_cais_captura_ave; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT pk_entrevista_cais_captura_ave PRIMARY KEY (id);


--
-- TOC entry 3438 (class 2606 OID 27712)
-- Name: pk_entrevistador; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_entrevistador
    ADD CONSTRAINT pk_entrevistador PRIMARY KEY (id);


--
-- TOC entry 3496 (class 2606 OID 33426)
-- Name: pk_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_especie
    ADD CONSTRAINT pk_especie PRIMARY KEY (id);


--
-- TOC entry 3454 (class 2606 OID 27714)
-- Name: pk_lance; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT pk_lance PRIMARY KEY (id_lance);


--
-- TOC entry 3534 (class 2606 OID 34005)
-- Name: pk_log_sistema; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY log_sistema
    ADD CONSTRAINT pk_log_sistema PRIMARY KEY (id);


--
-- TOC entry 3450 (class 2606 OID 27716)
-- Name: pk_mb; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT pk_mb PRIMARY KEY (id_mb);


--
-- TOC entry 3452 (class 2606 OID 27718)
-- Name: pk_mb_isca; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT pk_mb_isca PRIMARY KEY (id_isca, id_lance);


--
-- TOC entry 3456 (class 2606 OID 27720)
-- Name: pk_mb_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT pk_mb_metigatoria PRIMARY KEY (id_mm, id_lance);


--
-- TOC entry 3502 (class 2606 OID 33662)
-- Name: pk_mc_captura_incidental; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT pk_mc_captura_incidental PRIMARY KEY (mc_id);


--
-- TOC entry 3500 (class 2606 OID 33639)
-- Name: pk_medicina_conservacao; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT pk_medicina_conservacao PRIMARY KEY (id);


--
-- TOC entry 3442 (class 2606 OID 27722)
-- Name: pk_medida_metigatoria; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_medida_metigatoria
    ADD CONSTRAINT pk_medida_metigatoria PRIMARY KEY (id_medida_metigatoria);


--
-- TOC entry 3444 (class 2606 OID 27724)
-- Name: pk_mestre; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_mestre
    ADD CONSTRAINT pk_mestre PRIMARY KEY (id_mestre);


--
-- TOC entry 3498 (class 2606 OID 33477)
-- Name: pk_municipio; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_municipio
    ADD CONSTRAINT pk_municipio PRIMARY KEY (id);


--
-- TOC entry 3446 (class 2606 OID 27726)
-- Name: pk_observ; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT pk_observ PRIMARY KEY (id_observ);


--
-- TOC entry 3508 (class 2606 OID 33723)
-- Name: pk_outras_pesquisas; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT pk_outras_pesquisas PRIMARY KEY (id);


--
-- TOC entry 3514 (class 2606 OID 33784)
-- Name: pk_petrecho; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho
    ADD CONSTRAINT pk_petrecho PRIMARY KEY (id);


--
-- TOC entry 3530 (class 2606 OID 33933)
-- Name: pk_petrecho_arrasto; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_arrasto
    ADD CONSTRAINT pk_petrecho_arrasto PRIMARY KEY (id);


--
-- TOC entry 3522 (class 2606 OID 33890)
-- Name: pk_petrecho_espinhel; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_espinhel
    ADD CONSTRAINT pk_petrecho_espinhel PRIMARY KEY (id);


--
-- TOC entry 3524 (class 2606 OID 33979)
-- Name: pk_petrecho_linha; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_linha_mao
    ADD CONSTRAINT pk_petrecho_linha PRIMARY KEY (id);


--
-- TOC entry 3526 (class 2606 OID 33913)
-- Name: pk_petrecho_rede; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_cerco
    ADD CONSTRAINT pk_petrecho_rede PRIMARY KEY (id);


--
-- TOC entry 3528 (class 2606 OID 33923)
-- Name: pk_petrecho_rede_pano; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_emalhe
    ADD CONSTRAINT pk_petrecho_rede_pano PRIMARY KEY (id);


--
-- TOC entry 3532 (class 2606 OID 33968)
-- Name: pk_petrecho_vara_isca_viva; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY ec_petrecho_vara_isca_viva
    ADD CONSTRAINT pk_petrecho_vara_isca_viva PRIMARY KEY (id);


--
-- TOC entry 3512 (class 2606 OID 33776)
-- Name: pk_porto; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cad_porto
    ADD CONSTRAINT pk_porto PRIMARY KEY (id);


--
-- TOC entry 3488 (class 2606 OID 30109)
-- Name: pk_producao_pesqueira; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_producao_pesqueira
    ADD CONSTRAINT pk_producao_pesqueira PRIMARY KEY (id);


--
-- TOC entry 3490 (class 2606 OID 30122)
-- Name: pk_producao_pesqueira_especie; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY cr_producao_pesqueira_especie
    ADD CONSTRAINT pk_producao_pesqueira_especie PRIMARY KEY (id);


--
-- TOC entry 3458 (class 2606 OID 27728)
-- Name: pk_system_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT pk_system_users PRIMARY KEY (id);


--
-- TOC entry 3460 (class 2606 OID 27730)
-- Name: pk_user_access_map; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_access_map
    ADD CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id, controller);


--
-- TOC entry 3462 (class 2606 OID 27732)
-- Name: pk_user_autologin; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_autologin
    ADD CONSTRAINT pk_user_autologin PRIMARY KEY (key_id, user_id);


--
-- TOC entry 3464 (class 2606 OID 27734)
-- Name: pk_user_meta; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_meta
    ADD CONSTRAINT pk_user_meta PRIMARY KEY (user_id);


--
-- TOC entry 3466 (class 2606 OID 27736)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (id);


--
-- TOC entry 3468 (class 2606 OID 27738)
-- Name: pk_users; Type: CONSTRAINT; Schema: sch01; Owner: -; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT pk_users PRIMARY KEY (id_users);


--
-- TOC entry 3536 (class 2606 OID 33990)
-- Name: fk_autorizacao_pesca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT fk_autorizacao_pesca FOREIGN KEY (autorizacao_pesca_id) REFERENCES cad_autoriz_pesca(id_auto_pesca);


--
-- TOC entry 3574 (class 2606 OID 33407)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_producao_pesqueira
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES cr_contagem_ave_boia(id);


--
-- TOC entry 3567 (class 2606 OID 33412)
-- Name: fk_boia_radio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_captura_incidental
    ADD CONSTRAINT fk_boia_radio FOREIGN KEY (boia_radio) REFERENCES cr_contagem_ave_boia(id);


--
-- TOC entry 3579 (class 2606 OID 33387)
-- Name: fk_captura_incidental; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_captura_incidental_especie
    ADD CONSTRAINT fk_captura_incidental FOREIGN KEY (captura_incidental) REFERENCES cr_captura_incidental(id);


--
-- TOC entry 3572 (class 2606 OID 30092)
-- Name: fk_contagem_ave_boia; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_ave_boia_especie
    ADD CONSTRAINT fk_contagem_ave_boia FOREIGN KEY (contagem_ave_boia) REFERENCES cr_contagem_ave_boia(id);


--
-- TOC entry 3578 (class 2606 OID 33359)
-- Name: fk_contagem_por_sol; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_por_sol_indice
    ADD CONSTRAINT fk_contagem_por_sol FOREIGN KEY (contagem_por_sol) REFERENCES cr_contagem_por_sol(id);


--
-- TOC entry 3565 (class 2606 OID 33369)
-- Name: fk_contagem_psi; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_por_sol_especie
    ADD CONSTRAINT fk_contagem_psi FOREIGN KEY (contagem_psi) REFERENCES cr_contagem_por_sol_indice(id);


--
-- TOC entry 3561 (class 2606 OID 29982)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_dados_abioticos
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3563 (class 2606 OID 30024)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_por_sol
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3568 (class 2606 OID 30058)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3570 (class 2606 OID 30079)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_ave_boia
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3575 (class 2606 OID 30110)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_producao_pesqueira
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3585 (class 2606 OID 33668)
-- Name: fk_cruzeiro; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro) REFERENCES cruzeiro(id);


--
-- TOC entry 3559 (class 2606 OID 30135)
-- Name: fk_dado_lancamento; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_dados_abioticos
    ADD CONSTRAINT fk_dado_lancamento FOREIGN KEY (dado_lancamento) REFERENCES cr_dados_abioticos_complementar(id);


--
-- TOC entry 3560 (class 2606 OID 30140)
-- Name: fk_dado_recolhimento; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_dados_abioticos
    ADD CONSTRAINT fk_dado_recolhimento FOREIGN KEY (dado_recolhimento) REFERENCES cr_dados_abioticos_complementar(id);


--
-- TOC entry 3593 (class 2606 OID 33734)
-- Name: fk_dados_abioticos_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3594 (class 2606 OID 33739)
-- Name: fk_dados_abioticos_isca_dados_abioticos; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_dados_abioticos_isca
    ADD CONSTRAINT fk_dados_abioticos_isca_dados_abioticos FOREIGN KEY (id_dados_abioticos) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3544 (class 2606 OID 27744)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3555 (class 2606 OID 29946)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3589 (class 2606 OID 33688)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3598 (class 2606 OID 33800)
-- Name: fk_embarcacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);


--
-- TOC entry 3557 (class 2606 OID 29956)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3596 (class 2606 OID 33790)
-- Name: fk_empresa; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);


--
-- TOC entry 3603 (class 2606 OID 33825)
-- Name: fk_entrevista_cais; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_area_pesca
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);


--
-- TOC entry 3604 (class 2606 OID 33830)
-- Name: fk_entrevista_cais; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);


--
-- TOC entry 3541 (class 2606 OID 33225)
-- Name: fk_entrevistador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES system_users(id);


--
-- TOC entry 3580 (class 2606 OID 33427)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_captura_incidental_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3571 (class 2606 OID 33432)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_ave_boia_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3564 (class 2606 OID 33437)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_por_sol_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3576 (class 2606 OID 33442)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_producao_pesqueira_especie
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3539 (class 2606 OID 33447)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_especie FOREIGN KEY (id_ave) REFERENCES cad_especie(id);


--
-- TOC entry 3581 (class 2606 OID 33640)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3605 (class 2606 OID 33835)
-- Name: fk_especie; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_captura_ave
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_especie(id);


--
-- TOC entry 3558 (class 2606 OID 29961)
-- Name: fk_financiador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_financiador FOREIGN KEY (financiador) REFERENCES cad_financiador(id);


--
-- TOC entry 3566 (class 2606 OID 33312)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3562 (class 2606 OID 33317)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_por_sol
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3569 (class 2606 OID 33327)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_contagem_ave_boia
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3573 (class 2606 OID 33332)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_producao_pesqueira
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3586 (class 2606 OID 33673)
-- Name: fk_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_lance FOREIGN KEY (lance) REFERENCES cr_dados_abioticos(id);


--
-- TOC entry 3548 (class 2606 OID 27754)
-- Name: fk_mb_geral; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_lance
    ADD CONSTRAINT fk_mb_geral FOREIGN KEY (mb_geral) REFERENCES mb_geral(id_mb);


--
-- TOC entry 3546 (class 2606 OID 27759)
-- Name: fk_mb_isca_cad_isca; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_cad_isca FOREIGN KEY (id_isca) REFERENCES cad_isca(id_isca);


--
-- TOC entry 3547 (class 2606 OID 27764)
-- Name: fk_mb_isca_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_isca
    ADD CONSTRAINT fk_mb_isca_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3540 (class 2606 OID 27769)
-- Name: fk_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_captura
    ADD CONSTRAINT fk_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3549 (class 2606 OID 27774)
-- Name: fk_mb_metigatoria_cad_medida_metigatoria; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_cad_medida_metigatoria FOREIGN KEY (id_mm) REFERENCES cad_medida_metigatoria(id_medida_metigatoria);


--
-- TOC entry 3550 (class 2606 OID 27779)
-- Name: fk_mb_metigatoria_mb_lance; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_mitigatoria
    ADD CONSTRAINT fk_mb_metigatoria_mb_lance FOREIGN KEY (id_lance) REFERENCES mb_lance(id_lance);


--
-- TOC entry 3584 (class 2606 OID 33663)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (mc_id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3590 (class 2606 OID 33698)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_biometria
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3591 (class 2606 OID 33711)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_coleta_material_biologico
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3592 (class 2606 OID 33724)
-- Name: fk_medicina_conservacao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_outras_pesquisas
    ADD CONSTRAINT fk_medicina_conservacao FOREIGN KEY (id) REFERENCES medicina_conservacao(id);


--
-- TOC entry 3545 (class 2606 OID 27784)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3556 (class 2606 OID 29951)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3588 (class 2606 OID 33683)
-- Name: fk_mestre; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_mestre FOREIGN KEY (mestre) REFERENCES cad_mestre(id_mestre);


--
-- TOC entry 3535 (class 2606 OID 33478)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cad_embarcacao
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES cad_municipio(id);


--
-- TOC entry 3597 (class 2606 OID 33795)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES cad_municipio(id);


--
-- TOC entry 3537 (class 2606 OID 33980)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cad_empresa
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES cad_municipio(id);


--
-- TOC entry 3538 (class 2606 OID 33985)
-- Name: fk_municipio; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cad_observador
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES cad_municipio(id);


--
-- TOC entry 3554 (class 2606 OID 29941)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3587 (class 2606 OID 33678)
-- Name: fk_observador; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mc_captura_incidental
    ADD CONSTRAINT fk_observador FOREIGN KEY (observador) REFERENCES cad_observador(id_observ);


--
-- TOC entry 3600 (class 2606 OID 33810)
-- Name: fk_petrecho; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_petrecho FOREIGN KEY (petrecho) REFERENCES ec_petrecho(id);


--
-- TOC entry 3610 (class 2606 OID 33944)
-- Name: fk_petrecho_arrasto; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_arrasto
    ADD CONSTRAINT fk_petrecho_arrasto FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3606 (class 2606 OID 33949)
-- Name: fk_petrecho_espinhel; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_espinhel
    ADD CONSTRAINT fk_petrecho_espinhel FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3607 (class 2606 OID 33939)
-- Name: fk_petrecho_linha; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_linha_mao
    ADD CONSTRAINT fk_petrecho_linha FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3608 (class 2606 OID 33954)
-- Name: fk_petrecho_rede; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_cerco
    ADD CONSTRAINT fk_petrecho_rede FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3609 (class 2606 OID 33959)
-- Name: fk_petrecho_rede_pano; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_emalhe
    ADD CONSTRAINT fk_petrecho_rede_pano FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3611 (class 2606 OID 33969)
-- Name: fk_petrecho_vara_isca_viva; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY ec_petrecho_vara_isca_viva
    ADD CONSTRAINT fk_petrecho_vara_isca_viva FOREIGN KEY (id) REFERENCES ec_petrecho(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3599 (class 2606 OID 33805)
-- Name: fk_porto_saida; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_porto_saida FOREIGN KEY (porto_saida) REFERENCES cad_porto(id);


--
-- TOC entry 3577 (class 2606 OID 30123)
-- Name: fk_producao_pesqueira; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cr_producao_pesqueira_especie
    ADD CONSTRAINT fk_producao_pesqueira FOREIGN KEY (producao_pesqueira) REFERENCES cr_producao_pesqueira(id);


--
-- TOC entry 3595 (class 2606 OID 33785)
-- Name: fk_responsavel_campo; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_responsavel_campo FOREIGN KEY (responsavel_campo) REFERENCES system_users(id);


--
-- TOC entry 3551 (class 2606 OID 33483)
-- Name: fk_user_role; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY system_users
    ADD CONSTRAINT fk_user_role FOREIGN KEY (user_role_id) REFERENCES user_role(id);


--
-- TOC entry 3612 (class 2606 OID 34006)
-- Name: fk_usuario; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY log_sistema
    ADD CONSTRAINT fk_usuario FOREIGN KEY (usuario) REFERENCES system_users(id);


--
-- TOC entry 3542 (class 2606 OID 33230)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3552 (class 2606 OID 33240)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3582 (class 2606 OID 33645)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3601 (class 2606 OID 33815)
-- Name: fk_usuario_alteracao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);


--
-- TOC entry 3543 (class 2606 OID 33235)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY mb_geral
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3553 (class 2606 OID 33245)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY cruzeiro
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3583 (class 2606 OID 33650)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY medicina_conservacao
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


--
-- TOC entry 3602 (class 2606 OID 33820)
-- Name: fk_usuario_insercao; Type: FK CONSTRAINT; Schema: sch01; Owner: -
--

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);


-- Completed on 2015-08-12 21:07:56

--
-- PostgreSQL database dump complete
--

