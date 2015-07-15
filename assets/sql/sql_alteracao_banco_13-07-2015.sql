CREATE TABLE dados_abioticos_isca
(
  id_isca integer NOT NULL,
  id_dados_abioticos integer NOT NULL,
  CONSTRAINT pk_dados_abioticos_isca PRIMARY KEY (id_isca, id_dados_abioticos),
  CONSTRAINT fk_dados_abioticos_isca_cad_isca FOREIGN KEY (id_isca)
      REFERENCES cad_isca (id_isca) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION,
  CONSTRAINT fk_dados_abioticos_isca_dados_abioticos FOREIGN KEY (id_dados_abioticos)
      REFERENCES dados_abioticos (id) MATCH SIMPLE
      ON UPDATE NO ACTION ON DELETE NO ACTION
)
WITH (
  OIDS=FALSE
);


ALTER TABLE dados_abioticos
  DROP COLUMN tipo_isca;

ALTER TABLE producao_pesqueira
  DROP COLUMN data;

ALTER TABLE contagem_por_sol_especie
  ADD COLUMN tipo_individuo character varying(30);
