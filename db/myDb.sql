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
  	person_id INT NOT NULL REFERENCES person(person_id) ON DELETE CASCADE
);


-- QUERY TO FOR INDIVIDUAL MILESTONE
WITH theEvent AS (
  SELECT * FROM milestone
  INNER JOIN person
  ON milestone.person_id = person.person_id)
 
 SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
  AS person_age, milestone_location, milestone_notes
  FROM theEvent;

-- milstones for user with person_id = 1
WITH theEvent AS (
  SELECT * FROM milestone
  INNER JOIN person
  ON milestone.person_id = person.person_id
  WHERE person.person_id = 1)
 
 SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
  AS person_age, milestone_location, milestone_notes
  FROM theEvent;

-- milstones for user with person_id = 2
WITH theEvent AS (
  SELECT * FROM milestone
  INNER JOIN person
  ON milestone.person_id = person.person_id
  WHERE person.person_id = 2)
 
 SELECT milestone_name, milestone_date, DATE_PART('year', milestone_date) - DATE_PART('year', birthdate)
  AS person_age, milestone_location, milestone_notes
  FROM theEvent;

-- COMMAND TO UPDATE RECORD FOR person_id = 10
UPDATE person
  SET first_name  = 'Mary',
      middle_name = 'Tyler',
      last_name   = 'Moore',
      is_male     = 'false'
  WHERE person_id = 10;

-- QUERY USED TO POPULATE 'UPDATE MILESTONE' MODAL DATA FOR milestone_id = 43
SELECT milestone_id, milestone_name, milestone_date, milestone_location, milestone_notes, person_id
  FROM milestone
  WHERE person_id = 3
  AND milestone_id = 43;
