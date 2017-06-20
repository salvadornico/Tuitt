-- 1
select address from Studio where name like 'MGM%';

-- 2
select starName from StarsIn where movieYear = 1980 or movieTitle like "%love%";

--3
select * from MovieExec where netWorth >= 10000000;

--4
select * from MovieStar where gender like 'm%' or address like '%Malibu%';

--5
select MovieStar.name from MovieStar join StarsIn 
	on StarsIn.starName = MovieStar.name 
	where MovieStar.gender like 'm%' and StarsIn.movieTitle = 'Titanic';

--6
select StarsIn.starName from StarsIn join Movies
	on StarsIn.movieTitle = Movies.title
	where Movies.year = 1995 and Movies.studioName like 'MGM%';

--7
select title from Movies
	where length > (select length from Movies where title = 'Gone With The Wind');

--8
select MovieExec.name from Movies join MovieExec
	on Movies.producerCertificateNumber = MovieExec.certificateNumber 
	where Movies.title like 'Star%Wars%';

--9
select MovieExec.name from StarsIn, MovieExec, MovieStar
	where StarsIn.starName = 'Harrison Ford';
	and Movies.producerCertificateNumber = MovieExec.certificateNumber
	and Movies.title = StarsIn.movieTitle;

select MovieExec.name from Movies
	join StarsIn on Movies.title = StarsIn.movieTitle
	join MovieExec on Movies.producerCertificateNumber = MovieExec.certificateNumber
	where StarsIn.starName = 'Harrison Ford';

select MovieExec.name from Movies
	join StarsIn join MovieExec 
	on Movies.title = StarsIn.movieTitle
	and Movies.producerCertificateNumber = MovieExec.certificateNumber
	where StarsIn.starName = 'Harrison Ford';