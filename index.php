<?php
$subjects = [
    "Physics" => ["SLA", "Lab Manual", "Notes"],
    "Maths"   => ["SLA", "Tutorial", "Notes"],
    "ICT"     => ["Manual"],
    "PCM"     => ["Manual", "Notes"],
    "WPD"     => ["Lab Manual"]
];
?>
<!DOCTYPE html>
<html>
<head>
  <title>GPN – Student Resources</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f0f2f5; margin: 20px; }
    .card { background: white; padding: 20px; border-radius: 10px; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,.1); }
    h2 { margin-top: 0; }
    a { display: inline-block; margin: 5px; padding: 8px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; }
    a:hover { background: #0056b3; }
  </style>
</head>
<body>
  <h1>GPN – Student Resources</h1>
  <?php foreach($subjects as $subject => $sections): ?>
    <div class="card">
      <h2><?php echo $subject; ?></h2>
      <?php foreach($sections as $sec): ?>
        <a href="section.php?subject=<?php echo urlencode($subject); ?>&section=<?php echo urlencode($sec); ?>">
          <?php echo $sec; ?>
        
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</body>
</html>
