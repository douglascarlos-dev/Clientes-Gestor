-- Database generated with pgModeler (PostgreSQL Database Modeler).
-- pgModeler  version: 0.9.3
-- PostgreSQL version: 9.3
-- Project Site: pgmodeler.io
-- Model Author: ---

-- Database creation must be performed outside a multi lined SQL file. 
-- These commands were put in this file only as a convenience.
-- 
-- object: clientesgestor | type: DATABASE --
-- DROP DATABASE IF EXISTS clientesgestor;
CREATE DATABASE clientesgestor;
-- ddl-end --


SET check_function_bodies = false;
-- ddl-end --

-- object: public.estado_civil | type: TYPE --
-- DROP TYPE IF EXISTS public.estado_civil CASCADE;
CREATE TYPE public.estado_civil AS
 ENUM ('Casado','Divorciado','Solteiro','Viúvo');
-- ddl-end --
ALTER TYPE public.estado_civil OWNER TO postgres;
-- ddl-end --

-- object: public.tipo_telefone | type: TYPE --
-- DROP TYPE IF EXISTS public.tipo_telefone CASCADE;
CREATE TYPE public.tipo_telefone AS
 ENUM ('Casa','Celular','Recado','Trabalho');
-- ddl-end --
ALTER TYPE public.tipo_telefone OWNER TO postgres;
-- ddl-end --

-- object: public.sexo | type: TYPE --
-- DROP TYPE IF EXISTS public.sexo CASCADE;
CREATE TYPE public.sexo AS
 ENUM ('Feminino','Masculino');
-- ddl-end --
ALTER TYPE public.sexo OWNER TO postgres;
-- ddl-end --

-- object: public.clientes_id_seq | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.clientes_id_seq CASCADE;
CREATE SEQUENCE public.clientes_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START WITH 1
	CACHE 1
	NO CYCLE
	OWNED BY NONE;

-- ddl-end --
ALTER SEQUENCE public.clientes_id_seq OWNER TO postgres;
-- ddl-end --

-- object: public.telefone_cliente_id_seq | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.telefone_cliente_id_seq CASCADE;
CREATE SEQUENCE public.telefone_cliente_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START WITH 1
	CACHE 1
	NO CYCLE
	OWNED BY NONE;

-- ddl-end --
ALTER SEQUENCE public.telefone_cliente_id_seq OWNER TO postgres;
-- ddl-end --

-- object: public.saudacao | type: TYPE --
-- DROP TYPE IF EXISTS public.saudacao CASCADE;
CREATE TYPE public.saudacao AS
 ENUM ('Sr.','Sra.','Srta.','Dr.');
-- ddl-end --
ALTER TYPE public.saudacao OWNER TO postgres;
-- ddl-end --

-- object: public.telefone_cliente | type: TABLE --
-- DROP TABLE IF EXISTS public.telefone_cliente CASCADE;
CREATE TABLE public.telefone_cliente (
	id integer NOT NULL DEFAULT nextval('public.telefone_cliente_id_seq'::regclass),
	id_clientes integer,
	telefone character varying(11) NOT NULL,
	tipo public.tipo_telefone NOT NULL,
	CONSTRAINT telefone_cliente_pk PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.telefone_cliente OWNER TO postgres;
-- ddl-end --

-- object: public.clientes | type: TABLE --
-- DROP TABLE IF EXISTS public.clientes CASCADE;
CREATE TABLE public.clientes (
	id integer NOT NULL DEFAULT nextval('public.clientes_id_seq'::regclass),
	saudacao public.saudacao,
	nome character varying(100) NOT NULL,
	email character varying(100) NOT NULL,
	cpf character varying(11) NOT NULL,
	data_de_nascimento date NOT NULL DEFAULT '1900-01-01',
	sexo_cliente public.sexo NOT NULL,
	estado_civil_cliente public.estado_civil NOT NULL,
	CONSTRAINT cliente_pk PRIMARY KEY (id),
	CONSTRAINT cpf_unique UNIQUE (cpf)

);
-- ddl-end --
ALTER TABLE public.clientes OWNER TO postgres;
-- ddl-end --

-- object: public.view_telefone_cliente | type: VIEW --
-- DROP VIEW IF EXISTS public.view_telefone_cliente CASCADE;
CREATE VIEW public.view_telefone_cliente
AS 

SELECT clientes.id,
    clientes.cpf,
    telefone_cliente.telefone,
    telefone_cliente.tipo
   FROM (telefone_cliente
     JOIN clientes ON ((telefone_cliente.id_clientes = clientes.id)));
-- ddl-end --
ALTER VIEW public.view_telefone_cliente OWNER TO postgres;
-- ddl-end --

-- object: public.apagar_telefone | type: FUNCTION --
-- DROP FUNCTION IF EXISTS public.apagar_telefone(character varying,public.tipo_telefone,character varying) CASCADE;
CREATE FUNCTION public.apagar_telefone (cpf_ character varying, tipo_ public.tipo_telefone, telefone_ character varying)
	RETURNS integer
	LANGUAGE plpgsql
	VOLATILE 
	CALLED ON NULL INPUT
	SECURITY INVOKER
	COST 1
	AS $$
DECLARE id_retorno integer;
BEGIN

SELECT id INTO id_retorno FROM clientes WHERE clientes.cpf=cpf_;

DELETE FROM telefone_cliente 	WHERE id_clientes=id_retorno AND tipo=tipo_ AND telefone=telefone_;

RETURN id_retorno;

END;
$$;
-- ddl-end --
ALTER FUNCTION public.apagar_telefone(character varying,public.tipo_telefone,character varying) OWNER TO postgres;
-- ddl-end --

-- object: public.inserir_telefone | type: FUNCTION --
-- DROP FUNCTION IF EXISTS public.inserir_telefone(character varying,character varying,character varying) CASCADE;
CREATE FUNCTION public.inserir_telefone (cpf_ character varying, telefone_ character varying, tipo_ character varying)
	RETURNS integer
	LANGUAGE plpgsql
	VOLATILE 
	CALLED ON NULL INPUT
	SECURITY INVOKER
	COST 1
	AS $$
DECLARE id_retorno integer;
BEGIN

SELECT id INTO id_retorno FROM clientes WHERE clientes.cpf=cpf_;

INSERT INTO telefone_cliente(id_clientes, telefone, tipo) VALUES (id_retorno, telefone_, tipo_::tipo_telefone);

RETURN id_retorno;

END;
$$;
-- ddl-end --
ALTER FUNCTION public.inserir_telefone(character varying,character varying,character varying) OWNER TO postgres;
-- ddl-end --

-- object: public.users_id_seq | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.users_id_seq CASCADE;
CREATE SEQUENCE public.users_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START WITH 2
	CACHE 1
	NO CYCLE
	OWNED BY NONE;

-- ddl-end --
ALTER SEQUENCE public.users_id_seq OWNER TO postgres;
-- ddl-end --

-- object: public.users | type: TABLE --
-- DROP TABLE IF EXISTS public.users CASCADE;
CREATE TABLE public.users (
	id integer NOT NULL DEFAULT nextval('public.users_id_seq'::regclass),
	username character varying(100),
	password character varying(1000),
	CONSTRAINT users_pk PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.users OWNER TO postgres;
-- ddl-end --

INSERT INTO public.users (id, username, password) VALUES (E'1', E'admin', E'$2y$10$fwpKXPecTh6ThLcekkY2HuMeY5JkPiDDAbddzku0HAVDStpkd5TM6');
-- ddl-end --

-- object: public.categoria_endereco | type: TYPE --
-- DROP TYPE IF EXISTS public.categoria_endereco CASCADE;
CREATE TYPE public.categoria_endereco AS
 ENUM ('Residencial','Comercial','Caixa postal');
-- ddl-end --
ALTER TYPE public.categoria_endereco OWNER TO postgres;
-- ddl-end --

-- object: public.endereco_id_seq | type: SEQUENCE --
-- DROP SEQUENCE IF EXISTS public.endereco_id_seq CASCADE;
CREATE SEQUENCE public.endereco_id_seq
	INCREMENT BY 1
	MINVALUE 1
	MAXVALUE 2147483647
	START WITH 1
	CACHE 1
	NO CYCLE
	OWNED BY NONE;

-- ddl-end --
ALTER SEQUENCE public.endereco_id_seq OWNER TO postgres;
-- ddl-end --

-- object: public.address_category | type: TYPE --
-- DROP TYPE IF EXISTS public.address_category CASCADE;
CREATE TYPE public.address_category AS
 ENUM ('Residencial','Comercial','Caixa postal');
-- ddl-end --
ALTER TYPE public.address_category OWNER TO postgres;
-- ddl-end --

-- object: public.address | type: TABLE --
-- DROP TABLE IF EXISTS public.address CASCADE;
CREATE TABLE public.address (
	id integer NOT NULL DEFAULT nextval('public.endereco_id_seq'::regclass),
	id_clientes integer,
	categoria_endereco public.address_category NOT NULL,
	tipo character varying(20) NOT NULL,
	nome character varying(100) NOT NULL,
	numero character varying(10) NOT NULL,
	bairro character varying(100) NOT NULL,
	cidade character varying(100) NOT NULL,
	uf character varying(2) NOT NULL,
	cep character varying(8) NOT NULL,
	complemento character varying(60),
	CONSTRAINT endereco_pk PRIMARY KEY (id)

);
-- ddl-end --
ALTER TABLE public.address OWNER TO postgres;
-- ddl-end --

-- object: clientes_fk | type: CONSTRAINT --
-- ALTER TABLE public.telefone_cliente DROP CONSTRAINT IF EXISTS clientes_fk CASCADE;
ALTER TABLE public.telefone_cliente ADD CONSTRAINT clientes_fk FOREIGN KEY (id_clientes)
REFERENCES public.clientes (id) MATCH FULL
ON DELETE CASCADE ON UPDATE CASCADE;
-- ddl-end --

-- object: public.view_address | type: VIEW --
-- DROP VIEW IF EXISTS public.view_address CASCADE;
CREATE VIEW public.view_address
AS 

SELECT clientes.id,
    clientes.cpf,
    address.categoria_endereco,
    address.tipo,
    address.nome,
    address.numero,
    address.bairro,
    address.cidade,
    address.uf,
    address.cep,
    address.complemento
   FROM (address
     JOIN clientes ON ((address.id_clientes = clientes.id)));
-- ddl-end --
ALTER VIEW public.view_address OWNER TO postgres;
-- ddl-end --

-- object: public.address_delete_function | type: FUNCTION --
-- DROP FUNCTION IF EXISTS public.address_delete_function(character varying,public.address_category) CASCADE;
CREATE FUNCTION public.address_delete_function (cpf_ character varying, categoria_endereco_ public.address_category)
	RETURNS integer
	LANGUAGE plpgsql
	VOLATILE 
	CALLED ON NULL INPUT
	SECURITY INVOKER
	COST 1
	AS $$
DECLARE id_retorno integer;
BEGIN

SELECT id INTO id_retorno FROM clientes WHERE clientes.cpf=cpf_;

DELETE FROM address 	WHERE id_clientes=id_retorno AND categoria_endereco=categoria_endereco_;

RETURN id_retorno;

END;
$$;
-- ddl-end --
ALTER FUNCTION public.address_delete_function(character varying,public.address_category) OWNER TO postgres;
-- ddl-end --

-- object: public.address_insert_function | type: FUNCTION --
-- DROP FUNCTION IF EXISTS public.address_insert_function(character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying) CASCADE;
CREATE FUNCTION public.address_insert_function (cpf_ character varying, categoria_endereco_ character varying, tipo_ character varying, nome_ character varying, numero_ character varying, bairro_ character varying, cidade_ character varying, uf_ character varying, cep_ character varying, complemento_ character varying)
	RETURNS integer
	LANGUAGE plpgsql
	VOLATILE 
	CALLED ON NULL INPUT
	SECURITY INVOKER
	COST 1
	AS $$
DECLARE id_retorno integer;
BEGIN

SELECT id INTO id_retorno FROM clientes WHERE clientes.cpf=cpf_;

INSERT INTO address(id_clientes, categoria_endereco, tipo, nome, numero, bairro, cidade, uf, cep, complemento) VALUES (id_retorno, categoria_endereco_::address_category, tipo_, nome_, numero_, bairro_, cidade_, uf_, cep_, complemento_);

RETURN id_retorno;

END;
$$;
-- ddl-end --
ALTER FUNCTION public.address_insert_function(character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying,character varying) OWNER TO postgres;
-- ddl-end --

-- object: clientes_fk | type: CONSTRAINT --
-- ALTER TABLE public.address DROP CONSTRAINT IF EXISTS clientes_fk CASCADE;
ALTER TABLE public.address ADD CONSTRAINT clientes_fk FOREIGN KEY (id_clientes)
REFERENCES public.clientes (id) MATCH FULL
ON DELETE SET NULL ON UPDATE CASCADE;
-- ddl-end --


