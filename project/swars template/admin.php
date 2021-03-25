<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> S-WARS Admin Page </title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <input type="checkbox" id="nav-toggle">

    <div class="sidebar">
        <div class="sidebar-brand">
            <h2> <span class="las la-utensils"></span> <span>S-WARS</span> </h2>
        </div>      <!-- sidebar-brand -->

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"> <span class="las la-home"></span>
                        <span>Dashboard </span></a>
                </li>
                <li>
                    <a href="" > <span class="las la-calendar-day"></span>
                        <span>Calendar</span></a>
                </li>
                <li>
                    <a href=""> <span class="las la-book-open"></span>
                        <span>Booking</span></a>
                </li>
                <li>
                    <a style="margin-top:300px;" href="notification.php?logout='1'" onclick="return confirm('Are you sure you want to logout?')"><span class="las la-arrow-circle-left"></span>
                        <span>Log Out</span></a>
                </li>
            </ul>
        </div>      <!-- sidebar-menu -->
    </div>      <!-- sidebar -->

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span style="cursor:pointer" class="las la-bars"></span>
                </label>      <!-- header-title -->

                Dashboard
            </h2>

            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>      <!-- search-wrapper -->

            <div class="user-wrapper">
                <img src="pics/admin.png" width="40px" height="40px">
                <div>
                    <h4> Jean Limbo </h4>
                    <small> Admin </small>
                </div>
            </div>      <!-- user-wrapper -->
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1> 4 </h1>
                        <span> Active Bookings </span>
                    </div>      <!-- Active Booking -->
                    <div>
                        <span class="las la-book"></span>
                    </div>
                </div>      <!-- card-single -->

                <div class="card-single">
                    <div>
                        <h1> 20 </h1>
                        <span> Customers </span>
                    </div>      <!-- Customers -->
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>      <!-- card-single -->
            </div>      <!-- cards -->

            <div class="recent-grid">
                <div class="bookings">
                    <div class="card">
                        <div class="card-header">
                            <h3> Bookings </h3>

                            <button> See all <span class="las la-arrow-right"></span></button>
                        </div>      <!-- card-header -->

                        <div class="card-body">
                            <div class="table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <td> Name </td>
                                            <td> Date / Time </td>
                                            <td> Number of Guests </td>
                                            <td> Status </td>
                                        </tr>
                                    </thead>       <!-- headings for table -->
                                    <tbody>
                                        <tr>
                                            <td> Nathan Kress </td>
                                            <td> Mar 30, 9:00am-12:00pm </td>
                                            <td> +4 Guests </td>
                                            <td>
                                                <span class="status green"></span>
                                                Ongoing
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Park Binnie </td>
                                            <td> Mar 30, 12:00pm-3:00pm </td>
                                            <td> +4 Guests </td>
                                            <td>
                                                <span class="status yellow"></span>
                                                Scheduled
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Glory Brooks </td>
                                            <td> Mar 30, 3:00pm-6:00pm </td>
                                            <td> +4 Guests </td>
                                            <td>
                                                <span class="status red"></span>
                                                Cancelled
                                            </td>
                                        </tr>
                                        <tr>
                                            <td> Kim Seon Ho </td>
                                            <td> Mar 30, 6:00pm-9:00pm </td>
                                            <td> +4 Guests </td>
                                            <td>
                                                <span class="status green"></span>
                                                Ongoing
                                            </td>
                                        </tr>
                                    </tbody>       <!-- booking summary for the day -->
                                </table>
                            </div>      <!-- table-responsive -->
                        </div>      <!-- card-header -->
                    </div>      <!-- card -->
                </div>      <!-- bookings -->


                <div class="contacts">
                    <div class="card">
                        <div class="card-header">
                            <h3> Contacts </h3>

                            <button> See all <span class="las la-arrow-right"></span></button>
                        </div>      <!-- card-header -->

                        <div class="card-body">
                            <div class="customer">
                                <div class="info">
                                    <div>
                                        <h4> Nathan Kress </h4>
                                        <small> +1 208-252-2636 </small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <div>
                                        <h4> Park Binnie </h4>
                                        <small> +82 10-596-5023 </small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                            <div class="customer">
                                <div class="info">
                                    <div>
                                        <h4> Glory Brooks </h4>
                                        <small> +1 419-551-2198 </small>
                                    </div>
                                </div>
                                <div class="contact">
                                    <span class="las la-comment"></span>
                                    <span class="las la-phone"></span>
                                </div>
                            </div>
                        </div>
                        <div class="customer">
                            <div class="info">
                                <div>
                                    <h4> Kim Seon Ho </h4>
                                    <small> +1 201-142-4536 </small>
                                </div>
                            </div>
                            <div class="contact">
                                <span class="las la-comment"></span>
                                <span class="las la-phone"></span>
                            </div>
                        </div><!-- contact person booking -->
                    </div>      <!-- card -->
                </div>      <!-- contacts-card -->
            </div>      <!-- recent-grid-->
        </main>
    </div>      <!-- main-content -->
</body>
</html>