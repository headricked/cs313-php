CREATE TABLE logintest
(
    id SERIAL PRIMARY KEY NOT NULL,
    username VARCHAR(80) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- CREATE USER ta_user WITH PASSWORD 'ta_pass';

-- GRANT SELECT, INSERT, UPDATE ON logintest TO ta_user;
-- GRANT USAGE, SELECT ON logintest_id_seq TO ta_user;