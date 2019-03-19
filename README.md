# SENG401
Repository for all the SENG assignments
https://bogdanlykhosherstov.github.io/SENG401_Website/index.html

# Assignment 4 -- REQUIREMENTS
#### ~ MVC Architecture: ~
- Correct MVC architecture 
	- Ensure you are using the methods provided from the controllers 

#### ~ Authentication: ~  
- Login 
- Registration 
	- Requires *unique* username and password 
	- Reject duplicate emails: *search database for email*
	- Review Laravel video on authentication

#### ~ Visitor: ~ 
- View books and attributes (image, name, ISBN, author)
- View comments from subscribers on each book 
- CANNOT comment on a book 

#### ~ Subscriber: ~
- View book and full attributes, and author 
- Comment on book: Before and While borrowing
- Can see comments from other users 

#### ~ Admin: ~
- View all information regarding:
	- Users, Books, Authors, Subscriptions, Comments 
- Add new records to:
	- Books and Authors table 
- Can un/subscribe users to books 
- Can edit:
	- Book and Authors table 
	- Includes deleting records in this table 
- Assign/change roles of users 
