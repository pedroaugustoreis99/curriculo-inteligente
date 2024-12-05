DROP TABLE IF EXISTS `candidatos`;
CREATE TABLE `candidatos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `informacoes_curriculo`;
CREATE TABLE `informacoes_curriculo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_completo` varchar(255) NOT NULL,
  `data_nascimento` date DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `nacionalidade` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `formacao_academica` text,
  `experiencia_profissional` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `recrutadores`;
CREATE TABLE `recrutadores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE `vagas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` text,
  `requisitos` text,
  `salario` decimal(10,2) DEFAULT NULL,
  `localizacao` varchar(255) DEFAULT NULL,
  `id_recrutador` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_recrutador` (`id_recrutador`),
  CONSTRAINT `vagas_ibfk_1` FOREIGN KEY (`id_recrutador`) REFERENCES `recrutadores` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `match_curriculo_vaga`;
CREATE TABLE `match_curriculo_vaga` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_curriculo` int DEFAULT NULL,
  `id_vaga` int DEFAULT NULL,
  `match_percentual` decimal(5,2) DEFAULT NULL,
  `resposta_analise` text,
  PRIMARY KEY (`id`),
  KEY `id_vaga` (`id_vaga`),
  KEY `fk_id_curriculo` (`id_curriculo`),
  CONSTRAINT `fk_id_curriculo` FOREIGN KEY (`id_curriculo`) REFERENCES `informacoes_curriculo` (`id`),
  CONSTRAINT `match_curriculo_vaga_ibfk_2` FOREIGN KEY (`id_vaga`) REFERENCES `vagas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;