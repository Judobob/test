Laravel test

Create api that creates 2 many to many linked models for courses students.

Courses have candidate limits.

Requests are in json and jsend standard..

to list courses and students use:
GET /courses
GET /students

to add course use
POST /courses
POST /students

parameters courses:
begin
end
candidate_limit
title

parameters students:
first_name
last_name
gender

validate on required returns with error if wrong.

POST courses/{courses}/register
with student_id parameter to register a student

DELETE courses/{courses}/register
with student_id parameter to unregister a student
