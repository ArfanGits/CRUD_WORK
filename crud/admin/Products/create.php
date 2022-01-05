<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                 <h1 class="text-center mb-4">Add New</h1>
                 <form method="post" action="store.php" enctype="multipart/form-data">
                     <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                         <div class="col-md-9">
                             <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value=""
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputTitle" class="col-md-3 col-form-label">Title:</label>
                         <div class="col-md-9">
                             <input
                                type="text"
                                class="form-control"
                                id="inputTitle"
                                name="title"
                                value=""
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputPrice" class="col-md-3 col-form-label">Price:</label>
                         <div class="col-md-9">
                             <input
                                type="number"
                                class="form-control"
                                id="inputPrice"
                                name="price"
                                value=""
                             >
                         </div>
                     </div>
                     <div class="mb-3 row form-check">
                         <div class="col-md-9">
                             <input type="checkbox" class="form-check-input" id="inputIsActive" name="is_active" value="1">
                         </div>
                         <label for="inputIsActive" class="col-md-3  form-check-label">
                             Is Active:
                         </label>
                     </div>
                     <div class="mb-3 row form-check">
                         <div class="col-md-9">
                             <input type="checkbox"
                                    class="form-check-input"
                                    id="inputIsDeleted"
                                    name="is_deleted"
                                    value="1">
                         </div>
                         <label for="inputIsDeleted" class="col-md-3  form-check-label">
                             Is Deleted:
                         </label>
                     </div>
                     <div class="mb-3 row">
                         <label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
                         <div class="col-md-9">
                             <input
                                     type="file"
                                     class="form-control"
                                     id="inputFile"
                                     name="picture"
                                     value=""
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                       <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                         </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
