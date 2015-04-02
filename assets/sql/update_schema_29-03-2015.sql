ALTER TABLE mb_lance
  DROP COLUMN hora_inicial;

ALTER TABLE mb_lance
  DROP COLUMN hora_final;


ALTER TABLE mb_lance
  ADD COLUMN hora_inicial; time without time zone;


ALTER TABLE mb_lance
  ADD COLUMN hora_final; time without time zone;
