CREATE TABLE channels (
    channels_id SERIAL NOT NULL PRIMARY KEY,
    url VARCHAR(255),
    score INTEGER,
    img_user_url VARCHAR(255)
);

CREATE TABLE users (
    users_id SERIAL NOT NULL PRIMARY KEY,
    nom VARCHAR(30),
    prenom VARCHAR(30),
    discipline VARCHAR(30),
    facebook_id BIGINT,
    channels_id INTEGER,
    constraint fk_channel FOREIGN KEY (channels_id) 
        REFERENCES channels(channels_id) 
        ON UPDATE cascade ON DELETE cascade
);

CREATE TABLE videos (
    videos_id SERIAL NOT NULL PRIMARY KEY,
    title VARCHAR(40),
    description TEXT,
    thumbnail_url VARCHAR(255)
);

CREATE TABLE wids (
    wids_id SERIAL NOT NULL PRIMARY KEY,
    duree TIMESTAMPTZ,
    verbe VARCHAR(40),
    place VARCHAR(40),
    quand TIMESTAMPTZ
);

CREATE TABLE postes (
    users_id INTEGER NOT NULL,
    constraint fk_user FOREIGN KEY (users_id) 
        REFERENCES users(users_id) 
        ON UPDATE cascade ON DELETE cascade,
    wids_id INTEGER NOT NULL,
    constraint fk_wid FOREIGN KEY (wids_id) 
        REFERENCES wids(wids_id) 
        ON UPDATE cascade ON DELETE cascade,
    constraint postes_id PRIMARY KEY (users_id, wids_id)
);

CREATE TABLE contient (
    channels_id INTEGER NOT NULL,
    constraint fk_channel FOREIGN KEY (channels_id) 
        REFERENCES channels(channels_id) 
        ON UPDATE cascade ON DELETE cascade,
    videos_id INTEGER NOT NULL,
    constraint fk_video FOREIGN KEY (videos_id) 
        REFERENCES videos(videos_id) 
        ON UPDATE cascade ON DELETE cascade,
    constraint contient_id PRIMARY KEY (channels_id, videos_id)
);

INSERT INTO wids (duree,verbe,place,quand) VALUES
    (NULL,'freestyling','Casablanca','2013-03-07'),
    (NULL,'breakdancing','Rabat','2013-03-04'),
    (NULL,'chilling','Dubai Airport','2013-02-19'),
    (NULL,'demonstrating','Paris Mall Show','2013-01-04'),
    (NULL,'dealing something','South of Morocco','2013-02-22');

INSERT INTO users (nom,prenom,discipline,facebook_id,channels_id) VALUES
    ('Amanzou','Amine','Freestyler',1112232131,NULL),
    ('Mo','Hriz','Bboy',12434352433,NULL),
    ('Oubella','Mohammed','Popping',1123142131,NULL);

INSERT INTO postes (users_id,wids_id) VALUES
    (1,1),
    (2,2),
    (3,3),
    (3,4),
    (2,5);