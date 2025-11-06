CREATE database ci4_login_zabala;

use ci4_login_zabala;

create table students( 
	student_id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
	s_lastname VARCHAR(255) NOT NULL,
  	s_firstname VARCHAR(255) NOT NULL,
  	s_middlename VARCHAR(255),
    course VARCHAR(255) NOT NULL
);

create table record_attendance(
    student_id INT,
    status ENUM('PRESENT', 'ABSENT'),
    attendance_data date NOT NULL,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

CREATE TABLE users (
id INT(11) AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
password VARCHAR(255) NOT NULL,
created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
