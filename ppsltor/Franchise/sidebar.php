<?php
require 'connection.php';
?>
<!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="image/logo.jpeg" class="img-fluid" style="width: 30px;"/><span>LTOR ACADEMY</span></h3>
            </div>
            <ul class="list-unstyled components" style="margin-top:70px">
			<li  class="active">
                    <a href="main.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
                </li>
		
		      <!-- <div class="small-screen navbar-display">
                <li class="dropdown d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#homeSubmenu0" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
					<i class="material-icons">notifications</i><span> 4 notification</span></a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu0">
                                    <li>
                                    <a href="#">You have 5 new messages</a>
                                    </li>
                                    <li>
                                        <a href="#">You're now friend with Mike</a>
                                    </li>
                                    <li>
                                        <a href="#">Wish Mary on her birthday!</a>
                                    </li>
                                    <li>
                                        <a href="#">5 warnings in Server Console</a>
                                    </li>
                    </ul>
                </li>
				
				<li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">apps</i><span>apps</span></a>
                </li>
				
				 <li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">person</i><span>user</span></a>
                </li>
				
				<li  class="d-lg-none d-md-block d-xl-none d-sm-block">
                    <a href="#"><i class="material-icons">settings</i><span>setting</span></a>
                </li>
				</div> -->
			
			
                <li class="dropdown">
           <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">person</i>Board Members</a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu1">
              <li><a href="addmember.php">Add Member</a></li>
              <li><a href="viewmember.php">View Member</a></li>
           </ul>
           </li>
           
           
           <!-- <li class="dropdown">
           <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">book</i>Courses
           </a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu2">
              <li><a href="viewcourses.php">View Courses</a></li>
           </ul>
           </li>-->
           
            <li class="dropdown">
           <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">event_note</i>Meeting
           </a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu3">
              <li><a href="addmeeting.php">Add Meeting</a></li>
              <li><a href="viewmeeting.php">View Meeting</a></li>
           </ul>
           </li>
           
           
            <li class="dropdown">
           <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">business</i>Post
           </a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu4">
              <li><a href="view_posts.php">View Post</a></li>
             
           </ul>
           </li>
           
            <li class="dropdown">
           <a href="#homeSubmenu5" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">date_range</i>Reference
           </a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu5">
              <li><a href="viewbatch.php">View Reference</a></li>
           </ul>
           </li>

          <!-- <li class="dropdown">
           <a href="#homeSubmenu6" data-toggle="collapse" aria-expanded="false" 
           class="dropdown-toggle">
           <i class="material-icons">notifications</i>
           Notifications
           <?php
           if(isset($con)) {
               $notif_sql = "SELECT COUNT(*) as count FROM notifications WHERE status = 'unread'";
               $notif_result = $con->query($notif_sql);
               if($notif_result) {
                   $notif_count = $notif_result->fetch_assoc()['count'];
                   if($notif_count > 0) {
                       echo "<span class='badge badge-danger'>$notif_count</span>";
                   }
               }
           }
           ?>
           </a>
           <ul class="collapse list-unstyled menu" id="homeSubmenu6">
              <li><a href="view_notifications.php">View Notifications</a></li>
           </ul>
           </li>

           <li class="dropdown">
           <a href="viewleads.php" aria-expanded="false">
           <i class="material-icons">assignment</i>Leads
           </a>
           </li>           
            </ul>  -->     
        </nav>