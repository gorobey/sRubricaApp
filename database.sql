--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: contatto; Type: TABLE; Schema: public; Owner: federicoponzi; Tablespace: 
--

CREATE TABLE contatto (
    id integer NOT NULL,
    nome character varying(100) NOT NULL,
    cognome character varying(100),
    email character varying(100),
    viaindirizzo character varying(100),
    viacitta character varying(100),
    viacap character varying(14),
    numerocasa character varying(14),
    numerocell character varying(14),
    idutente integer NOT NULL
);


ALTER TABLE public.contatto OWNER TO federicoponzi;

--
-- Name: contatto_id_seq; Type: SEQUENCE; Schema: public; Owner: federicoponzi
--

CREATE SEQUENCE contatto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contatto_id_seq OWNER TO federicoponzi;

--
-- Name: contatto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: federicoponzi
--

ALTER SEQUENCE contatto_id_seq OWNED BY contatto.id;


--
-- Name: utente; Type: TABLE; Schema: public; Owner: federicoponzi; Tablespace: 
--

CREATE TABLE utente (
    id integer NOT NULL,
    email character varying(100) NOT NULL,
    password character varying(100) NOT NULL
);


ALTER TABLE public.utente OWNER TO federicoponzi;

--
-- Name: utente_id_seq; Type: SEQUENCE; Schema: public; Owner: federicoponzi
--

CREATE SEQUENCE utente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utente_id_seq OWNER TO federicoponzi;

--
-- Name: utente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: federicoponzi
--

ALTER SEQUENCE utente_id_seq OWNED BY utente.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: federicoponzi
--

ALTER TABLE ONLY contatto ALTER COLUMN id SET DEFAULT nextval('contatto_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: federicoponzi
--

ALTER TABLE ONLY utente ALTER COLUMN id SET DEFAULT nextval('utente_id_seq'::regclass);


--
-- Data for Name: contatto; Type: TABLE DATA; Schema: public; Owner: federicoponzi
--

COPY contatto (id, nome, cognome, email, viaindirizzo, viacitta, viacap, numerocasa, numerocell, idutente) FROM stdin;
13	Federico	Ponzi	isaacisback92@gmail.com	via ardeatina 1696	null	134	\N	\N	8
14	Federico	Ponzi	isaacisback92@gmail.com	via ardeatina 1696	null	134	\N	\N	10
15	Federico	ciao	ciaociao@sito.ti	via casa mia	Roma	123	1234	1234	15
16	Eleonora	Sereni		strada delle acacie 5	null	63	\N	\N	18
17	Federico	Ponzi	isaacisback92@gmail.com	via ardeatina 1696	null	134	\N	\N	18
18	Giovanni	null			null	\N	\N	\N	18
19	Lol	null			null	\N	\N	\N	18
20	Federico	null			null	\N	\N	\N	18
21	Federico	Scozzafava	razer.93@gmail.com		null	52	\N	\N	19
23	provaNome	provaCognome	provaMail@pr.it	provaVia	provaCittà	1234	0	\N	20
51	Federico	Ponzi	isaacisback92@gmail.com	via ardeatina 1696	Roma	134	0	3487849751	27
52	Eleonora	Sereni		strada delle acacie 5	Campagnano di Roma	0	0	3487849751	27
53	Eleonora	Sereni		strada delle acacie 5	Campagnano di Roma	63	0	3487849751	27
\.


--
-- Name: contatto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: federicoponzi
--

SELECT pg_catalog.setval('contatto_id_seq', 58, true);


--
-- Data for Name: utente; Type: TABLE DATA; Schema: public; Owner: federicoponzi
--

COPY utente (id, email, password) FROM stdin;
3	isaacisback92@gmail.com	fdf66c753ab9eb11049c87cd4ab8cee2
8	lol@lol.it	fdf66c753ab9eb11049c87cd4ab8cee2
9	alessandro@gmail.com	d60dc1c2b3c271fe47144380b2c1aaa2
10	alessandro93@gmail.com	f7a3803365a55b197a3b43bc64aacc13
14	isaac92@lol.it	7d11810cf99c74a1f3fa22c3879ea39d
15	fede@sito.ti	fdf66c753ab9eb11049c87cd4ab8cee2
16	federico@sito.it	fdf66c753ab9eb11049c87cd4ab8cee2
17	ludovico@lol.it	28fdcc190153c0fd2ff538ec18fcc113
18	ludo@lol.it	7d11810cf99c74a1f3fa22c3879ea39d
19	razer.93@gmail.com	27b4b5b01b0d1fcab2046369720ff75e
20	x@x.it	ff8440b72239bf72268721ec4ba575ca
21	teznerol@libero.it	fdf66c753ab9eb11049c87cd4ab8cee2
22	fede@sito.i	2d917f5d1275e96fd75e6352e26b1387
23	prova@figo.it	616706c4d6f7bdf68b30893f860cbb2b
24	isa@lol.i	7d11810cf99c74a1f3fa22c3879ea39d
25	isaaci@sit.it	7d11810cf99c74a1f3fa22c3879ea39d
26	fdfdfd@efd.it	7d11810cf99c74a1f3fa22c3879ea39d
27	giova@lol.it	616706c4d6f7bdf68b30893f860cbb2b
28	ludovico@sitogay.it	616706c4d6f7bdf68b30893f860cbb2b
29	ludovico@sitogay.it	616706c4d6f7bdf68b30893f860cbb2b
\.


--
-- Name: utente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: federicoponzi
--

SELECT pg_catalog.setval('utente_id_seq', 29, true);


--
-- Name: contatto_pkey; Type: CONSTRAINT; Schema: public; Owner: federicoponzi; Tablespace: 
--

ALTER TABLE ONLY contatto
    ADD CONSTRAINT contatto_pkey PRIMARY KEY (id);


--
-- Name: utente_pkey; Type: CONSTRAINT; Schema: public; Owner: federicoponzi; Tablespace: 
--

ALTER TABLE ONLY utente
    ADD CONSTRAINT utente_pkey PRIMARY KEY (id);


--
-- Name: contatto_idutente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: federicoponzi
--

ALTER TABLE ONLY contatto
    ADD CONSTRAINT contatto_idutente_fkey FOREIGN KEY (idutente) REFERENCES utente(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

