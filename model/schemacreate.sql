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
    temps VARCHAR(40),
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
    constraint postes_id PRIMARY KEY (user_id, wids_id)
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