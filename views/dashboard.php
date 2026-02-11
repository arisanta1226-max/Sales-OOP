<?php
session_start();

require '../classes/Products.php';

$product      = new Products;
$all_products  = $product->getAllProducts();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- bootstrap -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

    <div class="container mt-5 mb-3 mx-auto text-center my-auto">
        


        <span class="text-secondary fw-bold">Welcome,<?= $_SESSION['username'] ?></span>

    </div>

    <main class="row justify-content-center gx-0 my-auto">
        <div class="col-6">
            <div class="row">
                <h2 class="col-7">PRODUCT LIST</h2>

                <div class="col-5 text-end ">
                    <button type="button" class="btn text-info btn-lg" data-bs-toggle="modal" data-bs-target="#Modal1"><i class="fa-solid fa-plus"></i></button>

                </div>
            </div>

            <table class="table table-hover align-middle">
                <thead>
                    <tr>

                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>quantity</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($product = $all_products->fetch_assoc()) {

                    ?>
                        <tr>

                            <td><?= $product['id'] ?></td>
                            <td><?= $product['product_name'] ?></td>
                            <td><?= $product['price'] ?></td>
                            <td><?= $product['quantity'] ?></td>
                            <td>

                                <!-- edit -->
                                <a href="edit-product.php?id=<?= $product['id'] ?>" class="btn btn-warning" title="Edit">
                                    <i class="fa-regular fa-pen-to-square"></i>
                                </a>

                                <!-- delete -->
                                <a href="delete-product.php?id=<?= $product['id'] ?>" class="btn btn-danger" title="Delete">
                                    <i class="fa-regular fa-trash-can"></i>
                                </a>

                            </td>
                            <td>
                                <a href="buy-product.php?id=<?= $product['id'] ?> " class="btn btn-success">
                                    <i class="fa-solid fa-cash-register"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    </div>

     <div class="modal fade" id="Modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row justify-content-center">
                        <h1 class="text-center fw-bold text-info"><i class="fa-solid fa-box"></i>Add Product</h1>
                    <form action="../actions/add-product.php" method="post">
                        <label for="product_name" class="form-label">product_name</label>
                        <input type="text" name="product_name" id="product_name" class="form-control">

                        <label for="price" class="form-label">price</label>
                        <input type="number" name="price" id="price" class="form-control">

                        <label for="quantity" class="form-label">quantity</label>
                        <input type="number" name="quantity" id="quantity" class="form-control">

                        <button type="submit" class="btn btn-info w-100 mt-2">Add</button>

                    </form>
                    </div>
                </div>
            </div>
        </div>
     </div>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>


</html>