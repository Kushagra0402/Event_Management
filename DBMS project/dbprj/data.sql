INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (1,'Zayn','male');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (2,'Coldplay','male');
INSERT INTO dbprj_artists (artist_id, name, gender) VALUES (3,'Sara Fosters','female');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (1,'The International Rock Festival','Drama Theatre, HKAPA','2018-09-02 10:00');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (2,'Ice on Flames','Asia World Expo','2018-10-27 20:15');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (3,'Spotify world tour','Star Hall, KITEC','2018-10-16 20:15');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (4,'Socialism and Capitalism','Hong Kong Coliseum','2018-12-04 20:15');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (5,'Democracy vs Communism','Star Hall, KITEC','2018-10-18 20:15');
INSERT INTO dbprj_events (event_id, name, venue, schedule) VALUES (6,'GM Club Alumni Meet','Sassoon Road','2018-09-20 21:30');
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,1);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,3);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (1,2);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,3);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (3,4);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (3,5);
INSERT INTO dbprj_performs(artist_id, event_id) VALUES (2,6);
INSERT INTO dbprj_concerts (event_id, musicians) VALUES (1,'DJ Kayz');
INSERT INTO dbprj_concerts (event_id, musicians) VALUES (2,'Lindsay Stirling');
INSERT INTO dbprj_concerts (event_id, musicians) VALUES (3,'XOX Zombie');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,1,'Maxwel');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,1,'Jaydin Zimmerman');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,2,'Hamza Walters');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,2,'Iyana Holmes');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (2,3,'Alexander Bell');
INSERT INTO dbprj_concerts_parts (event_id, part_no, pic) VALUES (1,3,'Alessandra Hancock');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (1,'Piano');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Drumset');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (2,'Keyboard');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Guitar');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Bass');
INSERT INTO dbprj_instruments (event_id, instrument) VALUES (3,'Violin');
INSERT INTO dbprj_talks (event_id, staff) VALUES (4,'Goku');
INSERT INTO dbprj_talks (event_id, staff) VALUES (5,'Goku');
INSERT INTO dbprj_equipments (event_id, equipment) VALUES (4,'Mic');
INSERT INTO dbprj_equipments (event_id, equipment) VALUES (5,'Speaker');






