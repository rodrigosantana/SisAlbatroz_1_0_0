ALTER TABLE petrecho_linha
  RENAME TO ec_petrecho_linha_mao;

ALTER TABLE petrecho_rede
  RENAME TO ec_petrecho_cerco;

ALTER TABLE petrecho_espinhel
  RENAME TO ec_petrecho_espinhel;

ALTER TABLE petrecho_rede_pano
  RENAME TO ec_petrecho_emalhe;

ALTER TABLE petrecho_arrasto
  RENAME TO ec_petrecho_arrasto;

ALTER TABLE petrecho
  RENAME TO ec_petrecho;

ALTER TABLE entrevista_cais_captura_ave
  RENAME TO ec_captura_ave;

ALTER TABLE entrevista_cais_area_pesca
  RENAME TO ec_area_pesca;




CREATE TABLE ec_petrecho_vara_isca_viva
(
  id integer NOT NULL,
  dias_isca integer,
  dias_capeando integer,
  total_lances integer,
  numero_pescadores integer,	
  boia boolean,
  CONSTRAINT pk_petrecho_vara_isca_viva PRIMARY KEY (id),
  CONSTRAINT fk_petrecho_vara_isca_viva FOREIGN KEY (id)
      REFERENCES ec_petrecho (id) MATCH SIMPLE
      ON UPDATE CASCADE ON DELETE CASCADE
);