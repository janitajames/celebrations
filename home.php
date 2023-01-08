 <!-- Masthead-->
 <header class="masthead">
     <div class="container h-100">
         <div class="row h-100 align-items-center justify-content-center text-center">
             <div class="col-lg-10 align-self-end mb-4 page-title">
                 <h3 class="text-white">Welcome to <?php echo $_SESSION['setting_name']; ?></h3>
                 <hr class="divider my-4" />
                 <a class="btn btn-primary btn-xl js-scroll-trigger" href="#menu">Order Now</a>

             </div>

         </div>
     </div>
 </header>
 <section class="mt-5" id="menu">

     <div id="menu-field" class=" container">
         <?php
            if (isset($_GET['name'])) {
                $cat_name = $_GET['name'];
            }
            ?>
         <h2><?php echo $cat_name ?></h2>

         <ul class="list-group list-group-flush">
             <?php
                include 'admin/db_connect.php';
                $catgeoryId = $_GET['categoryId'];

                if (isset($catgeoryId))
                    if (isset($catgeoryId)) {
                        $qry = $conn->query("SELECT * FROM  product_list where category_id =  '" . $catgeoryId . "'order by id ");
                    } else {
                        $qry = $conn->query("SELECT * FROM  product_list order by rand()");
                    }
                while ($row = $qry->fetch_assoc()) :
                ?>

                 <!-- <div class="col-lg-3">
                 <div class="card menu-item ">
                     <img src="assets/img/<?php echo $row['img_path'] ?>" class="card-img-top" style="height: 200px;" alt="...">
                     <div class="card-body">
                         <h5 class="card-title"><?php echo $row['name'] ?></h5>
                         <p class="card-text truncate-desc" style="height:40px"><?php echo $row['description'] ?></p>
                         <div class="text-center">
                             <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=<?php echo $row['id'] ?>><i class="fa fa-eye"></i> View</button>

                         </div>
                     </div>

                 </div>
             </div> -->
                 <li class="list-group-item row p-100">
                     <div class="row justify-content-between">
                         <div class="col">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="row">
                                         <h5 class="card-title text-start col-4" style="align-items:baseline;"><?php echo $row['name'] ?></h5>
                                         <button type="button" class="btn add-btn btn-primary view_prod col-5" data-id=<?php echo $row['id'] ?>>+ add</button>

                                     </div>
                                     <h5 class="card-title text-start">₹<?php echo $row['price'] ?></h5>
                                     <p class="card-text text-start truncate-desc" style="height:40px"><?php echo $row['description'] ?></p>
                                 </div>
                             </div>

                         </div>
                         <div class="col" style="text-align:end">
                             <img src="assets/img/<?php echo $row['img_path'] ?>" class="rounded float-end item-img" alt="...">
                         </div>
                     </div>
                 </li>
             <?php endwhile; ?>
         </ul>
     </div>
 </section>
 <script>
     $('.view_prod').click(function() {
         uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
     })
 </script>
 <style>
     .item-img {
         width: 150px;
     }

     .add-btn {
         max-width: max-content;
     }

     .truncate-desc {
         overflow: hidden;
         text-overflow: ellipsis;
         display: -webkit-box;
         -webkit-line-clamp: 2;
         -webkit-box-orient: vertical;
         font-size: small;
         color: #000000cf;
         font-style: italic;

     }
 </style>