<?php
    // count total users from database
    function userCountFunction(){

        include '../db_connection.php';
        $userCount = '';
        $sql = "SELECT COUNT(*) AS userCount FROM user_tbl";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$userCount = $row['userCount'];
		}
		return($userCount);
    }

    // count total books from database
    function bookCountFunction(){

        include '../db_connection.php';
        $bookCount = '';
        $sql = "SELECT COUNT(*) AS bookCount FROM book_tbl";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$bookCount = $row['bookCount'];
		}
		return($bookCount);
    }

    // count total issued-book from database
    function issuedbookCountFunction(){

        include '../db_connection.php';
        $issuedbookCount = '';
        $sql = "SELECT COUNT(*) AS issuedbookCount FROM issuedbook_tbl";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$issuedbookCount = $row['issuedbookCount'];
		}
		return($issuedbookCount);
    }

    // count total authors from database
    function authorCountFunction(){

        include '../db_connection.php';
        $authorCount = '';
        $sql = "SELECT COUNT(*) AS authorCount FROM author_tbl";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$authorCount = $row['authorCount'];
		}
		return($authorCount);
    }

    // count total category from database
    function categoryCountFunction(){

        include '../db_connection.php';
        $categoryCount = '';
        $sql = "SELECT COUNT(*) AS categoryCount FROM category_tbl";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$categoryCount = $row['categoryCount'];
		}
		return($categoryCount);
    }

    // count total book-request from database
    function bookRequestCountFunction(){

        include '../db_connection.php';
        $bookRequestCount = '';
        $sql = "SELECT COUNT(*) AS bookRequestCount FROM `book-request_tbl`";
    	$query = mysqli_query($connection, $sql);
        while($row = mysqli_fetch_assoc($query)){
			$bookRequestCount = $row['bookRequestCount'];
		}
		return($bookRequestCount);
    }


?>