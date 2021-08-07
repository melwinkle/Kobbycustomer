use id17357614_bethelproperties;

create table Users (
`user_id` int(11) NOT NULL auto_increment,
`Firstname` varchar(20) NOT NULL,
`lastname` varchar(20) NOT NULL,
`Email` varchar(100) NOT NULL UNIQUE,
`Pass` varchar(100) NOT NULL,
`User_photo` varchar(255) DEFAULT 'no_image.png',
`verified` tinyint(1) NOT NULL DEFAULT '0',
`token` varchar(255) DEFAULT NULL,
`user_level` int(11) NOT NULL DEFAULT 0,
`stats` varchar (2) NOT NULL DEFAULT 1,
`Username` varchar(20) NOT NULL unique,
`permission` varchar(10) NOT NULL DEFAULT 2,
primary key (`user_id`) 
);


create table task(
`task_id` int (11) NOT NULL auto_increment,
`task` text NOT NULL,
`date_added` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
primary key (`task_id`)
);

create table contracts(
`contract_id` int (11) NOT NULL auto_increment,
`property_id` int (11) NOT NULL,
`tenant_id` int (11) NOT NULL UNIQUE,
`startdate` date NOT NULL,
`end_date` date NOT NULL,
`amount_paid` int(11) NOT NULL,
`amount_paid_in_words` varchar(100) NOT NULL,
`Total_amount` int(11) NOT NULL,
`Total_amount_in_words` varchar(100) NOT NULL,
`Sewage_amount` int(11) NOT NULL,
`Sewage_amount_words` varchar(100) NOT NULL,
`number_of_shops` int(10) NOT NULL,
primary key(`contract_id`)
);

create table tenant(
`tenant_id` int(11) NOT NULL auto_increment,
`FirstName` varchar(100) NOT NULL,
`LastName` varchar (100) NOT NULL,
`type_of_business` varchar(25) NOT NULL,
`contact_number` varchar(11) NOT NULL,
`Name_of_the_shop` varchar(100) NOT NULL,
`property_id` int(11) NOT NULL,
`status` varchar(10) NOT NULL,
`address` varchar(100) NOT NULL,
primary key(`tenant_id`)
);



create table notice(
`notice_id` int(11) NOT NULL auto_increment,
`date` date NOT NULL,
`To` varchar(100) NOT NULL,
`subject` varchar(100) NOT NULL,
`message_body` text NOT NULL,
primary key (`notice_id`)
);

create table invoice(
`invoice_id` int(11) auto_increment NOT NULL,
`Bill_to` varchar (100) NOT NULL,
`address` varchar (100) NOT NULL,
`date` date NOT NULL,
`Property_id` int(11) NOT NULL,
`description` varchar (100) NOT NULL,
`duration` varchar(255) NOT NULL,
`Monthly_charge` decimal(5,2) NOT NULL,
`Total_amount` decimal(5,2) NOT NULL,
`subject`varchar(10) NOT NULL,
`invoice_number` varchar(12) NOT NULL,
primary key (`invoice_id`)
);

create table feedback(
`feedback_id` int (11) auto_increment NOT NULL,
`tenant_id` int(11) NOT NULL,
`property_id` int(11) NOT NULL,
`date_added` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
`Feedback` text NOT NULL,
primary key(`feedback_id`)
); 

create table property(
`property_id` int(11) NOT NULL auto_increment,
`property_name` varchar(20) NOT NULL,
`property_location` varchar(100) NOT NULL,
primary key(`property_id`)
);

INSERT INTO property(
    `property_name`, `property_location`
) VALUES ("Bethel House", "East legon Boundary Rd"),("Zeda House","East Legon Boundary Rd"),("Olivera House", "East Legon Boundary Rd");

Create table `password_reset`(
    `email` varchar(250) NOT NULL,
    `key` varchar(250) NOT NULL,
  `expDate`datetime NOT NULL,
    primary key(`email`)
)ENGINE=InnoDB DEFAULT CHARSET=latin1;
