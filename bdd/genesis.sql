DROP TABLE Train_Status;
DROP TABLE Train_Type;
DROP TABLE Train;
DROP TABLE User_Categorie;
DROP TABLE User;
DROP TABLE Country;
DROP TABLE Region;
DROP TABLE City;
DROP TABLE Station;
DROP TABLE Platform;

CREATE TABLE Train_Status
(
    Train_Status_ID INT NOT NULL,
    Train_Status_Label VARCHAR2(255) NOT NULL,

    CONSTRAINT PK_Train_Status PRIMARY KEY (Train_Status_ID)
);

CREATE TABLE Train_Type
(
    Train_Type_ID INT NOT NULL,
    Train_Type_Label VARCHAR2(255) NOT NULL,
    Train_Capacity INT NOT NULL,
    Train_Length FLOAT NOT NULL,

    CONSTRAINT PK_Train_Type PRIMARY KEY (Train_Type_ID)
);
/*##################################################################*/
CREATE TABLE User_Categorie
(
    User_Categorie_ID INT NOT NULL,
    User_Categorie_Label VARCHAR2(255) NOT NULL,

    CONSTRAINT PK_User_Categorie PRIMARY KEY (User_Categorie_ID)
);
    
CREATE TABLE User
(
    User_ID INT NOT NULL,
    User_Mail VARCHAR2(255) NOT NULL,
    User_Password VARCHAR2(255) NOT NULL,
    User_Lastname VARCHAR2(255) NOT NULL,
    User_Firstname VARCHAR2(255) NOT NULL,
    User_Categorie_ID INT DEFAULT 0,

    CONSTRAINT PK_User PRIMARY KEY (User_ID),
    CONSTRAINT FK_User_Categorie FOREIGN KEY (User_Categorie_ID) REFERENCES User_Categorie(User_Categorie_ID),
    /*CONSTRAINT CK_User_Mail CHECK (User_Mail NOT IN (Select User_Mail FROM User))*/
);

CREATE TABLE Company
(
    Company_ID INT NOT NULL,
    Company_Name VARCHAR2(255) NOT NULL,

    CONSTRAINT PK_Company PRIMARY KEY (Company_ID) 
);

CREATE TABLE Employees
(
    User_ID INT NOT NULL,
    Company_ID INT NOT NULL,
    Employee_Access INT NOT NULL,

    CONSTRAINT PK_Employee PRIMARY KEY (User_ID),
    CONSTRAINT FK_Employee_User FOREIGN KEY (User_ID) REFERENCES User(User_ID),
    CONSTRAINT FK_Employee_Company FOREIGN KEY (Company_ID) REFERENCES Company(Company_ID) 
);

CREATE TABLE Driver
(
    Driver_ID INT NOT NULL,
    User_ID INT NOT NULL UNIQUE,

    CONSTRAINT PK_Driver PRIMARY KEY (Driver_ID),
    CONSTRAINT FK_User FOREIGN KEY (User_ID) REFERENCES Employees(User_ID)
);

CREATE TABLE Driver_Ability
(
    Driver_ID INT NOT NULL,
    Train_Type_ID INT NOT NULL,
    
    CONSTRAINT PK_Driver_Ability PRIMARY KEY (Driver_ID,Train_Type_ID),
    CONSTRAINT FK_Driver_ID FOREIGN KEY Driver_ID REFERENCES Driver(Driver_ID),
    CONSTRAINT FK_Train_Type FOREIGN KEY Train_Type_ID REFERENCES Train_Type(Train_Type_ID)
);
/*##################################################################*/
CREATE TABLE Country
(
    Country_ID INT NOT NULL,
    Country_Name VARCHAR2(255) NOT NULL,
    Country_Label VARCHAR2(2) NOT NULL,

    CONSTRAINT PK_Country PRIMARY KEY (Country_ID),
    /*CONSTRAINT CK_Country_Name CHECK (Country_Name NOT IN (Select Country_Name FROM Country)),*/
    /*CONSTRAINT CK_Country_Label CHECK (Country_Label NOT IN (Select Country_Label FROM Country))*/
);

CREATE TABLE Region
(
    Region_ID INT NOT NULL,
    Country_ID INT NOT NULL,
    Region_Name VARCHAR2(255) NOT NULL,

    CONSTRAINT PK_Region_ID PRIMARY KEY (Region_ID),
    CONSTRAINT FK_Country_ID FOREIGN KEY (Country_ID) REFERENCES Country(Country_ID),
    /*CONSTRAINT CK_Region_Name CHECK (Region_Name NOT IN (Select Region_Name FROM Region))*/
);

CREATE TABLE City
(
    City_ID INT NOT NULL,
    Region_ID INT NOT NULL,
    Postal INT,
    City_Name VARCHAR2(255) NOT NULL,


    CONSTRAINT PK_City_ID PRIMARY KEY (City_ID),
    CONSTRAINT FK_Region_ID FOREIGN KEY (Region_ID) REFERENCES Region(Region_ID),
    /*CONSTRAINT CK_City_Different CHECK (Postal NOT IN (SELECT Postal FROM City WHERE City_Name = City.City_Name))*/
);
/*##################################################################*/
CREATE TABLE Station 
(
    Station_ID INT NOT NULL,
    City_ID INT NOT NULL,
    Station_Name VARCHAR2(255) NOT NULL,

    CONSTRAINT PK_Station_ID PRIMARY KEY (Station_ID),
    CONSTRAINT FK_City_ID FOREIGN KEY (City_ID) REFERENCES City(City_ID),
    /*CONSTRAINT CK_Station_Name CHECK (Station_Name NOT IN (SELECT Station_Name FROM Station))*/
);

CREATE TABLE Platform
(
    Platform_Letter VARCHAR2(1) NOT NULL,
    Station_ID INT NOT NULL,
    Platform_Status BOOLEAN DEFAULT false,
    Platform_Utilisation DEFAULT false,
    Platform_length FLOAT NOT NULL,

    CONSTRAINT PK_Platform PRIMARY KEY (Platform_Letter,Station_ID),
    CONSTRAINT FK_Station_ID FOREIGN KEY (Station_ID) REFERENCES Station(Station_ID)
);

/*##################################################################*/
CREATE TABLE Train
(

);




