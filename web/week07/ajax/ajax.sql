CREATE TABLE form_element (
    student_id SERIAL NOT NULL PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    student_email VARCHAR(255) NOT NULL,
    student_contact VARCHAR(255) NOT NULL,
    student_address VARCHAR(255) NOT NULL
);