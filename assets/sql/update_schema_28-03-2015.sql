ALTER TABLE system_users
  ADD COLUMN name character varying(255);

UPDATE system_users set name = 'Admin';

ALTER TABLE system_users
   ALTER COLUMN name SET NOT NULL;