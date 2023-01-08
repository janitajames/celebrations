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
<section class="page-section container" id="menu">
    <div class="category-title">
        <h2>Categories</h2>
    </div>
    <div id="menu-field" class=" mt-5">
        <div class="row ">

            <?php
            include 'admin/db_connect.php';
            $qry = $conn->query("SELECT * FROM  category_list order by id asc");
            while ($row = $qry->fetch_assoc()) :
            ?>
                <div class="card col viewProducts" style="width: 20rem;">
                    <img src="assets/img/<?php echo $row['img_path'] ?>" class="item-img " alt="...">
                    <div class="card-body">
                        <h5 class="card-title" id="cat_name"><?php echo $row['name'] ?></h5>
                        <p class="card-text truncate" style="height:40px"><?php echo $row['description'] ?></p> 
                        <!-- <a href="index.php?page=home&categoryId=12&name=<?php echo $row['name'] ?>"class="btn btn-primary stretched-link">Browse</a> -->
                        <button type="button" class="btn btn-primary viewProducts" data-id='<?php echo $row['id'] ?>' >Browse</button>
                    </div>
                </div>
                <!-- <div class="col-lg-10 card-padding">
                <div class="card menu-item">
                    <div class="card-body">
                        <h5 class="card-title" id="cat_name"><?php echo $row['name']  ?> </h5>
                        <div class="text-center">
                            <button class="btn viewProducts btn-block btn-outline-primary" type="button" data-id='<?php echo $row['id'] ?>'>View</button>
                        </div>
                    </div>
                </div>
            </div> -->
            <?php endwhile; ?>
        </div>
</section>
<script>
    $('.viewProducts').click(function(e) {
        debugger
        e.preventDefault();
        location.replace("index.php?page=home&categoryId=" + $(this).attr('data-id') + "&name=" + document.getElementById('cat_name').innerText)
    })
</script>
<style>
    .item-img {
        width: 100%;
        padding: 0;
        margin: 0;
    }

    b.truncate {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        font-size: small;
        color: #000000cf;
        font-style: italic;
    }

    .category-title {
        font-family: "Merriweather Sans", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-weight: 500;
        line-height: 1.2;
        margin-bottom: 10px;
        margin-left: 5px;
    }

    .card-padding {
        margin-bottom: 10px
    }
</style>