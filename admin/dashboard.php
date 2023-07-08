<?php include "includes/admin_header.php"; ?>
<?php
include "functions/widget_functions.php";
 include "functions/dashboard_functions.php"; 
 ?>

<div id="wrapper">

<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <?php include "includes/admin_heading.php" ?>
        
        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include "includes/admin_footer.php" ?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['CMS Stats', 'Posts',],
          ['Public Posts',  <?php active_posts(); ?>],
          ['Draft Posts',  <?php draft_posts(); ?>],
          ['Public Comments',  <?php public_comment_count(); ?>],
          ['Hidden Comments',  <?php hidden_comment_count(); ?>],
          ['Admins',  <?php admin_count(); ?>],
          ['Subscribers',  <?php subscriber_count(); ?>],
          ['Categories',  <?php categories_count(); ?>],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  