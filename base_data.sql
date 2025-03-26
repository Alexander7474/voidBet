-- Insérer le tournoi avec la bonne date et correction du nom
INSERT INTO tournois(nom_tournoi, date_debut, cash_prize) VALUES('Blast Spring 2025', '2025-03-28', 400000);

-- Insertion des joueurs et coach de l'équipe Spirit
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('chopper', 'russian', false),
('donk', 'russian', false),
('magixx', 'russian', false),
('sh1ro', 'russian', false),
('zont1x', 'russian', false),
('hally', 'russian', true);

-- Insérer l'équipe Spirit
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('Spirit', (SELECT id_joueur FROM joueurs WHERE pseudo = 'hally'));

-- Associer les joueurs à l'équipe Spirit
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'Spirit' AND joueurs.pseudo IN ('chopper', 'donk', 'magixx', 'sh1ro', 'zont1x');

-- Ajouter Spirit au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insertion des joueurs et coach de l'équipe Vitality
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('ZywOo', 'french', false),
('Spinx', 'israeli', false),
('flameZ', 'israeli', false),
('apEX', 'french', false),
('Mezii', 'british', false),
('XTQZZZ', 'french', true);

-- Insérer l'équipe Vitality
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('Vitality', (SELECT id_joueur FROM joueurs WHERE pseudo = 'XTQZZZ'));

-- Associer les joueurs à l'équipe Vitality
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'Vitality' AND joueurs.pseudo IN ('ZywOo', 'Spinx', 'flameZ', 'apEX', 'Mezii');

-- Ajouter Vitality au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insertion des joueurs et coach de l'équipe MOUZ (remplaçant FaZe)
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('karrigan', 'danish', false),
('rain', 'norwegian', false),
('broky', 'latvian', false),
('ropz', 'estonian', false),
('Twistzz', 'canadian', false),
('RobbaN', 'swedish', true);

-- Insérer l'équipe MOUZ
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('MOUZ', (SELECT id_joueur FROM joueurs WHERE pseudo = 'RobbaN'));

-- Associer les joueurs à l'équipe MOUZ
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'MOUZ' AND joueurs.pseudo IN ('karrigan', 'rain', 'broky', 'ropz', 'Twistzz');

-- Ajouter MOUZ au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insertion des joueurs et coach de l'équipe G2
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('NiKo', 'bosnian', false),
('huNter-', 'bosnian', false),
('m0NESY', 'russian', false),
('jks', 'australian', false),
('HooXi', 'danish', false),
('Swani', 'german', true);

-- Insérer l'équipe G2
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('G2', (SELECT id_joueur FROM joueurs WHERE pseudo = 'Swani'));

-- Associer les joueurs à l'équipe G2
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'G2' AND joueurs.pseudo IN ('NiKo', 'huNter-', 'm0NESY', 'jks', 'HooXi');

-- Ajouter G2 au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'G2'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insertion des joueurs et coach de l'équipe Eternal Fire
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('xfl0ud', 'turkish', false),
('woxic', 'turkish', false),
('imorr', 'turkish', false),
('crush', 'turkish', false),
('russi', 'turkish', false),
('starix', 'ukrainian', true);

-- Insérer l'équipe Eternal Fire
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('Eternal Fire', (SELECT id_joueur FROM joueurs WHERE pseudo = 'starix'));

-- Associer les joueurs à l'équipe Eternal Fire
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'Eternal Fire' AND joueurs.pseudo IN ('xfl0ud', 'woxic', 'imorr', 'crush', 'russi');

-- Ajouter Eternal Fire au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Eternal Fire'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insertion des joueurs et coach de l'équipe NaVi
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES
('s1mple', 'ukrainian', false),
('electroNic', 'russian', false),
('b1t', 'ukrainian', false),
('Perfecto', 'russian', false),
('Boombl4', 'russian', false),
('Blade', 'ukrainian', true);

-- Insérer l'équipe NaVi
INSERT INTO equipes(nom_equipe, id_coach) 
VALUES('NaVi', (SELECT id_joueur FROM joueurs WHERE pseudo = 'Blade'));

-- Associer les joueurs à l'équipe NaVi
INSERT INTO composition_equipe(id_equipe, id_joueur) 
SELECT id_equipe, id_joueur FROM equipes, joueurs 
WHERE equipes.nom_equipe = 'NaVi' AND joueurs.pseudo IN ('s1mple', 'electroNic', 'b1t', 'Perfecto', 'Boombl4');

-- Ajouter NaVi au tournoi
INSERT INTO composition_tournoi(id_equipe, id_tournoi) 
VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'NaVi'),
       (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'));

-- Insérer les matchs des playoffs
INSERT INTO matchs(date_match, heure_match, format, id_equipe1, id_equipe2, id_tournoi, score1, cote1, score2, cote2) VALUES
('2025-04-10', '15:00', 3, (SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'), (SELECT id_equipe FROM equipes WHERE nom_equipe = 'Eternal Fire'), (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'), -1, 1.2, -1, 4.23),
('2025-04-10', '16:30', 3, (SELECT id_equipe FROM equipes WHERE nom_equipe = 'G2'), (SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'), (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'), -1, 2.2, -1, 1.8),
('2025-04-10', '18:00', 3, (SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'), (SELECT id_equipe FROM equipes WHERE nom_equipe = 'NaVi'), (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'), -1, 2.84, -1, 1.36),
('2025-04-10', '19:30', 3, (SELECT id_equipe FROM equipes WHERE nom_equipe = 'NaVi'), (SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'), (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'), -1, 1.02, -1, 7.52),
('2025-04-11', '20:00', 3, (SELECT id_equipe FROM equipes WHERE nom_equipe = 'G2'), (SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'), (SELECT id_tournoi FROM tournois WHERE nom_tournoi = 'Blast Spring 2025'), -1, 2.2, -1, 2.96);
