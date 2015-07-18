CREATE SEQUENCE entrevista_cais_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
CREATE SEQUENCE porto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
CREATE SEQUENCE entrevista_cais_area_pesca_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


CREATE SEQUENCE entrevista_cais_captura_ave_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
CREATE SEQUENCE petrecho_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
	
	
CREATE TABLE porto (
    id integer DEFAULT nextval('porto_seq'::regclass) NOT NULL,
	nome character varying(150) NOT NULL	
);
	
CREATE TABLE petrecho (
    id integer DEFAULT nextval('petrecho_seq'::regclass) NOT NULL,
	tipo character varying(50) NOT NULL
);	
	
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

CREATE TABLE entrevista_cais_area_pesca (
    id integer DEFAULT nextval('entrevista_cais_area_pesca_seq'::regclass) NOT NULL,
	entrevista_cais integer NOT NULL,
	nome character varying(150) NOT NULL,
	profundidade_inicial integer,
	profundidade_final integer
);

CREATE TABLE entrevista_cais_captura_ave (
    id integer DEFAULT nextval('entrevista_cais_captura_ave_seq'::regclass) NOT NULL,
	entrevista_cais integer NOT NULL,
	especie integer NOT NULL,
	quantidade integer
);




ALTER TABLE ONLY porto
    ADD CONSTRAINT pk_porto PRIMARY KEY (id);
	
ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT pk_entrevista_cais PRIMARY KEY (id);
	
ALTER TABLE ONLY entrevista_cais_area_pesca
    ADD CONSTRAINT pk_entrevista_cais_area_pesca PRIMARY KEY (id);	
	
ALTER TABLE ONLY entrevista_cais_captura_ave
    ADD CONSTRAINT pk_entrevista_cais_captura_ave PRIMARY KEY (id);	
	
ALTER TABLE ONLY petrecho
    ADD CONSTRAINT pk_petrecho PRIMARY KEY (id);	
	
	
	
	
ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_responsavel_campo FOREIGN KEY (responsavel_campo) REFERENCES system_users(id);
	
ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_empresa FOREIGN KEY (empresa) REFERENCES cad_empresa(id_empresa);
	
ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_municipio FOREIGN KEY (municipio) REFERENCES municipio(id);

ALTER TABLE ONLY entrevista_cais	
	ADD CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao) REFERENCES cad_embarcacao(id_embarcacao);

ALTER TABLE ONLY entrevista_cais	
	ADD CONSTRAINT fk_porto_saida FOREIGN KEY (porto_saida) REFERENCES porto(id);
	
ALTER TABLE ONLY entrevista_cais	
	ADD CONSTRAINT fk_petrecho FOREIGN KEY (petrecho) REFERENCES petrecho(id);
	
ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users(id);

ALTER TABLE ONLY entrevista_cais
    ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users(id);	

ALTER TABLE ONLY entrevista_cais_area_pesca
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);
	
ALTER TABLE ONLY entrevista_cais_captura_ave
    ADD CONSTRAINT fk_entrevista_cais FOREIGN KEY (entrevista_cais) REFERENCES entrevista_cais(id);
	
ALTER TABLE ONLY entrevista_cais_captura_ave
    ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES especie(id);
	



CREATE TABLE petrecho_espinhel
(
  id integer NOT NULL,
  numero_espinheis integer,
  numero_anzois integer,
  numero_lances integer,
  light_stick boolean,
  toriline boolean,
  hora_lancamento_inicio time without time zone,
  hora_lancamento_fim time without time zone,
  hora_recolhimento_inicio time without time zone,
  hora_recolhimento_fim time without time zone,
  
  CONSTRAINT pk_petrecho_espinhel PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_espinhel FOREIGN KEY (id)
      REFERENCES petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);



CREATE TABLE petrecho_linha
( 
  id integer NOT NULL,
  numero_linhas integer,
  numero_anzois_por_linha integer,
  numero_lances_por_dia integer,
  hora_inicial time without time zone,
  hora_final time without time zone,  
  tipo_petrecho_utilizado text, -- (DC2Type:array)
  outros text,
  
  CONSTRAINT pk_petrecho_linha PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_linha FOREIGN KEY (id)
      REFERENCES petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);



CREATE TABLE petrecho_rede
(
  id integer NOT NULL,
  comprimento_rede integer,
  altura_rede integer,
  numero_cercos_totais integer,  
  tempo_estimado_cercamento time without time zone,
  tempo_estimado_recolhimento time without time zone,
  
  CONSTRAINT pk_petrecho_rede PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_rede FOREIGN KEY (id)
      REFERENCES petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);



CREATE TABLE petrecho_rede_pano
(
  id integer NOT NULL,
  tipo_rede character varying(20), -- fundo, boiada 
  comprimento_pano integer,
  altura_pano integer,
  numero_panos_por_lance integer,  
  regime_trabalho  character varying(20), -- integral, diurno, noturno  
  tempo_estimado_lancamento time without time zone,
  tempo_estimado_recolhimento time without time zone,
  
  CONSTRAINT pk_petrecho_rede_pano PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_rede_pano FOREIGN KEY (id)
      REFERENCES petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);



CREATE TABLE petrecho_arrasto
(
  id integer NOT NULL,
  tipo_arrasto character varying(20), -- simples, duplo
  numero_arrastos_dia integer,  
  tempo_medio_arrasto time without time zone,
  
  CONSTRAINT pk_petrecho_rede PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_rede FOREIGN KEY (id)
      REFERENCES petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
)
WITH (
  OIDS=FALSE
);