CREATE SEQUENCE cad_financiador_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE cad_financiador
(
  id integer NOT NULL DEFAULT nextval('cad_financiador_seq'::regclass),
  nome character varying(100) NOT NULL,
  CONSTRAINT pk_cad_financiador PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE cruzeiro_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE cruzeiro
(
  id integer NOT NULL DEFAULT nextval('cruzeiro_seq'::regclass),
  observador integer NOT NULL,
  embarcacao integer NOT NULL,
  mestre integer,
  empresa integer,
  financiador integer,
  data_saida	date,
  data_chegada	date,
  observacao	text,

  CONSTRAINT pk_cruzeiro PRIMARY KEY (id),

  CONSTRAINT fk_observador FOREIGN KEY (observador)
      REFERENCES cad_observador (id_observ) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_embarcacao FOREIGN KEY (embarcacao)
      REFERENCES cad_embarcacao (id_embarcacao) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  
  CONSTRAINT fk_mestre FOREIGN KEY (mestre)
      REFERENCES cad_mestre (id_mestre) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_empresa FOREIGN KEY (empresa)
      REFERENCES cad_empresa (id_empresa) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_financiador FOREIGN KEY (financiador)
      REFERENCES cad_financiador (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

CREATE SEQUENCE cad_especie_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE cad_especie
(
  id integer NOT NULL DEFAULT nextval('cad_especie_seq'::regclass),
  nome character varying(100) NOT NULL,
  CONSTRAINT pk_cad_especie PRIMARY KEY (id)
)
WITH (
  OIDS=FALSE
);

CREATE SEQUENCE dados_abioticos_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE dados_abioticos
(
  id integer NOT NULL DEFAULT nextval('dados_abioticos_seq'::regclass),
  cruzeiro integer NOT NULL,
  lance	integer NOT NULL,
  tipo_isca integer,
  especie_alvo integer,
  anzois integer,
  reg_peso boolean,
  toriline boolean,
  isca_tingida boolean,

  CONSTRAINT pk_dados_abioticos PRIMARY KEY (id),

  CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro)
      REFERENCES cruzeiro (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_isca FOREIGN KEY (tipo_isca)
      REFERENCES cad_isca (id_isca) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  
  CONSTRAINT fk_especie_alvo FOREIGN KEY (especie_alvo)
      REFERENCES cad_especie (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);



CREATE SEQUENCE dados_abioticos_complementar_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;
	
CREATE TABLE dados_abioticos_complementar
(
  id integer NOT NULL DEFAULT nextval('dados_abioticos_complementar_seq'::regclass),
  dados_abioticos integer,
  tipo smallint, --1 lancamento / 2 recolhimento
  coordenada_inicio geometry,
  coordenada_fim geometry,
  data_inicio timestamp without time zone,
  data_fim timestamp without time zone,
  profundidade_inicio numeric(10,2),
  profundidade_fim numeric(10,2),
  rumo_inicio character varying(4),
  rumo_fim character varying(4),
  direcao_vento_inicio character varying(4),
  direcao_vento_fim character varying(4),
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

  CONSTRAINT pk_dados_abioticos_complementar PRIMARY KEY (id),

  CONSTRAINT fk_dados_abioticos FOREIGN KEY (dados_abioticos)
      REFERENCES dados_abioticos (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

CREATE SEQUENCE contagem_por_sol_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE contagem_por_sol
(
  id integer NOT NULL DEFAULT nextval('contagem_por_sol_seq'::regclass),
  cruzeiro integer NOT NULL,
  data_hora timestamp without time zone,
  coordenada geometry,
  lance integer,
  toriline boolean,
  isca_tingida boolean,
  observacao text,
  indice integer,
  hora time without time zone,
  total	integer,

  CONSTRAINT pk_contagem_por_sol PRIMARY KEY (id),

  CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro)
      REFERENCES cruzeiro (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);

CREATE SEQUENCE contagem_por_sol_especie_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;

CREATE TABLE contagem_por_sol_especie
(
  id integer NOT NULL DEFAULT nextval('contagem_por_sol_especie_seq'::regclass),
  contagem_ps integer NOT NULL,
  especie integer NOT NULL,  
  quantidade integer,

  CONSTRAINT pk_contagem_por_sol_especie PRIMARY KEY (id),

  CONSTRAINT fk_contagem_ps FOREIGN KEY (contagem_ps)
      REFERENCES contagem_por_sol (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_especie FOREIGN KEY (especie)
      REFERENCES cad_especie (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE captura_incidental_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE captura_incidental
(
  id integer NOT NULL DEFAULT nextval('captura_incidental_seq'::regclass),
  cruzeiro integer NOT NULL,
  lance integer,
  data date,
  boia_radio character varying (255),
  coordenada geometry,
  etiqueta integer,
  especie integer,
  quantidade integer,

  CONSTRAINT pk_captura_incidental PRIMARY KEY (id),

  CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro)
      REFERENCES cruzeiro (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_especie FOREIGN KEY (especie)
      REFERENCES cad_especie (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE contagem_ave_boia_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE contagem_ave_boia
(
  id integer NOT NULL DEFAULT nextval('contagem_ave_boia_seq'::regclass),
  cruzeiro integer NOT NULL,
  lance integer,
  boia_radio character varying (255),
  data_hora timestamp without time zone,
  temperatura_agua integer,
  profundidade integer,
  pressao_atmosferica integer,
  coordenada geometry,

  CONSTRAINT pk_contagem_ave_boia PRIMARY KEY (id),

  CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro)
      REFERENCES cruzeiro (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE contagem_ave_boia_especie_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE contagem_ave_boia_especie
(
  id integer NOT NULL DEFAULT nextval('contagem_ave_boia_especie_seq'::regclass),
  contagem_ave_boia integer NOT NULL,
  especie integer NOT NULL,
  quantidade integer,

  CONSTRAINT pk_contagem_ave_boia_especie PRIMARY KEY (id),

  CONSTRAINT fk_contagem_ave_boia FOREIGN KEY (contagem_ave_boia)
      REFERENCES contagem_ave_boia (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_especie FOREIGN KEY (especie)
      REFERENCES cad_especie (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE producao_pesqueira_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE producao_pesqueira
(
  id integer NOT NULL DEFAULT nextval('producao_pesqueira_seq'::regclass),
  cruzeiro integer NOT NULL,
  lance integer,
  data date,	
  boia_radio integer,

  CONSTRAINT pk_producao_pesqueira PRIMARY KEY (id),

  CONSTRAINT fk_cruzeiro FOREIGN KEY (cruzeiro)
      REFERENCES cruzeiro (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


CREATE SEQUENCE producao_pesqueira_especie_seq
  INCREMENT 1
  MINVALUE 1
  MAXVALUE 9223372036854775807
  START 1
  CACHE 1;


CREATE TABLE producao_pesqueira_especie
(
  id integer NOT NULL DEFAULT nextval('producao_pesqueira_especie_seq'::regclass),
  producao_pesqueira integer NOT NULL,
  especie integer NOT NULL,
  quantidade integer,
  predacao character varying (255),	

  CONSTRAINT pk_producao_pesqueira_especie PRIMARY KEY (id),

  CONSTRAINT fk_producao_pesqueira FOREIGN KEY (producao_pesqueira)
      REFERENCES producao_pesqueira (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,

  CONSTRAINT fk_especie FOREIGN KEY (especie)
      REFERENCES cad_especie (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);







ALTER TABLE dados_abioticos
  ADD COLUMN dado_lancamento integer;
ALTER TABLE dados_abioticos
  ADD COLUMN dado_recolhimento integer;
ALTER TABLE dados_abioticos
  ADD CONSTRAINT fk_dado_lancamento FOREIGN KEY (dado_lancamento) REFERENCES dados_abioticos_complementar (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE dados_abioticos
  ADD CONSTRAINT fk_dado_recolhimento FOREIGN KEY (dado_recolhimento) REFERENCES dados_abioticos_complementar (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE dados_abioticos_complementar
  DROP CONSTRAINT fk_dados_abioticos;

ALTER TABLE dados_abioticos_complementar
  DROP COLUMN dados_abioticos;

ALTER TABLE cruzeiro
  ADD COLUMN usuario_insercao integer;
ALTER TABLE cruzeiro
  ADD COLUMN data_insercao timestamp without time zone;
ALTER TABLE cruzeiro
  ADD COLUMN usuario_alteracao integer;
ALTER TABLE cruzeiro
  ADD COLUMN data_alteracao timestamp without time zone;
ALTER TABLE cruzeiro
  ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES users (id_users) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE cruzeiro
  ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES users (id_users) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE dados_abioticos
  DROP COLUMN especie_alvo;

ALTER TABLE dados_abioticos_complementar
   ALTER COLUMN profundidade_inicio TYPE integer;
ALTER TABLE dados_abioticos_complementar
   ALTER COLUMN profundidade_fim TYPE integer;

ALTER TABLE contagem_ave_boia_especie
  DROP CONSTRAINT fk_especie;

ALTER TABLE contagem_ave_boia_especie
  ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_aves (id_aves) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE contagem_por_sol_especie
  DROP CONSTRAINT fk_especie;

ALTER TABLE contagem_por_sol_especie
  ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_aves (id_aves) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE captura_incidental
  DROP CONSTRAINT fk_especie;

ALTER TABLE captura_incidental
  ADD CONSTRAINT fk_especie FOREIGN KEY (especie) REFERENCES cad_aves (id_aves) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE mb_geral
  DROP CONSTRAINT fk_entrevistador;

ALTER TABLE mb_geral
  ADD CONSTRAINT fk_entrevistador FOREIGN KEY (entrevistador) REFERENCES system_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE mb_geral
  DROP CONSTRAINT fk_usuario_alteracao;
ALTER TABLE mb_geral
  DROP CONSTRAINT fk_usuario_insercao;
ALTER TABLE mb_geral
  ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE mb_geral
  ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE cruzeiro
  DROP CONSTRAINT fk_usuario_alteracao;
ALTER TABLE cruzeiro
  DROP CONSTRAINT fk_usuario_insercao;
ALTER TABLE cruzeiro
  ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES system_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE cruzeiro
  ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES system_users (id) ON UPDATE NO ACTION ON DELETE NO ACTION;