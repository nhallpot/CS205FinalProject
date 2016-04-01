<h1>Database account at UVM</h1>

<p>The purpose of this repository to help you get over the hurdle of setting up a database, it is not intended to cover everything. It is not intended to teach you PHP or mySQL. This is an example of using PHP and mySQL, though the process to connect with Java or Python will use the same credentials. You can see the <a  target="_blank" href="http://rerickso.w3.uvm.edu/projects/databases-uvm/index.php">demo</a> on my site. This demo is setup on the silk server www-root (zoo would be similar).</p>

<p>I made a <a  target="_blank" href="https://rerickso.w3.uvm.edu/education/video/video.php?vid=321">help video</a> as well of this demo. Hopefully the setup goes as smoothly.</p>

<p>Uvm supports mysql databases that you can connect with php, python, java etc. You do not need to download anything to the server as its all setup already.</p>

<h2>STEPS:<h2><ol>
<li><b>mySQL account: </b><a target="_blank" href="https://www.uvm.edu/cit/mysql/">Request a mySQL username and password</a>. Be sure to save the auto generated email.</li>

<li>Create new databases here: <a target="_blank" href="https://webdb.uvm.edu/account/">https://webdb.uvm.edu/account/</a>. To match my sample name your database(case sensitive): Sample</li>

<li>Use <a target='_blank' href='https://webdb.uvm.edu/phpMyAdmin/'>PHPMyAdmin</a> to create these tables. You copy the sql statements and paste them (watch the video if you are not sure). You need to click on your database name above first to make sure the tables are created in that database.
<br><br>Here is the SQL statements to create the table:<pre>

CREATE TABLE IF NOT EXISTS tblPeople (
  pmkPeopleId int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  fldFirstName varchar(25) COLLATE utf8mb4_bin NOT NULL,
  fldLastName varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
</pre></p>

<br><br>The insert statements to populate the table (note i use a different version of the Insert statement in the example.<pre>
INSERT INTO tblPeople (fldFirstName, fldLastName) VALUES
('George', 'Jetson'),
('Jane', 'Jetson'),
('Judy', 'Jetson'),
('Elroy', 'Jetson'),
('Astro', 'Jetson'),
('Rosie', 'Jetson'),
('Cosmo G.', 'Spacely');
</pre>
</li>

<li>Download the files from this repository</li>
<li>Put in your passwords in pass.php</li>

</ol>

<p>Problems encountered have been </p>
<ol>
<li>Naming the database different than my Sample (its ok you just have to make sure you update the name in constants.php)</li>
<li>Forgetting to update the passwords in pass.php</li>
<li>Not making the table in teh Sample database</li>
</ol>

<!--<p>If you want simple tutorial here: <a target="_blank" href="http://www.w3schools.com/php/php_mysql_intro.asp">http://www.w3schools.com/php/php_mysql_intro.asp</a>. You should use a pdo example which will send all the values for the query in an array.</p>-->

<p>One item to keep in mind is that I have a constants.php:<br>
define("DEBUG", false);</p> 

<p>and one in the database.php class:<br>
const DB_DEBUG = false;</p>

<p>If you set these constants to true it can help you see what your variables are set to in case you are having trouble.</p>


