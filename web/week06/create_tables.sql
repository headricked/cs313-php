CREATE TABLE scriptures (
    id SERIAL PRIMARY KEY NOT NULL,
    book VARCHAR(80) NOT NULL,
    chapter INT NOT NULL,
    verse INT NOT NULL,
    content VARCHAR(5000) NOT NULL
);


-- insert data into the scripture table
INSERT INTO scriptures (book, chapter, verse, content)
    VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content)
    VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content)
    VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scriptures (book, chapter, verse, content)
    VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

UPDATE scriptures SET content = 'And it came to pass that I, Nephi, said unto my father: I will go and do the things which the Lord hath commanded, for I know that the Lord giveth no commandments unto the children of men, save he shall prepare a way for them that they may accomplish the thing which he commandeth them.' WHERE content = 'I will go I will do';

UPDATE scriptures SET content = 'Adam fell that men might be; and men are, that they might have joy.' WHERE content = 'Adam fell that men might be and men are that they might have joy.';


-- create a topic table for topics
CREATE TABLE topic (
    id SERIAL PRIMARY KEY NOT NULL,
    name VARCHAR(40) NOT NULL
);


-- insert data into the topic table:
INSERT INTO topic (name)
    VALUES ('Faith');

INSERT INTO topic (name)
    VALUES ('Sacrifice');

INSERT INTO topic (name)
    VALUES ('Charity');


-- create a cross-reference table to link the scriptures
-- and topics
CREATE TABLE scripture_topic (
    scripture_id INT NOT NULL REFERENCES scriptures(id),
    topic_id INT NOT NULL REFERENCES topic(id)
);