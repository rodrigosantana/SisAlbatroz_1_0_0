CREATE TABLE system_users (
  id serial NOT NULL,
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
  CONSTRAINT pk_system_users PRIMARY KEY (id)
);



CREATE TABLE user_access_map (
  user_role_id int,
  controller character varying(255) NOT NULL,
  permission int,
  CONSTRAINT pk_user_access_map PRIMARY KEY (user_role_id,controller)
);



CREATE TABLE user_autologin (
  key_id character(32) NOT NULL,
  user_id int NOT NULL DEFAULT 0,
  user_agent character varying(150) NOT NULL,
  last_ip character varying(40) NOT NULL,
  last_login timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT pk_user_autologin PRIMARY KEY (key_id,user_id)
);



CREATE TABLE user_role (
  id serial NOT NULL,
  role_name character varying(50),
  default_access character varying(10),
  CONSTRAINT pk_user_role PRIMARY KEY (id)
);



CREATE TABLE user_meta (
  user_id bigint NOT NULL,
  first_name character varying(100),
  last_name character varying(100),
  phone character varying(100),
  CONSTRAINT pk_user_meta PRIMARY KEY (user_id)
);
