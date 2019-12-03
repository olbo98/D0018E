CREATE TABLE Users(
    userID INT NOT NULL AUTO_INCREMENT,
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
    picture VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    PRIMARY KEY(productID)
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

INSERT INTO `Products`(`name`, `quantity`, `price`, `description`, `picture`, `rating`)
VALUES
    ('Inglourious Bastards',10,3000,'Movie from 2009','IB.jpg',3),
    ('Kill Bill',10,2000,'Movie from 2003','killbill.jpg',2),
    ('Pulp Fiction',10,1000,'Movie from 1993','pulpfiction.jpg',1),                                                                           
    ('Django Unchained',10,4000,'Movie from 2012','django.jpg',4),
    ('Once upon a time in hollywood',10,5000,'Movie from 2019','hollywood.jpg',5);
    
INSERT INTO `Pictures`(`picture`, `productID`, `description`,`link`) 
VALUES 
    ('IB2.jpg',1,'IB pic in product page'),
    ('IBtrailer.PNG',1, 'IBtrailer pic in product page','https://www.youtube.com/embed/-2cRY4p7KIk'),
    ('django2.jpg',4, 'Django pic in product page'),
    ('djangotrailer.PNG',4, 'Djangotrailer pic in product page','https://www.youtube.com/embed/0fUCuvNlOCg'),
    ('Hollywood2.jpg',5, 'Hollywood pic in product page'),
    ('hollywoodtrailer.PNG',5, 'Hollywoodrailer pic in product page','https://www.youtube.com/embed/Scf8nIJCvs4'),
    ('killbill2.jpg',2, 'Killbill pic in product page'),       
    ('killbilltrailer.PNG',2, 'Killbilltrailer pic in product page','https://www.youtube.com/embed/7kSuas6mRpk'),
    ('pulpfiction.jpg',3, 'Pulpfiction pic in product page'),
    ('pulpfictiontrailer.PNG',3, 'Pulpfictiontrailer pic in product page','https://www.youtube.com/embed/Scf8nIJCvs4');

CREATE TABLE Ratings( 
    userID INT NOT NULL,
    productID INT NOT NULL,
    rating INT NOT NULL, 
    FOREIGN KEY(userID) REFERENCES Users(userID), 
    FOREIGN KEY(productID) REFERENCES Products(productID) 
    
 );
                      
