<?php session_start(); ?> 
<div class="flex flex-col h-screen">
    <div><?php include "header.php"; ?></div>
    <div class="flex flex-col flex-grow justify-center">
        <?php
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  ?>
  <div class="sql-shadow p-5 w-[80%] bg-sky-100 self-center word-break: break-all overflow-scroll ">
    <pre class="w-[100%] flex word-break: break-all">
#------------------------------------------------------------------------------------------------------------------------
# Table list in this schema
#------------------------------------------------------------------------------------------------------------------------
#	academics: data for the academic staff
#	administrator: data for administrator staff
#	attendance: attendance data for students
#	college: data of  the school
#	courses: data for the courses in the college
#	delete_staff_data: the old data when staff data deleted
#	delete_student_data: the old data when student data deleted
#	exam_result: the data of the student`s result of exams
#	exams: the data for the exams
#	roles: detailed data on user permissions
#	staff: store data of the college staff
#	staff_emails: emails for the staff
#	staff_outdate_data: store the old data when staff data updated
#	staff_phone: phone numbers of the staff
#	student_outdate_data: store the old data when student data updated
#	students: data of the students
#	timetable: timetable for the courses
#	timetable_handler: connect the student table and timetable table

#------------------------------------------------------------------------------------------------------------------------
# Create and use database
#------------------------------------------------------------------------------------------------------------------------
create database assignment;
use assignment;

#------------------------------------------------------------------------------------------------------------------------
# Create college table and insert some data
#------------------------------------------------------------------------------------------------------------------------
create table college(
collegeID int primary key not null auto_increment,
collegeName varchar(20),
collegeAddress text,
collegeEmail varchar(45),
collegePhoneNumber varchar(30)
);

insert into college (collegeID, collegeName, collegeAddress, collegeEmail, collegePhoneNumber) values
(1, 'Xavier School', '13450 South Circle', 'chorwell0@businessweek.com', '+355 997 756 3563');

#------------------------------------------------------------------------------------------------------------------------
# Create student table and insert 100 student data
#------------------------------------------------------------------------------------------------------------------------
 create table students (
 studentID int primary key not null auto_increment,
 courseID int not null,
 studentFirstName varchar(20),
 studentLastName varchar(20),
 studentPhoto text,
 studentEmail varchar(50),
 studentPhoneNumber varchar(15),
 studentAddress text,
 studentStartDate DATE,
 studentDOB DATE,
 studentCode varChar(15) NOT NULL UNIQUE,
 password varChar(100),
 CONSTRAINT fk_courseID foreign key (courseID)
    REFERENCES courses (courseID)
 );

insert into students (courseID, studentFirstName, studentLastName, studentPhoto, studentEmail, studentPhoneNumber, studentAddress, studentStartDate, studentDOB) values
(37, 'Nels', 'Mournian', 'http://dummyimage.com/164x100.png/ff4444/ffffff', 'nmournian0@newsvine.com', '618-448-8826', '491 Forest Dale Parkway', '2022-04-24', '1978-09-27'),
(33, 'Jemima', 'Matthewman', 'http://dummyimage.com/208x100.png/dddddd/000000', 'jmatthewman1@spiegel.de', '485-783-1241', '16 Reindahl Way', '2022-07-20', '2001-06-29'),
(36, 'Rachele', 'Harness', 'http://dummyimage.com/143x100.png/ff4444/ffffff', 'rharness2@scribd.com', '367-381-5748', '06780 Sunbrook Road', '2022-10-04', '1978-10-05'),
(42, 'Ambrose', 'Bungey', 'http://dummyimage.com/179x100.png/ff4444/ffffff', 'abungey3@newsvine.com', '394-446-0242', '5 Gateway Trail', '2022-08-28', '1989-02-01'),
(39, 'Sylas', 'Plesing', 'http://dummyimage.com/104x100.png/dddddd/000000', 'splesing4@sphinn.com', '259-587-2781', '62887 Boyd Court', '2022-10-13', '2000-05-02'),
(33, 'Pebrook', 'Gerner', 'http://dummyimage.com/243x100.png/dddddd/000000', 'pgerner5@51.la', '303-641-0205', '13 Saint Paul Street', '2022-11-16', '1993-03-30'),
(37, 'Jennine', 'Symmons', 'http://dummyimage.com/238x100.png/ff4444/ffffff', 'jsymmons6@wikimedia.org', '629-182-9728', '1606 Summerview Crossing', '2022-03-10', '1981-08-08'),
(38, 'Marti', 'Puleque', 'http://dummyimage.com/102x100.png/5fa2dd/ffffff', 'mpuleque7@weebly.com', '575-971-7201', '95 Londonderry Center', '2022-05-22', '1988-12-03'),
(34, 'Ebba', 'Kennagh', 'http://dummyimage.com/102x100.png/5fa2dd/ffffff', 'ekennagh8@discuz.net', '220-130-5087', '63 Bay Drive', '2022-11-14', '1997-02-19'),
(33, 'Grace', 'Grigore', 'http://dummyimage.com/190x100.png/dddddd/000000', 'ggrigore9@deviantart.com', '482-349-0696', '78576 Mandrake Center', '2022-11-29', '1992-01-02'),
(35, 'Cal', 'Hildrew', 'http://dummyimage.com/237x100.png/ff4444/ffffff', 'childrewa@newyorker.com', '846-904-2539', '0 Texas Way', '2022-10-08', '2001-09-23'),
(41, 'Winnah', 'Lowensohn', 'http://dummyimage.com/160x100.png/ff4444/ffffff', 'wlowensohnb@pen.io', '645-519-3176', '10 Brentwood Terrace', '2022-05-06', '1978-01-02'),
(40, 'Latrina', 'Edards', 'http://dummyimage.com/120x100.png/cc0000/ffffff', 'ledardsc@github.io', '401-937-7456', '890 Graedel Park', '2021-12-29', '1969-12-17'),
(40, 'Minda', 'Januszkiewicz', 'http://dummyimage.com/241x100.png/dddddd/000000', 'mjanuszkiewiczd@icq.com', '539-115-7990', '70 Gina Parkway', '2022-06-27', '1981-02-23'),
(35, 'Demetra', 'Sherwin', 'http://dummyimage.com/241x100.png/cc0000/ffffff', 'dsherwine@mac.com', '221-557-3020', '86 Warrior Parkway', '2022-11-14', '1987-03-30'),
(36, 'Jerome', 'Featherstonhalgh', 'http://dummyimage.com/228x100.png/cc0000/ffffff', 'jfeatherstonhalghf@canalblog.com', '852-688-7840', '23 Holy Cross Pass', '2022-07-18', '2001-06-25'),
(36, 'Sibbie', 'Wankling', 'http://dummyimage.com/167x100.png/ff4444/ffffff', 'swanklingg@unesco.org', '977-513-4296', '26 Oak Terrace', '2022-04-01', '1971-07-23'),
(34, 'Linette', 'Furmston', 'http://dummyimage.com/221x100.png/dddddd/000000', 'lfurmstonh@reference.com', '651-203-6700', '78462 Warbler Point', '2022-03-11', '1971-12-13'),
(35, 'Mariska', 'Loomes', 'http://dummyimage.com/161x100.png/dddddd/000000', 'mloomesi@jalbum.net', '203-709-2640', '576 Onsgard Terrace', '2021-12-30', '1979-02-03'),
(40, 'Lelah', 'Bergeau', 'http://dummyimage.com/119x100.png/ff4444/ffffff', 'lbergeauj@domainmarket.com', '640-887-2233', '39587 Dakota Drive', '2022-09-21', '1995-04-30'),
(42, 'Christos', 'Carmont', 'http://dummyimage.com/236x100.png/dddddd/000000', 'ccarmontk@state.tx.us', '364-118-3315', '6 Stoughton Alley', '2022-04-16', '2000-08-20'),
(36, 'Maurizia', 'Breit', 'http://dummyimage.com/143x100.png/dddddd/000000', 'mbreitl@studiopress.com', '334-590-8928', '254 Lakewood Drive', '2022-08-21', '1983-11-15'),
(37, 'Lula', 'Sisey', 'http://dummyimage.com/120x100.png/dddddd/000000', 'lsiseym@vk.com', '771-225-4567', '572 Ridge Oak Alley', '2022-10-05', '1967-01-13'),
(35, 'Bert', 'Fishby', 'http://dummyimage.com/229x100.png/5fa2dd/ffffff', 'bfishbyn@hugedomains.com', '649-735-2169', '9 Sugar Park', '2022-03-24', '1995-11-13'),
(41, 'Sigmund', 'Neeve', 'http://dummyimage.com/111x100.png/5fa2dd/ffffff', 'sneeveo@canalblog.com', '217-953-4759', '362 Nova Court', '2022-04-10', '1966-04-27'),
(33, 'Barton', 'Keppie', 'http://dummyimage.com/107x100.png/5fa2dd/ffffff', 'bkeppiep@acquirethisname.com', '812-274-8214', '858 Texas Center', '2022-03-03', '1971-12-20'),
(38, 'Holly', 'Blythe', 'http://dummyimage.com/200x100.png/5fa2dd/ffffff', 'hblytheq@shinystat.com', '193-287-9051', '06 Fuller Plaza', '2022-09-30', '2001-02-19'),
(35, 'Matelda', 'Finlater', 'http://dummyimage.com/136x100.png/ff4444/ffffff', 'mfinlaterr@pcworld.com', '356-341-7982', '206 Doe Crossing Hill', '2022-07-31', '1996-11-09'),
(33, 'Shari', 'Isakovitch', 'http://dummyimage.com/225x100.png/5fa2dd/ffffff', 'sisakovitchs@cisco.com', '455-934-9275', '90 Division Road', '2022-08-27', '1980-07-10'),
(38, 'Winnifred', 'Debrick', 'http://dummyimage.com/203x100.png/ff4444/ffffff', 'wdebrickt@comsenz.com', '142-204-2463', '30839 Scott Drive', '2022-09-28', '1992-07-25'),
(35, 'Noby', 'McCunn', 'http://dummyimage.com/232x100.png/5fa2dd/ffffff', 'nmccunnu@ibm.com', '648-848-2209', '121 Sachs Hill', '2022-11-06', '1976-06-01'),
(39, 'Cosimo', 'Chaters', 'http://dummyimage.com/193x100.png/ff4444/ffffff', 'cchatersv@desdev.cn', '894-455-8389', '2062 Springs Center', '2022-08-16', '1976-02-25'),
(42, 'Udale', 'Graves', 'http://dummyimage.com/233x100.png/ff4444/ffffff', 'ugravesw@amazon.com', '457-406-9830', '6 Bay Junction', '2022-09-28', '1962-11-04'),
(40, 'Allys', 'MacMenamie', 'http://dummyimage.com/127x100.png/ff4444/ffffff', 'amacmenamiex@wikimedia.org', '550-685-1732', '6 Crownhardt Point', '2022-08-09', '1962-10-16'),
(37, 'Neile', 'Omar', 'http://dummyimage.com/114x100.png/5fa2dd/ffffff', 'nomary@icio.us', '983-962-4438', '5589 Fieldstone Alley', '2022-03-29', '1986-04-13'),
(33, 'Ange', 'Woodfield', 'http://dummyimage.com/101x100.png/ff4444/ffffff', 'awoodfieldz@lulu.com', '595-563-0247', '77 Michigan Circle', '2022-08-19', '1989-11-22'),
(39, 'Kassey', 'Otham', 'http://dummyimage.com/231x100.png/cc0000/ffffff', 'kotham10@wisc.edu', '256-989-6025', '3237 Elka Pass', '2022-02-25', '1967-09-10'),
(40, 'Eliot', 'Housiaux', 'http://dummyimage.com/148x100.png/dddddd/000000', 'ehousiaux11@home.pl', '725-413-4216', '5 Schurz Junction', '2022-06-28', '1995-08-20'),
(32, 'Dorolice', 'Limeburner', 'http://dummyimage.com/174x100.png/5fa2dd/ffffff', 'dlimeburner12@tiny.cc', '961-169-9137', '7104 Clyde Gallagher Circle', '2022-01-10', '1987-12-16'),
(36, 'Thaxter', 'Polsin', 'http://dummyimage.com/177x100.png/ff4444/ffffff', 'tpolsin13@list-manage.com', '557-356-4665', '6 Havey Drive', '2022-04-18', '1991-05-16'),
(32, 'Sinclare', 'Millins', 'http://dummyimage.com/207x100.png/cc0000/ffffff', 'smillins14@sun.com', '581-710-9531', '916 Toban Pass', '2022-07-31', '1982-02-28'),
(41, 'Reginald', 'Stollsteiner', 'http://dummyimage.com/167x100.png/5fa2dd/ffffff', 'rstollsteiner15@google.com.br', '753-400-5985', '6019 Fisk Drive', '2022-11-10', '1964-06-01'),
(39, 'Sondra', 'Nelissen', 'http://dummyimage.com/150x100.png/cc0000/ffffff', 'snelissen16@ebay.com', '929-287-3151', '79600 Dunning Court', '2022-12-05', '1964-10-15'),
(34, 'Fredelia', 'de Verson', 'http://dummyimage.com/237x100.png/5fa2dd/ffffff', 'fdeverson17@qq.com', '476-805-2890', '67058 Loeprich Parkway', '2022-03-31', '1979-04-22'),
(38, 'Berny', 'Foskew', 'http://dummyimage.com/172x100.png/5fa2dd/ffffff', 'bfoskew18@redcross.org', '282-403-9185', '874 Arapahoe Crossing', '2022-11-13', '1976-11-04'),
(33, 'Kelci', 'Ranfield', 'http://dummyimage.com/119x100.png/5fa2dd/ffffff', 'kranfield19@scribd.com', '678-365-0105', '27 Kings Pass', '2022-05-11', '2000-09-29'),
(36, 'Ludwig', 'McNellis', 'http://dummyimage.com/200x100.png/dddddd/000000', 'lmcnellis1a@mit.edu', '827-965-0503', '570 Helena Lane', '2022-09-12', '1974-03-31'),
(40, 'Onofredo', 'Brandes', 'http://dummyimage.com/106x100.png/dddddd/000000', 'obrandes1b@amazonaws.com', '307-713-4941', '29 Maple Point', '2022-04-24', '1960-07-20'),
(35, 'Katee', 'Edler', 'http://dummyimage.com/164x100.png/5fa2dd/ffffff', 'kedler1c@issuu.com', '312-188-9640', '479 Crownhardt Hill', '2022-02-21', '1986-06-04'),
(33, 'Salomon', 'Blodget', 'http://dummyimage.com/209x100.png/ff4444/ffffff', 'sblodget1d@hibu.com', '823-826-7585', '30 Jackson Plaza', '2021-12-28', '1969-03-09'),
(32, 'Kincaid', 'MacGorrie', 'http://dummyimage.com/118x100.png/dddddd/000000', 'kmacgorrie1e@vk.com', '130-674-5447', '32299 Lunder Point', '2022-07-21', '1983-01-19'),
(41, 'Nevins', 'Craghead', 'http://dummyimage.com/122x100.png/dddddd/000000', 'ncraghead1f@vkontakte.ru', '262-542-4799', '60 Anhalt Park', '2022-02-07', '1964-01-25'),
(42, 'Morgun', 'Whoston', 'http://dummyimage.com/117x100.png/dddddd/000000', 'mwhoston1g@bluehost.com', '507-824-9621', '50 Farragut Center', '2022-01-25', '1961-11-03'),
(40, 'Nikkie', 'Troutbeck', 'http://dummyimage.com/160x100.png/ff4444/ffffff', 'ntroutbeck1h@google.cn', '970-465-0978', '59 Kim Parkway', '2022-06-06', '1996-01-06'),
(38, 'Willdon', 'Alti', 'http://dummyimage.com/176x100.png/dddddd/000000', 'walti1i@miibeian.gov.cn', '785-142-7744', '52801 Lerdahl Street', '2022-01-09', '1989-03-31'),
(36, 'Fanny', 'Dowman', 'http://dummyimage.com/238x100.png/dddddd/000000', 'fdowman1j@irs.gov', '866-163-0273', '2060 Dryden Point', '2022-11-22', '1973-06-28'),
(42, 'Walsh', 'Broomer', 'http://dummyimage.com/114x100.png/dddddd/000000', 'wbroomer1k@umich.edu', '767-457-0092', '133 American Ash Terrace', '2022-12-04', '1977-07-21'),
(34, 'Keslie', 'Phythean', 'http://dummyimage.com/213x100.png/ff4444/ffffff', 'kphythean1l@ow.ly', '819-560-1866', '688 Talisman Drive', '2022-02-21', '1991-04-04'),
(35, 'Niall', 'Judgkins', 'http://dummyimage.com/160x100.png/dddddd/000000', 'njudgkins1m@wisc.edu', '375-922-2228', '41 Utah Hill', '2022-11-17', '1993-07-14'),
(40, 'Ebonee', 'Braunes', 'http://dummyimage.com/159x100.png/5fa2dd/ffffff', 'ebraunes1n@arizona.edu', '257-135-2755', '936 Columbus Drive', '2022-12-01', '1982-10-27'),
(37, 'Parnell', 'Stokes', 'http://dummyimage.com/103x100.png/dddddd/000000', 'pstokes1o@businessweek.com', '423-911-8250', '2775 Monterey Lane', '2022-06-19', '1983-08-07'),
(35, 'Frieda', 'Whimper', 'http://dummyimage.com/137x100.png/5fa2dd/ffffff', 'fwhimper1p@engadget.com', '890-726-5913', '14 Warbler Lane', '2022-03-15', '1999-11-20'),
(37, 'Rosa', 'Cliffe', 'http://dummyimage.com/173x100.png/ff4444/ffffff', 'rcliffe1q@hud.gov', '593-607-1955', '87213 Killdeer Crossing', '2022-11-10', '1992-11-13'),
(41, 'Rica', 'Klageman', 'http://dummyimage.com/203x100.png/cc0000/ffffff', 'rklageman1r@feedburner.com', '695-716-7053', '0615 Sugar Crossing', '2022-06-29', '1970-01-26'),
(34, 'George', 'O''Kenny', 'http://dummyimage.com/239x100.png/dddddd/000000', 'gokenny1s@g.co', '529-119-1865', '9633 Muir Alley', '2022-03-03', '1972-02-14'),
(34, 'Fayina', 'Skippen', 'http://dummyimage.com/236x100.png/ff4444/ffffff', 'fskippen1t@globo.com', '106-754-5368', '9867 Oak Place', '2022-03-10', '1977-04-13'),
(42, 'Marjy', 'Van der Merwe', 'http://dummyimage.com/190x100.png/ff4444/ffffff', 'mvandermerwe1u@walmart.com', '535-992-8669', '56771 Scott Junction', '2022-12-14', '1990-07-12'),
(39, 'Tracey', 'Garside', 'http://dummyimage.com/190x100.png/dddddd/000000', 'tgarside1v@google.fr', '788-914-6904', '3 Fordem Lane', '2022-05-18', '2001-03-31'),
(40, 'Shellysheldon', 'Tatteshall', 'http://dummyimage.com/238x100.png/ff4444/ffffff', 'statteshall1w@macromedia.com', '558-670-6904', '0825 Columbus Alley', '2022-09-14', '1989-04-12'),
(40, 'Clive', 'Philson', 'http://dummyimage.com/120x100.png/ff4444/ffffff', 'cphilson1x@smh.com.au', '500-863-4689', '05 Fairfield Street', '2022-11-25', '1993-04-10'),
(42, 'Omar', 'Whitelock', 'http://dummyimage.com/150x100.png/ff4444/ffffff', 'owhitelock1y@drupal.org', '243-946-4685', '352 Warner Lane', '2022-02-15', '1977-10-28'),
(38, 'Lonnie', 'Davenell', 'http://dummyimage.com/103x100.png/ff4444/ffffff', 'ldavenell1z@google.nl', '185-848-6634', '25 Prairieview Court', '2021-12-29', '1966-06-28'),
(35, 'Frayda', 'Oakey', 'http://dummyimage.com/233x100.png/ff4444/ffffff', 'foakey20@posterous.com', '422-819-4688', '16139 Milwaukee Crossing', '2022-09-05', '2002-04-23'),
(42, 'Rosaline', 'Wardrop', 'http://dummyimage.com/160x100.png/cc0000/ffffff', 'rwardrop21@vinaora.com', '350-784-7227', '5 Dexter Plaza', '2022-04-28', '1981-09-27'),
(39, 'Daisey', 'Slaten', 'http://dummyimage.com/100x100.png/dddddd/000000', 'dslaten22@php.net', '247-698-6352', '4817 Truax Crossing', '2022-02-01', '1973-03-08'),
(33, 'Theresita', 'Anstead', 'http://dummyimage.com/152x100.png/dddddd/000000', 'tanstead23@unc.edu', '175-293-0749', '22 Forest Run Crossing', '2022-02-26', '1985-02-21'),
(42, 'Arny', 'Baldwin', 'http://dummyimage.com/181x100.png/5fa2dd/ffffff', 'abaldwin24@etsy.com', '743-997-9441', '62 Porter Hill', '2022-01-02', '1984-04-20'),
(35, 'Savina', 'Darch', 'http://dummyimage.com/202x100.png/ff4444/ffffff', 'sdarch25@census.gov', '629-353-4791', '99 Portage Plaza', '2022-10-07', '1981-08-07'),
(33, 'Mano', 'Denisovo', 'http://dummyimage.com/247x100.png/dddddd/000000', 'mdenisovo26@edublogs.org', '410-851-4235', '75 Maryland Street', '2022-10-22', '1971-03-14'),
(37, 'Antoni', 'Smolan', 'http://dummyimage.com/207x100.png/cc0000/ffffff', 'asmolan27@bloglovin.com', '295-480-1738', '70 Dawn Avenue', '2022-10-07', '1990-08-29'),
(40, 'Roddie', 'Wingar', 'http://dummyimage.com/219x100.png/ff4444/ffffff', 'rwingar28@marriott.com', '901-939-6332', '828 Springs Circle', '2022-10-06', '1970-01-06'),
(36, 'Lynette', 'Hansana', 'http://dummyimage.com/196x100.png/cc0000/ffffff', 'lhansana29@bravesites.com', '380-279-8684', '603 Cottonwood Pass', '2022-10-26', '1964-05-15'),
(42, 'Flss', 'Finker', 'http://dummyimage.com/146x100.png/5fa2dd/ffffff', 'ffinker2a@cnn.com', '585-687-5859', '644 Novick Hill', '2022-01-02', '1985-02-24'),
(37, 'Rickert', 'De Ambrosi', 'http://dummyimage.com/176x100.png/ff4444/ffffff', 'rdeambrosi2b@prlog.org', '927-799-8906', '1684 Delaware Center', '2022-05-26', '1984-03-17'),
(33, 'Bengt', 'Wicken', 'http://dummyimage.com/171x100.png/dddddd/000000', 'bwicken2c@baidu.com', '870-815-1900', '84 Golden Leaf Way', '2022-04-19', '1986-09-22'),
(32, 'Sarette', 'Jope', 'http://dummyimage.com/106x100.png/cc0000/ffffff', 'sjope2d@comcast.net', '224-820-2530', '94868 Jana Lane', '2022-03-02', '1978-12-07'),
(36, 'Eve', 'Stapells', 'http://dummyimage.com/247x100.png/cc0000/ffffff', 'estapells2e@networksolutions.com', '582-901-7570', '823 Harbort Place', '2022-02-11', '1975-02-05'),
(39, 'Mignonne', 'Douce', 'http://dummyimage.com/181x100.png/cc0000/ffffff', 'mdouce2f@seattletimes.com', '611-602-2595', '0889 Acker Parkway', '2022-09-28', '1997-07-31'),
(35, 'Elsinore', 'Lockton', 'http://dummyimage.com/174x100.png/dddddd/000000', 'elockton2g@hp.com', '674-739-5548', '7992 Hoard Place', '2022-03-12', '2003-12-13'),
(42, 'Natasha', 'Vye', 'http://dummyimage.com/191x100.png/5fa2dd/ffffff', 'nvye2h@pcworld.com', '968-186-3791', '3 Corscot Hill', '2022-09-24', '2001-10-13'),
(41, 'Darelle', 'Gregorin', 'http://dummyimage.com/139x100.png/5fa2dd/ffffff', 'dgregorin2i@toplist.cz', '945-603-6802', '0484 Welch Place', '2022-09-06', '1983-01-05'),
(41, 'Gray', 'Ames', 'http://dummyimage.com/173x100.png/5fa2dd/ffffff', 'games2j@answers.com', '127-293-9918', '8 Main Terrace', '2022-07-06', '1972-12-20'),
(33, 'Helenka', 'Curtois', 'http://dummyimage.com/230x100.png/ff4444/ffffff', 'hcurtois2k@reference.com', '989-304-6136', '2 Chinook Alley', '2022-10-14', '1982-01-30'),
(33, 'Dee dee', 'Normanvell', 'http://dummyimage.com/130x100.png/ff4444/ffffff', 'dnormanvell2l@opensource.org', '748-718-6121', '30312 Bay Pass', '2021-12-25', '1960-05-03'),
(38, 'Heinrik', 'Durker', 'http://dummyimage.com/242x100.png/5fa2dd/ffffff', 'hdurker2m@cyberchimps.com', '803-382-1934', '8 Kingsford Place', '2022-08-13', '1989-07-31'),
(38, 'Jean', 'Angrick', 'http://dummyimage.com/209x100.png/dddddd/000000', 'jangrick2n@rediff.com', '895-222-6482', '2875 Mayfield Road', '2022-06-08', '1977-09-11'),
(41, 'Paul', 'Caistor', 'http://dummyimage.com/206x100.png/5fa2dd/ffffff', 'pcaistor2o@eepurl.com', '887-837-5047', '2805 Jenifer Circle', '2022-11-17', '1962-05-04'),
(36, 'Alessandro', 'Ubanks', 'http://dummyimage.com/222x100.png/5fa2dd/ffffff', 'aubanks2p@nih.gov', '257-358-3492', '03083 Hovde Plaza', '2022-07-08', '1982-07-14'),
(32, 'Patrice', 'Willimot', 'http://dummyimage.com/211x100.png/5fa2dd/ffffff', 'pwillimot2q@bloomberg.com', '612-656-2156', '55 Michigan Alley', '2022-07-26', '1988-11-16'),
(32, 'Grant', 'Hasel', 'http://dummyimage.com/196x100.png/5fa2dd/ffffff', 'ghasel2r@epa.gov', '934-921-0885', '55698 Stang Pass', '2022-08-21', '1963-06-19');

#------------------------------------------------------------------------------------------------------------------------
# Create table for student data before update and create trigger to save student data before update
#------------------------------------------------------------------------------------------------------------------------
create table student_outdate_data (
 courseID int not null,
 studentFirstName varchar(20),
 studentLastName varchar(20),
 studentPhoto text,
 studentEmail varchar(50),
 studentPhoneNumber varchar(15),
 studentAddress text,
 studentStartDate DATE,
 studentDOB DATE,
 studentCode varChar(15),
 changedate DATE
 );
 
 CREATE TRIGGER `before_student_update`
 BEFORE UPDATE ON `students`
 FOR EACH ROW 
 INSERT INTO student_outdate_data
 (courseID, studentFirstName, studentLastName, studentPhoto, studentEmail,
 studentPhoneNumber, studentAddress, studentStartDate, studentDOB, studentCode, changedate)
  VALUES
	(old.courseID, old.studentFirstName, old.studentLastName,
	old.studentPhoto, old.studentEmail,
	old.studentPhoneNumber, old.studentAddress,
	old.studentStartDate, old.studentDOB,
	old.studentCode, now());

#------------------------------------------------------------------------------------------------------------------------
# Create table for student data before delete and create trigger to save student data before delete
#------------------------------------------------------------------------------------------------------------------------

 create table deleted_student_data (
 courseID int not null,
 studentFirstName varchar(20),
 studentLastName varchar(20),
 studentPhoto text,
 studentEmail varchar(50),
 studentPhoneNumber varchar(15),
 studentAddress text,
 studentStartDate DATE,
 studentDOB DATE,
 studentCode varChar(15),
 changedate DATE
 );
 
 CREATE TRIGGER `before_student_delete`
 BEFORE DELETE ON `students`
 FOR EACH ROW 
 INSERT INTO deleted_student_data
 (courseID, studentFirstName, studentLastName, studentPhoto, studentEmail,
 studentPhoneNumber, studentAddress, studentStartDate, studentDOB, studentCode, changedate)
  VALUES
	(old.courseID, old.studentFirstName, old.studentLastName,
	old.studentPhoto, old.studentEmail,
	old.studentPhoneNumber, old.studentAddress,
	old.studentStartDate, old.studentDOB,
	old.studentCode, now());
 
#------------------------------------------------------------------------------------------------------------------------
# Create table for student`s attendance
#------------------------------------------------------------------------------------------------------------------------

create table attendance(
attendanceID int primary key not null auto_increment,
studentID int,
attendance_date DATE,
attendance_description text,
foreign key (studentID)
references students(studentID)
);

#------------------------------------------------------------------------------------------------------------------------
# Create table for the courses data and insert data
#------------------------------------------------------------------------------------------------------------------------

 create table courses (
 courseID int primary key not null auto_increment,
 courseName varchar(60),
 courseDesc text,
 courseCode varChar(15)
 );
 
 INSERT INTO courses (courseName, courseCode, courseDesc) VALUES
 ("AAT Accounting Academy Level 3", "Course01", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("AAT Accounting Level 2", "Course02", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Principles of Business Administration Level 2", "Course03", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Principles of Team Leading Level 2", "Course04", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("BTEC Level 1 Certificate for ICT Users", "Course05", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("BTEC Level 2 Diploma for IT Users", "Course06", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("T Level in Digital Production, Design and Development", "Course07", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Level 1 Diploma in Creative Media Production and Technology", "Course08", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Level 1: BTEC Introductory Diploma in Vocational Studies", "Course09", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Level 2 Diploma in Media (UAL)", "Course10", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus."),
 ("Level 3 Diploma in Media Production and Technology (UAL)", "Course11", "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque gravida interdum leo sed tempus. Praesent in gravida dui, ac semper augue. Pellentesque commodo mollis dapibus. Integer venenatis magna velit, in iaculis erat tincidunt sed. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus quis sem fringilla sapien pellentesque imperdiet ut ac lectus.");

#------------------------------------------------------------------------------------------------------------------------
# Create table for the timetable data and insert the basic data
#------------------------------------------------------------------------------------------------------------------------

create table timetable(
timtableID int primary key not null auto_increment,
timetable_begin_time time,
timetable_end_time time,
timetable_day varChar(10)
);

insert into timetable (timetable_day, timetable_begin_time, timetable_end_time) values
("Monday", "10:00:00", "17:00:00"),
("Monday", "18:00:00", "21:00:00"),
("Tuesday", "10:00:00", "17:00:00"),
("Tuesday", "18:00:00", "21:00:00"),
("Wednesday", "10:00:00", "17:00:00"),
("Wednesday", "18:00:00", "21:00:00"),
("Thursday", "10:00:00", "17:00:00"),
("Thursday", "18:00:00", "21:00:00"),
("Friday", "10:00:00", "17:00:00"),
("Saturday", "10:00:00", "17:00:00"),
("Sunday", "10:00:00", "17:00:00");

#------------------------------------------------------------------------------------------------------------------------
# Create table for the timetable handler and insert data
#------------------------------------------------------------------------------------------------------------------------

create table timetable_handler(
handlerID int primary key not null auto_increment,
studentID int,
timetableID int,
foreign key (studentID)
 references students(studentID)
 ON DELETE CASCADE
 ON UPDATE CASCADE,
foreign key (timetableID)
 references timetable(timetableID)
 ON DELETE CASCADE
 ON UPDATE CASCADE
);

insert into timetable_handler (studentID, timetableID) values
(1, 1), (1, 2), (2, 2), (2, 4), (2, 6), (2, 8), (3, 5), (3, 9), (4, 3), (4, 1), (5, 3), (5, 1),
(6, 1), (6, 3), (7, 10), (7, 11), (8, 10), (8,11), (9, 5), (9, 9), (10, 7), (10, 9), 
(11, 2), (11, 4), (11, 6), (11, 8), (12, 3), (12, 5), (13, 2), (13, 4), (13, 6), (13, 8), 
(14, 2), (14, 4), (14, 6), (14, 8), (15, 5), (15, 7), (16, 2), (16, 4), (16, 6), (16, 8),
(17, 7), (17, 5), (18, 2), (18, 4), (18, 6), (18, 8), (19, 7), (19, 9), (20, 2), (20, 4), (20, 6), (20, 8),
(21, 1), (21, 3), (22, 2), (22, 4), (22, 6), (22, 8), (23, 2), (23, 4), (23, 6), (23, 8), (24, 1), (24, 3),
(25, 2), (25, 4), (25, 6), (25, 8), (26, 3), (26, 5), (27, 1), (27, 3), (28, 5), (28, 7), (29, 2), (29, 4), (29, 6), (29, 8),
(30, 2), (30, 4), (30, 6), (30, 8), (31, 2), (31, 4), (31, 6), (31, 8),
(32, 7), (32, 9), (33, 10), (33, 11), (34, 10), (34, 11), (35, 10), (35, 11), (36, 10), (36, 11), (37, 1), (37, 3),
(38, 1), (38, 3), (39, 1), (39, 3), (40, 2), (40, 4), (4, 6), (40, 8), (41, 2), (41, 4), (41, 6), (41, 8),
(42, 2), (42, 4), (42, 6), (42, 8), (43, 2), (43, 4), (43, 6), (43, 8), (44, 2), (44, 4), (44, 6), (44, 8),
(45, 1), (45, 3), (46, 2), (46, 4), (46, 6), (46, 8), (47, 2), (47, 4), (47, 6), (47, 8),
(48, 2), (48, 4), (48, 6), (48, 8), (49, 2), (49, 4), (49, 6), (49, 8), (50, 7), (50, 5),
(51, 2), (51, 4), (51, 6), (51, 8), (52, 2), (52, 4), (52, 6), (52, 8), (53, 2), (53, 4), (53, 6), (53, 8),
(54, 7), (54, 9), (55, 7), (55, 9), (56, 2), (56, 4), (56, 6), (56, 8), (57, 2), (57, 4), (57, 6), (57, 8),
(58, 1), (58, 3), (59, 5), (59, 7), (60, 1), (60, 3),
(61, 1), (61, 3), (62, 2), (62, 4), (62, 6), (62, 8), (63, 7), (63, 9), (64, 2), (64, 4), (64, 6), (64, 8),
(65, 1), (65, 3), (66, 5), (66, 7), (67, 1), (67, 3), (68, 2), (68, 4), (68, 6), (68, 8), (69, 3), (69, 5), (10, 1), (70, 5),
(71, 7), (71, 9), (72, 5), (72, 7), (73, 1), (73, 3), (74, 1), (74, 3), (75, 2), (75, 4), (75, 6), (75, 8),
(76, 2), (76, 4), (76, 6), (76, 8), (77, 10), (77, 11), (78, 10), (78, 11), (79, 10), (79, 11), (80, 10), (80, 11),
(81, 2), (81, 4), (81, 6), (81, 8), (82, 7), (82, 9), (83, 2), (83, 4), (83, 6), (83, 8), (84, 1), (84, 3),
(85, 1), (85, 3), (86, 2), (86, 4), (86, 6), (86, 8), (87, 3), (87, 5), (88, 2), (88, 4), (88, 6), (88, 8),
(89, 2), (89, 4), (89, 6), (89, 8), (90, 7), (90, 9), (91, 7), (91, 9), (92, 1), (92, 3), 
(93, 2), (93, 4), (93, 6), (93, 8), (94, 2), (94, 4), (94, 6), (94, 8), (95, 2), (95, 4), (95, 6), (95, 8),
(96, 3), (96, 5), (97, 10), (97, 11), (98, 10), (98, 11), (99, 10), (99, 11), (100, 10), (100, 11);

#------------------------------------------------------------------------------------------------------------------------
# Create table for the exams and insert data
#------------------------------------------------------------------------------------------------------------------------

CREATE table exams(
examID int primary key not null auto_increment,
courseID int,
exam_name varchar(50),
exam_description text,
exam_date date,
foreign key (courseID)
references courses(courseID)
);

insert into exams (courseID, exam_name, exam_description, exam_date) values
(32, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-20"),
(33, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-02-10"),
(34, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-02-05"),
(35, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-28"),
(36, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-02-05"),
(37, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-27"),
(38, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-28"),
(39, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-02-03"),
(40, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-30"),
(41, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-02-20"),
(42, 'assignment 01', "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pharetra mauris vitae lorem consectetur, eget rhoncus lacus accumsan. Nulla et sollicitudin odio, quis ornare urna. Sed ac laoreet nisi. Praesent id dictum enim, non molestie odio. Proin euismod tincidunt nulla nec eleifend. Nullam id sollicitudin magna. Aliquam ornare, libero accumsan tincidunt viverra, turpis justo scelerisque turpis, ac consectetur nibh dui vel purus. Quisque sodales nulla metus, eu sagittis augue aliquam quis. In finibus ante eu tellus ullamcorper aliquet. Etiam eget maximus mauris. Cras vel dolor mi. Proin a egestas enim, et vulputate ligula. Cras consequat elementum nibh ac vehicula. ", "2023-01-28");

#------------------------------------------------------------------------------------------------------------------------
# Create table for the exam`s results
#------------------------------------------------------------------------------------------------------------------------

create table exam_results(
resultID int primary key not null auto_increment,
examID int,
studentID int,
exam_result varchar(10),
exam_description text,
foreign key (examID)
references exams(examID),
foreign key (studentID)
references students(studentID)
);

#------------------------------------------------------------------------------------------------------------------------
# Create table for the satff and insert data
#------------------------------------------------------------------------------------------------------------------------

create table staff(
staffID int primary key not null auto_increment,
staff_firstName varchar(30),
staff_lastName varchar(30),
staff_address varchar(100),
staff_photo text,
is_admin int,
password varChar(255)
);

insert into staff (staff_firstName, staff_lastName, staff_address, staff_photo, is_admin) values 
('Joellyn', 'Bunny', '0894 Kipling Court', 'http://dummyimage.com/250x250.png/ff4444/ffffff', 0),
('Ilene', 'Stolberg', '89 Dennis Plaza', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Arlen', 'Diggens', '7497 Crescent Oaks Park', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Twyla', 'Patnelli', '4020 Mendota Drive', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Koral', 'Corkish', '868 Russell Plaza', 'http://dummyimage.com/250x250.png/ff4444/ffffff', 0),
('Renaldo', 'Brittoner', '46 Elka Circle', 'http://dummyimage.com/250x250.png/cc0000/ffffff', 0),
('Helaine', 'Heinl', '3 Lake View Way', 'http://dummyimage.com/250x250.png/ff4444/ffffff', 0),
('Sasha', 'Alasdair', '92 Old Shore Hill', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Errol', 'Desquesnes', '14 Dwight Park', 'http://dummyimage.com/250x250.png/cc0000/ffffff', 0),
('Tabby', 'Schultheiss', '7 Merchant Point', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Reeta', 'Doubrava', '77764 American Circle', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Antonia', 'Mudle', '1 Namekagon Junction', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Ulric', 'Turpey', '7310 Schiller Junction', 'http://dummyimage.com/250x250.png/dddddd/000000', 1),
('Ella', 'Parkey', '91 Onsgard Circle', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Godwin', 'Covely', '13 Dakota Hill', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Jacky', 'Annear', '258 Comanche Way', 'http://dummyimage.com/250x250.png/cc0000/ffffff', 0),
('Buiron', 'Trowl', '0 Hazelcrest Crossing', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Bill', 'Kalf', '16 Bobwhite Plaza', 'http://dummyimage.com/250x250.png/ff4444/ffffff', 0),
('Salaidh', 'Gouge', '14 Amoth Court', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1),
('Rafael', 'Mewitt', '5731 Pawling Park', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 1);

SELECT staff_firstName FROM staff WHERE staffID = 1;

#------------------------------------------------------------------------------------------------------------------------
# Create table for staff data before update and create trigger to save staff data before update
#------------------------------------------------------------------------------------------------------------------------
create table staff_outdate_data (
 staffID INT primary key not null auto_increment,
 staff_firstName varchar(20),
 staff_lastName varchar(20),
 staff_address text,
 staff_photo varchar(50),
 is_admin varchar(15),
 staff_email varChar(50),
 staff_phone varChar(15),
 changedate DATE);
 
 CREATE TRIGGER `before_staff_update`
 BEFORE UPDATE ON `staff`
 FOR EACH ROW INSERT INTO staff_outdate_data
 (staffID, staff_firstName, staff_lastName, staff_address, staff_photo, is_admin, staff_email, staff_phone, changedate)
  VALUES
	(old.staffID, old.staff_firstName, old.staff_lastName,
	old.staff_address, old.staff_photo,
	old.is_admin, (SELECT staff_email FROM staff_emails WHERE staff_emails.staffID = old.staffID LIMIT 1),
    (SELECT staff_phone FROM staff_phone WHERE staff_phone.staffID = old.staffID LIMIT 1), now());

#------------------------------------------------------------------------------------------------------------------------
# Create table for staff data before delete and create trigger to save staff data before delete
#------------------------------------------------------------------------------------------------------------------------

 create table deleted_staff_data (
 staffID INT primary key not null auto_increment,
 staff_firstName varchar(20),
 staff_lastName varchar(20),
 staff_address text,
 staff_photo varchar(50),
 is_admin varchar(15),
 staff_email varChar(50),
 staff_phone varChar(15),
 changedate DATE);

 CREATE TRIGGER `before_staff_delete`
 BEFORE DELETE ON `staff`
 FOR EACH ROW INSERT INTO staff_outdate_data
 (staffID, staff_firstName, staff_lastName, staff_address, staff_photo, is_admin, staff_email, staff_phone, changedate)
  VALUES
	(old.staffID, old.staff_firstName, old.staff_lastName,
	old.staff_address, old.staff_photo,
	old.is_admin, (SELECT staff_email FROM staff_emails WHERE staff_emails.staffID = old.staffID LIMIT 1),
    (SELECT staff_phone FROM staff_phone WHERE staff_phone.staffID = old.staffID LIMIT 1), now());
    
#------------------------------------------------------------------------------------------------------------------------
# Create table for the staff`s email and insert data
#------------------------------------------------------------------------------------------------------------------------

create table staff_emails(
emailID int primary key not null auto_increment,
staffID int,
staff_email varchar(50),
foreign key (staffID)
references staff(staffID)
);

insert into staff_emails (staffID, staff_email) values 
(1, 'rwhittenbury0@telegraph.co.uk'), (1, 'gsheriff3@time.com'), (2, 'cruck1@typepad.com'), (2, 'jraittie2@house.gov'),
(3, 'prockcliffe4@hubpages.com'),(3, 'bepinoy5@amazonaws.com'), (4, 'glindfors6@aol.com'),(4, 'ikeems8@answers.com'),
(5, 'imccoughan7@meetup.com'), (5, 'mwrey9@senate.gov'), (6, 'owhitlama@merriam-webster.com'), (6, 'tdorsayb@columbia.edu'),
(7, 'fdoddridgec@census.gov'), (7, 'rbelhomed@lycos.com'), (8, 'ebradnockee@theguardian.com'), (8, 'csarsonsf@admin.ch'),
(9, 'smetterickeg@photobucket.com'), (9, 'ssigarsh@squarespace.com'), (10, 'mauchterlonyi@princeton.edu'), (10, 'isarneyj@studiopress.com'),
(11, 'inaultyk@com.com'), (11, 'bvedenichevl@addthis.com'), (12, 'jdykesm@oaic.gov.au'), (12, 'ldrohanen@google.fr'),
(13, 'estrideo@prlog.org'), (13, 'agaulerp@archive.org'), (14, 'bkhomishinq@facebook.com'), (14, 'eandriuzzir@infoseek.co.jp'),
(15, 'rshooters@gmpg.org'), (15, 'mabazit@gov.uk'), (16, 'croylu@opera.com'), (16, 'agrosierv@ihg.com'),
(17, 'nenrightw@wired.com'), (17, 'bgrennanx@nasa.gov'), (18, 'hjuanesy@miibeian.gov.cn'), (18, 'sbeverleyz@surveymonkey.com'),
(19, 'warens10@netvibes.com'), (19, 'tpowter11@hp.com'), (20, 'aalsford12@4shared.com'), (20, 'adebell13@live.com');

#------------------------------------------------------------------------------------------------------------------------
# Create table for the staff`s phone number and insert data
#------------------------------------------------------------------------------------------------------------------------

create table staff_phone(
phoneID int primary key not null auto_increment,
staffID int,
staff_phone varchar(15),
foreign key (staffID)
references staff(staffID)
);

insert into staff_phone (staffID, staff_phone) values
(1, '(233) 1827908'), (2, '(169) 6413058'), (3, '(418) 3656287'), (4, '(310) 2385640'),
(5, '(747) 5824244'), (6, '(606) 2501375'), (7, '(536) 4207269'), (8, '(783) 9332630'),
(9, '(999) 6499249'), (10, '(455) 3967551'), (11, '(316) 8761607'), (12, '(700) 2839382'),
(13, '(339) 4557046'), (14, '(990) 7572609'), (15, '(120) 5796990'), (16, '(896) 5331910'),
(17, '(143) 2023566'), (18, '(308) 9841318'), (19, '(843) 6707399'), (20, '(987) 1837437');

#------------------------------------------------------------------------------------------------------------------------
# Create table for the staff`s academic data and insert the data
#------------------------------------------------------------------------------------------------------------------------
create table academics(
academicID int primary key not null auto_increment,
staffID int,
qualification varchar(50),
staff_title varchar(30),
foreign key (staffID)
references staff(staffID)
);

insert into academics (staffID, qualification, staff_title) values
(1, "Doctoral degree", "IT teacher"), (2, "Doctoral degree", "Business teacher"),
(3, "Master's degree", "Business teacher"), (4, "Doctoral degree", "IT teacher"),
(5, "Higher National Diploma", "Accounting teacher"), (6, "Higher National Diploma", "Accounting teacher"),
(7, "Doctoral degree", "Team Leading teacher"), (8, "Doctoral degree", "Team Leading teacher"),
(9, "Master's degree", "Media teacher"), (10, "Doctoral degree", "Media teacher"),
(11, "Master's degree", "Digital production teacher"), (12, "Doctoral degree", "Digital production teacher");

#------------------------------------------------------------------------------------------------------------------------
# Create table for the staff`s administrator data and insert the data
#------------------------------------------------------------------------------------------------------------------------

create table administrator(
adminID int primary key not null auto_increment,
staffID int,
department varchar(50),
admin_position varchar(30),
admin_rule int,
foreign key (staffID)
references staff(staffID)
);

insert into administrator(staffID, department,  admin_position, admin_rule) values
(13, "Accounting", "Accountant leader", 1), (14, "HR", "HR leader", 2),
(15, "HR", "HR administraor", 1), (16, "Finance", "Finance officer", 2),
(17, "Stundent support", "Stundent support leader", 3), (18, "Stundent support", "Stundent support officer", 2),
(19, "Acaddemmic support", "Acaddemmic support leader", 3), (20, "Acaddemmic support", "Acaddemmic support officer", 2);

#------------------------------------------------------------------------------------------------------------------------
# Create table for the administrator roles and insert the data
#------------------------------------------------------------------------------------------------------------------------

create table roles (
roleID int primary key not null auto_increment,
role_pos int,
role_desc varChar(100)
);

insert into roles (role_pos, role_desc) values
(1, "Reader. People with this role can see the data,but cannot edit it."),
(2, "Editor. People with this role can see and edit thex exists data,but cannot create new."),
(3, "Root admin. People with this role can see and edit the data and can create new data in the system.");
</pre>
</div>
<?php }else{ ?>
    <div>You are not logged in. You do not have right to see this page</div>
    <?php } ?>
</div>
    <div><?php @ require_once ("footer.php"); ?></div>
</div>
    