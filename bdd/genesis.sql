DROP CONSTRAINT CK_Diff_Start_End;
DROP CONSTRAINT CK_Distance;

DROP CONSTRAINT FK_User;
DROP CONSTRAINT FK_Travel;
DROP CONSTRAINT FK_Start_Station_ID;
DROP CONSTRAINT FK_End_Station_ID;
DROP CONSTRAINT FK_Train_Type;
DROP CONSTRAINT FK_Train_Status;
DROP CONSTRAINT FK_User_Categorie;
DROP CONSTRAINT FK_Employee_User;
DROP CONSTRAINT FK_Employee_Company;
DROP CONSTRAINT FK_User;
DROP CONSTRAINT FK_Driver_ID;
DROP CONSTRAINT FK_Train_Type;
DROP CONSTRAINT FK_Country_ID;
DROP CONSTRAINT FK_Region_ID;
DROP CONSTRAINT FK_City_ID;
DROP CONSTRAINT FK_Station_ID;
DROP CONSTRAINT FK_Start_Station_ID;
DROP CONSTRAINT FK_End_Station_ID;
DROP CONSTRAINT FK_Line_ID;
DROP CONSTRAINT FK_Station_ID;
DROP CONSTRAINT FK_Start_Station_ID;
DROP CONSTRAINT FK_End_Station_ID;
DROP CONSTRAINT FK_Line;
DROP CONSTRAINT FK_Train_ID;
DROP CONSTRAINT FK_Driver;

DROP CONSTRAINT PK_Train_Status;
DROP CONSTRAINT PK_Train_Type;
DROP CONSTRAINT PK_Train;
DROP CONSTRAINT PK_User_Categorie;
DROP CONSTRAINT PK_User;
DROP CONSTRAINT PK_Company;
DROP CONSTRAINT PK_Employee;
DROP CONSTRAINT PK_Driver;
DROP CONSTRAINT PK_Driver_Ability;
DROP CONSTRAINT PK_Country;
DROP CONSTRAINT PK_Region_ID;
DROP CONSTRAINT PK_City_ID;
DROP CONSTRAINT PK_Station_ID;
DROP CONSTRAINT PK_Platform;
DROP CONSTRAINT PK_Line;
DROP CONSTRAINT PK_Line_Stop;
DROP CONSTRAINT PK_Distance;
DROP CONSTRAINT PK_Travel;
DROP CONSTRAINT PK_Ticket;

DROP TABLE Train_Status;
DROP TABLE Train_Type;
DROP TABLE Train;
DROP TABLE User_Categorie;
DROP TABLE User;
DROP TABLE Company;
DROP TABLE Employees;
DROP TABLE Driver;
DROP TABLE Driver_Ability;
DROP TABLE Country;
DROP TABLE Region;
DROP TABLE City;
DROP TABLE Station;
DROP TABLE Platform;
DROP TABLE Line;
DROP TABLE Line_Stop;
DROP TABLE Distance;
DROP TABLE Travel;
DROP TABLE Ticket;


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
    Train_Speed INT NOT NULL,
    Train_Length FLOAT NOT NULL,

    CONSTRAINT PK_Train_Type PRIMARY KEY (Train_Type_ID)
);

CREATE TABLE Train
(
    Train_ID INT NOT NULL,
    Train_Type_ID INT NOT NULL,
    Train_Status_ID INT DEFAULT 0,
    
    CONSTRAINT PK_Train PRIMARY KEY (Train_ID),
    CONSTRAINT FK_Train_Type FOREIGN KEY (Train_Type_ID) REFERENCES Train_Type(Train_Type_ID),
    CONSTRAINT FK_Train_Status FOREIGN KEY (Train_Status_ID) REFERENCES Train_Status(Train_Status_ID)
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
    User_Phone VARCHAR2(10),
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
    Platform_Utilisation BOOLEAN DEFAULT false,
    Platform_length FLOAT NOT NULL,

    CONSTRAINT PK_Platform PRIMARY KEY (Platform_Letter,Station_ID),
    CONSTRAINT FK_Station_ID FOREIGN KEY (Station_ID) REFERENCES Station(Station_ID)
);

/*##################################################################*/
CREATE TABLE Line
(
    Line_ID INT NOT NULL,
    Start_Station_ID INT NOT NULL,
    End_Station_ID INT NOT NULL,

    CONSTRAINT PK_Line PRIMARY KEY (Line_ID),
    CONSTRAINT FK_Start_Station_ID FOREIGN KEY (Start_Station_ID) REFERENCES Station(Station_ID),
    CONSTRAINT FK_End_Station_ID FOREIGN KEY (End_Station_ID) REFERENCES Station(Station_ID),
    CONSTRAINT CK_Diff_Start_End CHECK (Start_Station_ID != End_Station_ID)
)

CREATE TABLE Line_Stop
(
    Line_ID INT NOT NULL,
    Station_ID INT NOT NULL,
    Order_Stop INT NOT NULL,
    Duration_Time TIME NOT NULL,

    CONSTRAINT PK_Line_Stop PRIMARY KEY (Line_ID,Station_ID),
    CONSTRAINT FK_Line_ID FOREIGN KEY (Line_ID) REFERENCES Line(Line_ID),
    CONSTRAINT FK_Station_ID FOREIGN KEY (Station_ID) REFERENCES Station(Station_ID),
)

CREATE TABLE Distance
(
    Start_Station_ID INT NOT NULL,
    End_Station_ID INT NOT NULL,
    Distance INT NOT NULL,

    CONSTRAINT PK_Distance PRIMARY KEY (Start_Station_ID,End_Station_ID),
    CONSTRAINT FK_Start_Station_ID FOREIGN KEY (Start_Station_ID) REFERENCES Station(Station_ID),
    CONSTRAINT FK_End_Station_ID FOREIGN KEY (End_Station_ID) REFERENCES Station(Station_ID),
    CONSTRAINT CK_Distance CHECK (Distance > 0)
)
/*##################################################################*/
CREATE TABLE Travel
(
    Travel_ID INT NOT NULL,
    Travel_DateTime DATETIME NOT NULL,
    Line_ID INT NOT NULL,
    Train_ID INT NOT NULL,
    Driver_ID INT NOT NULL,
    End_Datetime DATETIME NOT NULL,
    Start_Time DATETIME NOT NULL,
    Late_Time DATETIME NOT NULL,

    CONSTRAINT PK_Travel PRIMARY KEY (Travel_ID),
    CONSTRAINT FK_Line FOREIGN KEY (Line_ID) REFERENCES Line(Line_ID),
    CONSTRAINT FK_Train_ID FOREIGN KEY (Train_ID) REFERENCES Train(Train_ID),
    CONSTRAINT FK_Driver FOREIGN KEY (Driver_ID) REFERENCES Driver(Driver_ID)
)

CREATE TABLE Ticket
(
    User_ID INT NOT NULL,
    Travel_ID INT NOT NULL,
    Start_Station_ID INT NOT NULL,
    End_Station_ID INT NOT NULL,

    CONSTRAINT PK_Ticket PRIMARY KEY (User_ID,Travel_ID),
    CONSTRAINT FK_User FOREIGN KEY (User_ID) REFERENCES Employees(User_ID),
    CONSTRAINT FK_Travel FOREIGN KEY (Travel_ID) REFERENCES Travel(Travel_ID),
    CONSTRAINT FK_Start_Station_ID FOREIGN KEY (Start_Station_ID) REFERENCES Station(Station_ID),
    CONSTRAINT FK_End_Station_ID FOREIGN KEY (End_Station_ID) REFERENCES Station(Station_ID)

)

/*
CONSTRAINT PK_ PRIMARY KEY (),
CONSTRAINT FK_ FOREIGN KEY () REFERENCES (),
*/
