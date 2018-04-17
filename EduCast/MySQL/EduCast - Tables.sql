CREATE TABLE Usuario {
	codigo			SERIAL PRIMARY KEY,
	nome			VARCHAR(80),
	email			VARCHAR(100) NOT NULL,
	senha			VARCHAR(30) NOT NULL,
	dataCadastro    TIMESTAMP DEFAULT (CURRENT_TIMESTAMP),
	tipo            NUMBER DEFAULT (1) /* 0 = MASTER | 1 = COMUM */
}

CREATE TABLE Video {
	codigo			SERIAL PRIMARY KEY,
	titulo 			VARCHAR(80) NOT NULL,
	descricao		VARCHAR(255) NOT NULL,
	endereco		VARCHAR(120) NOT NULL,
	formato			VARCHAR(5) NOT NULL,
	peso 			VARCHAR(20) NOT NULL,
	duracao			VARCHAR(10) NOT NULL,
	miniatura		VARCHAR(120) NOT NULL
}

CREATE TABLE Genero {
	codigo			SERIAL PRIMARY KEY,
	video 			NUMBER NOT NULL,
	nome			VARCHAR(100) NOT NULL,
	sigla			VARCHAR(10) NOT NULL,
	CONSTRAINT fk_genero_video
      FOREIGN KEY (video)
      REFERENCES Video (codigo)
}

CREATE TABLE Autor {
	codigo			SERIAL PRIMARY KEY,
	nome			VARCHAR(255) NOT NULL
	video			NUMBER NOT NULL,
	CONSTRAINT fk_autor_video
      FOREIGN KEY (video)
      REFERENCES Video (codigo)
}

CREATE TABLE Visualizados {
	codigo 			SERIAL PRIMARY KEY,
	usuario			NUMBER NOT NULL,
	data 			TIMESTAMP DEFAULT (CURRENT_TIMESTAMP),
	video			NUMBER NOT NULL,
	CONSTRAINT fk_visualizados_usuario
      FOREIGN KEY (usuario)
      REFERENCES Video (codigo),
	CONSTRAINT fk_visualizados_video
      FOREIGN KEY (video)
      REFERENCES Video (codigo)
}