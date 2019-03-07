
CREATE TABLE Students(
Student_ID int NOT NULL UNIQUE,
Student_Name varchar(255),
CONSTRAINT Students_pk PRIMARY KEY (Student_ID)
)Engine=InnoDB;


CREATE TABLE Course(
Course_ID varchar(6) NOT NULL UNIQUE,
Course_Title varchar(255),
Campus_Address varchar(255),
Major varchar(255),
CONSTRAINT Course_pk PRIMARY KEY (Course_ID)
)Engine=InnoDB;


CREATE TABLE Instructor(
Instructor_ID int NOT NULL UNIQUE AUTO_INCREMENT,
Instructor_Name varchar(255),
Instructor_Location varchar(255),
CONSTRAINT Instructor_pk PRIMARY KEY (Instructor_ID)
)Engine=InnoDB;


CREATE TABLE GradeReport(
Report_ID int NOT NULL UNIQUE AUTO_INCREMENT,
Course_ID varchar(6),
Student_ID int,
Instructor_ID int,
Grade varchar(255),
CONSTRAINT GradeReport_pk PRIMARY KEY (Report_ID),
CONSTRAINT Course_fk FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID),
CONSTRAINT Students_fk FOREIGN KEY (Student_ID) REFERENCES Students(Student_ID),
CONSTRAINT Instructor_fk FOREIGN KEY (Instructor_ID) REFERENCES Instructor(Instructor_ID)
)Engine=InnoDB;

CREATE TABLE CourseInstructor(
Course_ID varchar(6),
Instructor_ID int,
FOREIGN KEY (Course_ID) REFERENCES Course(Course_ID),
FOREIGN KEY (Instructor_ID) REFERENCES Instructor(Instructor_ID)
)Engine=InnoDB;




INSERT INTO students (Student_ID, Student_Name) 
VALUES('16830058', 'Williams');
INSERT INTO students (Student_ID, Student_Name) 
VALUES('543291073', 'Baker');



INSERT INTO course (Course_ID, Course_Title, Campus_Address, Major) 
VALUES 
('ITC114', 'Database Sys', 'Albury', 'BIT'),
('ITC211', 'Sys Analysis', 'Albury', 'BIT'),
('ITC200', 'Database Mgt', 'Wagga', 'Acct'),
('Acc11', 'Fund Acct', 'Wagga', 'Acct'),
('Mkg21', 'Intro Mkt', 'Wagga', 'Acct');




INSERT INTO instructor (Instructor_ID, Instructor_Name, Instructor_Location)
VALUES 
(NULL, 'Ned', 'B104');
INSERT INTO instructor (Instructor_ID, Instructor_Name, Instructor_Location)
VALUES (NULL, 'Raj', 'B115');
INSERT INTO instructor (Instructor_ID, Instructor_Name, Instructor_Location)
VALUES(NULL, 'Rui', 'H310');
INSERT INTO instructor (Instructor_ID, Instructor_Name, Instructor_Location)
VALUES (NULL, 'Shubha', 'A120');
INSERT INTO instructor (Instructor_ID, Instructor_Name, Instructor_Location)
VALUES (NULL, 'Joe', 'A112');




INSERT INTO GradeReport (Report_ID,Course_ID, Student_ID, Instructor_ID, Grade) 
VALUES (NULL, 
(select Course_ID from course where Course_Title = 'Database Sys'), 
(select Student_ID from students where Student_ID = 16830058), 
(select Instructor_ID from instructor where Instructor_Name = 'Ned'), 
'HD');

INSERT INTO GradeReport (Report_ID, Course_ID, Student_ID, Instructor_ID, Grade) 
VALUES (NULL, 
(select Course_ID from course where Course_Title = 'Sys Analysis'), 
(select Student_ID from students where Student_ID = 16830058), 
(select Instructor_ID from instructor where Instructor_Name = 'Raj'), 
'D');

INSERT INTO GradeReport (Report_ID, Course_ID, Student_ID, Instructor_ID, Grade) 
VALUES (NULL, 
(select Course_ID from course where Course_Title = 'Database Mgt'), 
(select Student_ID from students where Student_ID = 543291073), 
(select Instructor_ID from instructor where Instructor_Name = 'Rui'), 
'D');

INSERT INTO GradeReport (Report_ID, Course_ID, Student_ID, Instructor_ID, Grade) 
VALUES (NULL, 
(select Course_ID from course where Course_Title = 'Fund Acct'), 
(select Student_ID from students where Student_ID = 543291073), 
(select Instructor_ID from instructor where Instructor_Name = 'Shubha'), 
'C');

INSERT INTO GradeReport (Report_ID, Course_ID, Student_ID, Instructor_ID, Grade) 
VALUES (NULL, 
(select Course_ID from course where Course_Title = 'Intro Mkt'), 
(select Student_ID from students where Student_ID = 543291073), 
(select Instructor_ID from instructor where Instructor_Name = 'Joe'), 
'P');










INSERT INTO courseinstructor(Course_ID, Instructor_ID) VALUES(
(SELECT Course_ID FROM course WHERE Course_Title = 'Database Sys'), (SELECT Instructor_ID FROM instructor WHERE Instructor_Name = 'Ned')
);

INSERT INTO courseinstructor(Course_ID, Instructor_ID) VALUES(
(SELECT Course_ID FROM course WHERE Course_Title = 'Sys Analysis'), (SELECT Instructor_ID FROM instructor WHERE Instructor_Name = 'Raj')
);

INSERT INTO courseinstructor(Course_ID, Instructor_ID) VALUES(
(SELECT Course_ID FROM course WHERE Course_Title = 'Database Mgt'), (SELECT Instructor_ID FROM instructor WHERE Instructor_Name = 'Rui')
);

INSERT INTO courseinstructor(Course_ID, Instructor_ID) VALUES(
(SELECT Course_ID FROM course WHERE Course_Title = 'Fund Acct'), (SELECT Instructor_ID FROM instructor WHERE Instructor_Name = 'Shubha')
);

INSERT INTO courseinstructor(Course_ID, Instructor_ID) VALUES(
(SELECT Course_ID FROM course WHERE Course_Title = 'Intro Mkt'), (SELECT Instructor_ID FROM instructor WHERE Instructor_Name = 'Joe')
);
