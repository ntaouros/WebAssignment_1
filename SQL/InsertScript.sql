USE `Questions` ;

Insert into Question values 
		(1,'What does BMW stand for?'),
		(2,'Which 2014 BMW model has the highest starting MSRP?'),
        (3,'Which is NOT a BMW model?'),
        (4,'The 2014 BMW 740i and 750i sedans produce how much horsepower respectively?'),
		(5,'Which BMW has the quickest 0-60 time?');



Insert into Question_choice values
	(1,4,'265 / 325',0),
    (2,4,'400 / 560',0),
    (3,4,'290 / 375',0),
    (4,4,'SOSTI',1),
    
    (1,1,'265 / 325',0),
    (2,1,'SOSTI',1),
    (3,1,'290 / 375',0),
    (4,1,'315 / 445',0),
    
    (1,2,'265 / 325',0),
    (2,2,'400 / 560',0),
    (3,2,'290 / 375',0),
    (4,2,'SOSTI',1),
    
    
    (1,3,'265 / 325',0),
    (2,3,'400 / 560',0),
    (3,3,'SOSTI',1),
    (4,3,'315 / 445',0),
    
    
    (1,5,'SOSTI',1),
    (2,5,'400 / 560',0),
    (3,5,'290 / 375',0),
    (4,5,'315 / 445',0);