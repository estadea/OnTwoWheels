<head>
  <link rel="stylesheet" href="../style.css">
</head>
<div>
  <?php

  include_once($_SERVER['DOCUMENT_ROOT'] . '/onTheWheel/constant.php');
  include ROOTDIR . '/components/header.php';
  include_once(ROOTDIR . '/config/database.php');

  $sql = "SELECT * FROM Contacts";
  $check = $pdo->query($sql);
  $check->execute();

  $result = $check->fetchAll(PDO::FETCH_ASSOC);

  if (count($result) > 0) {

    $contacts = $result[0];
    // output data of each row

    // while ($row = $result->fetch_assoc()) {
    echo "<div class=\"container\">
                    <div>address: " . $contacts["address"] . " </div>
                    <div> City: " . $contacts["city"] . "</div>
                    <div> Province: " . $contacts["province"] . "</div>
                    <div> organisation Name: " . $contacts["organisationName"] . "</div>
                    <div> VAT Number: " . $contacts["vatNumber"] . "</div>
                </div>";
  } else {
    echo "0 results";
  }

  // $conn->close();

  ?>
</div>