CREATE TABLE public.professor
(
  id_professor serial PRIMARY KEY,
  nome text NOT NULL,
  data_nascimento date NOT NULL,
  data_criacao timestamp without time zone NOT NULL DEFAULT now()
)

CREATE TABLE public.curso
(
  id_curso serial PRIMARY KEY,
  nome text NOT NULL,
  data_criacao timestamp without time zone NOT NULL DEFAULT now(),
  id_professor integer,
  FOREIGN KEY (id_professor) REFERENCES public.professor (id_professor) ON UPDATE NO ACTION ON DELETE SET NULL
)

CREATE TABLE public.aluno
(
   id_aluno serial PRIMARY KEY,
   nome text NOT NULL,
   data_nascimento date NOT NULL,
   logradouro text NOT NULL,
   numero integer NOT NULL,
   bairro text NOT NULL,
   cidade text NOT NULL,
   estado text NOT NULL,
   cep text NOT NULL,
   data_criacao timestamp without time zone NOT NULL DEFAULT now(),
   id_curso integer,
   FOREIGN KEY (id_curso) REFERENCES public.curso (id_curso) ON UPDATE NO ACTION ON DELETE SET NULL
)