USE renseignement;
INSERT INTO `Etudiant` (`nomEtudiant`, `prenomEtudiant`, `telEtudiant`, `mdpEtudiant`, `dateNaissanceEtudiant`, `villeAdrEtudiant`, `numAdrEtudiant`, `codePostalAdrEtudiant`, `libAdrEtudiant`, `dateArriveeEtudiant`, `pseudoEtudiant`) VALUES
('MARQUES','Yohan','0624859002','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-01-11','Toulouse','35','31400','impasse de la baraquette','2020-09-03', 'MY500483'),
('AKENDENGUE','Pierre-Honore','0668937013','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-08-18','Toulouse',NULL,NULL,NULL,'2020-09-03', 'ph'),
('BOURGADE','Julien','0643105584','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-03-28','Toulouse',NULL,NULL,NULL,'2020-09-03', 'jb'),
('BROTO','Jules','0695370215','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-03-12','Toulouse',NULL,NULL,NULL,'2020-09-03', 'jbr'),
('CARLES','Adrien','0681751583','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '1998-02-17','Toulouse',NULL,NULL,NULL,'2020-09-03', 'ac'),
('CAZALS','Romain','0781743672','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-08-27','Toulouse',NULL,NULL,NULL,'2020-09-03', 'rc'),
('CORRIER','Adrien','0695632848','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-09-14','Toulouse',NULL,NULL,NULL,'2020-09-03', 'adc'),
('DUTERTRE','Damien','0661185028','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-03-08','Toulouse',NULL,NULL,NULL,'2020-09-03', 'dd'),
('GOEPFERT','James','0645372778','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2000-05-27','Toulouse',NULL,NULL,NULL,'2020-09-03', 'jg'),
('LAVEDAN','Hugo','0781634567','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-09-20','Toulouse',NULL,NULL,NULL,'2020-09-03', 'hl'),
('MAGALHAES CARDOSO','Leonel','0750471205','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-11-14','Toulouse',NULL,NULL,NULL,'2020-09-03', 'mcl'),
('MONTEIL','Achille','0781706046','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-02-22','Toulouse',NULL,NULL,NULL,'2020-09-03', 'am'),
('PEYRARD','David','0641326462','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-01-08','Toulouse',NULL,NULL,NULL,'2020-09-03', 'dp'),
('QUINTERO','Agustin','0615614135','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '1998-08-31','Toulouse',NULL,NULL,NULL,'2020-09-03', 'aq'),
('SABATIER','Marylia','0782007284','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-09-29','Toulouse',NULL,NULL,NULL,'2020-09-03', 'ms'),
('SAMATHY','Bryan','0785563324','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-01-16','Toulouse',NULL,NULL,NULL,'2020-09-03', 'bs'),
('TORIJA','Clément','0665426334','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2001-11-13','Toulouse',NULL,NULL,NULL,'2020-09-03', 'ct'),
('TURPIN','Romain','0748540745','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG', '2002-03-12','Toulouse',NULL,NULL,NULL,'2020-09-03', 'rt');

INSERT INTO `Prof` (`idProf`,`nomProf`, `prenomProf`, `mdpProf`, `telProf`, `mailProf`, `pseudoProf`) VALUES
('1','PUEL','Christophe','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG','0661264523','christophe.puel@limayrac.fr', 'cpuel'),
('2','RAMIARA','Jean-François','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG','0666574264','jeanfrancois.ramiara@limayrac.fr', 'jframiara'),
('3','MEDA','Chantal','$2y$10$jaa7NnbdBhEuL5hMLGMbteg.KXzsep5/VCVs.Ql9DZj/SYZ45jHdG','0665616380','chantal.meda@limayrac.fr', 'cmeda');

INSERT INTO `Entreprise` (`idEnt`,`nomEnt`, `missionEnt`, `numAdrEnt`, `libAdrEnt`, `codePostalEnt`, `villeAdrEnt`, `telephoneEnt`, `mailEnt`, `siretEnt`) VALUES
('1','Human up Consulting', NULL, '24', 'Rue leon gambetta', '31000', 'Toulouse', NULL, NULL, '85354911914'),
('2','HORUS SOLUTIONS', NULL, ' ', ' Delta poste', ' ', 'LIBREVILLE (GABON)', NULL, NULL, NULL),
('3','MGEN TECHNOLOGIES', NULL, '4', 'Rue du Bois de la Sivrite', '54500', 'VANDOUEVRE LES NANCY', NULL, NULL, '44052901400027'),
('4','COMMUNAUTE DES COMMUNES REGION LEZIGNANAISE', NULL, '48', 'Avenue Charles Cros', '11200', 'VLEZIGNAN CORBIERES', NULL, NULL, '20003586300014'),
('5','COLLEGE PIERRE SUC', NULL, ' ', 'Avenue Rhin et Danube', '81370', 'SAINT SULPICE', NULL, NULL, '19810041400012'),
('6','DSIN', NULL, '248', 'Route de Grenade', '31700', 'Blagnac', NULL, NULL, '39899727000044'),
('7','INRAE - UMR AGIR', NULL, '24', 'Chemin de Borde Rouge', '31320', 'Auzeville-Tolosane', NULL, NULL, '18007003901134'),
('8','SARL TIRIA', NULL, '36', 'Avenue Charles de Gaulle', '32600', 'L isle-Jourdain', NULL, NULL, '50523519200042');

INSERT INTO anneescolaire(`idAnneeScolaire`,`libAnneeScolaire`) VALUES
('1','2018/2019'),
('2','2019/2020'),
('3','2020/2021'),
('4','2021/2022');










