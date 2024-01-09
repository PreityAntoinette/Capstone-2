<!-- Sidebar -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            width="35"
            height="35"
            fill=white
            class="bi bi-box-arrow-right"
            viewBox="0 0 16 20"
        >
        <path d="M9.999,8.472c-1.314,0-2.385,1.069-2.385,2.384c0,1.317,1.07,2.385,2.385,2.385c1.316,0,2.386-1.068,2.386-2.385C12.385,9.541,11.314,8.472,9.999,8.472z M9.999,12.238c-0.76,0-1.38-0.622-1.38-1.382c0-0.761,0.62-1.38,1.38-1.38c0.761,0,1.38,0.62,1.38,1.38C11.379,11.616,10.76,12.238,9.999,12.238z"></path>
		<path d="M15.232,5.375H9.398C9.159,4.366,8.247,3.61,7.174,3.61c-1.073,0-1.985,0.756-2.224,1.765H4.769c-1.246,0-2.259,1.012-2.259,2.257v6.499c0,1.247,1.014,2.259,2.259,2.259h10.464c1.244,0,2.258-1.012,2.258-2.259V7.632C17.49,6.387,16.477,5.375,15.232,5.375z M16.486,14.131c0,0.69-0.564,1.256-1.254,1.256H4.769c-0.692,0-1.256-0.565-1.256-1.256V7.632c0-0.691,0.563-1.254,1.256-1.254H5.39c0.275,0,0.499-0.221,0.502-0.495c0.01-0.7,0.585-1.269,1.282-1.269s1.272,0.569,1.282,1.269c0.003,0.274,0.228,0.495,0.502,0.495h6.275c0.689,0,1.254,0.563,1.254,1.254V14.131z"></path>
        </svg>
            <h3>Lagring Studio</h3>
        </div>
        <!-- <span class="material-icons-outlined mobileToggle">close</span> -->
        
        <div class="mobileToggle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                fill="currentColor"
                class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
        </div>
    </div>
    <ul class="sidebar-list">
    <?php $current_page = basename($_SERVER['PHP_SELF']); ?>
        <li <?php if ($current_page === 'admindashboard.php') echo 'class="navLinkActive"';?>>
            <a href="admindashboard.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="20"
                    height="20"
                    stroke-width="3px"
                    fill="currentColor"
                    class="bi bi-columns-gap"
                    viewBox="0 0 16 16"
                >
                    "
                    <path
                        d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"
                        stroke-width="3"
                    />
                </svg>
                Dashboard
            </a>
        </li>

        <li <?php if ($current_page === 'profile.php') echo 'class="navLinkActive"';?>>
            <a href="profile.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"fill ="#ffffff" viewBox="0 0 64 64"><title>2</title><g id="Layer_26" data-name="Layer 26"><path d="M40,26.3A13.49,13.49,0,1,0,24,26.3a25.38,25.38,0,0,0-17.3,24c0,2.72,1.49,6.51,8.6,9.13A50.29,50.29,0,0,0,32,62c12.62,0,25.34-3.61,25.34-11.67A25.38,25.38,0,0,0,40,26.3ZM22.51,15.49A9.49,9.49,0,1,1,32,25,9.5,9.5,0,0,1,22.51,15.49ZM32,58c-12,0-21.34-3.37-21.34-7.67a21.34,21.34,0,1,1,42.69,0C53.34,54.63,44,58,32,58Z"></path></g></svg>
                Profile
            </a>
        </li>

        <li <?php if ($current_page === 'calendar.php') echo 'class="navLinkActive"';?>>
            <a href="calendar.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="21"
                    height="21"
                    fill="currentColor"
                    class="bi bi-calendar-check"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"
                        stroke-width="3"
                    />
                    <path
                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"
                        stroke-width="3"
                    />
                </svg>
                Calendar
            </a>
        </li>

        <li <?php if ($current_page === 'scheduled_task.php') echo 'class="navLinkActive"';?>>
            <a href="scheduled_task.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="23"
                    height="23"
                    fill="currentColor"
                    class="bi bi-card-checklist"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"
                    />
                    <path
                        d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"
                    />
                </svg>
                Scheduling
            </a>
        </li>

        <li <?php if ($current_page === 'services.php') echo 'class="navLinkActive"';?>>
            <a href="services.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="23"
                    height="23"
                    fill="currentColor"
                    class="bi bi-cart-plus"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"
                    />
                    <path
                        d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                    />
                </svg>
                Services
            </a>
        </li>

        <li <?php if ($current_page === 'photographer.php') echo 'class="navLinkActive"';?>>
            <a href="photographer.php">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 20 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 12.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Z"/>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 3h-2l-.447-.894A2 2 0 0 0 12.764 1H7.236a2 2 0 0 0-1.789 1.106L5 3H3a2 2 0 0 0-2 2v11a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V5a2 2 0 0 0-2-2Z"/>
            </svg>
            Photographer
            </a>
        </li>

        <li <?php if ($current_page === 'user_list.php') echo 'class="navLinkActive"';?>>
            <a href="user_list.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    fill="currentColor"
                    class="bi bi-person-lines-fill"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"
                    />
                </svg>
                User lists
            </a>
        </li>

        <!-- <li <?php if ($current_page === 'account.php') echo 'class="navLinkActive"';?>>
            <a href="account.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="25"
                    height="25"
                    fill="currentColor"
                    class="bi bi-person"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"
                    />
                </svg>
                Accounts
            </a>
        </li> -->

        <li <?php if ($current_page === 'settings.php') echo 'class="navLinkActive"';?>>
            <!-- <a href="settings.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="23"
                    height="23"
                    fill="currentColor"
                    class="bi bi-gear"
                    viewBox="0 0 16 16"
                >
                    <path
                        d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"
                    />
                    <path
                        d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"
                    />
                </svg>
                Settings
            </a> -->
        </li>

        <li <?php if (
                    $current_page === 'website.php')
                    echo 'class="navLinkActive"';?>>
        <a href="#" id="managementLink">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 20">
                <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Z"/>
            </svg>
            File Management
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-caret-right-fill"
                viewBox="0 0 16 16">
                <path
                        d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
            </svg>
        </a>
        
        <ul class="sub-menu" style="list-style-type: '>';">
            <hr>
            <li <?php if ($current_page === 'website.php') echo 'class="navLinkActive"';?>>
                <a href="website.php" id="facilityLink">
                    &#8226;
                    Website
                </a>
            </li>
        
            <hr>
        </ul>
    </li>


        

        <li <?php if ($current_page === 'report.php') echo 'class="navLinkActive"';?>>
            <a href="report.php">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 2h4a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h4m6 0v3H6V2m6 0a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1M5 5h8m-5 5h5m-8 0h.01M5 14h.01M8 14h5"/>
            </svg>  
            Report
            </a>
        </li>

        <li <?php if ($current_page === 'backup.php') echo 'class="navLinkActive"';?>>
            <a href="backup.php">
                <svg version="1.1" id="Icons" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#ffffff" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
                <style type="text/css">
                    .st0{fill:none;stroke:#ffffff;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;}
                    .st1{fill:none;stroke:#ffffff;stroke-width:2;stroke-linejoin:round;stroke-miterlimit:10;}
                </style>
                <path class="st0" d="M25,6.7c-3.4,0-6.6-1.4-9-3.7c-2.4,2.3-5.6,3.7-9,3.7C5.6,6.7,4.3,6.4,3,6c0,14,5.5,19.6,13,23
                    c7.5-3.4,13-9,13-23C27.7,6.4,26.4,6.7,25,6.7z"></path>
                <polyline class="st0" points="12,16 15,19 21,13 "></polyline>
            </svg>

            Back up and Restore
            </a>
        </li>

        

        
        <li class="sidebar-list-item">
            <a href="../logoutmodule/logout.php">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    class="bi bi-box-arrow-right"
                    viewBox="0 0 16 16"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"
                    />
                    <path
                        fill-rule="evenodd"
                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                    />
                </svg>
                Log out
            </a>
        </li>

    </ul>


</aside>
<!-- End Sidebar -->

<script>
    // MANAGEMENT LINK SUB MENU FUNCTION
    // Get the file management link, sub-menu elements, and the icon element
    const managementLink = document.getElementById('managementLink');
    const managementSubMenu = managementLink.nextElementSibling;
    const managementIcon = managementLink.querySelector('.bi-caret-right-fill');

    // Hide the management sub-menu initially
    managementSubMenu.style.display = 'none';

    let managementSubmenuVisible = false; // Variable to track management submenu visibility

    // Function to toggle the management submenu and change the icon
    function toggleManagementSubMenu() {
        managementSubmenuVisible = !managementSubmenuVisible; // Toggle management submenu visibility

        // Toggle the 'active' class on the parent element to show/hide the management sub-menu
        managementLink.parentNode.classList.toggle('active');

        // Toggle the display of the management sub-menu
        managementSubMenu.style.display = managementSubmenuVisible ? 'block' : 'none';

        // Change the icon based on management submenu visibility
        if (managementIcon) {
            managementIcon.style.transform = managementSubmenuVisible ? 'rotate(90deg)' : 'rotate(0deg)';
        }
    }

    // Add click event listener to the management link
    managementLink.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior

        toggleManagementSubMenu();
    });

    // Add click event listener to the document body to close management submenu when clicking outside
    document.body.addEventListener('click', function(event) {
        const isClickInsideManagementSubMenu = managementSubMenu.contains(event.target);
        const isClickOnManagementLink = managementLink.contains(event.target);

        if (!isClickInsideManagementSubMenu && !isClickOnManagementLink && managementSubmenuVisible) {
            toggleManagementSubMenu();
        }
    });

    // REPORT LINK SUB MENU FUNCTION
    // Get the settings link, sub-menu elements, and the icon element
    document.addEventListener('DOMContentLoaded', function() {
    const reportLink = document.getElementById('reportLink');
    const reportMenu = reportLink.nextElementSibling;
    const reportIcon = reportLink.querySelector('.bi-caret-right-fill');

    reportMenu.style.display = 'none';

    let reportMenuVisible = false;

    function toggleSubMenu() {
        reportMenuVisible = !reportMenuVisible;

        reportLink.parentNode.classList.toggle('active');
        reportMenu.style.display = reportMenuVisible ? 'block' : 'none';

        if (reportIcon) {
            reportIcon.style.transform = reportMenuVisible ? 'rotate(90deg)' : 'rotate(0deg)';
        }
    }

    reportLink.addEventListener('click', function(event) {
        event.preventDefault();
        toggleSubMenu();
    });

    document.body.addEventListener('click', function(event) {
        const isClickInsideReportMenu = reportMenu.contains(event.target);
        const isClickOnReportLink = reportLink.contains(event.target);

        if (!isClickInsideReportMenu && !isClickOnReportLink && reportMenuVisible) {
            toggleSubMenu();
        }
    });
});


    // SETTINGS LINK SUB MENU FUNCTION
    // Get the settings link, sub-menu elements, and the icon element
    const settingsLink = document.getElementById('settingsLink');
    const subMenu = settingsLink.nextElementSibling;
    const icon = settingsLink.querySelector('.bi-caret-right-fill');

    // Hide the sub-menu initially
    subMenu.style.display = 'none';

    let submenuVisible = false; // Variable to track submenu visibility

    // Function to toggle the submenu and change the icon
    function toggleSubMenu() {
        submenuVisible = !submenuVisible; // Toggle submenu visibility

        // Toggle the 'active' class on the parent element to show/hide the sub-menu
        settingsLink.parentNode.classList.toggle('active');

        // Toggle the display of the sub-menu
        subMenu.style.display = submenuVisible ? 'block' : 'none';

        // Change the icon based on submenu visibility
        if (icon) {
            icon.style.transform = submenuVisible ? 'rotate(90deg)' : 'rotate(0deg)';
        }
    }

    // Add click event listener to the settings link
    settingsLink.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default link behavior

        toggleSubMenu();
    });

    // Add click event listener to the document body to close submenu when clicking outside
    document.body.addEventListener('click', function(event) {
        const isClickInsideSubMenu = subMenu.contains(event.target);
        const isClickOnSettingsLink = settingsLink.contains(event.target);

        if (!isClickInsideSubMenu && !isClickOnSettingsLink && submenuVisible) {
            toggleSubMenu();
        }
    });

    // ARCHIVED LINK SUB MENU FUNCTION
    document.addEventListener('DOMContentLoaded', function() {
        const archivedLink = document.getElementById('archivedLink');
        const archivedMenu = archivedLink.nextElementSibling;
        const archivedIcon = archivedLink.querySelector('.bi-caret-right-fill');

        archivedMenu.style.display = 'none';

        let archivedMenuVisible = false;

        function toggleArchivedSubMenu() {
            archivedMenuVisible = !archivedMenuVisible;

            archivedLink.parentNode.classList.toggle('active');
            archivedMenu.style.display = archivedMenuVisible ? 'block' : 'none';

            if (archivedIcon) {
                archivedIcon.style.transform = archivedMenuVisible ? 'rotate(90deg)' : 'rotate(0deg)';
            }
        }

        archivedLink.addEventListener('click', function(event) {
            event.preventDefault();
            toggleArchivedSubMenu();
        });

        document.body.addEventListener('click', function(event) {
            const isClickInsideArchivedMenu = archivedMenu.contains(event.target);
            const isClickOnArchivedLink = archivedLink.contains(event.target);

            if (!isClickInsideArchivedMenu && !isClickOnArchivedLink && archivedMenuVisible) {
                toggleArchivedSubMenu();
            }
        });
    });

</script>