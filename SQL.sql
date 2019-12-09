CREATE TABLE Users(
    userID INT NOT NULL,
    username VARCHAR(12) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY(userID)
);

CREATE TABLE Products(
    productID INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    quantity INT NOT NULL,
    price INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(productID),
    CONSTRAINT CHK_Price CHECK (price >= 0)
);

CREATE TABLE Comments(
    commentID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    date DATE,
    commentText VARCHAR(255) NOT NULL,
    productID INT NOT NULL,
    PRIMARY KEY(commentID),
    FOREIGN KEY(userID) REFERENCES Users(userID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);

CREATE TABLE Baskets(
    basketID INT NOT NULL AUTO_INCREMENT,
    userID INT NOT NULL,
    PRIMARY KEY(basketID),
    FOREIGN KEY(userID) REFERENCES Users(userID)
);

CREATE TABLE basketItems(
    itemID INT NOT NULL AUTO_INCREMENT,
    basketID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY(itemID),
    FOREIGN KEY(basketID) REFERENCES Baskets(basketID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);

CREATE TABLE Orders(
    orderID INT NOT NULL,
    userID INT NOT NULL,
    orderDate DATE NOT NULL,
    orderStatus VARCHAR(255) NOT NULL,
    PRIMARY KEY(orderID),
    FOREIGN KEY(userID) REFERENCES Users(userID)
);

CREATE TABLE orderItems(
    itemID INT NOT NULL AUTO_INCREMENT,
    orderID INT NOT NULL,
    productID INT NOT NULL,
    quantity INT NOT NULL,
    PRIMARY KEY(itemID),
    FOREIGN KEY(orderID) REFERENCES Orders(orderID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);
CREATE TABLE Pictures( 
    pictureID INT NOT NULL AUTO_INCREMENT, 
    picture VARCHAR(255) NOT NULL, 
    productID INT NOT NULL, 
    description VARCHAR(255) NOT NULL,
    link VARCHAR(255) NOT NULL,
    PRIMARY KEY(pictureID),
    FOREIGN KEY(productID) REFERENCES Products(productID)
);

INSERT INTO `Products`(`name`, `quantity`, `price`, `description`, `picture`)
VALUES
    ('Inglourious Bastards',10,3000,'In Nazi-occupied France during World War II, a plan to assassinate Nazi leaders by a group of <br> Jewish U.S. soldiers coincides with a theatre owner's vengeful plans for the same.','IB.jpg'),
    ('Kill Bill',10,2000,'After awakening from a four-year coma, a former <br> assassin wreaks vengeance on the team of assassins who betrayed her.','killbill.jpg'),
    ('Pulp Fiction',10,1000,'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair <br> of diner bandits intertwine in four tales of violence and redemption.','pulpfiction.jpg'),                                                                           
    ('Django Unchained',10,4000,'With the help of a German bounty hunter, a freed slave sets out to rescue <br> his wife from a brutal Mississippi plantation owner.','django.jpg'),
    ('Once upon a time in hollywood',10,5000,'A faded television actor and his stunt double strive to achieve fame and success in the film <br> industry during the final years of Hollywood's Golden Age in 1969 Los Angeles.','hollywood.jpg');
    
INSERT INTO `Pictures`(`picture`, `productID`, `description`,`link`) 
VALUES 
    ('IB2.jpg',1,'IB pic in product page',''),
    ('IBtrailer.PNG',1, 'IBtrailer pic in product page','https://www.youtube.com/embed/-2cRY4p7KIk'),
    ('django2.jfif',4, 'Django pic in product page',''),
    ('djangotrailer.PNG',4, 'Djangotrailer pic in product page','https://www.youtube.com/embed/0fUCuvNlOCg'),
    ('Hollwood2.jpg',5, 'Hollywood pic in product page',''),
    ('hollywoodtrailer.PNG',5, 'Hollywoodrailer pic in product page','https://www.youtube.com/embed/Scf8nIJCvs4'),
    ('killbill2.jpg',2, 'Killbill pic in product page',''),       
    ('killbilltrailer.PNG',2, 'Killbilltrailer pic in product page','https://www.youtube.com/embed/7kSuas6mRpk'),
    ('pulpfiction.jpg',3, 'Pulpfiction pic in product page',''),
    ('pulpfictiontrailer.PNG',3, 'Pulpfictiontrailer pic in product page','https://www.youtube.com/embed/s7EdQ4FqbhY');
    
INSERT INTO `Users`(`userID`, `username`, `password`) VALUES 
    (1,'Elsa','123'),
    (2, 'admin', 'admin'),
    (3, 'Albernn', '123'),
    (4, 'Olof', '123');

CREATE TABLE Ratings( 
    userID INT NOT NULL,
    productID INT NOT NULL,
    rating INT NOT NULL, 
    FOREIGN KEY(userID) REFERENCES Users(userID), 
    FOREIGN KEY(productID) REFERENCES Products(productID) 
    
 );
                      
