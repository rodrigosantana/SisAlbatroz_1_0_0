ALTER TABLE mb_geral
  ADD COLUMN usuario_insercao integer;
ALTER TABLE mb_geral
  ADD COLUMN data_insercao timestamp without time zone;
ALTER TABLE mb_geral
  ADD COLUMN usuario_alteracao integer;
ALTER TABLE mb_geral
  ADD COLUMN data_alteracao timestamp without time zone;
ALTER TABLE mb_geral
  ADD CONSTRAINT fk_usuario_insercao FOREIGN KEY (usuario_insercao) REFERENCES users (id_users) ON UPDATE NO ACTION ON DELETE NO ACTION;
ALTER TABLE mb_geral
  ADD CONSTRAINT fk_usuario_alteracao FOREIGN KEY (usuario_alteracao) REFERENCES users (id_users) ON UPDATE NO ACTION ON DELETE NO ACTION;
