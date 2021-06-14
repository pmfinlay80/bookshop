-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               8.0.12 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for bookshop
CREATE DATABASE IF NOT EXISTS `bookshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `bookshop`;

-- Dumping structure for table bookshop.book
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT 'images\\\\imagecomingsoon.jpg',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `isbn` varchar(14) NOT NULL DEFAULT '0',
  `reldate` year(4) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `info` varchar(500) NOT NULL DEFAULT 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec dui. Donec nec neque ut quam sodales feugiat. Nam sodales, pede vel dapibus lobortis, ipsum diam molestie risus, a vulputate risus nisl pulvinar lacus.',
  `noinstock` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='list of books in stock';

-- Dumping data for table bookshop.book: ~57 rows (approximately)
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT IGNORE INTO `book` (`id`, `author`, `title`, `image`, `price`, `isbn`, `reldate`, `genre`, `info`, `noinstock`) VALUES
	(1, 'George Orwell', '1984', 'images\\1984cover.jpg', 4.49, '978-0141187761', '1949', 'Fiction', 'George Orwell\'s dystopian masterpiece, Nineteen Eighty-Four is perhaps the most pervasively influential book of the twentieth century.', 2),
	(2, 'Paulo Coelho', 'The Alchemist', 'images\\alchemistcover.jpg', 6.75, '978-0722532935', '1988', 'Fiction', 'Every few decades a book is published that changes the lives of its readers forever. This is such a book – a beautiful parable about learning to listen to your heart, read the omens strewn along life’s path and, above all, follow your dreams.', 6),
	(3, 'Dan Brown', 'Angels & Demons', 'images\\angelsdemonscover.jpg', 6.68, '978-0552160896', '2000', 'Fiction', 'In a breathtaking race against time, Harvard professor Robert Langdon must decipher a labyrinthine trail of ancient symbols if he is to defeat those responsible - the Illuminati, a secret brotherhood presumed extinct for nearly four hundred years, reborn to continue their deadly vendetta against their most hated enemy, the Catholic Church.', 2),
	(4, 'Anne Frank', 'The Diary of Anne Frank', 'images\\annefrankcover.jpg', 3.99, '978-0141315188', '1947', 'Biography', 'In July 1942, thirteen-year-old Anne Frank and her family, fleeing the occupation, went into hiding in an Amsterdam warehouse. Over the next two years Anne vividly describes in her diary the frustrations of living in such close quarters, and her thoughts, feelings and longings as she grows up. Her diary ends abruptly when, in August 1944, they were all betrayed.', 5),
	(5, 'Anna Sewell', 'Black Beauty', 'images\\blackbeautycover.jpg', 2.50, '978-1840227611', '1901', 'Classic', 'Black Beauty is a perennial children’s favourite, one which has never been out of print since its publication in 1877. It is a moralistic tale of the life of the horse related in the form of an autobiography, describing the world through the eyes of the creature.', 2),
	(6, 'Karin Slaughter', 'Broken', 'images\\brokencover.jpg', 7.99, '978-0099509769', '2010', 'Crime', 'When the body of a young woman is discovered deep beneath the icy waters of Lake Grant, a note left under a rock by the shore points to suicide. But within minutes, it becomes clear that this is no suicide. It\'s a brutal, cold-blooded murder. ', 5),
	(7, 'Stephen King', 'Carrie', 'images\\carriecover.jpg', 6.17, '978-1444720693', '1974', 'Horror', 'Stephen King\'s legendary debut, about a teenage outcast and the revenge she enacts on her classmates, is a Classic. CARRIE is the novel which set him on the road to the Number One bestselling author King is today.', 3),
	(8, 'J D Salinger', 'The Catcher in the Rye', 'images\\cathcherintheryecover.jpg', 4.99, '978-0241950432', '1951', 'Fiction', 'Witty, wise and bittersweet, The Catcher in the Rye is the ultimate American coming-of-age novel - a timeless classic ', 3),
	(9, 'J K Rowling', 'Harry Potter and the Chamber of Secrets', 'images\\chamberofsecretscover.jpg', 4.00, '978-1408855669', '1998', 'Childrens', 'Harry Potter\'s summer has included the worst birthday ever, doomy warnings from a house-elf called Dobby, and rescue from the Dursleys by his friend Ron Weasley in a magical flying car! Back at Hogwarts School of Witchcraft and Wizardry for his second year, Harry hears strange whispers echo through empty corridors - and then the attacks start.', 6),
	(10, 'Roald Dahl', 'Charlie and the Chocolate Factory', 'images\\chocolatefactorycover.jpg', 3.99, '978-0141365374', '1964', 'Childrens', '\'The ultimate children\'s story ever\' - David Walliams. You MUST have heard of Mr Willy Wonka! He\'s the most extraordinary chocolate maker in the world. ', 0),
	(11, 'Anthony Burgess', 'A Clockwork Orange', 'images\\clockworkorangecover.jpg', 5.47, '978-3150198971', '1962', 'Fiction', 'A dystopian horror, a black comedy, an exploration of choice, A Clockwork Orange is also a work of exuberant invention which created a new language for its characters. ', 6),
	(12, 'Dan Brown', 'The Da Vinci Code', 'images\\davincicodecover.jpg', 6.60, '978-0552159715', '2003', 'Fiction', 'Harvard professor Robert Langdon receives an urgent late-night phone call while on business in Paris: the elderly curator of the Louvre has been brutally murdered inside the museum. Alongside the body, police have found a series of baffling codes. ', 5),
	(13, 'J K Rowling', 'Harry Potter and the Deathly Hallows', 'images\\deathlyhallowscover.jpg', 4.00, '978-1408855713', '2007', 'Childrens', 'As he climbs into the sidecar of Hagrid\'s motorbike and takes to the skies, leaving Privet Drive for the last time, Harry Potter knows that Lord Voldemort and the Death Eaters are not far behind. The protective charm that has kept Harry safe until now is now broken, but he cannot keep hiding. The final battle must begin - Harry must stand and face his enemy.', 9),
	(14, 'Dan Brown', 'Digital Fortress', 'images\\digitalfortresscover.jpg', 7.99, '978-0552159739', '1998', 'Fiction', 'When the National Security Agency\'s invincible code-breaking machine encounters a mysterious code it cannot break, the agency calls in its head cryptographer, Susan Fletcher, a brilliant, beautiful mathematician. What she uncovers sends shock waves through the corridors of power. ', 8),
	(15, 'Miguel De Cervantes', 'Don Quixote', 'images\\donquixotecover.jpg', 9.01, '978-0099469698', '1901', 'Classic', 'Don Quixote has become so entranced by reading romances of chivalry that he determines to become a knight errant and pursue bold adventures, accompanied by his squire, the cunning Sancho Panza.', 1),
	(16, 'Stieg Larsson', 'The Girl with the Dragon Tattoo', 'images\\dragontattoocover.jpg', 4.49, '978-0857054036', '2008', 'Thriller', 'Forty years ago, Harriet Vanger disappeared from a family gathering on the island owned and inhabited by the powerful Vanger clan. Her body was never found, yet her uncle is convinced it was murder - and that the killer is a member of his own tightly knit but dysfunctional family.', 0),
	(17, 'Jane Austen', 'Emma', 'images\\emmacover.jpg', 2.00, '978-1853260285', '1901', 'Classic', 'Jane Austen teased readers with the idea of a \'heroine whom no one but myself will much like\', but Emma is irresistible. \'Handsome, clever, and rich\', Emma is also an \'imaginist\', \'on fire with speculation and foresight\'.', 3),
	(18, 'Karin Slaughter', 'Fallen', 'images\\fallencover.jpg', 7.65, '978-0804180306', '2011', 'Crime', 'There\'s no police training stronger than a cop\'s instinct. Faith Mitchell\'s mother isn\'t answering her phone. Her front door is open. There\'s a bloodstain above the knob. Her infant daughter is hidden in a shed behind the house. All that the Georgia Bureau of Investigations taught Faith Mitchell goes out the window when she charges into her mother\'s house, gun drawn.', 6),
	(19, 'Roald Dahl', 'Fantastic Mr Fox', 'images\\fantasticmrfoxcover.jpg', 4.54, '978-0141365442', '1970', 'Childrens', 'Boggis is an enormously fat chicken farmer who only eats boiled chickens smothered in fat. Bunce is a duck-and-goose farmer whose dinner gives him a beastly temper. Bean is a turkey-and-apple farmer who only drinks gallons of strong cider. Mr Fox is so clever that every evening he creeps down into the valley and helps himself to food from their farms - and those GHASTLY farmers can\'t catch him! ', 0),
	(20, 'E L James', 'Fifty Shades of Grey', 'images\\fiftyshadescover.jpg', 5.75, '978-0099579939', '2011', 'Romance', 'Romantic, liberating and totally addictive, Fifty Shades of Grey is a novel that will obsess you, possess you, and stay with you for ever.', 4),
	(21, 'Karin Slaughter', 'Fractured', 'images\\fracturedcover.jpg', 7.74, '978-0099538592', '2008', 'Crime', 'When Atlanta housewife Abigail Campano comes home unexpectedly one afternoon, she walks into a nightmare. A broken window, a bloody footprint on the stairs and, most devastating of all, the horrifying sight of her teenage daughter lying dead on the landing, a man standing over her with a bloody knife. The struggle which follows changes Abigail\'s life forever.', 6),
	(22, 'David Walliams', 'Gangsta Granny', 'images\\gangstagrannycover.jpg', 4.00, '978-0007371464', '2011', 'Childrens', 'Another hilarious and moving novel from David Walliams, number one bestseller and fastest growing children’s author in the country.', 7),
	(23, 'J K Rowling', 'Harry Potter and the Goblet of Fire', 'images\\gobletoffirecover.jpg', 6.47, '978-1408855683', '2000', 'Childrens', 'The Triwizard Tournament is to be held at Hogwarts. Only wizards who are over seventeen are allowed to enter - but that doesn\'t stop Harry dreaming that he will win the competition. Then at Hallowe\'en, when the Goblet of Fire makes its selection, Harry is amazed to find his name is one of those that the magical cup picks out.', 3),
	(24, 'Harper Lee', 'Go Set a Watchman', 'images\\gosetawatchmancover.jpg', 6.97, '978-1784752460', '2015', 'Fiction', 'Maycomb, Alabama. Twenty-six-year-old Jean Louise Finch – ‘Scout’ – returns home from New York City to visit her ageing father, Atticus. Set against the backdrop of the civil rights tensions and political turmoil that were transforming the South, Jean Louise’s homecoming turns bittersweet when she learns disturbing truths about her close-knit family, the town and the people dearest to her. ', 5),
	(25, 'John Steinbeck', 'The Grapes of Wrath', 'images\\grapesofwrathcover.jpg', 6.47, '978-0241980347', '1939', 'Fiction', 'Drought and economic depression are driving thousands from Oklahoma. As their land becomes just another strip in the dust bowl, the Joads, a family of sharecroppers, decide they have no choice but to follow. They head west, towards California, where they hope to find work and a future for their family.', 1),
	(26, 'Stephen King', 'The Green Mile', 'images\\greenmilecover.jpg', 9.18, '978-0575084346', '1996', 'Fiction', 'The Green Mile: those who walk it do not return, because at the end of that walk is the room in which sits Cold Mountain penitentiary\'s electric chair. In 1932 the newest resident on death row is John Coffey, a giant black man convicted of the brutal murder of two little girls. But nothing is as it seems with John .', 0),
	(27, 'J K Rowling', 'Harry Potter and the Half Blood Prince', 'images\\halfbloodprincecover.jpg', 4.00, '978-1408855706', '2005', 'Childrens', 'When Dumbledore arrives at Privet Drive one summer night to collect Harry Potter, his wand hand is blackened and shrivelled, but he does not reveal why. Secrets and suspicion are spreading through the wizarding world, and Hogwarts itself is not safe. Harry is convinced that Malfoy bears the Dark Mark: there is a Death Eater amongst them. Harry will need powerful magic and true friends as he explores Voldemort\'s darkest secrets, and Dumbledore prepares him to face his destiny.', 2),
	(28, 'J R R Tolkien', 'The Hobbit', 'images\\hobbitcover.jpg', 5.73, '978-0007458424', '1937', 'Fantasy', 'The Hobbit is the unforgettable story of Bilbo, a peace-loving hobbit, who embarks on a strange and magical adventure.', 3),
	(29, 'Stieg Larsson', 'The Girl who Kicked the Hornets Nest', 'images\\hornetsnestcover.jpg', 4.45, '978-0857054050', '2009', 'Thriller', 'Salander is plotting her revenge - against the man who tried to kill her, and against the government institutions that very nearly destroyed her life. But it is not going to be a straightforward campaign. After taking a bullet to the head, Salander is under close supervision in Intensive Care, and is set to face trial for three murders and one attempted murder on her eventual release. ', 2),
	(30, 'Dan Brown', 'Inferno', 'images\\infernocover.jpg', 6.60, '978-0552169585', '2013', 'Fiction', 'Florence: Harvard symbologist Robert Langdon awakes in a hospital bed with no recollection of where he is or how he got there. Nor can he explain the origin of the macabre object that is found hidden in his belongings.', 4),
	(31, 'Stephen King', 'IT', 'images\\itcover.jpg', 7.91, '978-1473666948', '1986', 'Horror', 'Derry, Maine is just an ordinary town: familiar, well-ordered for the most part, a good place to live. It is a group of children who see - and feel - what makes Derry so horribly different. In the storm drains, in the sewers, IT lurks, taking on the shape of every nightmare, each one\'s deepest dread. ', 6),
	(32, 'Harper Lee', 'To Kill a Mockingbird', 'images\\killmockingbirdcover.jpg', 5.45, '978-0099549482', '1960', 'Fiction', 'A lawyer\'s advice to his children as he defends the real mockingbird of Harper Lee\'s classic novel - a black man charged with the rape of a white girl. Through the young eyes of Scout and Jem Finch, Harper Lee explores with exuberant humour the irrationality of adult attitudes to race and class in the Deep South of the 1930s.', 6),
	(33, 'William Golding', 'Lord of the Flies', 'images\\lordoffliescover.jpg', 5.99, '978-0571191475', '1954', 'Fiction', 'A plane crashes on an uninhabited island and the only survivors, a group of schoolboys, assemble on the beach and wait to be rescued. By day they inhabit a land of bright fantastic birds and dark blue seas, but at night their dreams are haunted by the image of a terrifying beast.', 0),
	(34, 'J R R Tolkien', 'The Lord of the Rings: The Fellowship of the Ring', 'images\\lordofringscover.jpg', 13.86, '978-0261103252', '1954', 'Fantasy', 'Continuing the story begun in The Hobbit, this is the first part of Tolkien’s epic masterpiece, The Lord of the Rings, featuring a striking black cover based on Tolkien’s own design, the definitive text, and a detailed map of Middle-earth.', 5),
	(35, 'Dan Brown', 'The Lost Symbol', 'images\\lostsymbolcover.jpg', 6.93, '978-0552149525', '2009', 'Fiction', 'The Capitol Building, Washington DC: Harvard symbologist Robert Langdon believes he is here to give a lecture. He is wrong. Within minutes of his arrival, a shocking object is discovered. It is a gruesome invitation into an ancient world of hidden wisdom.', 5),
	(36, 'Roald Dahl', 'Matilda', 'images\\matildacover.jpg', 4.54, '978-0141365466', '1988', 'Childrens', 'Matilda is the world\'s most famous bookworm, no thanks to her ghastly parents. Despite some beastly grownups trying to push her down, Matilda is an extraordinary girl with a magical mind. ', 4),
	(37, 'John Steinbeck', 'Of Mice and Men', 'images\\micemencover.jpg', 5.96, '978-0141023571', '1937', 'Fiction', 'Drifters in search of work, George and his childlike friend Lennie, have nothing in the world except the clothes on their back - and a dream that one day they will have some land of their own.', 3),
	(38, 'Stephen King', 'Misery', 'images\\miserycover.jpg', 7.93, '978-1473662070', '1987', 'Fiction', 'King\'s Classic bestseller about a famous novelist held hostage by his Number One Fan.', 3),
	(39, 'David Walliams', 'Mr Stink', 'images\\mrstinkcover.jpg', 4.48, '978-0007279067', '2009', 'Childrens', 'The second original, touching, twisted, and most of all hilarious novel for children from David Walliams and beautifully illustrated by Quentin Blake.', 11),
	(40, 'Jodi Picoult', 'My Sisters Keeper', 'images\\mysisterskeepercover.jpg', 7.46, '978-1444754346', '2004', 'Fiction', 'In all thirteen years of Anna\'s life, her parents have never given her a choice: she was born to be her sister Kate\'s bone marrow donor and she has always given Kate everything she needs. But when Anna is told Kate needs a new kidney, she begins to question how much she should be prepared to do to save the older sibling she has always been defined by. So Anna makes a decision that will change their family forever - perhaps even fatally for the sister she loves.', 1),
	(41, 'Dan Brown', 'Origin', 'images\\origincover.jpg', 3.99, '978-0552174169', '2017', 'Fiction', 'The global bestseller - Origin is the latest Robert Langdon novel from the author of The Da Vinci Code.', 5),
	(42, 'E M Forster', 'A Passage to India', 'images\\passagetoindiacover.jpg', 7.19, '978-0141441160', '1924', 'Classic', 'Exploring issues of colonialism, faith and the limits of comprehension.', 1),
	(43, 'Stephen King', 'Pet Sematary', 'images\\petsematarycover.jpg', 7.13, '978-1444708134', '1983', 'Horror', '\'The most frightening novel Stephen King has ever written\' - Publisher\'s Weekly. A sad place maybe, but safe. Surely a safe place. Not a place to seep into your dreams, to wake you, sweating with fear and foreboding.', 5),
	(44, 'J K Rowling', 'Harry Potter and the Philosophers Stone', 'images\\philosophersstonecover.jpg', 4.00, '978-1408855652', '1997', 'Childrens', 'Harry Potter has never even heard of Hogwarts when the letters start dropping on the doormat at number four, Privet Drive. Addressed in green ink on yellowish parchment with a purple seal, they are swiftly confiscated by his grisly aunt and uncle. Then, on Harry\'s eleventh birthday, a great beetle-eyed giant of a man called Rubeus Hagrid bursts in with some astonishing news: Harry Potter is a wizard', 3),
	(45, 'Stieg Larsson', 'The Girl Who Played with Fire', 'images\\playedwithfirecover.jpg', 8.31, '978-0857054043', '2006', 'Thriller', 'Lisbeth Salander is a wanted woman. Two Millennium journalists about to expose the truth about sex trafficking in Sweden are murdered, and Salander\'s prints are on the weapon. Her history of unpredictable and vengeful behaviour makes her an official danger to society - but no-one can find her. ', 2),
	(46, 'J K Rowling', 'Harry Potter and the Prisoner of Azkaban', 'images\\prisonerofazkabancover.jpg', 4.00, '978-1408855676', '1999', 'Childrens', 'When the Knight Bus crashes through the darkness and screeches to a halt in front of him, it\'s the start of another far from ordinary year at Hogwarts for Harry Potter. Sirius Black, escaped mass-murderer and follower of Lord Voldemort, is on the run - and they say he is coming after Harry.', 15),
	(47, 'David Walliams', 'Ratburger', 'images\\\rratburgercover.jpg', 5.24, '978-0007453542', '2012', 'Childrens', '\'The second original, touching, twisted, and most of all hilarious novel for children from David Walliams and beautifully illustrated by Quentin Blake.', 6),
	(48, 'Charles Dickens', 'A Tale of Two Cities', 'images\\taleoftwocitiescover.jpg', 2.00, '978-1853260391', '1901', 'Classic', 'A Tale of Two Cities (1859), Dickens’ greatest historical novel, traces the private lives of a group of people caught up in the cataclysm of the French Revolution and the Terror. Dickens based his historical detail on Carlyle’s great work – The French Revolution.', 3),
	(49, 'Markus Zusak', 'The Book Thief', 'images\\thebookthiefcover.jpg', 4.99, '978-0552773898', '2005', 'Fiction', '1939. Nazi Germany. The country is holding its breath. Death has never been busier.', 4),
	(50, 'James Joyce', 'Ulysses', 'images\\ulyssescover.jpg', 2.25, '978-1840226355', '1922', 'Classic', 'James Joyce\'s astonishing masterpiece, Ulysses, tells of the diverse events which befall Leopold Bloom and Stephen Dedalus in Dublin on 16 June 1904, during which Bloom\'s voluptuous wife, Molly, commits adultery.', 1),
	(51, 'Emily Bronte', 'Wuthering Heights', 'images\\wutheringheightscover.jpg', 2.00, '978-1853260018', '1901', 'Classic', 'Wuthering Heights is a wild, passionate story of the intense and almost demonic love between Catherine Earnshaw and Heathcliff, a foundling adopted by Catherine\'s father.', 0),
	(52, 'Lee Child', 'Blue Moon', 'images\\bluemooncover.jpg', 17.60, '978-1787632196', '2019', 'Thriller', 'Jack Reacher is back in a brand new white-knuckle read from Lee Child, creator of ‘today’s James Bond, a thriller hero we can’t get enough of’ (Ken Follett) - Coming October 2019 ', 0),
	(53, 'Stephen King', 'The Institute', 'images\\institutecover.jpg', 10.00, '978-1529355390', '2019', 'Horror', 'Deep in the woods of Maine, there is a dark state facility where kids, abducted from across the United States, are incarcerated. In the Institute they are subjected to a series of tests and procedures meant to combine their exceptional gifts for concentrated effect. Luke Ellis is the latest recruit, a regular 12-year-old but super-smart with another gift the Institute wants to use...', 4),
	(54, 'Margaret Atwood', 'The Testaments', 'images\\testamentscover.jpg', 10.00, '978-1784742324', '2019', 'Fiction', 'The Sequel to The Handmaid\'s Tale - Coming September 2019', 0),
	(55, 'Margaret Atwood', 'The Handmaids Tale', 'images\\handmaidstalecover.png', 5.97, '978-1784873189', '1985', 'Fiction', 'Offred is a Handmaid in The Republic of Gilead, a religious totalitarian state in what was formerly known as the United States. She is placed in the household of The Commander, Fred Waterford – her assigned name, Offred, means ‘of Fred’. She has only one function: to breed.', 6),
	(56, 'Ken Kesey', 'One Flew Over the Cuckoos Nest', 'images\\cuckoosnestcover.jpg', 6.86, '978-0141187884', '1962', 'Fiction', 'Pitching an extraordinary battle between cruel authority and a rebellious free spirit, Ken Kesey\'s One Flew Over the Cuckoo\'s Nest is a novel that epitomises the spirit of the sixties.', 5),
	(57, 'J K Rowling', 'Harry Potter and the Order of the Phoenix', 'images\\orderofthephoenixcover.jpg', 3.66, '978-1408855690', '2003', 'Childrens', 'Dark times have come to Hogwarts. After the Dementors\' attack on his cousin Dudley, Harry Potter knows that Voldemort will stop at nothing to find him. There are many who deny the Dark Lord\'s return, but Harry is not alone: a secret order gathers at Grimmauld Place to fight against the Dark forces.', 6);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;

-- Dumping structure for table bookshop.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id` int(10) unsigned NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `FK_orders_book` (`id`),
  CONSTRAINT `FK_orders_book` FOREIGN KEY (`id`) REFERENCES `book` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bookshop.orders: ~4 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT IGNORE INTO `orders` (`order_id`, `id`, `total`, `order_date`) VALUES
	(1, 5, 22.41, '2019-04-06 12:20:45'),
	(2, 6, 28.21, '2019-04-06 23:02:23'),
	(3, 5, 7.99, '2019-04-07 19:45:37'),
	(4, 5, 65.83, '2019-04-07 20:07:57');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table bookshop.order_contents
CREATE TABLE IF NOT EXISTS `order_contents` (
  `content_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned NOT NULL,
  `id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL DEFAULT '1',
  `price` decimal(6,2) unsigned NOT NULL DEFAULT '1.00',
  PRIMARY KEY (`content_id`),
  KEY `FK_order_contents_book` (`id`),
  KEY `FK_order_contents_orders` (`order_id`),
  CONSTRAINT `FK_order_contents_book` FOREIGN KEY (`id`) REFERENCES `book` (`id`),
  CONSTRAINT `FK_order_contents_orders` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bookshop.order_contents: ~18 rows (approximately)
/*!40000 ALTER TABLE `order_contents` DISABLE KEYS */;
INSERT IGNORE INTO `order_contents` (`content_id`, `order_id`, `id`, `quantity`, `price`) VALUES
	(1, 1, 1, 2, 4.49),
	(2, 1, 2, 1, 6.75),
	(3, 1, 3, 1, 6.68),
	(4, 2, 7, 1, 6.17),
	(5, 2, 9, 1, 4.00),
	(6, 2, 23, 1, 6.47),
	(7, 2, 31, 1, 7.91),
	(8, 2, 57, 1, 3.66),
	(9, 3, 14, 1, 7.99),
	(10, 4, 3, 1, 6.68),
	(11, 4, 13, 1, 4.00),
	(12, 4, 18, 1, 7.65),
	(13, 4, 20, 1, 5.75),
	(14, 4, 22, 1, 4.00),
	(15, 4, 40, 1, 7.46),
	(16, 4, 52, 1, 17.60),
	(17, 4, 53, 1, 10.00),
	(18, 4, 54, 1, 10.00);
/*!40000 ALTER TABLE `order_contents` ENABLE KEYS */;

-- Dumping structure for table bookshop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL DEFAULT '0',
  `surname` varchar(50) NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL DEFAULT '0',
  `pass` char(40) NOT NULL,
  `regDate` datetime NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table bookshop.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `firstName`, `surname`, `email`, `pass`, `regDate`, `admin`) VALUES
	(5, 'Pauline', 'Finlay', 'pfinlay@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2019-04-06 10:56:21', 1),
	(6, 'Matt', 'White', 'mattwhite@yahoo.co.uk', '348162101fc6f7e624681b7400b085eeac6df7bd', '2019-04-06 22:57:00', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
