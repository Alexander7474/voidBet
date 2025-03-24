-- Table tournois
CREATE TABLE tournois (
    id_tournoi SERIAL PRIMARY KEY,
    nom_tournoi VARCHAR(100) NOT NULL,
    date_debut DATE NOT NULL,
    cash_prize INT
);

-- Table joueurs
CREATE TABLE joueurs (
    id_joueur SERIAL PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL,
    nationalite VARCHAR(30),
    is_coach BOOLEAN
);

-- Table equipes
CREATE TABLE equipes (
    id_equipe SERIAL PRIMARY KEY,
    nom_equipe VARCHAR(50) NOT NULL,
    id_coach INT,
    FOREIGN KEY (id_coach) REFERENCES joueurs(id_joueur)
);

-- Table composition d'equipe (Multivalué)
CREATE TABLE composition_Equipe (
    id_equipe INT NOT NULL,
    id_joueur INT NOT NULL,
    PRIMARY KEY (id_equipe, id_joueur),
    FOREIGN KEY (id_equipe) REFERENCES equipes(id_equipe),
    FOREIGN KEY (id_joueur) REFERENCES joueurs(id_joueur)
);

-- Table mtchs
CREATE TABLE matchs (
    id_match SERIAL PRIMARY KEY,
    date_match DATE NOT NULL,
    heure_match TIME NOT NULL,
    id_equipe1 INT NOT NULL,
    id_equipe2 INT NOT NULL,
    id_tournoi INT NOT NULL,
    score1 INT NOT NULL,
    score2 INT NOT NULL,
    FOREIGN KEY (id_equipe1) REFERENCES equipes(id_equipe),
    FOREIGN KEY (id_equipe2) REFERENCES equipes(id_equipe),
    FOREIGN KEY (id_tournoi) REFERENCES tournois(id_tournoi)
);

--Table users
CREATE TABLE users (
  id_user SERIAL PRIMARY KEY,
  pseudo VARCHAR(50) NOT NULL,
  password VARCHAR(200) NOT NULL,
  email VARCHAR(200) NOT NULL,
  void_coin DOUBLE PRECISION,
  date_creation DATE DEFAULT now()
);

CREATE TABLE bets (
  id_paris SERIAL PRIMARY KEY,
  id_match INT NOT NULL,
  date_paris DATE NOT NULL,
  cote INT NOT NULL,
  id_user INT NOT NULL,
  FOREIGN KEY (id_user) REFERENCES users(id_user),
  FOREIGN KEY (id_match) REFERENCES matchs(id_match)
);

CREATE TABLE bet_on_score (
  id_paris INT NOT NULL,
  score1 INT NOT NULL,
  score2 INT NOT NULL,
  PRIMARY KEY(id_paris),
  FOREIGN KEY (id_paris) REFERENCES bets(id_paris)
);

CREATE TABLE bet_on_result (
  id_paris INT NOT NULL,
  result VARCHAR(10) NOT NULL,
  id_equipe INT NOT NULL,
  PRIMARY KEY(id_paris),
  FOREIGN KEY (id_paris) REFERENCES bets(id_paris)
);


