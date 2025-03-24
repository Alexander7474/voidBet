-- Spirit
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('chopper', 'russian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('donk', 'russian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('magixx', 'russian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('sh1ro', 'russian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('zont1x', 'russian', false);

INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('hally', 'russian', true);

INSERT INTO equipes(nom_equipe, id_coach) VALUES('Spirit', (SELECT id_joueur FROM joueurs WHERE pseudo = 'hally'));

INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'chopper'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'donk'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'magixx'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'sh1ro'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Spirit'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'zont1x'));

-- Vitality
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('ZywOo', 'french', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('Spinx', 'israeli', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('flameZ', 'israeli', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('apEX', 'french', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('Mezii', 'british', false);

INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('XTQZZZ', 'french', true);

INSERT INTO equipes(nom_equipe, id_coach) VALUES('Vitality', (SELECT id_joueur FROM joueurs WHERE pseudo = 'XTQZZZ'));

INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'ZywOo'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'Spinx'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'flameZ'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'apEX'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'Vitality'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'Mezii'));

-- The Mongolz
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('Techno4K', 'mongolian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('bLitz', 'mongolian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('senzu', 'mongolian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('Bart4k', 'mongolian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('sk0R', 'mongolian', false);

INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('ErkaSt', 'mongolian', true);

INSERT INTO equipes(nom_equipe, id_coach) VALUES('The Mongolz', (SELECT id_joueur FROM joueurs WHERE pseudo = 'ErkaSt'));

INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'The Mongolz'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'Techno4K'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'The Mongolz'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'bLitz'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'The Mongolz'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'senzu'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'The Mongolz'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'Bart4k'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'The Mongolz'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'sk0R'));

-- MOUZ
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('frozen', 'slovak', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('siuhy', 'polish', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('torzsi', 'hungarian', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('xertioN', 'israeli', false);
INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('Jimpphat', 'finnish', false);

INSERT INTO joueurs(pseudo, nationalite, is_coach) VALUES('sycrone', 'danish', true);

INSERT INTO equipes(nom_equipe, id_coach) VALUES('MOUZ', (SELECT id_joueur FROM joueurs WHERE pseudo = 'sycrone'));

INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'frozen'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'siuhy'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'torzsi'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'xertioN'));
INSERT INTO composition_equipe(id_equipe, id_joueur) VALUES((SELECT id_equipe FROM equipes WHERE nom_equipe = 'MOUZ'),(SELECT id_joueur FROM joueurs WHERE pseudo = 'Jimpphat'));
