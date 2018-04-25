CREATE TABLE Usuario (
	codigo			SERIAL PRIMARY KEY,
	nome			VARCHAR(80),
	email			VARCHAR(100) NOT NULL,
	senha			VARCHAR(30) NOT NULL,
	dataCadastro    TIMESTAMP DEFAULT NOW(),
	tipo            NUMERIC DEFAULT 1
);

CREATE TABLE Video (
	codigo			SERIAL PRIMARY KEY,
	titulo 			VARCHAR(80) NOT NULL,
	descricao		VARCHAR(255) NOT NULL,
	caminho			VARCHAR(120) NOT NULL,
	formato			VARCHAR(5) NOT NULL,
	tamanho			VARCHAR(20) NOT NULL,
	duracao			VARCHAR(10) NOT NULL,
	miniatura		VARCHAR(120) NOT NULL,
	dataCadastro    TIMESTAMP DEFAULT NOW()
);

CREATE TABLE Genero (
	codigo			SERIAL PRIMARY KEY,
	videoId 		BIGINT UNSIGNED NOT NULL,
	nome			VARCHAR(100) NOT NULL,
	sigla			VARCHAR(10) NOT NULL,
    FOREIGN KEY (videoId) REFERENCES Video(codigo)
);

CREATE TABLE Autor (
	codigo			SERIAL PRIMARY KEY,
	nome			VARCHAR(255) NOT NULL,
	videoId			BIGINT UNSIGNED NOT NULL,
	FOREIGN KEY (videoId) REFERENCES Video (codigo)
);

CREATE TABLE Visualizados (
	codigo 				SERIAL PRIMARY KEY,
	usuarioId			BIGINT UNSIGNED NOT NULL,
	dataVisualizacao 	TIMESTAMP DEFAULT NOW(),
	videoId				BIGINT UNSIGNED NOT NULL,
    FOREIGN KEY (usuarioId) REFERENCES Usuario (codigo),
    FOREIGN KEY (videoId) REFERENCES Video (codigo)
);
