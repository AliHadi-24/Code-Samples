CREATE TABLE manufacturer(
manufacturerCode int UNIQUE NOT NULL AUTO_INCREMENT,
companyName varchar(255),
address varchar(255),
street varchar(255),
city varchar(255),
state varchar(255),
postCode NUMERIC(4),
phoneNumber NUMERIC(10),
accountNumber NUMERIC(65),
PRIMARY KEY (manufacturerCode)
)Engine=InnoDB;


CREATE TABLE type(
typeID int UNIQUE NOT NULL AUTO_INCREMENT,
manufacturerCode int,
INDEX (manufacturerCode),
warehouseID int,
INDEX (warehouseID),
typeName varchar(255),
purpose varchar(255),
PRIMARY KEY (typeID)
)Engine=InnoDB;


CREATE TABLE boat(
modelNumber int UNIQUE NOT NULL AUTO_INCREMENT,
typeID int,
engine varchar(255),
length NUMERIC,
beam varchar(255),
suggestedRetailPrice DECIMAL,
pacificBoatingPrice DECIMAL,
dryWeight NUMERIC,
PRIMARY KEY (modelNumber)
)Engine=InnoDB;


CREATE TABLE warehouse(
warehouseID int UNIQUE NOT NULL AUTO_INCREMENT,
typeID int,
warehouseName varchar(255),
address varchar(255),
street varchar(255),
city varchar(255),
state varchar(255),
postcode NUMERIC(4),
phoneNumber NUMERIC(10),
PRIMARY KEY (warehouseID)
)Engine=InnoDB;

ALTER TABLE type
ADD FOREIGN KEY (manufacturerCode) REFERENCES manufacturer(manufacturerCode) ON UPDATE CASCADE ON DELETE CASCADE,
ADD FOREIGN KEY (warehouseID) REFERENCES warehouse(warehouseID);

ALTER TABLE boat
ADD FOREIGN KEY (typeID) REFERENCES type(typeID);

ALTER TABLE warehouse
ADD FOREIGN KEY (typeID) REFERENCES type(typeID);



INSERT INTO manufacturer (manufacturerCode, companyName, address, street, city, state, postCode, phoneNumber, accountNumber) 
VALUES (NULL, 'StarBoting', '215', 'LightST', 'Sydney', 'NSW', 2345, 0234567891, 668473);
INSERT INTO manufacturer (manufacturerCode, companyName, address, street, city, state, postCode, phoneNumber, accountNumber) 
VALUES (NULL, 'AtlasBoting', '21', 'Chetwind', 'Melbourne', 'Vic', 2345, 0334549191, 149832);
INSERT INTO manufacturer (manufacturerCode, companyName, address, street, city, state, postCode, phoneNumber, accountNumber) 
VALUES (NULL, 'SantaBoting', '89', 'Adam', 'Perth', 'WA', 2345, 0894963174, 327499);



INSERT INTO type (typeID, manufacturerCode, warehouseID, typeName, purpose) 
VALUES (NULL,
(select manufacturerCode from manufacturer where companyName = 'StarBoting'),
(select warehouseID from warehouse where warehouseName ='Liverpool'),
'Paddle','Day Boating');
INSERT INTO type (typeID, manufacturerCode, warehouseID, typeName, purpose) 
VALUES (NULL,
(select manufacturerCode from manufacturer where companyName = 'AtlasBoting'),
(select warehouseID from warehouse where warehouseName ='Bankstown'),
'Inflatable','fishing');
INSERT INTO type (typeID, manufacturerCode, warehouseID, typeName, purpose) 
VALUES (NULL,
(select manufacturerCode from manufacturer where companyName = 'SantaBoting'),
(select warehouseID from warehouse where warehouseName ='Concord'),
'Jet Ski','Travel');





INSERT INTO boat (modelNumber, typeID, engine, length, beam, suggestedRetailPrice, pacificBoatingPrice, dryWeight) 
VALUES (NULL, (select typeID from type where typeName = 'Paddle'), 'Paddle', 4, 'Plastic', 1000, 1000, 60);
INSERT INTO boat (modelNumber, typeID, engine, length, beam, suggestedRetailPrice, pacificBoatingPrice, dryWeight) 
VALUES (NULL, (select typeID from type where typeName = 'Inflatable'), 'Outboard', 6, 'Plastic', 4200, 4000, 50);
INSERT INTO boat (modelNumber, typeID, engine, length, beam, suggestedRetailPrice, pacificBoatingPrice, dryWeight) 
VALUES (NULL, (select typeID from type where typeName = 'Jet Ski'), 'Inboard', 2, 'Plastic', 2500, 2400, 40);



INSERT INTO warehouse (warehouseID, typeID, warehouseName, address, street, city, state, postcode, phoneNumber)
VALUES (NULL, (select typeID from type where typeName = 'Paddle'), 'Liverpool', '124', 'will', 'Sydney', 'NSW', 2170, 0236985214);
INSERT INTO warehouse (warehouseID, typeID, warehouseName, address, street, city, state, postcode, phoneNumber)
VALUES (NULL, (select typeID from type where typeName = 'Inflatable'), 'Bankstown', 74, 'Nara', 'Sydney', 'NSW', 2200, 0284569217);
INSERT INTO warehouse (warehouseID, typeID, warehouseName, address, street, city, state, postcode, phoneNumber)
VALUES (NULL, (select typeID from type where typeName = 'Jet Ski'), 'Concord', 11, 'Lise', 'Sydney', 'NSW', 2137, 0278126549);



UPDATE type
SET warehouseID = (select warehouseID from warehouse where warehouseName = 'Liverpool')
WHERE typeName = 'Paddle';
UPDATE type
SET warehouseID = (select warehouseID from warehouse where warehouseName = 'Bankstown')
WHERE typeName = 'Inflatable';
UPDATE type
SET warehouseID = (select warehouseID from warehouse where warehouseName = 'Concord')
WHERE typeName = 'Jet Ski';



