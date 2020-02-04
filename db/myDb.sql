CREATE DATABASE milestone;

CREATE TABLE person (
    person_id SERIAL NOT NULL PRIMARY KEY,
    first_name VARCHAR(20) NOT NULL,
    middle_name VARCHAR(20),
    last_name VARCHAR(20) NOT NULL,
    birthdate TIMESTAMP NOT NULL,
    is_male BOOLEAN NOT NULL
);

CREATE TABLE milestone (
    milestone_id SERIAL NOT NULL PRIMARY KEY,
    milestone_name VARCHAR(100) NOT NULL,
    milestone_date TIMESTAMP NOT NULL,
    milestone_location VARCHAR(100) NOT NULL,
    milestone_notes VARCHAR(500),
   -- person INT NOT NULL
  	person_id INT NOT NULL REFERENCES person(person_id)
);

-- test data below

INSERT INTO person (person_id, first_name, middle_name, last_name, birthdate, is_male)
    VALUES (DEFAULT,'Emmett','Doc','Brown','1914-11-05 12:34:56',true);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'Birth','1914-11-05 12:34:56','Hill Valley, California','Born with white hair', 1);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'First words','1915-12-28 12:34:56','Hill Valley, California','"flux capacitor"', 1);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'Concussion','1955-11-05 12:34:56','Hill Valley, California','hit head on toilet; a red-letter date', 1);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'Time Travel Success','1985-10-26 01:20:00','Twin Pines Mall, Hill Valley, California','Docs dog, Einstein, becomes the worlds first time traveler.', 1);

INSERT INTO person (person_id, first_name, middle_name, last_name, birthdate, is_male)
    VALUES (DEFAULT,'Marty','','McFly','1968-06-20 12:34:56',true);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'Birth','1968-06-20 12:34:56','Hill Valley, California','', 2);

INSERT INTO milestone (milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id)
	VALUES (DEFAULT,'Travel Back in Time','1985-10-26 01:20:00','Twin Pines Mall, Hill Valley, California','Eludes Lybians by travelling back in time.', 2);


-- WITH event AS (
--   SELECT * FROM milestone 
-- INNER JOIN person ON milestone.person_id = person.person_id)

-- SELECT *, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate) AS person_age FROM event;

WITH theEvent AS (
  SELECT * FROM milestone
  INNER JOIN person
  ON milestone.person_id = person.person_id)
 
 SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
  AS person_age, milestone_location, milestone_notes
  FROM theEvent;
