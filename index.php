<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" >
    <div class="mb-3">
      <label> Title </label>
      <input type="text" class="form-control" name="title">
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Content </label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="con">
    </div>
    
    <div class="mb-3">
      <label for="formFile" class="form-label">
        <h4>Upload image</h4>
      </label>
      <input class="form-control" type="file" id="formFile" name="image">
    </div><br>
    <button>submit</button><br>
  </form>

</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $con = $_POST['con'];
  $errors = [];
  if (!empty($_FILES['image']['name'])) {
    $imgName = $_FILES['image']['name'];
    $imgTempPath = $_FILES['image']['tmp_name'];
    $imgSize = $_FILES['image']['size'];
    $imgType = $_FILES['image']['type'];
    $imgextension = explode('.', $imgName);
    $imgext = end($imgextension);
    $allowd = ['jpg', 'png', 'gif'];
    if (in_array($imgext, $allowd)) {
    } else {
      echo 'Extension not allowed';
    }
  } else {
    echo 'image required';
  }
}
if (empty($title)) {
  $errors['title'] =
    ' required';
}
if (empty($con)) {
  $errors['con'] =
    'contant required';
}elseif (strlen($con)<51) {
  echo "Contant must be larger than 50 chars";
}

if (count($errors) > 0) {
  foreach ($errors as $key => $value) {
    echo '*' . $key . ':' . $value . '<br>';
  }
} else {
  echo 'Valid data <br>';

 $data =$title.'||'.$con."\n";
  $file= fopen('test1.txt',"a");
   fwrite($file,$data) ;
   fclose($file) ;

}

?>


