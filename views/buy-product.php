<?php
session_start();

require '../classes/Products.php';


$product_obj   = new Products;
$id = $_GET['id'];
$product     = $product_obj->getProduct($id);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buy </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    

 <div class="" style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card w-25 mx-auto my-auto">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center display-2 fw-bold text-success">Buy Product</h1>
                </div>
                <div class="card-body">
                    <form action="../actions/buy-product.php?id=<?= $product['id'] ?>" method="post">


                        <div class="mb-3">
                            <label for="product_name" >Product Name</label>
                            <p class="fw-bold display-6" name="product_name" ><?= $product['product_name'] ?></p>
                        </div>
                        <div class="mb-3">
                            <label for="price" >Price</label>
                           <input type="number" name="price" id="price" readonly style="border:none; background:transparent; font-size:2rem; font-weight:bold; color: black " value="<?= $product['price'] ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="quantity" >Stock left</label>
                          <input type="number" name="quantity" id="quantity" readonly style="border:none; background:transparent; font-size:2rem; font-weight:bold; color: black" value="<?= $product['quantity'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="buy_product" class="form-label">Buy Quantity</label>
                           <input type="number" name="buy_product" id="buy_product" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Pay</button>
                    </form>

                </div>
            </div>
        </div>
 </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html