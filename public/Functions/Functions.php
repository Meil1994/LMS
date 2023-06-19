<?php 
	require 'config.php';
	session_start();
	ini_set('display_errors', 0);

	function insert_new_user(){
		include '../database/connection/Connection.php';
		$query = "INSERT INTO personal_info(PRC_Number, Full_Name, Region, Email_Address) VALUES ('".$_POST['PRC_Number']."', '".$_POST['Full_Name']."', '".$_POST['Region']."', '".$_POST['Email']."')";
		$query2 = "INSERT INTO login_info(PRC_Number, Username, Password) VALUES ('".$_POST['PRC_Number']."', '".$_POST['Username']."', '".$_POST['Password']."')";

		if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
			echo '<script type="text/javascript">';
			echo 'alert("User Successfully Added")';
			echo '</script>';
		}else{
			echo '<script type="text/javascript">';
			echo 'alert("Something Went Wrong")';
			echo '</script>';
		}
	}

	function insert_new_video(){
		include '../database/connection/Connection.php';

		$video_name = $_FILES['my_video']['name'];
        $tmp_name = $_FILES['my_video']['tmp_name'];
        $error = $_FILES['my_video']['error'];
        $date = date("M-d-Y");

        if ($error == 0) {
            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

            $video_ex_lc = strtolower($video_ex);

            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

            if(in_array($video_ex_lc, $allowed_exs)){
                
                $new_video_name = uniqid("file-", true).'.'.$video_ex_lc;
                $new_video_id = uniqid("video-", true);
                $video_upload_path = '../video_uploads/'.$new_video_name;
                move_uploaded_file($tmp_name, $video_upload_path);


                if(isset($_POST['Category_Checkbox'])){
                	$query = "SELECT * FROM video_category WHERE Category_Name = '".$_POST['New_Category']."'";
                	$result  = mysqli_query($conn, $query);
                	$num_rows = mysqli_num_rows($result);

                		if ($num_rows == 0) {
                			
                			$category_query = "INSERT INTO video_category (Category_Name) VALUES ('".$_POST['New_Category']."')";

                			if (mysqli_query($conn, $category_query)) {
                				
                				$get_ID = "SELECT * FROM video_category WHERE Category_Name = '".$_POST['New_Category']."'";
                				$ID_Result = mysqli_query($conn, $get_ID);
                				$CAT_ID = mysqli_fetch_assoc($ID_Result);
                				$Category = $CAT_ID['Category_ID'];
                			}

                		}else{
                			$row = mysqli_fetch_assoc($result);
                			$Category = $row['Category_ID'];
                		}
                }else{
                	$Category = $_POST['Video_Category'];
                }

                $query = "INSERT INTO video_upload(Video_ID, File_Name, File_Type, Video_Title, Category_ID, Video_Description, Video_Author, Date_Uploaded) VALUES ('".$new_video_id."','".$new_video_name."', '".$video_ex_lc."', '".$_POST['Video_Title']."', '".$Category."', '".$_POST['Video_Description']."', '".$_POST['Video_Author']."', '".$date."')";

                if(mysqli_query($conn, $query)){
                	header("location:admin_upload_video.php?insert=true");
                }else{
                	echo '<script type="text/javascript">';
					echo 'alert("Something Went Wrong")';
					echo '</script>';
                }

            }else{
                $em = "You Can't Upload Files Of This Type";
                header("location:admin_upload_video.php?error=".$em."");
            }

        }
	}

	function show_uploaded_video(){
		include '../database/connection/Connection.php';

		$query = "SELECT video_upload.* , video_category.Category_Name FROM video_upload INNER JOIN video_category ON video_upload.Category_ID = video_category.Category_ID";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			
			
			echo "<tr>";
				echo "<th>";
					echo "No.";
				echo "</th>";
				echo "<th>";
					echo "Video Title";
				echo "</th>";
				echo "<th>";
					echo "Video Author";
				echo "</th>";
				echo "<th>";
					echo "Video Catergory";
				echo "</th>";
				echo "<th>";
					echo "Video Description";
				echo "</th>";
				echo "<th>";
					echo "Date Uploaded";
				echo "</th>";
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);
				$no = $i + 1;
				echo '<tr>';
							echo '<td>'.$no.'</td>';
							echo '<td>'.$row['Video_Title'].'</td>';
							echo '<td>'.$row['Video_Author'].'</td>';
							echo '<td>'.$row['Category_Name'].'</td>';
							echo '<td>'.$row['Video_Description'].'</td>';
							echo '<td>'.$row['Date_Uploaded'].'</td>';
							echo '<td> <a href = "admin_update_video.php?videoid='.$row['Video_ID'].'&filename='.$row['File_Name'].'&videotitle='.$row['Video_Title'].'&videoauthor='.$row['Video_Author'].'&videodesc='.$row['Video_Description'].'&Category_ID='.$row['Category_ID'].'" class="upButton">Edit</a></td>';
							echo '<td> <a href = "admin_delete_video.php?videoid='.$row['Video_ID'].'&filename='.$row['File_Name'].'" class="delButton">Delete</a></td>';
				echo '</tr>';
			}
		}else{
			echo "<h2>No Videos Uploaded</h2>";
		}
	}

	function admin_delete_video(){
		include '../database/connection/Connection.php';

		$query = "DELETE FROM video_upload WHERE Video_ID = '".$_GET['videoid']."'";
		/*echo '<script type="text/javascript">';
				echo 'alert("'.$query.'")';
		echo '</script>';*/

		if (mysqli_query($conn, $query)) {
			unlink("../video_uploads/".$_GET['filename']."");
			header("location:admin_upload_video.php?delete=true");
		}
	}

	function admin_update_video(){
		include '../database/connection/Connection.php';

		if(isset($_POST['Category_Checkbox'])){
                	$query = "SELECT * FROM video_category WHERE Category_Name = '".$_POST['New_Category']."'";
                	$result  = mysqli_query($conn, $query);
                	$num_rows = mysqli_num_rows($result);

                		if ($num_rows == 0) {
                			
                			$category_query = "INSERT INTO video_category (Category_Name) VALUES ('".$_POST['New_Category']."')";

                			if (mysqli_query($conn, $category_query)) {
                				
                				$get_ID = "SELECT * FROM video_category WHERE Category_Name = '".$_POST['New_Category']."'";
                				$ID_Result = mysqli_query($conn, $get_ID);
                				$CAT_ID = mysqli_fetch_assoc($ID_Result);
                				$Category = $CAT_ID['Category_ID'];
                			}

                		}else{
                			$row = mysqli_fetch_assoc($result);
                			$Category = $row['Category_ID'];
                		}
                }else{
                	$Category = $_POST['Video_Category'];
                }

		if (isset($_POST['chckbox'])) {
				$video_name = $_FILES['my_video']['name'];
		        $tmp_name = $_FILES['my_video']['tmp_name'];
		        $error = $_FILES['my_video']['error'];
		        $date = date("M-d-Y");

	        if ($error === 0) {
	            $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

	            $video_ex_lc = strtolower($video_ex);

	            $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

	            if(in_array($video_ex_lc, $allowed_exs)){
	                
	                $new_video_name = uniqid("file-", true).'.'.$video_ex_lc;
	                $new_video_id = uniqid("video-", true);
	                $video_upload_path = '../video_uploads/'.$new_video_name;
	                move_uploaded_file($tmp_name, $video_upload_path);

	                $query = "UPDATE video_upload SET File_Name = '".$new_video_name."', File_Type = '".$video_ex_lc."', Video_Title = '".$_POST['Video_Title']."', Category_ID = '".$Category."', Video_Description = '".$_POST['Video_Description']."', Video_Author = '".$_POST['Video_Author']."' WHERE Video_ID = '".$_GET['videoid']."'";

	                if(mysqli_query($conn, $query)){
	                	unlink("../video_uploads/".$_GET['filename']."");
	                	header("location:admin_upload_video.php?update=true");
	                }else{
	                	echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong")';
						echo '</script>';
	                }

	            }else{
                	echo '<script type="text/javascript">';
               	 	echo 'alert("invalid video type")';
                	echo '</script>';
	            }

	        }
		}else{
			 $query = "UPDATE video_upload SET Video_Title = '".$_POST['Video_Title']."', Category_ID = '".$Category."', Video_Description = '".$_POST['Video_Description']."', Video_Author = '".$_POST['Video_Author']."' WHERE Video_ID = '".$_GET['videoid']."'";

	                if(mysqli_query($conn, $query)){
	                	header("location:admin_upload_video.php?update=true");
	                }else{
	                	echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong")';
						echo '</script>';
	                }
		}
	}
	function home_show_videos(){
		include 'database/connection/Connection.php';
		$query = "SELECT * FROM video_category";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);


					
					$filter_query = "SELECT * FROM video_upload WHERE Category_ID = '".$row['Category_ID']."'";
					$filter_result = mysqli_query($conn, $filter_query);
					$filter_num_rows = mysqli_num_rows($filter_result);

						if ($filter_num_rows >= 1) {

							
							echo '<div>';
                			echo '<h2>'.$row['Category_Name'].'</h2>';
                			echo '<table id="homeVideo_table">';


							$video_query = "SELECT * FROM video_upload WHERE Category_ID = ".$row['Category_ID']."";
							$video_query_result = mysqli_query($conn, $video_query);
							$video_num_rows = mysqli_num_rows($video_query_result);

							if ($video_num_rows >= 1) {
							echo "<tr>";

								for ($x=0; $x < $video_num_rows; $x++){
									$video_row = mysqli_fetch_assoc($video_query_result);
									
										echo '<th>';
											echo '<a href="">';
												echo "<video controls>";
													echo '<source src="video_uploads/'.$video_row['File_Name'].'" type="video/'.$video_row['File_Type'].'">';
												echo "</video>";

												echo '<p>'.$video_row['Video_Title'].'</p>';
											echo '<a href="">';
										echo '</th>';

										$y = $x+1;

										if ($y % 4 == 0) {
											echo "</tr>";
											echo "<tr>";
										}
									
								}
							echo "</tr>";
							}

						echo '</table>';
						echo '</div>';
						}						
			}
		}
	}
	function get_category(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM video_category";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);


		if($num_rows >= 1){
			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);
				echo "<option value = '".$row['Category_ID']."'>";
					echo $row['Category_Name'];
				echo "</option>";
			}
		}
	}
	function get_category_update(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM video_category";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);


		if($num_rows >= 1){
			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);
				if($_GET['Category_ID'] == $row['Category_ID']){
					$Choose = "SELECTED=''";
				}else{
					$Choose = "";
				}
				echo "<option value = '".$row['Category_ID']."' ".$Choose.">";
					echo $row['Category_Name'];
				echo "</option>";
			}
		}
	}

	function show_user_list(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM personal_info";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			
			
			echo "<tr>";
				echo "<th>";
					echo "PRC Number";
				echo "</th>";
				echo "<th>";
					echo "Full Name";
				echo "</th>";
				echo "<th>";
					echo "Region";
				echo "</th>";
				echo "<th>";
					echo "Email Address";
				echo "</th>";
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);
				echo '<tr>';
							echo '<td>'.$row['PRC_Number'].'</td>';
							echo '<td>'.$row['Full_Name'].'</td>';
							echo '<td>'.$row['Region'].'</td>';
							echo '<td>'.$row['Email_Address'].'</td>';
							echo '<td> <a href = "admin_user_update.php?prcnumber='.$row['PRC_Number'].'&fullname='.$row['Full_Name'].'&region='.$row['Region'].'&email='.$row['Email_Address'].'" class="upButton">Edit</a></td>';
							echo '<td> <a href = "admin_delete.php?prcdelete='.$row['PRC_Number'].'" class="delButton">Delete</a></td>';
				echo '</tr>';
			}
		}else{
			echo "<h2>No Registered User Yet</h2>";
		}
	}

	function delete_user(){
		include '../database/connection/Connection.php';

		$query = "DELETE FROM personal_info WHERE PRC_Number = ".$_GET['prcdelete']."";
		$query2 = "DELETE FROM login_info WHERE PRC_Number = ".$_GET['prcdelete']."";

		if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
			header("location:admin_user_list.php?userdeleted=true");
		}
	}

	function admin_update_user(){
		include '../database/connection/Connection.php';

		if (isset($_POST['chckbox'])) {
			$query = "UPDATE personal_info SET Full_Name = '".$_POST['Fullname']."', Region = '".$_POST['User_Region']."', Email_Address = '".$_POST['Email']."' WHERE PRC_Number = '".$_GET['prcnumber']."'";			
		}else{
			$query = "UPDATE personal_info SET Full_Name = '".$_POST['Fullname']."', Email_Address = '".$_POST['Email']."' WHERE PRC_Number = '".$_GET['prcnumber']."'";	
		}

		if (mysqli_query($conn, $query)) {
			header("location:admin_user_list.php?update=true");
		}
	}

	function admin_upload_news(){
		include '../database/connection/Connection.php';
		$pic_name = $_FILES['news_picture']['name'];
        $tmp_name = $_FILES['news_picture']['tmp_name'];
        $error = $_FILES['news_picture']['error'];
        $date = date("M-d-Y");

        if (isset($_POST['headline'])) {
        	$headline = 1;
        }else{
        	$headline = 0;
        }

		if ($error == 0) {
			$picture_ex = pathinfo($pic_name, PATHINFO_EXTENSION);

            $picture_ex_lc = strtolower($picture_ex);

            $allowed_exs = array("jpeg", 'jpg', 'png', 'webm');

            if(in_array($picture_ex_lc, $allowed_exs)){
            	$new_picture_name = uniqid("file-", true).'.'.$picture_ex_lc;
                $new_picture_id = uniqid("news-", true);
                $picture_upload_path = '../News_Files/'.$new_picture_name;
                move_uploaded_file($tmp_name, $picture_upload_path);
            }

            $query = "INSERT INTO news_updates(News_ID, File_Name, News_Title, News_Content, News_Author, Date_Uploaded, News_Type, News_Summary) VALUES ('".$new_picture_id."', '".$new_picture_name."', '".$_POST['News_Title']."', '".$_POST['News_Content']."', '".$_POST['News_Author']."', '".$date."', '".$headline."', '".$_POST['News_Summary']."')";

            if(mysqli_query($conn, $query)){
            	echo '<script type="text/javascript">';
						echo 'alert("News Uploaded")';
						echo '</script>';	
            }else{
            	echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong")';
						echo '</script>';
            }
		}
	}

	function get_news_updated(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM news_updates";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			
			
			echo "<tr>";
				echo "<th>";
					echo "Preview";
				echo "</th>";
				echo "<th>";
					echo "Title";
				echo "</th>";
				echo "<th>";
					echo "Author";
				echo "</th>";
				echo "<th>";
					echo "Date Uploaded";
				echo "</th>";
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);
				echo '<tr>';
							echo '<td><img src="../News_Files/'.$row['File_Name'].'" id="news_pic"></td>';
							echo '<td>'.$row['News_Title'].'</td>';
							echo '<td>'.$row['News_Author'].'</td>';
							echo '<td>'.$row['Date_Uploaded'].'</td>';
							echo '<td> <a href = "admin_update_news.php?newsfile='.$row['File_Name'].'&newsid='.$row['News_ID'].'&newstitle='.$row['News_Title'].'&newsauthor='.$row['News_Author'].'&newscontent='.$row['News_Content'].'&newstype='.$row['News_Type'].'&newsummary='.$row['News_Summary'].'" class="upButton">Edit</a></td>';
							echo '<td> <a href = "admin_delete.php?newsdelete='.$row['News_ID'].'&filename='.$row['File_Name'].'" class="delButton">Delete</a></td>';
				echo '</tr>';
			}
		}else{
			echo "<h2>No News and Update Yet</h2>";
		}
	}

	function delete_news(){
		include '../database/connection/Connection.php';
		$query = "DELETE FROM news_updates WHERE News_ID = '".$_GET['newsdelete']."'";

		if (mysqli_query($conn, $query)) {
			unlink("../News_Files/".$_GET['filename']."");
			header("location: admin_upload_news.php?delete=true");
		}else{
			
		}
	}

	function update_news(){
		include '../database/connection/Connection.php';

		if (isset($_POST['headline'])) {
        	$headline = 1;
        }else{
        	$headline = 0;
        }

        if (isset($_POST['newspic'])) {
        	$pic_name = $_FILES['news_picture']['name'];
        	$tmp_name = $_FILES['news_picture']['tmp_name'];
        	$error = $_FILES['news_picture']['error'];

        	if ($error == 0) {
			$picture_ex = pathinfo($pic_name, PATHINFO_EXTENSION);

            $picture_ex_lc = strtolower($picture_ex);

            $allowed_exs = array("jpeg", 'jpg', 'png', 'webm');

	            if(in_array($picture_ex_lc, $allowed_exs)){
	            	$new_picture_name = uniqid("file-", true).'.'.$picture_ex_lc;
	                $new_picture_id = uniqid("news-", true);
	                $picture_upload_path = '../News_Files/'.$new_picture_name;
	                move_uploaded_file($tmp_name, $picture_upload_path);

	                unlink("../News_Files/".$_GET['newsfile']."");
	            }
        	}
        	$query = "UPDATE news_updates SET File_Name = '".$new_picture_name."', News_Title = '".$_POST['News_Title']."', News_Content = '".$_POST['News_Content']."', News_Author = '".$_POST['News_Author']."', News_Type = ".$headline.", News_Summary = '".$_POST['News_Summary']."' WHERE News_ID = '".$_GET['newsid']."'";

        	if (mysqli_query($conn, $query)) {
        		header("location: admin_upload_news.php?update=true");
        	}
		}else{
			$query = "UPDATE news_updates SET News_Title = '".$_POST['News_Title']."', News_Content = '".$_POST['News_Content']."', News_Author = '".$_POST['News_Author']."', News_Type = ".$headline.", News_Summary = '".$_POST['News_Summary']."' WHERE News_ID = '".$_GET['newsid']."'";

			if (mysqli_query($conn, $query)) {
        		header("location: admin_upload_news.php?update=true");
        	}
		}
	}

	function getNews_Headline(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM news_updates WHERE News_Type = 1";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);

				echo '<div class="news-rows">';
	                    echo '<div class="news-img">';
	                        echo '<img src="News_Files/'.$row['File_Name'].'">';
	                    echo '</div>';

	                    echo '<div class="news-title">';
	                        echo '<br>';
	                            echo '<a href="news_container.php?id='.$row['News_ID'].'"><h2>'.$row['News_Title'].'</h2></a>';
	                    echo '</div>';
	                    echo '<div class="news-content">';
	                        echo '<p>&emsp;&emsp;&emsp;&emsp;'.$row['News_Summary'].'&emsp;<a href="news_container.php?id='.$row['News_ID'].'">Read More.</a></p>';
	                    echo '</div>';
	                echo '</div>';
            }
			
		}else{
			echo "<center><h1>";
				echo "No News And Updates At The Moments";
			echo "</center></h1>";
		}
	}

	function getNews(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM news_updates WHERE News_Type = 0";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			for ($i=0; $i < $num_rows; $i++){
				$row = mysqli_fetch_assoc($result);

				echo '<tr>';
					echo '<td>';
						echo '<center><img src="News_Files/'.$row['File_Name'].'">';
						echo '<a href="news_container.php?id='.$row['News_ID'].'" target="_blank"><h3>'.$row['News_Title'].'</h3></a></center>';
					echo '</td>';
				echo '</tr>';
            }
			
		}
	}

	function getSpecific_News(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM news_updates WHERE News_ID = '".$_GET['id']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
				$row = mysqli_fetch_assoc($result);

				echo '<div class="news-rows">';
	                    echo '<div class="news-img">';
	                        echo '<img src="News_Files/'.$row['File_Name'].'">';
	                    echo '</div>';

	                    echo '<div class="news-title">';
	                        echo '<br>';
	                            echo '<h2>'.$row['News_Title'].'</h2>';
	                            echo '<h5 style="color:gray;">Author: '.$row['News_Author'].'</h5>';
	                    echo '</div><br>';
	                    echo '<div class="news-content">';
	                        echo '<p>&emsp;&emsp;&emsp;&emsp;'.$row['News_Content'].'</p>';
	                    echo '</div>';
	                echo '</div>';	
		}
	}
	function insert_course(){
		include '../database/connection/Connection.php';

		$course_id = uniqid("course-", true);

		$query = "INSERT INTO courses (Course_ID, Course_Name, Course_Description) VALUES ('".$course_id."', '".$_POST['Course_Name']."', '".$_POST['Course_Overview']."')";

		if (mysqli_query($conn, $query)) {
			echo '<script type="text/javascript">';
						echo 'alert("Course Successfully Added")';
						echo '</script>';
		}else{
			echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong, Please Try Again")';
						echo '</script>';
		}
	}

	function show_Courses(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM courses";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			
			
			echo "<tr>";
				echo "<th>";
					echo "Course Name";
				echo "</th>";
				echo "<th>";
					echo "Course Overview";
				echo "</th>";
				
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++) { 

				$row = mysqli_fetch_assoc($result);
				echo '<tr>';
							echo '<td> <a href="Manage_Lessons.php?courseid='.$row['Course_ID'].'&coursename='.$row['Course_Name'].'" class="courseName">'.$row['Course_Name'].'</a></td>';
							echo '<td>'.$row['Course_Description'].'</td>';
							echo '<td> <a href = "Course_Update.php?courseid='.$row['Course_ID'].'&coursename='.$row['Course_Name'].'&coursepreview='.$row['Course_Description'].'" class="upButton">Edit</a></td>';
							echo '<td> <a href = "admin_delete.php?coursedelete='.$row['Course_ID'].'" class="delButton">Delete</a></td>';
				echo '</tr>';
			}
		}else{
			echo "<h1>No Existing Courses</h1>";
		}

	}

	function delete_Course(){
		include '../database/connection/Connection.php';
		$query = "DELETE FROM courses  WHERE Course_ID = '".$_GET['coursedelete']."'";

		if (mysqli_query($conn, $query)) {

			$query = "SELECT * FROM lessons WHERE Course_ID = '".$_GET['coursedelete']."'";
			$result = mysqli_query($conn, $query);
			$num_rows = mysqli_num_rows($result);

				if($num_rows >= 1){
					for ($i=0; $i < $num_rows; $i++) { 
						$row = mysqli_fetch_assoc($result);

							$material_query = "SELECT * FROM lesson_materials WHERE Lessons_ID = '".$row['Lessons_ID']."'";
							$material_result = mysqli_query($conn, $material_query);
							$material_count  = mysqli_num_rows($material_result);

								if ($material_count >= 1) {
									for ($x=0; $x < $material_count; $x++) { 
										$material = mysqli_fetch_assoc($material_result);
										unlink("../Lesson_Materials/".$material['File_Name']."");
									}
								}

						$delete_Material = "DELETE FROM lesson_materials WHERE Lessons_ID = '".$row['Lessons_ID']."'";
						if (mysqli_query($conn, $delete_Material)) {
						}
					}

				}

				$query = "DELETE FROM lessons WHERE Course_ID = '".$_GET['coursedelete']."'";
				if (mysqli_query($conn, $query)) {
					header("location: Manage_Courses.php?delete=true");	
				}

		}else{
			echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong, Please Try Again")';
						echo '</script>';	
		}
	}

	function update_course(){
		include '../database/connection/Connection.php';
		$query = "UPDATE courses SET Course_Name = '".$_POST['Course_Name']."', Course_Description = '".$_POST['Course_Overview']."' WHERE Course_ID = '".$_GET['courseid']."'";

		if (mysqli_query($conn, $query)) {
			header("location: Manage_Courses.php?update=true");
		}else{
			echo '<script type="text/javascript">';
						echo 'alert("Something Went Wrong, Please Try Again")';
						echo '</script>';
		}
	}

	function insert_lesson(){
		include '../database/connection/Connection.php';

		$lesson_id = uniqid("lesson-", true);

		if(isset($_POST['newspic'])){
		$fileCount = count($_FILES['file']['name']);
		for ($i=0; $i < $fileCount; $i++) {

			$material_id = uniqid("material-", true);

			$fileName = $_FILES['file']['name'][$i];

			$file_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            	
			$new_name = uniqid("material-", true).'_'.$fileName;
			

			$query = "INSERT INTO lesson_materials(Material_ID, Lessons_ID, File_Name, File_Type) VALUES ('".$material_id."', '".$lesson_id."', '".$new_name."', '".$file_ex."')";

			if (mysqli_query($conn, $query)) {

				move_uploaded_file($_FILES['file']['tmp_name'][$i], '../Lesson_Materials/'.$new_name);
				
			}

		}
		}

		$query = "INSERT INTO lessons (Lessons_ID, Course_ID, Lesson_Title, Lesson_Content) VALUES ('".$lesson_id."', '".$_GET['courseid']."', '".$_POST['Lesson_Title']."', '".$_POST['Lesson_Content']."')";

		if (mysqli_query($conn, $query)) {
			echo '<script type="text/javascript">';
						echo 'alert("Lesson Successfully Added")';
						echo '</script>';
		}
	}

	function show_Lessons(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM lessons WHERE Course_ID = '".$_GET['courseid']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if($num_rows >= 1){

			echo "<tr>";
				echo "<th>";
					echo "No.";
				echo "</th>";
				echo "<th>";
					echo "Lesson Title";
				echo "</th>";
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
					$x = $i + 1;

					echo "<tr>";
						echo "<td>";
							echo $x;
						echo "</td>";
						echo '<td><a href="Lesson_Content.php?lessonid='.$row['Lessons_ID'].'&coursename='.$_GET['coursename'].'">';
							echo $row['Lesson_Title'];
						echo "</a></td>";
						echo '<td> <a href = "Update_Lessons.php?courseid='.$_GET['courseid'].'&coursename='.$_GET['coursename'].'&lessonid='.$row['Lessons_ID'].'&lessontitle='.$row['Lesson_Title'].'&lessoncontent='.$row['Lesson_Content'].'" class="upButton">Edit</a></td>';
							echo '<td> <a href = "admin_delete.php?lessondelete='.$row['Lessons_ID'].'&courseid='.$_GET['courseid'].'&coursename='.$_GET['coursename'].'" class="delButton">Delete</a></td>';
					echo "</tr>";
			}

		}else{
			echo "<center><h1>No Lessons At The Moment</h1></center>";
		}
	}

	function show_LesContent(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM lessons WHERE Lessons_ID = '".$_GET['lessonid']."'";

		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		echo '<h1 id="Lesson_Title">'.$row['Lesson_Title'].'</h1><hr><br>';
		echo '<h3 id="Lesson_Content">'.$row['Lesson_Content'].'</h3><br><br>';
		echo '<h1 id="Lesson_File">Lesson Materials</h1><hr><br>';


		$query2 = "SELECT * FROM lesson_materials WHERE Lessons_ID = '".$_GET['lessonid']."'";

		$result2 = mysqli_query($conn, $query2);
		$num_rows2 = mysqli_num_rows($result2);

			if ($num_rows2 >= 1) {
				
				for ($i=0; $i < $num_rows2; $i++) { 
					$row2 = mysqli_fetch_assoc($result2);

					echo '<a href="../Lesson_Materials/'.$row2['File_Name'].'" download>'.$row2['File_Name'].'</a>';
					echo '<br>';
				}

			}else{
				echo '<h2>No Attached Files';
			}
	}

	function delete_Lesson(){
		include '../database/connection/Connection.php';
		$query = "DELETE FROM lessons WHERE Lessons_ID = '".$_GET['lessondelete']."'";

		if (mysqli_query($conn, $query)) {
			$query = "SELECT * FROM lesson_materials WHERE Lessons_ID = '".$_GET['lessondelete']."'";
			$result = mysqli_query($conn, $query);
			$num_rows = mysqli_num_rows($result);

			if ($num_rows >= 1) {
				for ($i=0; $i < $num_rows; $i++) { 
					$row = mysqli_fetch_assoc($result);

					unlink("../Lesson_Materials/".$row['File_Name']."");
				}

				$query = "DELETE FROM lesson_materials WHERE Lessons_ID = '".$_GET['lessondelete']."'";

				if (mysqli_query($conn, $query)) {
					header("location: Manage_Lessons.php?courseid=".$_GET['courseid']."&coursename=".$_GET['coursename']);
				}
			}
		}
	}

	function update_Lesson(){
		include '../database/connection/Connection.php';

		if(isset($_POST['newspic'])){

		$fileCount = count($_FILES['file']['name']);

		for ($i=0; $i < $fileCount; $i++) {

			$material_id = uniqid("material-", true);

			$fileName = $_FILES['file']['name'][$i];

			$file_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            	
			$new_name = uniqid("material-", true).'_'.$fileName;
			

			$query = "INSERT INTO lesson_materials(Material_ID, Lessons_ID, File_Name) VALUES ('".$material_id."', '".$_GET['lessonid']."', '".$new_name."')";

			if (mysqli_query($conn, $query)) {

				move_uploaded_file($_FILES['file']['tmp_name'][$i], '../Lesson_Materials/'.$new_name);
				
			}

		}
		}else{

		}


		$query = "UPDATE lessons SET Lesson_Title = '".$_POST['Lesson_Title']."', Lesson_Content = '".$_POST['Lesson_Content']."' WHERE Lessons_ID = '".$_GET['lessonid']."'";

		if (mysqli_query($conn, $query)) {
			header("location: Manage_Lessons.php?courseid=".$_GET['courseid']."&coursename=".$_GET['coursename']."&lessonid=".$_GET['lessonid']);
		}
	}

	function delete_Material(){
		include '../database/connection/Connection.php';

		$query = "DELETE FROM lesson_materials WHERE Material_ID = '".$_GET['materialdelete']."'";

		if (mysqli_query($conn, $query)) {
			unlink("../Lesson_Materials/".$_GET['filename']."");
			header("location:Update_Lessons.php?courseid=".$_GET['courseid']."&coursename=".$_GET['coursename']."&lessonid=".$_GET['lessonid']."&lessontitle=".$_GET['lessontitle']."&lessoncontent=".$_GET['lessoncontent']."");
		}
	}

	function signIn(){
		include 'database/connection/Connection.php';
		
		$query = "SELECT * FROM teachers_accounts WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'";	
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		// $query = "SELECT * FROM students_accounts WHERE Username = '".$_POST['username']."' AND Password = '".$_POST['password']."'";	
		// $result = mysqli_query($conn, $query);
		// $num_rows = $num_rows + mysqli_num_rows($result);

		if ($num_rows >= 1) {
			$row = mysqli_fetch_assoc($result);

			if (isset($_POST['remember'])) {
				setcookie("user", $_POST['username'], time() + (86400 * 30), "signin_page.php");
				setcookie("pass", $_POST['password'], time() + (86400 * 30), "signin_page.php");
			}
			else
			{
				// echo '<script>alert("qweqwe");</script>';
				setcookie("user", $_POST['username'], 30);
				setcookie("pass", $_POST['password'], 30);
			}

			session_start();
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['PRC_Number'] = $row['PRC_Number'];

			$infoQuery = "SELECT * FROM additional_info WHERE PRC_Number = '".$row['PRC_Number']."'";
			$infoResult = mysqli_query($conn, $infoQuery);
			$infoRows = mysqli_num_rows($infoResult);

			if ($infoRows >= 1) {
				$_SESSION['logged_in_sa_loob_ng_teacher_folder'] = "true";
				header("location: Teachers/index.php#".$_SESSION['PRC_Number']."");
			}else{
				header("location: Guro-Form/index.php");
			}





				
		}else{
			echo '<script type="text/javascript">';
						echo 'alert("Login Denied")';
						echo '</script>';
		}
	}

	function temporary_admin_signIn(){
		include 'Functions/config.php';
		
		$query = "SELECT * FROM temporary_admin_account WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";	

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			header("location: passcode-generator.php");
		}else{
			echo '<script type="text/javascript">';
			echo 'alert("Login Denied")';
			echo '</script>';
		}
	}

	function showCourses(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM courses";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {

			
			echo '<h1 style="width:100%; background-color:green; padding:10px; color:white; border-radius:3px;">Courses</h1>';
			echo "<center><table id='course_table'>";

			echo "<tr>";
				for ($i=0; $i < $num_rows; $i++) { 
					$row = mysqli_fetch_assoc($result);
					$x = $i + 1;
				
					echo "<td>";
						echo "<div class='course-tainer'>";
							echo "<center><h2><a href=''>".$row['Course_Name']."</a></h2></center>";
						echo "</div>";
					echo "</td>";
				
					if($x % 4 == 0){
						echo "</tr>";
						echo "<tr>";
					}
				}
			echo "</tr>";

			echo "</table></center>";
		}
	}
	function adminLogin(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM admin_credential WHERE User = '".$_POST['username']."' AND Pass = '".$_POST['password']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if($num_rows >= 1){
			session_start();
			$_SESSION['admin'] = "Gaudy";
			header("location: E-Taguyod_admin.php");
		}else{
			echo '<script type="text/javascript">';
						echo 'alert("Incorrect Username or Password")';
						echo '</script>';
		}
	}

	function getName(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM personal_info WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		
		$row = mysqli_fetch_assoc($result);
		echo $row['Full_Name'];
	}

	function getCourses(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM courses";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);
		$enrolled_count = 0;

		if ($num_rows >= 1) {
			echo "<tr>";
			for ($i=0; $i < $num_rows; $i++) {
				$x = $i + 1; 
				$prnt = 0;
				$row = mysqli_fetch_assoc($result);

				$enrolled_query = "SELECT * FROM enrolled_course WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
				$enrolled_reslt = mysqli_query($conn, $enrolled_query);
				$enrolled_num = mysqli_num_rows($enrolled_reslt);
				$enrolled_count = $enrolled_num;

				if ($enrolled_num >= 1) {
					for ($y=0; $y < $enrolled_num; $y++) { 
						$enrolled = mysqli_fetch_assoc($enrolled_reslt);
							if ($enrolled['Course_ID'] == $row['Course_ID']) {
								$prnt = 1;
								$y = $enrolled_num;
							}else{
								$prnt = 0;
							}
					}
				}



				if ($prnt != 1) {
						echo "<td>";
						echo '<div class="kurso">';
							echo '<img src="img/available.png" alt="">';
							echo '<br>';
							echo '<label for="">'.$row['Course_Name'].'</label>';
							echo '<br>';
							echo '<div class="w3-container">';
								echo '<button onclick="document.getElementById('."'".$row['Course_ID']."'".').style.display='."'block'".'" class="btn_view">VIEW</button>';
								echo '<div id="'.$row['Course_ID'].'" class="w3-modal">';
									echo '<div class="w3-modal-content w3-card-4">';
										echo '<header class="w3-container w3-teal">';
											echo '<span onclick="document.getElementById('."'".$row['Course_ID']."'".').style.display='."'none'".'" class="w3-button w3-display-topright">&times;</span>';
											echo '<h2>'.$row['Course_Name'].'</h2>';
										echo '</header>';
										echo '<div class="w3-container">';
											echo '<h3>Description:</h3>';
											echo '<p>'.$row['Course_Description'].'</p>';
										echo '</div>';
										echo '<footer class="w3-container w3-teal">';
											echo '<a href="course.php?courseid='.$row['Course_ID'].'&name='.$row['Course_Name'].'"><button class="modal-cancel" >ENROL</button></a>';
										echo '</footer>';
									echo '</div>';
								echo '</div>';
							echo '</div>';
                        echo '</div>';
					echo "</td>";

				if ($x % 6 == 0) {
					echo "</tr>";
					echo "<tr>";
				}
				}
			}
			if ($enrolled_count == $num_rows) {
				echo "<center><h1>You Have Enrolled All Subjects</h1></center>";
			}
			echo "</tr>";
		}
	}

	function getPos(){
		include '../database/connection/Connection.php';

		$query = "SELECT Teacher_Position FROM additional_info WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			$row = mysqli_fetch_assoc($result);

			echo $row['Teacher_Position'];
		}else{
			echo "Not Set";
		}
		
			
	}

	function enrollCourse(){
		include '../database/connection/Connection.php';

		$id = uniqid("enrolment-", true);
		$query = "INSERT INTO enrolled_course(Enrolment_ID, Course_ID, Course_Name, PRC_Number) VALUES ('".$id."', '".$_GET['courseid']."', '".$_GET['name']."', '".$_SESSION['PRC_Number']."')";

		if (mysqli_query($conn, $query)) {
			header("location: enrolled.php");
		}
	}

	function countEnrolled(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM enrolled_course WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		echo $num_rows;
	}

	function getEnrolled(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM enrolled_course WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			echo '<tr>';
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);

				echo '<td>';
                    echo '<a href="course_lessons.php?name='.$row['Course_Name'].'&id='.$row['Course_ID'].'">';
                        echo '<img src="img/books.png" alt="">';
                    echo '<br/>';
                    echo '<label for="">'.$row['Course_Name'].'</label>';
                echo '</td>';


				$x = $i + 1;
				if ($x % 6 == 0) {
					echo '</tr>';
					echo '<tr>';
				}
			}
			echo '</tr>';
		}
	}

	function getTasks(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM lessons WHERE Course_ID = '".$_GET['id']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);
		$counter = 1;

		if ($num_rows >= 1) {
			$prnt = 0;
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);

				$accom_Query = "SELECT * FROM accomplished_task WHERE PRC_Number = '".$_SESSION['PRC_Number']."' AND Course_ID = '".$_GET['id']."'";
				$accom_Result = mysqli_query($conn, $accom_Query);
				$accom_num = mysqli_num_rows($accom_Result);

				if ($accom_num >= 1) {
					for ($x=0; $x < $accom_num; $x++) { 
						$accom_row = mysqli_fetch_assoc($accom_Result);


							if ($row['Lessons_ID'] == $accom_row['Lessons_ID']) {
								$prnt = 1;
								$x = $accom_num;
							}else{
								$prnt = 0;

							}

					}
				}

				if ($prnt != 1) {
					echo '<h1 class="lessonz"><a href="lessons.php?id='.$_GET['id'].'&lessonid='.$row['Lessons_ID'].'&Lname='.$row['Lesson_Title'].'&name='.$_GET['name'].'">'.$counter.". ".$row['Lesson_Title'].'</a></h1><hr><br>';
					$counter++;
				}

			}
			
		}else{
			echo '<center><h1>No Task For This Courses Yet</h1></center>';
			$counter = 2;
		}
		if ($counter == 1) {
					echo "<br><center><h1>You Have Finished All Tasks</h1></center>";
		}

		
	}

	function getAccomTask(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM accomplished_task INNER JOIN lessons ON accomplished_task.Lessons_ID = lessons.Lessons_ID WHERE accomplished_task.PRC_Number = '".$_SESSION['PRC_Number']."' AND accomplished_task.Course_ID = '".$_GET['id']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {

			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
				$count = $i+1;

				echo '<h1 class="lessons"><a href="attached_files.php?lessonid='.$row['Lessons_ID'].'&name='.$_GET['name'].'&id='.$_GET['id'].'">'.$count.". ".$row['Lesson_Title'].'</a></h1>';
			}
		}else{
			echo '<center><h1>No Accomplished Task Yet</h1></center>';
		}
	}

	function getLessonDetails(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM lessons WHERE Lessons_ID = '".$_GET['lessonid']."'";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_assoc($result);

		echo "<br><center><h3>".$row['Lesson_Content']."</h3></center>";



		$link_query = "SELECT * FROM links WHERE Lessons_ID = '".$_GET['lessonid']."'";
		$link_result = mysqli_query($conn, $link_query);
		$link_num = mysqli_num_rows($link_result);

		if ($link_num >= 1) {
			for ($i=0; $i < $link_num; $i++) { 
				$link_row = mysqli_fetch_assoc($link_result);

			echo '<iframe src="'.$link_row['link'].'" style="width:100%; height:500px;"></iframe><br><br>';	
			}
		}




		$mat_query = "SELECT * FROM lesson_materials WHERE Lessons_ID = '".$_GET['lessonid']."'";
		$mat_result = mysqli_query($conn, $mat_query);
		$mat_num = mysqli_num_rows($mat_result);

		if ($mat_num >= 1) {
			echo '<br><br>';
			echo '<h1 style="color:green; margin-left:50px;">Attached Files</h1>';
			for ($i=0; $i < $mat_num; $i++) { 
				$mat_row = mysqli_fetch_assoc($mat_result);

				echo '<a href="../Lesson_Materials/'.$mat_row['File_Name'].'" style="margin-left:50px; font-weight:bold" download="">'.$mat_row['File_Name'].'</a>';
				

			}
		}

	} 

	function markasDone(){
		include '../database/connection/Connection.php';
		
		$id = uniqid("Acc-", true);

		
		if(isset($_POST['chkbox'])){

		$fileCount = count($_FILES['file']['name']);
		for ($i=0; $i < $fileCount; $i++) {

			$material_id = uniqid("material-", true);

			$fileName = $_FILES['file']['name'][$i];

			$file_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $file_ex_lc = strtolower($file_ex);
            	
			$new_name = uniqid("material-", true).'_'.$fileName;
			

			$query = "INSERT INTO accomplished_files(Accom_Matt, Accomplished_ID, Lessons_ID, PRC_Number, File_Name, File_Type) VALUES ('".$material_id."', '".$id."', '".$_GET['lessonid']."', '".$_SESSION['PRC_Number']."', '".$new_name."', '".$file_ex."')";

			if (mysqli_query($conn, $query)) {

				move_uploaded_file($_FILES['file']['tmp_name'][$i], '../Accomplished_Materials/'.$new_name);
				
			}

		}
		}



		$query = "INSERT INTO accomplished_task (Accomplished_ID, PRC_Number, Lessons_ID, Course_ID) VALUES ('".$id."', '".$_SESSION['PRC_Number']."', '".$_GET['lessonid']."', '".$_GET['id']."')";

		if (mysqli_query($conn, $query)) {

			header("location: course_lessons.php?name=".$_GET['name']."&id=".$_GET['id']);

		}else{
			echo '<script>';
				echo 'alert("Error")';
			echo '</script>';
		}
	}

	function insertAdditional(){
		include '../database/connection/Connection.php';

		$profile_name = $_FILES['profilePic']['name'];
        $tmp_name = $_FILES['profilePic']['tmp_name'];
        $error = $_FILES['profilePic']['error'];
        $date = date("M-d-Y");

        if ($error == 0) {
            $prof_ex = pathinfo($profile_name, PATHINFO_EXTENSION);

            $prof_ex_lc = strtolower($prof_ex);

            $allowed_exs = array("jpeg", 'jpg', 'png');

            if(in_array($prof_ex_lc, $allowed_exs)){
                
                $new_prof_name = uniqid($_SESSION['PRC_Number']."-", true).'.'.$prof_ex_lc;
                //$new_video_id = uniqid("video-", true);
                $prof_upload_path = '../Profile/'.$new_prof_name;
                move_uploaded_file($tmp_name, $prof_upload_path);

            }
        }



		$query = "INSERT INTO additional_info(PRC_Number, Profile_Pic, Teacher_Position, Firstname, Middlename, Lastname, Name_Ex, Birthday, Contact, Barangay, City, Minucipality) VALUES ('".$_SESSION['PRC_Number']."', '".$new_prof_name."', '".$_POST['position']."', '".$_POST['firstname']."', '".$_POST['middlename']."', '".$_POST['lastname']."', '".$_POST['name_ex']."', '".$_POST['birthday']."', '".$_POST['contact']."', '".$_POST['barangay']."', '".$_POST['city']."', '".$_POST['municipality']."')";

		if (mysqli_query($conn, $query)) {
			
			$query = "UPDATE login_info SET Username = '".$_POST['username']."', Password = '".$_POST['password']."' WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";

			if (mysqli_query($conn, $query)) {
					$concat = $_POST['lastname']." ".$_POST['name_ex'].', '.$_POST['firstname'].' '.$_POST['middlename'];		


				$query = "UPDATE personal_info SET Full_Name = '".$concat."', Region = '".$_POST['region']."', Email_Address = '".$_POST['email']."' WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";

				if (mysqli_query($conn, $query)) {
					header("location: ../Teachers/index.php");
				}


			}

		}
	}

	function getTuro(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM courses";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);


		if($num_rows >= 1){
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
			
			echo '<div class="course1" >';
                    echo '<a href="sessions.php?courseid='.$row['Course_ID'].'">';
                    echo '<img src="img/books.png" alt="" srcset="">';
                    echo '<br>';
                    echo '<label for="course1" class="l.course1">'.$row['Course_Name'].'</label>';
                    echo '<label for="subtitle">'.$row['Course_Description'].'</label>';
                echo '</a>';
                echo '</div>';
            }
		}else{
			echo "<center><h1>No Courses Available</h1></center>";
		}
	}

	function getElesson(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM lessons WHERE Course_ID = '".$_GET['courseid']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {

			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
				echo '<div class="course1" >';
                    echo '<a href="signin_page.php">';
                    echo '<img src="img/books.png" alt="" srcset="">';
                    echo '<br>';
                    echo '<label for="course1" class="l.course1">'.$row['Lesson_Title'].'</label>';
                echo '</a>';
                echo '</div>';
			}
		}else{
			echo "<center><h1>No Lessons Available</h1></center>";
		}
	}

	function getTurok(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM courses WHERE Course_ID = '".$_GET['courseid']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);


		if($num_rows >= 1){ 
			$row = mysqli_fetch_assoc($result);
			echo $row['Course_Name'];
		}else{
			echo "<center><h1>No Courses Available</h1></center>";
		}
	}

	function getTuroks(){
		include 'database/connection/Connection.php';

		$query = "SELECT * FROM courses WHERE Course_ID = '".$_GET['courseid']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);


		if($num_rows >= 1){ 
			$row = mysqli_fetch_assoc($result);
			echo $row['Course_Description'];
		}else{
			echo "<center><h1>No Courses Available</h1></center>";
		}
	}

	function show_Enrolled(){
		include '../database/connection/Connection.php';


		$task_counter = "SELECT * FROM lessons WHERE Course_ID = '".$_GET['courseid']."'";
		$count_result = mysqli_query($conn, $task_counter);
		$task_count = mysqli_num_rows($count_result);



		$query = "SELECT * FROM enrolled_course INNER JOIN personal_info ON enrolled_course.PRC_Number =  personal_info.PRC_Number WHERE enrolled_course.Course_ID = '".$_GET['courseid']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if($num_rows >= 1){

			echo "<tr>";
				echo "<th>";
					echo "No.";
				echo "</th>";
				echo "<th>";
					echo "Name";
				echo "</th>";
				echo "<th>";
					echo "PRC Number";
				echo "</th>";
				echo "<th>";
					echo "Status";
				echo "</th>";
				echo "<th colspan=2>";
					echo "Action";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
					$x = $i + 1;

					$accom_count = "SELECT * FROM accomplished_task WHERE PRC_Number = '".$row['PRC_Number']."' AND Course_ID = '".$_GET['courseid']."'";
					$accom_countRes = mysqli_query($conn, $accom_count);
					$accom_num = mysqli_num_rows($accom_countRes);
					$status = "";

					if ($accom_num == $task_count) {
						$status = "Finished";						
					}else{
						$status = "On Going";
					}


					$finished_query = "SELECT * FROM finished_course WHERE PRC_Number = '".$row['PRC_Number']."' AND Course_ID = '".$_GET['courseid']."'";
					$fin_result = mysqli_query($conn, $finished_query);
					$fin_num = mysqli_num_rows($fin_result);

					if ($fin_num >= 1) {

					}else{

					echo "<tr>";
						echo "<td>";
							echo $x;
						echo "</td>";
						echo '<td><a href="Enrolled_Lesson.php?courseid='.$_GET['courseid'].'&coursename='.$_GET['coursename'].'&prc='.$row['PRC_Number'].'">';
							echo $row['Full_Name'];
						echo "</a></td>";
						echo '<td>';
							echo $row['PRC_Number'];
						echo "</td>";
						echo '<td>';
							echo $status;
						echo "</td>";
						echo '<td> <a href = "finished.php?prc='.$row['PRC_Number'].'&coursename='.$_GET['coursename'].'&courseid='.$_GET['courseid'].'" class="upButton">Passed</a></td>';
							echo '<td> <a href = "" class="delButton">Failed</a></td>';
					echo "</tr>";
					}
			}

		}else{
			echo "<center><h1>No Lessons At The Moment</h1></center>";
		}
	}
	function getAccomplished(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM accomplished_task INNER JOIN lessons ON accomplished_task.Lessons_ID = lessons.Lessons_ID WHERE accomplished_task.PRC_Number = '".$_GET['prc']."' AND accomplished_task.Course_ID = '".$_GET['courseid']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			echo "<h1>Accomplished Task</h1>";
			echo "<tr>";
				echo "<th>";
					echo "No.";
				echo "</th>";
				echo "<th>";
					echo "Lesson Name";
				echo "</th>";
				echo "<th>";
					echo "Attached Files";
				echo "</th>";
			echo "</tr>";

			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
					$x = $i + 1;

					echo "<tr>";
						echo "<td>";
							echo $x;
						echo "</td>";
						echo '<td>';
							echo $row['Lesson_Title'];
						echo "</td>";
						echo '<td>';
							echo '<a href="finished_files.php?lesssonid='.$row['Lessons_ID'].'&prc='.$_GET['prc'].'&coursename='.$_GET['coursename'].'&courseid='.$_GET['courseid'].'">See Files</a>';
						echo "</td>";
					echo "</tr>";
			}
		}else{
			echo "<h1>No Accomplished Task Yet</h1>";
		}
	}

	function getfinishedFiles(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM accomplished_files WHERE Lessons_ID = '".$_GET['lesssonid']."' AND PRC_Number = '".$_GET['prc']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			echo "<tr>";
				echo "<th>";
					echo "No.";
				echo "</th>";
				echo "<th>";
					echo "File Name";
				echo "</th>";
				echo "<th>";
					echo "File_Type";
				echo "</th>";
			echo "</tr>";


			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
					$x = $i + 1;

					echo "<tr>";
						echo "<td>";
							echo $x;
						echo "</td>";
						echo '<td>';
							echo '<a href="../Accomplished_Materials/'.$row['File_Name'].'" download="">'.$row['File_Name'].'</a>';
						echo "</td>";
						echo '<td>';
							echo $row['File_Type'];
						echo "</td>";
					echo "</tr>";
			}


		}else{
			echo '<h1>No Attached Files</h1>';
		}
	}

	function getAttached(){
		include '../database/connection/Connection.php';

		$query = "SELECT * FROM accomplished_files WHERE Lessons_ID = '".$_GET['lessonid']."' AND PRC_Number = '".$_SESSION['PRC_Number']."'";

		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);
		$counter = 1;

		if ($num_rows >= 1) {
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);
				echo '<h1 class="lessons"><a href="../Accomplished_Materials/'.$row['File_Name'].'" download="">'.$row['File_Name'].'</a></h1><hr>';
			}
			
		}else{
			echo '<center><h1>You Have Not Attached Any File In This Task</h1></center>';
			$counter = 2;
		}
	}

	function getFinished(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM finished_course INNER JOIN courses ON finished_course.Course_ID = courses.Course_ID WHERE finished_course.PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			echo '<tr>';
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);

				echo '<td>';
                    echo '<a href="">';
                        echo '<img src="img/books.png" alt="">';
                    echo '<br/>';
                    echo '<label for="">'.$row['Course_Name'].'</label>';
                echo '</td>';


				$x = $i + 1;
				if ($x % 6 == 0) {
					echo '</tr>';
					echo '<tr>';
				}
			}
			echo '</tr>';
		}else{
			echo "<center><h1>You Have Not Finished Any Course Yet</h1></center>";
		}
	}

	function countFinished(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM finished_course INNER JOIN courses ON finished_course.Course_ID = courses.Course_ID WHERE finished_course.PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
				echo $num_rows;
		}else{
			echo "0";
		}
	}

	function getCerts(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM finished_course INNER JOIN courses ON finished_course.Course_ID = courses.Course_ID WHERE finished_course.PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			echo '<tr>';
			for ($i=0; $i < $num_rows; $i++) { 
				$row = mysqli_fetch_assoc($result);

				echo '<td>';
                    echo '<a href="">';
                        echo '<img src="img/certificate.png" alt="">';
                    echo '<br/>';
                    echo '<label for="">'.$row['Course_Name']."'s Certificate</label>";
                echo '</td>';


				$x = $i + 1;
				if ($x % 6 == 0) {
					echo '</tr>';
					echo '<tr>';
				}
			}
			echo '</tr>';
		}else{
			echo "<center><h1>You Have Not Finished Any Course Yet</h1></center>";
		}
	}

	function insertLink(){
			include '../database/connection/Connection.php';
			$query = "INSERT INTo links (Lessons_ID, link) VALUES ('".$_GET['lessonid']."', '".$_POST['Link']."')";

			if(mysqli_query($conn, $query)){
				echo "<script> altert('Successfully Attached'); </script>";
			}
	}

	function getProfile(){
		include '../database/connection/Connection.php';
		$query = "SELECT * FROM additional_info WHERE PRC_Number = '".$_SESSION['PRC_Number']."'";
		$result = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows >= 1) {
			$row = mysqli_fetch_assoc($result);
			echo $row['Profile_Pic'];
		}
	}

	if(isset($_POST["action"])){
		if($_POST["action"] == "insert_generated_username_to_db"){
			insert_generated_username_to_db();
		}
	}
	function insert_generated_username_to_db()
	{
		global $conn;
		$username = $_POST["username"];
		$teacher_or_student = $_POST["teacher_or_student"];

		if($teacher_or_student == "teacher")
		{
			$query = "INSERT INTO teachers_accounts VALUES('', '$username', '')";
			mysqli_query($conn, $query);
		}
		else if ($teacher_or_student == "student")
		{
			$query = "INSERT INTO students_accounts VALUES('', '$username', '')";
			mysqli_query($conn, $query);
		}
		// echo "Inserted Successfully";
	}
	function generate_PRC_Number() {
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
	
		for ($i = 0; $i < 6; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}
	
		return $randomString;
	}

	if(isset($_POST["action"])){
		if($_POST["action"] == "insert_user"){
			insert_user();
		}
	}
	function insert_user()
	{
		global $conn;

		$PRC_NUMBER = generate_PRC_Number();

		$type_of_user = $_POST["type_of_user"];
		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		$first_name = $_POST["first_name"];
		$middle_name = $_POST["middle_name"];
		$last_name = $_POST["last_name"];
		$phone_number = $_POST["phone_number"];
		$birth_date = $_POST["birth_date"];
		$gender = $_POST["gender"];
		$email = $_POST["email"];
		$address = $_POST["address"];

		if($type_of_user == "Teacher")
		{
			$query = "INSERT INTO teachers_accounts(
				type_of_user,
				username,
				password,
				first_name,
				middle_name,
				last_name,
				email,
				phone_number,
				birth_date,
				gender,
				address,
				PRC_Number
										) VALUES (
				'$type_of_user',
				'$username',
				'$password',
				'$first_name',
				'$middle_name',
				'$last_name',
				'$email',
				'$phone_number',
				'$birth_date',
				'$gender',
				'$address',
				'$PRC_NUMBER'
										)";
				mysqli_query($conn, $query);
		}
		else if($type_of_user == "Student")
		{
			$query = "INSERT INTO students_accounts(
				type_of_user,
				username,
				password,
				first_name,
				middle_name,
				last_name,
				email,
				phone_number,
				birth_date,
				gender,
				address
										) VALUES (
				'$type_of_user',
				'$username',
				'$password',
				'$first_name',
				'$middle_name',
				'$last_name',
				'$email',
				'$phone_number',
				'$birth_date',
				'$gender',
				'$address'
										)";
				mysqli_query($conn, $query);
		}
		

		// echo "Inserted Successfully";
		echo $_POST["username"];
	}

	if(isset($_POST["action"])){
		if($_POST["action"] == "select_user"){
			select_user();
		}
	}
	function select_user()
	{
		global $conn;
		$username = $_POST["username"];
		$meron = "false";

		$sql = "SELECT * FROM `teachers_accounts` WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if ($row = mysqli_fetch_assoc($result)) 
			$meron = "true";

		$sql = "SELECT * FROM `students_accounts` WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		if ($row = mysqli_fetch_assoc($result)) 
			$meron = "true";

		// if($username == "teacher")
		// {
		// 	$query = "INSERT INTO teachers_accounts VALUES('', '$username', '')";
		// 	mysqli_query($conn, $query);
		// }
		echo $meron;
	}
?>