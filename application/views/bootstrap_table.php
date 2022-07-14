<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php echo base_url();?>common/3rd-party/bootstrap/css/bootstrap.css" rel="stylesheet">

  
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>
  <table class="table">
    <thead>
      <tr class="success">
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <tr class="danger">
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <div class="col-md-4">
  <img src="<?php echo base_url().'images/campus/5.jpg'; ?>" alt=">>" style="width:200px;height:200px;"><img src="<?php echo base_url().'images/profile-arrow.png'; ?>" alt=">>" style="width:10px;height:10px;"></div>
     <div class="col-md-4">
  <img src="<?php echo base_url().'images/campus/5.jpg'; ?>" alt=">>" style="width:200px;height:200px;"><img src="<?php echo base_url().'images/profile-arrow.png'; ?>" alt=">>" style="width:10px;height:10px;"></div>
    <div class="col-md-4">
  <img src="<?php echo base_url().'images/campus/5.jpg'; ?>" alt=">>" style="width:200px;height:200px;">
  </div>
  </div>

  <div class="jumbotron">
    <h1>Bootstrap Tutorial</h1> 
    <p>Bootstrap is the most popular HTML, CSS, and JS framework for developing
    responsive, mobile-first projects on the web.</p> 
  </div>
  <p>This is some text.</p> 
  <p>This is another text.</p> 
  </div>
</body>
</html>

