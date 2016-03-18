CREATE TABLE Problema (
  id_problema INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NULL,
  PRIMARY KEY(id_problema)
);

CREATE TABLE Facto (
  id_facto INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  variavel VARCHAR(100) NULL,
  operador VARCHAR(2) NULL,
  valor_numerico INTEGER(10) UNSIGNED NULL,
  valor_literal VARCHAR(100) NULL,
  valor_booleano INT(1) NULL,
  PRIMARY KEY(id_facto)
);

CREATE TABLE Conector (
  id_conector INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  signal VARCHAR(2) NULL,
  PRIMARY KEY(id_conector)
);

CREATE TABLE Regra_Producao (
  id_regra INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  nome VARCHAR(10) NULL,
  id_problema INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY(id_regra),
  INDEX Regra_Producao_FKIndex1(id_problema),
  FOREIGN KEY(id_problema)
    REFERENCES Problema(id_problema)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE Regra_Facto (
  id_regra_facto INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  orden_na_regra INTEGER(2) UNSIGNED NULL,
  premissa_ou_conclucao VARCHAR(3) NULL,
  id_facto INTEGER(10) UNSIGNED NOT NULL,
  id_regra INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY(id_regra_facto),
  INDEX Regra_Facto_FKIndex1(id_facto),
  INDEX Regra_Facto_FKIndex2(id_regra),
  FOREIGN KEY(id_facto)
    REFERENCES Facto(id_facto)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(id_regra)
    REFERENCES Regra_Producao(id_regra)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);

CREATE TABLE Regra_Conector (
  id_regra_conector INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  orden_na_regra INTEGER(2) UNSIGNED NULL,
  premissa_ou_conclucao VARCHAR(3) NULL,
  id_regra INTEGER(10) UNSIGNED NOT NULL,
  id_conector INTEGER(10) UNSIGNED NOT NULL,
  PRIMARY KEY(id_regra_conector),
  INDEX Regra_Conector_FKIndex1(id_regra),
  INDEX Regra_Conector_FKIndex2(id_conector),
  FOREIGN KEY(id_regra)
    REFERENCES Regra_Producao(id_regra)
      ON DELETE CASCADE
      ON UPDATE CASCADE,
  FOREIGN KEY(id_conector)
    REFERENCES Conector(id_conector)
      ON DELETE CASCADE
      ON UPDATE CASCADE
);


